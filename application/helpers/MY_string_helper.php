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

/******************************************************************

* PHP截取UTF-8字符串，解决半字符问题。

* 英文、数字(半角)为1字节(8位)，中文(全角)为3字节

* @return 取出的字符串, 当$len小于等于0时, 会返回整个字符串

* @param $str 源字符串

* $len 左边的子串的长度

****************************************************************/

function substr_cn($str,$len)
{
	for($i=0;$i<$len;$i++)
	{
		$temp_str=substr($str,0,1);
		if(ord($temp_str) > 127)
		{
			$i++;
			if($i<$len)
			{
				$new_str[]=substr($str,0,3);
				$str=substr($str,3);
			}
		}
		else
		{
			$new_str[]=substr($str,0,1);
			$str=substr($str,1);
		}
	}
	return join($new_str);
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
