<?php  if (!defined('BASEPATH')) exit('No direct script access allowed');

class MY_User_agent extends CI_User_agent
{
	function __construct()
    {
        parent::__construct();
        $this->CI =& get_instance();//$this->CI调用框架方法
    }
    
    //获取当前页完整url
    public function get_page_url(){
		$url = (NULL !== $this->CI->input->server('SERVER_PORT') && $this->CI->input->server('SERVER_PORT') == '443') ? 'https://' : 'http://';
		$url .= $this->CI->input->server('HTTP_HOST');
		$url .= $this->CI->input->server('REQUEST_URI') !== NULL ? $this->CI->input->server('REQUEST_URI') : urlencode($this->CI->input->server('PHP_SELF')) . '?' . urlencode($this->CI->input->server('QUERY_STRING'));
		return $url;
	}
}