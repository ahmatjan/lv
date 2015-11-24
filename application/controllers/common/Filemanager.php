<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Filemanager extends CI_Controller {
	public function __construct() {
		parent::__construct();
			$this->output->https_jump();
			$this->load->helper('directory');
			$this->load->model('user/user_group');
			$this->load->model('user/user_info');
	}
	
	public function index() {
		$this->load->language('common/filemanager');
		
		$img_permission=$this->user_group->get_infobygroup_id($this->user->get_groupId());
		$img_permission=$img_permission['permission'];
		$img_permission = unserialize($img_permission)['file_manager'];
		if(empty($img_permission)){//如果文件权限为空
			$file_image = WWW_PATH.'/image/user/'.date('Y-m-d',strtotime($this->user_info->get_useraddtime($this->user->get_userid()))).'/'.$this->user->get_userid();
			$file_image = directory_map($file_image);

		}else{
			$file_image = WWW_PATH.'/image';
			$file_image = directory_map($file_image);
			foreach($file_image as $f_k=>$f_v){
				if(!is_array($f_v)){
					if(strpos($f_v, '.') == TRUE){
						unset($file_image[$f_k]);
					}
				}
				
				$f_k = substr($f_k,0,strlen($f_k)-1);
				if(!in_array($f_k,$img_permission)){
					unset($file_image[$f_k.'\\']);
				}
			}
		}
		var_dump($file_image);
		$data['file_manage']=$file_image;
		
		$this->load->view('common/filemanager',$data);
	}
}