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
		/*
		$newmenu =  array(
    		"button"=>
    			array(
    				array('type'=>'click','name'=>'最新消息','key'=>'MENU_KEY_NEWS'),
    				array('type'=>'view','name'=>'我要搜索','url'=>'http://www.baidu.com'),
    				)
   		);
    $result = $this->wechat->createMenu($newmenu);
	*/
	$c=$this->wechat->getServerIp();
	var_dump($c);
	}
}