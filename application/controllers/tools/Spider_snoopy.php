<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Spider_snoopy extends CI_Controller {
	public function __construct() {
		parent::__construct();
			$this->load->library('snoopy');
			$this->output->https_jump();
			set_time_limit (0);
	}

	public function index($url='http://www.lv.com')
	{
		$url_new = $this->get_urls($url);
		$url_all = array_merge_recursive($url_old,$url_new);
		$this->url=array_shift($url_all);
		echo $this->url;
		
		$data['log']='继续';
		$data['url']=$url;
		
		if(is_cli()){
				
		}else{
			$this->load->view('tools/spider_snoopy',$data);
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
		
		$this->snoopy->fetchlinks($url);
		$urls = $this->snoopy->results;
		$urls = array_unique($urls);
		
		
		$url_news = array();
		foreach ($urls as $u_k=>$u_v){//结果
			if(preg_match('#^'.$ssl.'([a-z0-9])+\.'.explode('.',$_SERVER['HTTP_HOST'])['1'].'\.(.[a-z]+)#i',$urls[$u_k])){
				if(preg_match('#html{1}#i',$urls[$u_k]))
			    {
			    	if($ssl == 'http://'){
						$url_news[] = str_replace(':80/','',$urls[$u_k]);
					}
					if($ssl == 'https://'){
						$url_news[] = str_replace(':443/','',$urls[$u_k]);
					}
			    }
		    }
		}
		return $url_news;
	}
}