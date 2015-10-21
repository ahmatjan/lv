<?php
/*******************************************
* Sphider Version 1.3.x
* This program is licensed under the GNU GPL.
* By Ando Saabas          ando(a t)cs.ioc.ee
********************************************/
error_reporting(E_ALL & ~E_DEPRECATED);
//error_reporting(E_ALL ^ E_NOTICE ^ E_WARNING); 
//error_reporting(E_ALL);
require_once '../application/core/compactor.php';

$include_dir = "./include"; 
include ("$include_dir/commonfuncs.php");
//extract(getHttpVars());

if (isset($_GET['query']))
	$query = $_GET['query'];
if (isset($_GET['search']))
	$search = $_GET['search'];
if (isset($_GET['domain'])) 
	$domain = $_GET['domain'];
if (isset($_GET['type'])) 
	$type = $_GET['type'];
if (isset($_GET['catid'])) 
	$catid = $_GET['catid'];
if (isset($_GET['category'])) 
	$category = $_GET['category'];
if (isset($_GET['results'])) 
	$results = $_GET['results'];
if (isset($_GET['start'])) 
	$start = $_GET['start'];
if (isset($_GET['adv'])) 
	$adv = $_GET['adv'];

$include_dir = "./include"; 
$template_dir = "./templates"; 
$settings_dir = "./settings"; 
$language_dir = "./languages";


require_once("$settings_dir/database.php");
require_once("$language_dir/cn-language.php");
require_once("$include_dir/searchfuncs.php");
require_once("$include_dir/categoryfuncs.php");

include "$settings_dir/conf.php";

//压缩html文件
function cp_file ($filename){
	$extension = pathinfo($filename, PATHINFO_EXTENSION);//返回文件名(包括后缀)
	$old_name=dirname(__FILE__).'/templates/lvxingto/'.$filename;
	$new_name=dirname(__FILE__).'/templates/lvxingto/min/'.substr($filename, 0, strrpos($filename, '.')).'_min.'.$extension;
	if(!is_file($new_name) || filemtime($old_name) > filectime($new_name)){
		$newfile = fopen($new_name, "w") or die("无法打开文件！");
		$txt=file_get_contents($old_name);
		$compactor = new Compactor(array(
			'buffer_echo' => false
		));
		$txt = $compactor->squeeze($txt);
		fwrite($newfile, $txt);
		fclose($newfile);
	}
	return $new_name;
}
//压缩html文件

function poweredby () {
	global $sph_messages;
    //If you want to remove this, please donate to the project at http://www.sphider.eu/donate.php
    print $sph_messages['Powered by'];?> <a href="http://www.lvxingto.com/">&copy;<?echo '2014.05--'.date("Y.m")?> lvxingto</a> | 滇ICP备15003514号-1 | <a href="#">微信公众号</a> | <a href="http://www.lv.com/about/about_us.html">关于我们<a>

    <?php 
}

//头部变量
$search_title=!empty(@$query)? @$query.'|旅行兔':'旅行兔';
$favicon_ico=$base_url.'/public/image/favicon.ico';

include cp_file('header.html');
include "$language_dir/$language-language.php";

if ($type != "or" && $type != "and" && $type != "phrase") { 
	$type = "and";
}

if (preg_match("/[^a-z0-9-.]+/", $domain)) {
	$domain="";
}


if ($results != "") {
	$results_per_page = $results;
}

if (get_magic_quotes_gpc()==1) {
	$query = stripslashes($query);
} 

if (!is_numeric($catid)) {
	$catid = "";
}

if (!is_numeric($category)) {
	$category = "";
} 



if ($catid && is_numeric($catid)) {

	$tpl_['category'] = sql_fetch_all('SELECT category FROM '.$mysql_table_prefix.'categories WHERE category_id='.(int)$_REQUEST['catid']);
}
	
$count_level0 = sql_fetch_all('SELECT count(*) FROM '.$mysql_table_prefix.'categories WHERE parent_num=0');
$has_categories = 0;

if ($count_level0) {
	$has_categories = $count_level0[0][0];
}

if(empty($query) && empty($catid)){
	require_once(cp_file('search_form1.html'));
}elseif(!empty($catid)){
	$cats = get_categories_view();
	require_once(cp_file('search_option.html'));
}elseif(!empty($query)){
	$cats = get_categories_view();
	require_once(cp_file('search_option.html'));
}


function getmicrotime(){
    list($usec, $sec) = explode(" ",microtime());
    return ((float)$usec + (float)$sec);
}


function saveToLog ($query, $elapsed, $results) {
        global $mysql_table_prefix;
    if ($results =="") {
        $results = 0;
    }
    $query =  "insert into ".$mysql_table_prefix."query_log (query, time, elapsed, results) values ('$query', now(), '$elapsed', '$results')";
	mysql_query($query);
                    
	echo mysql_error();
                        
}
/*
switch ($search) {
	case 1:

		if (!isset($results)) {
			$results = "";
		}
		*/
		$search_results = get_search_results($query, $start, $category, $type, $results, $domain);
		
		if(!empty($query) || !empty($catid)){
			require(cp_file('search_results.html'));
		}
		//require("$template_dir/lvxingto/search_results.html");
		/*
	break;
	*/
	/*
	default:
		if ($show_categories) {
			if ($_REQUEST['catid']  && is_numeric($catid)) {
				$cat_info = get_category_info($catid);
			} else {
				$cat_info = get_categories_view();
			}
			
			if(!empty($query)){
				require("$template_dir/lvxingto/search_categories.html");
			}
		}
	break;
	*/
	//}
if(!empty($query) || !empty($catid)){
	
	include cp_file('footer.html');
}
?>
