<?php
defined('BASEPATH') OR exit('No direct script access allowed');
//图片缓存处理类
class Qr_banner extends CI_Module {
	
	public function index()
	{
		$data['lrtk_css']=base_url('public/modules/qr_banner/css/lrtk.css');//加载css
		return $this->load->view('modules/qr_banner',$data,TRUE);
	}
}
