<?php
defined('BASEPATH') OR exit('No direct script access allowed');
//网站设置类，这个模型包含了nav_parent、nav_child表
class nav_setting extends CI_Model {
	//-------------------------------一级导航----------------------------------------------------------
	public function get_parent_nav($nav_class)
	{
	//传入一个导航类型，查找一级导航

		$sql = "SELECT * FROM " . $this->db->dbprefix('nav_parent') . " WHERE nav_class = ? ORDER BY  store ASC"; 

		$query=$this->db->query($sql, array($nav_class));

		$row = $query->result_array(); 
		return $row;
	}
	
	//添加或更新一级目录
	public function int_parent_nav($data)
	{
		//传入一个待添加的数组
		if(!empty($data['nav_id'])){
			$sql="REPLACE INTO " . $this->db->dbprefix('nav_parent') . " VALUES('".(int)$data['nav_id']."',".$this->db->escape($data['navname']).",".$this->db->escape($data['top_navico']).",".$this->db->escape($data['navlocation']).",".$this->db->escape($data['top_navurl']).",".$this->db->escape($data['another_url']).",'".(int)$data['navstore']."','".(int)$data['isedit']."','".(int)$data['isview']."')";
		}else{
			$sql="INSERT INTO " . $this->db->dbprefix('nav_parent') . " (nav_name, nav_ico,nav_class,nav_url,another_url,store,edit_start,view_start) VALUES (".$this->db->escape($data['navname']).",".$this->db->escape($data['top_navico']).",".$this->db->escape($data['navlocation']).",".$this->db->escape($data['top_navurl']).",".$this->db->escape($data['another_url']).",'".(int)$data['navstore']."','".(int)$data['isedit']."','".(int)$data['isview']."')";
		}
		
		$this->db->query($sql);
	}
	
	//删除
	public function delete($id)
	{
		//传入id参数以删除一级导航，可以是一个数组批量删除，因为它在ci的框架中已经自动判断
		$this->db->delete( $this->db->dbprefix('nav_parent') , array('nav_id' => $id));
	}
	
	//通过id查找父目录
	public function get_parent_navforid($parent_id)
	{
	//通过传入id查找
		$sql = "SELECT * FROM " . $this->db->dbprefix('nav_parent') . " WHERE nav_id = ? "; 

		$query=$this->db->query($sql, array($parent_id));

		$row = $query->row_array();
		return $row;
	}
	//--------------------------------二级导航-----------------------------------------------------------
	//通过父id查找子目录
	public function get_child_nav($parent_id)
	{
	//通过传入父id查找
		$sql = "SELECT * FROM " . $this->db->dbprefix('nav_child') . " WHERE parent_id = ? ORDER BY  store ASC"; 

		$query=$this->db->query($sql, array($parent_id));

		$row = $query->result_array(); 
		return $row;
	}
	
	//-----------------------------------------------------------------------------------------------
	//查找所有的父目录
	public function get_navs_prent()
	{
		//查询一级目录
		$sql = "SELECT * FROM " . $this->db->dbprefix('nav_parent') . " ORDER BY  store ASC"; 

		$query=$this->db->query($sql);

		$row = $query->result_array(); 
		return $row;
		
	}
	
	//-----------------------------------------------------------------------------------------------
	//通过传子目录id查找子目录
	public function get_navschildforid($nav_child_id)
	{
		//通过传入id查询子级目录
		$sql = "SELECT * FROM " . $this->db->dbprefix('nav_child') . " WHERE nav_child_id = ?"; 

		$query=$this->db->query($sql, array($nav_child_id));

		$row = $query->row_array(); 
			return $row;
	}
	
	//添加或更新子级目录
	public function int_child_nav($data)
	{
		//传入一个待添加的数组
		if(!empty($data['nav_id'])){
			$sql="REPLACE INTO " . $this->db->dbprefix('nav_child') . " VALUES('".(int)$data['nav_id']."','".(int)$data['top_navid']."',".$this->db->escape($data['navname']).",".$this->db->escape($data['top_navurl']).",".$this->db->escape($data['another_url']).",'".(int)$data['navstore']."','".(int)$data['isedit']."','".(int)$data['isview']."')";
		}else{
			$sql="INSERT INTO " . $this->db->dbprefix('nav_child') . " (parent_id,nav_child_name,nav_child_url,another_child_url,store,edit_start,view_start) VALUES ('".(int)$data['top_navid']."',".$this->db->escape($data['navname']).",".$this->db->escape($data['top_navurl']).",".$this->db->escape($data['another_url']).",'".(int)$data['navstore']."','".(int)$data['isedit']."','".(int)$data['isview']."')";
		}
		
		$this->db->query($sql);
	}
}
