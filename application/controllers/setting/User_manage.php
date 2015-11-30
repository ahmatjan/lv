<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_manage extends CI_Controller {
	public function __construct() {
		parent::__construct();
			$this->output->https_jump();
	}
	
	public function index()
	{
		//判断权限
		$this->public_section->is_access('setting/user_manage');
		
		$this->lang->load('setting/user_manage');
		//header部分
		$header['title']=$this->lang->line('heading_title');
		$header['css_page_style']=array('public/css/chosen.css','public/css/daterangepicker.css','public/css/summernote.css','public/css/jquery.fancybox.css','public/css/select2_metro.css','public/css/multi-select-metro.css','public/css/DT_bootstrap.css');
		$this->public_section->get_header($header);
		$this->public_section->get_usertop();
		
		//1、设置语言
		$data['text_title']=$this->lang->line('heading_title');
		$data['text_title_helper']=$this->lang->line('text_title_helper');
		$data['text_select']=$this->lang->line('text_select');
		
		//面包导航
		$data['breadcrumbs']=array(
			'home'			=>array(
								'name'=>$this->lang->line('text_home'),
								'url'=>site_url()
								),
			'user_center'	=>array(
								'name'=>$this->lang->line('text_user_home'),
								'url'=>site_url('user')
								),
			'setting'		=>array(
								'name'=>$this->lang->line('heading_title'),
								'this_url'=>site_url('setting/user_manage'),
								'url'=>''
								)
		);
		
		//开始主体程序
		//接收一个选项卡位置（$data['tab_position']）
		$data['tab_position']=$this->input->get('tab_position');
		
		//获取第一组用户信息
		$this->load->model(array('user/user_info','user/user_group'));
		
		//用户信息
		$data['user_infos']=array();
		$user_infos=$this->user_info->get_userall();
		//遍历用户
		foreach($user_infos as $k=>$v){
			//$this->user_group->get_namebygroup_id('1');
			$user_infos[$k]['group_name']=$this->user_group->get_namebygroup_id($user_infos[$k]['group_id']);
		}
		
		$data['user_infos']=$user_infos;
		
		//用户组信息
		$data['groups']=$this->user_group->get_groupall();
		
		$this->load->view('setting/user_manage',$data);
		
		$this->public_section->get_footer();
	}
	
	//管理员登陆用户帐号
	public function login_user(){
		//判断权限
		$this->public_section->is_modify('setting/user_manage');

		if($this->input->get('user_id')!==NULL){
			//模拟登陆，把用户信息写入session
			$this->session->set_userdata('user_id', $this->input->get('user_id'));
			
			$this->session->set_flashdata('setting_success', '登陆用户成功！');
			redirect('user');		
		}else{
			$this->session->set_flashdata('setting_false', '登陆用户失败用户id不存在！');
			redirect('setting/user_manage');
		}
	}
	
	//编辑用户组
	public function edit_usergroup(){
		//判断权限
		$this->public_section->is_modify('setting/user_manage');
		
		$this->lang->load('setting/setting_form');
		//header部分
		$header['title']=$this->lang->line('heading_title');
		$header['css_page_style']=array('public/css/chosen.css','public/css/daterangepicker.css','public/css/summernote.css','public/css/jquery.fancybox.css','public/css/select2_metro.css','public/css/multi-select-metro.css','public/css/DT_bootstrap.css');
		$this->public_section->get_header($header);
		$this->public_section->get_usertop();
		
		//开始主体程序
		//接收一个选项卡位置（$data['tab_position']）
		$data['tab_position']=$this->input->get('tab_position');
		
		//1、设置语言
		$data['text_title']=$this->lang->line('heading_title');
		$data['text_title_helper']=$this->lang->line('text_title_helper');
		
		//面包导航
		$data['breadcrumbs']=array(
			'home'			=>array(
								'name'=>$this->lang->line('text_home'),
								'url'=>site_url()
								),
			'user_center'		=>array(
								'name'=>$this->lang->line('text_user_home'),
								'url'=>site_url('user')
								),
			'setting'		=>array(
								'name'=>$this->lang->line('heading_title'),
								'this_url'=>site_url('setting/Setting_form'),
								'url'=>''
								),
		);
		
		$this->load->helper(array('directory','array'));
		$maps = directory_map(APPPATH.'controllers');
		$maps_image = directory_map(WWW_PATH.'/image',1);//图片文件夹权限
		
		foreach($maps_image as $ma_k=>$ma_v){
			//排除不管理的文件夹
			if(strpos($maps_image[$ma_k], '.') == TRUE || $maps_image[$ma_k] == 'cache\\'){
				unset($maps_image[$ma_k]);
			}
		}
		foreach($maps_image as $map_k=>$map_v){
			$maps_image[$map_k] = substr($maps_image[$map_k],0,strlen($maps_image[$map_k])-1);
		}//图片文件夹权限
		
		foreach($maps as $k=>$v){
			if(is_int($k)){
				$maps_new['1'][]=$v;
			}
			if(is_array($v)){
				foreach($v as $b=>$c){
					$maps_new['2'][] = $k.$c;
				}
			}
		}

		$maps=arrayToString($maps_new);
		$maps=str_replace('\\', '/', $maps);
		$maps=explode(',',$maps);
		
		foreach ($maps as $k=>$v){
			if(pathinfo($v, PATHINFO_EXTENSION)=='php'){
				$maps[$k]=strtolower(substr($v,0,-4));	
			}else{
				unset($maps[$k]);
			}
		}//到这这里$maps成了一个纯一维数组，并且去除了非php文件
		
		//排除前台，公共部分不用管理权限的文件
		$this->config->load('permission');//加载配置文件
		$ignore = $this->config->item('ignore');
		$maps=array_diff($maps,$ignore);
		//排除前台，公共部分不用管理权限的文件
		
		//获取用户分组信息
		$group_infos=array();
		if($this->input->get('group_id')!==NULL){
			$this->load->model('user/user_group');
			$group_infos=$this->user_group->get_infobygroup_id($this->input->get('group_id'));
		}
		
		if($this->input->post('group_name')){
			$data['group_name']=$this->input->post('group_name');	
		}elseif(isset($group_infos['name'])){
			$data['group_name']=$group_infos['name'];
		}else{
			$data['group_name']='';
		}
		
		if($this->input->post('group_description')){
			$data['group_description']=$this->input->post('group_description');	
		}elseif(isset($group_infos['description'])){
			$data['group_description']=$group_infos['description'];
		}else{
			$data['group_description']='';
		}
		
		/**
		* $permission=array(
		*		'access'=>array(
		* 			'0'=>'',
		* 			'1'=>''
		* 		), 
		* 		'modify'=>array(
		* 			'0'=>'',
		* 			'1'=>''
		* 		)
		* );
		* @var 
		* 
		*/
		@$permission=unserialize($group_infos['permission']);//序列化转数组（权限）
		
		if($this->input->post('my_multi_select1')){
			$data['permission_view1']=$this->input->post('my_multi_select1');//选中的查看权限
			$data['permission_view2']=array_diff($maps,$this->input->post('my_multi_select1'));//未选中的查看权限/差集
			
		}elseif(count($permission['access'])>1){
			$data['permission_view1']=$permission['access'];
			$data['permission_view2']=array_diff($maps,$permission['access']);
		}else{
			$data['permission_view1']=array();
			$data['permission_view2']=$maps;
		}
		
		//编辑权限
		if($this->input->post('my_multi_select2')){
			$data['permission_edit1']=$this->input->post('my_multi_select2');//选中的查看权限
			$data['permission_edit2']=array_diff($maps,$this->input->post('my_multi_select2'));//未选中的查看权限/差集
			
		}elseif(count($permission['modify'])>1){
			$data['permission_edit1']=$permission['modify'];
			$data['permission_edit2']=array_diff($maps,$permission['modify']);
		}else{
			$data['permission_edit1']=array();
			$data['permission_edit2']=$maps;
		}
		
		if(empty($permission['file_manager'])){
			$permission['file_manager']=array();
		}
		if($this->input->post('my_multi_select3')){
			$data['file_manager1']=$permission['file_manager'];
			$data['file_manager2']=array_diff($maps_image,$permission['file_manager']);
		}elseif(count($permission['file_manager'])>1){
			$data['file_manager1']=$permission['file_manager'];
			$data['file_manager2']=array_diff($maps_image,$permission['file_manager']);
		}else{
			$data['file_manager1']=array();
			$data['file_manager2']=$maps_image;
		}

		//group_id
		if($this->input->get('group_id')!==NULL){
			$data['group_id']=$this->input->get('group_id');
		}else{
			$data['group_id']='';
		}
		
		$this->load->view('setting/user_group_form',$data);
		$this->public_section->get_footer();
	}
	
	//添加或修改用户组
	public function edit_groupinfo(){
		//判断权限
		$this->public_section->is_modify('setting/user_manage');
		
		/**
		* serialize($this->input->post('my_multi_select1'));  系列化数组
		* @var 
		* unserialize($data['permission_view'])                系列化转成数组
		*/
		//把查看和修改权限合并成一个二维数组
		$permission=array(
				'access'=>$this->input->post('my_multi_select1'),
				'modify'=>$this->input->post('my_multi_select2'),
				'file_manager'=>$this->input->post('my_multi_select3'),
		);
		
		$data['group_id']=$this->input->post('group_id');
		$data['name']=$this->input->post('group_name');
		$data['description']=$this->input->post('group_description');
		$data['permission']=serialize($permission);
		
		if($this->validation_editgroupifo($data)!==FALSE){
			//把修改写入数据库
			$this->load->model('user/user_group');
			$this->user_group->int_group($data);
			$this->session->set_flashdata('setting_success', '用户组操作成功！');
			redirect('setting/user_manage?tab_position=tab_1_3');
		}else{
			$this->session->set_flashdata('setting_false', '用户组操作不成功！');
			redirect('setting/user_manage/edit_usergroup?group_id='.$this->input->post('group_id'));
		}
	}
	
	//验证用户组数据
	public function validation_editgroupifo($data){
		$this->load->library('form_validation');
		
		if($this->form_validation->validata($data['name'],array(array('required'),array('max_length',25)))!==TRUE){
			return FALSE;
		}
		
		if($this->form_validation->validata($data['description'],array(array('max_length',128)))!==TRUE){
			return FALSE;
		}
	}
}