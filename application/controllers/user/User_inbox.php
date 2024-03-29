<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_inbox extends CI_Controller {
	public function __construct() {
		parent::__construct();
			$this->output->https_jump();
	}
	
	public function index()
	{
		$this->lang->load('user/user_inbox');
		$header['css_page_style']=array('public/css/bootstrap-tag.css','public/css/jquery.fancybox.css','public/css/jquery.fileupload-ui.css','public/css/inbox.css');
		
		$header['title']=$this->lang->line('heading_title');
		
		$this->public_section->get_header($header);
		$this->public_section->get_usertop();
		
		//开始主体程序
		//1、设置语言
		$data['text_title']=$this->lang->line('heading_title');
		$data['text_title_helper']=$this->lang->line('text_title_helper');
		
		//面包导航
		$data['breadcrumbs']=array(
			'home'			=>array(
								'name'=>$this->lang->line('text_home'),
								'url'=>site_url()
								),
			'user_center'		=>array(
								'name'=>$this->lang->line('text_user_home'),
								'url'=>site_url('user')
								),
			'setting'		=>array(
								'name'=>$this->lang->line('heading_title'),
								'this_url'=>site_url('user/user_inbox'),
								'url'=>''
								),
		);

		$this->load->view('user/user_inbox',$data);
		$this->public_section->get_footer();
	}
}
