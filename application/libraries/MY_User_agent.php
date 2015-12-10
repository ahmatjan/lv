<?php  if (!defined('BASEPATH')) exit('No direct script access allowed');

class MY_User_agent extends CI_User_agent
{
	function __construct()
    {
        parent::__construct();
    }
    
    //获取当前页完整url
    public function get_page_url(){
		$url = (isset($_SERVER['SERVER_PORT']) && $_SERVER['SERVER_PORT'] == '443') ? 'https://' : 'http://';
		$url .= $_SERVER['HTTP_HOST'];
		$url .= isset($_SERVER['REQUEST_URI']) ? $_SERVER['REQUEST_URI'] : urlencode($_SERVER['PHP_SELF']) . '?' . urlencode($_SERVER['QUERY_STRING']);
		return $url;
	}
	
	//
	public function checkrobot($useragent=''){
    static $kw_spiders = array('bot', 'crawl', 'spider' ,'slurp', 'sohu-search', 'lycos', 'robozilla');
    static $kw_browsers = array('msie', 'netscape', 'opera', 'konqueror', 'mozilla');
 
    @$useragent = strtolower(empty($useragent) ? $_SERVER['HTTP_USER_AGENT'] : $useragent);
    if(strpos($useragent, 'http://') === false && $this->dstrpos($useragent, $kw_browsers)) return false;
    if($this->dstrpos($useragent, $kw_spiders)) return true;
    return false;
    }

	function dstrpos($string, $arr, $returnvalue = false) {
	    if(empty($string)) return false;
	    foreach((array)$arr as $v) {
	        if(strpos($string, $v) !== false) {
	            $return = $returnvalue ? $v : true;
	            return $return;
	        }
	    }
	    return false;
	}


}