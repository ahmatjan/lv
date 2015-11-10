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
			$map = directory_map($img);
			//从数组中随机取一个图片出来
			$img=array_rand($map);
			$img=$map[$img];
			
			//判断缓存图片是否存在
			$cacha_file=WWW_PATH.'/image/cache/modules/holidays';//缓存目录
			if(is_dir($cacha_file)){
				//判断文件夹是否存在【存在】
				if(file_exists($cacha_file.'/'.$img)){
					//判断文件是否存在[存在]
					//直接 返回图片路径
					$data['new_img']=base_url('image/cache/modules/holidays/'.$festival_py.'/'.$img);
				}else{
					//不存在
					$new_img=$this->new_img($img);//把参数传到new_img 函数生成缓存图片
					if($new_img){
						//缓存图片生成成功
						$data['new_img']=base_url('image/cache/modules/holidays/'.$festival_py.'/'.$new_img);
					}else{
						//缓存图片没有生成成功
						$data['new_img']='public/image/no_img.gif';
					}
					
				}
			}else{
				//不存在
				$res=mkdir(iconv("UTF-8", "GBK", $cacha_file),0777,true); //创建多级目录
				if($res){
					//说明创建目录成功
					$new_img=$this->new_img($img);
					if($new_img){
						//生成缓存图片成功
						$data['new_img']=base_url('image/cache/modules/holidays/'.$festival_py.'/'.$new_img);
					}else{
						//缓存图片没有生成成功
						$data['new_img']='public/image/no_img.gif';
					}
					
				}
			}
			
			$data['new_img']=base_url('public/modules/holidays/image/'.$festival_py.'/'.$img);
		}else{
			
		}
		
		return $this->load->view('modules/holidays',$data,TRUE);
	}
	
	public function new_img ($img){
		$this->load->library('image_lib');
		$cacha_file=WWW_PATH.'/image/cache/modules/holidays';//缓存目录
		//给图片添加水印，并生成新的图片，缓存在cache文件夹下
		$config['source_image'] = '/path/to/image/mypic.jpg';
		$config['wm_text'] = 'Copyright 2006 - John Doe';
		$config['wm_type'] = 'text';
		$config['wm_font_path'] = './system/fonts/texb.ttf';
		$config['wm_font_size'] = '16';
		$config['wm_font_color'] = 'ffffff';
		$config['wm_vrt_alignment'] = 'bottom';
		$config['wm_hor_alignment'] = 'center';
		$config['wm_padding'] = '20';

		$this->image_lib->initialize($config);

		$this->image_lib->watermark();
	}
}
