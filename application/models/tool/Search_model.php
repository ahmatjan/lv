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
		
		$select_sql = 'SELECT * FROM '.$this->db->dbprefix('spider_url').' WHERE ';
		$count_sql = 'SELECT COUNT(*) FROM '.$this->db->dbprefix('spider_url').' WHERE ';
		
		if($search['url'] !== 'all'){
			$select_sql .= "url like '%".$search['url']."%' AND ";
			$count_sql .= "url like '%".$search['url']."%' AND ";
		}
		
		$s_sql = '';
		if($search['type'] == 'and'){
			if(isset($search['query'])){
				$s_query = explode(' ',$search['query']);//关键词转成数组
				foreach($s_query as $s_k=>$s_v){
					$s_sql .= "title like '%".$s_query[$s_k]."%' OR ";
				}
				
				$select_sql .= substr($s_sql,0,-3);
				$count_sql .= substr($s_sql,0,-4);
			}
		}else{
			if(isset($search['query'])){
				$s_query = explode(' ',$search['query']);//关键词转成数组
				foreach($s_query as $s_k=>$s_v){
					$s_sql .= "title like '%".$s_query[$s_k]."%' OR ";
					$s_sql .= "content like '%".$s_query[$s_k]."%' OR ";
					$s_sql .= "description like '%".$s_query[$s_k]."%' OR ";
					$s_sql .= "keywords like '%".$s_query[$s_k]."%' OR ";
					$s_sql .= "author like '%".$s_query[$s_k]."%' OR ";
					
				}
				
				$select_sql .= substr($s_sql,0,-3);
				$count_sql .= substr($s_sql,0,-4);
				/*
				$select_sql .= "title like '%".$search['query']."%' OR ";
				$count_sql .= "title like '%".$search['query']."%' OR ";
				
				$select_sql .= "content like '%".$search['query']."%' OR ";
				$count_sql .= "content like '%".$search['query']."%' OR ";
				
				$select_sql .= "description like '%".$search['query']."%' OR ";
				$count_sql .= "description like '%".$search['query']."%' OR ";
				
				$select_sql .= "keywords like '%".$search['query']."%' OR ";
				$count_sql .= "keywords like '%".$search['query']."%' OR ";
				
				$select_sql .= "author like '%".$search['query']."%' ";
				$count_sql .= "author like '%".$search['query']."%' ";
				*/
			}
		}
		$select_sql .= 'LIMIT '.$search['results'].' , '.$search['quantity_view'];
		
		//统计结果
		$query = $this->db->query($count_sql);//结果条数
		//统计记录行
		$row_ = $query->row_array();
		$row['count'] = $row_['COUNT(*)'];
		
		//查记录
		$query = $this->db->query($select_sql);
		$row['content'] = $query->result_array();
		
		return $row;
	}
}
