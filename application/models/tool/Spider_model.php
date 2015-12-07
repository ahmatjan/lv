<?php
defined('BASEPATH') OR exit('No direct script access allowed');
//爬虫
class Spider_model extends CI_Model {
	public function __construct() {
		parent::__construct();
		set_time_limit (0);
	}
	/**
	################################@spider_url表########################################
	*/
	//添加访问记录
	public function add_spider_url($data){
		$result=$this->select_byurl($data['url']);
		if($result){//如果记录已经存在
			$this->db->where('url_id', $result['url_id']);
			$res['updata'] = $this->db->update($this->db->dbprefix('spider_url'), $data);
		}else{
			$res['insert'] = $this->db->insert($this->db->dbprefix('spider_url'), $data);
		}
		return $res;
	}
	
	//通过url来查询记录,并返回结果
	public function select_byurl($url=''){
		$sql = "SELECT * FROM " . $this->db->dbprefix('spider_url') . " WHERE url = ?"; 

		$query=$this->db->query($sql, array($url));

		if ($query->num_rows() > 0)
		{
		   $row = $query->row_array();
		}else{
			$row = FALSE;
		}
		return $row;
	}
	
	//清空表
	public function truncate_snap(){
		$result = $this->db->truncate($this->db->dbprefix('spider_snap'));
		return $result;
	}

}
