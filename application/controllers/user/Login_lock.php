<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login_lock extends CI_Controller {
	public function __construct() {
		parent::__construct();
			$this->output->https_jump();
	}
	
	public function index()
	{
		//if($this->agent->is_robot()){
			//return;
		//}
		//----------------------------------------------------------------------------------------------
		$this->lang->load('user/login');
		
		//header
		$header['title']='锁定帐号';
		$header['css_page_style']=base_url('public/css/lock.css');
		$this->public_section->get_header($header);
		
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
		
		$this->load->view('user/login_lock.php',$data);
	}
}
