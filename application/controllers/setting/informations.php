<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Informations extends CI_Controller {
	public function __construct() {
		parent::__construct();
			$this->output->https_jump();
	}
	
	public function index()
	{
		//判断权限
		$this->public_section->is_access('setting/informations');
		
		$this->lang->load('setting/information');
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
								'this_url'=>site_url('setting/information'),
								'url'=>''
								)
		);
		
		//开始主体程序
		//接收一个选项卡位置（$data['tab_position']）
		$data['tab_position']=$this->input->get('tab_position');
		
		//处理接收数据
		$this->load->model('setting/base_setting');

		$data['website_name']=$this->base_setting->get_setting('website_name');

		
		$data['website_title']=$this->base_setting->get_setting('website_title');
		
		$data['mate_key']=$this->base_setting->get_setting('mate_key');
		
		$data['mate_description']=$this->base_setting->get_setting('mate_description');
		
		$data['mate_author']=$this->base_setting->get_setting('mate_author');
		
		$data['quantity_view']=$this->base_setting->get_setting('quantity_view');
		
		$data['quantity_admin']=$this->base_setting->get_setting('quantity_admin');
		
		$data['article_check']=$this->base_setting->get_setting('article_check');
		
		$data['author_check']=$this->base_setting->get_setting('author_check');
		
		$data['https_pc']=$this->base_setting->get_setting('https_pc');
		
		$data['https_mobile']=$this->base_setting->get_setting('https_mobile');
		
		$data['register_group']=$this->base_setting->get_setting('register_group');
		
		$data['visitors_group']=$this->base_setting->get_setting('visitors_group');
		
		$data['is_compactor']=$this->base_setting->get_setting('is_compactor');//是否压缩
		
		//----------------------------------后台分类设置-----------------------------------------------
		$this->load->model('setting/nav_setting');
		$nav_parents=$this->nav_setting->get_parent_nav('admin');

		foreach($nav_parents as $v){
			//$nav_childs=$this->nav_setting->get_child_nav($v['nav_id']);
			$nav_childs[]=$this->nav_setting->get_child_nav($v['nav_id']);
		}
		
		foreach($nav_parents as $k=>$v){
			$nav_parents[$k]['childs']=&$nav_childs[$k];
		}
		
		$data['navs']=$nav_parents;
		
		
		//----------------------------------帮助中心分类设置-----------------------------------------------
		//$this->load->model('setting/nav_setting');
		$nav_helpers=$this->nav_setting->get_parent_nav('helper');

		foreach($nav_helpers as $nav_helper){
			//$nav_childs=$this->nav_setting->get_child_nav($v['nav_id']);
			$nav_helper_childs[]=$this->nav_setting->get_child_nav($nav_helper['nav_id']);
		}
		
		foreach($nav_helpers as $k=>$v){
			$nav_helpers[$k]['childs']=&$nav_helper_childs[$k];
		}
		
		$data['nav_helpers']=$nav_helpers;
		
		//----------------------------------前台顶部列表-----------------------------------------------
		$nav_view_tops=$this->nav_setting->get_parent_nav('view_top');

		foreach($nav_view_tops as $nav_view_top){
			//$nav_childs=$this->nav_setting->get_child_nav($v['nav_id']);
			$nav_view_top_childs[]=$this->nav_setting->get_child_nav($nav_view_top['nav_id']);
		}
		
		foreach($nav_view_tops as $k=>$v){
			$nav_view_tops[$k]['childs']=&$nav_view_top_childs[$k];
		}
		
		$data['nav_view_tops']=$nav_view_tops;
		//var_dump($data['nav_view_tops']);
		
		//----------------------------------后台顶部列表-----------------------------------------------
		$nav_admin_tops=$this->nav_setting->get_parent_nav('admin_top');

		foreach($nav_admin_tops as $nav_admin_top){
			//$nav_childs=$this->nav_setting->get_child_nav($v['nav_id']);
			$nav_admin_top_childs[]=$this->nav_setting->get_child_nav($nav_admin_top['nav_id']);
		}
		
		foreach($nav_admin_tops as $k=>$v){
			$nav_admin_tops[$k]['childs']=&$nav_admin_top_childs[$k];
		}
		
		$data['nav_admin_tops']=$nav_admin_tops;
		//var_dump($data['nav_admin_tops']);
		
		//用户组
		$this->load->model('user/user_group');
		$data['user_groupalls']=$this->user_group->get_groupall();
		
		$this->load->view('setting/information',$data);
		$this->public_section->get_footer();
	}
	
	//添加文章
	public function add_information (){
		$this->load->library('form_validation');
		$this->form_validation->set_rules('title', '文章标题', 'required|min_length[2]|max_length[128]');
		$this->form_validation->set_rules('class', '文章类型', 'required|max_length[96]');
		$this->form_validation->set_rules('information_content', '文章内容', 'required|min_length[5]|max_length[2000]');
		$this->form_validation->set_rules('position', '显示位置', 'required|min_length[5]|max_length[25]');
		if ($this->form_validation->run() == TRUE){
			$data['title']=$this->input->post('title');
			$data['class']=$this->input->post('class');
			$data['position']=$this->input->post('position');
			$data['author']=$this->user->get_username();
			$data['information_content']=$this->input->post('information_content');
			$this->load->model('setting/information');//装载模型
			$this->information->add_information($data);
			$this->session->set_flashdata('setting_success', '文章操作成功！');
			redirect('setting/informations?tab_position=tab_1_2');
		}else{
			$this->session->set_flashdata('setting_false', '文章操作失败！');
			redirect('setting/informations?tab_position=tab_1_3');
		}
		
	}
}