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
		if(!preg_match('/http:\/\/[\w.]+[\w\/]*[\w.]*\??[\w=&\+\%]*/is',$filename)){

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
					
					$this->load->library('image_lib');
					
					//处理缓存图
					$config['image_library'] = 'gd2';
					$config['source_image'] = $old_image;
					$config['new_image'] = $new_image;
					$config['quality'] = $this->config->item('img_size');
					$config['create_thumb'] = FALSE;
					$config['maintain_ratio'] = FALSE;
					$config['master_dim'] = 'width';
					$config['width'] = $width;
					$config['height'] = $height;
					$config['file_permissions'] = 0777;
					
					$this->image_lib->initialize($config);
					
					$this->image_lib->resize();
					
					$this->image_lib->clear();
					
					//添加水印
					$this->load->model('setting/base_setting');
					$watermark=$this->base_setting->get_setting('is_watermark');
					if($watermark == TRUE){//添加水印
						if($width > 300 || $height > 300){
							$config1['image_library'] = 'gd2';
							$config1['source_image'] = $new_image;
							$config1['new_image'] = $new_image;
							$config1['quality'] = $this->config->item('img_size');
							$config1['create_thumb'] = FALSE;
							$config1['maintain_ratio'] = FALSE;
							$config1['wm_text'] = 'lvxingto.com';
							$config1['wm_type'] = 'text';
							$config1['wm_font_path'] = WWW_PATH.'/public/font/niao.ttf';//字体
							$config1['wm_font_size'] = '12';
							$config1['wm_font_color'] = 'ffffff';
							$config1['wm_vrt_alignment'] = 'bottom';
							$config1['wm_hor_alignment'] = 'right';
							$config1['wm_padding'] = '-15';
							$config['file_permissions'] = 0777;
							$config['wm_hor_offset'] = '0';
							
							$this->image_lib->initialize($config1);
							$this->image_lib->watermark();
							$this->image_lib->clear();
						}
					}
					
				} else {
					copy($old_image,$new_image);
				}
			}
			//panduan缓存文件是否存在
			if(!is_file(WWW_PATH . '/' . $new_image)){
				$new_image='public/image/no_img.gif';
			}
			
			//二进制输出图片
			//return site_url('common/tools/image_cache?image='.$new_image.'&cache_time='.$cache_time);
			
			return base_url($new_image);//本地图片调取
		}else{
			//Header("HTTP/1.1 303 See Other"); //这条语句可以不写
			return site_url('common/tools/url_image?image='.$filename.'&width='.$width.'&height='.$height.'&cache_time='.$cache_time);
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