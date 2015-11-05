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
		
		if($this->user->is_Logged()){
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
		$username=$this->user->get_username();
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
		
		//如果cookie存在，直接读
		//加载cookie辅助函数
		$this->load->helper('cookie');
		if(get_cookie('username')){
			$data['val_username']=get_cookie('username');
		}else{
			$data['val_username']='';
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
				//写入用户信息session
				$this->session->set_userdata('user_id', $user_infos['user_id']);
				
				//更新访记录到表中记录
				$this->load->model('tool/report');
				//是更新access_report表
				$access_data=array(
						'user_id'			=>$_SESSION['user_id'],
						'login_time'		=>date('Y-m-d H:i:s'),
						'login_type'		=>'登陆页邮箱登陆',
				);
				$this->report->updata_tab($access_data);
				
				//如果勾选记住帐号
				if($this->input->post('remember')== TRUE){
					//加载cookie辅助函数
					$this->load->helper('cookie');
					//写入到cookie
					set_cookie('username',$this->input->post('username'));
				}
				
				redirect(site_url('user/user_center'));
				
		}else{
				//登陆不成功，把错误信息写入session
				$this->session->set_flashdata('error_login', '登陆名或密码不正确！');//闪出错误信息
				redirect(site_url('user/Login'));
			}
		}
		
		if(!preg_match('/^[^\@]+@.*.[a-z]{2,15}$/i',$username) && strlen($username)>3){
			//帐号登陆
			$user_infos=$this->user_info->get_username_info($username);
			
			if($username===$user_infos['user_name'] && $password === $user_infos['passwd']){
				//写入用户信息session
				$this->session->set_userdata('user_id', $user_infos['user_id']);
				
				//更新访记录到表中记录
				$this->load->model('tool/report');
				//是更新access_report表
				$access_data=array(
						'user_id'			=>$_SESSION['user_id'],
						'login_time'		=>date('Y-m-d H:i:s'),
						'login_type'		=>'登陆页帐号登陆',
				);
				$this->report->updata_tab($access_data);
				
				//如果勾选记住帐号   把帐号写入cooke
				if($this->input->post('remember')== TRUE){
					//加载cookie辅助函数
					$this->load->helper('cookie');
					//写入到cookie
					set_cookie('username',$this->input->post('username'));
				}
				
				redirect(site_url('user/user_center'));
				
		}else{
				//登陆不成功，把错误信息写入session
				$this->session->set_flashdata('error_login', '登陆名或密码不正确！');//闪出错误信息
				redirect(site_url('user/login'));
			}
		}
	}
	
		//登陆
	public function ajax_login()
	{
		$this->load->model('user/user_info');
		
		$username=$this->input->post('username',TRUE);
		$password=md5($this->input->post('password',TRUE));
		
		if(preg_match('/^[^\@]+@.*.[a-z]{2,15}$/i',$username) && strlen($username)>3){
			//邮箱登陆
			$user_infos=$this->user_info->get_useremail_info($username);
			if($username===$user_infos['email'] && $password === $user_infos['passwd']){
				
				//写入用户id到session
				$this->session->set_userdata('user_id', $user_infos['user_id']);
				
				//更新访记录到表中记录
				$this->load->model('tool/report');
				//是更新access_report表
				$access_data=array(
						'user_id'			=>$_SESSION['user_id'],
						'login_time'		=>date('Y-m-d H:i:s'),
						'login_type'		=>'顶部邮箱登陆',
				);
				$this->report->updata_tab($access_data);
				
				//如果勾选记住帐号
				if($this->input->post('remember')== TRUE){
					
				}
				
				//返回true
				echo '1';
		}else{
				//登陆不成功
				//返回失败
				echo '0';
			}
		}
		
		if(!preg_match('/^[^\@]+@.*.[a-z]{2,15}$/i',$username) && strlen($username)>3){
			//帐号登陆
			$user_infos=$this->user_info->get_username_info($username);
			
			if($username===$user_infos['user_name'] && $password === $user_infos['passwd']){
				//写入用户id到session
				$this->session->set_userdata('user_id', $user_infos['user_id']);
				
				//更新访记录到表中记录
				$this->load->model('tool/report');
				//是更新access_report表
				$access_data=array(
						'user_id'			=>$_SESSION['user_id'],
						'login_time'		=>date('Y-m-d H:i:s'),
						'login_type'		=>'顶部帐号登陆',
				);
				$this->report->updata_tab($access_data);
				
				//如果勾选记住帐号
				if($this->input->post('remember')== TRUE){
					
				}
				//返回true
				echo '1';
		}else{
				//登陆不成功
				echo '0';
			}
		}
	}
	
	//注册
	public function register()
	{
		$this->load->model('user/user_info');
		$this->load->helper('string');
		$random_username=substr(random_string('md5'),0,20);
		
		$username=$this->input->post('username',TRUE);
		$password=md5($this->input->post('password',TRUE));
		$rpassword=md5($this->input->post('rpassword',TRUE));
		$email=$this->input->post('email',TRUE);
		$tnc=$this->input->post('tnc',TRUE);
		$ip=$this->input->ip_address();
		$browser_info=$this->agent->browser().$this->agent->version();
		$date_now=date('Y-m-d H:i:s');

		$platform=$this->agent->platform();
		
		//默认注册用户组
		if($this->base_setting->get_setting('register_group')!==NULL){
			$register_group=$this->base_setting->get_setting('register_group');
		}
		
		//加载目录辅助函数
		$this->load->helper('directory');
		$portraits=directory_map('image/portrait/');
		$portrait=array_rand($portraits, 1);
		$portrait='portrait/'.$portraits[$portrait];
		
		if(preg_match('/^[^\@]+@.*.[a-z]{2,15}$/i',$username) && strlen($username)>3)
		{
			if($this->username_email($username,$email,$password,$rpassword)){
				//邮箱注册
				$user_info=array(
					'user_name' =>$random_username,
					'email'		=>$email,
					'passwd'	=>$password,
					'nick_name'	=>$random_username,
					'image'		=>$portrait,
					'add_ip'	=>$ip,
					'add_date'	=>$date_now,
					'status'	=>'1',
					'platform'	=>$platform,
					'browser'=>$browser_info,
					'register_style'=>'email',
					'group_id'=>$register_group,
				);
				
				$this->user_info->int_username($user_info);
				
				//通过邮箱查用户id
				$user_id=$this->user_info->get_useremail_id($email);
				//把用户id写入session
				$this->session->set_userdata('user_id', $user_id);
				
				//更新访记录到表中记录
				$this->load->model('tool/report');
				//是更新access_report表
				$access_data=array(
						'user_id'			=>$_SESSION['user_id'],
						'login_time'		=>date('Y-m-d H:i:s'),
						'login_type'		=>'邮箱注册',
				);
				$this->report->updata_tab($access_data);

				redirect(site_url('user/User_center'));
				
			}else{
				redirect(site_url('user/login'));
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
					'nick_name'	=>$random_username,
					'image'		=>$portrait,
					'add_ip'	=>$ip,
					'add_date'	=>$date_now,
					'status'	=>'1',
					'platform'	=>$platform,
					'browser'=>$browser_info,
					'register_style'=>'user_name',
					'group_id'=>$register_group,
				);
				
				$this->user_info->int_username($user_info);
				//通过用户名查id
				$user_id=$this->user_info->get_username_id($username);
				//写入用户信息session
				$this->session->set_userdata('user_id', $user_id);
				
				//更新访记录到表中记录
				$this->load->model('tool/report');
				//是更新access_report表
				$access_data=array(
						'user_id'			=>$_SESSION['user_id'],
						'login_time'		=>date('Y-m-d H:i:s'),
						'login_type'		=>'用户名注册',
				);
				$this->report->updata_tab($access_data);

				redirect(site_url('user/user_center'));
				
			}else{
				redirect(site_url('user/login'));
			}
		}
		
		redirect('user/User_center', 'location');
	}
	
	//找回密码
	public function forgot(){
		var_dump($this->input->post());
		
		//redirect('user/User_center', 'location');
	}
	
	//退出登陆
	public function login_out(){
		unset($_SESSION['user_id']);
		//$this->session->set_flashdata('info_login', '退出成功！');
		redirect(site_url('user/login'));
		
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
