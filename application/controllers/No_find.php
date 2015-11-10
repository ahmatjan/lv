<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class No_find extends CI_Controller {
	public function __construct() {
		parent::__construct();
	}
	
	public function index()
	{
		//$this->output->cache("3600");//缓存页面
		//if($this->agent->is_robot()){
			//return;
		//}
		
		//header部分
		$header['title']='页面不存在';
		$header['css_page_style']=array('public/css/blog.css','public/css/jquery.fancybox.css','public/css/jquery.gritter.css','public/css/error.css');
		
		$this->public_section->get_header($header);
		$this->public_section->get_login_top();
		
		$data=array();
		
		$this->load->view('no_find',$data);
		//$this->public_section->get_footer();
	}
}
