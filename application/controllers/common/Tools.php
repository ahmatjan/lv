<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tools extends CI_Controller {
	
	public function url_image(){
		$url=$this->input->get('image');
		$no_img=base_url('public/image/no_img.gif');
		if(@fopen( $url, 'r' ) == FALSE)
		{
		   //文件不存在
		   $url=$no_img;
		}
		if($this->input->get('width')==NULL){
			$width= '100';
		}else{
			$width=$this->input->get('width');
		}
		if($this->input->get('height') == NULL){
			$height='100';
		}else{
			$height=$this->input->get('height');
		}

		$cache_time=$this->input->get('cache_time');
		
		// 读取图片
		ini_set("memory_limit", "60M");
		$img_infos = getimagesize($url);//获取图片信息
		
		if($img_infos['0'] > $img_infos['1'] && $width > $height){//都是宽比高大
			$n_x=$width;
			$n_y=$height;
		}
		if($img_infos['0'] < $img_infos['1'] && $width > $height){
			$n_y=$width;
			$n_x=$height;
		}
		if($img_infos['0'] > $img_infos['1'] && $width < $height){
			$n_x=$width;
			$n_y=$height;
		}
		if($img_infos['0'] < $img_infos['1'] && $width < $height){
			$n_y=$width;
			$n_x=$height;
		}
		
		switch($img_infos[2])
		{
			case 1	:
				$imgsrc=imagecreatefromgif($url);
				break;
			case 2	:
				$imgsrc=imagecreatefromjpeg($url);
				break;
			case 3	:
				$imgsrc=imagecreatefrompng($url);
				break;
			default:
				@$imgsrc=imagecreatefrompng($url);
				//echo 'Unable to display the image';
				break;
		}
		
		//$imgsrc=imagecreatefromjpeg($url);
		
		$image = imagecreatetruecolor($width, $height);  //创建一个彩色的底图
		
	    imagecopyresampled($image, $imgsrc, 0, 0, 0, 0,$n_x,$n_y,$img_infos['0'], $img_infos['1']);
	    
	    //添加水印
		$this->load->model('setting/base_setting');
		$watermark=$this->base_setting->get_setting('is_watermark');
		if($watermark == TRUE){//添加水印
			if($width > 300 || $height > 300){
				$font = WWW_PATH.'/public/font/niao.ttf';//字体
				$black = imagecolorallocate($image, 255, 255, 255);//字体颜色
				imagefttext($image, 12, 0, $width - 90, $height - 5, $black, $font, 'lvxingto.com');
			}
		}
	    
	    header("Pragma: cache");
		$offset = 30*60*60*24; // cache 1 month
		$ExpStr = "Expires: ".gmdate("D, d M Y H:i:s", time() + $offset)." GMT";
		
		header($ExpStr);
		switch($img_infos[2])
		{
			case 1	:
				header('Content-Type: image/gif');
	    		imagegif($image);
				break;
			case 2	:
				header('Content-Type: image/jpeg');
	    		imagejpeg($image);
				break;
			case 3	:
				header('Content-Type: image/png');
	    		imagepng($image);
				break;
			default:
				header('Content-Type: image/png');
	    		imagepng($image);
				//echo 'Unable to display the image';
				break;
		}
	    imagedestroy($image);
	}
	
	//非网络图片的缓存
	public function image_cache(){
		$url=$this->input->get('image');
		
		ini_set("memory_limit", "60M");
		$img_infos = getimagesize($url);//获取图片信息
		$types = array(1 => 'gif', 2 => 'jpeg', 3 => 'png');
		$mime = (isset($types[$img_infos[2]])) ? 'image/'.$types[$img_infos[2]] : 'image/jpg';
		if($mime == 'image/gif' && $img_infos['0'] < 200){
			$image=imagecreatefromgif($url);
			header("Pragma: cache");
			$offset = 30*60*60*24; // cache 1 month
			$ExpStr = "Expires: ".gmdate("D, d M Y H:i:s", time() + $offset)." GMT";
			
			header($ExpStr);
			header('Content-Type: image/gif');
	    	imagegif($image);
	    	imagedestroy($image);
	    	exit();
		}
		
		switch($img_infos[2])
		{
			case 1	:
				$image=imagecreatefromgif($url);
				break;
			case 2	:
				$image=imagecreatefromjpeg($url);
				break;
			case 3	:
				$image=imagecreatefrompng($url);
				break;
			default:
				@$imgsrc=imagecreatefrompng($url);
				//echo 'Unable to display the image';
				break;
		}
		
		header("Cache-Control: public");
		header("Pragma: cache");
		$offset = 30*60*60*24; // cache 1 month
		$ExpStr = "Expires: ".gmdate("D, d M Y H:i:s", time() + $offset)." GMT";
		header($ExpStr);
		switch($img_infos[2])
		{
			case 1	:
				header('Content-Type: image/gif');
	    		imagegif($image);
				break;
			case 2	:
				header('Content-Type: image/jpeg');
	    		imagejpeg($image);
				break;
			case 3	:
				header('Content-Type: image/png');
	    		imagepng($image);
				break;
			default:
				header('Content-Type: image/png');
	    		imagepng($image);
				//echo 'Unable to display the image';
				break;
		}
	    imagedestroy($image);
	}
}
