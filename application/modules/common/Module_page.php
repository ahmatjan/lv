<?php
defined('BASEPATH') OR exit('No direct script access allowed');
//布局总控服务层
class Module_page extends CI_Module {
	public function index(){
		$this->load->library('user_agent');
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
		$layout_module=$this->module->get_layout_module($layout['layout_id']);
		foreach($layout_module as $k=>$v){
			$modules[$k]=$this->module->get_module($v['module_id']);
			$modules[$k]['position_within']=$v['position_within'];
			$modules[$k]['position_outer']=$v['position_outer'];
			$modules[$k]['order']=$v['order'];
			$modules[$k]['is_mobile']=$v['is_mobile'];
		}
		
		//遍历modules,装载对应的位置去重
		$data=array();
		foreach($modules as $module){
			$layouts[] = $module['position_outer'];
		}
		$layouts=array_unique($layouts);
		//$data['layouts']=array_unique($layouts);
		//$data['modules']=$modules;
		$data=array();
		
		foreach($layouts as $layout){
			if($layout=='top'){
				foreach($modules as $module){
					if($this->agent->is_mobile()){//是移动设备
						if($module['position_outer']=='top' && $module['position_within']=='page' && $module['is_mobile']==TRUE){
						$this->load->module($module['code']);
						$data['top_module'][]=$this->$module['code']->index();
					}
					}else{//不是移动设备
						if($module['position_outer']=='top' && $module['position_within']=='page'){
						$this->load->module($module['code']);
						$data['top_module'][]=$this->$module['code']->index();
						}
					}
				}
			}
			if($layout=='middle'){
				foreach($modules as $module){
					if($this->agent->is_mobile()){//是移动设备
						if($module['position_outer']=='middle' && $module['position_within']=='page' && $module['is_mobile']==TRUE){
							$this->load->module($module['code']);
							$data['middle_module'][]=$this->$module['code']->index();
						}
					}else{
						if($module['position_outer']=='middle' && $module['position_within']=='page'){
							$this->load->module($module['code']);
							$data['middle_module'][]=$this->$module['code']->index();
						}
					}
				}
			}
			if($layout=='bottom'){
				foreach($modules as $module){
					if($this->agent->is_mobile()){//是移动设备
						if($module['position_outer']=='bottom' && $module['position_within']=='page' && $module['is_mobile']==TRUE){
							$this->load->module($module['code']);
							$data['bottom_module'][]=$this->$module['code']->index();
						}
					}else{
						if($module['position_outer']=='bottom' && $module['position_within']=='page'){
							$this->load->module($module['code']);
							$data['bottom_module'][]=$this->$module['code']->index();
						}
					}
				}
			}
		}

		return $this->load->view('common/module_page',$data,TRUE);
	}
}
