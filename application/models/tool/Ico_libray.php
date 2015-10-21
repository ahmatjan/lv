<?php
defined('BASEPATH') OR exit('No direct script access allowed');
//图标库
class ico_libray extends CI_Model {
	//-----------------------------------添加图标----------------------------------------------------------------
	public function addico($data){
		$sql="INSERT INTO `ico_libray`(`ico_name`, `ico_class`) VALUES ('".$data."','icon')";
		$query=$this->db->query($sql);

	}
	
	public function select_icon(){
		$sql = "SELECT * FROM ico_libray WHERE ico_class = ? ORDER BY ico_name ASC"; 

		$query=$this->db->query($sql, array('icon'));

		$row = $query->result_array(); 
		return $row;
		
	}
}
