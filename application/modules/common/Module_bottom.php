<?php
defined('BASEPATH') OR exit('No direct script access allowed');
//布局总控服务层
class Module_bottom extends CI_Module {
	public function index (){
		
		//装载模型
		$this->load->model('common/module');
		
		$modules=array();
		//遍历路由下的模块，调相应的module，这里有相应module的参数设置
		$layout_module=$this->module->get_layout_module('bottom');
		foreach($layout_module as $k=>$v){
			$modules[$k]=$this->module->get_module($v['module_id']);
			$modules[$k]['position']=$v['position'];
			$modules[$k]['is_mobile']=$v['is_mobile'];
		}
		
		$data=array();
		foreach($modules as $module){//遍历module装载成字串返回给控制器
			if($this->agent->is_mobile()){//是移动设备
				if($module['is_mobile']==TRUE && $module['position'] == 'bottom'){
				$this->load->module($module['code']);
				$data['module_bottom'][]=$this->$module['code']->index();
			}
			}else{//不是移动设备
				if($module['position'] == 'bottom'){
					$this->load->module($module['code']);
					$data['module_bottom'][]=$this->$module['code']->index();
				}
			}
		}

		return $this->load->view('common/module_bottom',$data,TRUE);
	}
}
