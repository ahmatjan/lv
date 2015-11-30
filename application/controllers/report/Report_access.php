<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Report_access extends CI_Controller {
	public function __construct() {
		parent::__construct();
			$this->output->https_jump();
			$this->load->library('pagination');
	}
	
	public function index()
	{
		//判断权限
		$this->public_section->is_access('report/report_access');
		
		$this->lang->load('report/report_access');
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
								'this_url'=>site_url('report/report_access'),
								'url'=>''
								)
		);
		
		//开始主体程序
		//接收一个选项卡位置（$data['tab_position']）
		$data['tab_position']=$this->input->get('tab_position');
		
		//装载report模型
		$this->load->model(array('tool/report','user/user_info'));
		
		//开始获取用户访问数据
		//分页
		$config['full_tag_open'] = '<ul>';
		$config['full_tag_close'] = '</ul>';
		$config['first_link'] = '首页';
		$config['last_link'] = '尾页';
		$config['first_tag_open'] = '<li>';
		$config['next_tag_open'] = '<li>';
		$config['prev_tag_open'] = '<li>';
		$config['last_tag_open'] = '<li>';
		$config['cur_tag_open'] = '<li class="active"><a>';
		$config['num_tag_open'] = '<li>';
		$config['first_tag_close'] = '</li>';
		$config['next_tag_close'] = '</li>';
		$config['last_tag_close'] = '</li>';
		$config['prev_tag_close'] = '</li>';
		$config['cur_tag_close'] = '</a></li>';
		$config['num_tag_close'] = '</li>';
		$config['next_link'] = '下一页';
		$config['prev_link'] = '上一页';
		$config['base_url'] = site_url('report/report_access?tab_position=tab_1_2');
		$config['total_rows'] = $this->report->count_report_access();
		$config['per_page'] = $this->base_setting->get_setting('quantity_admin');//每页显示条数
		$config['page_query_string']=TRUE;
		$config['query_string_segment'] ='access_page';
		if($this->agent->is_mobile()){
			$config1['display_pages'] = FALSE;
		}else{
			$config1['num_links'] = '2';
		}

		$this->pagination->initialize($config);

		$data['access_page'] = $this->pagination->create_links();
		
		//获取用户访问数组
		if($this->input->get('access_page')){
			$access_start=$this->input->get('access_page');
		}else{
			$access_start=0;
		}

		$report_accesss=$this->report->get_report_accessall($access_start, $this->base_setting->get_setting('quantity_admin'));
		foreach ($report_accesss as $k=>$v) {
			$report_accesss[$k]['ip_address']=@unserialize($report_accesss[$k]['ip_address']);
			$report_accesss[$k]['user_name']=$this->user_info->get_userid_name($report_accesss[$k]['user_id']);
		}
		
		$data['report_accesss']=$report_accesss;
		//用户访问数据结束
		
		//开始获取流量统计数据
		$config1['full_tag_open'] = '<ul>';
		$config1['full_tag_close'] = '</ul>';
		$config1['first_link'] = '首页';
		$config1['last_link'] = '尾页';
		$config1['first_tag_open'] = '<li>';
		$config1['next_tag_open'] = '<li>';
		$config1['prev_tag_open'] = '<li>';
		$config1['last_tag_open'] = '<li>';
		$config1['cur_tag_open'] = '<li class="active"><a>';
		$config1['num_tag_open'] = '<li>';
		$config1['first_tag_close'] = '</li>';
		$config1['next_tag_close'] = '</li>';
		$config1['last_tag_close'] = '</li>';
		$config1['prev_tag_close'] = '</li>';
		$config1['cur_tag_close'] = '</a></li>';
		$config1['num_tag_close'] = '</li>';
		$config1['next_link'] = '下一页';
		$config1['prev_link'] = '上一页';
		$config1['base_url'] = site_url('report/report_access?tab_position=tab_1_3');
		$config1['total_rows'] = $this->report->count_report_flow();
		$config1['per_page'] = $this->base_setting->get_setting('quantity_admin');
		$config1['page_query_string']=TRUE;
		$config1['query_string_segment'] ='flow_page';
		if($this->agent->is_mobile()){
			$config1['display_pages'] = FALSE;
		}else{
			$config1['num_links'] = '2';
		}

		$this->pagination->initialize($config1);

		$data['flow_page'] = $this->pagination->create_links();
		
		//获取用户访问数组
		if($this->input->get('flow_page')){
			$flow_start=$this->input->get('flow_page');
		}else{
			$flow_start=0;
		}
		$data['report_flows']=$this->report->get_report_flowall($flow_start,$this->base_setting->get_setting('quantity_admin'));
		//获取流量统计数据结束
		
		//开始获取抓取记录
		$config2['full_tag_open'] = '<ul>';
		$config2['full_tag_close'] = '</ul>';
		$config2['first_link'] = '首页';
		$config2['last_link'] = '尾页';
		$config2['first_tag_open'] = '<li>';
		$config2['next_tag_open'] = '<li>';
		$config2['prev_tag_open'] = '<li>';
		$config2['last_tag_open'] = '<li>';
		$config2['cur_tag_open'] = '<li class="active"><a>';
		$config2['num_tag_open'] = '<li>';
		$config2['first_tag_close'] = '</li>';
		$config2['next_tag_close'] = '</li>';
		$config2['last_tag_close'] = '</li>';
		$config2['prev_tag_close'] = '</li>';
		$config2['cur_tag_close'] = '</a></li>';
		$config2['num_tag_close'] = '</li>';
		$config2['next_link'] = '下一页';
		$config2['prev_link'] = '上一页';
		$config2['base_url'] = site_url('report/report_access?tab_position=tab_1_5');
		$config2['total_rows'] = $this->report->count_report_robot();
		$config2['per_page'] = $this->base_setting->get_setting('quantity_admin');
		$config2['page_query_string']=TRUE;
		$config2['query_string_segment'] ='robot_page';
		if($this->agent->is_mobile()){
			$config1['display_pages'] = FALSE;
		}else{
			$config1['num_links'] = '2';
		}

		$this->pagination->initialize($config2);

		$data['robot_page'] = $this->pagination->create_links();
		
		//从数据库获取数据
		if($this->input->get('robot_page')){
			$robot_start=$this->input->get('robot_page');
		}else{
			$robot_start=0;
		}
		$data['report_robots']=$this->report->get_report_robotall($robot_start,$this->base_setting->get_setting('quantity_admin'));
		//获取抓取记录结束
		
		//开始获取抓取记录
		$config3['full_tag_open'] = '<ul>';
		$config3['full_tag_close'] = '</ul>';
		$config3['first_link'] = '首页';
		$config3['last_link'] = '尾页';
		$config3['first_tag_open'] = '<li>';
		$config3['next_tag_open'] = '<li>';
		$config3['prev_tag_open'] = '<li>';
		$config3['last_tag_open'] = '<li>';
		$config3['cur_tag_open'] = '<li class="active"><a>';
		$config3['num_tag_open'] = '<li>';
		$config3['first_tag_close'] = '</li>';
		$config3['next_tag_close'] = '</li>';
		$config3['last_tag_close'] = '</li>';
		$config3['prev_tag_close'] = '</li>';
		$config3['cur_tag_close'] = '</a></li>';
		$config3['num_tag_close'] = '</li>';
		$config3['next_link'] = '下一页';
		$config3['prev_link'] = '上一页';
		$config3['base_url'] = site_url('report/report_access?tab_position=tab_1_6');
		$config3['total_rows'] = $this->report->count_unkow();
		$config3['per_page'] = $this->base_setting->get_setting('quantity_admin');
		$config3['page_query_string']=TRUE;
		$config3['query_string_segment'] ='unknow_page';
		if($this->agent->is_mobile()){
			$config1['display_pages'] = FALSE;
		}else{
			$config1['num_links'] = '2';
		}

		$this->pagination->initialize($config3);

		$data['unknow_page'] = $this->pagination->create_links();
		
		//从数据库获取数据
		if($this->input->get('unknow_page')){
			$unknow_start=$this->input->get('unknow_page');
		}else{
			$unknow_start=0;
		}
		$data['report_unknows']=$this->report->unknowspider($unknow_start,$this->base_setting->get_setting('quantity_admin'));
		//获取抓取记录结束
		
		$this->load->view('report/report_access',$data);
		
		$this->public_section->get_footer();
	}
}