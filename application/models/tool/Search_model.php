<?php
defined('BASEPATH') OR exit('No direct script access allowed');
//搜索
class Search_model extends CI_Model {
	public function __construct() {
		parent::__construct();
		set_time_limit (0);
	}
	/**
	################################@spider_url表########################################
	*/
	//查找所有的内容、、暂时测试
	//清空表
	public function get_spider_like($search){
		if($search['type'] == 'and'){
			if($search['url'] != 'all' || !empty($search['url'])){
				$this->db->like('url', $search['url']);
			}
			if(!empty($search['query'])){
				$this->db->like('title', $search['query']);
				$this->db->like('content', $search['query']);
			}
		}else{
			if(!empty($search['query'])){
				$this->db->like('title', $search['query']);
				$this->db->or_like('content', $search['query']);
			}
			if($search['url'] != 'all' || !empty($search['url'])){
				$this->db->or_like('url', $search['url']);
			}
		}
		
		$query = $this->db->get('spider_url', 10, 20);
		
		$sql = "SELECT * FROM " . $this->db->dbprefix('spider_url'); 

		$query=$this->db->query($sql);

		$row = $query->result_array(); 
		return $row;
	}
}
