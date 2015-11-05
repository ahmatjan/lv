<?php
defined('BASEPATH') OR exit('No direct script access allowed');
//网站设置类，
class layout_info extends CI_Model {
	//-------------------------------调全部的路由参数----------------------------------------------------------
	public function get_layout_info()
	{
		$sql = "SELECT * FROM " . $this->db->dbprefix('layout') . " ORDER BY layout_id ASC"; 

		$query=$this->db->query($sql);

			$row = $query->result_array(); 
			return $row;
	}
	
	//-------------------------------通过id号调路由参数----------------------------------------------------------
	public function get_layout_forid($id)
	{
		$sql = "SELECT * FROM " . $this->db->dbprefix('layout') . " WHERE layout_id = ?"; 

		$query=$this->db->query($sql,array($id));

		if ($query->num_rows() > 0)
		{
			$row = $query->row_array(); 
			return $row;
		}
	}
	
	//-------------------------------调路由模块参数----------------------------------------------------------
	public function get_layout_module()
	{
		$sql = "SELECT * FROM " . $this->db->dbprefix('layout_module') . " ORDER BY layout_id ASC";
	
		$query=$this->db->query($sql);
	
		$row = $query->result_array();
		return $row;
	}
	
	//添加或更新路由
	public function int_layout_route($data)
	{
		//传入一个待添加的数组
		if(!empty($data['layout_id'])){
			//id不为空是更新
			$sql="REPLACE INTO " . $this->db->dbprefix('layout') . " VALUES('".(int)$data['layout_id']."',".$this->db->escape($data['layout_name']).",".$this->db->escape($data['layout_route']).")";
		}else{
			//id为空是新添加
			$sql="INSERT INTO " . $this->db->dbprefix('layout') . " (layout_name, route) VALUES (".$this->db->escape($data['layout_name']).",".$this->db->escape($data['layout_route']).")";
		}
		
		$this->db->query($sql);
	}
	
	//删除
	public function delete($id)
	{
		//传入id参数以删除一级导航，可以是一个数组批量删除，因为它在ci的框架中已经自动判断
		$this->db->delete($this->db->dbprefix('layout') , array('nav_id' => $id));
	}
	
}