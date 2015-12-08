<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Search extends CI_Controller {
	public function __construct() {
		parent::__construct();
		$this->output->https_jump();
	}

	public function index()
	{
		//块布局左
		$this->load->module('common/module_left');
		$data['module_left']=$this->module_left->index();
		
		//块布局右
		$this->load->module('common/module_right');
		$data['module_right']=$this->module_right->index();
		
		//底部
		$this->load->module('common/module_bottom');
		$data['module_bottom'] = $this->module_bottom->index();
		
		//------------------------------------------------
		$this->load->model(array('common/image'));
		
		$header['title']=$this->lang->line('heading_title');
		$header['css_page_style']=array('public/css/blog.css','public/css/jquery.fancybox.css','public/css/jquery.gritter.css');
		$this->public_section->get_header($header);
		$this->public_section->get_top();
		
		$this->load->view('tools/search',$data);
		$this->public_section->get_footer();
	}
}