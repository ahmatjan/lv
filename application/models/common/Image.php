<?php
defined('BASEPATH') OR exit('No direct script access allowed');
//图片缓存处理类
class Image extends CI_Model {
	
	/**
	* 
	* @param undefined $filename 文件名
	* @param undefined $width    宽
	* @param undefined $height	 高
	* @param undefined $cache_time 缓存时间
	* 
	* @return
	*/
	public function rezice($filename='',$width='',$height='',$cache_time='1800')
	{
		if($this->base_setting->get_setting('ist_cachefile') == '1'){
			//以文件方式缓存图片
			if(!is_file('image/' . $filename)){
				return;
			}
			
			$extension = pathinfo($filename, PATHINFO_EXTENSION);//返回文件类型
			$old_image = 'image/' . $filename;//输入文件名
			$new_image = 'image/cache/' . substr($filename, 0, strrpos($filename, '.')) . '-' . $width . 'x' . $height . '.' . $extension;//缓存文件名
			
			
			if (!is_file($new_image) OR (filectime($old_image) > filectime($new_image))) {
		
				//如果缓存文件不存在或者缓存文件时间在文件之前
				$path = APPPATH . '../';

				$directories = explode('/', dirname(str_replace('../', '', $new_image)));//返回打散路径

				foreach ($directories as $directory) {
					$path = $path . '/' . $directory;

					if (!is_dir($path)) {//如果文件夹不存在创建
						@mkdir($path, 0777);
					}
				}

				list($width_orig, $height_orig) = getimagesize($old_image);

				if ($width_orig != $width OR $height_orig != $height) {//如果图片尺寸不相等
					if($width_orig < $height_orig && $width >= $height){
						$master_dim='width';
					}else{
						$master_dim='height';
					}
					//处理缓存图
					$config['image_library'] = 'gd2';
					$config['source_image'] = $old_image;
					$config['new_image'] = $new_image;
					$config['quality'] = $this->config->item('img_size');
					$config['create_thumb'] = FALSE;
					$config['maintain_ratio'] = TRUE;
					$config['master_dim'] = $master_dim;
					$config['width'] = $width;
					$config['height'] = $height;
					$config['file_permissions'] = 0777;

					$this->load->library('image_lib', $config); 

					$this->image_lib->resize();
					
					$this->image_lib->clear();

				} else {
					copy($old_image,$new_image);
				}
			}
			//panduan缓存文件是否存在
			
			if(!is_file(WWW_PATH . '/' . $new_image)){
				$new_image='public/image/no_img.gif';
			}
			
			return base_url($new_image);
		}else{
			//以二进制流输出图片
			$extension = pathinfo($filename, PATHINFO_EXTENSION);//返回文件类型
			$old_image = 'image/' . $filename;//输入文件名
			list($width_orig, $height_orig) = getimagesize($old_image);//获取文件高宽
			if ($width_orig != $width OR $height_orig != $height) {//如果图片尺寸不相等
				if($width_orig < $height_orig && $width >= $height){
					$master_dim='width';
				}else{
					$master_dim='height';
				}
				//处理缓存图
				
			} else {
				copy($old_image,$new_image);
			}
		}
	}
	
	//删除图片
	public function del_img ($data){
		//定义图片文件夹
		/**
		* 数组格式： 
		* array(
		*  'name'=>		
		* )
		*/
		$img_path=WWW_PATH.'/image/';
		//判断是不是一个数组
		if(is_array($data)){
			//是一个数组
			foreach($data as $img_name){
				//遍历数组
				$file_name=$img_path.$img_name;
				if( is_file( $file_name ) ){
					//如果文件存在，删除
					unlink($file_name);
				}
			}
			
		}else{
			$file_name=$img_path.$data;
			if( is_file( $file_name ) ){
				//如果文件存在，删除
				unlink($file_name);
			}
		}
	}
}