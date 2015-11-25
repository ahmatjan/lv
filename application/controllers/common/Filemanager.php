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
		@$user_groupid=$this->user->get_groupId();
		
		$img_permission=$this->user_group->get_infobygroup_id($user_groupid);//权限
		$img_permission=$img_permission['permission'];
		@$img_permission = unserialize($img_permission)['file_manager'];
		
		if(empty($img_permission)){//如果文件权限为空
			$directory = WWW_PATH.'/image/user/'.date('Y-m-d',strtotime($this->user_info->get_useraddtime($user_groupid))).'/'.$this->user->get_userid();
		}else{
			$directory = WWW_PATH.'/image';
		}
		
		if(!isset($user_groupid)){
			$data['error_info'] = '登陆超时，请重新登陆！';
		}
		
		//输入文件名
		if($this->input->get('filter_name')){
			$filter_name = rtrim(str_replace(array('../', '..\\', '..', '*'), '', $this->input->get['filter_name']), '/');
		} else {
			$filter_name = null;
		}
		
		//输入文件夹名
		if (isset($this->input->get['directory'])) {
			$directory = rtrim(WWW_PATH . '/image/' . str_replace(array('../', '..\\', '..'), '', $this->input->get['directory']), '/');
		} else {
			$directory = $directory;
		}

		//页码
		if (isset($this->input->get['page'])) {
			$page = $this->input->get['page'];
		} else {
			$page = 1;
		}
		
		//读取文件夹
		$directories = glob($directory . '/' . $filter_name . '*', GLOB_ONLYDIR);
		if(!empty($img_permission) && is_array($directories)){
			$i_count = strlen(WWW_PATH);
			foreach($directories as $d_k=>$d_v){
				if(!in_array(mb_substr($directories[$d_k],$i_count + 7),$img_permission)){
					unset($directories[$d_k]);
				}
			}
		}
		if (!$directories) {
			$directories = array();
		}
		
		//读取文件
		$files = glob($directory . '/' . $filter_name . '*.{jpg,jpeg,png,gif,JPG,JPEG,PNG,GIF}', GLOB_BRACE);

		if (!$files) {
			$files = array();
		}

		//合并数组
		$images = array_merge($directories, $files);
		
		//统计图片数量
		$image_total = count($images);
		
		// Split the array based on current page number and max number of items per page of 10
		$images = array_splice($images, ($page - 1) * 16, 16);
		
		$this->load->helper('string');
		foreach ($images as $image) {
			$name = str_split(basename($image), 14);

			if (is_dir($image)) {
				$url = '';

				if (isset($this->input->get['target'])) {
					$url .= '&target=' . $this->input->get['target'];
				}

				if (isset($this->input->get['thumb'])) {
					$url .= '&thumb=' . $this->input->get['thumb'];
				}

				$data['images'][] = array(
					'thumb' => '',
					'name'  => implode(' ', $name),
					'type'  => 'directory',
					'path'  => substr_cn($image, strlen(WWW_PATH . '/image')),
					'href'  => site_url('common/filemanager?token=' . $this->session->data['token'] . '&directory=' . urlencode(substr_cn($image, strlen(WWW_PATH . '/image' . 'catalog/'))) . $url)
				);
			} elseif (is_file($image)) {
				// Find which protocol to use to pass the full image link back
				if ($this->input->server['HTTPS']) {
					$server = HTTPS_CATALOG;
				} else {
					$server = HTTP_CATALOG;
				}

				$data['images'][] = array(
					'thumb' => $this->model_tool_image->resize(substr_cn($image, strlen(WWW_PATH . '/image')), 100, 100),
					'name'  => implode(' ', $name),
					'type'  => 'image',
					'path'  => substr_cn($image, strlen(WWW_PATH . '/image')),
					'href'  => base_url() . 'image/' . substr_cn($image, strlen(WWW_PATH . '/image'))
				);
			}
		}
		
		$this->load->view('common/filemanager',$data);
	}

}