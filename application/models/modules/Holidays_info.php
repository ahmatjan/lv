<?php
defined('BASEPATH') OR exit('No direct script access allowed');
//图标库
class Holidays_info extends CI_Model {
	
	//从holidays表中取相关节日、节气数据
	public function get_holiday ($data){
		$sql = "SELECT * FROM " . $this->db->dbprefix('holidays') . " WHERE name = ?"; 

		$query=$this->db->query($sql, array($data));

		if ($query->num_rows() > 0)
		{
			$row = $query->row_array(); 
			return $row;
		}
	}
}
