<?php
defined('BASEPATH') OR exit('No direct script access allowed');
//图标库
class Report extends CI_Model {
	/**
	################################@access_report表########################################
	*/
	//添加访问记录
	public function get_istokenbytoken($token){
		$sql = "SELECT report_id FROM access_report WHERE token = ? "; 
		$query=$this->db->query($sql, array($token));
		$row = $query->result_array();
		if(empty($row)){
			$row=FALSE;
		}else{
			$row=TRUE;
		}
		return $row;
	}
	
	//更新访问报告
	public function updata_tab($data)
	{
		$this->db->where('token', $_SESSION['token']);
		$this->db->update('access_report', $data);
	}
	
	//添加
	public function insert_tab(){
		$this->db->insert('access_report', $data);
	}
}
