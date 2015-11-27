<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login_lock extends CI_Controller {
	public function __construct() {
		parent::__construct();
			$this->output->https_jump();
	}
	
	public function index()
	{
		if($this->agent->is_robot()){
			show_404();
		}
		//----------------------------------------------------------------------------------------------
		if(!isset($_SESSION['user_id'])){
			$this->session->set_flashdata('info_login', '锁定超时，请重新登陆！');
			redirect(site_url('user/login'));
			exit();
		}
		
		if(isset($_COOKIE['username'])){
			//写入到cookie
			setcookie("username", $this->user->get_username(), time() + 60*60,"/");
		}
		
		unset($_SESSION['user_id']);
		$this->lang->load('user/login');
		
		//header
		$header['title']='锁定帐号';
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
		
		if(isset($_COOKIE["username"])){//如果cookie存在
			$this->load->model('user/user_info');
			$username=$_COOKIE["username"];
			if(preg_match('/^[^\@]+@.*.[a-z]{2,15}$/i',$username)){//如果是邮箱
				$user_info = $this->user_info->get_useremail_info($username);
				$data['user_name']=$user_info['user_name'];
				$data['user_email']=$user_info['email'];
				$data['user_image']=$this->image->rezice($user_info['image'],200,200);
			}else{
				$user_info = $this->user_info->get_username_info($username);
				$data['user_name']=$user_info['user_name'];
				$data['user_email']=$user_info['email'];
				$data['user_image']=$this->image->rezice($user_info['image'],200,200);
			}
		}else{
			$data['user_name']='';
			$data['user_email']='';
			$data['user_image']='';
		}
		
		$this->load->view('user/login_lock.php',$data);
	}
}
