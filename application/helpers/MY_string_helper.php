<?php
/**
* 多个连续空格只保留一个
* @param string $string 待转换的字符串
* @return string $string 转换后的字符串
*/
function merge_spaces($string){
    return preg_replace("/\s(?=\s)/","\\1",$string);
}


/**
* 把字符串折分成单字，中英文通用
* @param string $str 要拆分的字符串
*/
function split_string_to_array($str){
	//GBK/GB2312使用： 
	//preg_match_all("/[\x80-\xff]+/", $str, $chinese);
	//UTF-8 使用：
	preg_match_all("/[\x{4e00}-\x{9fa5}]+/u", $str, $chinese);
	//提取的中文字符串
	if(is_array($chinese) && count($chinese) != 0){
		foreach($chinese as $c_k=>$c_v){
			foreach($chinese[$c_k] as $b){
				$str_arr1[]=$b;
			}
		}
	}else{
		$str_arr1 = array();
	}
	
	//提取非中文字符
	$english = preg_replace("/[\x{4e00}-\x{9fa5}]+/u",'',$str);
	$str_arr2 = array($english);
	
	//合并两个数组
	if(isset($str_arr1) && count($str_arr1) !== 0 && count($str_arr2) !== 0){
		$str_arr = array_merge($str_arr1,$str_arr2);
	}elseif(isset($str_arr1) && count($str_arr1) !== 0 && count($str_arr2) == 0){
		$str_arr = $str_arr1;
	}elseif(!isset($str_arr1) && count($str_arr2) !== 0){
		$str_arr = $str_arr2;
	}else{
		$str_arr = array();
	}
	//去重
	$str_arr = array_unique($str_arr);
	
	sort($str_arr);
	return $str_arr;
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

// 第一个参数：传入要转换的字符串
// 第二个参数：取0，半角转全角；取1，全角到半角
function SBC_DBC($str, $args2='1') {
    $DBC = Array(
        '０' , '１' , '２' , '３' , '４' ,
        '５' , '６' , '７' , '８' , '９' ,
        'Ａ' , 'Ｂ' , 'Ｃ' , 'Ｄ' , 'Ｅ' ,
        'Ｆ' , 'Ｇ' , 'Ｈ' , 'Ｉ' , 'Ｊ' ,
        'Ｋ' , 'Ｌ' , 'Ｍ' , 'Ｎ' , 'Ｏ' ,
        'Ｐ' , 'Ｑ' , 'Ｒ' , 'Ｓ' , 'Ｔ' ,
        'Ｕ' , 'Ｖ' , 'Ｗ' , 'Ｘ' , 'Ｙ' ,
        'Ｚ' , 'ａ' , 'ｂ' , 'ｃ' , 'ｄ' ,
        'ｅ' , 'ｆ' , 'ｇ' , 'ｈ' , 'ｉ' ,
        'ｊ' , 'ｋ' , 'ｌ' , 'ｍ' , 'ｎ' ,
        'ｏ' , 'ｐ' , 'ｑ' , 'ｒ' , 'ｓ' ,
        'ｔ' , 'ｕ' , 'ｖ' , 'ｗ' , 'ｘ' ,
        'ｙ' , 'ｚ' , '－' , '　' , '：' ,
        '．' , '，' , '／' , '％' , '＃' ,
        '！' , '＠' , '＆' , '（' , '）' ,
        '＜' , '＞' , '＂' , '＇' , '？' ,
        '［' , '］' , '｛' , '｝' , '＼' ,
        '｜' , '＋' , '＝' , '＿' , '＾' ,
        '￥' , '￣' , '｀'
    );
    $SBC = Array( // 半角
        '0', '1', '2', '3', '4',
        '5', '6', '7', '8', '9',
        'A', 'B', 'C', 'D', 'E',
        'F', 'G', 'H', 'I', 'J',
        'K', 'L', 'M', 'N', 'O',
        'P', 'Q', 'R', 'S', 'T',
        'U', 'V', 'W', 'X', 'Y',
        'Z', 'a', 'b', 'c', 'd',
        'e', 'f', 'g', 'h', 'i',
        'j', 'k', 'l', 'm', 'n',
        'o', 'p', 'q', 'r', 's',
        't', 'u', 'v', 'w', 'x',
        'y', 'z', '-', ' ', ':',
        '.', ',', '/', '%', '#',
        '!', '@', '&', '(', ')',
        '<', '>', '"', '\'','?',
        '[', ']', '{', '}', '\\',
        '|', '+', '=', '_', '^',
        '$', '~', '`'
    );
    if ($args2 == 0) {
        return str_replace($SBC, $DBC, $str);  // 半角到全角
    } else if ($args2 == 1) {
        return str_replace($DBC, $SBC, $str);  // 全角到半角
    } else {
        return false;
    }
}