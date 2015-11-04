<?php
/**
2
* 多个连续空格只保留一个
3
*
4
* @param string $string 待转换的字符串
5
* @return string $string 转换后的字符串
6
*/

function merge_spaces($string){
    return preg_replace("/\s(?=\s)/","\\1",$string);
}

//返回某字符在字符串中出现的次数
function str_toal($str,$re){
	$arr=explode($re,$str);
	return count($arr)-1;
}

/*
------------------------------------------------------
参数：
$str_cut    需要截断的字符串
$length     允许字符串显示的最大长度
程序功能：截取全角和半角（汉字和英文）混合的字符串以避免乱码
------------------------------------------------------
*/
function substr_cut($str_cut,$length)
{
    if (strlen($str_cut) > $length)
    {
        for($i=0; $i < $length; $i++)
        if (ord($str_cut[$i]) > 128)    $i++;
        $str_cut = substr($str_cut,0,$i)."..";
    }
    return $str_cut;
}

//获取字符串编码
function encode($string){
	return mb_detect_encoding($string, array("ASCII","UTF-8","GB2312","GBK","BIG5"));
}

//所有编码转utf_8
function gstr($str)
{   
$encode = mb_detect_encoding( $str, array('ASCII','UTF-8','GB2312','GBK'));
if ( !$encode =='UTF-8' ){
$str = iconv('UTF-8',$encode,$str);
}
return $str;
}