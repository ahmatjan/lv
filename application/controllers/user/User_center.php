<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_center extends CI_Controller {
	public function __construct() {
		parent::__construct();
			$this->output->https_jump();
	}
	
	public function index()
	{
		$this->lang->load('user/user_center');
		$header['css_page_style']=array('public/css/bootstrap-fileupload.css','public/css/chosen.css','public/css/profile.css','public/css/loading/portrait.css');
		
		$header['title']=$this->lang->line('heading_title');
		
		$this->public_section->get_header($header);
		$this->public_section->get_usertop();
		
		//开始主体程序
		//1、设置语言
		$data['text_title']=$this->lang->line('heading_title');
		$data['text_title_helper']=$this->lang->line('text_title_helper');
		
		//面包导航
		$data['breadcrumbs']=array(
			'home'			=>array(
								'name'=>$this->lang->line('text_home'),
								'url'=>site_url('home')
								),
			'setting'		=>array(
								'name'=>$this->lang->line('heading_title'),
								'this_url'=>site_url('user'),
								'url'=>''
								),
		);
		
		//接收一个选项卡位置（$data['tab_position']）
		$data['tab_position']=$this->input->get('tab_position');
		
		//用户user类来获取用户信息
		if($this->user->get_username()){
			$data['user_name']=$this->user->get_username();
		}else {
			$data['user_name']='';
		}
		
		if($this->user->get_nickname()){
			$data['nick_name']=$this->user->get_nickname();
		}else {
			$data['nick_name']='';
		}
		
		if($this->user->get_image()){
			$data['user_image']=$this->image->rezice($this->user->get_image(),203,203);
		}else{
			$data['user_image']='';
		}
		
		//资料修改
		//基本资料
		$this->load->model(array('user/user_info','user/user_description'));
		$user_infos = $this->user_info->get_userid_info($this->user->get_userid());
		$user_description = $this->user_description->get_userdescriptionforid($this->user->get_userid());
		$users = array_merge($user_infos,$user_description);
		$data['user_infos'] = $users;//直接传入数组，用于不是修改输入框的显示内容
		
		//$data[]传前台，用户资料修改，传model 入库
		if($this->input->post('user_name')){
			$data['user_name'] = $this->input->post('user_name');
		}elseif(isset($users['user_name'])){
			$data['user_name']=$users['user_name'];
		}else{
			$data['user_name']='';
		}
		
		if($this->input->post('nick_name')){
			$data['nick_name'] = $this->input->post('nick_name');
		}elseif(isset($users['nick_name'])){
			$data['nick_name']=$users['nick_name'];
		}else{
			$data['nick_name']='';
		}
		
		if($this->input->post('mobile')){
			$data['mobile'] = $this->input->post('mobile');
		}elseif(isset($users['mobile'])){
			$data['mobile']=$users['mobile'];
		}else{
			$data['mobile']='';
		}
		
		if($this->input->post('hobby')){
			$data['hobby'] = $this->input->post('hobby');
		}elseif(isset($users['hobby'])){
			$data['hobby']=$users['hobby'];
		}else{
			$data['hobby']='';
		}
		
		if($this->input->post('job')){
			$data['job'] = $this->input->post('job');
		}elseif(isset($users['job'])){
			$data['job']=$users['job'];
		}else{
			$data['job']='';
		}
		
		if($this->input->post('location')){
			$data['location'] = $this->input->post('location');
		}
		
		if($this->input->post('signature')){
			$data['signature'] = $this->input->post('signature');
		}elseif(isset($users['signature'])){
			$data['signature']=$users['signature'];
		}else{
			$data['signature']='';
		}
		
		if($this->input->post('blog')){
			$data['blog'] = $this->input->post('blog');
		}elseif(isset($users['blog'])){
			$data['blog']=$users['blog'];
		}else{
			$data['blog']='';
		}
		
		if($this->input->post('email')){
			$data['email'] = $this->input->post('email');
		}elseif(isset($users['email'])){
			$data['email']=$users['email'];
		}else{
			$data['email']='';
		}
		
		if($this->input->post('wechat')){
			$data['wechat'] = $this->input->post('wechat');
		}elseif(isset($users['wechat'])){
			$data['wechat']=$users['wechat'];
		}else{
			$data['wechat']='';
		}
		
		if($this->input->post('qq')){
			$data['qq'] = $this->input->post('qq');
		}elseif(isset($users['QQ'])){
			$data['qq']=$users['QQ'];
		}else{
			$data['qq']='';
		}
		
		$this->load->view('user/user_center',$data);
		$this->public_section->get_footer();
	}
	
	public function edit_userinfo(){
		if($this->validation_edit() !== FALSE){
			//验证通过
			$data['user_name'] = $this->input->post('user_name');
			$data['mobile'] = $this->input->post('mobile');
			$data['email'] = $this->input->post('email');
			$data['wechat'] = $this->input->post('wechat');
			$data['qq'] = $this->input->post('qq');
			$data['nick_name'] = $this->input->post('nick_name');
			$data['username_edit'] = '1';
			
			//
			
			$data['signature']=$this->input->post('signature');
			$data['location'] = serialize($this->input->post('location'));
			$data['hobby']=$this->input->post('hobby');
			$data['job']=$this->input->post('job');
			$data['blog']=$this->input->post('blog');
			$data['birthday']=$this->input->post('birthday');//出生日期
			
			$this->load->model('user/user_description');
			if($this->user_description->updata_user_description($data) == TRUE && $this->user_info->updata_userinfo($data) == TRUE){
				$this->session->set_flashdata('setting_success', '用户信息修改成功！');
				redirect(site_url('user'));
			}else{
				$this->session->set_flashdata('setting_false', '你的信息修改不成功！');
				redirect(site_url('user').'?tab_position=tab_1_3');
			}
			
		}else{
			$this->session->set_flashdata('setting_false', '你的信息修改不成功！');
			redirect(site_url('user').'?tab_position=tab_1_3');
		}
	}
	
	
	//用户头像上传
	public function imgsave(){
        //接收上传文件的二进制编码
        $file = $this->input->post('image'); //二进制数据流
        //接收数据不为空
        if(isset($file)){
	        $file = substr(strstr($file,','),1);
	        $file=base64_decode($file);
	  
	        //保存地址
	        $imgDir = WWW_PATH.'/image/catalog/'.date("Ym");
	        //判断创建文件夹
	        if (!is_dir($imgDir)){  
				//第三个参数是“true”表示能创建多级目录，iconv防止中文目录乱码
				$res=mkdir(iconv("UTF-8", "GBK", $imgDir),0777,true); 
			}
	        
	        //要生成的图片名字
	        $filename = '/'.md5(time().mt_rand(10, 99)).".gif"; //新图片名称
	        $newFilePath = $imgDir.$filename;
	        
	        $data = $file;
	        $newFile = fopen($newFilePath,"w"); //打开文件准备写入
	        fwrite($newFile,$data); //写入二进制流到文件
	        fclose($newFile); //关闭文件
	        //echo '修改头像成功';
	        
	        //删除原头像
	        $this->image->del_img($this->user->get_image());
	        
	        //修改数据库
	        $up_img='catalog/'.date("Ym").$filename;
	        
	        //写入数据库
	        $this->load->model('user/user_info');
	        //更新新数据
	        $this->user_info->updata_img($up_img,$this->user->get_userid());
	        
	    }else{
			echo '修改头像失败';
		}
    }
    
    //验证表彰数据
    public function validation_edit(){
		$this->load->library('form_validation');
		$this->load->model('user/user_info');
		$user_infos=$this->user_info->get_userid_info($this->input->post('user_name'));
		
		if($user_infos['username_edit'] == '1' && $user_infos['usern_ame'] !== $this->input->post('user_name')){
			$this->session->set_flashdata('setting_false', '用户名不能修改了！');
			return FALSE;
		}
		
		if(!empty($user_infos) && $user_infos['id'] !== $this->user->get_userid()){//查询结果不为空，并且查出来的用户id 不等当前用户id，说明重名了
			$this->session->set_flashdata('setting_false', '用户名已经被占用！');
			return FALSE;
		}
		
		if($this->input->post('mobile')){
			if(!preg_match("/1[3458]{1}\d{9}$/",$this->input->post('mobile'))){  
				$this->session->set_flashdata('setting_false', '手机号不正确！');
			     return FALSE; 
			}
		}
		
		$location = $this->input->post('location');
		if(isset($location)){
			if(empty($location)){
				$this->session->set_flashdata('setting_false', '请选择所在地！');
				return FALSE;
			}
		}
		
		if($this->input->post('wechat')){
			$this->form_validation->set_rules('wechat', '微信号', 'required|max_length[96]');
		}
		
		if($this->input->post('qq')){
			$this->form_validation->set_rules('qq', 'QQ号', 'required|max_length[96]');
		}
		
		if($this->input->post('user_name')){
			$this->form_validation->set_rules('user_name', '用户名', 'required|min_length[5]|max_length[96]');
		}
		if($this->input->post('nick_name')){
			$this->form_validation->set_rules('nick_name', '昵称', 'required|min_length[5]|max_length[96]');
		}
		if($this->input->post('hobby')){
			$this->form_validation->set_rules('hobby', '爱好', 'required|min_length[5]|max_length[255]');
		}
		if($this->input->post('job')){
			$this->form_validation->set_rules('job', '职业', 'required|min_length[5]|max_length[255]');
		}
		if($this->input->post('signature')){
			$this->form_validation->set_rules('signature', '个人简介', 'required|min_length[5]|max_length[255]');
		}
		
		if($this->input->post('blog')){
			$this->form_validation->set_rules('blog', '个人简介', 'required|valid_url|max_length[255]');
		}
		
		if ($this->form_validation->run() == TRUE){
			return TRUE;
		}
	}
}
