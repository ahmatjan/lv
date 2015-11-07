<?php
defined('BASEPATH') OR exit('No direct script access allowed');
//include("../wechat.class.php");
class Test extends CI_Controller {

	/*
	 *发邮件例子 
	 * */
	  
	 /*
    public function sendMail() {
    	$config['protocol'] = 'smtp';//采用smtp方式
    	$config['smtp_port'] = 25;//端口
    	$config['smtp_host'] = 'smtp.qq.com';//简便起见，只支持163邮箱
    	//$config['smtp_user'] = 'xcalder@foxmail.com';//你的邮箱帐号
    	$config['smtp_user'] = 'sender@lvxingto.com';//你的邮箱帐号
    	$config['smtp_pass'] = 'dylfj22649978';//你的邮箱密码
    	$config['charset'] = 'utf-8';
    	$config['smtp_timeout'] = 30;
    	$config['newline'] = "\r\n";
		$config['crlf'] = "\r\n";
    	$config['wordwrap'] = TRUE;
    	$config['mailtype'] = "html";
    	$this->load->library('email');//加载email类
    	$this->email->initialize($config);//参数配置 
    	$this->email->from('sender@lvxingto.com', '我是发件人');
    	$this->email->to('576228830@qq.com');
    	$this->email->subject('一个测试');
    	$this->email->message('我要给你发送一个测试邮件，你觉得呢？');    //显示发送邮件的结果，加载到res_view.php视图文件中
    	if(!$this->email->send()){
    		echo $this->email->print_debugger(array());
    		
    		//echo "<font color='red' size='10px'>邮件发送失败，可能是由您的发件人或者密码填写不匹配造成</font>";
    	}else{
    		echo "<font color='red' size='10px'>邮件发送成功</font>"; 
    		}
    	}
}
*/
	
/*
 * 微信公共接口测试
 * 
 */
/*
	public function __construct() {
		parent::__construct();
			$params = array(
				'token'=>'weixin', //填写你设定的key
				'encodingaeskey'=>'encodingaeskey', //填写加密用的EncodingAESKey
				'appid'=>'wxfc790e2eb9601add', //填写高级调用功能的app id
		 		'appsecret'=>'39ea2b90c55ec14462b1967909316895' //填写高级调用功能的密钥
	 		);
	        $this->load->library('wechat_api/wechat',$params);
	        $this->wechat->valid();
	    }
	    
	public function index (){
		$type=$this->wechat->getRev()->getRevType();
		switch($type) {
			case Wechat::MSGTYPE_TEXT:
				$this->wechat->text("hello, I'm 文本")->reply();
				exit;
				break;
			case Wechat::MSGTYPE_EVENT:
				$this->wechat->text("hello, 我是事件")->reply();
				exit;
				break;
			case Wechat::MSGTYPE_IMAGE:
				$this->wechat->text("hello, I'm 图片")->reply();
				exit;
				break;
			default:
				$this->wechat->text("我是未知")->reply();
		}
	}
	
	public function seeting_menu (){
		
		$newmenu =  array(
    		"button"=>
    			array(
    				array('type'=>'click','name'=>'最新消息','key'=>'MENU_KEY_NEWS'),
    				array('type'=>'view','name'=>'我要搜索','url'=>'http://www.baidu.com'),
    				)
   		);
    $result = $this->wechat->createMenu($newmenu);
	
	$c=$this->wechat->getServerIp();
	var_dump($c);
	}
	/*
	public function index (){
		$this->output->https_jump();
		echo $_SERVER["SERVER_NAME"];	
	}
	*/
	
	/*
	public function index ()
	{
		//加载目录辅助函数
		$this->load->helper('directory');
		$portraits=directory_map('public/image/portrait/');
		$portrait=array_rand($portraits, 1);
		var_dump($portraits[$portrait]);
	}
	*/
	
	public function index()
	{
		/*
		$this->load->library('pagination');

		$config['base_url'] = 'http://example.com/index.php/test/page/';
		$config['total_rows'] = 200;
		$config['per_page'] = 20;

		$this->pagination->initialize($config);

		echo $this->pagination->create_links();
		*/

		/*
		$this->load->helper(array('array','string'));
		$permission_views=arrayToString($permission_views);
		
		//获取当前链接
		$url=strtolower(uri_string());
		if(empty($url)){
			$url='home';
		}

		$numb_url=str_toal($url,'/');
		if($numb_url>2){
			$url=substr($url,0,strrpos($url,'/'));
		}
		*/
		/*
		//调用淘宝ip库获取ip地址
		$session_ipcity = $this->session->userdata('country');
		
		if(!isset($session_ipcity)){
			//ip地址不存在
			//$this->load->library('user_agent');
			//$ip=$this->agent->get_ip();
			$ip='222.219.137.84';
			$url="http://ip.taobao.com/service/getIpInfo.php?ip=".$ip;
			@$ip=json_decode(file_get_contents($url)); 

			if((string)@$ip->code=='1'){

				return false;

			}
			if((string)@$ip->code=='0'){
				$data = (array)$ip->data;

				$this->session->set_userdata($data);
			}

		}
		*/
		/*
		//获取当前页链接
		$active=uri_string();
		$active=strtolower($active);
		
		$this->load->model('setting/nav_setting');
		$nav_parents=$this->nav_setting->get_parent_nav('admin');

		foreach($nav_parents as $v){
			//$nav_childs=$this->nav_setting->get_child_nav($v['nav_id']);
			$nav_childs[]=$this->nav_setting->get_child_nav($v['nav_id']);
		}
		
		foreach($nav_parents as $k=>$v){
			$nav_parents[$k]['childs']=&$nav_childs[$k];
			if($nav_parents[$k]['nav_url'] == $active){
				$nav_parents[$k]['active']='active';
			}
			
			//判断权限，如果没有查看权限不显示
			if(!empty($nav_parents[$k]['nav_url'])){
				if($this->user->hasPermission('access',$nav_parents[$k]['nav_url'])===false){
					unset($nav_parents[$k]);
				}
			}
			
			if(!empty($nav_childs[$k])){
				foreach($nav_childs[$k] as $b=>$c){
					if($nav_childs[$k][$b]['nav_child_url'] == $active){
						$nav_parents[$k]['active']='active';
					}
					
					//判断权限，如果没有查看权限不显示
					if(!empty($nav_childs[$k][$b]['nav_child_url'])){
						if($this->user->hasPermission('access',$nav_childs[$k][$b]['nav_child_url'])===false){
							unset($nav_childs[$k][$b]);
						}
					}
					
				}
			}
			
		}
var_dump($nav_parents);

		*/
		
		
		/*
		$select_end=$this->input->get('end');
		if(!isset($select_end)){
			$select_end=0;
		}else{
			$select_end=$this->input->get('end');
		}
		$start=$select_end*100;
		$end=($select_end+1)*100;
		
		$sql = "SELECT * FROM " . $this->db->dbprefix('report_access') . " ORDER BY  report_id ASC LIMIT $start,$end"; 

		$query=$this->db->query($sql);

		$row = $query->result_array(); 
		
		foreach($row as $k=>$v){
			echo '<span style="color:red">ID=></span>'.$row[$k]['report_id'].'&nbsp;<span style="color:red">IP</span>=>'.$row[$k]['ip'].'<span style="color:red">访问时间=></span>'.$row[$k]['access_time'].'<span style="color:red">系统类型=></span>'.$row[$k]['platform'].'<span style="color:red">浏览器=></span>'.$row[$k]['browser'].'<br/><br/>';
		}
*/


echo $this->agent->referrer() ? $this->agent->referrer() : 'home';

		/*
		if(!strpos($permission_views,$url) !== false){
			if($_SERVER['HTTP_REFERER']!==NULL){
				$this->session->set_flashdata('setting_false', '你没有权限查看！');
				redirect($_SERVER['HTTP_REFERER']);
			}else{
				redirect('home');
			}
		}
		*/
	}
}