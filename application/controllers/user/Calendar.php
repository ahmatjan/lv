<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class calendar extends CI_Controller {
	public function index()
	{
		$this->lang->load('user/calendar');
		$header['css_page_style']=array('public/css/bootstrap-tag.css','public/css/jquery.fancybox.css','public/css/fullcalendar.css');
		//header
		$header['title']=$this->lang->line('heading_title');
		
		$this->public_section->get_header($header);
		$this->public_section->get_usertop();
		//text
		//$data['text_email']=$this->lang->line('text_email');
		
		//bottom
		$data['text_signupbottom']=$this->lang->line('text_signupbottom');
		
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
								'url'=>site_url('user/user_center')
								),
			'setting'		=>array(
								'name'=>$this->lang->line('heading_title'),
								'this_url'=>site_url('user/Calendar'),
								'url'=>''
								),
		);

		$this->load->view('user/calendar',$data);
		$this->public_section->get_footer();
	}
}
