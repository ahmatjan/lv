<?php
	/** 
	*获取访问当前链接的上级链接
	* 如果上级链接为空返回home
	*/  
	function pre_url() {  
		$url=$_SERVER['HTTP_REFERER'];
		if(!empty($url)){
			return $url;
		}else{
			return 'home';
		}
	}  