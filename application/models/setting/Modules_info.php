<?php
defined('BASEPATH') OR exit('No direct script access allowed');
//网站设置类，
class modules_info extends CI_Model {
	//-----------------------调全部路由模块参数----------------------------------------------------------
	public function get_module_info()
	{
		$sql = "SELECT * FROM " . $this->db->dbprefix('modules') . " ORDER BY module_id ASC"; 

		$query=$this->db->query($sql);

			$row = $query->result_array(); 
			return $row;
	}
	
	//-----------------------通过id号调路由模块参数-----------------------------------------
	public function get_layout_module_forid($id)
	{
		$sql = "SELECT * FROM " . $this->db->dbprefix('layout_module') . " WHERE layout_module_id = ?"; 

		$query=$this->db->query($sql,array($id));

		if ($query->num_rows() > 0)
		{
			$row = $query->row_array(); 
			return $row;
		}
	}
	
	//-----------------------通过id号模块参数-----------------------------------------
	public function get_module_forid($id)
	{
		$sql = "SELECT * FROM " . $this->db->dbprefix('modules') . " WHERE module_id = ?"; 

		$query=$this->db->query($sql,array($id));

		if ($query->num_rows() > 0)
		{
			$row = $query->row_array(); 
			return $row;
		}
	}
	
	//添加或更新路由布局模块
	public function int_layout_model($data)
	{
		//传入一个待添加的数组
		if(!empty($data['layout_module_id'])){//如果layout_module_id不为空，是更新（修改）
			$sql="REPLACE INTO " . $this->db->dbprefix('layout_module') . " VALUES('".(int)$data['layout_module_id']."',".$this->db->escape($data['layout_module_name']).",".(int)$data['layout_id'].",".(int)$data['module_id'].",".$this->db->escape($data['position_within']).",".$this->db->escape($data['position_outer']).",".(int)$data['order'].",".(int)$data['is_mobile'].")";
		}else{//否则是添加
			$sql="INSERT INTO " . $this->db->dbprefix('layout_module') . " (name, layout_id, module_id, position_within, position_outer, `order`, `is_mobile`) VALUES (".$this->db->escape($data['layout_module_name']).",'".(int)$data['layout_id']."','".(int)$data['module_id']."',".$this->db->escape($data['position_within']).",".$this->db->escape($data['position_outer']).",'".(int)$data['order']."','".(int)$data['is_mobile']."')";
		}
		
		$this->db->query($sql);
	}
	
	//删除
	public function delete($id)
	{
		//传入id参数以删除一级导航，可以是一个数组批量删除，因为它在ci的框架中已经自动判断
		$this->db->delete($this->db->dbprefix('nav_parent') , array('nav_id' => $id));
	}
	
	//安装插件
	public function install_module($data){
		$this->db->insert($this->db->dbprefix('modules') , $data);
	}
	
	//卸载插件
	function uninstall_module($module_id){
		$this->db->delete($this->db->dbprefix('modules') , array('module_id' => $module_id)); 
	}
	
	//通过插件id查询layout_module表，看是否有插件正在被使用，如果正在被使用不能卸载
	function getdateby_moduleid ($module_id){
		$sql = "SELECT 'layout_module_id' FROM " . $this->db->dbprefix('layout_module') . " WHERE module_id = ?"; 

		$query=$this->db->query($sql,array($module_id));

		$row=array();
		if ($query->num_rows() > 0)
		{
			$row = $query->row_array(); 
		}
		return $row;
	}
}