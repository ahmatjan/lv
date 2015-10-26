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
