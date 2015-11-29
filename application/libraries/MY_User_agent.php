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

}