<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Spider extends CI_Controller {
	public function __construct() {
		parent::__construct();
		$this->load->library('spider_func');
		$this->load->model('tool/spider_model');
		$this->output->https_jump();
		set_time_limit (0);
	}

	public function spider_index($url='')
	{
		if(empty($url)){
			$url='http://www.lv.com/';
		}
		if($this->input->get('url')){
			$url = $this->input->get('url');
		}
		
		//$this->get_urls($url);
		
		if(isset($_SESSION['spider_id'])){
			$snap_id = $_SESSION['spider_id'];
			$snap_url = $this->spider_model->select_urlbyid($snap_id);//临时url
		}else{
			//要排除的链接后缀
			$this->spider_func->set_ignore(array("javascript:", ".css", ".js", ".ico", ".jpg", ".png", ".jpeg", ".swf", ".gif"));
			//要抓链接的网址
			$this->spider_func->get_links($url);
			//header ("content-type: text/xml");
			//generating sitemap
			$map = $this->spider_func->get_array();
			$map = array_unique($map);

			//submitting site map to Google, Yahoo, Bing, Ask and Moreover services
			//$sitemap->ping("http://".$_SERVER['SERVER_NAME'].$_SERVER['REQUEST_URI']);
			
			//遍历url写入数据库临时表spider_snap
			//sort($map);
			//重置于键名
			foreach ($map as $m_k=>$m_v){
				if($this->check_url($map[$m_k])){
					$data[$m_k]['url'] = $map[$m_k];
					$data[$m_k]['addtime'] = date("Y-m-d H:m:s");
				}
			}
			//sort($data);
			
			if($this->spider_model->add_snapurl($data)){
				echo '链接入临时表成功...<br/><br/>';
			}else{
				echo '请检查...<br/><br/>';
			}
			
			$snap_id = '1';
			$snap_url = $url;//临时url
		}
		
		$memory = (memory_get_usage() / 1024) / 1024 ;
		if($snap_url !== FALSE){
			$this->session->set_userdata('spider_id', $snap_id + '1');
			echo $snap_id.'、'.$snap_url.'继续...<br/>内存<span style="color: red">'.$memory.'M&nbsp;</span><br/><br/>';
			$this->spider_index($snap_url);
		}else{
			$truncate = $this->spider_model->truncate_snap();
			$truncate = TRUE;
			unset($_SESSION['spider_id']);
			$truncate = $truncate ? '临时表[spider_snap]已清空' : '请手动清空临时表';
			echo $snap_id.'、递归抓爬结束...<br/>内存<span style="color: red">'.$memory.'M&nbsp;</span>[spider_id]已销毁|'. $truncate .'<br/><br/>';;
		}
	}
	
	//验证链接是否合法
	function check_url($url){
	    if(strpos($url,base_url()) !== false && strpos($url,'.html') !== false && strpos($url,'#') === false){
	    	//检查链接是否是站内链接，是否是一个.html链接
	    	return TRUE;
	    }else{
	    return FALSE;
		}
	}
}