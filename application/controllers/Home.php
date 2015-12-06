<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {
	public function __construct() {
		parent::__construct();
		$this->output->https_jump();
		if(empty($this->uri->segment(2)) && $this->uri->segment(1) == 'home'){
			redirect(base_url(), 'location', 301);
			exit();
		}
	}
	
	public function index()
	{
		//$this->output->cache("3600");//缓存页面
		//if($this->agent->is_robot()){
			//return;
		//}
		//---------------------------------------------------------------------------------------------
		//块布局
		$this->load->module('common/module_middle');
		$data['module_middle']=$this->module_middle->index();
		
		//底部
		$this->load->module('common/module_bottom');
		$data['module_bottom'] = $this->module_bottom->index();
		
		//------------------------------------------------
		$this->load->model(array('common/image','travel/travel_con'));
		//header部分
		$header['title']='旅行兔，驴友网，爱摄影，背包客结伴去旅行';
		$header['css_page_style']=array('public/css/blog.css','public/css/jquery.fancybox.css','public/css/jquery.gritter.css');
		
		$this->public_section->get_header($header);
		$this->public_section->get_top();
		
/*
		//取结伴
		$travels=$this->travel_con->get_travel_noid();
		if(isset($travels)){//把网络图片拉回本地
			foreach($travels as $b=>$t){
				if(is_array($t)){
					foreach($t as $q=>$w){
						if($q=='user_img'){
							$travels[$b][$q]=$this->image->down_img($w);
						}
					}
				}
			}
		}
		$data['travels']=$travels;//结伴
		*/
		$this->load->view('home',$data);
		$this->public_section->get_footer();
	}
}
