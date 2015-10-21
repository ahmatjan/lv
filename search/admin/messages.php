<?php 
	error_reporting (E_ALL);
$messages = Array (
 "noFollow" => Array (
	0 => " <font color=red><b>无后续标志设置</b></font>. ",
	1 => " 无后续标志设置."
 ),
 "inDatabase" => Array (
	0 => " <font color=red><b>已经在数据库中</b></font><br>",
	1 => "已经在数据库中\n"
 ),
 "completed" => Array (
	0 => "<br>完成时间 %cur_time.\n<br>",
	1 => "完成时间 %cur_time.\n"
 ),
 "starting" => Array (
	0 => " 开始索引时间 %cur_time.\n",
	1 => " 开始索引时间 %cur_time.\n"
	 ),
 "quit" => Array (
	0 => "</body></html>",
	1 => ""
 ),
 "pageRemoved" => Array (
	0 => " <font color=red>页面从索引中删除</font><br>\n",
	1 => " 页面从索引中删除\n"
 ),
  "continueSuspended" => Array (
	0 => "<br>继续暂停索引。<br>\n",
	1 => "继续暂停索引。\n"
 ),
  "indexed" => Array (
	0 => "<br><b> <font color=\"green\">索引</font></b><br>\n",
	1 => " \n索引\n"
 ),
"duplicate" => Array (
	0 => " <font color=\"red\"><b>页面重复</b></font><br>\n",
	1 => " 页面重复\n"
 ),
"md5notChanged" => Array (
	0 => " <font color=\"red\"><b>MD5校验和检查。网页内容没有改变</b></font><br>\n",
	1 => " MD5校验和检查。网页内容没有改变。\n"
 ),
"metaNoindex" => Array (
	0 => " <font color=\"red\">无索引标志meta标签设置.</font><br>\n",
	1 => " 无索引标志meta标签设置.\n"
 ),
  "re-indexed" => Array (
	0 => " <font color=\"green\">重新建立索引</font><br>\n",
	1 => " 重新建立索引\n"
 ),
"minWords" => Array (
	0 => " <font color=\"red\">页面小于 $min_words_per_page 个字</font><br>\n",
	1 => " 页面小于$min_words_per_page 个字.\n"
 )
);

function printRobotsReport($num, $thislink, $cl) {
	global $print_results, $log_format;
	$log_msg_txt = "$num. Link $thislink: 文件检查：robots.txt禁止爬行\n";
	$log_msg_html = "<b>$num</b>. Link <b>$thislink</b>: <font color=red>文件检查：robots.txt禁止爬行</font></br>";
	if ($print_results) {
		if ($cl==0) {
			print $log_msg_html; 
		} else {
			print $log_msg_txt;
		}
		flush();
	}
	if ($log_format=="html") {
		writeToLog($log_msg_html);
	} else {
		writeToLog($log_msg_txt);
	}

}

function printUrlStringReport($num, $thislink, $cl) {
	global $print_results, $log_format;
	$log_msg_txt = "$num. Link $thislink: 文件检查禁止的要求/不允许字符串规则。\n";
	$log_msg_html = "<b>$num</b>. Link <b>$thislink</b>: <font color=red>文件检查禁止的要求/不允许字符串规则。</font></br>";
	if ($print_results) {
		if ($cl==0) {
			print $log_msg_html;
		} else {
			print $log_msg_txt;
		}
		flush();
	}

	if ($log_format=="html") {
		writeToLog($log_msg_html);
	} else {
		writeToLog($log_msg_txt);
	}
}

function printRetrieving($num, $thislink, $cl) {
	global $print_results, $log_format;
	$log_msg_txt = "$num. 检索: $thislink 时间 " . date("H:i:s").".\n";
	$log_msg_html = "<b>$num</b>. 检索: <b>$thislink</b> 时间 " . date("H:i:s").".<br>\n";
	if ($print_results) {
		if ($cl==0) {
			print $log_msg_html;
		} else {
			print $log_msg_txt;
		}
		flush();
	}

	if ($log_format=="html") {
		writeToLog($log_msg_html);
	} else {
		writeToLog($log_msg_txt);
	}
}


function printLinksReport($numoflinks, $all_links, $cl) {
	global $print_results, $log_format;
	$log_msg_txt = " 找到合法链接: $all_links. 找到新链接: $numoflinks\n";
	$log_msg_html = " 找到链接: <font color=\"blue\"><b>$all_links</b></font>. 新链接: <font color=\"blue\"><b>$numoflinks</b></font><br>\n";
	if ($print_results) {
		if ($cl==0) {
			print $log_msg_html;
		} else {
			print $log_msg_txt;
		}
		flush();
	}

	if ($log_format=="html") {
		writeToLog($log_msg_html);
	} else {
		writeToLog($log_msg_txt);
	}
}

function printHeader($omit, $url, $cl) {
	global $print_results, $log_format;

	if (count($omit) > 0 ) {
		$urlparts = parse_url($url);
		foreach ($omit as $dir) {			
			$omits[] = $urlparts['scheme']."://".$urlparts['host'].$dir;
		}
	}
	
	$log_msg_txt = "Spidering $url\n";
	if (count($omit) > 0) {
		$log_msg_txt .= "robots.txt不允许的文件和目录\n";
		$log_msg_txt .= implode("\n", $omits);
		$log_msg_txt .= "\n\n";
	}

	$log_msg_html_1 = "<html><head><LINK REL=STYLESHEET HREF=\"admin.css\" TYPE=\"text/css\"></head>\n";
	$log_msg_html_1 .= "<body style=\"font-family:Verdana, Arial; font-size:12px\">";
	
	$log_msg_html_link = "[Back to <a href=\"admin.php\">admin</a>]";
	$log_msg_html_2 = "<p><font size=\"+1\">Spidering <b>$url</b></font></p>\n";

	if (count($omit) > 0) {
		$log_msg_html_2 .=  "robots.txt不允许的文件和目录<br>\n";
		$log_msg_html_2 .=  implode("<br>", $omits);
		$log_msg_html_2 .=  "<br><br>";
	}

	if ($print_results) {
		if ($cl==0) {
			print $log_msg_html_1.$log_msg_html_link.$log_msg_html_2;
		} else {
			print $log_msg_txt;
		}
		flush();
	}

	if ($log_format=="html") {
		writeToLog($log_msg_html_1.$log_msg_html_2);
	} else {
		writeToLog($log_msg_txt);
	}
}

function printPageSizeReport($pageSize) {
	global $print_results, $log_format;
	$log_msg_txt = "页面大小: $pageSize"."kb. ";
	if ($print_results) {
		print $log_msg_txt;
		flush();
	}

	writeToLog($log_msg_txt);
}

function printUrlStatus($report, $cl) {
	global $print_results, $log_format;
	$log_msg_txt = "$report\n";
	$log_msg_html = " <font color=red><b>$report</b></font><br>\n";
	if ($print_results) {
		if ($cl==0) {
			print $log_msg_html; 
		} else {
			print $log_msg_txt;
		}
		flush();
	}
	if ($log_format=="html") {
		writeToLog($log_msg_html);
	} else {
		writeToLog($log_msg_txt);
	}

}



function printConnectErrorReport($errmsg) {
	global $print_results, $log_format;
	$log_msg_txt = "建立连接失败。 ";
	$log_msg_txt .= $errmsg;

	if ($print_results) {
		print $log_msg_txt;
		flush();
	}

	writeToLog($log_msg_txt);
}



function writeToLog($msg) {
	global $keep_log, $log_handle;
	if($keep_log) {
		if (!$log_handle) {
			die ("无法为日志记录打开文件 ");
		}

		if (fwrite($log_handle, $msg) === FALSE) {
			die ("无法写入文件来记录。 ");
		}
	}
}


function printStandardReport($type, $cl) {
	global $print_results, $log_format, $messages;
	if ($print_results) {
		print str_replace('%cur_time', date("H:i:s"), $messages[$type][$cl]);
		flush();
	}

	if ($log_format=="html") {
		writeToLog(str_replace('%cur_time', date("H:i:s"), $messages[$type][0]));
	} else {
		writeToLog(str_replace('%cur_time', date("H:i:s"), $messages[$type][1]));
	}

}


?>