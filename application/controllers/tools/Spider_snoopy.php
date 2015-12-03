<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Spider_snoopy extends CI_Controller {
	public function __construct() {
		parent::__construct();
		$this->load->library('snoopy');
		$this->load->model('tool/spider');
		$this->output->https_jump();
		set_time_limit (0);
	}

	public function index($url='')
	{
		$this->output->enable_profiler(TRUE);
		if(empty($url)){
			$url='http://www.lv.com/';
		}
		if($this->input->get('url')){
			$url = $this->input->get('url');
		}
		
		$this->get_urls($url);
		
		if(isset($_SESSION['spider_id'])){
			$snap_id = $_SESSION['spider_id'];
		}else{
			$snap_id = '1';
		}
		
		$snap_url = $this->spider->select_urlbyid($snap_id);//临时url
		if($snap_url !== FALSE){
			$this->session->set_userdata('spider_id', $snap_id + 1);
			$data['log']='继续';
			$data['url']=$snap_url;
			if(is_cli()){
				echo $data['log'].$data['url'].$snap_id.'<br/>';
			}else{
				$data['m']=(memory_get_usage() / 1024) / 1024; //获取当前占用内存
				$data['snap_id'] = $snap_id;
				$this->load->view('tools/spider_snoopy',$data);
			}
			
			$this->index($snap_url);
		}else{
			$data['log']='结束';
			$data['url']='';
			if(is_cli()){
				echo $data['log'].$data['url'].$snap_id.'<br/>';
			}else{
				$data['m']=(memory_get_usage() / 1024) / 1024; //获取当前占用内存
				$data['snap_id'] = $snap_id;
				$this->load->view('tools/spider_snoopy',$data);
			}
		}
		
	}
	
	//获取链接，并把链接压入已有数组，去重返回给index方法
	public function get_urls($url){
		$ssl = is_https()===TRUE ? 'https://' : 'http://' ;
		
		//如果链接不包含http://www
		if (strpos($url, $ssl) === false) {
			//如果不包含
			$url = $ssl.$url;
		}
		//如果没有www
		if (strpos($url, 'www') === false) {
			//如果不包含
			$url = $ssl.'www.'.substr($url,strpos($url,'//') + 2);
		}
		
		$this->snoopy->submitlinks($url);
		$urls = $this->snoopy->results;
		@$urls = array_unique($urls);
		
		$url_news = array();
		foreach ($urls as $u_k=>$u_v){//结果
			if(preg_match('#^'.$ssl.'([a-z0-9])+\.'.explode('.',$_SERVER['HTTP_HOST'])['1'].'\.(.[a-z]+)#i',$urls[$u_k])){
				if(preg_match('#html{1}#i',$urls[$u_k]))
			    {
			    	$url_news[] = $urls[$u_k];
			    	/*
			    	if($ssl == 'http://'){
						$url_news[] = str_replace(':80/','',$urls[$u_k]);
					}
					if($ssl == 'https://'){
						$url_news[] = str_replace(':443/','',$urls[$u_k]);
					}
					*/
			    }
		    }
		}
		if(!empty($url_news)){
			//数组不为空
			foreach ($url_news as $k=>$v){
				$data[$k]['url'] = $url_news[$k];
				$data[$k]['addtime'] = date("Y-m-d H:m:s");
				$data[$k]['is_spider'] = '0';
			}
			$this->spider->add_snapurl($data);
		}
	}
}