<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Captcha extends CI_Model {
	
	private $captcha;
	
	public function __construct() {
		parent::__construct();
		$this->load->library('session');
		$this->load->helper('captcha');
		//生成验证码参数
		$vals = array(
	        'img_path'      => WWW_PATH.'/image/cache/captcha/',
	        'img_url'       => base_url('image/cache/captcha/'),
		);

		$this->captcha = create_captcha($vals);
		$this->session->set_userdata('captcha_word', $this->captcha['word']);
	}

	
	public function get_img(){
		return $this->captcha['image'];
	}
}