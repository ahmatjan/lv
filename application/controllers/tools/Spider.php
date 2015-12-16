<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Spider extends CI_Controller {
	public function __construct() {
		parent::__construct();
		$this->load->library('spider_func');
		//$this->load->library(array('user_agent'));
		$this->load->model('tool/spider_model');
		
		if(!is_cli()){
			$this->output->https_jump();
			//判断权限
			$this->public_section->is_access('tools/spider');
			//跳转
		}
		
		set_time_limit (0);
	}

	public function spider_index($url='http://www.lv.com/')
	{
		if(!is_cli()){
			if($this->input->get('url')){
				$url = $this->input->get('url');
			}
		}
		
		$url = str_replace("http://", "", $url);
		$url = str_replace("https://", "", $url);
		
		//要排除的链接后缀
		$this->spider_func->set_ignore(array("javascript:", ".css", ".js", ".ico", ".jpg", ".png", ".jpeg", ".swf", ".gif"));
		
		//添加站点
		$data['domain'] = $url;
		$this->spider_model->add_spider_site($data);
		
		//site_id
		$site = $this->spider_model->get_site($url);
		if($site !== FALSE){
			$site_id = $site['site_id'];
		}
		
		//要抓链接的网址
		$this->spider_func->get_links($url,$site_id);
	}
}