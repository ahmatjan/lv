<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
| -------------------------------------------------------------------
| 权限管理
| -------------------------------------------------------------------
| This file contains four arrays of user agent data. It is used by the
| User Agent Class to help identify browser, platform, robot, and
| mobile device data. The array keys are used to identify the device
| and the array values are used to set the actual name of the item.
*/

$config['ignore'] = array(
	'about/helper',
	'article/article_content',
	'article/article_list',
	'article/article_send',
	'travel_info/alce_content',
	'travel_info/alce_list',
	'home',
	'test',
	'travel_info/alice_content',
	'travel_info/alice_list',
	'user/calendar',
	'user/image_manager',
	'user/inbox_inbox',
	'user/login',
	'user/login_lock',
	'user/sns',
	'user/user_center',
	'user/user_inbox',
	'user/user_page',
	'wechat/wechat_index'
);

$config['infomation_position']=array(//面包导航名
	'register_rule'		=>'注册条款',
	'healper'			=>'网站帮助',
	'about_us'			=>'关于我们',
	'common'			=>'常见问题',
	'self'				=>'自助服务',
	'copyright'			=>'版权协议',
	'disclaimer'		=>'免责申明',
	'sponsor'			=>'赞助投资',
	'advertising'		=>'广告服务',
	'opinion'			=>'意见反馈',
	'values'			=>'网站价值观',
	'user_healper'		=>'用户中心帮助',
);

$config['infomation_rules']=array(
	'rule'				=>'规则',
	'helper'			=>'帮助',
	'about'				=>'关于我们'
);