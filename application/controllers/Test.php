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

		/*
		header("Content-Type:text/html;charset=utf-8");
		$this->load->library('lunar');
		//$d=$this->lunar->getLunarYearName('2015');
		//$d=$this->lunar->getYearZodiac('2015');
		//$d=$this->lunar->getJieQi('2015','11','08');
		$d=$this->lunar->getFestival(date('Y-m-d'),TRUE,'1');
		
		echo $d;
		*/

		//echo date('Ymd');
		
		//$this->load->view('test');
		/*
		$page=$this->input->get('');
		
		$this->load->library('pagination');

		$config['full_tag_open'] = '<ul>';
		$config['full_tag_close'] = '</ul>';
		$config['first_link'] = '首页';
		$config['last_link'] = '尾页';
		$config['first_tag_open'] = '<li>';
		$config['next_tag_open'] = '<li>';
		$config['prev_tag_open'] = '<li>';
		$config['last_tag_open'] = '<li>';
		$config['cur_tag_open'] = '<li>';
		$config['num_tag_open'] = '<li>';
		$config['first_tag_close'] = '</li>';
		$config['next_tag_close'] = '</li>';
		$config['last_tag_close'] = '</li>';
		$config['prev_tag_close'] = '</li>';
		$config['cur_tag_close'] = '</li>';
		$config['num_tag_close'] = '</li>';
		$config['next_link'] = '下一页';
		$config['prev_link'] = '上一页';
		$config['base_url'] = site_url('test');
		$config['total_rows'] = 200;
		$config['per_page'] = 40;
		$config['page_query_string']=TRUE;
		$config['query_string_segment'] ='aab';

		$this->pagination->initialize($config);

		echo $this->pagination->create_links();
		
		$config1['full_tag_open'] = '<ul>';
		$config1['full_tag_close'] = '</ul>';
		$config1['first_link'] = '首页';
		$config1['last_link'] = '尾页';
		$config1['first_tag_open'] = '<li>';
		$config1['next_tag_open'] = '<li>';
		$config1['prev_tag_open'] = '<li>';
		$config1['last_tag_open'] = '<li>';
		$config1['cur_tag_open'] = '<li>';
		$config1['num_tag_open'] = '<li>';
		$config1['first_tag_close'] = '</li>';
		$config1['next_tag_close'] = '</li>';
		$config1['last_tag_close'] = '</li>';
		$config1['prev_tag_close'] = '</li>';
		$config1['cur_tag_close'] = '</li>';
		$config1['num_tag_close'] = '</li>';
		$config1['next_link'] = '下一页';
		$config1['prev_link'] = '上一页';
		$config1['base_url'] = site_url('test');
		$config1['total_rows'] = 200;
		$config1['per_page'] = 20;
		$config1['page_query_string']=TRUE;
		$config1['query_string_segment'] ='1aacccccc';

		$this->pagination->initialize($config1);

		echo $this->pagination->create_links();
		
		
		$config2['full_tag_open'] = '<ul>';
		$config2['full_tag_close'] = '</ul>';
		$config2['first_link'] = '首页';
		$config2['last_link'] = '尾页';
		$config2['first_tag_open'] = '<li>';
		$config2['next_tag_open'] = '<li>';
		$config2['prev_tag_open'] = '<li>';
		$config2['last_tag_open'] = '<li>';
		$config2['cur_tag_open'] = '<li>';
		$config2['num_tag_open'] = '<li>';
		$config2['first_tag_close'] = '</li>';
		$config2['next_tag_close'] = '</li>';
		$config2['last_tag_close'] = '</li>';
		$config2['prev_tag_close'] = '</li>';
		$config2['cur_tag_close'] = '</li>';
		$config2['num_tag_close'] = '</li>';
		$config2['next_link'] = '下一页';
		$config2['prev_link'] = '上一页';
		$config2['base_url'] = site_url('test');
		$config2['total_rows'] = 200;
		$config2['per_page'] = 20;
		$config2['page_query_string']=TRUE;
		$config2['query_string_segment'] ='2hhhhaab';

		$this->pagination->initialize($config2);

		echo $this->pagination->create_links();
		
		
		$this->load->model('tool/report');
		$b=$this->report->count_unkow();
		var_dump($b);
		*/
		
		//三级联动
		
		
		//$this->public_section->get_header();
		$file = '123/33.jpg';
		echo pathinfo($file, PATHINFO_EXTENSION);
		
		
		$this->load->view('test');
		
		
		/*
		//文件路径 
		$file_path= WWW_PATH."/public/area.json"; 
		//判断是否有这个文件 
		if(file_exists($file_path)){ 
			if($fp=fopen($file_path,"a+")){ 
			//读取文件 
			$conn=fread($fp,filesize($file_path)); 
			//替换字符串 
			fclose($fp);
			}
		}
		
		$j=json_decode($conn);
		echo $conn;
		*/
		/*
		foreach($j as $d){
			var_dump($d);
		}
		*/
		
		/*

		//$b=rand(0,30);
		$b=08;
		echo $b;
		$b=substr($b,-2);
		if(is_int($b/4)){
			echo $b.'是4的倍数';
		}else{
			echo $b.'不是4的倍数';
		}
*/
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
	
	/**
	<?php if (isset($module_middle)): ?><!--如果不为空-->
<div class="row-fluid">
<div class="span12">
<!--中-->
<?php if (is_array($module_middle)): ?><!--如果是一个数组-->
<?php foreach ($module_middle as $k=>$v): ?><!--遍历-->
<?php if (count($module_middle) == '1'): ?>
	<div class="span12">
<?php elseif (count($module_middle)=='2'): ?>
	<div class="span6">
<?php elseif (count($module_middle)=='3'): ?>
	<div class="span4">
<?php else: ?>
	<!--如果是$k是5的倍数，要把margin-left设为0-->
	<?php if(is_int(substr($k,-2)/4)):?>
	<div class="span3" style="margin-left: 0">
	<?php else:?>
	<div class="span3">
	<?php endif;?>
<?php endif; ?>
<?php echo $module_middle[$k]?><!--输出-->
	</div>
<?php endforeach; ?>
<?php endif; ?>
	</div>
</div>
<?php endif; ?>
	*/

}