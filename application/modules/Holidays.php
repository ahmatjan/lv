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
			$data['festivals']=$festivals;
		}else{
			$data['festivals']='';
		}
		
		return $this->load->view('modules/holidays',$data,TRUE);
	}
}
