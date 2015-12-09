<?php
/**
* 多个连续空格只保留一个
* @param string $string 待转换的字符串
* @return string $string 转换后的字符串
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

//过滤非法的敏感字符串
  function cleanYellow($txt){
  	$txt=str_replace(
  	array("黄色","性爱","做爱","我日","我草","我靠","尻","共产党","胡锦涛","毛泽东",
  	"政府","中央","研究生考试","性生活","色情","情色","我考","麻痹","妈的","阴道",
  	"淫","奸","阴部","爱液","阴液","臀","色诱","煞笔","傻比","阴茎","法轮功","性交","阴毛","江泽民"),
  	array("*1*","*2*","*3*","*4*","*5*","*6*","*7*","*8*","*9*","*10*",
  	"*11*","*12*","*13*","*14*","*15*","*16*","*17*","*18*","*19*","*20*",
  	"*21*","*22*","*23*","*24*","*25*","*26*","*27*","*28*","*29*","*30*","*31*","*32*","*33*","*34*"),
  	$txt);
  	return $txt;
  }