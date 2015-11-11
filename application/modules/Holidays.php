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
			$img_path=WWW_PATH.'/image/modules/holidays/'.$festival_py.'/';//原图路径
			$map = directory_map($img_path);
			//从数组中随机取一个图片出来
			$img=array_rand($map);
			$img='/modules/holidays/'.$festival_py.'/'.$map[$img];
			
			$this->load->model('image');
			
			$new_img=$this->image->rezice($img,'1920','700');
			
			$data['new_img']=$new_img;
		}else{
			$data['new_img']='';
		}
		$data['festivals']=$festivals;
		
		return $this->load->view('modules/holidays',$data,TRUE);
	}
}
