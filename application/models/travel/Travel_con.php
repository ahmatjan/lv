<?php
defined('BASEPATH') OR exit('No direct script access allowed');
//网站抓取的结伴类，这个模型包含了s_spider_travel_info、s_spider_travel_review表
class travel_con extends CI_Model {
	//读取内容
	public function get_travel_content($data){
		$sql = "SELECT * FROM " . $this->db->dbprefix('s_spider_travel_info') . " WHERE spider_id = ?";
		$query=$this->db->query($sql, array($data));
		if ($query->num_rows() > 0)
		{
	        $row = $query->row_array();
	        return $row;
		}
	}
	
	//读取回复
	public function get_reviews($data){
		//$revie_page=$this->input->get('revie_page');
		if($this->input->get('revie_page') !== NULL){
			$revie_page=$this->input->get('revie_page');
		}else{
			$revie_page=1;
		}
		$min_repage=($revie_page-1)*$this->base_setting->get_setting('quantity_view');

		$sql = "SELECT * FROM " . $this->db->dbprefix('s_spider_travel_review') . " WHERE travel_info_id = ? ORDER BY review_id DESC LIMIT ?,".$this->base_setting->get_setting('quantity_view');
		$query=$this->db->query($sql, array($data,$min_repage));
		if ($query->num_rows() > 0)
		{
	        $row['reviews'] = $query->result_array();
		}
		
		//返回查询条数，用于分页
		$this->db->where('travel_info_id', $data);
		$this->db->from($this->db->dbprefix('s_spider_travel_review'));
		$count=$this->db->count_all_results();
		
		$row['count']=$count;
		
		return $row;//返回查询结果
	}
	
	public function get_travel_noid(){
		$sql = "SELECT * FROM " . $this->db->dbprefix('s_spider_travel_info') . " ORDER BY add_date DESC LIMIT 10";
		$query=$this->db->query($sql);
		if ($query->num_rows() > 0)
		{
	        $row = $query->result_array();
	        return $row;
		}
	}
}
