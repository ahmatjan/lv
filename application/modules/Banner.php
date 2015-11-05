<?php
defined('BASEPATH') OR exit('No direct script access allowed');
//图片缓存处理类
class Banner extends CI_Module {
	
	public function index()
	{
		$this->load->model('common/image');
		$img='catalog/1255.jpg';
		$data['new_img']=$this->image->rezice($img,1500,100);
		
		return $this->load->view('modules/banner',$data,TRUE);
	}
}
