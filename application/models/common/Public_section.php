<?php
/**
* 这是一个处理公共部分的类，它并不是一个严格的model,因为在ci的调用机制里，我想要复用一个带业务逻辑的公共部分所以我选择了这样来处理它，但是我想它并不是一个好的方法，但是它可能更便于在以后的维护。这个类已经自动载入，以后调用将不需要再次载入它
*/
class public_section extends CI_Model {
	
	//这是一个只包含css/js等引入的公共头部
	public function get_header($header=array())
	{
		if(isset($header['css_page_style'])){
			$this->load->helper('array');
			//把css样式组成字符串
			$data['css_page_style']=arrayToString($header['css_page_style']);	
		}else{
			$data['css_page_style']='';
		}
		
		if(isset($header['meta'])){
			$data['meta']=$header['meta'];
		}else{
			$data['meta']='';
		}
		
		if(isset($header['title'])){
			$data['title']=$header['title'];	
		}else{
			$data['title']='';
		}
		
		if(isset($header['style'])){
			$data['style']=$header['style'];	
		}else{
			$data['style']='';
		}
		
		$this->load->model('setting/base_setting');
		
		$data['website_title']=$this->base_setting->get_setting('website_title');
		
		if(isset($header['meta_key'])){
			$data['mate_key']=$header['meta_key'];
		}else{
			$data['mate_key']=$this->base_setting->get_setting('mate_key');
		}
		
		if(isset($header['meta_description'])){
			$data['mate_description']=$header['meta_description'];
		}else{
			$data['mate_description']=$this->base_setting->get_setting('mate_description');
		}
		
		$data['mate_author']=$this->base_setting->get_setting('mate_author');
		
		$this->report_access();
		
		//$this->output->enable_profiler(TRUE);
		
		return $this->load->view('common/header',$data);
	}
	
	//这是网站前台的顶部
	public function get_top(){
		//设置语言
		$this->load->language('common/top');
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
		
		//用户user类来获取用户信息
		if(@$this->user->get_nickname()){
			$data['nick_name']=$this->user->get_nickname();
		}else {
			$data['nick_name']='';
		}
		
		if(@$this->user->get_image()){
			$data['user_image']=$this->image->rezice($this->user->get_image(),29,29);
		}else{
			$data['user_image']='';
		}
		
		//获取当前页链接
		$active=uri_string();
		$active=strtolower($active);
		if($active == NULL){
			$active='home';
		}
		
		$this->load->model('setting/nav_setting');
		$nav_parents=$this->nav_setting->get_parent_nav('view_top');

		foreach($nav_parents as $v){
			//$nav_childs=$this->nav_setting->get_child_nav($v['nav_id']);
			$nav_childs[]=$this->nav_setting->get_child_nav($v['nav_id']);
		}
		
		foreach($nav_parents as $k=>$v){
			$nav_parents[$k]['childs']=&$nav_childs[$k];
			if($nav_parents[$k]['nav_url'] == $active){
				$nav_parents[$k]['active']='active';
			}
			if(!empty($nav_childs[$k])){
				foreach($nav_childs[$k] as $b){
					if($b['nav_child_url'] == $active){
						$nav_parents[$k]['active']='active';
					}
				}
			}
			
		}
		
		if($nav_parents && is_array($nav_parents)){
			$data['nav']=$nav_parents;
		}
		
		$data['active']=$active;
		
		//查询ip_address
		@$sql = "SELECT ip_address FROM " . $this->db->dbprefix('report_access') . " WHERE token = ?"; 
		@$query=$this->db->query($sql, array(@$_SESSION['token']));
		@$data['ip_address'] = unserialize($query->row_array()['ip_address']);

		//顶布局
		$this->load->module('common/module_top');
		$data['module_top'] = $this->module_top->index();
		
		$data['body_css']=$this->uri->segment(2, $this->uri->segment(1, 'home'));//返回url 第二段也就是当前视图文件名称，用于设置body class
		
		$data['logo'] = base_url('public/image/logo.png');
		
		if(isset($_COOKIE['username'])){
			$data['user_name']=$_COOKIE['username'];
		}else{
			$data['user_name']='';
		}
		
		return $this->load->view('common/top',$data);
	}
	
	//这是登陆的顶部
	public function get_login_top(){
		$data['body_css']=$this->uri->segment(1) == 'user' ? $this->uri->segment(2) : 'no_find';//返回url 第二段也就是当前视图文件名称，用于设置body class
		
		//用户user类来获取用户信息
		if(@$this->user->get_nickname()){
			$data['nick_name']=$this->user->get_nickname();
		}else {
			$data['nick_name']='';
		}
		
		if(@$this->user->get_image()){
			if(strpos($this->user->get_image() ,'http') !== FALSE){
				$data['user_image']=$this->user->get_image();
			}else{
				$data['user_image']=$this->image->rezice($this->user->get_image(),29,29);
			}
		}else{
			$data['user_image']='';
		}
		
		//顶布局
		$this->load->module('common/module_top');
		$data['module_top'] = $this->module_top->index();
		return $this->load->view('common/login_top',$data);
	}
	
	//这是网部后台的顶部
	public function get_usertop(){
		//判断用户是否已经登陆并做出相应跳转
		
		if(!$this->user->is_Logged()){
			$this->session->set_flashdata('info_login', '请先登陆，或者注册一个帐号！');//闪出提示信息
			redirect(site_url('user/login'));
		}
		
		//------------------------------------------------------------------------------------
		//用户user类来获取用户信息
		if($this->user->get_nickname()){
			$data['nick_name']=$this->user->get_nickname();
		}else {
			$data['nick_name']='';
		}
		
		if($this->user->get_image()){
			$data['user_image']=$this->image->rezice($this->user->get_image(),29,29);
		}else{
			$data['user_image']='';
		}
		
		//获取当前页链接
		$active=uri_string();
		$active=strtolower($active);
		
		$this->load->model('setting/nav_setting');
		$nav_parents=$this->nav_setting->get_parent_nav('admin_top');

		foreach($nav_parents as $v){
			//$nav_childs=$this->nav_setting->get_child_nav($v['nav_id']);
			$nav_childs[]=$this->nav_setting->get_child_nav($v['nav_id']);
		}
		
		foreach($nav_parents as $k=>$v){
			$nav_parents[$k]['childs']=&$nav_childs[$k];
			if($nav_parents[$k]['nav_url'] == $active){
				$nav_parents[$k]['active']='active';
			}
			if(!empty($nav_childs[$k])){
				foreach($nav_childs[$k] as $b){
					if($b['nav_child_url'] == $active){
						$nav_parents[$k]['active']='active';
					}
				}
			}
			
		}
		
		if($nav_parents && is_array($nav_parents)){
			$data['nav']=$nav_parents;
		}
		
		$data['active']=$active;
		
		//顶布局
		$this->load->module('common/module_top');
		$data['module_top'] = $this->module_top->index();
		
		$data['body_css']=$this->uri->segment(2, 'home');//返回url 第二段也就是当前视图文件名称，用于设置body class
		
		return $this->load->view('common/user_top',$data);
	}
	
	//这是网部的公共底部
	public function get_footer(){
		return $this->load->view('common/footer');
	}
	
	//这是用户后台左侧栏
	public function get_column_left(){
		//获取当前页链接
		$active = $this->uri->segment(1);
		$active .= '/'.$this->uri->segment(2);
		$active=strtolower($active);
		
		$this->load->model('setting/nav_setting');
		$nav_parents=$this->nav_setting->get_parent_nav('admin');

		foreach($nav_parents as $v){
			//$nav_childs=$this->nav_setting->get_child_nav($v['nav_id']);
			$nav_childs[]=$this->nav_setting->get_child_nav($v['nav_id']);
		}
		
		foreach($nav_parents as $k=>$v){
			$nav_parents[$k]['childs']=&$nav_childs[$k];
			if($nav_parents[$k]['nav_url'] == $active){
				$nav_parents[$k]['active']='active';
			}

			//判断权限，如果没有查看权限不显示
			if(!empty($nav_parents[$k]['another_url'])){
				if(substr_count($nav_parents[$k]['another_url'],'/') <= 1){//\/有1个
					if($this->user->hasPermission('access',$nav_parents[$k]['another_url'])===false){
						unset($nav_parents[$k]);
					}
				}else{//，/超过1个
					if($this->user->hasPermission('access',substr($nav_parents[$k]['another_url'],0,strpos($nav_parents[$k]['another_url'],'/',stripos($nav_parents[$k]['another_url'],'/') + 2)))===false){//截取判断权限
						unset($nav_parents[$k]);
					}
				}
				/*
				if($this->user->hasPermission('access',$nav_parents[$k]['nav_url'])===false){
					unset($nav_parents[$k]);
				}
				*/
			}
			
			if(!empty($nav_childs[$k])){
				foreach($nav_childs[$k] as $b=>$c){
					if($nav_childs[$k][$b]['nav_child_url'] == $active){
						$nav_parents[$k]['active']='active';
					}
					
					//判断权限，如果没有查看权限不显示
					if(!empty($nav_childs[$k][$b]['another_child_url'])){
						if(substr_count($nav_childs[$k][$b]['another_child_url'],'/') <= 1){//\/有1个
							if($this->user->hasPermission('access',$nav_childs[$k][$b]['another_child_url'])===false){
								unset($nav_childs[$k][$b]);
							}
						}else{//，/超过1个
							if($this->user->hasPermission('access',substr($nav_childs[$k][$b]['another_child_url'],0,strpos($nav_childs[$k][$b]['another_child_url'],'/',stripos($nav_childs[$k][$b]['another_child_url'],'/') + 2)))===false){//截取判断权限
								unset($nav_childs[$k][$b]);
							}
						}
					}
				}
			}
		}
		
		$data['nav']=$nav_parents;

		$data['active']=$active;
		return $this->load->view('common/user_left',$data);
	}
	
	//这是前台页面header包括主题设置
	public function get_page_header(){
		if($this->session->flashdata('setting_success')){
			$data['setting_success']=$this->session->flashdata('setting_success');
		}else{
			$data['setting_success']='';
		}
		
		if($this->session->flashdata('setting_false')){
			$data['setting_false']=$this->session->flashdata('setting_false');
		}else{
			$data['setting_false']='';
		}
		
		return $this->load->view('common/page_header',$data);
	}
	
	//这是后台页面header包括主题设置
	public function get_user_page_header(){
		if($this->session->flashdata('setting_success')){
			$data['setting_success']=$this->session->flashdata('setting_success');
		}else{
			$data['setting_success']='';
		}
		
		if($this->session->flashdata('setting_false')){
			$data['setting_false']=$this->session->flashdata('setting_false');
		}else{
			$data['setting_false']='';
		}
		
		return $this->load->view('common/user_page_header',$data);
	}
	
	//这是帮助中心侧栏
	public function get_helper_left(){
		//获取当前页链接
		$active=uri_string();
		$active=strtolower($active);
		
		$this->load->model('setting/nav_setting');
		$nav_helpers=$this->nav_setting->get_parent_nav('helper');

		foreach($nav_helpers as $nav_helper){
			//$nav_childs=$this->nav_setting->get_child_nav($v['nav_id']);
			$nav_helper_childs[]=$this->nav_setting->get_child_nav($nav_helper['nav_id']);
		}
		
		foreach($nav_helpers as $k=>$v){
			$nav_helpers[$k]['childs']=&$nav_helper_childs[$k];
			if($nav_helpers[$k]['nav_url'] == $active){
				$nav_helpers[$k]['active']='active';
			}
			if(!empty($nav_helpers_childs[$k])){
				foreach($nav_helpers_childs[$k] as $b){
					if($b['nav_child_url'] == $active){
						$nav_helpers[$k]['active']='active';
					}
				}
			}
			
		}
		
		if($nav_helpers && is_array($nav_helpers)){
			$data['nav']=$nav_helpers;
		}
		
		$data['active']=$active;
		
		return $this->load->view('common/helper_left',$data);
	}
	
	//这是手机端底部
	public function get_mobile_footer(){
		return $this->load->view('common/mobile_footer');
	}
	
	//这是前台页面不显示导航的下拉导航
	public function get_view_sideastop(){
		$this->load->model('setting/nav_setting');
		$nav_parents=$this->nav_setting->get_parent_nav('view_top');

		foreach($nav_parents as $v){
			//$nav_childs=$this->nav_setting->get_child_nav($v['nav_id']);
			$nav_childs[]=$this->nav_setting->get_child_nav($v['nav_id']);
		}
		
		foreach($nav_parents as $k=>$v){
			$nav_parents[$k]['childs']=&$nav_childs[$k];
		}
		$data['navs']=$nav_parents;
		
		return $this->load->view('common/view_sideastop',$data);
	}
	
	//访问统计函数
	public function report_access(){
		//系统类型$this->agent->is_robot()
		if($this->agent->platform()){
			$platform=$this->agent->platform();
		}else{
			$platform = NULL;
		}
		
		//浏览器
		if($this->agent->browser()){
			$browser = $this->agent->browser().$this->agent->version();
		}else{
			$browser = NULL;
		}
		
		//IP
		$ip=$this->input->ip_address();
		//上一级URL
		if($this->agent->referrer()){
			$referrer_url=$this->agent->referrer();
		}else{
			$referrer_url= '';
		}
		
		//如果不是已知爬虫才写入流量表
		if(!$this->agent->robot()){
			//判断机器人
			if($this->agent->checkrobot()){
				$robot = $this->agent->robot();
			}else{
				$robot = NULL;
			}
			
			$report_flow=array(
					'ip'					=>$ip,
					'referrer_url'			=>$referrer_url,
					'current_url'			=>$this->agent->get_page_url(),
					'token'					=>@$_SESSION['token'],
					'access_time'			=>date('Y-m-d H:i:s'),
					'platform'				=>$platform,
					'browser'				=>$browser,
					'robot'					=>$robot,
					'user_agent'			=>$this->agent->agent_string(),
			);
			
			//直接写入到数据库（因为这个类在model,所以没有再去load->model）
			$this->db->insert( $this->db->dbprefix('report_flow') , $report_flow);
		}
				
		//判断，如果是蜘蛛，不开session
		//if(!$this->agent->checkrobot()){
		if($this->agent->is_robot() === FALSE && stripos($this->agent->platform(),'Unknown') === FALSE && !empty($this->agent->browser()) && !empty($this->agent->platform()) && !$this->agent->checkrobot()){
			//写入一个随机session做为token令牌，用来检查是同一次访问
			if(!isset($_SESSION['token'])){//如果token不存在或者为空
				$this->load->helper('string');
				$token=random_string('sha1');
				$this->session->set_userdata('token', $token);
				$this->session->mark_as_temp('token', 24*60*60);
				
				//淘宝ip库
				//$ip='222.219.137.84';
				$url="http://ip.taobao.com/service/getIpInfo.php?ip=".$ip;
				@$ip=json_decode(file_get_contents($url)); 

				if((string)@$ip->code=='1'){
					$ip_address=array();
				}
				if((string)@$ip->code=='0'){
					$ip_address= (array)$ip->data;
				}
				
				//把用户访问信息写入数据库
				$report_access=array(
					'ip'			=>$this->input->ip_address(),
					'access_time'	=>date('Y-m-d H:i:s'),
					'platform'		=>$platform,
					'browser'		=>$browser,
					'ip_address'	=>serialize(@$ip_address),
					'token'			=>$token,
				);
				//直接写入到数据库（因为这个类在model,所以没有再去load->model）
				if(strlen(serialize(@$ip_address)) > 10){
					$this->db->insert( $this->db->dbprefix('report_access') , $report_access);
				}
			}
		}
		
		//如果是已知蜘蛛，把蜘蛛写入到report_robot表
		if($this->agent->robot()){
			$robot_data=array(
					'ip'					=>$ip,
					'robot_name'			=>$this->agent->robot(),
					'url'					=>$this->agent->get_page_url(),
					'access_time'			=>date('Y-m-d H:i:s'),
			);
		//直接写入到数据库（因为这个类在model,所以没有再去load->model）
		$this->db->insert( $this->db->dbprefix('report_robot') , $robot_data);
		}
	}
	
	
	public function is_access ($path_name){
		//判断是否有访问权限，如果没有，返回之前页
		$path_name=strtolower($path_name);//转小写
		if($this->user->hasPermission('access',$path_name) !== TRUE){
			//无权限查看
			$this->session->set_flashdata('setting_false', '你没有权限查看！');
			if($_SESSION['user_id']){
				redirect($this->agent->referrer() ? $this->agent->referrer() : 'home');
				exit();
			}else{
				redirect('home');
				exit();
			}
		}
	}
	
	public function is_modify ($path_name){
		//判断是否有修改权限，如果没有，不能提交，反回之前页
		$path_name=strtolower($path_name);//转小写
		if($this->user->hasPermission('modify',$path_name) !== TRUE){
			//无权限修改
			$this->session->set_flashdata('setting_false', '你没有权限修改！');
			if($_SESSION['user_id']){
				redirect($this->agent->referrer() ? $this->agent->referrer() : 'home');
				exit();
			}else{
				redirect('home');
				exit();
			}
		}
	}
	
	//过虑敏感字词
	public function word_censor ($text=''){
		$disallowed = $this->base_setting->get_setting('word_censor');
		if(!isset($disallowed)){
			return $text;
		}
		
		$disallowed = explode(';',$disallowed);
		return str_ireplace($disallowed, '*', $text);
	}
}