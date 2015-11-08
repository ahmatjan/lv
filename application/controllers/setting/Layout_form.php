<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Layout_form extends CI_Controller {
	public function __construct() {
		parent::__construct();
			$this->output->https_jump();
	}
	
	public function index()
	{
		//判断权限
		$this->public_section->is_access('setting/layout_form');
		
		$this->lang->load('setting/layout_form');
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
								'this_url'=>site_url('setting/layout_form'),
								'url'=>''
								)
		);
		
		//开始主体程序
		//接收一个选项卡位置（$data['tab_position']）
		$data['tab_position']=$this->input->get('tab_position');
		
		//如果有id号，检索并显示
		if($this->input->get('layout_id')){
			$this->load->model('setting/layout_info');
			$data['layouts']=$this->layout_info->get_layout_forid($this->input->get('layout_id'));
		}
		if(!$this->input->get('layout_id')){
			$data['layouts']=array(
				'layout_id'=>'',
				'layout_name'=>'',
				'route'=>'',
			);
		}
		
		//如果有layout_module_id，检索并显示
		if($this->input->get('layout_module_id')){
			$this->load->model('setting/modules_info');
			$data['layout_module']=$this->modules_info->get_layout_module_forid($this->input->get('layout_module_id'));
			$this->load->model('setting/layout_info');
			$data['layout_module']['layout_name']=$this->layout_info->get_layout_forid($data['layout_module']['layout_id'])['layout_name'];
			$data['layout_module']['module_name']=$this->modules_info->get_module_forid($data['layout_module']['module_id'])['name'];
		}
		if(!$this->input->get('layout_module_id')){
			$data['layout_module']=array(
				'layout_module_id'=>'',
				'name'=>'',
				'layout_id'=>'',
				'module_id'=>'',
				'position'=>'',
				'sort'=>'10',
				'is_mobile'=>'',
				'layout_name'=>'',
				'module_name'=>'',
			);
		}
		
		//检索全部布局
		$this->load->model('setting/layout_info');
		$data['layouts_info']=$this->layout_info->get_layout_info();
		//检索全部插件模块
		$this->load->model('setting/modules_info');
		$data['modules_info']=$this->modules_info->get_module_info();
		
		$this->load->view('setting/layout_form',$data);
		
		$this->public_section->get_footer();
	}
	
	//添加一个布局路由
	function add_layout()
	{
		//判断权限
		$this->public_section->is_modify('setting/layout_form');
		
		$data['layout_name']=$this->input->post('layout_name');
		$data['layout_route']=$this->input->post('layout_route');
		$data['layout_id']=$this->input->post('layout_id');
		
		if($this->validation_route($data)!==FALSE){
			$this->load->model('setting/layout_info');
			$this->layout_info->int_layout_route($data);
			$this->session->set_flashdata('setting_success', '路由操作成功！');
			redirect(site_url('setting/layout'));
		}
		if($this->validation_route($data)==FALSE){
			$this->session->set_flashdata('setting_false', '路由操作不成功！');
			redirect(site_url('setting/layout_form').'?layout_id='.$data['layout_id']);
		}
	}
	
	//添加路由布局
	function add_layout_module()
	{
		//判断权限
		$this->public_section->is_modify('setting/layout_form');
		
		$data['layout_module_name']=$this->input->post('layout_module_name');
		$data['layout_id']=$this->input->post('layout_id');
		$data['module_id']=$this->input->post('module_id');
		$data['position']=$this->input->post('position');
		$data['sort']=$this->input->post('sort');
		$data['is_mobile']=$this->input->post('is_mobile');
		$data['layout_module_id']=$this->input->post('layout_module_id');
		
		if($this->validation_layout_module($data) !== FALSE){
			$this->load->model('setting/modules_info');
			$this->modules_info->int_layout_model($data);
			$this->session->set_flashdata('setting_success', '布局模块操作成功！');
			redirect(site_url('setting/layout'));
		}
		
		if($this->validation_layout_module($data) == FALSE){
			$this->session->set_flashdata('setting_false', '布局模块操作不成功！');
			redirect(site_url('setting/layout_form').'?layout_module_id='.$data['layout_module_id']);
		}
	}
	
	//验证路由表单
	public function validation_route($data){
		$this->load->library('form_validation');
		if($this->form_validation->validata($data['layout_name'],array(array('min_length',2),array('max_length',25),array('required')))!==TRUE){
			return FALSE;
		}
		
		if($this->form_validation->validata($data['layout_route'],array(array('min_length',2),array('max_length',255),array('required')))!==TRUE){
			return FALSE;
		}
	}
	
	//验证布局模块表单
	public function validation_layout_module($data){
		$this->load->library('form_validation');
		if($this->form_validation->validata($data['layout_module_name'],array(array('min_length',2),array('max_length',25),array('required')))!==TRUE){
			return FALSE;
		}
		
		if($this->form_validation->validata($data['layout_id'],array(array('max_length',2)))!==TRUE){
			return FALSE;
		}
		
		if($this->form_validation->validata($data['module_id'],array(array('max_length',2)))!==TRUE){
			return FALSE;
		}

		if($this->form_validation->validata($data['position'],array(array('max_length',25)))!==TRUE){
			return FALSE;
		}
		
		if($this->form_validation->validata($data['sort'],array(array('less_than_equal_to',9999),array('integer')))!==TRUE){
			return FALSE;
		}
		
		if($data['is_mobile'] == 0 || $data['is_mobile'] == 1){
			return TRUE;
		}
		
	}
	
}