<?php
defined('BASEPATH') OR exit('No direct script access allowed');
//网站设置类，这个模型包含了base_setting表
class base_setting extends CI_Model {
	//-------------------------------一级导航----------------------------------------------------------
	public function get_setting($key)
	{
	//传入一个设置名称

		$sql = "SELECT * FROM base_setting WHERE setting_key = ? "; 

		$query=$this->db->query($sql, array($key));

		if ($query->num_rows() > 0)
		{
		   $row = $query->row_array(); 
			return $row['value'];
		}
	}

	public function updata_base_setting($data)
	{
		//以传入的数组为条件更新基础设置
		foreach($data as $k=>$v){
			$k=$this->input->utf8($k);
			$v=$this->input->utf8($v);
			
			$sql="UPDATE `base_setting` SET `value`=". $this->db->escape($v) ." WHERE `setting_key`='".$k."'";
			$this->db->query($sql);
		}
	}
}
