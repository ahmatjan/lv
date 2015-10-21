<?php
defined('BASEPATH') OR exit('No direct script access allowed');
//图片缓存处理类
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
	
	//添加用户
	public function int_username($data)
	{
	//通过用户名查用户信息

		$this->db->insert('user_info', $data);
		
	}
}
