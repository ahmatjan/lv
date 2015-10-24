<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_page extends CI_Controller {
	public function __construct() {
		parent::__construct();
			$this->output->https_jump();
	}
	
	public function index()
	{
		$this->lang->load('user/user_page');
		$header['css_page_style']=array('public/css/bootstrap-fileupload.css','public/css/chosen.css','public/css/profile.css');
		
		$header['title']=$this->lang->line('heading_title');
		
		$this->public_section->get_header($header);
		$this->public_section->get_top();
		
		//开始主体程序
		//1、设置语言
		$data['text_title']=$this->lang->line('heading_title');
		$data['text_title_helper']=$this->lang->line('text_title_helper');
		
		//面包导航
		$data['breadcrumbs']=array(
			'home'			=>array(
								'name'=>$this->lang->line('text_home'),
								'url'=>site_url('home')
								),
			'setting'		=>array(
								'name'=>$this->lang->line('heading_title'),
								'this_url'=>site_url('user/User_page'),
								'url'=>''
								),
		);
		
		$this->load->view('user/user_page',$data);
		$this->public_section->get_footer();
	}
}
