/*
MySQL Backup
Source Server Version: 5.5.40
Source Database: lv
Date: 2015/11/7 18:04:02
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
--  Table structure for `base_setting`
-- ----------------------------
DROP TABLE IF EXISTS `base_setting`;
CREATE TABLE `base_setting` (
  `setting_id` int(10) NOT NULL AUTO_INCREMENT,
  `code` varchar(25) NOT NULL,
  `setting_key` varchar(64) NOT NULL,
  `value` text NOT NULL,
  PRIMARY KEY (`setting_id`),
  KEY `key` (`setting_key`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8;

-- ----------------------------
--  Table structure for `friend_group`
-- ----------------------------
DROP TABLE IF EXISTS `friend_group`;
CREATE TABLE `friend_group` (
  `friend_group_id` int(11) NOT NULL AUTO_INCREMENT,
  `fried_group_name` varchar(35) NOT NULL,
  `description` varchar(128) DEFAULT NULL,
  `own_user_id` int(11) NOT NULL,
  PRIMARY KEY (`friend_group_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
--  Table structure for `friend_list`
-- ----------------------------
DROP TABLE IF EXISTS `friend_list`;
CREATE TABLE `friend_list` (
  `friend_list_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `friend_id` int(11) NOT NULL,
  `remark` varchar(35) DEFAULT NULL COMMENT '备注',
  PRIMARY KEY (`friend_list_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
--  Table structure for `ico_libray`
-- ----------------------------
DROP TABLE IF EXISTS `ico_libray`;
CREATE TABLE `ico_libray` (
  `ico_id` int(3) NOT NULL AUTO_INCREMENT,
  `ico_name` varchar(45) NOT NULL,
  `ico_class` varchar(8) NOT NULL,
  PRIMARY KEY (`ico_id`)
) ENGINE=InnoDB AUTO_INCREMENT=280 DEFAULT CHARSET=utf8;

-- ----------------------------
--  Table structure for `layout`
-- ----------------------------
DROP TABLE IF EXISTS `layout`;
CREATE TABLE `layout` (
  `layout_id` int(11) NOT NULL AUTO_INCREMENT,
  `layout_name` varchar(128) NOT NULL,
  `route` varchar(128) NOT NULL,
  PRIMARY KEY (`layout_id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

-- ----------------------------
--  Table structure for `layout_module`
-- ----------------------------
DROP TABLE IF EXISTS `layout_module`;
CREATE TABLE `layout_module` (
  `layout_module_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(128) NOT NULL,
  `layout_id` int(11) NOT NULL,
  `module_id` int(11) NOT NULL,
  `position_within` varchar(128) NOT NULL,
  `position_outer` varchar(128) NOT NULL,
  `order` varchar(12) NOT NULL DEFAULT '0',
  `is_mobile` int(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`layout_module_id`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

-- ----------------------------
--  Table structure for `modules`
-- ----------------------------
DROP TABLE IF EXISTS `modules`;
CREATE TABLE `modules` (
  `module_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(128) NOT NULL,
  `code` varchar(128) NOT NULL,
  `description` mediumtext NOT NULL,
  `author` varchar(128) NOT NULL,
  PRIMARY KEY (`module_id`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;

-- ----------------------------
--  Table structure for `nav_child`
-- ----------------------------
DROP TABLE IF EXISTS `nav_child`;
CREATE TABLE `nav_child` (
  `nav_child_id` int(5) NOT NULL AUTO_INCREMENT,
  `parent_id` int(5) NOT NULL,
  `nav_child_name` varchar(80) NOT NULL,
  `nav_child_url` varchar(255) NOT NULL,
  `store` int(10) NOT NULL,
  `edit_start` int(1) NOT NULL,
  `view_start` int(1) NOT NULL,
  PRIMARY KEY (`nav_child_id`)
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=utf8;

-- ----------------------------
--  Table structure for `nav_parent`
-- ----------------------------
DROP TABLE IF EXISTS `nav_parent`;
CREATE TABLE `nav_parent` (
  `nav_id` int(5) NOT NULL AUTO_INCREMENT,
  `nav_name` varchar(80) NOT NULL,
  `nav_ico` varchar(255) NOT NULL,
  `nav_class` varchar(10) NOT NULL,
  `nav_url` varchar(255) DEFAULT NULL,
  `store` int(10) NOT NULL,
  `edit_start` int(1) NOT NULL,
  `view_start` int(1) NOT NULL,
  PRIMARY KEY (`nav_id`)
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=utf8;

-- ----------------------------
--  Table structure for `report_access`
-- ----------------------------
DROP TABLE IF EXISTS `report_access`;
CREATE TABLE `report_access` (
  `report_id` int(20) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `ip` varchar(120) DEFAULT NULL,
  `access_time` datetime NOT NULL,
  `login_time` datetime DEFAULT NULL,
  `platform` varchar(120) DEFAULT NULL,
  `browser` varchar(120) DEFAULT NULL,
  `ip_address` text NOT NULL,
  `token` text NOT NULL,
  `login_type` varchar(25) DEFAULT NULL,
  PRIMARY KEY (`report_id`)
) ENGINE=MyISAM AUTO_INCREMENT=33 DEFAULT CHARSET=utf8;

-- ----------------------------
--  Table structure for `report_flow`
-- ----------------------------
DROP TABLE IF EXISTS `report_flow`;
CREATE TABLE `report_flow` (
  `flow_id` int(11) NOT NULL AUTO_INCREMENT,
  `ip` varchar(128) NOT NULL,
  `current_url` varchar(255) DEFAULT NULL,
  `referrer_url` varchar(255) DEFAULT NULL,
  `token` text,
  `access_time` datetime NOT NULL,
  `platform` varchar(128) DEFAULT NULL,
  `browser` varchar(128) DEFAULT NULL,
  `robot` varchar(128) DEFAULT NULL,
  `user_agent` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`flow_id`)
) ENGINE=MyISAM AUTO_INCREMENT=637 DEFAULT CHARSET=utf8;

-- ----------------------------
--  Table structure for `report_robot`
-- ----------------------------
DROP TABLE IF EXISTS `report_robot`;
CREATE TABLE `report_robot` (
  `robot_id` int(11) NOT NULL AUTO_INCREMENT,
  `ip` varchar(128) NOT NULL,
  `robot_name` varchar(128) NOT NULL,
  `url` varchar(255) NOT NULL,
  `access_time` datetime NOT NULL,
  PRIMARY KEY (`robot_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
--  Table structure for `user_description`
-- ----------------------------
DROP TABLE IF EXISTS `user_description`;
CREATE TABLE `user_description` (
  `user_description_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `signature` varchar(255) DEFAULT NULL,
  `location` varchar(128) DEFAULT NULL,
  `birthday` date DEFAULT NULL,
  PRIMARY KEY (`user_description_id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
--  Table structure for `user_group`
-- ----------------------------
DROP TABLE IF EXISTS `user_group`;
CREATE TABLE `user_group` (
  `group_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(128) NOT NULL,
  `description` varchar(255) DEFAULT NULL,
  `permission` text,
  PRIMARY KEY (`group_id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- ----------------------------
--  Table structure for `user_info`
-- ----------------------------
DROP TABLE IF EXISTS `user_info`;
CREATE TABLE `user_info` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `uid` varchar(128) DEFAULT NULL,
  `user_name` varchar(128) DEFAULT NULL,
  `mobile` varchar(11) DEFAULT NULL,
  `email` varchar(128) DEFAULT NULL,
  `wechat` varchar(25) DEFAULT NULL,
  `QQ` varchar(18) DEFAULT NULL,
  `passwd` varchar(255) DEFAULT NULL,
  `nick_name` varchar(25) DEFAULT NULL,
  `image` text,
  `add_ip` varchar(120) NOT NULL,
  `add_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `status` varchar(1) NOT NULL,
  `platform` varchar(100) DEFAULT NULL,
  `browser` varchar(25) NOT NULL,
  `register_style` varchar(12) NOT NULL,
  `group_id` int(11) NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8;

-- ----------------------------
--  Records 
-- ----------------------------
INSERT INTO `base_setting` VALUES ('1','base','website_name','旅行兔、驴友网'), ('2','base','website_title','—旅行兔|非盈利网'), ('3','base','mate_key','旅行兔、驴友网、文艺旅行、原生态景点、乡村旅游、去拉萨、徒步、穷游'), ('4','base','mate_description','旅行兔是一个提供高品质文艺旅行，搜罗小众原生态乡村好去处的出行平台，随心随性，分享无界限！'), ('5','base','mate_author','旅行兔网'), ('6','base','quantity_view','50'), ('7','base','quantity_admin','40'), ('8','base','article_check','1'), ('9','base','author_check','1'), ('10','base','https_pc','0'), ('11','base','https_mobile','0'), ('12','base','register_group','3'), ('13','base','visitors_group','4'), ('14','base','is_compactor','0');
INSERT INTO `ico_libray` VALUES ('1','compass','icon'), ('2','eur','icon'), ('3','dollar','icon'), ('4','yen','icon'), ('5','won','icon'), ('6','file-text','icon'), ('7','sort-by-attributes-alt','icon'), ('8','thumbs-down','icon'), ('9','xing-sign','icon'), ('10','instagram','icon'), ('11','bitbucket-sign','icon'), ('12','long-arrow-up','icon'), ('13','windows','icon'), ('14','skype','icon'), ('15','male','icon'), ('16','archive','icon'), ('17','renren','icon'), ('18','collapse','icon'), ('19','euro','icon'), ('20','inr','icon'), ('21','cny','icon'), ('22','btc','icon'), ('23','sort-by-alphabet','icon'), ('24','sort-by-order','icon'), ('25','youtube-sign','icon'), ('26','youtube-play','icon'), ('27','flickr','icon'), ('28','tumblr','icon'), ('29','long-arrow-left','icon'), ('30','android','icon'), ('31','foursquare','icon'), ('32','gittip','icon'), ('33','bug','icon'), ('34','collapse-top','icon'), ('35','gbp','icon'), ('36','rupee','icon'), ('37','renminbi','icon'), ('38','bitcoin','icon'), ('39','sort-by-alphabet-alt','icon'), ('40','sort-by-order-alt','icon'), ('41','youtube','icon'), ('42','dropbox','icon'), ('43','adn','icon'), ('44','tumblr-sign','icon'), ('45','long-arrow-right','icon'), ('46','linux','icon'), ('47','trello','icon'), ('48','sun','icon'), ('49','vk','icon'), ('50','expand','icon'), ('51','usd','icon'), ('52','jpy','icon'), ('53','krw','icon'), ('54','file','icon'), ('55','sort-by-attributes','icon'), ('56','thumbs-up','icon'), ('57','xing','icon'), ('58','stackexchange','icon'), ('59','bitbucket','icon'), ('60','long-arrow-down','icon'), ('61','apple','icon'), ('62','dribble','icon'), ('63','female','icon'), ('64','moon','icon'), ('65','weibo','icon'), ('66','adjust','icon'), ('67','asterisk','icon'), ('68','ban-circle','icon'), ('69','bar-chart','icon'), ('70','barcode','icon'), ('71','beaker','icon'), ('72','bell','icon'), ('73','bolt','icon'), ('74','book','icon'), ('75','bookmark','icon'), ('76','bookmark-empty','icon'), ('77','briefcase','icon'), ('78','bullhorn','icon'), ('79','calendar','icon'), ('80','camera','icon'), ('81','camera-retro','icon'), ('82','certificate','icon'), ('83','check','icon'), ('84','check-empty','icon'), ('85','cloud','icon'), ('86','cog','icon'), ('87','cogs','icon'), ('88','comment','icon'), ('89','comment-alt','icon'), ('90','comments','icon'), ('91','comments-alt','icon'), ('92','credit-card','icon'), ('93','dashboard','icon'), ('94','download','icon'), ('95','download-alt','icon'), ('96','edit','icon'), ('97','envelope','icon'), ('98','envelope-alt','icon'), ('99','exclamation-sign','icon'), ('100','external-link','icon');
INSERT INTO `ico_libray` VALUES ('101','eye-close','icon'), ('102','eye-open','icon'), ('103','facetime-video','icon'), ('104','film','icon'), ('105','filter','icon'), ('106','fire','icon'), ('107','flag','icon'), ('108','folder-close','icon'), ('109','folder-open','icon'), ('110','gift','icon'), ('111','glass','icon'), ('112','globe','icon'), ('113','group','icon'), ('114','hdd','icon'), ('115','headphones','icon'), ('116','heart','icon'), ('117','heart-empty','icon'), ('118','home','icon'), ('119','inbox','icon'), ('120','info-sign','icon'), ('121','key','icon'), ('122','leaf','icon'), ('123','legal','icon'), ('124','lemon','icon'), ('125','lock','icon'), ('126','unlock','icon'), ('127','magic','icon'), ('128','magnet','icon'), ('129','map-marker','icon'), ('130','minus','icon'), ('131','minus-sign','icon'), ('132','money','icon'), ('133','move','icon'), ('134','music','icon'), ('135','off','icon'), ('136','ok','icon'), ('137','ok-circle','icon'), ('138','ok-sign','icon'), ('139','pencil','icon'), ('140','picture','icon'), ('141','plane','icon'), ('142','plus','icon'), ('143','plus-sign','icon'), ('144','print','icon'), ('145','pushpin','icon'), ('146','qrcode','icon'), ('147','question-sign','icon'), ('148','random','icon'), ('149','refresh','icon'), ('150','remove','icon'), ('151','remove-circle','icon'), ('152','remove-sign','icon'), ('153','reorder','icon'), ('154','resize-horizontal','icon'), ('155','resize-vertical','icon'), ('156','retweet','icon'), ('157','road','icon'), ('158','rss','icon'), ('159','screenshot','icon'), ('160','search','icon'), ('161','share','icon'), ('162','share-alt','icon'), ('163','shopping-cart','icon'), ('164','signal','icon'), ('165','signin','icon'), ('166','signout','icon'), ('167','sitemap','icon'), ('168','sort','icon'), ('169','sort-down','icon'), ('170','sort-up','icon'), ('171','star','icon'), ('172','star-empty','icon'), ('173','star-half','icon'), ('174','tag','icon'), ('175','tags','icon'), ('176','tasks','icon'), ('177','time','icon'), ('178','tint','icon'), ('179','trash','icon'), ('180','trophy','icon'), ('181','truck','icon'), ('182','umbrella','icon'), ('183','upload','icon'), ('184','upload-alt','icon'), ('185','user','icon'), ('186','user-md','icon'), ('187','volume-off','icon'), ('188','volume-down','icon'), ('189','volume-up','icon'), ('190','warning-sign','icon'), ('191','wrench','icon'), ('192','zoom-in','icon'), ('193','zoom-out','icon'), ('194','cut','icon'), ('195','copy','icon'), ('196','paste','icon'), ('197','save','icon'), ('198','undo','icon'), ('199','repeat','icon'), ('200','paper-clip','icon');
INSERT INTO `ico_libray` VALUES ('201','text-height','icon'), ('202','text-width','icon'), ('203','align-left','icon'), ('204','align-center','icon'), ('205','align-right','icon'), ('206','align-justify','icon'), ('207','indent-left','icon'), ('208','indent-right','icon'), ('209','font','icon'), ('210','bold','icon'), ('211','italic','icon'), ('212','strikethrough','icon'), ('213','underline','icon'), ('214','link','icon'), ('215','columns','icon'), ('216','table','icon'), ('217','th-large','icon'), ('218','th','icon'), ('219','th-list','icon'), ('220','list','icon'), ('221','list-ol','icon'), ('222','list-ul','icon'), ('223','list-alt','icon'), ('224','arrow-down','icon'), ('225','arrow-left','icon'), ('226','arrow-right','icon'), ('227','arrow-up','icon'), ('228','chevron-down','icon'), ('229','circle-arrow-down','icon'), ('230','circle-arrow-left','icon'), ('231','circle-arrow-right','icon'), ('232','circle-arrow-up','icon'), ('233','chevron-left','icon'), ('234','caret-down','icon'), ('235','caret-left','icon'), ('236','caret-right','icon'), ('237','caret-up','icon'), ('238','chevron-right','icon'), ('239','hand-down','icon'), ('240','hand-left','icon'), ('241','hand-right','icon'), ('242','hand-up','icon'), ('243','chevron-up','icon'), ('244','play-circle','icon'), ('245','play','icon'), ('246','pause','icon'), ('247','stop','icon'), ('248','step-backward','icon'), ('249','fast-backward','icon'), ('250','backward','icon'), ('251','forward','icon'), ('252','fast-forward','icon'), ('253','step-forward','icon'), ('254','eject','icon'), ('255','fullscreen','icon'), ('256','resize-full','icon'), ('257','resize-small','icon'), ('258','github-sign','icon'), ('259','html','icon'), ('260','maxcdn','icon'), ('261','facebook','icon'), ('262','github','icon'), ('263','google-plus','icon'), ('264','linkedin','icon'), ('265','pinterest','icon'), ('266','twitter','icon'), ('267','css','icon'), ('268','facebook-sign','icon'), ('269','github-alt','icon'), ('270','google-plus-sign','icon'), ('271','linkedin-sign','icon'), ('272','pinterest-sign','icon'), ('273','twitter-sign','icon'), ('274','ambulance','icon'), ('275','plus-sign-alt','icon'), ('276','h-sign','icon'), ('277','stethoscope','icon'), ('278','hospital','icon'), ('279','medkit','icon');
INSERT INTO `layout` VALUES ('1','首页','home'), ('2','用户中心','user/user_center'), ('3','文章列表','article/article_list'), ('4','文章内容','article/article_content'), ('5','图片管理','user/image_manager'), ('6','关于','1255');
INSERT INTO `layout_module` VALUES ('1','首页这一个','1','2','left','middle','1','1'), ('2','中间的','1','1','page','top','50','1'), ('3','下面的','1','1','page','top','5','1'), ('4','上现的大小小','1','3','top','top','70','0'), ('6','里面的底部','1','2','page','top','70','0'), ('7','一个神奇的模块','1','2','page','top','12','1'), ('8','一个神奇的模块','1','11','top','top','1','1'), ('9','首页顶上','1','9','page','top','15','1'), ('10','磊磊','1','1','page','top','100','1');
INSERT INTO `modules` VALUES ('1','结伴','travel_info','结伴在首页显示','xcalder'), ('2','文章','article','显示文章','xcalder'), ('3','banner','banner','banner','xcalder'), ('9','gcx','gcx','none','none'), ('11','二维码','qr_banner','none','none');
INSERT INTO `nav_child` VALUES ('1','8','青年旅社','www.lv.com','10','1','1'), ('2','4','好的呀','ss','111','1','1'), ('3','11','不是吧','che','10','1','1'), ('4','18','网站设置','setting/setting','10','1','1'), ('5','18','添加导航','setting/setting_form','20','1','1'), ('6','20','用户中心','user/user_center','10','1','1'), ('7','20','文章内容','article/article_content','20','1','1'), ('8','20','用户登陆','user/login','40','1','1'), ('9','20','文章列表','article/Article_list','50','1','1'), ('10','20','关于我们','about/about_us','60','1','1'), ('11','20','结伴内容','travel_info/alice_content','70','1','1'), ('12','20','结伴列表','travel_info/alice_list','80','1','1'), ('13','20','网站设置','setting/setting','90','1','1'), ('14','20','图片管理','user/image_manager','100','1','1'), ('15','21','找青旅','111','110','1','1'), ('16','18','布局插件','setting/layout','10','1','1'), ('17','26','示例','','10','1','1'), ('18','24','示例2','#','20','1','1'), ('19','24','示例3','','30','1','1'), ('20','24','示例4','#','30','1','1'), ('21','25','示例','#','10','1','1'), ('22','18','用户管理','setting/user_manage','200','1','1'), ('23','18','访问统计','report/report_access','400','1','1'), ('24','18','统计图表','report/report_charts','410','1','1'), ('25','18','11111','222222222222222','222','1','1');
INSERT INTO `nav_parent` VALUES ('1','个人中心','user','admin','user/user_center','10','1','1'), ('2','结伴','group','admin','article/article_content','20','1','1'), ('3','艺术长河','magic','admin','article/article_content','30','1','1'), ('4','行摄频道','camera-retro','admin','article/article_content','40','1','1'), ('5','特色城市','flag','admin','article/article_content','50','1','1'), ('6','安全中心','lock','admin','article/article_content','60','1','1'), ('7','关于我们','thumbs-up','admin','article/article_content','70','1','1'), ('8','旅行','leaf','admin','about/about_us','15','1','1'), ('9','关于我们','thumbs-up','helper','about/about_us','10','1','1'), ('11','常见问题','cogs','helper','cogs','20','1','1'), ('12','自助服务','wrench','helper','wrench','30','1','1'), ('13','版权协议','bookmark-empty','helper','#','40','1','1'), ('14','免责申明','lemon','helper','#','50','1','1'), ('15','赞助投资','credit-card','helper','#','60','1','1'), ('16','广告服务','dashboard','helper','#','70','1','1'), ('17','意见反馈','pencil','helper','#','80','1','1'), ('18','管理员面板','edit','admin','','14','1','1'), ('19','首页','home','view_top','home','10','1','1'), ('20','结伴','home','view_top',NULL,'20','1','1'), ('21','旅行','home','view_top',NULL,'30','1','1'), ('22','青旅','home','view_top',NULL,'40','1','1'), ('23','首页','home','admin_top','home','10','1','1'), ('24','结伴','adn','admin_top','','20','1','1'), ('25','旅行','align-left','admin_top','','30','1','1'), ('26','青旅','align-center','admin_top','','40','1','1');
INSERT INTO `report_flow` VALUES ('560','127.0.0.1','http://www.lv.com/home.html','http://www.lv.com/setting/user_manage/edit_usergroup.html?group_id=3','da894570cf1bcfcabd898e3bff0ecc8307b26d19','2015-11-07 17:02:57','Windows 7','Chrome46.0.2490.80','','Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/46.0.2490.80 Safari/537.36'), ('561','127.0.0.1','http://www.lv.com/setting/user_manage/edit_usergroup.html','http://www.lv.com/setting/user_manage.html','da894570cf1bcfcabd898e3bff0ecc8307b26d19','2015-11-07 17:03:17','Windows 7','Chrome46.0.2490.80','','Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/46.0.2490.80 Safari/537.36'), ('562','127.0.0.1','http://www.lv.com/home.html','http://www.lv.com/setting/user_manage/edit_usergroup.html?group_id=3','da894570cf1bcfcabd898e3bff0ecc8307b26d19','2015-11-07 17:05:00','Windows 7','Chrome46.0.2490.80','','Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/46.0.2490.80 Safari/537.36'), ('563','127.0.0.1','http://www.lv.com/home.html','http://www.lv.com/setting/user_manage/edit_usergroup.html?group_id=3','da894570cf1bcfcabd898e3bff0ecc8307b26d19','2015-11-07 17:05:57','Windows 7','Chrome46.0.2490.80','','Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/46.0.2490.80 Safari/537.36'), ('564','127.0.0.1','http://www.lv.com/home.html','http://www.lv.com/setting/user_manage/edit_usergroup.html?group_id=3','da894570cf1bcfcabd898e3bff0ecc8307b26d19','2015-11-07 17:06:46','Windows 7','Chrome46.0.2490.80','','Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/46.0.2490.80 Safari/537.36'), ('565','127.0.0.1','http://www.lv.com/home.html','http://www.lv.com/setting/user_manage/edit_usergroup.html?group_id=3','da894570cf1bcfcabd898e3bff0ecc8307b26d19','2015-11-07 17:07:16','Windows 7','Chrome46.0.2490.80','','Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/46.0.2490.80 Safari/537.36'), ('566','127.0.0.1','http://www.lv.com/home.html','http://www.lv.com/setting/user_manage/edit_usergroup.html?group_id=3','da894570cf1bcfcabd898e3bff0ecc8307b26d19','2015-11-07 17:10:31','Windows 7','Chrome46.0.2490.80','','Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/46.0.2490.80 Safari/537.36'), ('567','127.0.0.1','http://www.lv.com/home.html','http://www.lv.com/setting/user_manage/edit_usergroup.html?group_id=3','da894570cf1bcfcabd898e3bff0ecc8307b26d19','2015-11-07 17:10:38','Windows 7','Chrome46.0.2490.80','','Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/46.0.2490.80 Safari/537.36'), ('568','127.0.0.1','http://www.lv.com/home.html','','da894570cf1bcfcabd898e3bff0ecc8307b26d19','2015-11-07 17:10:43','Windows 7','Chrome46.0.2490.80','','Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/46.0.2490.80 Safari/537.36'), ('569','127.0.0.1','http://www.lv.com/setting/user_manage/edit_usergroup.html','http://www.lv.com/setting/user_manage.html','da894570cf1bcfcabd898e3bff0ecc8307b26d19','2015-11-07 17:12:24','Windows 7','Chrome46.0.2490.80','','Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/46.0.2490.80 Safari/537.36'), ('570','127.0.0.1','http://www.lv.com/setting/layout.html','http://www.lv.com/setting/user_manage/edit_usergroup.html?group_id=3','da894570cf1bcfcabd898e3bff0ecc8307b26d19','2015-11-07 17:12:29','Windows 7','Chrome46.0.2490.80','','Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/46.0.2490.80 Safari/537.36'), ('571','127.0.0.1','http://www.lv.com/setting/layout_form.html','http://www.lv.com/setting/layout.html','da894570cf1bcfcabd898e3bff0ecc8307b26d19','2015-11-07 17:12:49','Windows 7','Chrome46.0.2490.80','','Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/46.0.2490.80 Safari/537.36'), ('572','127.0.0.1','http://www.lv.com/setting/layout_form.html','http://www.lv.com/setting/layout_form.html?layout_module_id=2&tab_position=tab_1_3','da894570cf1bcfcabd898e3bff0ecc8307b26d19','2015-11-07 17:12:54','Windows 7','Chrome46.0.2490.80','','Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/46.0.2490.80 Safari/537.36'), ('573','127.0.0.1','http://www.lv.com/setting/layout.html','http://www.lv.com/setting/layout_form.html?layout_module_id=2','da894570cf1bcfcabd898e3bff0ecc8307b26d19','2015-11-07 17:13:05','Windows 7','Chrome46.0.2490.80','','Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/46.0.2490.80 Safari/537.36'), ('574','127.0.0.1','http://www.lv.com/setting/layout_form.html','http://www.lv.com/setting/layout.html','da894570cf1bcfcabd898e3bff0ecc8307b26d19','2015-11-07 17:13:20','Windows 7','Chrome46.0.2490.80','','Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/46.0.2490.80 Safari/537.36'), ('575','127.0.0.1','http://www.lv.com/setting/layout_form.html','http://www.lv.com/setting/layout_form.html?layout_module_id=3&tab_position=tab_1_3','da894570cf1bcfcabd898e3bff0ecc8307b26d19','2015-11-07 17:13:28','Windows 7','Chrome46.0.2490.80','','Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/46.0.2490.80 Safari/537.36'), ('576','127.0.0.1','http://www.lv.com/setting/layout.html','http://www.lv.com/setting/layout_form.html?layout_module_id=3','da894570cf1bcfcabd898e3bff0ecc8307b26d19','2015-11-07 17:13:44','Windows 7','Chrome46.0.2490.80','','Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/46.0.2490.80 Safari/537.36'), ('577','127.0.0.1','http://www.lv.com/home.html','','da894570cf1bcfcabd898e3bff0ecc8307b26d19','2015-11-07 17:13:47','Windows 7','Chrome46.0.2490.80','','Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/46.0.2490.80 Safari/537.36'), ('578','127.0.0.1','http://www.lv.com/setting/layout_form.html','http://www.lv.com/setting/layout.html','da894570cf1bcfcabd898e3bff0ecc8307b26d19','2015-11-07 17:14:43','Windows 7','Chrome46.0.2490.80','','Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/46.0.2490.80 Safari/537.36'), ('579','127.0.0.1','http://www.lv.com/setting/layout.html','http://www.lv.com/setting/layout_form.html','da894570cf1bcfcabd898e3bff0ecc8307b26d19','2015-11-07 17:15:59','Windows 7','Chrome46.0.2490.80','','Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/46.0.2490.80 Safari/537.36'), ('580','127.0.0.1','http://www.lv.com/home.html','','da894570cf1bcfcabd898e3bff0ecc8307b26d19','2015-11-07 17:16:02','Windows 7','Chrome46.0.2490.80','','Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/46.0.2490.80 Safari/537.36'), ('581','127.0.0.1','http://www.lv.com/setting/layout_form.html','http://www.lv.com/setting/layout.html','da894570cf1bcfcabd898e3bff0ecc8307b26d19','2015-11-07 17:16:15','Windows 7','Chrome46.0.2490.80','','Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/46.0.2490.80 Safari/537.36'), ('582','127.0.0.1','http://www.lv.com/setting/layout.html','http://www.lv.com/setting/layout_form.html?layout_module_id=9&tab_position=tab_1_3','da894570cf1bcfcabd898e3bff0ecc8307b26d19','2015-11-07 17:16:28','Windows 7','Chrome46.0.2490.80','','Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/46.0.2490.80 Safari/537.36'), ('583','127.0.0.1','http://www.lv.com/home.html','','da894570cf1bcfcabd898e3bff0ecc8307b26d19','2015-11-07 17:16:30','Windows 7','Chrome46.0.2490.80','','Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/46.0.2490.80 Safari/537.36'), ('584','127.0.0.1','http://www.lv.com/setting/layout_form.html','http://www.lv.com/setting/layout.html','da894570cf1bcfcabd898e3bff0ecc8307b26d19','2015-11-07 17:16:43','Windows 7','Chrome46.0.2490.80','','Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/46.0.2490.80 Safari/537.36'), ('585','127.0.0.1','http://www.lv.com/setting/layout.html','http://www.lv.com/setting/layout_form.html?layout_module_id=9&tab_position=tab_1_3','da894570cf1bcfcabd898e3bff0ecc8307b26d19','2015-11-07 17:16:59','Windows 7','Chrome46.0.2490.80','','Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/46.0.2490.80 Safari/537.36'), ('586','127.0.0.1','http://www.lv.com/home.html','','da894570cf1bcfcabd898e3bff0ecc8307b26d19','2015-11-07 17:17:02','Windows 7','Chrome46.0.2490.80','','Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/46.0.2490.80 Safari/537.36'), ('587','127.0.0.1','http://www.lv.com/setting/layout_form.html','http://www.lv.com/setting/layout.html','da894570cf1bcfcabd898e3bff0ecc8307b26d19','2015-11-07 17:17:33','Windows 7','Chrome46.0.2490.80','','Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/46.0.2490.80 Safari/537.36'), ('588','127.0.0.1','http://www.lv.com/article/article_content.html','http://www.lv.com/setting/layout_form.html?layout_module_id=9&tab_position=tab_1_3','da894570cf1bcfcabd898e3bff0ecc8307b26d19','2015-11-07 17:17:53','Windows 7','Chrome46.0.2490.80','','Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/46.0.2490.80 Safari/537.36'), ('589','127.0.0.1','http://www.lv.com/setting/layout_form.html','http://www.lv.com/setting/layout.html','da894570cf1bcfcabd898e3bff0ecc8307b26d19','2015-11-07 17:17:55','Windows 7','Chrome46.0.2490.80','','Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/46.0.2490.80 Safari/537.36'), ('590','127.0.0.1','http://www.lv.com/setting/layout.html','http://www.lv.com/setting/layout_form.html?layout_module_id=9&tab_position=tab_1_3','da894570cf1bcfcabd898e3bff0ecc8307b26d19','2015-11-07 17:18:16','Windows 7','Chrome46.0.2490.80','','Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/46.0.2490.80 Safari/537.36'), ('591','127.0.0.1','http://www.lv.com/home.html','','da894570cf1bcfcabd898e3bff0ecc8307b26d19','2015-11-07 17:18:18','Windows 7','Chrome46.0.2490.80','','Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/46.0.2490.80 Safari/537.36'), ('592','127.0.0.1','http://www.lv.com/setting/layout_form.html','http://www.lv.com/setting/layout.html','da894570cf1bcfcabd898e3bff0ecc8307b26d19','2015-11-07 17:18:40','Windows 7','Chrome46.0.2490.80','','Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/46.0.2490.80 Safari/537.36'), ('593','127.0.0.1','http://www.lv.com/setting/layout.html','http://www.lv.com/setting/layout_form.html?layout_module_id=9&tab_position=tab_1_3','da894570cf1bcfcabd898e3bff0ecc8307b26d19','2015-11-07 17:19:02','Windows 7','Chrome46.0.2490.80','','Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/46.0.2490.80 Safari/537.36'), ('594','127.0.0.1','http://www.lv.com/setting/layout_form.html','http://www.lv.com/setting/layout.html','da894570cf1bcfcabd898e3bff0ecc8307b26d19','2015-11-07 17:19:14','Windows 7','Chrome46.0.2490.80','','Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/46.0.2490.80 Safari/537.36'), ('595','127.0.0.1','http://www.lv.com/setting/layout_form.html','http://www.lv.com/setting/layout_form.html','da894570cf1bcfcabd898e3bff0ecc8307b26d19','2015-11-07 17:19:37','Windows 7','Chrome46.0.2490.80','','Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/46.0.2490.80 Safari/537.36'), ('596','127.0.0.1','http://www.lv.com/setting/layout_form.html','http://www.lv.com/setting/layout_form.html?layout_module_id=','da894570cf1bcfcabd898e3bff0ecc8307b26d19','2015-11-07 17:20:02','Windows 7','Chrome46.0.2490.80','','Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/46.0.2490.80 Safari/537.36'), ('597','127.0.0.1','http://www.lv.com/setting/layout.html','http://www.lv.com/setting/layout_form.html?layout_module_id=','da894570cf1bcfcabd898e3bff0ecc8307b26d19','2015-11-07 17:20:33','Windows 7','Chrome46.0.2490.80','','Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/46.0.2490.80 Safari/537.36'), ('598','127.0.0.1','http://www.lv.com/home.html','','da894570cf1bcfcabd898e3bff0ecc8307b26d19','2015-11-07 17:20:35','Windows 7','Chrome46.0.2490.80','','Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/46.0.2490.80 Safari/537.36'), ('599','127.0.0.1','http://www.lv.com/home.html','','da894570cf1bcfcabd898e3bff0ecc8307b26d19','2015-11-07 17:26:52','Windows 7','Chrome46.0.2490.80','','Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/46.0.2490.80 Safari/537.36'), ('600','127.0.0.1','http://www.lv.com/home.html','','da894570cf1bcfcabd898e3bff0ecc8307b26d19','2015-11-07 17:27:23','Windows 7','Chrome46.0.2490.80','','Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/46.0.2490.80 Safari/537.36'), ('601','127.0.0.1','http://www.lv.com/home.html','','da894570cf1bcfcabd898e3bff0ecc8307b26d19','2015-11-07 17:27:39','Windows 7','Chrome46.0.2490.80','','Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/46.0.2490.80 Safari/537.36'), ('602','127.0.0.1','http://www.lv.com/home.html','','da894570cf1bcfcabd898e3bff0ecc8307b26d19','2015-11-07 17:27:59','Windows 7','Chrome46.0.2490.80','','Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/46.0.2490.80 Safari/537.36'), ('603','127.0.0.1','http://www.lv.com/home.html','','da894570cf1bcfcabd898e3bff0ecc8307b26d19','2015-11-07 17:28:48','Windows 7','Chrome46.0.2490.80','','Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/46.0.2490.80 Safari/537.36'), ('604','127.0.0.1','http://www.lv.com/home.html','','da894570cf1bcfcabd898e3bff0ecc8307b26d19','2015-11-07 17:29:32','Windows 7','Chrome46.0.2490.80','','Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/46.0.2490.80 Safari/537.36'), ('605','127.0.0.1','http://www.lv.com/home.html','','da894570cf1bcfcabd898e3bff0ecc8307b26d19','2015-11-07 17:29:57','Windows 7','Chrome46.0.2490.80','','Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/46.0.2490.80 Safari/537.36'), ('606','127.0.0.1','http://www.lv.com/home.html','','da894570cf1bcfcabd898e3bff0ecc8307b26d19','2015-11-07 17:30:56','Windows 7','Chrome46.0.2490.80','','Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/46.0.2490.80 Safari/537.36'), ('607','127.0.0.1','http://www.lv.com/home.html','','da894570cf1bcfcabd898e3bff0ecc8307b26d19','2015-11-07 17:31:18','Windows 7','Chrome46.0.2490.80','','Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/46.0.2490.80 Safari/537.36'), ('608','127.0.0.1','http://www.lv.com/home.html','','da894570cf1bcfcabd898e3bff0ecc8307b26d19','2015-11-07 17:31:59','Windows 7','Chrome46.0.2490.80','','Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/46.0.2490.80 Safari/537.36'), ('609','127.0.0.1','http://www.lv.com/home.html','','da894570cf1bcfcabd898e3bff0ecc8307b26d19','2015-11-07 17:33:24','Windows 7','Chrome46.0.2490.80','','Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/46.0.2490.80 Safari/537.36'), ('610','127.0.0.1','http://www.lv.com/home.html','','da894570cf1bcfcabd898e3bff0ecc8307b26d19','2015-11-07 17:33:48','Windows 7','Chrome46.0.2490.80','','Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/46.0.2490.80 Safari/537.36'), ('611','127.0.0.1','http://www.lv.com/home.html','','da894570cf1bcfcabd898e3bff0ecc8307b26d19','2015-11-07 17:34:12','Windows 7','Chrome46.0.2490.80','','Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/46.0.2490.80 Safari/537.36'), ('612','127.0.0.1','http://www.lv.com/home.html','','da894570cf1bcfcabd898e3bff0ecc8307b26d19','2015-11-07 17:36:15','Windows 7','Chrome46.0.2490.80','','Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/46.0.2490.80 Safari/537.36'), ('613','127.0.0.1','http://www.lv.com/home.html','','da894570cf1bcfcabd898e3bff0ecc8307b26d19','2015-11-07 17:36:24','Windows 7','Chrome46.0.2490.80','','Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/46.0.2490.80 Safari/537.36'), ('614','127.0.0.1','http://www.lv.com/home.html','','da894570cf1bcfcabd898e3bff0ecc8307b26d19','2015-11-07 17:37:21','Windows 7','Chrome46.0.2490.80','','Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/46.0.2490.80 Safari/537.36'), ('615','127.0.0.1','http://www.lv.com/home.html','','da894570cf1bcfcabd898e3bff0ecc8307b26d19','2015-11-07 17:38:45','Windows 7','Chrome46.0.2490.80','','Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/46.0.2490.80 Safari/537.36'), ('616','127.0.0.1','http://www.lv.com/home.html','','da894570cf1bcfcabd898e3bff0ecc8307b26d19','2015-11-07 17:39:50','Windows 7','Chrome46.0.2490.80','','Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/46.0.2490.80 Safari/537.36'), ('617','127.0.0.1','http://www.lv.com/home.html','','da894570cf1bcfcabd898e3bff0ecc8307b26d19','2015-11-07 17:41:52','Windows 7','Chrome46.0.2490.80','','Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/46.0.2490.80 Safari/537.36'), ('618','127.0.0.1','http://www.lv.com/home.html','','da894570cf1bcfcabd898e3bff0ecc8307b26d19','2015-11-07 17:41:54','Windows 7','Chrome46.0.2490.80','','Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/46.0.2490.80 Safari/537.36'), ('619','127.0.0.1','http://www.lv.com/home.html','','da894570cf1bcfcabd898e3bff0ecc8307b26d19','2015-11-07 17:43:40','Windows 7','Chrome46.0.2490.80','','Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/46.0.2490.80 Safari/537.36'), ('620','127.0.0.1','http://www.lv.com/home.html','','da894570cf1bcfcabd898e3bff0ecc8307b26d19','2015-11-07 17:44:52','Windows 7','Chrome46.0.2490.80','','Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/46.0.2490.80 Safari/537.36'), ('621','127.0.0.1','http://www.lv.com/home.html','','da894570cf1bcfcabd898e3bff0ecc8307b26d19','2015-11-07 17:44:54','Windows 7','Chrome46.0.2490.80','','Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/46.0.2490.80 Safari/537.36'), ('622','127.0.0.1','http://www.lv.com/home.html','','da894570cf1bcfcabd898e3bff0ecc8307b26d19','2015-11-07 17:45:33','Windows 7','Chrome46.0.2490.80','','Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/46.0.2490.80 Safari/537.36'), ('623','127.0.0.1','http://www.lv.com/home.html','','da894570cf1bcfcabd898e3bff0ecc8307b26d19','2015-11-07 17:45:35','Windows 7','Chrome46.0.2490.80','','Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/46.0.2490.80 Safari/537.36'), ('624','127.0.0.1','http://www.lv.com/home.html','','da894570cf1bcfcabd898e3bff0ecc8307b26d19','2015-11-07 17:46:22','Windows 7','Chrome46.0.2490.80','','Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/46.0.2490.80 Safari/537.36'), ('625','127.0.0.1','http://www.lv.com/home.html','','da894570cf1bcfcabd898e3bff0ecc8307b26d19','2015-11-07 17:46:23','Windows 7','Chrome46.0.2490.80','','Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/46.0.2490.80 Safari/537.36'), ('626','127.0.0.1','http://www.lv.com/home.html','','da894570cf1bcfcabd898e3bff0ecc8307b26d19','2015-11-07 17:53:44','Windows 7','Chrome46.0.2490.80','','Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/46.0.2490.80 Safari/537.36'), ('627','127.0.0.1','http://www.lv.com/home.html','','da894570cf1bcfcabd898e3bff0ecc8307b26d19','2015-11-07 17:53:46','Windows 7','Chrome46.0.2490.80','','Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/46.0.2490.80 Safari/537.36'), ('628','127.0.0.1','http://www.lv.com/home.html','','da894570cf1bcfcabd898e3bff0ecc8307b26d19','2015-11-07 17:54:59','Windows 7','Chrome46.0.2490.80','','Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/46.0.2490.80 Safari/537.36'), ('629','127.0.0.1','http://www.lv.com/home.html','','da894570cf1bcfcabd898e3bff0ecc8307b26d19','2015-11-07 17:55:01','Windows 7','Chrome46.0.2490.80','','Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/46.0.2490.80 Safari/537.36'), ('630','127.0.0.1','http://www.lv.com/home.html','','da894570cf1bcfcabd898e3bff0ecc8307b26d19','2015-11-07 17:56:05','Windows 7','Chrome46.0.2490.80','','Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/46.0.2490.80 Safari/537.36'), ('631','127.0.0.1','http://www.lv.com/home.html','','da894570cf1bcfcabd898e3bff0ecc8307b26d19','2015-11-07 17:56:06','Windows 7','Chrome46.0.2490.80','','Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/46.0.2490.80 Safari/537.36'), ('632','127.0.0.1','http://www.lv.com/home.html','','da894570cf1bcfcabd898e3bff0ecc8307b26d19','2015-11-07 17:58:43','Windows 7','Chrome46.0.2490.80','','Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/46.0.2490.80 Safari/537.36'), ('633','127.0.0.1','http://www.lv.com/setting/layout.html','http://www.lv.com/setting/layout_form.html?layout_module_id=','da894570cf1bcfcabd898e3bff0ecc8307b26d19','2015-11-07 18:00:57','Windows 7','Chrome46.0.2490.80','','Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/46.0.2490.80 Safari/537.36'), ('634','127.0.0.1','http://www.lv.com/setting/layout_form.html','http://www.lv.com/setting/layout.html','da894570cf1bcfcabd898e3bff0ecc8307b26d19','2015-11-07 18:01:10','Windows 7','Chrome46.0.2490.80','','Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/46.0.2490.80 Safari/537.36'), ('635','127.0.0.1','http://www.lv.com/setting/layout.html','http://www.lv.com/setting/layout_form.html?layout_module_id=','da894570cf1bcfcabd898e3bff0ecc8307b26d19','2015-11-07 18:01:16','Windows 7','Chrome46.0.2490.80','','Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/46.0.2490.80 Safari/537.36'), ('636','127.0.0.1','http://www.lv.com/setting/layout_form.html','http://www.lv.com/setting/layout.html','da894570cf1bcfcabd898e3bff0ecc8307b26d19','2015-11-07 18:01:37','Windows 7','Chrome46.0.2490.80','','Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/46.0.2490.80 Safari/537.36');
INSERT INTO `user_description` VALUES ('1','0',NULL,NULL,'2015-10-30');
INSERT INTO `user_group` VALUES ('1','超级管理员','拥有所有权限','a:2:{s:6:\"access\";a:25:{i:0;s:20:\"report/report_charts\";i:1;s:20:\"report/report_access\";i:2;s:14:\"about/about_us\";i:3;s:23:\"article/article_content\";i:4;s:20:\"article/article_list\";i:5;s:20:\"article/article_send\";i:6;s:14:\"setting/layout\";i:7;s:19:\"setting/layout_form\";i:8;s:15:\"setting/setting\";i:9;s:20:\"setting/setting_form\";i:10;s:19:\"setting/user_manage\";i:11;s:25:\"travel_info/alice_content\";i:12;s:22:\"travel_info/alice_list\";i:13;s:13:\"user/calendar\";i:14;s:18:\"user/image_manager\";i:15;s:16:\"user/inbox_inbox\";i:16;s:10:\"user/login\";i:17;s:15:\"user/login_lock\";i:18;s:8:\"user/sns\";i:19;s:16:\"user/user_center\";i:20;s:15:\"user/user_inbox\";i:21;s:14:\"user/user_page\";i:22;s:19:\"wechat/wechat_index\";i:23;s:4:\"home\";i:24;s:4:\"test\";}s:6:\"modify\";a:25:{i:0;s:20:\"report/report_charts\";i:1;s:20:\"report/report_access\";i:2;s:14:\"about/about_us\";i:3;s:23:\"article/article_content\";i:4;s:20:\"article/article_list\";i:5;s:20:\"article/article_send\";i:6;s:14:\"setting/layout\";i:7;s:19:\"setting/layout_form\";i:8;s:15:\"setting/setting\";i:9;s:20:\"setting/setting_form\";i:10;s:19:\"setting/user_manage\";i:11;s:25:\"travel_info/alice_content\";i:12;s:22:\"travel_info/alice_list\";i:13;s:13:\"user/calendar\";i:14;s:18:\"user/image_manager\";i:15;s:16:\"user/inbox_inbox\";i:16;s:10:\"user/login\";i:17;s:15:\"user/login_lock\";i:18;s:8:\"user/sns\";i:19;s:16:\"user/user_center\";i:20;s:15:\"user/user_inbox\";i:21;s:14:\"user/user_page\";i:22;s:19:\"wechat/wechat_index\";i:23;s:4:\"home\";i:24;s:4:\"test\";}}'), ('2','普通管理员','可以管理用户','a:2:{s:6:\"access\";a:23:{i:0;s:14:\"about/about_us\";i:1;s:23:\"article/article_content\";i:2;s:20:\"article/article_list\";i:3;s:20:\"article/article_send\";i:4;s:14:\"setting/layout\";i:5;s:19:\"setting/layout_form\";i:6;s:15:\"setting/setting\";i:7;s:20:\"setting/setting_form\";i:8;s:19:\"setting/user_manage\";i:9;s:25:\"travel_info/alice_content\";i:10;s:22:\"travel_info/alice_list\";i:11;s:13:\"user/calendar\";i:12;s:18:\"user/image_manager\";i:13;s:16:\"user/inbox_inbox\";i:14;s:10:\"user/login\";i:15;s:15:\"user/login_lock\";i:16;s:8:\"user/sns\";i:17;s:16:\"user/user_center\";i:18;s:15:\"user/user_inbox\";i:19;s:14:\"user/user_page\";i:20;s:19:\"wechat/wechat_index\";i:21;s:4:\"home\";i:22;s:4:\"test\";}s:6:\"modify\";a:15:{i:0;s:14:\"about/about_us\";i:1;s:23:\"article/article_content\";i:2;s:20:\"article/article_list\";i:3;s:20:\"article/article_send\";i:4;s:25:\"travel_info/alice_content\";i:5;s:22:\"travel_info/alice_list\";i:6;s:13:\"user/calendar\";i:7;s:18:\"user/image_manager\";i:8;s:16:\"user/inbox_inbox\";i:9;s:10:\"user/login\";i:10;s:15:\"user/login_lock\";i:11;s:15:\"user/user_inbox\";i:12;s:14:\"user/user_page\";i:13;s:4:\"home\";i:14;s:4:\"test\";}}'), ('3','注册用户','拥有用户权限','a:2:{s:6:\"access\";a:15:{i:0;s:14:\"about/about_us\";i:1;s:23:\"article/article_content\";i:2;s:20:\"article/article_list\";i:3;s:20:\"article/article_send\";i:4;s:25:\"travel_info/alice_content\";i:5;s:22:\"travel_info/alice_list\";i:6;s:13:\"user/calendar\";i:7;s:18:\"user/image_manager\";i:8;s:16:\"user/inbox_inbox\";i:9;s:10:\"user/login\";i:10;s:15:\"user/login_lock\";i:11;s:16:\"user/user_center\";i:12;s:15:\"user/user_inbox\";i:13;s:14:\"user/user_page\";i:14;s:4:\"home\";}s:6:\"modify\";a:15:{i:0;s:14:\"about/about_us\";i:1;s:23:\"article/article_content\";i:2;s:20:\"article/article_list\";i:3;s:20:\"article/article_send\";i:4;s:25:\"travel_info/alice_content\";i:5;s:22:\"travel_info/alice_list\";i:6;s:13:\"user/calendar\";i:7;s:18:\"user/image_manager\";i:8;s:16:\"user/inbox_inbox\";i:9;s:10:\"user/login\";i:10;s:15:\"user/login_lock\";i:11;s:16:\"user/user_center\";i:12;s:15:\"user/user_inbox\";i:13;s:14:\"user/user_page\";i:14;s:4:\"home\";}}'), ('4','游客','游客','a:2:{s:6:\"access\";a:23:{i:0;s:14:\"about/about_us\";i:1;s:23:\"article/article_content\";i:2;s:20:\"article/article_list\";i:3;s:20:\"article/article_send\";i:4;s:14:\"setting/layout\";i:5;s:19:\"setting/layout_form\";i:6;s:15:\"setting/setting\";i:7;s:20:\"setting/setting_form\";i:8;s:19:\"setting/user_manage\";i:9;s:25:\"travel_info/alice_content\";i:10;s:22:\"travel_info/alice_list\";i:11;s:13:\"user/calendar\";i:12;s:18:\"user/image_manager\";i:13;s:16:\"user/inbox_inbox\";i:14;s:10:\"user/login\";i:15;s:15:\"user/login_lock\";i:16;s:8:\"user/sns\";i:17;s:16:\"user/user_center\";i:18;s:15:\"user/user_inbox\";i:19;s:14:\"user/user_page\";i:20;s:19:\"wechat/wechat_index\";i:21;s:4:\"home\";i:22;s:4:\"test\";}s:6:\"modify\";a:23:{i:0;s:14:\"about/about_us\";i:1;s:23:\"article/article_content\";i:2;s:20:\"article/article_list\";i:3;s:20:\"article/article_send\";i:4;s:14:\"setting/layout\";i:5;s:19:\"setting/layout_form\";i:6;s:15:\"setting/setting\";i:7;s:20:\"setting/setting_form\";i:8;s:19:\"setting/user_manage\";i:9;s:25:\"travel_info/alice_content\";i:10;s:22:\"travel_info/alice_list\";i:11;s:13:\"user/calendar\";i:12;s:18:\"user/image_manager\";i:13;s:16:\"user/inbox_inbox\";i:14;s:10:\"user/login\";i:15;s:15:\"user/login_lock\";i:16;s:8:\"user/sns\";i:17;s:16:\"user/user_center\";i:18;s:15:\"user/user_inbox\";i:19;s:14:\"user/user_page\";i:20;s:19:\"wechat/wechat_index\";i:21;s:4:\"home\";i:22;s:4:\"test\";}}');
INSERT INTO `user_info` VALUES ('3','','admin',NULL,'123@1.com',NULL,NULL,'e10adc3949ba59abbe56e057f20f883e','大李子','catalog/201511/8e9243947348ad3bd7dc1eff2d135552.gif','127.0.0.1','2015-11-04 20:36:21','1','Windows 7','Chrome44.0.2403.157','','1');
