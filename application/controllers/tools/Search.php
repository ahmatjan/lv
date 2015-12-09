<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Search extends CI_Controller {
	public function __construct() {
		parent::__construct();
		$this->output->https_jump();
		$this->load->helper(array('string','text'));
	}

	public function index()
	{
		$q_arr = array();
		if($this->input->get('query')){
			//$query = $this->input->get('query');
			$query = mb_substr($this->input->get('query'),0,30);
			$q_arr = str_split($query,3);
		}else{
			$query = '';
		}
		var_dump($q_arr);
		//块布局左
		$this->load->module('common/module_left');
		$data['module_left']=$this->module_left->index();
		
		//块布局右
		$this->load->module('common/module_right');
		$data['module_right']=$this->module_right->index();
		
		//底部
		$this->load->module('common/module_bottom');
		$data['module_bottom'] = $this->module_bottom->index();
		
		//设定span9的css样式
		if(!empty($data['module_right']) && empty($data['module_left'])){
			
			$header['style'] = '
			<style type="text/css">
			@media(min-width: 980px){
				.search .row-fluid .span9{
					padding-right: 150px;
				}
			}
			</style>
			';
		}
		
		//------------------------------------------------
		$this->load->model(array('tool/search_model'));
		$spider_all = $this->search_model->get_spider_all();
		
		$header['title']=$this->lang->line('heading_title');
		$header['css_page_style']=array('public/css/blog.css','public/css/jquery.fancybox.css','public/css/jquery.gritter.css');
		
		$this->public_section->get_header($header);
		$this->public_section->get_top();
		
		//遍历处理结果数组
		$data['results'] = array();
		foreach($spider_all as $s_k=>$s_v){
			//$mb_title = (mb_strlen($spider_all[$s_k]['title'],'utf-8') > '23' ? '...'.mb_substr($spider_all[$s_k]['title'],-5,5,'utf-8') : '');
			$spider[$s_k]['title'] = highlight_phrase(mb_substr($spider_all[$s_k]['title'],0,18,'utf-8') . (mb_strlen($spider_all[$s_k]['title'],'utf-8') > '23' ? '...'.mb_substr($spider_all[$s_k]['title'],-5,5,'utf-8') : ''),$query,'<span style="color: red;">', '</span>');
			$spider[$s_k]['url'] = $spider_all[$s_k]['url'];
			$spider[$s_k]['content'] = highlight_phrase(mb_strlen($spider_all[$s_k]['content'],'utf-8') > '100' ? mb_substr($spider_all[$s_k]['content'],0,100,'utf-8').'...' : mb_substr($spider_all[$s_k]['content'],0,100,'utf-8'),$query,'<span style="color: red;">', '</span>');
		}
		$data['results'] = $spider;
		
		$this->load->view('tools/search',$data);
		$this->public_section->get_footer();
	}
}