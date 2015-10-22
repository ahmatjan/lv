<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Wechat_index extends CI_Controller{

   public function __construct() {
		parent::__construct();
			$params = array(
				'token'=>'ww12563322255aa', //填写你设定的key
				'encodingaeskey'=>'JCnXmf2U3udfpNCXTgLg1kTCifqyLbxNlkCYZUg7bJD', //填写加密用的EncodingAESKey
				'appid'=>'wx31c223fba4c4e84e', //填写高级调用功能的app id
		 		'appsecret'=>'3b4d5fe17d96cd47546ba3fd3c194a8f' //填写高级调用功能的密钥
	 		);
	        $this->load->library('wechat_api/wechat',$params);
	        $this->wechat->valid();
	    }
	    
	public function index (){
		$type=$this->wechat->getRev()->getRevType();
		switch($type) {
			case Wechat::MSGTYPE_TEXT:
				$this->wechat->text("你发过来的是一个文本，不妨来我们的网站试试！www.lvxingto.com")->reply();
				exit;
				break;
			case Wechat::MSGTYPE_EVENT:
				$this->wechat->text("hello, 我是事件")->reply();
				exit;
				break;
			case Wechat::EVENT_SUBSCRIBE:
				$this->wechat->text("hello, 关注")->reply();
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
	}
}