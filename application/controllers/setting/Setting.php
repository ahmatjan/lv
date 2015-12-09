<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Setting extends CI_Controller {
	public function __construct() {
		parent::__construct();
			$this->output->https_jump();
	}
	
	public function index()
	{
		//判断权限
		$this->public_section->is_access('setting/setting');
		
		$this->lang->load('setting/setting');
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
								'url'=>site_url('user')
								),
			'setting'		=>array(
								'name'=>$this->lang->line('heading_title'),
								'this_url'=>site_url('setting/Setting'),
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
		
		$data['is_watermark']=$this->base_setting->get_setting('is_watermark');//是否以文件方式缓存图片
		
		$data['word_censor']=$this->base_setting->get_setting('word_censor');//过虑字符
		
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
		
		$this->load->view('setting/setting',$data);
		$this->public_section->get_footer();
	}
	
	//提交网站基础设置
	public function updata_setting(){
		//判断权限
		$this->public_section->is_modify('setting/setting');
		
		$this->load->model('setting/base_setting');
		//接收参数
		$data['website_name']=$this->input->post('website_name',TRUE);//网站名
		$data['website_title']=$this->input->post('website_title',TRUE);//网站标题前缀
		$data['mate_key']=$this->input->post('mate_key',TRUE);//网站标签关键词
		$data['mate_description']=$this->input->post('mate_description',TRUE);//网站标签描述
		$data['mate_author']=$this->input->post('mate_author',TRUE);//网站标签作者
		$data['quantity_view']=$this->input->post('quantity_view',TRUE);//前台显示条数
		$data['quantity_admin']=$this->input->post('quantity_admin',TRUE);//后台显示条数
		$data['article_check']=$this->input->post('article_check',TRUE);//是否审核文章
		$data['author_check']=$this->input->post('author_check',TRUE);//是否允许作者审核评论
		$data['https_pc']=$this->input->post('https_pc',TRUE);//pc
		$data['https_mobile']=$this->input->post('https_mobile',TRUE);//mobile
		$data['register_group']=$this->input->post('register_group',TRUE);//默认注册组
		$data['visitors_group']=$this->input->post('visitors_group',TRUE);//游客访问组
		$data['is_compactor']=$this->input->post('is_compactor',TRUE);//是否开启压缩
		$data['is_watermark']=$this->input->post('is_watermark',TRUE);//是否开启压缩
		$data['word_censor']=$this->input->post('word_censor',TRUE);//过虑字符
		
		if($this->validata_basesetting()!==FALSE){
			$this->base_setting->updata_base_setting($data);
			$this->session->set_flashdata('setting_success', '修改网站基础设置成功！');
			redirect('setting/setting');
		}else{
			$this->session->set_flashdata('setting_false', '网站设置没有被修改！');
			redirect('setting/setting');
		}
	}
	
	public function validata_basesetting()
	{
		//验证表单
		$this->load->library('form_validation');
		
		$this->form_validation->set_rules('website_name', '网站名称', 'required|max_length[128]');
		
		$this->form_validation->set_rules('website_title', '标题前缀', 'required|max_length[128]');
		
		$this->form_validation->set_rules('mate_key', '关键词', 'required|max_length[128]');
		
		$this->form_validation->set_rules('mate_description', '描述', 'required|max_length[128]');
		
		$this->form_validation->set_rules('mate_author', '作者', 'required|max_length[128]');
		
		$this->form_validation->set_rules('quantity_view', '前台显示条数', 'required|less_than_equal_to[100]');
		
		$this->form_validation->set_rules('quantity_admin', '后台显示条数', 'required|less_than_equal_to[100]');
		
		$this->form_validation->set_rules('register_group', '注册用户组', 'required|numeric|max_length[11]');
		
		$this->form_validation->set_rules('visitors_group', '访问组', 'required|numeric|max_length[11]');
		
		$this->form_validation->set_rules('article_check', '是否审核文章', 'required|integer|less_than_equal_to[3]');
		
		$this->form_validation->set_rules('author_check', '用户审核评论', 'required|integer|less_than_equal_to[3]');
		
		$this->form_validation->set_rules('https_pc', 'PC-SLL方式', 'required|integer|less_than_equal_to[3]');
		
		$this->form_validation->set_rules('https_mobile', 'MOBILE-SLL方式', 'required|integer|less_than_equal_to[3]');
		
		$this->form_validation->set_rules('is_compactor', '压缩输出方式', 'required|integer|less_than_equal_to[3]');
		
		$this->form_validation->set_rules('is_watermark', '是否添加水印', 'required|integer|less_than_equal_to[3]');
		
		$this->form_validation->set_rules('word_censor', '过虑字符', 'required|max_length[1000]');
		
		if($this->form_validation->run()!==TRUE){
			return FALSE;
		}
		
	}
}