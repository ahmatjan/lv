<?php
defined('BASEPATH') OR exit('No direct script access allowed');
//图片缓存处理类
class Article extends CI_Module {
	
	public function index()
	{
		$data['img1']=$this->image->rezice('catalog/1.jpg',454,301);
		$data['img2']=$this->image->rezice('catalog/2.jpg',454,301);
		//$data['img4']=$this->image->rezice('http://baike.soso.com/p/20090711/20090711101754-314944703.jpg',260,173);
		$data['img4']=$this->image->rezice(base_url('image/catalog/5.jpg'),260,173);
		$data['bbc']='xxcc';
		return $this->load->view('modules/article',$data,TRUE);
	}
}
