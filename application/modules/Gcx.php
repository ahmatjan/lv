<?php
defined('BASEPATH') OR exit('No direct script access allowed');
//图片缓存处理类
class gcx extends CI_Module {
	
	public function index()
	{
		return $this->load->view('modules/gcx','',TRUE);
	}
}
