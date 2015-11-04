<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
| -------------------------------------------------------------------
| USER AGENT TYPES
| -------------------------------------------------------------------
| This file contains four arrays of user agent data. It is used by the
| User Agent Class to help identify browser, platform, robot, and
| mobile device data. The array keys are used to identify the device
| and the array values are used to set the actual name of the item.
*/

$platforms = array(
	'windows nt 10.0'	=> 'Windows 10',
	'windows nt 6.3'	=> 'Windows 8.1',
	'windows nt 6.2'	=> 'Windows 8',
	'windows nt 6.1'	=> 'Windows 7',
	'windows nt 6.0'	=> 'Windows Vista',
	'windows nt 5.2'	=> 'Windows 2003',
	'windows nt 5.1'	=> 'Windows XP',
	'windows nt 5.0'	=> 'Windows 2000',
	'windows nt 4.0'	=> 'Windows NT 4.0',
	'winnt4.0'			=> 'Windows NT 4.0',
	'winnt 4.0'			=> 'Windows NT',
	'winnt'				=> 'Windows NT',
	'windows 98'		=> 'Windows 98',
	'win98'				=> 'Windows 98',
	'windows 95'		=> 'Windows 95',
	'win95'				=> 'Windows 95',
	'windows phone'			=> 'Windows Phone',
	'windows'			=> 'Unknown Windows OS',
	'android'			=> 'Android',
	'blackberry'		=> 'BlackBerry',
	'iphone'			=> 'iOS',
	'ipad'				=> 'iOS',
	'ipod'				=> 'iOS',
	'os x'				=> 'Mac OS X',
	'ppc mac'			=> 'Power PC Mac',
	'freebsd'			=> 'FreeBSD',
	'ppc'				=> 'Macintosh',
	'linux'				=> 'Linux',
	'debian'			=> 'Debian',
	'sunos'				=> 'Sun Solaris',
	'beos'				=> 'BeOS',
	'apachebench'		=> 'ApacheBench',
	'aix'				=> 'AIX',
	'irix'				=> 'Irix',
	'osf'				=> 'DEC OSF',
	'hp-ux'				=> 'HP-UX',
	'netbsd'			=> 'NetBSD',
	'bsdi'				=> 'BSDi',
	'openbsd'			=> 'OpenBSD',
	'gnu'				=> 'GNU/Linux',
	'unix'				=> 'Unknown Unix OS',
	'symbian' 			=> 'Symbian OS'
);


// The order of this array should NOT be changed. Many browsers return
// multiple browser types so we want to identify the sub-type first.
$browsers = array(
	'OPR'			=> 'Opera',
	'Flock'			=> 'Flock',
	'Chrome'		=> 'Chrome',
	// Opera 10+ always reports Opera/9.80 and appends Version/<real version> to the user agent string
	'Opera.*?Version'	=> 'Opera',
	'Opera'			=> 'Opera',
	'MSIE'			=> 'Internet Explorer',
	'Internet Explorer'	=> 'Internet Explorer',
	'Trident.* rv'	=> 'Internet Explorer',
	'Shiira'		=> 'Shiira',
	'Firefox'		=> 'Firefox',
	'Chimera'		=> 'Chimera',
	'Phoenix'		=> 'Phoenix',
	'Firebird'		=> 'Firebird',
	'Camino'		=> 'Camino',
	'Netscape'		=> 'Netscape',
	'OmniWeb'		=> 'OmniWeb',
	'Safari'		=> 'Safari',
	'Mozilla'		=> 'Mozilla',
	'Konqueror'		=> 'Konqueror',
	'icab'			=> 'iCab',
	'Lynx'			=> 'Lynx',
	'Links'			=> 'Links',
	'hotjava'		=> 'HotJava',
	'amaya'			=> 'Amaya',
	'IBrowse'		=> 'IBrowse',
	'Maxthon'		=> 'Maxthon',
	'Ubuntu'		=> 'Ubuntu Web Browser'
);

$mobiles = array(
	// legacy array, old values commented out
	'mobileexplorer'	=> 'Mobile Explorer',
//  'openwave'			=> 'Open Wave',
//	'opera mini'		=> 'Opera Mini',
//	'operamini'			=> 'Opera Mini',
//	'elaine'			=> 'Palm',
	'palmsource'		=> 'Palm',
//	'digital paths'		=> 'Palm',
//	'avantgo'			=> 'Avantgo',
//	'xiino'				=> 'Xiino',
	'palmscape'			=> 'Palmscape',
//	'nokia'				=> 'Nokia',
//	'ericsson'			=> 'Ericsson',
//	'blackberry'		=> 'BlackBerry',
//	'motorola'			=> 'Motorola'

	// Phones and Manufacturers
	'motorola'		=> 'Motorola',
	'nokia'			=> 'Nokia',
	'palm'			=> 'Palm',
	'iphone'		=> 'Apple iPhone',
	'ipad'			=> 'iPad',
	'ipod'			=> 'Apple iPod Touch',
	'sony'			=> 'Sony Ericsson',
	'ericsson'		=> 'Sony Ericsson',
	'blackberry'	=> 'BlackBerry',
	'cocoon'		=> 'O2 Cocoon',
	'blazer'		=> 'Treo',
	'lg'			=> 'LG',
	'amoi'			=> 'Amoi',
	'xda'			=> 'XDA',
	'mda'			=> 'MDA',
	'vario'			=> 'Vario',
	'htc'			=> 'HTC',
	'samsung'		=> 'Samsung',
	'sharp'			=> 'Sharp',
	'sie-'			=> 'Siemens',
	'alcatel'		=> 'Alcatel',
	'benq'			=> 'BenQ',
	'ipaq'			=> 'HP iPaq',
	'mot-'			=> 'Motorola',
	'playstation portable'	=> 'PlayStation Portable',
	'playstation 3'		=> 'PlayStation 3',
	'playstation vita'  	=> 'PlayStation Vita',
	'hiptop'		=> 'Danger Hiptop',
	'nec-'			=> 'NEC',
	'panasonic'		=> 'Panasonic',
	'philips'		=> 'Philips',
	'sagem'			=> 'Sagem',
	'sanyo'			=> 'Sanyo',
	'spv'			=> 'SPV',
	'zte'			=> 'ZTE',
	'sendo'			=> 'Sendo',
	'nintendo dsi'	=> 'Nintendo DSi',
	'nintendo ds'	=> 'Nintendo DS',
	'nintendo 3ds'	=> 'Nintendo 3DS',
	'wii'			=> 'Nintendo Wii',
	'open web'		=> 'Open Web',
	'openweb'		=> 'OpenWeb',

	// Operating Systems
	'android'		=> 'Android',
	'symbian'		=> 'Symbian',
	'SymbianOS'		=> 'SymbianOS',
	'elaine'		=> 'Palm',
	'series60'		=> 'Symbian S60',
	'windows ce'	=> 'Windows CE',

	// Browsers
	'obigo'			=> 'Obigo',
	'netfront'		=> 'Netfront Browser',
	'openwave'		=> 'Openwave Browser',
	'mobilexplorer'	=> 'Mobile Explorer',
	'operamini'		=> 'Opera Mini',
	'opera mini'	=> 'Opera Mini',
	'opera mobi'	=> 'Opera Mobile',
	'fennec'		=> 'Firefox Mobile',

	// Other
	'digital paths'	=> 'Digital Paths',
	'avantgo'		=> 'AvantGo',
	'xiino'			=> 'Xiino',
	'novarra'		=> 'Novarra Transcoder',
	'vodafone'		=> 'Vodafone',
	'docomo'		=> 'NTT DoCoMo',
	'o2'			=> 'O2',

	// Fallback
	'mobile'		=> 'Generic Mobile',
	'wireless'		=> 'Generic Mobile',
	'j2me'			=> 'Generic Mobile',
	'midp'			=> 'Generic Mobile',
	'cldc'			=> 'Generic Mobile',
	'up.link'		=> 'Generic Mobile',
	'up.browser'	=> 'Generic Mobile',
	'smartphone'	=> 'Generic Mobile',
	'cellphone'		=> 'Generic Mobile'
);

// There are hundreds of bots but these are the most common.
$robots = array(
	//百度
	'Baiduspider'				=>'百度抓取',
	'Baiduspider-image'			=>'百度图片抓取',
	'Baiduspider-video'			=>'百度视频抓取',
	'Baiduspider-news'			=>'百度新闻抓取',
	'Baiduspider-favo'			=>'百度搜藏抓取',
	'Baiduspider-cpro'			=>'百度联盟抓取',
	'Baiduspider-ads'			=>'百度商务抓取',

	//360
	'360Spider'					=>'360网页搜索',
	'HaoSouSpider'				=>'360网页搜索',
	'360Spider-Image'			=>'360图片搜索',
	'360Spider-Video'			=>'360视频搜索',
	
	'googlebot'					=>'谷歌抓取',
	'mediapartners-google'		=>'谷歌广告抓取',
	'msnbot'					=>'MSN',
	'yodaobot'					=>'有道yo',
	'yahoo! slurp;'				=>'雅虎',
	'yahoo! slurp china;'		=>'雅虎中国',
	'iaskspider'				=>'新浪我问抓取',
	'Sogou web spider/4.0'		=>'搜狗网页',
	'sogou push spider'			=>'搜狗推送',
	'youdaobot'					=>'有道you',
	'Sogou inst spider/4.0'		=>'搜狗inst',
	'sogou spider2'				=>'SOGOU',
	'sogou blog'				=>'SOGOU',
	'sogou news spider'			=>'SOGOU',
	'sogou orion spider'		=>'SOGOU',
	'jikespider'				=>'JIKE',
	'sosospider'				=>'SOSO',
	'pangusospider'				=>'PANGUSO',
	'yisouspider'				=>'YISOU',
	'easouspider'				=>'EASOU',
	'bingbot'					=>'BING',
	'haosouspider'				=>'HAOSOUSPIDER',
	// 'sitemapx'				=>'SITEMAPX',
	'exabot'					=>'EXABAT',
	'yandexbot'					=>'YANDEXBOT',
	'ahrefsbot'					=>'AHREFSBOT',
	'yisouspider'				=>'YISOUSPIDER',
	'easouspider'				=>'EASOUSPIDER',
	'jikespider'				=>'JIKESPIDER',
	'ia_archiver'				=>'IA_ARCHIVER',
	'etaospider'				=>'ETAOSPIDER',
	'ezooms'					=>'EZOOMS'
);
