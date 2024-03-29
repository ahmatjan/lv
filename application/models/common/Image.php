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
					
					//处理缓存图  保持原始纵横比  缩放
					$config['image_library'] = 'gd2';
					$config['source_image'] = $old_image;
					$config['new_image'] = $new_image;
					$config['quality'] = $this->config->item('img_size');
					$config['create_thumb'] = FALSE;
					//$config['master_dim'] = $master_dim;
					if($width_orig/$width > $height_orig/$height){//数值越大 说明要剪的部分越多
						$config['height'] = $height;
					}else{
						$config['width'] = $width;
					}
					$config['file_permissions'] = 0777;
					
					$this->image_lib->initialize($config);
					
					$this->image_lib->resize();
					
					$this->image_lib->clear();
					
					//图像剪裁
					
					//处理缓存图  不保持原始纵横比  剪裁
					list($width_ct, $height_ct) = getimagesize($new_image);
					if($width_ct > $width){
						$ct_x = ($width_ct - $width)/2;
					}else{
						$ct_x = '0';
					}
					
					if($height_ct > $height){
						$ct_y = ($height_ct - $height)/2;
					}else{
						$ct_y = '0';
					}
					
					
					
					$config2['source_image'] = $new_image;
					$config2['new_image'] = $new_image;
					$config2['quality'] = 100;
					$config2['maintain_ratio'] = FALSE;
					$config2['width'] = $width;
					$config2['height'] = $height;
					$config2['x_axis'] = $ct_x;
					$config2['y_axis'] = $ct_y;
					$config2['file_permissions'] = 0777;
					
					$this->image_lib->initialize($config2);
					
					$this->image_lib->crop();
					
					$this->image_lib->clear();
					
					
					//添加水印
					$this->load->model('setting/base_setting');
					$watermark=$this->base_setting->get_setting('is_watermark');
					if($watermark == TRUE){//添加水印
						if($width > 300 || $height > 300){
							$config1['image_library'] = 'gd2';
							$config1['source_image'] = $new_image;
							$config1['new_image'] = $new_image;
							$config1['quality'] = 100;
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
			//远程读取，绽放加水印，会拖慢速度
			//return site_url('common/tools/url_image?image='.$filename.'&width='.$width.'&height='.$height.'&cache_time='.$cache_time);
			
			//把图片下载到本地
			if(!isset($filename)){
				$new_image='public/image/no_img.gif';
				return base_url($new_image);//本地图片调取
				exit();
			}
			
			$old_filename = md5($filename).'.gif';//原图名称
			$new_filename = md5($filename).'-'.$width.'-'.$height.'.gif';//新图片名称
			$new_image = 'image/cache/online_pic/'.$new_filename;//新图路径
			$path = WWW_PATH . '/image/cache/online_pic';//网络图文缓存件夹路径
			if (!is_dir($path)) {//如果文件夹不存在创建
				@mkdir($path, 0777);
			}
			if (!is_dir(WWW_PATH.'/image/online_pic')) {//如果文件夹不存在创建
				@mkdir(WWW_PATH.'/image/online_pic', 0777);
			}
			
			if(!is_file('image/online_pic/' . $old_filename)){//原图不存在
				$this->download_remote_file_with_curl($filename,'image/online_pic/'.$old_filename);
			}
			
			if(!is_file($new_image)){
				$this->load->library('image_lib');
				
				//处理缓存图
				$config['image_library'] = 'gd2';
				$config['source_image'] = 'image/online_pic/'.$old_filename;
				$config['new_image'] = $new_image;
				$config['quality'] = $this->config->item('img_size');
				$config['create_thumb'] = FALSE;
				//$config['maintain_ratio'] = FALSE;
				//$config['master_dim'] = 'width';
				list($width_orig, $height_orig) = getimagesize('image/online_pic/'.$old_filename);
				if($width_orig/$width > $height_orig/$height){//数值越大 说明要剪的部分越多
					$config['height'] = $height;
				}else{
					$config['width'] = $width;
				}
				$config['file_permissions'] = 0777;
				
				$this->image_lib->initialize($config);
				
				$this->image_lib->resize();
				
				//图像剪裁
					
				//处理缓存图  不保持原始纵横比  剪裁
				list($width_ct, $height_ct) = getimagesize($new_image);
				if($width_ct > $width){
					$ct_x = ($width_ct - $width)/2;
				}else{
					$ct_x = '0';
				}
				
				if($height_ct > $height){
					$ct_y = ($height_ct - $height)/2;
				}else{
					$ct_y = '0';
				}
				
				
				
				$config2['source_image'] = $new_image;
				$config2['new_image'] = $new_image;
				$config2['quality'] = 100;
				$config2['maintain_ratio'] = FALSE;
				$config2['width'] = $width;
				$config2['height'] = $height;
				$config2['x_axis'] = $ct_x;
				$config2['y_axis'] = $ct_y;
				$config2['file_permissions'] = 0777;
				
				$this->image_lib->initialize($config2);
				
				$this->image_lib->crop();
				
				$this->image_lib->clear();
				
				//添加水印
				$this->load->model('setting/base_setting');
				$watermark=$this->base_setting->get_setting('is_watermark');
				if($watermark == TRUE){//添加水印
					if($width > 300 || $height > 300){
						$config1['image_library'] = 'gd2';
						$config1['source_image'] = $new_image;
						$config1['new_image'] = $new_image;
						$config1['quality'] = 100;
						$config1['create_thumb'] = FALSE;
						//$config1['maintain_ratio'] = FALSE;
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
					}
				}
				$this->image_lib->clear();
			}
				
			//panduan缓存文件是否存在
			if(!is_file(WWW_PATH . '/' . $new_image)){
				$new_image='public/image/no_img.gif';
			}
			
			return base_url($new_image);//本地图片调取
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
	
	//下载远程图片到本地
	function download_remote_file_with_curl($file_url, $save_to)
	{
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_POST, 0); 
		curl_setopt($ch,CURLOPT_URL,$file_url); 
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 
		$file_content = curl_exec($ch);
		curl_close($ch);
 
		$downloaded_file = fopen($save_to, 'w');
		fwrite($downloaded_file, $file_content);
		fclose($downloaded_file);
 
	}
}