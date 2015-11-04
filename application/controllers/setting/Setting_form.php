<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Setting_form extends CI_Controller {
	public function __construct() {
		parent::__construct();
			$this->output->https_jump();
			$this->output->is_access();
	}
	
	public function index()
	{
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

		//调一级目录
		$this->load->model('setting/nav_setting');
		$data['left_admins']=$this->nav_setting->get_parent_nav('admin');
		$data['left_helpers']=$this->nav_setting->get_parent_nav('helper');
		$data['view_tops']=$this->nav_setting->get_parent_nav('view_top');
		$data['admin_tops']=$this->nav_setting->get_parent_nav('admin_top');
		
		//调图标集
		$this->load->model('tool/ico_libray');
		$data['icons']=$this->ico_libray->select_icon();
		
		//接收或设置表单数据
		$get_nav_id=$this->input->get('nav_id');
		$get_nav_child_id=$this->input->get('nav_child_id');
		$data['navs']=array();
		if(isset($get_nav_id)){
			$nav_parent=$this->nav_setting->get_parent_navforid($get_nav_id);
			
			$data['navs']=array(
				'nav_id'=>$get_nav_id,//当前导航id
				'previ_name'=>'',//上一级目录为空
				'nav_name'=>$nav_parent['nav_name'],//一级目录名字
				'nav_ico'=>$nav_parent['nav_ico'],//一级目录图标
				'nav_class'=>$nav_parent['nav_class'],//显示位置
				'nav_url'=>$nav_parent['nav_url'],//一级链接
				'nav_store'=>$nav_parent['store'],//一级排序
				'nav_edit_start'=>$nav_parent['edit_start'],//能否被其它管理员修改
				'nav_view_start'=>$nav_parent['view_start'],//是否显示
			);
			
		}elseif(isset($get_nav_child_id)){
			$nav_child=$this->nav_setting->get_navschildforid($get_nav_child_id);
			
			$nav_parent=$this->nav_setting->get_parent_navforid($nav_child['parent_id']);
			$data['navs']=array(
				'nav_id'=>$get_nav_child_id,//当前导航id
				'previ_name'=>$nav_parent['nav_name'],//上一级目录为空
				'previ_id'=>$nav_parent['nav_id'],//上一级目录为空
				'nav_name'=>$nav_child['nav_child_name'],//一级目录名字
				'nav_ico'=>'',//一级目录图标
				'nav_class'=>'',//显示位置
				'nav_url'=>$nav_child['nav_child_url'],//一级链接
				'nav_store'=>$nav_child['store'],//一级排序
				'nav_edit_start'=>$nav_child['edit_start'],//能否被其它管理员修改
				'nav_view_start'=>$nav_child['view_start'],//是否显示
			);
			
		}else{
			$data['navs']=array(
				'nav_id'=>'',//当前导航id
				'previ_name'=>'',//上一级目录为空
				'nav_name'=>'',//一级目录名字
				'nav_ico'=>'',//一级目录图标
				'nav_class'=>'',//显示位置
				'nav_url'=>'',//一级链接
				'nav_store'=>'0',//一级排序
				'nav_edit_start'=>'',//能否被其它管理员修改
				'nav_view_start'=>'',//是否显示
			);
		}
		
		
		$this->load->view('setting/setting_form',$data);
		$this->public_section->get_footer();
	}
	
	//添加导航
	public function add_nav(){
		$this->load->model('setting/nav_setting');
		$data['top_navid']=$this->input->post('top_navid');//上一级目录id
		$data['top_navico']=$this->input->post('top_navico');//一级目录图标
		$data['navname']=$this->input->post('navname');//导航名
		$data['top_navurl']=$this->input->post('top_navurl');//导航链接
		$data['navstore']=$this->input->post('navstore');//导航排序
		$data['navlocation']=$this->input->post('navlocation');//导航显示位置
		$data['isview']=$this->input->post('isview');//是否显示
		$data['isedit']=$this->input->post('isedit');//是否允许其它管理员修改
		$data['nav_id']=$this->input->post('nav_id');//修改传过来的导航id
		
		if(!empty($data['top_navid'])){
			
			//子目录添加
			
			if($this->validation_child($data)!==FALSE){
				
				$this->nav_setting->int_child_nav($data);
				$this->session->set_flashdata('setting_success', '二级分类操作成功！');
				redirect('setting/setting');
			}else{
				
				$this->session->set_flashdata('setting_false', '二级分类操作不成功！');
				redirect('setting/setting_form');
			}
		}
		if(empty($data['top_navid'])){
			//一级目录添加
			if($this->validation_parent($data)!==FALSE){
				$this->nav_setting->int_parent_nav($data);
				$this->session->set_flashdata('setting_success', '一级分类操作成功！');
				redirect('setting/setting');
			}else{
				$this->session->set_flashdata('setting_false', '一级分类操作不成功！');
				redirect('setting/setting_form');
			}
		}
	}
	
	//验证一级导航表单
	public function validation_parent($data){
		$this->load->library('form_validation');
		if($this->form_validation->validata($data['top_navico'],array(array('min_length',2),array('max_length',25),array('required')))!==TRUE){
			return FALSE;
		}
		
		if(!empty($data['top_navurl'])){
			if($this->form_validation->validata($data['top_navurl'],array(array('max_length',255)))!==TRUE){
			return FALSE;
			}
		}
		if($this->form_validation->validata($data['navname'],array(array('min_length',2),array('max_length',25),array('required')))!==TRUE){
			return FALSE;
		}
		
		if($this->form_validation->validata($data['navstore'],array(array('less_than',10000),array('required')))!==TRUE){
			return FALSE;
		}
		
		if($this->form_validation->validata($data['navlocation'],array(array('min_length',2),array('max_length',25),array('required')))!==TRUE){
			return FALSE;
		}
		
		if($this->form_validation->validata($data['isedit'],array(array('alpha_numeric'),array('required')))==TRUE){
			return FALSE;
		}
		
		if($this->form_validation->validata($data['isview'],array(array('alpha_numeric'),array('required')))==TRUE){
			return FALSE;
		}
	}
	
	//验证子目录
	public function validation_child($data){
		$this->load->library('form_validation');
		
		if($this->form_validation->validata($data['top_navid'],array(array('alpha_numeric'),array('required'),array('max_length',25)))!==TRUE){
			return FALSE;
		}
		
		if(!empty($data['top_navurl'])){
			if($this->form_validation->validata($data['top_navurl'],array(array('max_length',255)))!==TRUE){
			return FALSE;
			}
		}
		
		if($this->form_validation->validata($data['navname'],array(array('min_length',2),array('max_length',25),array('required')))!==TRUE){
			return FALSE;
		}
		
		if($this->form_validation->validata($data['navstore'],array(array('less_than',10000),array('required')))!==TRUE){
			return FALSE;
		}
		
		if($this->form_validation->validata($data['isedit'],array(array('alpha_numeric'),array('required')))==TRUE){
			return FALSE;
		}
		
		if($this->form_validation->validata($data['isview'],array(array('alpha_numeric'),array('required')))==TRUE){
			return FALSE;
		}
		
	}
}