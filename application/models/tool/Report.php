<?php
defined('BASEPATH') OR exit('No direct script access allowed');
//图标库
class Report extends CI_Model {
	/**
	################################@report_access表########################################
	*/
	//添加访问记录
	public function get_istokenbytoken($token){
		$sql = "SELECT report_id FROM " . $this->db->dbprefix('report_access') . " WHERE token = ? "; 
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
		$this->db->update($this->db->dbprefix('report_access') , $data);
	}
	
	//添加
	public function insert_tab(){
		$this->db->insert($this->db->dbprefix('report_access') , $data);
	}
	
	//查用户访问数组report_access表
	public function get_report_accessall($access_start,$access_end)
	{
	//
		$sql = "SELECT * FROM " . $this->db->dbprefix('report_access') . " ORDER BY report_id ASC LIMIT " . $access_start . " , " . $access_end; 

		$query=$this->db->query($sql);

		$row = $query->result_array(); 
		return $row;
	}
	
	//统计report_access表的记录行数
	public function count_report_access(){
		$count=$this->db->count_all('report_access');
		return $count;
	}
	
	//查流量数组report_flow表
	public function get_report_flowall($flow_start,$flow_end)
	{
	//
		$sql = "SELECT * FROM " . $this->db->dbprefix('report_flow') . " ORDER BY flow_id ASC LIMIT " . $flow_start . " , " . $flow_end; 

		$query=$this->db->query($sql);

		$row = $query->result_array(); 
		return $row;

	}
	
	//统计report_flow表的记录行数
	public function count_report_flow(){
		$count=$this->db->count_all('report_flow');
		return $count;
	}
	
	//查流量数组report_robot表
	public function get_report_robotall($robot_start,$robot_end)
	{
	//
		$sql = "SELECT * FROM " . $this->db->dbprefix('report_robot') . " ORDER BY robot_id ASC LIMIT " . (int)$robot_start . " , " . (int)$robot_end; 

		$query=$this->db->query($sql);

		$row = $query->result_array(); 
		return $row;
	}
	
	//统计report_robot表的记录行数
	public function count_report_robot(){
		$count=$this->db->count_all('report_robot');
		return $count;
	}
	
	//未知抓取
	public function unknowspider ($start,$end){
		$sql = "SELECT * FROM " . $this->db->dbprefix('report_flow') . " WHERE browser is null OR platform = 'Unknown Platform' AND robot is null ORDER BY flow_id ASC LIMIT " . (int)$start . " , " . (int)$end; 
		
		$query=$this->db->query($sql);

		$row = $query->result_array(); 
		return $row;
	}
	
	//统计未知抓取的记录行数
	public function count_unkow(){
		$sql="SELECT flow_id FROM " . $this->db->dbprefix('report_flow') . " WHERE browser is null OR platform = 'Unknown Platform' AND robot is null";
		$query=$this->db->query($sql);
		$row=$query->num_rows();
		return $row;
	}
	
	//通过token获取ip值
	public function get_ipaddress($token){
		$sql = "SELECT ip_address FROM " . $this->db->dbprefix('report_access') . " WHERE token = ? "; 

		$query=$this->db->query($sql, array($token));

		if ($query->num_rows() > 0)
		{
		   $row = $query->row_array(); 
			return unserialize($row['ip_address']);
		}
	}
	
	//清空统计表数据，重置表
	public function truncate_($data){
		if(empty($data)){
			//参数为空返回回false
			return FALSE;
		}
		if(!empty($data)){
			//参数不为空，执行清空表
			foreach($data as $d_k=>$d_v){
				if($this->db->truncate($this->db->dbprefix($data[$d_k]))){
					$res['true'][$d_k]=$data[$d_k];
				}else{
					$res['false'][$d_k]=$data[$d_k];
				}
			}
			return $res;
		}
	}
}
