<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Search extends CI_Controller {
	public function __construct() {
		parent::__construct();
		$this->output->https_jump();
		$this->load->model(array('tool/search_model'));
		$this->load->helper(array('string','text'));
	}

	public function index()
	{
		//搜索关键词
		if($this->input->get('query')){
			$search['query'] = $this->input->get('query');
			$query = mb_substr($this->input->get('query'),0,30);
		}else{
			$search['query'] = '';
			$query = '';
		}
		
		//搜索的类型and/or
		if($this->input->get('type')){
			$search['type'] = $this->input->get('type');
		}else{
			$search['type'] = 'or';
		}
		
		//url是否把链接加入搜索权重
		if($this->input->get('url')){
			$search['url'] = $this->input->get('url');
		}else{
			$search['url'] = '';
		}
		
		//每页显示多少条结果
		if($this->input->get('results')){
			$search['results'] = $this->input->get('results');
		}else{
			$search['results'] = '';
		}
		
		$spider_all = $this->search_model->get_spider_like($search);
		//搜索关键词
		
		
		//处理高亮显示，把字符串转成单字数组
		$q_arr = SBC_DBC($query,1);//全角转半角
		$q_arr = preg_replace("/\s/","",$q_arr);//去空格
		$q_arr = split_string_to_array($q_arr);
		$q_arr_count = count($q_arr);
		//处理高亮显示，把字符串转成单字数组
		
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
		
		$header['title']=$query;
		$header['css_page_style']=array('public/css/blog.css','public/css/jquery.fancybox.css','public/css/jquery.gritter.css');
		
		$this->public_section->get_header($header);
		$this->public_section->get_top();
		
		//遍历处理结果数组
		$data['results'] = array();
		foreach($spider_all as $s_k=>$s_v){
			//链接
			$spider[$s_k]['url'] = $spider_all[$s_k]['url'];
			
			//循环关键字，高亮
			//标题
			$title = mb_substr($spider_all[$s_k]['title'],0,18,'utf-8');
			//正文
			$content = mb_substr($spider_all[$s_k]['content'],0,100,'utf-8');
			for($i=0;$i<$q_arr_count;$i++){
				$title = highlight_phrase($title,$q_arr[$i]);
				
				$content = highlight_phrase($content,$q_arr[$i]);
			}
			$spider[$s_k]['title'] = $this->public_section->word_censor($title);//标题
			$spider[$s_k]['content'] = $this->public_section->word_censor($content);//正文
			
		}
		@$data['results'] = $spider;
		
		$this->load->view('tools/search',$data);
		$this->public_section->get_footer();
	}
}