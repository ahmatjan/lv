<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_page extends CI_Controller {
	public function __construct() {
		parent::__construct();
			$this->output->https_jump();
	}
	
	public function index()
	{
		$this->load->model(array('user/user_info','common/image'));
		//通过user_id 查用户信息
		//基本资料
		$this->load->model(array('user/user_info','user/user_description','common/image'));
		$user_infos = $this->user_info->get_userid_info($this->uri->segment(2));
		$user_description = $this->user_description->get_userdescriptionforid($this->uri->segment(2));
		$users = array_merge($user_infos,$user_description);
		$data['user_infos'] = $users;//直接传入数组，用于不是修改输入框的显示内容
		
		$this->lang->load('user/user_page');
		$header['css_page_style']=array('public/css/bootstrap-fileupload.css','public/css/chosen.css','public/css/profile.css');
		
		$header['title']=$user_infos['nick_name'].'的主页';
		
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
								'name'=>$user_infos['nick_name'].'的空间',
								'this_url'=>site_url('user/'.$this->uri->segment(2)),
								'url'=>''
								),
		);
		
		$this->load->view('user/user_page',$data);
		$this->public_section->get_footer();
	}
}
