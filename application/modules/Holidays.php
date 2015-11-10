<?php
defined('BASEPATH') OR exit('No direct script access allowed');
//图片缓存处理类
class Holidays extends CI_Module {
	
	public function index()
	{
		//农历节日判断获取类
		$this->load->library(array('lunar','cutf8_py'));
		//获取节日、节气名称
		//$festival=$this->lunar->getFestival(date('Y-m-d'),TRUE,'1');
		$festival=$this->lunar->getFestival('2015-11-08',TRUE,'1');
			
		if(isset($festival)){
			//从数据库调节日数据
			$this->load->model('modules/holidays_info');
			$festivals=$this->holidays_info->get_holiday($festival);
			//把节日名称转成拼音，用于从对应文件夹中获取相关文件
			$festival_py=$this->cutf8_py->encode($festival,'all');
			$festival_py=str_replace(' ','_',$festival_py);
		}
		$data['festival']=$festival;
		//如果节日存在
		if(isset($festival)){
			$this->load->helper('directory');//加载目录辅助函数
			$img_path=WWW_PATH.'/public/modules/holidays/image/'.$festival_py.'/';//原图路径
			$map = directory_map($img_path);
			//从数组中随机取一个图片出来
			$img=array_rand($map);
			$img=$map[$img];
			
			$new_img=$this->new_img($img,$festivals,$festival_py);
			
			$data['new_img']=base_url($new_img);
		}else{
			$data['new_img']='';
		}
		
		return $this->load->view('modules/holidays',$data,TRUE);
	}
	
	public function new_img ($img,$festivals,$festival_py){
		//给缓存图片加前缀
		$newimg='new_'.$img;
		//判断缓存图片是否存在
		$cachefile=WWW_PATH.'/image/cache/modules/holidays';//缓存目录
		$imgpath=WWW_PATH.'/public/modules/holidays/image/'.$festival_py.'/';//原图路径
		if(!is_dir($cachefile.'/'.$festival_py)){
			//不存在
			$res=mkdir(iconv("UTF-8", "GBK", $cachefile.'/'.$festival_py),0777,true); //创建多级目录
		}
		
		if(is_file($cachefile.'/'.$festival_py.'/'.$newimg)){
			//缓存图片存在，直接返回缓存图片
			$new_='/image/cache/modules/holidays/'.$festival_py.'/'.$newimg;
		}

		if(!is_file($cachefile.'/'.$festival_py.'/'.$newimg)){
			//给图片添加水印，并生成新的图片，缓存在cache文件夹下
			$config['image_library'] = 'gd2';
			$config['source_image'] = $imgpath.$img;
			$config['wm_text'] = $festivals['name'];
			$config['wm_type'] = 'text';
			$config['wm_font_path'] = WWW_PATH.'/public/font/niao.ttf';
			$config['wm_font_size'] = '20';
			$config['quality'] = '90';
			$config['wm_font_color'] = 'ffffff';
			$config['wm_vrt_alignment'] = 'middle';
			$config['wm_hor_alignment'] = 'center';
			$config['wm_padding'] = '90';
			$config['new_image'] = $cachefile.'/'.$festival_py.'/'.$newimg;
			$config['create_thumb'] = FALSE;

			$this->load->library('image_lib', $config); 
			
			$this->image_lib->watermark();
			echo $this->image_lib->display_errors();
			$new_='/image/cache/modules/holidays/'.$festival_py.'/'.$newimg;
		}
		return $new_;
	}
}
