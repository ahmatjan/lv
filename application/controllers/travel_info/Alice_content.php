<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Alice_content extends CI_Controller {
	public function __construct() {
		parent::__construct();
			$this->output->https_jump();
	}
	
	public function index()
	{
		$this->load->model(array('travel/travel_con','common/image'));
		if($this->input->get('id')!==null){
			$travel_id=$this->input->get('id');
		}else{
			//redirect(site_url('travel_info/alice_content'));
			show_404();
		}
		$travel_contents=$this->travel_con->get_travel_content($travel_id);
		
		if(empty($travel_contents)){
			show_404();
		}else{//把网络图片拉回本地
			foreach($travel_contents as $k=>$v){
				if($k=='user_img'){
					
					$travel_contents[$k]=$this->image->down_img($v);
				}
			}
		}
		
		//读取回复
		$reviews=$this->travel_con->get_reviews($travel_contents['spider_id']);
		if(isset($reviews)){//把网络图片拉回本地
			foreach($reviews as $b=>$t){
				if(is_array($t)){
					foreach($t as $q=>$w){
						if($q=='user_img'){
							$reviews[$b][$q]=$this->image->down_img($w);
						}
					}
				}
			}
		}
		
		
		$this->lang->load('travel_info/alice_content');
		//if($this->agent->is_robot()){
			//return;
		//}
		//----------------------------------------------------------------------------------------------
		//header部分
		$header['title']=$travel_contents['title'];
		$header['css_page_style']=array('public/css/blog.css','public/css/jquery.fancybox.css','public/css/fullcalendar.css');
		$header['meta_description']=$travel_contents['title'];
		$header['meta_key']=$travel_contents['route'];
		$this->public_section->get_header($header);
		$this->public_section->get_top();
		
		
		//开始主体程序
		//1、设置语言
		$data['text_title']=$this->lang->line('heading_title');
		$data['text_title_helper']=$this->lang->line('text_title_helper');
		if(!empty($travel_contents)){
			$data['travels']=$travel_contents;
		}else{
			$data['travels']=array();
		}
		
		if(!empty($reviews['reviews'])){
			$data['reviews']=$reviews['reviews'];
		}else{
			$data['reviews']=array();
		}
		$data['recount']=$reviews['count'];
		
		//面包导航
		$data['breadcrumbs']=array(
			'home'			=>array(
								'name'=>$this->lang->line('text_home'),
								'url'=>site_url('home')
								),
			'travel_list'		=>array(
								'name'=>$this->lang->line('travel_list'),
								'url'=>site_url('travel_info/Alice_list')
								),
			'setting'		=>array(
								'name'=>$travel_contents['title'],
								'this_url'=>site_url('travel_info/Alice_content?id=').$travel_contents['spider_id'],
								'url'=>''
								),
		);

		$this->load->view('travel_info/alice_content',$data);
		$this->public_section->get_footer();
	}
}