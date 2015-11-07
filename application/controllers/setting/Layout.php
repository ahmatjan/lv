<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Layout extends CI_Controller {
	public function __construct() {
		parent::__construct();
			$this->output->https_jump();
	}
	
	public function index()
	{
		//判断权限
		$this->public_section->is_access('setting/layout');
		
		$this->lang->load('setting/layout');
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
								'url'=>site_url('user/User_center')
								),
			'setting'		=>array(
								'name'=>$this->lang->line('heading_title'),
								'this_url'=>site_url('setting/layout'),
								'url'=>''
								)
		);
		
		//开始主体程序
		//接收一个选项卡位置（$data['tab_position']）
		$data['tab_position']=$this->input->get('tab_position');
		
		$this->load->model('setting/layout_info');
		$layouts=$this->layout_info->get_layout_info();
		$data['layouts']=$layouts;//布局
		
		$this->load->model('setting/modules_info');
		$db_modules=$this->modules_info->get_module_info();
		//列出模块文件名
		$data['modules']=array();
		$this->load->helper('directory');
		$map_modules = directory_map('application/modules/', 1);//读取modules下的所有文件
		//便利文件名，排除非php文件
		foreach ($map_modules as $map_module){
		if(strstr($map_module,".php"))
			{
			    //$mp_modules['code'][]=$map_module;
			    $lang=substr($map_module,0,-4);
			    $lang= strtolower($lang);       	//将字符串转换为小写形式
			    $this->lang->load('modules/'.$lang);//加载语言文件
			    if($this->lang->line('heading_title')){
			    	$mp_modules['name'][]=$this->lang->line('heading_title');
			    }else {
			    	$mp_modules['name'][]='none';
			    }
			    
			    if($this->lang->line('description')){
			    	$mp_modules['description'][]=$this->lang->line('description');
			    }else {
			    	$mp_modules['description'][]='none';
			    }
			    
			    if($this->lang->line('author')){
			    	$mp_modules['author'][]=$this->lang->line('author');
			    }else {
			    	$mp_modules['author'][]='none';
			    }
			    
			    $mp_modules['code'][]=$lang;
			}
		}
		
		//遍历把两个数组组成一个
		foreach ($mp_modules as $key=>$value){
			if($key == 'name'){
				foreach ($value as $k=>$v){
					$mp_modul[$k]['name']=$value[$k];
					$mp_modul[$k]['module_id']='';
				}
			}
			if($key == 'code'){
				foreach ($value as $b=>$c){
					$mp_modul[$b]['code']=$value[$b];
				}
			}
			if($key == 'description'){
				foreach ($value as $q=>$w){
					$mp_modul[$q]['description']=$value[$q];
				}
			}
			if($key == 'author'){
				foreach ($value as $o=>$p){
					$mp_modul[$o]['author']=$value[$o];
				}
			}
		}
		
		//把文件中读取到的插件数组和数据库中（已安装的）插件数组合并成一个二维数组，并去重
		$modules=array_merge_recursive($db_modules,$mp_modul);
		$this->load->helper('array');//数组辅助函数
		$modules=assoc_unique($modules,'code');//二维数组去重
		
		$data['modules']=$modules;
		/*模块列表结束*/
		
		/*布局模块开始*/
		$data['layout_modules']=array();
		$layout_module=$this->layout_info->get_layout_module();
		$data['layout_modules']=$layout_module;
		/*布局模块开始*/
		
		$this->load->view('setting/layout',$data);
		
		$this->public_section->get_footer();
	}
	
	//卸载插件
	public function uninstall_module(){
		//判断权限
		$this->public_section->is_modify('setting/layout');
		
		$this->load->model('setting/modules_info');
		$module_id=$this->input->get('module_id');
		$layout_no=$this->modules_info->getdateby_moduleid($module_id);

		if(!empty($layout_no)){
			$this->session->set_flashdata('setting_false', '当前插件正在使用，不能卸载！');
			redirect(site_url('setting/layout?tab_position=tab_1_3'));
		}else{
			if(isset($module_id)){
				$this->modules_info->uninstall_module($module_id);
				$this->session->set_flashdata('setting_success', '插件卸载成功！');
				redirect(site_url('setting/layout?tab_position=tab_1_3'));
			}
		}
	}
	
	//安装插件
	public function install_module(){
		//判断权限
		$this->public_section->is_modify('setting/layout');
		
		$data['module_id']=$this->input->get('module_id');
		$data['name']=$this->input->get('name');
		$data['code']=$this->input->get('code');
		$data['description']=$this->input->get('description');
		$data['author']=$this->input->get('author');
		
		//var_dump($data);
		if(!$this->input->get('module_id')){
			if($this->validate_install_module($data) !== FALSE){
				//插件参数验证通过
				$this->load->model('setting/modules_info');
				$this->modules_info->install_module($data);//写入到数据库
				//安装成功重定向到layout页并（闪出）设置成功提示
				$this->session->set_flashdata('setting_success', '插件安装成功！');
				redirect(site_url('setting/layout?tab_position=tab_1_3'));
				
			}elseif($this->validate_install_module($data) == FALSE){
				$this->session->set_flashdata('setting_false', '插件参数验证不合法，请查检后再试！');
				redirect(site_url('setting/layout?tab_position=tab_1_3'));
			}
		}else{
			$this->session->set_flashdata('setting_false', '插件已经安装请不要重复操作！');
			redirect(site_url('setting/layout?tab_position=tab_1_3'));
		}
	}
	
	//验证插件安装数据是否合法
	public function validate_install_module ($data){
		$this->load->library('form_validation');
		if($this->form_validation->validata($data['name'],array(array('min_length',2),array('max_length',25),array('required')))!==TRUE){
			return FALSE;
		}
		
		if($this->form_validation->validata($data['description'],array(array('min_length',2),array('max_length',255),array('required')))!==TRUE){
			return FALSE;
		}
		
		if($this->form_validation->validata($data['author'],array(array('min_length',2),array('max_length',25),array('required')))!==TRUE){
			return FALSE;
		}
		
		if($this->form_validation->validata($data['code'],array(array('min_length',2),array('max_length',25),array('required')))!==TRUE){
			return FALSE;
		}
		
	}
}