<?php
defined('BASEPATH') OR exit('No direct script access allowed');
//用户信息类model，这个模型包含了user_info表
class user_info extends CI_Model {
	public function get_username_info($data)
	{
	//通过用户名查用户信息
		$sql = "SELECT * FROM user_info WHERE user_name = ?"; 

		$query=$this->db->query($sql, array($data));

		if ($query->num_rows() > 0)
		{
		   $row = $query->row_array(); 
			return $row;
		}
	}
	
	public function get_username_id($data)
	{
	//通过用户名查用户id
		$sql = "SELECT user_id FROM user_info WHERE user_name = ?"; 

		$query=$this->db->query($sql, array($data));

		if ($query->num_rows() > 0)
		{
		   $row = $query->row_array(); 
			return $row['user_id'];
		}
	}
	
	public function get_useremail_info($data)
	{
	//通过邮箱查用户信息

		$sql = "SELECT * FROM user_info WHERE email = ?"; 

		$query=$this->db->query($sql, array($data));

		if ($query->num_rows() > 0)
		{
		   $row = $query->row_array(); 
			return $row;
		}
	}
	
	public function get_useremail_id($data)
	{
	//通过邮箱查用户id

		$sql = "SELECT user_id FROM user_info WHERE email = ?"; 

		$query=$this->db->query($sql, array($data));

		if ($query->num_rows() > 0)
		{
		   $row = $query->row_array(); 
			return $row['user_id'];
		}
	}
	
	//添加用户
	public function int_username($data)
	{
		//
		$this->db->insert('user_info', $data);
	}
	
	//用户id查用记信息
	public function get_userinfobyuser_id($user_id)
	{
		$sql = "SELECT user_name,nick_name,image FROM user_info WHERE user_id = ?"; 

		$query=$this->db->query($sql, array($user_id));

		if ($query->num_rows() > 0)
		{
		   $row = $query->row_array(); 
			return $row;
		}
	}
	
	//更新用户头像
	public function updata_img ($filename,$user_name){
		$data = array(
	        'image' => $filename,
		);
		$this->db->where('user_name', $user_name);
		$this->db->update('user_info', $data);
	}
	
	//通过用户名查用户头像
	public function get_oldimg ($user_name){
		$sql = "SELECT image FROM user_info WHERE user_name = ?"; 

		$query=$this->db->query($sql, array($user_name));

		if ($query->num_rows() > 0)
		{
		   $row = $query->row_array(); 
			return $row['image'];
		}
	}
	
	//获取所有用户信息用于用户管理
	//默认获取前20条
	public function get_userall($start=0,$end=20){
		$sql = "SELECT user_id , user_name , mobile , email , wechat , QQ , nick_name , status , group_id FROM user_info ORDER BY user_id ASC limit ? , ?"; 

		$query=$this->db->query($sql, array($start,$end));

		$row = $query->result_array();
		
		return $row;
	}
	
	//通过用户id查用户组
	public function get_usergroup_forid($data)
	{
	//通过用户id查用户组
		$sql = "SELECT group_id FROM user_info WHERE user_id = ?"; 

		$query=$this->db->query($sql, array($data));

		if ($query->num_rows() > 0)
		{
		   $row = $query->row_array(); 
			return $row['group_id'];
		}
	}
}
