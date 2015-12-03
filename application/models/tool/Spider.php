<?php
defined('BASEPATH') OR exit('No direct script access allowed');
//爬虫
class Spider extends CI_Model {
	public function __construct() {
		parent::__construct();
		set_time_limit (0);
	}
	/**
	################################@表########################################
	*/
	//添加访问记录
	public function add_snapurl($data){
		$this->db->insert_batch($this->db->dbprefix('spider_snap'), $data);
	}
	
	public function select_urlbyid($url_id){
		$sql = "SELECT * FROM " . $this->db->dbprefix('spider_snap') . " WHERE snap_id = ?"; 

		$query=$this->db->query($sql, array($url_id));

		if ($query->num_rows() > 0)
		{
		   $row = $query->row_array()['url'];
		}else{
			$row = FALSE;
		}
		return $row;
	}

}
