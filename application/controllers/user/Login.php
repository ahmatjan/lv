<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {
	public function __construct() {
		parent::__construct();
			$this->output->https_jump();
			$this->load->model('user/user_info');
	}
	
	public function index()
	{
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
	//修改密码
	public function edit_password(){
		if($this->user->is_Logged()){
			redirect(site_url('user/User_center'));
		}
		//----------------------------------------------------------------------------------------------
		
		$this->lang->load('user/edit_password');
		
		//header
		$header['title']=$this->lang->line('heading_title');
		$header['css_page_style']=array('public/css/login.css','public/css/loading/ystep.css');
		$this->public_section->get_header($header);
		$this->public_section->get_login_top();
		
		//text
		$data['text_username']=$this->lang->line('text_username');
		$data['text_password']=$this->lang->line('text_password');
		$data['text_confirmpassword']=$this->lang->line('text_confirmpassword');
		$data['text_submit']=$this->lang->line('text_submit');
		
		//value
		$error_login=$this->session->flashdata('error_login');
		$info_login=$this->session->flashdata('info_login');
		$username=$this->user->get_username();
		if(isset($error_login)){
			$data['error_login'] = $error_login;
		}else{
			$data['error_login']='';
		}
		
		if(isset($info_login)){
			$data['info_login'] = $info_login;
		}else{
			$data['info_login']='';
		}
		
		//通过forgot表里的token来查用户的id
		if($this->input->get('token')!==NULL){
			$user_infos=$this->user_info->user_id_token($this->input->get('token'));
		}else{
			$data['error_login']='改密申请不存在！';//闪出错误信息
		}
		
		if(isset($user_infos)){
			$data['user_name']=$this->user_info->get_userid_name($user_infos['user_id']);
		}else{
			$data['user_name']='';
		}
		if(isset($user_infos) && date($user_infos['addtime'],strtotime('+1 day')) > date('Y-m-d H:i:s')){
			$data['error_login']='申请超时，请重新申请！';//闪出错误信息
		}
		if(isset($user_infos) && $user_infos['status']==FALSE){
			$data['error_login']='请不要重复提交！';//闪出错误信息
		}
		
		//bottom
		$data['text_signupbottom']=$this->lang->line('text_signupbottom');
		
		$data['token']=$this->input->get('token');
		
		$this->load->view('user/edit_password',$data);
		
		//$this->public_section->get_footer();
	}
	
	public function edit_password_cofin(){
		//header
		$header['title']=$this->lang->line('heading_title');
		$header['css_page_style']=array('public/css/login.css','public/css/loading/ystep.css');
		$this->public_section->get_header($header);
		$this->public_section->get_login_top();
		
		$forget_info=$this->user_info->user_id_token($this->input->get('token'));
		if($this->input->get('token')==NULL || $forget_info == FALSE){
			$this->session->set_flashdata('error_login', '改密申请不存在！');//闪出错误信息
			redirect(site_url('user/login/edit_password'));
			exit();
		}
		if($forget_info['status']==FALSE){
			$this->session->set_flashdata('error_login', '请不要重复提交！');//闪出错误信息
			redirect(site_url('user/login/edit_password'));
			exit();
		}
		
		if($this->input->post('password') === $this->input->post('cofin_password')){
			$edit_passwd=$this->user_info->updata_password($this->input->post('password'),$forget_info['user_id']);
			if($edit_passwd!==FALSE){
				$data['info_login']= '密码修改成功！';//闪出错误信息
				$this->user_info->updata_forgot_status($forget_info['forgot_id']);
			}else{
				$data['error_login']= '密码修改失败！';//闪出错误信息
			}
		}
		$this->load->view('user/edit_password_result',$data);
	}
	
	//登陆
	public function user_login()
	{
		$this->load->model('user/user_info');
		
		$username=$this->input->post('username',TRUE);
		$password=md5($this->input->post('password',TRUE));
		if(!isset($username) || !isset($password)){
			//登陆不成功，把错误信息写入session
			$this->session->set_flashdata('error_login', '用户名密码不能为空！');//闪出错误信息
			redirect(site_url('user/Login'));
			exit();
		}
		
		if(preg_match('/^[^\@]+@.*.[a-z]{2,15}$/i',$username) && strlen($username)>3){
			//邮箱登陆
			$user_infos=$this->user_info->get_useremail_info($username);
			
			if($user_infos['status'] == FALSE){
				$this->session->set_flashdata('error_login', '帐号已被禁止登陆！');//闪出错误信息
				redirect(site_url('user/Login'));
				exit();
			}
			
			if($username===$user_infos['email'] && $password === $user_infos['passwd']){
				//写入用户信息session
				$this->session->set_userdata('user_id', $user_infos['user_id']);
				
				//更新访记录到表中记录
				$this->load->model('tool/report');
				//是更新report_access表
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
			
			if($user_infos['status'] == FALSE){
				$this->session->set_flashdata('error_login', '帐号已被禁止登陆！');//闪出错误信息
				redirect(site_url('user/Login'));
				exit();
			}
			
			if($username===$user_infos['user_name'] && $password === $user_infos['passwd']){
				//写入用户信息session
				$this->session->set_userdata('user_id', $user_infos['user_id']);
				
				//更新访记录到表中记录
				$this->load->model('tool/report');
				//是更新report_access表
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
				//是更新report_access表
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
				//是更新report_access表
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
				//是更新report_access表
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
				//是更新report_access表
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
		$email = $this->input->post('forgot_email');
		if(preg_match('/^[^\@]+@.*.[a-z]{2,15}$/i',$email) && strlen($email)>3){
			//填写的是邮箱
			$this->load->model(array('setting/base_setting','user/user_info'));
			$this->load->helper('string');
			$data['token']=sha1(rand());
			//通过邮箱查用户信息
			$user_infos=$this->user_info->get_useremail_info($email);
			if(count($user_infos)<1){
				//查不到用户信息
				$this->session->set_flashdata('error_login', '用户不存在！');//闪出错误信息
				redirect('user/login', 'location');
				exit();
			}
			//如果邮箱或id 超过三次，当天不能再申请
			if($this->user_info->total_forgot($email) >= '3' || $this->user_info->total_forgot_id($user_infos['user_id']) >= '3'){
				$this->session->set_flashdata('error_login', '申请次数太多，请明天再来！');//闪出错误信息
				redirect('user/login', 'location');
				exit();
			}
			$data['username']=$user_infos['user_name'];
			$data['user_id']=$user_infos['user_id'];
			$data['email']=$email;
			
			//发送邮件
			$config['protocol'] = 'smtp';//采用smtp方式
	    	$config['smtp_port'] = 25;//端口
	    	$config['smtp_host'] = 'smtp.qq.com';//简便起见，只支持163邮箱
	    	//$config['smtp_user'] = 'xcalder@foxmail.com';//你的邮箱帐号
	    	$config['smtp_user'] = 'sender@lvxingto.com';//你的邮箱帐号
	    	$config['smtp_pass'] = 'dylfj22649978';//你的邮箱密码
	    	$config['charset'] = 'utf-8';
	    	$config['smtp_timeout'] = 30;
	    	$config['newline'] = "\r\n";
			$config['crlf'] = "\r\n";
	    	$config['wordwrap'] = TRUE;
	    	$config['mailtype'] = "html";
	    	$this->load->library('email');//加载email类
	    	$this->email->initialize($config);//参数配置 
	    	$this->email->from('sender@lvxingto.com', $this->base_setting->get_setting('website_name').'，自动发送');
	    	$this->email->to($email);
	    	$this->email->subject('找回密码——'.$this->base_setting->get_setting('website_name'));
	    	$this->email->message($this->load->view('template/forgot_email',$data,TRUE));//显示发送邮件的结果，加载到res_view.php视图文件中
	    	if($this->email->send()){
	    		//发送成功
	    		//把记录写入forgot表
	    		$this->user_info->add_forgot($data);
	    		//提示信息
	    		$this->session->set_flashdata('info_login', '邮件发送成功，请登陆邮箱查看！');//闪出错误信息
				redirect('user/login', 'location');
	    	}
		}else{
			$this->session->set_flashdata('error_login', '请填写正确的邮箱地址！');//闪出错误信息
			redirect('user/login', 'location');
		}
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
		
		if($user_infos['email'] == $email){
			$this->session->set_flashdata('error_login', '邮箱已经注册！');//闪出错误信息
			return FALSE;
		}
		
		$user_infos=$this->user_info->get_useremail_info($username);
			
		$this->form_validation->set_rules('username', 'Username', 'required|valid_email|min_length[5]|max_length[96]');
		$this->form_validation->set_rules('email', 'Email', 'required|valid_email|min_length[5]|max_length[96]');
		$this->form_validation->set_rules('password', 'Password', 'required|min_length[5]|max_length[25]');
		if ($this->form_validation->run() == TRUE && $username==$email && $user_infos['email'] !== $email && $password == $rpassword){
			return TRUE;
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
