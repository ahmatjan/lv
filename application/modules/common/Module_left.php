<?php
defined('BASEPATH') OR exit('No direct script access allowed');
//布局总控服务层
class Module_left extends CI_Module {
	public function index (){
		//路由
		$layout_route = uri_string();
		if($layout_route == NULL){
			$layout_route='home';
		}
		//装载模型
		$this->load->model('common/module');
		
		//调路由下的模块
		$layout=$this->module->get_layout($layout_route);
		
		//遍历路由下的模块，调相应的module，这里有相应module的参数设置
		$modules=array();
		$layout_module=$this->module->get_position_module($layout['layout_id'],'left');
		foreach($layout_module as $k=>$v){
			$modules[$k]=$this->Module->get_module($v['module_id']);
			$modules[$k]['position']=$v['position'];
			$modules[$k]['sort']=$v['sort'];
			$modules[$k]['is_mobile']=$v['is_mobile'];
		}
		
		$data=array();
		foreach($modules as $module){//遍历module装载成字串返回给控制器
			if($this->agent->is_mobile()){//是移动设备
				if($module['position']=='left' && $module['is_mobile']==TRUE){
				$this->load->module($module['code']);
				$data['module_left'][]=$this->$module['code']->index();
			}
			}else{//不是移动设备
				if($module['position']=='left'){
				$this->load->module($module['code']);
				$data['module_left'][]=$this->$module['code']->index();
				}
			}
		}

		return $this->load->view('common/module_left',$data,TRUE);
	}
}
