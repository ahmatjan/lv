<?php
/**
* 这是一个处理公共部分的类，它并不是一个严格的model,因为在ci的调用机制里，我想要复用一个带业务逻辑的公共部分所以我选择了这样来处理它，但是我想它并不是一个好的方法，但是它可能更便于在以后的维护。这个类已经自动载入，以后调用将不需要再次载入它
*/
class public_section extends CI_Model {
	
	//这是一个只包含css/js等引入的公共头部
	public function get_header($header)
	{
		//$this->load->helper('array');
		//把css样式组成字符串
		
		//$data['css_page_style']=arrayToString($header['css_page_style']);
		$data['css_page_style']=$header['css_page_style'];
		
		if(isset($header['meta'])){
			$data['meta']=$header['meta'];
		}else{
			$data['meta']='';
		}
		
		$data['title']=$header['title'];
		
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
		
		return $this->load->view('common/header',$data);
	}
	
	//这是网站前台的顶部
	public function get_top(){
		$this->load->model('setting/nav_setting');
		$nav_parents=$this->nav_setting->get_parent_nav('view_top');

		foreach($nav_parents as $v){
			//$nav_childs=$this->nav_setting->get_child_nav($v['nav_id']);
			$nav_childs[]=$this->nav_setting->get_child_nav($v['nav_id']);
		}
		
		foreach($nav_parents as $k=>$v){
			$nav_parents[$k]['childs']=&$nav_childs[$k];
		}
		
		if($nav_parents['0'] && is_array($nav_parents['0'])){
			$data['nav1']=array_slice($nav_parents,0,1);
		}
		
		if($nav_parents['1'] && is_array($nav_parents['1'])){
			$data['nav2']=array_slice($nav_parents,1);
		}
		/*
		$session_ipcity = $this->session->userdata('country');//国家
		if(isset($session_ipcity)){
			$data['ip_country']=$this->session->userdata('country');
		}
		
		$session_iparea = $this->session->userdata('area');//地区
		if(isset($session_iparea)){
			$data['session_iparea']=$this->session->userdata('area');
		}
		
		$session_ipregion = $this->session->userdata('region');//省
		if(isset($session_ipregion)){
			$data['session_ipregion']=$this->session->userdata('region');
		}
		
		$session_ipcity = $this->session->userdata('city');//城市
		if(isset($session_ipcity)){
			$data['session_ipcity']=$this->session->userdata('city');
		}
		
		$session_ipcounty = $this->session->userdata('county');//县
		if(isset($session_ipcounty)){
			$data['session_ipcounty']=$this->session->userdata('county');
		}
		*/
		
		//顶布局
		$this->load->module('common/module_top');
		$data['module_top'] = $this->module_top->index();
		
		return $this->load->view('common/top',$data);
	}
	
	//这是登陆的顶部
	public function get_login_top(){
		return $this->load->view('common/login_top');
	}
	
	//这是网部后台的顶部
	public function get_usertop(){
		//判断用户是否已经登陆并做出相应跳转
		
		if($this->session->userdata('logged_in')!==TRUE){
			$this->session->set_flashdata('error_login', '请先登陆，或者注册一个帐号！');//闪出错误信息
			redirect(site_url('user/login'));
		}
		
		//------------------------------------------------------------------------------------
		
		$this->load->model('setting/nav_setting');
		$nav_parents=$this->nav_setting->get_parent_nav('admin_top');

		foreach($nav_parents as $v){
			//$nav_childs=$this->nav_setting->get_child_nav($v['nav_id']);
			$nav_childs[]=$this->nav_setting->get_child_nav($v['nav_id']);
		}
		
		foreach($nav_parents as $k=>$v){
			$nav_parents[$k]['childs']=&$nav_childs[$k];
		}
		
		if($nav_parents['0'] && is_array($nav_parents['0'])){
			$data['nav1']=array_slice($nav_parents,0,1);
		}
		
		if($nav_parents['1'] && is_array($nav_parents['1'])){
			$data['nav2']=array_slice($nav_parents,1);
		}
		
		//顶布局
		$this->load->module('common/module_top');
		$data['module_top'] = $this->module_top->index();
		
		return $this->load->view('common/user_top',$data);
	}
	
	//这是网部的公共底部
	public function get_footer(){
		//调用淘宝ip库获取ip地址
		$session_ipcity = $this->session->userdata('country');
		
		if(!isset($session_ipcity)){
			//ip地址不存在
			$this->load->library('user_agent');
			$ip=$this->agent->get_ip();
			//$ip='222.219.137.84';
			$url="http://ip.taobao.com/service/getIpInfo.php?ip=".$ip;
			@$ip=json_decode(file_get_contents($url)); 

			if((string)@$ip->code=='1'){

				return false;

			}
			if((string)@$ip->code=='0'){
				$data = (array)$ip->data;

				$this->session->set_userdata($data);
			}

		}
		
		return $this->load->view('common/footer');
	}
	
	//这是用户后台左侧栏
	public function get_column_left(){
		//获取当前页链接
		$active=uri_string();
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
		$this->load->model('setting/nav_setting');
		$nav_helpers=$this->nav_setting->get_parent_nav('helper');

		foreach($nav_helpers as $nav_helper){
			//$nav_childs=$this->nav_setting->get_child_nav($v['nav_id']);
			$nav_helper_childs[]=$this->nav_setting->get_child_nav($nav_helper['nav_id']);
		}
		
		foreach($nav_helpers as $k=>$v){
			$nav_helpers[$k]['childs']=&$nav_helper_childs[$k];
		}
		
		if($nav_helpers['0'] && is_array($nav_helpers['0'])){
			$data['nav1']=array_slice($nav_helpers,0,1);
		}
		
		if($nav_helpers['1'] && is_array($nav_helpers['1'])){
			$data['nav2']=array_slice($nav_helpers,1,1);
		}
		
		if($nav_helpers['2'] && is_array($nav_helpers['2'])){
			$data['nav3']=array_slice($nav_helpers,2);
		}
		
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
}