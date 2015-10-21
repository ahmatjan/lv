<?php
/** 
* @method 多维数组转字符串 
* @param type $array 
* @return type $srting 
* @author yanhuixian 
*/  
function arrayToString($arr) {  
	if (is_array($arr)){
		return implode(',', array_map('arrayToString', $arr));  
	}
	return $arr;  
}
  
/** 
* @method 多维数组变成一维数组 
* @staticvar array $result_array 
* @param type $array 
* @return type $array 
* @author yanhuixian 
*/  
function array_multi2array($array) {
	static $result_array = array();  
	foreach ($array as $key => $value) {
		if (is_array($value)) {
			array_multi2array($value);  
		}
		else
			$result_array[$key] = $value;
		}
	return $result_array;
}

/**
 * 根据key的值是否相同去重
 *
 * @param
 *          array $arr
 * @param
 *          string $key
 *
 * @param
 *          boolean $sort
 *
 * @return array result
 */
function assoc_unique($arr, $key,$sort = false)
{
	if($arr)
	{
		$tmp_arr = array();
		foreach($arr as $k => $v)
		{
			if(in_array($v[$key], $tmp_arr))//搜索$v[$key]是否在$tmp_arr数组中存在，若存在返回true
			{
				unset($arr[$k]);
				//array_splice($arr,$k+1, 1);
			}
			else {
				$tmp_arr[] = $v[$key];
			}
		}
		if($sort)sort($arr); //sort函数对数组进行排序
		$new_arr = array();
		foreach ($arr as $key => $value) {
			$new_arr[] = $value;
		}
		return $new_arr;
	}
	return $arr;
}