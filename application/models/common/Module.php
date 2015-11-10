<?php
defined('BASEPATH') OR exit('No direct script access allowed');
//布局处理类模型
class Module extends CI_Model {

	public function get_layout_module ($position){
		//调layout_id
		$route[] = '%';//搜全部
		//$route[] = $this->uri->segment(1, 'home');//如果第一段不存在，返回home
		$route[] = uri_string();//完整url段
		$route[] = $this->uri->segment(1) == NULL ? 'home' : $this->uri->segment(1).'/%';//如果第一段不为空，搜第一段之后的%
		$route=array_unique($route);
		if(!empty($route)){
			$route = "route = '" . implode("' OR route = '",$route);
			$route_end="'";
		}else{
			$route='';
			$route_end='';
		}
		
		$sql = "SELECT layout_id FROM " . $this->db->dbprefix('layout') . " WHERE ".$route.$route_end;
		$query=$this->db->query($sql);
		//return $query->result_array();
		$layouts_id=$query->result_array();
		if(empty($layouts_id)){
			//如果查出来的layout_id为空，结束本次查询，
			return array();
			exit();
		}
		//调layout_id
		//遍历layout_id拼接sql语句
		//判断layout_id不为空
		
		foreach($layouts_id as $v){
			$layouts[]=' layout_id = '.$v['layout_id'];
		}
		if(!empty($layouts)){
			$layouts='AND'.implode(' OR ',$layouts);
		}else{
			$layouts='';
		}
		
		$sql = "SELECT * FROM " . $this->db->dbprefix('layout_module') . " WHERE position = '" . $position . "' " . $layouts . " ORDER BY sort ASC";
		$query=$this->db->query($sql);
		return $query->result_array();
		
	}
	
	public function get_module ($module_id){
		$sql = "SELECT * FROM " . $this->db->dbprefix('modules') . " WHERE module_id = ? ";
		$query=$this->db->query($sql, array($module_id));
		return $query->row_array();
	}
}