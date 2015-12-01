<?php
defined('BASEPATH') OR exit('No direct script access allowed');
//用户信息类model，这个模型包含了user_description表
class user_description extends CI_Model {
	public function get_userdescriptionforid($user_id)
	{
		//通过用户ID查用户信息
		$sql = "SELECT * FROM " . $this->db->dbprefix('user_description') . " WHERE user_id = ?"; 

		$query=$this->db->query($sql, array($user_id));

		if ($query->num_rows() > 0)
		{
		   $row = $query->row_array(); 
		}else{
			$row = array();
		}
		return $row;
	}
	
	//更新用户描述表
	public function updata_user_description($data){
		$user_info=array(
			'signature'=>$data['signature'],
			'location'=>$data['location'],
			'hobby'=>$data['hobby'],
			'job'=>$data['job'],
			'blog'=>$data['blog'],
			'birthday'=>$data['birthday'],
		);
		
		$user_infos=$this->get_userdescriptionforid($this->user->get_userid());
		if(!empty($user_infos)){//已经存在，更新
			$this->db->where('user_id', $this->user->get_userid());
			if($this->db->update('user_description', $user_info) == TRUE){
				return TRUE;
			}else{
				return FALSE;
			}
		}else{
			$user_info['user_id']=$this->user->get_userid();
			if($this->db->insert('user_description', $data) == TRUE){
				return TRUE;
			}else{
				return FALSE;
			}
		}
	}
}
