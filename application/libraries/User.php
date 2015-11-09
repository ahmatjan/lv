<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class User {
	private $user_id;
	private $username;
	private $permission = array();

	public function __construct() {
		$this->CI =& get_instance();//$this->CI调用框架方法
		$this->CI->load->database();//连接数据库
		$this->CI->load->library(array('session','user_agent'));//加载session类、用户代理类（用于获取ip地址）

		if (isset($_SESSION['user_id'])) {//如果user_id在session中
			$user_query = $this->CI->db->query("SELECT * FROM " . $this->CI->db->dbprefix('user_info') . " WHERE user_id = '" . (int)$_SESSION['user_id'] . "' AND status = '1'");

			if ($user_query->num_rows()) {
				$this->user_id = $user_query->row_array()['user_id'];
				$this->username = $user_query->row_array()['user_name'];
				$this->nickname = $user_query->row_array()['nick_name'];
				$this->group_id = $user_query->row_array()['group_id'];
				$this->image = $user_query->row_array()['image'];

				//permission_view查看权限，permission_edit编辑权限
				$user_group_query = $this->CI->db->query("SELECT permission FROM " . $this->CI->db->dbprefix('user_group') . " WHERE group_id = '" . (int)$user_query->row_array()['group_id'] . "'");

				$permissions = unserialize($user_group_query->row_array()['permission']);//权限
				$this->CI->config->load('permission');//加载配置文件
				$ignore = $this->CI->config->item('ignore');
				foreach($ignore as $igno){
					$permissions['access'][]=$igno;
					$permissions['modify'][]=$igno;
				}

				if (is_array($permissions)) {
					foreach ($permissions as $key => $value) {
						$this->permission[$key] = $value;
					}
				}
			} else {
				$this->logout();
			}
		}
	}

	public function logout() {
		unset($_SESSION['user_id']);

		$this->user_id = '';
		$this->username = '';
	}

	public function hasPermission($key, $value) {
		if (isset($this->permission[$key])) {
			return in_array($value, $this->permission[$key]);
		} else {
			return false;
		}
	}

	public function is_Logged() {
		return $this->user_id;
	}

	public function get_userid() {
		return $this->user_id;
	}

	public function get_username() {
		return $this->username;
	}
	
	public function get_nickname() {
		return $this->nickname;
	}

	public function get_groupId() {
		return $this->group_id;
	}
	
	public function get_image() {
		return $this->image;
	}
}