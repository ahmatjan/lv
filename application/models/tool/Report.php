<?php
defined('BASEPATH') OR exit('No direct script access allowed');
//图标库
class Report extends CI_Model {
	/**
	################################@report_access表########################################
	*/
	//添加访问记录
	public function get_istokenbytoken($token){
		$sql = "SELECT report_id FROM " . $this->db->dbprefix('report_access') . " WHERE token = ? "; 
		$query=$this->db->query($sql, array($token));
		$row = $query->result_array();
		if(empty($row)){
			$row=FALSE;
		}else{
			$row=TRUE;
		}
		return $row;
	}
	
	//更新访问报告
	public function updata_tab($data)
	{
		$this->db->where('token', $_SESSION['token']);
		$this->db->update($this->db->dbprefix('report_access') , $data);
	}
	
	//添加
	public function insert_tab(){
		$this->db->insert($this->db->dbprefix('report_access') , $data);
	}
	
	//查用户访问数组report_access表
	public function get_report_accessall($access_start,$access_end)
	{
	//
		$sql = "SELECT * FROM " . $this->db->dbprefix('report_access') . " ORDER BY report_id ASC LIMIT " . $access_start . " , " . $access_end; 

		$query=$this->db->query($sql);

		$row = $query->result_array(); 
		return $row;
	}
	
	//统计report_access表的记录行数
	public function count_report_access(){
		$count=$this->db->count_all('report_access');
		return $count;
	}
	
	//查流量数组report_flow表
	public function get_report_flowall($flow_start,$flow_end)
	{
	//
		$sql = "SELECT * FROM " . $this->db->dbprefix('report_flow') . " ORDER BY flow_id ASC LIMIT " . $flow_start . " , " . $flow_end; 

		$query=$this->db->query($sql);

		$row = $query->result_array(); 
		return $row;

	}
	
	//统计report_flow表的记录行数
	public function count_report_flow(){
		$count=$this->db->count_all('report_flow');
		return $count;
	}
	
	//查流量数组report_robot表
	public function get_report_robotall($robot_start,$robot_end)
	{
	//
		$sql = "SELECT * FROM " . $this->db->dbprefix('report_robot') . " ORDER BY robot_id ASC LIMIT " . (int)$robot_start . " , " . (int)$robot_end; 

		$query=$this->db->query($sql);

		$row = $query->result_array(); 
		return $row;
	}
	
	//统计report_robot表的记录行数
	public function count_report_robot(){
		$count=$this->db->count_all('report_robot');
		return $count;
	}
	
	//未知抓取
	public function unknowspider ($start,$end){
		$sql = "SELECT * FROM " . $this->db->dbprefix('report_flow') . " WHERE browser is null OR platform = 'Unknown Platform' AND robot is null ORDER BY flow_id ASC LIMIT " . (int)$start . " , " . (int)$end; 
		
		$query=$this->db->query($sql);

		$row = $query->result_array(); 
		return $row;
	}
	
	//统计未知抓取的记录行数
	public function count_unkow(){
		$sql="SELECT flow_id FROM " . $this->db->dbprefix('report_flow') . " WHERE browser is null OR platform = 'Unknown Platform' AND robot is null";
		$query=$this->db->query($sql);
		$row=$query->num_rows();
		return $row;
	}
	
	//通过token获取ip值
	public function get_ipaddress($token){
		$sql = "SELECT ip_address FROM " . $this->db->dbprefix('report_access') . " WHERE token = ? "; 

		$query=$this->db->query($sql, array($token));

		if ($query->num_rows() > 0)
		{
		   $row = $query->row_array(); 
			return unserialize($row['ip_address']);
		}
	}
	
	//清空统计表数据，重置表
	public function truncate_($data){
		if(empty($data)){
			//参数为空返回回false
			return FALSE;
		}
		if(!empty($data)){
			//参数不为空，执行清空表
			foreach($data as $d_k=>$d_v){
				if($this->db->truncate($this->db->dbprefix($data[$d_k]))){
					$res['true'][$d_k]=$data[$d_k];
				}else{
					$res['false'][$d_k]=$data[$d_k];
				}
			}
			return $res;
		}
	}
	
	//通过ip、时间来统计访问数量
	public function count_ip($ip){
		$this->db->where('ip',$ip);
		$this->db->where('access_time',date("Y-m-d H:m:s"));
		$this->db->from($this->db->dbprefix('report_flow'));
		return $this->db->count_all_results();
	}
	
	//把超过6的ip加入黑名单
	public function add_blackip($data){
		$result = $this->chack_blackip($data['ip']);
		if($result === FALSE){
			//记录不存在，添加
			$this->db->insert($this->db->dbprefix('blacklist_ip'), $data);
		}else{
			$this->db->where('ip', $data['ip']);
			$this->db->update($this->db->dbprefix('blacklist_ip'), $data);
		}
	}
	
	//检查blackip是否存在
	public function chack_blackip($ip){
		$sql = "SELECT * FROM " . $this->db->dbprefix('blacklist_ip') . " WHERE ip = ?"; 

		$query=$this->db->query($sql, array($ip));

		if ($query->num_rows() > 0)
		{
		   $row = $query->row_array();
		}else{
			$row = FALSE;
		}
		return $row;
	}
	
	//查询ip黑名单
	public function get_ip($ip){
		$sql = "SELECT * FROM " . $this->db->dbprefix('blacklist_ip') . " WHERE ip = ? AND start = 1"; 

		$query=$this->db->query($sql, array($ip));
		if ($query->num_rows() > 0)
		{
		   $row = $query->row_array();
		   return $row;
		}
		return FALSE;
	}
	
	//查spider_site表
	public function get_spider_site($site_start,$site_end)
	{
	//
		$sql = "SELECT * FROM " . $this->db->dbprefix('spider_site') . " ORDER BY site_id ASC LIMIT " . $site_start . " , " . $site_end; 

		$query=$this->db->query($sql);

		$row = $query->result_array(); 
		return $row;

	}
	
	//统计spider_site表的记录行数
	public function count_spider_site(){
		$count=$this->db->count_all('spider_site');
		return $count;
	}
	
	//查spider_url表
	public function get_spider_urls($spider_start,$spider_end)
	{
	//
		$sql = "SELECT * FROM " . $this->db->dbprefix('spider_url') . " ORDER BY url_id ASC LIMIT " . $spider_start . " , " . $spider_end; 

		$query=$this->db->query($sql);

		$row = $query->result_array(); 
		return $row;

	}
	
	//统计spider_url表的记录行数
	public function count_spider_url(){
		$count=$this->db->count_all('spider_url');
		return $count;
	}
	
	//查blacklist_ip表
	public function get_blacklist_ips($black_start,$black_end)
	{
	//
		$sql = "SELECT * FROM " . $this->db->dbprefix('blacklist_ip') . " ORDER BY id ASC LIMIT " . $black_start . " , " . $black_end; 

		$query=$this->db->query($sql);

		$row = $query->result_array(); 
		return $row;

	}
	
	//统计blacklist_ip表的记录行数
	public function count_blacklist_ip(){
		$count=$this->db->count_all('blacklist_ip');
		return $count;
	}
	
	//id查网站
	public function get_site_forid($site_id){
		$sql = "SELECT * FROM " . $this->db->dbprefix('spider_site') . " WHERE site_id = ?"; 

		$query=$this->db->query($sql, array($site_id));

		if ($query->num_rows() > 0)
		{
		   $row = $query->row_array(); 
			return $row;
		}
		
		return FALSE;
	}
	
	//删除spider_site和spider_url表的对应id内容
	public function del_site_url($site_id){
		if($this->db->delete($this->db->dbprefix('spider_site'), array('site_id' => $site_id)) !== FALSE && $this->db->delete($this->db->dbprefix('spider_url'), array('site_id' => $site_id)) !== FALSE ){
			//删除成功返回true
			return TRUE;
		}
	}
}
