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
	'about/about_us',
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