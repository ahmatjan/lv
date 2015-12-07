<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Helper extends CI_Controller {
	public function __construct() {
		parent::__construct();
			$this->output->https_jump();
			$this->load->helper('string');
	}
	
	public function index()
	{
		$this->lang->load('about/helper');
		
		//if($this->agent->is_robot()){
			//return;
		//}
		//----------------------------------------------------------------------------------------------
		//header部分
		$header['css_page_style']=array('public/css/blog.css','public/css/search.css','public/css/jquery.fancybox.css','public/css/about-us.css');
		
		//开始主体程序
		//1、设置语言
		$data['text_title']=$this->lang->line('heading_title');
		$data['text_title_helper']=$this->lang->line('text_title_helper');
		
		$informations=array();
		if($this->uri->segment(2) !== NULL){
			$this->load->model('setting/information');
			$informations = $this->information->get_informationall('helper',$this->uri->segment(2));
		}
		
		if(empty($informations)){
			$data['error']='你所查找的内容不存在！';
		}
		//面包导航
		$this->config->load('permission');//加载配置文件
		$select_position = $this->config->item('infomation_position');
			
		//遍历$select_position
		foreach($select_position as $k=>$v){
			if($this->uri->segment(2) == $k){
				$position_name=$select_position[$k];
				$position_url=site_url('helper/'.$k);
			}
		}
			
		$data['breadcrumbs']=array(
			'home'			=>array(
								'name'=>$this->lang->line('text_home'),
								'url'=>site_url('home')
								),
			'setting'		=>array(
								'name'=> isset($position_name) ? $position_name : '没有内容',
								//'name'=>$this->lang->line('heading_title'),
								'this_url'=> isset($position_url) ? $position_url : site_url(),
								'url'=>''
								),
		);
		
		if(!empty($informations)){
			foreach($informations as $c_k=>$c_v){
				$informations[$c_k]['content'] = substr_cn(strip_tags($informations[$c_k]['content']),150);
			}
		}
		
		$data['informations'] = $informations;
		$header['title']=isset($position_name) ? $position_name : '没有内容';
		$this->public_section->get_header($header);
		$this->public_section->get_top();
		$this->load->view('about/helper',$data);
		$this->public_section->get_footer();
	}
	
	public function content(){
		$this->lang->load('about/helper');
		
		$informations=array();
		if($this->uri->segment(3) !== NULL){
			$this->load->model('setting/information');
			$informations=$this->information->select_information_forid($this->uri->segment(3));
		}
		
		if(empty($informations)){
			$data['error']='你所查找的内容不存在！';
		}
		
		//if($this->agent->is_robot()){
			//return;
		//}
		//----------------------------------------------------------------------------------------------
		//header部分
		$header['title']=$informations['title'];
		$header['css_page_style']='public/css/about-us.css';
		$header['meta_key']=$informations['title'];
		$header['meta_description']=substr_cn(strip_tags($informations['content']),80);
		$this->public_section->get_header($header);
		$this->public_section->get_top();
		
		//开始主体程序
		//1、设置语言
		$data['text_title']=$this->lang->line('heading_title');
		$data['text_title_helper']=$this->lang->line('text_title_helper');
		
		//面包导航
		$this->config->load('permission');//加载配置文件
		$select_position = $this->config->item('infomation_position');
		
		//遍历$select_position
		foreach($select_position as $k=>$v){
			if($this->uri->segment(2) == $k){
				$position_name=$select_position[$k];
				$position_url=site_url('helper/'.$k);
			}
		}
			
		$data['breadcrumbs']=array(
			'home'			=>array(
								'name'=>$this->lang->line('text_home'),
								'url'=>site_url('home')
								),
			'helper'		=>array(
								'name'=> isset($position_name) ? $position_name : '没有内容',
								'url'=> isset($position_url) ? $position_url : site_url(),
								),
			'setting'		=>array(
								'name'=> isset($informations['title']) ? $informations['title'] : '没有内容',
								'this_url'=> isset($informations['title']) ? site_url('helper/'.$this->uri->segment(2).'/'.$informations['information_id']) : site_url(),
								'url'=>''
								),
		);
		
		$data['informations']=$informations;
		
		$this->load->view('about/helper_content',$data);
		$this->public_section->get_footer();
	}
}
