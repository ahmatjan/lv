<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Sns extends CI_Controller {

	public function __construct()
    {
      	parent::__construct();
    	$this->user->get_userid() AND redirect();
    	$this->load->model('setting/base_setting');
    }

	public function session($provider = '')
	{
		$this->config->load('oauth2');
		$allowed_providers = $this->config->item('oauth2');
		if ( ! $provider OR ! isset($allowed_providers[$provider]))
		{
        	$this->session->set_flashdata('error_login', '暂不支持'.$provider.'方式登录.');
            redirect('user/login');
            return;
		}
		$this->load->library('oauth2');
		$provider = $this->oauth2->provider($provider, $allowed_providers[$provider]);
        $args = $this->input->get();
        if ($args AND !isset($args['code']))
        {
          	$this->session->set_flashdata('error_login', '授权失败了,可能由于应用设置问题或者用户拒绝授权.<br />具体原因:<br />'.json_encode($args));
            redirect('user/login');
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
                  	$this->session->set_flashdata('error_login', '操作失败<pre>'.$e.'</pre>');
                  	redirect('user/login');
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
                    
					//把用户信息写入数据库
					$this->load->model('user/user_info');
					//检查用户（uid）是否存在，如果存在不写入数据库只是登陆
					
					if($this->user_info->get_useridforuid($sns_user['uid'])===FALSE){
						//如果用户uid不存在写入
						 //随机用户名
	                    $this->load->helper('string');
						$random_username=substr(random_string('md5'),0,20);
						
						$this->load->library('user_agent');//用户代理类
						//系统类型$this->agent->is_robot()
						$platform=$this->agent->platform();
						
						$ip=$this->input->ip_address();//ip
						$browser_info=$this->agent->browser().$this->agent->version();//浏览器类型
						$date_now=date('Y-m-d H:i:s');//时间
						//默认注册用户组
						if($this->base_setting->get_setting('register_group')!==NULL){
							$register_group=$this->base_setting->get_setting('register_group');
						}
						
						$user_info=array(
						'uid' =>$sns_user['uid'],
						'user_name' =>$random_username,
						'email'		=>'',
						'passwd'	=>'',
						'nick_name'	=>$sns_user['screen_name'],
						'image'		=>$sns_user['image'],
						'add_ip'	=>$ip,
						'add_date'	=>$date_now,
						'status'	=>'1',
						'platform'	=>$platform,
						'browser'=>$browser_info,
						'register_style'=>$sns_user['via'],
						'group_id'=>$register_group,
						);
						
						//入库
						$this->user_info->int_username($user_info);
					}
					
					$user_id=$this->user_info->get_useridforuid($sns_user['uid']);

					$this->session->set_userdata('user_id', $user_id);
					//更新访记录到表中记录
					$this->load->model('tool/report');
					//是更新report_access表
					$access_data=array(
							'user_id'			=>$_SESSION['user_id'],
							'login_time'		=>date('Y-m-d H:i:s'),
							'login_type'		=>$sns_user['via'].'登陆',
					);
					$this->report->updata_tab($access_data);
					
					$this->session->set_flashdata('setting_success', '登陆成功！');
					if($_SESSION['sns_redirect']){
						redirect($_SESSION['sns_redirect']);
					}else{
						redirect('user/user_center');
					}
           			
				}
				else
				{
                    $this->session->set_flashdata('error_login', '获取用户信息失败');
                    redirect('user/login');
				}
			}
			catch (OAuth2_Exception $e)
			{
                $this->session->set_flashdata('error_login', '操作失败<pre>'.$e.'</pre>');
                redirect('user/login');
			}
		}
        redirect();
	}
}

/* End of file sns.php */
/* Location: ./application/controllers/sns.php */