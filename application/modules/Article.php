<?php
defined('BASEPATH') OR exit('No direct script access allowed');
//图片缓存处理类
class Article extends CI_Module {
	
	public function index()
	{
		$data['bbc']='bbcdddxxx';
		return $this->load->view('modules/article',$data,TRUE);
	}
}
