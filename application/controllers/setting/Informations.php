<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Informations extends CI_Controller {
	public function __construct() {
		parent::__construct();
			$this->output->https_jump();
			$this->load->model('setting/information');
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
		$data['informations'] = $this->information->select_informationall();
	
		if($this->input->get('information_id')!==NULL){
			$informations=$this->information->select_information_forid($this->input->get('information_id'));
		}
		if(@isset($informations)){
			$data['information_id']=$this->input->get('information_id');
			$data['title']=$informations['title'];
			$data['author']=$informations['author'];
			$data['class']=$informations['class'];
			$data['content']=$informations['content'];
			$data['position']=$informations['position'];
		}else{
			$data['information_id']='';
			$data['title']='';
			$data['author']='';
			$data['class']='';
			$data['content']='';
			$data['position']='';
		}
		
		$data['select_position']=array(
				'register_rule'=>'注册条款',
				'values'=>'网站价值观',
				'healper'=>'网站帮助',
				'user_healper'=>'用户中心帮助'
			);
			
		$data['select_rules']=array(
				'rule'=>'规则',
				'helper'=>'帮助'
			);
		
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
			$data['information_id']=$this->input->post('information_id');
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