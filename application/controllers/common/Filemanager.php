<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Filemanager extends CI_Controller {
	public function __construct() {
		parent::__construct();
			$this->output->https_jump();
			$this->load->helper('directory');
			$this->load->model(array('user/user_group','user/user_info','common/image'));
			//$this->load->model('user/user_info');
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
		if($this->input->get('filter_name') !== NULL){
			$filter_name = rtrim(str_replace(array('../', '..\\', '..', '*'), '', $this->input->get('filter_name')), '/');
		} else {
			$filter_name = null;
		}
		
		//输入文件夹名
		if ($this->input->get('directory') !== NULL) {
			$directory = rtrim(WWW_PATH . '/image/' . str_replace(array('../', '..\\', '..'), '', $this->input->get('directory')), '/');
		} else {
			$directory = $directory;
		}
		
		//页码
		if ($this->input->get('page') !== NULL) {
			$page = $this->input->get('page');
		} else {
			$page = 1;
		}
		
		//读取文件夹
		$directories = glob($directory . '/' . $filter_name . '*', GLOB_ONLYDIR);
		if ($this->input->get('directory') == NULL) {
			if(!empty($img_permission) && is_array($directories)){
				$i_count = strlen(WWW_PATH);
				foreach($directories as $d_k=>$d_v){
					if(!in_array(mb_substr($directories[$d_k],$i_count + 7),$img_permission)){
						unset($directories[$d_k]);
					}
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
		$data['images'][] = array();
		
		foreach ($images as $image) {
			$name = str_split(basename($image), 14);

			if (is_dir($image)) {
				$url = '';

				if ($this->input->get('target') !== NULL) {
					$url .= '&target=' . $this->input->get('target');
				}

				if ($this->input->get('thumb') !== NULL) {
					$url .= '&thumb=' . $this->input->get('thumb');
				}

				$data['images'][] = array(
					'thumb' => '',//缩略图，用于图片管理显示
					'name'  => implode(' ', $name),//名称，用于图片管理显示
					'type'  => 'directory',//类型
					'path'  => substr($image, strlen(WWW_PATH . '/image') + 1),//路径，用于操作文件
					'href'  => site_url('common/filemanager?directory=' . urlencode(substr($image, strlen(WWW_PATH . '/image') + 1)) . $url)//链接，用于打开文件，或文件夹
				);
			} elseif (is_file($image)) {
				$data['images'][] = array(
					'thumb' => $this->image->rezice(substr($image, strlen(WWW_PATH . '/image') + 1), 120, 77),
					'name'  => implode(' ', $name),
					'type'  => 'image',
					'path'  => substr($image, strlen(WWW_PATH . '/image') + 1),
					'href'  => base_url() . 'image/' . substr($image, strlen(WWW_PATH . '/image') + 1)
				);
			}
		}
		
		if ($this->input->get('directory') !== NULL) {
			$data['directory'] = urlencode($this->input->get('directory'));
		} else {
			$data['directory'] = '';
		}

		if ($this->input->get('filter_name') !== NULL) {
			$data['filter_name'] = $this->input->get('filter_name');
		} else {
			$data['filter_name'] = '';
		}

		// Return the target ID for the file manager to set the value
		if ($this->input->get('target') !== NULL) {
			$data['target'] = $this->input->get('target');
		} else {
			$data['target'] = '';
		}

		// Return the thumbnail for the file manager to show a thumbnail
		if ($this->input->get('thumb') !== NULL) {
			$data['thumb'] = $this->input->get('thumb');
		} else {
			$data['thumb'] = '';
		}

		// Parent
		$url = '';

		if ($this->input->get('directory') !== NULL) {
			$pos = strrpos($this->input->get('directory'), '/');

			if ($pos) {
				$url .= '&directory=' . urlencode(substr($this->input->get('directory'), 0, $pos));
			}
		}

		if ($this->input->get['target'] !== NULL) {
			$url .= '&target=' . $this->input->get('target');
		}

		if ($this->input->get('thumb') !== NULL) {
			$url .= '&thumb=' . $this->input->get('thumb');
		}

		$data['parent'] = site_url('common/filemanager' . $url);

		// Refresh
		$url = '';

		if ($this->input->get('directory') !== NULL) {
			$url .= '&directory=' . urlencode($this->input->get('directory'));
		}

		if ($this->input->get('target') !== NULL) {
			$url .= '&target=' . $this->input->get('target');
		}

		if ($this->input->get('thumb') !== NULL) {
			$url .= '&thumb=' . $this->input->get('thumb');
		}

		$data['refresh'] = site_url('common/filemanager' . $url);

		$url = '';

		if ($this->input->get('directory') !== NULL) {
			$url .= '&directory=' . urlencode(html_entity_decode($this->input->get('directory'), ENT_QUOTES, 'UTF-8'));
		}

		if ($this->input->get('filter_name') !== NULL) {
			$url .= '&filter_name=' . urlencode(html_entity_decode($this->input->get('filter_name'), ENT_QUOTES, 'UTF-8'));
		}

		if ($this->input->get('target') !== NULL) {
			$url .= '&target=' . $this->input->get('target');
		}

		if ($this->input->get('thumb') !== NULL) {
			$url .= '&thumb=' . $this->input->get('thumb');
		}
		//var_dump($data['images']);
		$this->load->view('common/filemanager',$data);
	}

}