<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Filemanager extends CI_Controller {
	public function __construct() {
		parent::__construct();
			$this->output->https_jump();
			$this->load->helper('directory');
			$this->load->model(array('user/user_group','user/user_info','common/image'));
			$this->load->library('upload');
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
		
		//如果用户文件夹不存在 ，创建
		if (!is_dir($directory)) {//如果文件夹不存在创建
			@mkdir($directory, 0777,TRUE);
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
			$directory = rtrim($directory .'/'. str_replace(array('../', '..\\', '..'), '', $this->input->get('directory')), '/');
		} else {
			$directory = $directory;
		}
		
		//页码
		if ($this->input->get('per_page') !== NULL) {
			$page = $this->input->get('per_page');
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
		$images = array_splice($images, ($page - 1), 16);
		
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
				$url .= '?directory=' . urlencode(substr($this->input->get('directory'), 0, $pos));
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
			$url .= '?directory=' . urlencode($this->input->get('directory'));
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
			$url .= '?directory=' . urlencode(html_entity_decode($this->input->get('directory'), ENT_QUOTES, 'UTF-8'));
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
		
		//分页
		$this->load->library('pagination');
		$config['base_url'] 			= site_url('common/filemanager'). $url;
		$config['page_query_string'] 	= TRUE;
		$config['total_rows']			= $image_total;
		$config['attributes']['rel'] 	= FALSE;
		$config['per_page'] 			= 16;
		$config['full_tag_open'] 		= '<ul class="pagination">';
		$config['full_tag_close'] 		= '</ul>';
		$config['first_tag_open'] 		= '<li>';
		$config['first_tag_close'] 		= '</li>';
		$config['last_tag_open'] 		= '<li>';
		$config['last_tag_close'] 		= '</li>';
		$config['num_tag_open'] 		= '<li>';
		$config['num_tag_close'] 		= '</li>';
		$config['next_tag_open'] 		= '<li>';
		$config['next_tag_close'] 		= '<li>';
		$config['prev_tag_open'] 		= '<li>';
		$config['prev_tag_close'] 		= '</li>';
		$config['cur_tag_open'] 		= '<li class="active"><a>';
		$config['cur_tag_close'] 		= '</a></li>';
		
		$this->pagination->initialize($config);
		$data['pagination'] = $this->pagination->create_links();
		//var_dump($data['images']);
		//$this->public_section->get_header();
		$this->load->view('common/filemanager',$data);
	}
	
	//图片上传
	public function up_load() {
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

		$json = array();

		// Make sure we have the correct directory
		if ($this->input->get('directory') !== NULL) {
			$directory = rtrim($directory . '/' . str_replace(array('../', '..\\', '..'), '', $this->input->get('directory')), '/');
		}

		// Check its a directory
		if (!is_dir($directory)) {
			$json['error'] = '目录不存在！';
		}
		if (!$json) {
			if (!empty($_FILES["file"]["name"]) && is_file($_FILES["file"]["tmp_name"])) {
				
				//重命名文件
				$filename = date('U').'-'.rand(100,199).'.'.pathinfo($_FILES["file"]["name"], PATHINFO_EXTENSION);
			
				$config['upload_path']          = $directory;
                $config['allowed_types']        = 'gif|jpg|png|jpeg|x-png|pjpeg';
                $config['file_name']     		= $filename;
                $config['file_ext_tolower']     = TRUE;
                $config['max_size']             = 2048;
                $config['max_width']            = 1024;
                $config['max_height']           = 768;
                
                $this->upload->initialize($config);
                
                if($this->upload->do_upload('file') !== TRUE){
					//$json['error'] = '上传失败！';
					$json['error'] = $this->upload->display_errors('<p>', '</p>');
				}else{
					$json['success'] = '上传成功';
				}
			}
		}

		$this->output->set_content_type('application/json');
        $this->output->set_output(json_encode($json));
	}
	
	//新建文件夹
	public function folder(){
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

		$json = array();

		//如果没有user_id目录先创建
		/*
		if(!is_dir(DIR_IMAGE.'catalog/userfile/'.$this->user->getId())){
			mkdir(iconv("UTF-8", "GBK", DIR_IMAGE.'catalog/userfile/'.$this->user->getId()),0777,true);
		}
		*/
		if ($this->input->get('directory') !== NULL) {
			$directory = rtrim($directory .'/'. str_replace(array('../', '..\\', '..'), '', $this->input->get('directory')), '/');
		}

		// Check its a directory
		if (!is_dir($directory)) {
			$json['error'] = '已经存在！';
		}

		if (!$json) {
			// Sanitize the folder name
			$folder = str_replace(array('../', '..\\', '..'), '', basename(html_entity_decode($this->input->post('folder'), ENT_QUOTES, 'UTF-8')));

			// Validate the filename length
			if ((strlen($folder) < 1) || (strlen($folder) > 128)) {
				$json['error'] = '目录名不合法';
			}

			// Check if directory already exists or not
			if (is_dir($directory . '/' . $folder)) {
				$json['error'] = '目录已经存在！';
			}
		}

		if (!$json) {
			//mkdir($directory . '/' . $folder, 0777);不支持中文目录
			mkdir(iconv("UTF-8", "GBK", $directory . '/' . $folder),0777);//中文目录

			$json['success'] = '文件夹添加成功！';
		}

		$this->output->set_content_type('application/json');
        $this->output->set_output(json_encode($json));
	}
	//删除
	public function delete(){
		$this->load->language('common/filemanager');
		
		$json = array();

		// Check user has permission
		/*
		if (!$this->user->hasPermission('modify', 'common/filemanager')) {
			$json['error'] = $this->language->get('error_permission');
		}
*/
		if ($this->input->post('path') !== NULL) {
			$paths = $this->input->post('path');
		} else {
			$paths = array();
		}

		// Loop through each path to run validations
		foreach ($paths as $path) {
			$path = rtrim(WWW_PATH.'/image' . str_replace(array('../', '..\\', '..'), '', $path), '/');

			// Check path exsists
			if ($path == WWW_PATH . '/image') {
				$json['error'] = '该目录不能被删除';

				break;
			}
		}

		if (!$json) {
			// Loop through each path
			foreach ($paths as $path) {
				$path = rtrim(WWW_PATH.'/image/' . str_replace(array('../', '..\\', '..'), '', $path), '/');

				// If path is just a file delete it
				if (is_file($path)) {
					unlink($path);

				// If path is a directory beging deleting each file and sub folder
				} elseif (is_dir($path)) {
					$files = array();

					// Make path into an array
					$path = array($path . '*');

					// While the path array is still populated keep looping through
					while (count($path) != 0) {
						$next = array_shift($path);

						foreach (glob($next) as $file) {
							// If directory add to path array
							if (is_dir($file)) {
								$path[] = $file . '/*';
							}

							// Add the file to the files to be deleted array
							$files[] = $file;
						}
					}

					// Reverse sort the file array
					rsort($files);

					foreach ($files as $file) {
						// If file just delete
						if (is_file($file)) {
							unlink($file);

						// If directory use the remove directory function
						} elseif (is_dir($file)) {
							rmdir($file);
						}
					}
				}
			}

			$json['success'] = '文件删除成功！';
		}

		$this->output->set_content_type('application/json');
        $this->output->set_output(json_encode($json));
	}
}