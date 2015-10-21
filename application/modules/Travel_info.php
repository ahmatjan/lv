<?php
defined('BASEPATH') OR exit('No direct script access allowed');
//图片缓存处理类
class Travel_info extends CI_Module {
	
	public function index()
	{
		return $this->load->view('modules/travel_info','',TRUE);
	}
}
