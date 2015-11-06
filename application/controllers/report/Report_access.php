<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Report_access extends CI_Controller {
	public function __construct() {
		parent::__construct();
			$this->output->https_jump();
	}
	
	public function index()
	{
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
								'url'=>site_url('user/User_center')
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
		if(!$this->input->get('access_page')){//如果页码为空
			$access_page='1';
		}else{
			$access_page=$this->input->get('access_page');
		}
		$access_start=($access_page-1)*$this->base_setting->get_setting('quantity_admin');
		$access_end=($access_page-1)*$this->base_setting->get_setting('quantity_admin')+$this->base_setting->get_setting('quantity_admin');
		
		//获取用户访问数组
		$report_accesss=$this->report->get_report_accessall($access_start,$access_end);
		foreach ($report_accesss as $k=>$v) {
			$report_accesss[$k]['ip_address']=unserialize($report_accesss[$k]['ip_address']);
			$report_accesss[$k]['user_name']=$this->user_info->get_userid_name($report_accesss[$k]['user_id']);
		}
		
		$data['report_accesss']=$report_accesss;
		//用户访问数据结束
		
		//开始获取流量统计数据
		if(!$this->input->get('flow_page')){//如果页码为空
			$flow_page='1';
		}else{
			$flow_page=$this->input->get('flow_page');
		}
		$flow_start=($flow_page-1)*$this->base_setting->get_setting('quantity_admin');
		$flow_end=($flow_page-1)*$this->base_setting->get_setting('quantity_admin')+$this->base_setting->get_setting('quantity_admin');
		
		//获取用户访问数组
		$data['report_flows']=$this->report->get_report_flowall($flow_start,$flow_end);
		//获取流量统计数据结束
		
		//开始获取抓取记录
		if(!$this->input->get('robot_page')){//如果页码为空
			$robot_page='1';
		}else{
			$robot_page=$this->input->get('robot_page');
		}
		$robot_start=($robot_page-1)*$this->base_setting->get_setting('quantity_admin');
		$robot_end=($robot_page-1)*$this->base_setting->get_setting('quantity_admin')+$this->base_setting->get_setting('quantity_admin');
		//从数据库获取数据
		$data['report_robots']=$this->report->get_report_robotall($robot_start,$robot_end);
		//获取抓取记录结束
		
		//表的记录条数，用于分页
		$data['count_report_access']=$this->report->count_report_access();
		$data['count_report_flow']=$this->report->count_report_flow();
		$data['count_report_robot']=$this->report->count_report_robot();
		
		//当前活动的页码
		$data['access_active']=$access_page;
		$data['flow_active']=$flow_page;
		$data['robot_active']=$robot_page;
		
		//每页显示条数
		$data['item']=$this->base_setting->get_setting('quantity_admin');
		
		$this->load->view('report/report_access',$data);
		
		$this->public_section->get_footer();
	}
}