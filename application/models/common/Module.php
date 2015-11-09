<?php
defined('BASEPATH') OR exit('No direct script access allowed');
//布局处理类模型
class Module extends CI_Model {

	public function get_layout_module ($position){
		//调layout_id
		$route_all='%';
		$route_1=$this->uri->segment(1, 'home');
		$route_2=$this->uri->segment(1).'/'.$this->uri->segment(2);
		$route_inclode=$this->uri->segment(1).'/%';
		$sql = "SELECT layout_id FROM " . $this->db->dbprefix('layout') . " WHERE route = ? OR route = ? OR route = ? OR route = ?";
		$query=$this->db->query($sql, array($route_all,$route_1,$route_2,$route_inclode));
		//return $query->result_array();
		$layouts_id=$query->result_array();
		//调layout_id
		//遍历layout_id拼接sql语句
		foreach($layouts_id as $v){
			$layouts[]=' layout_id = '.$v['layout_id'];
		}
		$layouts=implode(' OR ',$layouts);
		
		$sql = "SELECT * FROM " . $this->db->dbprefix('layout_module') . " WHERE position = '" . $position . "' AND " . $layouts . " ORDER BY sort ASC";
		$query=$this->db->query($sql);
		return $query->result_array();
	}
	
	public function get_module ($module_id){
		$sql = "SELECT * FROM " . $this->db->dbprefix('modules') . " WHERE module_id = ? ";
		$query=$this->db->query($sql, array($module_id));
		return $query->row_array();
	}
}