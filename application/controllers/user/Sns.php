<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Sns extends CI_Controller {

	public function __construct()
    {
      	parent::__construct();
    	$this->session->userdata('logged_in') AND redirect();
    }

	public function session($provider = '')
	{
		$this->config->load('oauth2');
		$allowed_providers = $this->config->item('oauth2');
		if ( ! $provider OR ! isset($allowed_providers[$provider]))
		{
        	$this->session->set_flashdata('info', '暂不支持'.$provider.'方式登录.');
            redirect();
            return;
		}
		$this->load->library('oauth2');
		$provider = $this->oauth2->provider($provider, $allowed_providers[$provider]);
        $args = $this->input->get();
        if ($args AND !isset($args['code']))
        {
          	$this->session->set_flashdata('info', '授权失败了,可能由于应用设置问题或者用户拒绝授权.<br />具体原因:<br />'.json_encode($args));
            redirect();
            return;
        }
        $code = $this->input->get('code', TRUE);
		if ( ! $code)
		{
                  try
                  {
			         $provider->authorize();
                  }
                  catch (OAuth2_Exception $e)
                  {
                  	$this->session->set_flashdata('info', '操作失败<pre>'.$e.'</pre>');
                  }
		}
		else
		{
			try
			{
				$token = $provider->access($code);
	        	$sns_user = $provider->get_user_info($token);
				if (is_array($sns_user))
				{
					/*
                    $this->session->set_flashdata('info', '登录成功');
					$this->session->set_userdata('user', $sns_user);
                    $this->session->set_userdata('is_login', TRUE);
                    */
                    //把用户信息写入session
                    $user_session = array(
		                   'username'  		=> $sns_user['uid'],
		                   'nick_name'  	=> $sns_user['screen_name'],
		                   'user_image'  	=> trim($sns_user['image']),
		                   'logged_in' 		=> TRUE
		               );

					$this->session->set_userdata($user_session);
					
					//把用户信息写入数据库
					$this->load->model('user/user_info');
					//检查用户名（uid）是否存在，如果存在不写入数据库只是登陆
					$user_name=$this->user_info->get_username_info($sns_user['uid']);
					$user_name=$user_name['user_name'];
					if(!isset($user_name)){
						//如果用户信息为空写入
						$this->load->library('user_agent');//用户代理类
						//系统类型
						if($this->agent->is_mobile()){
							$system_os=$this->agent->mobile();
						}else if($this->agent->is_robot()){
							$system_os=$this->agent->robot();
						}else{
							$system_os=$this->agent->platform();
						}
						
						$ip=$this->input->ip_address();//ip
						$browser_info=$this->agent->browser().$this->agent->version();//浏览器类型
						$date_now=date('Y-m-d H:i:s');//时间
						
						$user_info=array(
						'user_name' =>$sns_user['uid'],
						'email'		=>'',
						'passwd'	=>'',
						'add_ip'	=>$ip,
						'add_date'	=>$date_now,
						'status'	=>'1',
						'last_login'=>$date_now,
						'system_os'	=>$system_os,
						'browser'=>$browser_info,
						'register_style'=>$sns_user['via'],
						);
						
						//入库
						$this->user_info->int_username($user_info);
					}
					
					if(@$_SESSION['before_access']){
						redirect($_SESSION['before_access']);
					}
           			
				}
				else
				{
                    $this->session->set_flashdata('info', '获取用户信息失败');
				}
			}
			catch (OAuth2_Exception $e)
			{
                $this->session->set_flashdata('info', '操作失败<pre>'.$e.'</pre>');
			}
		}
        redirect();
	}
}

/* End of file sns.php */
/* Location: ./application/controllers/sns.php */