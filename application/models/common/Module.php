<?php
defined('BASEPATH') OR exit('No direct script access allowed');
//布局处理类模型
class Module extends CI_Model {
	public function get_layout ($route){
		$sql = "SELECT * FROM layout WHERE route = ? ";
		$query=$this->db->query($sql, array($route));
		//return $query->result_array();
		return $query->row_array();
	}
	
	public function get_layout_module ($layout_id){
		$sql = "SELECT * FROM layout_module WHERE layout_id = ? ";
		$query=$this->db->query($sql, array($layout_id));
		return $query->result_array();
	}
	
	public function get_module ($module_id){
		$sql = "SELECT * FROM modules WHERE module_id = ? ";
		$query=$this->db->query($sql, array($module_id));
		return $query->row_array();
	}
	
	public function get_position_module ($layout_id,$position){
		$sql = "SELECT * FROM layout_module WHERE layout_id = ? AND position_within=?";
		$query=$this->db->query($sql, array($layout_id,$position));
		return $query->result_array();
	}
}