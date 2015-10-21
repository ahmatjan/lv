<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class About_us extends CI_Controller {
	public function index()
	{
		$this->lang->load('about/about_us');
		
		//if($this->agent->is_robot()){
			//return;
		//}
		//----------------------------------------------------------------------------------------------
		//header部分
		$header['title']=$this->lang->line('heading_title');
		$header['css_page_style']='public/css/about-us.css';
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
								'this_url'=>site_url('about/About_us'),
								'url'=>''
								),
		);
		
		$this->load->view('about/about_us',$data);
		$this->public_section->get_footer();
	}
}
