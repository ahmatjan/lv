<?php
defined('BASEPATH') OR exit('No direct script access allowed');
//布局总控服务层
class Module_top extends CI_Module {
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
		$layout_module=$this->module->get_position_module($layout['layout_id'],'top');
		
		$modules=array();
		foreach($layout_module as $k=>$v){
			$modules[$k]=$this->module->get_module($v['module_id']);
			$modules[$k]['position_within']=$v['position_within'];
			$modules[$k]['position_outer']=$v['position_outer'];
			$modules[$k]['order']=$v['order'];
			$modules[$k]['is_mobile']=$v['is_mobile'];
		}
		
		$data=array();
		foreach($modules as $module){//遍历module装载成字串返回给控制器
			if($this->agent->is_mobile()){//是移动设备
				if($module['position_within']=='top' && $module['is_mobile']==TRUE){
				$this->load->module($module['code']);
				$data['module_top'][]=$this->$module['code']->index();
			}
			}else{//不是移动设备
				if($module['position_within']=='top'){
				$this->load->module($module['code']);
				$data['module_top'][]=$this->$module['code']->index();
				}
			}
		}

		return $this->load->view('common/module_top',$data,TRUE);
	}
}
