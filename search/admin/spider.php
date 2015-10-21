<?php 
/*******************************************
* Sphider Version 1.3.*
********************************************/

	set_time_limit (0);
	$include_dir = "../include";
	include "auth.php";
	require_once ("$include_dir/commonfuncs.php");
	$all = 0; 
	extract (getHttpVars());
	$settings_dir =  "../settings";
	require_once ("$settings_dir/conf.php");

	include "messages.php";
	include "spiderfuncs.php";
	error_reporting (E_ALL ^ E_NOTICE ^ E_WARNING);

	include_once '../include/class.textExtract.php';//载入提取正文类
	
	$delay_time = 0;

	
	$command_line = 0;

	if (isset($_SERVER['argv']) && $_SERVER['argc'] >= 2) {
		$command_line = 1;
		$ac = 1; //参数计数器
		while ($ac < (count($_SERVER['argv']))) {
			$arg = $_SERVER['argv'][$ac];

			if ($arg  == '-all') {
				$all = 1;
				break;
			} else if ($arg  == '-u') {
				$url = $_SERVER['argv'][$ac+1];
				$ac= $ac+2;
			} else if ($arg  == '-f') {
				$soption = 'full';
				$ac++;
			} else if ($arg == '-d') {
				$soption = 'level';
				$maxlevel =  $_SERVER['argv'][$ac+1];;
				$ac= $ac+2;
			} else if ($arg == '-l') {
				$domaincb = 1;
				$ac++;
			} else if ($arg == '-r') {
				$reindex = 1;
				$ac++;
			} else if ($arg  == '-m') {
				$in =  str_replace("\\n", chr(10), $_SERVER['argv'][$ac+1]);
				$ac= $ac+2;
			} else if ($arg  == '-n') {
				$out =  str_replace("\\n", chr(10), $_SERVER['argv'][$ac+1]);
				$ac= $ac+2;
			} else {
				commandline_help();
				die();
			}
		
		}
	}

	
	if (isset($soption) && $soption == 'full') {
		$maxlevel = -1;

	}

	if (!isset($domaincb)) {
		$domaincb = 0;

	}

	if(!isset($reindex)) {
		$reindex=0;
	}

	if(!isset($maxlevel)) {
		$maxlevel=0;
	}


	if ($keep_log) {
		if ($log_format=="html") {
			$log_file =  $log_dir."/".Date("ymdHi").".html";
		} else {
			$log_file =  $log_dir."/".Date("ymdHi").".log";
		}
		
		if (!$log_handle = fopen($log_file, 'w')) {
			die ("日志选项已设置，但不能打开文件来记录.");
		}
	}
	
	if ($all ==  1) {
		index_all();
	} else {

		if ($reindex == 1 && $command_line == 1) {
			$result=mysql_query("select url, spider_depth, required, disallowed, can_leave_domain from ".$mysql_table_prefix."sites where url='$url'");
			echo mysql_error();
			if($row=mysql_fetch_row($result)) {
				$url = $row[0];
				$maxlevel = $row[1];
				$in= $row[2];
				$out = $row[3];
				$domaincb = $row[4];
				if ($domaincb=='') {
					$domaincb=0;
				}
				if ($maxlevel == -1) {
					$soption = 'full';
				} else {
					$soption = 'level';
				}
			}

		}
		if (!isset($in)) {
			$in = "";
		}
		if (!isset($out)) {
			$out = "";
		}

		index_site($url, $reindex, $maxlevel, $soption, $in, $out, $domaincb);

	}

	$tmp_urls  = Array();


	function microtime_float(){
	   list($usec, $sec) = explode(" ", microtime());
	   return ((float)$usec + (float)$sec);
	}

	
	function index_url($url, $level, $site_id, $md5sum, $domain, $indexdate, $sessid, $can_leave_domain, $reindex) {
		global $entities, $min_delay;
		global $command_line;
		global $min_words_per_page;
		global $supdomain;
		global $mysql_table_prefix, $user_agent, $tmp_urls, $delay_time, $domain_arr;
		$needsReindex = 1;
		$deletable = 0;

		$url_status = url_status($url);
		$thislevel = $level - 1;

		if (strstr($url_status['state'], "Relocation")) {
			$url = preg_replace("/ /", "", url_purify($url_status['path'], $url, $can_leave_domain));

			if ($url <> '') {
				$result = mysql_query("select link from ".$mysql_table_prefix."temp where link='$url' && id = '$sessid'");
				echo mysql_error();
				$rows = mysql_numrows($result);
				if ($rows == 0) {
					mysql_query ("insert into ".$mysql_table_prefix."temp (link, level, id) values ('$url', '$level', '$sessid')");
					echo mysql_error();
				}
			}

			$url_status['state'] == "redirected";
		}

		/*
		if ($indexdate <> '' && $url_status['date'] <> '') {
			if ($indexdate > $url_status['date']) {
				$url_status['state'] = "Date checked. Page contents not changed";
				$needsReindex = 0;
			}
		}*/
		ini_set("user_agent", $user_agent);
		if ($url_status['state'] == 'ok') {
			$OKtoIndex = 1;
			$file_read_error = 0;
			
			if (time() - $delay_time < $min_delay) {
				sleep ($min_delay- (time() - $delay_time));
			}
			$delay_time = time();
			if (!fst_lt_snd(phpversion(), "4.3.0")) {
				
				// 1. 初始化使用curl处理链接
				$ch = curl_init();
				// 2. 设置选项，包括URL
				curl_setopt($ch, CURLOPT_URL, $url);
				curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
				curl_setopt($ch, CURLOPT_HEADER, 0);
				// 3. 执行并获取HTML文档内容
				$file = curl_exec($ch);
				// 4. 释放curl句柄
				curl_close($ch);
				
				//$file = file_get_contents($url);
				if ($file === FALSE) {
					$file_read_error = 1;
				}
			} else {
				$fl = @fopen($url, "r");
				if ($fl) {
					while ($buffer = @fgets($fl, 4096)) {
						$file .= $buffer;
					}
				} else {
					$file_read_error = 1;
				}

				fclose ($fl);
			}
			if ($file_read_error) {
				$contents = getFileContents($url);
				$file = $contents['file'];
			}
			

			$pageSize = number_format(strlen($file)/1024, 2, ".", "");
			printPageSizeReport($pageSize);

			if ($url_status['content'] != 'text') {
				$file = extract_text($file, $url_status['content']);
			}

			printStandardReport('starting', $command_line);
		

			$newmd5sum = md5($file);
			

			if ($md5sum == $newmd5sum) {
				printStandardReport('md5notChanged',$command_line);
				$OKtoIndex = 0;
			} else if (isDuplicateMD5($newmd5sum)) {
				$OKtoIndex = 0;
				printStandardReport('duplicate',$command_line);
			}

			if (($md5sum != $newmd5sum || $reindex ==1) && $OKtoIndex == 1) {
				$urlparts = parse_url($url);
				$newdomain = $urlparts['host'];
				$type = 0;
				
		/*		if ($newdomain <> $domain)
					$domainChanged = 1;

				if ($domaincb==1) {
					$start = strlen($newdomain) - strlen($supdomain);
					if (substr($newdomain, $start) == $supdomain) {
						$domainChanged = 0;
					}
				}*/

				// remove link to css file
				//get all links from file
				$data = clean_file($file, $url, $url_status['content']);

				if ($data['noindex'] == 1) {
					$OKtoIndex = 0;
					$deletable = 1;
					printStandardReport('metaNoindex',$command_line);
				}
	

				$wordarray = unique_array(explode(" ", $data['content']));
	
				if ($data['nofollow'] != 1) {
					$links = get_links($file, $url, $can_leave_domain, $data['base']);
					$links = distinct_array($links);
					$all_links = count($links);
					$numoflinks = 0;
					//if there are any, add to the temp table, but only if there isnt such url already
					if (is_array($links)) {
						reset ($links);

						while ($thislink = each($links)) {
							if ($tmp_urls[$thislink[1]] != 1) {
								$tmp_urls[$thislink[1]] = 1;
								$numoflinks++;
								mysql_query ("insert into ".$mysql_table_prefix."temp (link, level, id) values ('$thislink[1]', '$level', '$sessid')");
								echo mysql_error();
							}
						}
					}
				} else {
					printStandardReport('noFollow',$command_line);
				}
				
				if ($OKtoIndex == 1) {
					
					$title = $data['title'];
					$host = $data['host'];
					$path = $data['path'];
					$fulltxt = $data['fulltext'];
					//提取正文
					$iTextExtractor = new textExtract($fulltxt);
					$fulltxt = $iTextExtractor->getPlainText();
					//提取正文
					//担一个随机图片
					$full_img=$data['full_img'];
					
					$desc = substr($data['description'], 0,254);
					$url_parts = parse_url($url);
					$domain_for_db = $url_parts['host'];
					
					if (isset($domain_arr[$domain_for_db])) {
						$dom_id = $domain_arr[$domain_for_db];
					} else {
						mysql_query("insert into ".$mysql_table_prefix."domains (domain) values ('$domain_for_db')");
						$dom_id = mysql_insert_id();
						$domain_arr[$domain_for_db] = $dom_id;
					}

					$wordarray = calc_weights ($wordarray, $title, $host, $path, $data['keywords']);

					//如果有字索引，将链接添加到数据库中，获得其ID，并添加文字+它们之间的关系
					if (is_array($wordarray) && count($wordarray) > $min_words_per_page) {
						if ($md5sum == '' && isset($title) && strlen($title)>5) {
							mysql_query ("insert into ".$mysql_table_prefix."links (site_id, url, title, description, fulltxt, indexdate, size, md5sum, level, img) values ('$site_id', '$url', '$title', '$desc', '$fulltxt', curdate(), '$pageSize', '$newmd5sum', $thislevel, '$full_img')");
							echo mysql_error();
							$result = mysql_query("select link_id from ".$mysql_table_prefix."links where url='$url'");
							echo mysql_error();
							$row = mysql_fetch_row($result);
							$link_id = $row[0];

							save_keywords($wordarray, $link_id, $dom_id);
							spider_travel($data['travel_data']);//抓取结伴
							
							//抓取评论
							spider_reviews($data['travel_data']);
							//var_dump($data['travel_data']);
							printStandardReport('indexed', $command_line);
						}else if (($md5sum <> '') && ($md5sum <> $newmd5sum)) { //如果页面发生了变化，开始更新

							$result = mysql_query("select link_id from ".$mysql_table_prefix."links where url='$url'");
							echo mysql_error();
							$row = mysql_fetch_row($result);
							$link_id = $row[0];
							for ($i=0;$i<=15; $i++) {
								$char = dechex($i);
								mysql_query ("delete from ".$mysql_table_prefix."link_keyword$char where link_id=$link_id");
								echo mysql_error();
							}
							save_keywords($wordarray, $link_id, $dom_id);
							$query = "update ".$mysql_table_prefix."links set title='$title', description ='$desc', fulltxt = '$fulltxt', indexdate=now(), size = '$pageSize', md5sum='$newmd5sum', level=$thislevel, img='$full_img' where link_id=$link_id";
							mysql_query($query);
							echo mysql_error();
							
							printStandardReport('re-indexed', $command_line);
						}
					}else {
						printStandardReport('minWords', $command_line);

					}
				}
			}
		} else {
			$deletable = 1;
			printUrlStatus($url_status['state'], $command_line);

		}
		if ($reindex ==1 && $deletable == 1) {
			check_for_removal($url); 
		} else if ($reindex == 1) {
			
		}
		if (!isset($all_links)) {
			$all_links = 0;
		}
		if (!isset($numoflinks)) {
			$numoflinks = 0;
		}
		printLinksReport($numoflinks, $all_links, $command_line);
		//echo $data['tra_title'].$data['user_img'];
	}


	function index_site($url, $reindex, $maxlevel, $soption, $url_inc, $url_not_inc, $can_leave_domain) {
		global $mysql_table_prefix, $command_line, $mainurl,  $tmp_urls, $domain_arr, $all_keywords;
		if (!isset($all_keywords)) {
			$result = mysql_query("select keyword_ID, keyword from ".$mysql_table_prefix."keywords");
			echo mysql_error();
			while($row=mysql_fetch_array($result)) {
				$all_keywords[addslashes($row[1])] = $row[0];
			}
		}
		$compurl = parse_url($url);
		if ($compurl['path'] == '')
			$url = $url . "/";
	
		$t = microtime();
		$a =  getenv("REMOTE_ADDR");
		$sessid = md5 ($t.$a);
	
	
		$urlparts = parse_url($url);
	
		$domain = $urlparts['host'];
		if (isset($urlparts['port'])) {
			$port = (int)$urlparts['port'];
		}else {
			$port = 80;
		}

		
	
		$result = mysql_query("select site_id from ".$mysql_table_prefix."sites where url='$url'");
		echo mysql_error();
		$row = mysql_fetch_row($result);
		$site_id = $row[0];
		
		if ($site_id != "" && $reindex == 1) {
			mysql_query ("insert into ".$mysql_table_prefix."temp (link, level, id) values ('$url', 0, '$sessid')");
			echo mysql_error();
			$result = mysql_query("select url, level from ".$mysql_table_prefix."links where site_id = $site_id");
			while ($row = mysql_fetch_array($result)) {
				$site_link = $row['url'];
				$link_level = $row['level'];
				if ($site_link != $url) {
					mysql_query ("insert into ".$mysql_table_prefix."temp (link, level, id) values ('$site_link', $link_level, '$sessid')");
				}
			}
			
			$qry = "update ".$mysql_table_prefix."sites set indexdate=now(), spider_depth = $maxlevel, required = '$url_inc'," .
					"disallowed = '$url_not_inc', can_leave_domain=$can_leave_domain where site_id=$site_id";
			mysql_query ($qry);
			echo mysql_error();
		} else if ($site_id == '') {
			mysql_query ("insert into ".$mysql_table_prefix."sites (url, indexdate, spider_depth, required, disallowed, can_leave_domain) " .
					"values ('$url', now(), $maxlevel, '$url_inc', '$url_not_inc', $can_leave_domain)");
			echo mysql_error();
			$result = mysql_query("select site_ID from ".$mysql_table_prefix."sites where url='$url'");
			$row = mysql_fetch_row($result);
			$site_id = $row[0];
		} else {
			mysql_query ("update ".$mysql_table_prefix."sites set indexdate=now(), spider_depth = $maxlevel, required = '$url_inc'," .
					"disallowed = '$url_not_inc', can_leave_domain=$can_leave_domain where site_id=$site_id");
			echo mysql_error();
		}
	
	
		$result = mysql_query("select site_id, temp_id, level, count, num from ".$mysql_table_prefix."pending where site_id='$site_id'");
		echo mysql_error();
		$row = mysql_fetch_row($result);
		$pending = $row[0];
		$level = 0;
		$domain_arr = get_domains();
		if ($pending == '') {
			mysql_query ("insert into ".$mysql_table_prefix."temp (link, level, id) values ('$url', 0, '$sessid')");
			echo mysql_error();
		} else if ($pending != '') {
			printStandardReport('continueSuspended',$command_line);
			mysql_query("select temp_id, level, count from ".$mysql_table_prefix."pending where site_id='$site_id'");
			echo mysql_error();
			$sessid = $row[1];
			$level = $row[2];
			$pend_count = $row[3] + 1;
			$num = $row[4];
			$pending = 1;
			$tmp_urls = get_temp_urls($sessid);
		}
	
		if ($reindex != 1) {
			mysql_query ("insert into ".$mysql_table_prefix."pending (site_id, temp_id, level, count) values ('$site_id', '$sessid', '0', '0')");
			echo mysql_error();
		}
	
	
		$time = time();
	
	
		$omit = check_robot_txt($url);
	
		printHeader ($omit, $url, $command_line);
	
	
		$mainurl = $url;
		$num = 0;
	
		while (($level <= $maxlevel && $soption == 'level') || ($soption == 'full')) {
			if ($pending == 1) {
				$count = $pend_count;
				$pending = 0;
			} else
				$count = 0;
	
			$links = array();
	
			$result = mysql_query("select distinct link from ".$mysql_table_prefix."temp where level=$level && id='$sessid' order by link");
			echo mysql_error();
			$rows = mysql_num_rows($result);
	
			if ($rows == 0) {
				break;
			}
	
			$i = 0;
	
			while ($row = mysql_fetch_array($result)) {
				$links[] = $row['link'];
			}
	
			reset ($links);
	
	
			while ($count < count($links)) {
				$num++;
				$thislink = $links[$count];
				$urlparts = parse_url($thislink);
				reset ($omit);
				$forbidden = 0;
				foreach ($omit as $omiturl) {
					$omiturl = trim($omiturl);
	
					$omiturl_parts = parse_url($omiturl);
					if ($omiturl_parts['scheme'] == '') {
						$check_omit = $urlparts['host'] . $omiturl;
					} else {
						$check_omit = $omiturl;
					}
	
					if (strpos($thislink, $check_omit)) {
						printRobotsReport($num, $thislink, $command_line);
						check_for_removal($thislink); 
						$forbidden = 1;
						break;
					}
				}
				
				if (!check_include($thislink, $url_inc, $url_not_inc )) {
					printUrlStringReport($num, $thislink, $command_line);
					check_for_removal($thislink); 
					$forbidden = 1;
				} 
	
				if ($forbidden == 0) {
					printRetrieving($num, $thislink, $command_line);
					$query = "select md5sum, indexdate from ".$mysql_table_prefix."links where url='$thislink'";
					$result = mysql_query($query);
					echo mysql_error();
					$rows = mysql_num_rows($result);
					if ($rows == 0) {
						index_url($thislink, $level+1, $site_id, '',  $domain, '', $sessid, $can_leave_domain, $reindex);

						mysql_query("update ".$mysql_table_prefix."pending set level = $level, count=$count, num=$num where site_id=$site_id");
						echo mysql_error();
					}else if ($rows <> 0 && $reindex == 1) {
						$row = mysql_fetch_array($result);
						$md5sum = $row['md5sum'];
						$indexdate = $row['indexdate'];
						index_url($thislink, $level+1, $site_id, $md5sum,  $domain, $indexdate, $sessid, $can_leave_domain, $reindex);
						mysql_query("update ".$mysql_table_prefix."pending set level = $level, count=$count, num=$num where site_id=$site_id");
						echo mysql_error();
					}else {
						printStandardReport('inDatabase',$command_line);
					}

				}
				$count++;
			}
			$level++;
		}
	
		mysql_query ("delete from ".$mysql_table_prefix."temp where id = '$sessid'");
		echo mysql_error();
		mysql_query ("delete from ".$mysql_table_prefix."pending where site_id = '$site_id'");
		echo mysql_error();
		printStandardReport('completed',$command_line);
	

	}

	function index_all() {
		global $mysql_table_prefix;
		$result=mysql_query("select url, spider_depth, required, disallowed, can_leave_domain from ".$mysql_table_prefix."sites");
		echo mysql_error();
    	while ($row=mysql_fetch_row($result)) {
    		$url = $row[0];
	   		$depth = $row[1];
    		$include = $row[2];
    		$not_include = $row[3];
    		$can_leave_domain = $row[4];
    		if ($can_leave_domain=='') {
    			$can_leave_domain=0;
    		}
    		if ($depth == -1) {
    			$soption = 'full';
    		} else {
    			$soption = 'level';
    		}
			index_site($url, 1, $depth, $soption, $include, $not_include, $can_leave_domain);
		}
	}			

	function get_temp_urls ($sessid) {
		global $mysql_table_prefix;
		$result = mysql_query("select link from ".$mysql_table_prefix."temp where id='$sessid'");
		echo mysql_error();
		$tmp_urls = Array();
    	while ($row=mysql_fetch_row($result)) {
			$tmp_urls[$row[0]] = 1;
		}
		return $tmp_urls;
			
	}

	function get_domains () {
		global $mysql_table_prefix;
		$result = mysql_query("select domain_id, domain from ".$mysql_table_prefix."domains");
		echo mysql_error();
		$domains = Array();
    	while ($row=mysql_fetch_row($result)) {
			$domains[$row[1]] = $row[0];
		}
		return $domains;
			
	}

	function commandline_help() {
		print "Usage（用法）: php spider.php <options>\n\n";
		print "选项:\n";
		print " -all\t\t Reindex everything in the database（在数据库重新索引一切）\n";
		print " -u <url>\t Set url to index（设置网址索引）\n";
		print " -f\t\t Set indexing depth to full (unlimited depth)（设置索引深入到全（无限深度））\n";
		print " -d <num>\t Set indexing depth to（设置索引深度） <num>\n";
		print " -l\t\t Allow spider to leave the initial domain（让蜘蛛离开初始域）\n";
		print " -r\t\t Set spider to reindex a site（设置蜘蛛重新索引网站）\n";
		print " -m <string>\t Set the string(s) that an url must include (use \\n as a delimiter between multiple strings)（必须包含（使用\\n作为多个字符串之间的分隔符））\n";
		print " -n <string>\t Set the string(s) that an url must not include (use \\n as a delimiter between multiple strings)（不包含（使用\\n作为多个字符串之间的分隔符））\n";
	}

	printStandardReport('quit',$command_line);
	if ($email_log) {
		$indexed = ($all==1) ? 'ALL' : $url;
		$log_report = "";
		if ($log_handle) {
			$log_report = "Log saved into $log_file";
		}
		mail($admin_email, "Sphider indexing report", "Sphider has finished indexing $indexed at ".date("y-m-d H:i:s").". ".$log_report);
	}
	if ( $log_handle) {
		fclose($log_handle);
	}
	
	
//保存网络图片
function GrabImage($url,$filename="") { 
	if($url=="") return false; 

	if($filename=="") { 
	$ext=strrchr($url,"."); 
	if($ext!=".gif" && $ext!=".jpg" && $ext!=".png") return false;
	$name=date("YmdHis").rand(1,999);
	$filename=dirname(dirname(dirname(__FILE__))).'/image/crawl/'.date('Y-m-d').'/'.$name.$ext; 
}

ob_start(); 
readfile($url); 
$img = ob_get_contents(); 
ob_end_clean(); 
$size = strlen($img); 

$fp2=@fopen($filename, "a"); 
fwrite($fp2,$img); 
fclose($fp2); 

return $filename; 
}

//抓取结伴内容
function spider_travel($travel_data){
	//抓取结伴内容
	$tra_title=$travel_data['tra_title'];//结伴标题
	$tra_user_img=$travel_data['user_img'];//会员头像
	$tra_username=$travel_data['user_name'];//会员名
	$tra_user_description=$travel_data['user_description'];//会员..
	$tra_lable=$travel_data['lable'];//标签
	$tra_godate=$travel_data['godate'];//出发时间
	$tra_route=$travel_data['route'];//路线
	$tra_content=$travel_data['content'];//正文内容
	$tra_content_img=$travel_data['content_img'];//正文图片
	$tra_adddate=$travel_data['adddate'];//发布日期
	//$tra_reviews=$travel_data['reviews'];//回复是一个数组
	if(!empty($tra_title)){
		mysql_query ("insert into s_spider_travel_info (title, user_name, user_description, user_img, label, go_date, route, content, content_img ,add_date) values ('$tra_title', '$tra_username', '$tra_user_description', '$tra_user_img','$tra_lable', '$tra_godate', '$tra_route', '$tra_content','$tra_content_img', '$tra_adddate')");
		echo mysql_error();
	}
}

//抓取评论
function spider_reviews($traviews){
	
	if(is_array($traviews['reviews']) && !empty($traviews['reviews'])){
		
		$tra_title=$traviews['tra_title'];//结伴标题tra_title
		$result = mysql_query("select spider_id from s_spider_travel_info where title='$tra_title'");
		echo mysql_error();
		while($row = mysql_fetch_array($result))
		  {
		  $spider_id=$row['spider_id'];
		  }
		  $count=count($traviews['reviews']['review_username']);
		  for($i=0;$i<$count;$i++){
		  		$review_username=$traviews['reviews']['review_username'][$i];
		  		$review_usersex=$traviews['reviews']['review_usersex'][$i];
		  		$review_content=$traviews['reviews']['review_content'][$i];
		  		$rmTime=$traviews['reviews']['rmTime'][$i];
		  		$user_img=$traviews['reviews']['reviews_user_img'][$i];
		  		mysql_query ("insert into s_spider_travel_review (travel_info_id, user_name, user_info, content, add_date, user_img) values ('$spider_id', '$review_username', '$review_usersex', '$review_content', '$rmTime', '$user_img')");
				echo mysql_error();
		  }
		}
	}
	//抓取结伴内容
?>
