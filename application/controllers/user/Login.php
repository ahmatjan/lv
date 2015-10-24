<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {
	public function __construct() {
		parent::__construct();
			$this->output->https_jump();
	}
	
	public function index()
	{
		//第三方登陆
		$this->config->load('oauth2');
        $data['user'] = $this->session->userdata('user');
		
		if($this->agent->is_robot()){
			return;
		}
		
		if($this->session->userdata('logged_in')===TRUE){
			redirect(site_url('user/User_center'));
		}
		//----------------------------------------------------------------------------------------------
		
		$this->lang->load('user/login');
		
		//header
		$header['title']=$this->lang->line('heading_title');
		$header['css_page_style']=array('public/css/login.css');
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
		
		//value
		$error_login=$this->session->flashdata('error_login');
		$info_login=$this->session->flashdata('info_login');
		$username=$this->session->userdata('username');
		if(isset($error_login)){
			$data['val_username']=$username;
			$data['error_login'] = $error_login;
		}else{
			$data['val_username']='';
			$data['error_login']='';
		}
		
		if(isset($info_login)){
			$data['val_username']=$username;
			$data['info_login'] = $info_login;
		}else{
			$data['val_username']='';
			$data['info_login']='';
		}
		
		//bottom
		$data['text_signupbottom']=$this->lang->line('text_signupbottom');
		
		$this->load->view('user/login.php',$data);
		
		//$this->public_section->get_footer();
	}
	
	//登陆
	public function user_login()
	{
		$this->load->model('user/user_info');
		
		$username=$this->input->post('username',TRUE);
		$password=md5($this->input->post('password',TRUE));
		
		if(preg_match('/^[^\@]+@.*.[a-z]{2,15}$/i',$username) && strlen($username)>3){
			//邮箱登陆
			$user_infos=$this->user_info->get_useremail_info($username);
			if($username===$user_infos['email'] && $password === $user_infos['passwd']){
				echo $username;
				//写入用户信息session
				$user_session = array(
		                   'username'  		=> $username,
		                   'logged_in' 		=> TRUE
		               );
				
				$this->session->set_userdata($user_session);
				
				redirect(site_url('user/User_center'));
				
				if($this->input->post('remember')== TRUE){
					
				}
		}else{
				//登陆不成功，把错误信息写入session
				$this->session->set_userdata('username', $username);
				$this->session->set_flashdata('error_login', '登陆名或密码不正确！');//闪出错误信息
				redirect(site_url('user/Login'));
			}
		}
		
		if(!preg_match('/^[^\@]+@.*.[a-z]{2,15}$/i',$username) && strlen($username)>3){
			//帐号登陆
			$user_infos=$this->user_info->get_username_info($username);
			
			if($username===$user_infos['user_name'] && $password === $user_infos['passwd']){
				//写入用户信息session
				$user_session = array(
		                   'username'  		=> $username,
		                   'logged_in' 		=> TRUE
		               );

				$this->session->set_userdata($user_session);
				
				redirect(site_url('user/User_center'));
				
				if($this->input->post('remember')== TRUE){
					
				}
		}else{
				//登陆不成功，把错误信息写入session
				$this->session->set_userdata('username', $username);
				$this->session->set_flashdata('error_login', '登陆名或密码不正确！');//闪出错误信息
				redirect(site_url('user/Login'));
			}
		}
	}
	
	//注册
	public function register()
	{
		$this->load->model('user/user_info');
		$this->load->helper('string');
		
		$random_username=random_string('alnum', 8);
		
		$username=$this->input->post('username',TRUE);
		$password=md5($this->input->post('password',TRUE));
		$rpassword=md5($this->input->post('rpassword',TRUE));
		$email=$this->input->post('email',TRUE);
		$tnc=$this->input->post('tnc',TRUE);
		$ip=$this->input->ip_address();
		$browser_info=$this->agent->browser().$this->agent->version();
		$date_now=date('Y-m-d H:i:s');

		if($this->agent->is_mobile()){
			$system_os=$this->agent->mobile();
		}else if($this->agent->is_robot()){
			$system_os=$this->agent->robot();
		}else{
			$system_os=$this->agent->platform();
		}
		
		if(preg_match('/^[^\@]+@.*.[a-z]{2,15}$/i',$username) && strlen($username)>3)
		{
			if($this->username_email($username,$email,$password,$rpassword)){
				//邮箱注册
				$user_info=array(
					'user_name' =>$random_username,
					'email'		=>$email,
					'passwd'	=>$password,
					'add_ip'	=>$ip,
					'add_date'	=>$date_now,
					'status'	=>'1',
					'last_login'=>$date_now,
					'system_os'	=>$system_os,
					'browser'=>$browser_info
				);
				
				$this->user_info->int_username($user_info);
				
				//写入用户信息session
				$user_session = array(
		                   'email'  		=> $email,
		                   'logged_in' 		=> TRUE
		               );

				$this->session->set_userdata($user_session);

				
				redirect(site_url('user/User_center'));
				
			}else{
				redirect(site_url('user/Login'));
			}
		}
		if(!preg_match('/^[^\@]+@.*.[a-z]{2,15}$/i',$username) && strlen($username)>3)
		{
			//用户名注册
			if($this->username_txt($username,$email,$password,$rpassword)==TRUE){
				$user_info=array(
					'user_name' =>$username,
					'email'		=>$email,
					'passwd'	=>$password,
					'add_ip'	=>$ip,
					'add_date'	=>$date_now,
					'status'	=>'1',
					'last_login'=>$date_now,
					'system_os'	=>$system_os,
					'browser'=>$browser_info
				);
				
				$this->user_info->int_username($user_info);
				
				//写入用户信息session
				$user_session = array(
		                   'username'  		=> $username,
		                   'logged_in' 		=> TRUE
		               );

				$this->session->set_userdata($user_session);

				
				redirect(site_url('user/User_center'));
				
			}else{
				redirect(site_url('user/Login'));
			}
		}
		
		//redirect('user/User_center', 'location');
	}
	
	//找回密码
	public function forgot(){
		var_dump($this->input->post());
		
		//redirect('user/User_center', 'location');
	}
	
	//退出登陆
	public function login_out(){
		session_destroy();
		//$this->session->set_flashdata('info_login', '退出成功！');
		redirect(site_url('user/Login'));
		
	}
	
	//输入用户名是邮箱验证函数
	public function username_email($username,$email,$password,$rpassword){
		$this->load->library('form_validation');
		$this->load->model('user/user_info');
		
		$user_infos=$this->user_info->get_useremail_info($username);
			
		$this->form_validation->set_rules('username', 'Username', 'required|valid_email|min_length[5]|max_length[96]');
		$this->form_validation->set_rules('email', 'Email', 'required|valid_email|min_length[5]|max_length[96]');
		$this->form_validation->set_rules('password', 'Password', 'required|min_length[5]|max_length[25]');
		if ($this->form_validation->run() == TRUE && $username==$email && $user_infos['email'] !== $email && $password == $rpassword){
			return TRUE;
		}
		if($user_infos['email'] == $email){
			$this->session->set_flashdata('error_login', '邮箱已经注册！');//闪出错误信息
		}
	}
	
	//输入用户名是字符验证函数
	public function username_txt($username,$email,$password,$rpassword){
		$this->load->library('form_validation');
		$this->load->model('user/user_info');
		
		$user_infos=$this->user_info->get_username_info($username);
		
		$this->form_validation->set_rules('username', 'Username', 'required|min_length[3]|max_length[12]');
		$this->form_validation->set_rules('email', 'Email', 'required|valid_email|min_length[5]|max_length[96]');
		$this->form_validation->set_rules('password', 'Password', 'required|min_length[5]|max_length[25]');
		
		if ($this->form_validation->run() == TRUE && $username !== $user_infos['user_name'] && $user_infos['email'] !== $email && $password === $rpassword){
			return TRUE;
		}
		
		if($user_infos['email'] == $email){
			$this->session->set_flashdata('error_login', '邮箱已被注册！');//闪出错误信息
		}
		
		if($username == $user_infos['user_name']){
			$this->session->set_flashdata('error_login', '用户名已被注册！');//闪出错误信息
		}
	}
}
