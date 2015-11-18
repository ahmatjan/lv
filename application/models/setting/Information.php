<?php
defined('BASEPATH') OR exit('No direct script access allowed');
//网站设置类，这个模型包含了
class Information extends CI_Model {
	//添加文章
	public function add_information($data){
		//传入一个待添加的数组
		if(!empty($data['information_id'])){
			//id不为空是更新
			$sql="REPLACE INTO " . $this->db->dbprefix('information') . " VALUES('".(int)$data['information_id']."',".$this->db->escape($data['title']).",".$this->db->escape($data['author']).",".date("Y-m-d H:m:s").",".$this->db->escape($data['class']).",".$this->db->escape($data['information_content']).",".$this->db->escape($data['position']).")";
		}else{
			//id为空是新添加
			$sql="INSERT INTO " . $this->db->dbprefix('information') . " (title, author, addtime, class, content, position) VALUES (".$this->db->escape($data['title']).",".$this->db->escape($data['author']).",'".date("Y-m-d H:m:s")."',".$this->db->escape($data['class']).",".$this->db->escape($data['information_content']).",".$this->db->escape($data['position']).")";
		}
		
		$this->db->query($sql);
	}
	
	//获取所有的文章
	public function select_informationall(){
		$sql = "SELECT * FROM " . $this->db->dbprefix('information') . " ORDER BY information_id ASC"; 

		$query=$this->db->query($sql);

		$row = $query->result_array(); 
		return $row;
	}
	
	//用id查文章信息
	public function select_information_forid($id){
		$sql = "SELECT * FROM " . $this->db->dbprefix('information') . " WHERE information_id = ? "; 

		$query=$this->db->query($sql, array($id));

		if ($query->num_rows() > 0)
		{
		   $row = $query->row_array(); 
			
		}else{
			$row = FALSE;
		}
		return $row;
	}
}