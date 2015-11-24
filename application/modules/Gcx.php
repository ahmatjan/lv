<?php
defined('BASEPATH') OR exit('No direct script access allowed');
//图片缓存处理类
class gcx extends CI_Module {
	
	public function index()
	{
		$data['img1']=$this->image->rezice('catalog/3.jpg',260,173);
		$data['img2']=$this->image->rezice('catalog/4.jpg',260,173);
		$data['img3']=$this->image->rezice('catalog/6.jpg',260,173);
		return $this->load->view('modules/gcx',$data,TRUE);
	}
}
