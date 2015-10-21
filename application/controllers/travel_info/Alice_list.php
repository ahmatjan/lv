<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Alice_list extends CI_Controller {
	public function index()
	{
		$this->lang->load('travel_info/alice_list');
		//if($this->agent->is_robot()){
			//return;
		//}
		//----------------------------------------------------------------------------------------------
		//$this->output->cache(3/60);
		//header部分
		$header['title']=$this->lang->line('heading_title');
		$header['css_page_style']=array('public/css/blog.css','public/css/search.css','public/css/jquery.fancybox.css');
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
								'this_url'=>site_url('travel_info/Alice_list'),
								'url'=>''
								),
		);
		
		$this->load->view('travel_info/alice_list',$data);
		$this->public_section->get_footer();
	}
}
