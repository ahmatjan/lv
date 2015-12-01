<?php
defined('BASEPATH') OR exit('No direct script access allowed');
//用户信息类model，这个模型包含了user_info表
class user_info extends CI_Model {
	public function get_username_info($data)
	{
	//通过用户名查用户信息
		$sql = "SELECT * FROM " . $this->db->dbprefix('user_info') . " WHERE user_name = ?"; 

		$query=$this->db->query($sql, array($data));

		if ($query->num_rows() > 0)
		{
		   $row = $query->row_array(); 
			return $row;
		}
	}
	
	public function get_userid_info($user_id)
	{
	//通过用户ID查用户信息
		$sql = "SELECT * FROM " . $this->db->dbprefix('user_info') . " WHERE user_id = ?"; 

		$query=$this->db->query($sql, array($user_id));

		if ($query->num_rows() > 0)
		{
		   $row = $query->row_array(); 
			return $row;
		}
	}
	
	public function get_username_id($data)
	{
	//通过用户名查用户id
		$sql = "SELECT user_id FROM " . $this->db->dbprefix('user_info') . " WHERE user_name = ?"; 

		$query=$this->db->query($sql, array($data));

		if ($query->num_rows() > 0)
		{
		   $row = $query->row_array(); 
			return $row['user_id'];
		}
	}
	
	public function get_userid_name($data)
	{
	//通过用户id查用户名
		if(!isset($data)){
			return '';
		}
		if(isset($data)){
			$sql = "SELECT user_name FROM " . $this->db->dbprefix('user_info') . " WHERE user_id = ?"; 

			$query=$this->db->query($sql, array($data));

			if ($query->num_rows() > 0)
			{
			   $row = $query->row_array(); 
				return $row['user_name'];
			}
		}
	}
	
	public function get_useridforuid($uid)
	{
	//通过uid查用户id
		$sql = "SELECT user_id FROM " . $this->db->dbprefix('user_info') . " WHERE uid = ? "; 

		$query=$this->db->query($sql, array($uid));

		$row = $query->row_array();
		if(isset($row['user_id'])){
			return $row['user_id'];
		}else{
			return FALSE;
		}
	}
	
	public function get_useremail_info($data)
	{
	//通过邮箱查用户信息

		$sql = "SELECT * FROM " . $this->db->dbprefix('user_info') . " WHERE email = ?"; 

		$query=$this->db->query($sql, array($data));

		if ($query->num_rows() > 0)
		{
		   $row = $query->row_array(); 
			return $row;
		}
	}
	
	public function get_useremail_id($data)
	{
	//通过邮箱查用户id

		$sql = "SELECT user_id FROM " . $this->db->dbprefix('user_info') . " WHERE email = ?"; 

		$query=$this->db->query($sql, array($data));

		if ($query->num_rows() > 0)
		{
		   $row = $query->row_array(); 
			return $row['user_id'];
		}
	}
	
	//添加用户
	public function int_username($data)
	{
		//
		$this->db->insert( $this->db->dbprefix('user_info') , $data);
	}
	
	//用户id查用记信息
	public function get_userinfobyuser_id($user_id)
	{
		$sql = "SELECT user_name,nick_name,image FROM " . $this->db->dbprefix('user_info') . " WHERE user_id = ?"; 

		$query=$this->db->query($sql, array($user_id));

		if ($query->num_rows() > 0)
		{
		   $row = $query->row_array(); 
			return $row;
		}
	}
	
	//更新用户头像
	public function updata_img ($filename,$user_id){
		$data = array(
	        'image' => $filename,
		);
		$this->db->where('user_id', $user_id);
		$this->db->update( $this->db->dbprefix('user_info') , $data);
	}
	
	//通过用户名查用户头像
	public function get_oldimg ($user_name){
		$sql = "SELECT image FROM " . $this->db->dbprefix('user_info') . " WHERE user_name = ?"; 

		$query=$this->db->query($sql, array($user_name));

		if ($query->num_rows() > 0)
		{
		   $row = $query->row_array(); 
			return $row['image'];
		}
	}
	
	//获取所有用户信息用于用户管理
	//默认获取前20条
	public function get_userall($start=0,$end=20){
		$sql = "SELECT user_id , user_name , mobile , email , wechat , QQ , nick_name , status , group_id FROM " . $this->db->dbprefix('user_info') . " ORDER BY user_id ASC limit ? , ?"; 

		$query=$this->db->query($sql, array($start,$end));

		$row = $query->result_array();
		
		return $row;
	}
	
	//通过用户id查用户组
	public function get_usergroup_forid($data)
	{
	//通过用户id查用户组
		$sql = "SELECT group_id FROM " . $this->db->dbprefix('user_info') . " WHERE user_id = ?"; 

		$query=$this->db->query($sql, array($data));

		if ($query->num_rows() > 0)
		{
		   $row = $query->row_array(); 
			return $row['group_id'];
		}
	}
	
	//把信息写入forgot表
	public function add_forgot($data){
		unset($data['username']);
		$data['status']='1';
		$data['addtime']=date('Y-m-d H:i:s');
		$this->db->insert($this->db->dbprefix('forgot'), $data);
	}
	
	//统计同一个邮箱记录条数
	public function total_forgot($email){
		$this->db->where('email', $email);
		$this->db->from($this->db->dbprefix('forgot'));
		return $this->db->count_all_results();
	}
	//统计用户id记录条数
	public function total_forgot_id($user_id){
		$this->db->where('user_id', $user_id);
		$this->db->from($this->db->dbprefix('forgot'));
		return $this->db->count_all_results();
	}
	
	//通过token来查forgot表信息
	public function user_id_token($token){
		$sql = "SELECT * FROM " . $this->db->dbprefix('forgot') . " WHERE token = ?"; 

		$query=$this->db->query($sql, array($token));

		if ($query->num_rows() > 0)
		{
		   $row = $query->row_array(); 
		}else{
			$row = FALSE;
		}
		return $row;
	}
	
	//修改用户密码user_info表
	public function updata_password($passwd,$user_id){
		$sql="UPDATE ".$this->db->dbprefix('user_info')." set passwd = '".md5($passwd)."' WHERE user_id=".(int)$user_id;
		$query = $this->db->query($sql);
		return $query;
	}
	
	//更新forgot表的状态为不可修改
	public function updata_forgot_status($forgot_id){
		$sql="UPDATE ".$this->db->dbprefix('forgot')." set status = 0  WHERE forgot_id = ".(int)$forgot_id;
		$query = $this->db->query($sql);
		return $query;
	}
	
	
	//通过用户id查用户注册时间
	public function get_useraddtime ($user_id){
		$sql = "SELECT add_date FROM " . $this->db->dbprefix('user_info') . " WHERE user_id = ?"; 

		$query=$this->db->query($sql, array($user_id));

		if ($query->num_rows() > 0)
		{
		   $row = $query->row_array(); 
			return $row['add_date'];
		}
	}
	
	//用户信息修改
	public function updata_userinfo($data){
		$user_info=array(
			'mobile'					=>$data['mobile'],
			'email'						=>$data['email'],
			'wechat'					=>$data['wechat'],
			'QQ'						=>$data['qq'],
			'nick_name'					=>$data['nick_name'],
		);
		if(!empty($data['user_name'])){
			$user_info['user_name'] = $data['user_name'];
		}
		if(!empty($data['user_name']) && $data['user_name'] !== $data['old_user_name']){
			$user_info['username_edit'] = '1';
		}
		//更新user_info表
		$this->db->where('user_id', $this->user->get_userid());
		if($this->db->update('user_info', $user_info) == TRUE){
			return TRUE;
		}else{
			return FALSE;
		}
	}
}
