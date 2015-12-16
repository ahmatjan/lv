<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Captcha extends CI_Controller {
	public function __construct() {
		parent::__construct();
		$this->load->library(array('validate_code','session'));
	}

	public function index()
	{
		$this->validate_code->doimg();
		$this->session->set_userdata('captcha_code', $this->validate_code->getCode());
	}
	
	//输入验证码
	public function input_captcha(){
		
		$data['ip']=$this->input->ip_address();
		$data['start']='1';
		$this->load->model('tool/report');
		$this->report->add_blackip($data);
		
		$this->lang->load('user/login');
		
		//header
		$header['title']='请输入验证码';
		$header['css_page_style']=array('public/css/lock.css');
		$this->public_section->get_header($header);
		$this->public_section->get_login_top();
		
		//text
		$data['text_username']=$this->lang->line('text_username');
		$data['text_password']=$this->lang->line('text_password');
		$data['text_remember']=$this->lang->line('text_remember');
		$data['text_login']=$this->lang->line('text_login');
		$data['text_forgotpassword']=$this->lang->line('text_forgotpassword');
		$data['text_findpassword']=$this->lang->line('text_findpassword');
		$data['text_nouser']=$this->lang->line('text_nouser');
		$data['text_register']=$this->lang->line('text_register');
		$data['text_findpw_email']=$this->lang->line('text_findpw_email');
		$data['text_ent_email']=$this->lang->line('text_ent_email');
		$data['text_back']=$this->lang->line('text_back');
		$data['text_submint']=$this->lang->line('text_submint');
		$data['text_signup']=$this->lang->line('text_signup');
		$data['text_details']=$this->lang->line('text_details');
		$data['text_confirmpassword']=$this->lang->line('text_confirmpassword');
		$data['text_email']=$this->lang->line('text_email');
		
		//bottom
		$data['text_signupbottom']=$this->lang->line('text_signupbottom');
		
		$this->load->view('tools/captcha',$data);
	}
	
	//对比验证码
	public function confirm_captcha(){
		$captcha = $this->input->post('captcha');
		if($captcha === $this->session->userdata('captcha_code')){
			//验证码输对了
			$data['ip']=$this->input->ip_address();
			$data['start']='0';
			$this->load->model('tool/report');
			$this->report->add_blackip($data);
			
			redirect($this->session->userdata('sns_redirect'));
		}else{
			$this->output->set_status_header('0');
			redirect(site_url('no_find'));
		}
	}
}