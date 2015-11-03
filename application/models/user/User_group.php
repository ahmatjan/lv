<?php
defined('BASEPATH') OR exit('No direct script access allowed');
//用户信息类model，这个模型包含了user_group表
class user_group extends CI_Model {
	public function get_namebygroup_id($group_id='')
	{
	//通过给定用户组id查名字
		$sql = "SELECT name FROM user_group WHERE group_id=?"; 

		$query=$this->db->query($sql,array($group_id));
		
		if ($query->num_rows() > 0)
		{
		   $row = $query->row_array(); 
			return $row['name'];
		}
	}
	
	public function get_infobygroup_id($group_id='')
	{
	//通过id号查用户组所有信息
		$sql = "SELECT * FROM user_group WHERE group_id=?"; 

		$query=$this->db->query($sql,array($group_id));
		
		if ($query->num_rows() > 0)
		{
		   $row = $query->row_array(); 
			return $row;
		}
	}
	//通过group_id查查看权限
	public function get_prebygroup_id($group_id='')
	{
		$sql = "SELECT permission_view FROM user_group WHERE group_id=?"; 

		$query=$this->db->query($sql,array($group_id));
		
		if ($query->num_rows() > 0)
		{
		   $row = $query->row_array(); 
			return $row['permission_view'];
		}
	}
	
	public function get_groupall()
	{
	//获取所有用户组
		$sql = "SELECT * FROM user_group ORDER BY group_id ASC"; 

		$query=$this->db->query($sql);

		$row = $query->result_array(); 
		return $row;
	}
	
	//添加或更新用户组信息
	public function int_group($data){
		//传入一个待添加的数组
		if(!empty($data['group_id'])){
			$sql="REPLACE INTO user_group VALUES('".(int)$data['group_id']."',".$this->db->escape($data['name']).",".$this->db->escape($data['description']).",".$this->db->escape($data['permission_view']).",".$this->db->escape($data['permission_edit']).")";
		}else{
			$sql="INSERT INTO user_group (name,description,permission_view,permission_edit) VALUES (".$this->db->escape($data['name']).",".$this->db->escape($data['description']).",".$this->db->escape($data['permission_view']).",".$this->db->escape($data['permission_edit']).")";
		}
		
		$this->db->query($sql);
	}
	
}
