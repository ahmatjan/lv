<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Article_content extends CI_Controller {
	public function __construct() {
		parent::__construct();
			$this->output->https_jump();
	}
	
	public function index()
	{
		$this->lang->load('article/article_content');
		//if($this->agent->is_robot()){
			//return;
		//}
		//----------------------------------------------------------------------------------------------
		//header部分
		
		$header['title']=$this->lang->line('heading_title');
		$header['css_page_style']=array('public/css/blog.css','public/css/jquery.fancybox.css','public/css/fullcalendar.css');
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
								'this_url'=>site_url('article/Article_content'),
								'url'=>''
								),
		);
		
		//块布局
		$this->load->module('common/module_middle');
		$data['module_middle']=$this->module_middle->index();
		
		//左侧布局
		$this->load->module('common/module_left');
		$data['module_left'] = $this->module_left->index();
		
		//右侧布局
		$this->load->module('common/module_right');
		$data['module_right'] = $this->module_right->index();
		
		//底部
		$this->load->module('common/module_bottom');
		$data['module_bottom'] = $this->module_bottom->index();
		
		$this->load->view('article/article_content',$data);
		$this->public_section->get_footer();
	}
}
