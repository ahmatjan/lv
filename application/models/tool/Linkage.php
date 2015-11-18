<?php
defined('BASEPATH') OR exit('No direct script access allowed');
//图标库
class Linkage extends CI_Model {
	//获取省市县的数据转成json
	public function get_provinces(){
		//查省
		$sql = "SELECT * FROM " . $this->db->dbprefix('linkage_province') . " ORDER BY code ASC"; 
		$query = $this->db->query($sql);
		$row = $query->result_array(); 
		
		return $row;
	}
	
	public function get_city($provincecode){
		//查市
		$sql = "SELECT * FROM " . $this->db->dbprefix('linkage_city') . " WHERE provincecode = ? ORDER BY code ASC"; 
		$query=$this->db->query($sql,array($provincecode));
		$row = $query->result_array();
		return $row;
	}
	
	public function get_area($citycode){
		//查县
		$sql = "SELECT * FROM " . $this->db->dbprefix('linkage_area') . " WHERE citycode = ? ORDER BY code ASC"; 
		$query=$this->db->query($sql,array($citycode));
		$row = $query->result_array();
		
		return $row;
	}
}
