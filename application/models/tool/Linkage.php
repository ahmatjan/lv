<?php
defined('BASEPATH') OR exit('No direct script access allowed');
//图标库
class Linkage extends CI_Model {
	//获取省的数据
	public function get_provinces(){
		$sql = "SELECT * FROM " . $this->db->dbprefix('linkage_province') . " ORDER BY code ASC"; 
		$query=$this->db->query($sql);
		$row = $query->result_array(); 
		return $row;
	}
	
	//获取区市
	public function get_city($p_code){
		$sql = "SELECT * FROM " . $this->db->dbprefix('linkage_city') . " WHERE provincecode = ? ORDER BY code ASC"; 
		$query=$this->db->query($sql,array($p_code));
		$row = $query->result_array(); 
		return $row;
	}
}
