<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_manage extends CI_Controller {
	public function __construct() {
		parent::__construct();
			$this->output->https_jump();
	}
	
	public function index()
	{
		$this->lang->load('setting/user_manage');
		//header部分
		$header['title']=$this->lang->line('heading_title');
		$header['css_page_style']=array('public/css/chosen.css','public/css/daterangepicker.css','public/css/summernote.css','public/css/jquery.fancybox.css','public/css/select2_metro.css','public/css/multi-select-metro.css','public/css/DT_bootstrap.css');
		$this->public_section->get_header($header);
		$this->public_section->get_usertop();
		
		//1、设置语言
		$data['text_title']=$this->lang->line('heading_title');
		$data['text_title_helper']=$this->lang->line('text_title_helper');
		$data['text_select']=$this->lang->line('text_select');
		
		//面包导航
		$data['breadcrumbs']=array(
			'home'			=>array(
								'name'=>$this->lang->line('text_home'),
								'url'=>site_url()
								),
			'user_center'	=>array(
								'name'=>$this->lang->line('text_user_home'),
								'url'=>site_url('user/User_center')
								),
			'setting'		=>array(
								'name'=>$this->lang->line('heading_title'),
								'this_url'=>site_url('setting/layout'),
								'url'=>''
								)
		);
		
		//开始主体程序
		//接收一个选项卡位置（$data['tab_position']）
		$data['tab_position']=$this->input->get('tab_position');
		
		//获取第一组用户信息
		$this->load->model(array('user/user_info','user/user_group'));
		
		//用户信息
		$data['user_infos']=array();
		$user_infos=$this->user_info->get_userall();
		//遍历用户
		foreach($user_infos as $k=>$v){
			//$this->user_group->get_namebygroup_id('1');
			$user_infos[$k]['group_name']=$this->user_group->get_namebygroup_id($user_infos[$k]['group_id']);
		}
		
		$data['user_infos']=$user_infos;
		
		//用户组信息
		$data['groups']=$this->user_group->get_groupall();
		
		$this->load->view('setting/user_manage',$data);
		
		$this->public_section->get_footer();
	}
	
	//管理员登陆用户帐号
	public function login_user(){
		
		//传入用户id号
		$user_id=$this->input->get('user_id');
		//通过用户id登陆
		$this->load->model('user/user_info');
		$user_info=$this->user_info->get_userinfobyuser_id($user_id);
		if(isset($user_info)){
			//模拟登陆，把用户信息写入session
			$user_session = array(
		                   'username'  		=> $user_info['user_name'],
		                   'nick_name'  	=> $user_info['nick_name'],
		                   'user_image'  	=> $user_info['image'],
		                   'logged_in' 		=> TRUE
		               );
				
			$this->session->set_userdata($user_session);
			
			$this->session->set_flashdata('setting_success', '登陆用户成功！');
			redirect('user/user_center');		
		}else{
			$this->session->set_flashdata('setting_false', '登陆用户失败用户id不存在！');
			redirect('setting/user_manage');
		}
	}
	
	//编辑用户组
	public function edit_usergroup(){
		$this->lang->load('setting/setting_form');
		//header部分
		$header['title']=$this->lang->line('heading_title');
		$header['css_page_style']=array('public/css/chosen.css','public/css/daterangepicker.css','public/css/summernote.css','public/css/jquery.fancybox.css','public/css/select2_metro.css','public/css/multi-select-metro.css','public/css/DT_bootstrap.css');
		$this->public_section->get_header($header);
		$this->public_section->get_usertop();
		
		//开始主体程序
		//接收一个选项卡位置（$data['tab_position']）
		$data['tab_position']=$this->input->get('tab_position');
		
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
								'url'=>site_url('user/User_center')
								),
			'setting'		=>array(
								'name'=>$this->lang->line('heading_title'),
								'this_url'=>site_url('setting/Setting_form'),
								'url'=>''
								),
		);
		
		$this->load->helper('directory');
		$data['maps'] = directory_map(APPPATH.'controllers');
		
		//获取用户分组信息
		$group_infos=array();
		if($this->input->get('group_id')!==NULL){
			$this->load->model('user/user_group');
			$group_infos=$this->user_group->get_infobygroup_id($this->input->get('group_id'));
		}
		
		if($this->input->post('group_name')){
			$data['group_name']=$this->input->post('group_name');	
		}elseif(isset($group_infos['name'])){
			$data['group_name']=$group_infos['name'];
		}else{
			$data['group_name']='';
		}
		
		if($this->input->post('group_description')){
			$data['group_description']=$this->input->post('group_description');	
		}elseif(isset($group_infos['description'])){
			$data['group_description']=$group_infos['description'];
		}else{
			$data['group_description']='';
		}
		
		if($this->input->post('my_multi_select1')){
			$data['permission_view']=$this->input->post('my_multi_select1');	
		}elseif(isset($group_infos['permission_view'])){
			$data['permission_view']=unserialize($group_infos['permission_view']);
		}else{
			$data['permission_view']=array();
		}
		$co=count($data['permission_view']);
		
		if($this->input->post('my_multi_select2')){
			$data['permission_edit']=$this->input->post('my_multi_select2');	
		}elseif(isset($group_infos['permission_edit'])){
			$data['permission_edit']=unserialize($group_infos['permission_edit']);
		}else{
			$data['permission_edit']=array();
		}

		//group_id
		if($this->input->get('group_id')!==NULL){
			$data['group_id']=$this->input->get('group_id');
		}else{
			$data['group_id']='';
		}
		
		$this->load->view('setting/user_group_form',$data);
		$this->public_section->get_footer();
	}
	
	//添加或修改用户组
	public function edit_groupinfo(){
		/**
		* serialize($this->input->post('my_multi_select1'));  系列化数组
		* @var 
		* unserialize($data['permission_view'])                系列化转成数组
		*/
		$data['group_id']=$this->input->post('group_id');
		$data['name']=$this->input->post('group_name');
		$data['description']=$this->input->post('group_description');
		$data['permission_view']=serialize($this->input->post('my_multi_select1'));
		$data['permission_edit']=serialize($this->input->post('my_multi_select2'));
		
		if($this->validation_editgroupifo($data)!==FALSE){
			//把修改写入数据库
			$this->load->model('user/user_group');
			$this->user_group->int_group($data);
			$this->session->set_flashdata('setting_success', '用户组操作成功！');
			redirect('setting/user_manage?tab_position=tab_1_3');
		}else{
			$this->session->set_flashdata('setting_false', '用户组操作不成功！');
			redirect('setting/user_manage/edit_usergroup?group_id='.$this->input->post('group_id'));
		}
	}
	
	//验证用户组数据
	public function validation_editgroupifo($data){
		$this->load->library('form_validation');
		
		if($this->form_validation->validata($data['name'],array(array('required'),array('max_length',25)))!==TRUE){
			return FALSE;
		}
		
		if($this->form_validation->validata($data['description'],array(array('max_length',128)))!==TRUE){
			return FALSE;
		}
	}
}