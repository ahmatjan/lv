<?php

defined('BASEPATH') OR exit('No direct script access allowed');
/************************************************************* 

**************************************************************/
require_once "phpQuery/phpQuery.php";

class Spider_func
{
	private $sitemap_urls = array();
	private $base;
	private $protocol;
	private $domain;
	private $check = array();
	private $proxy = "";
	private $header = array('User-Agent: Mozilla/5.0 (Windows NT 6.1; xCalder/1.0.0; +http://www.lvxingto.com/search/spider.html)');
	private $url_feedback='';
	private $spider_url=array();//spider_url表的数组
	
	public function __construct() {
		$this->CI =& get_instance();//$this->CI调用框架方法
		$this->CI->load->library(array('user_agent','session'));
		$this->CI->session->unset_userdata('spider_id');
		//$this->CI->session->unset_userdata('spider_base_url');
		$this->CI->load->helper('html');
		echo doctype('html4-trans').meta('Content-type', 'text/html;charset=utf-8', 'equiv');
	}
	
	//设置URL中的忽略类型
	public function set_ignore($ignore_list){
		$this->check = $ignore_list;
	}
	//设置代理主机和端口（如someproxy：8080或10.1.1.1:8080
	public function set_proxy($host_port){
		$this->proxy = $host_port;
	}
	//设置header头
	public function set_header($g_header=''){
		if(empty($g_header)){
			$this->header = $header;
		}else{
			foreach($g_header as $g_k=>$g_v){
				$this->header[$k] = $g_header[$k];
			}
		}
		
	}
	
	//验证使用站点地图的网址列表
	private function validate($url){
		$valid = true;
		//添加URL，排除set_ignore（）设置
		foreach($this->check as $val)
		{
			if(stripos($url, $val) !== false)
			{
				$valid = false;
				break;
			}
		}
		return $valid;
	}
	
	//多线程请求
	private function multi_curl($urls){
		// 为多线程处理
		$curl_handlers = array();
		
		//设置curl 多线程
		foreach ($urls as $url_k=>$url_v)
		//foreach ($urls as $url)
		{
			$curl = curl_init();
			curl_setopt($curl, CURLOPT_URL, $urls[$url_k]);
			//curl_setopt($curl, CURLOPT_URL, $url);
			curl_setopt($curl, CURLOPT_HTTPHEADER, $this->header);
			curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
			if (isset($this->proxy) && !$this->proxy == '') 
			{
				curl_setopt($curl, CURLOPT_PROXY, $this->proxy);
			}
			//后加
			curl_setopt($curl, CURLOPT_FOLLOWLOCATION, TRUE);//重定向
			curl_setopt($curl, CURLOPT_MAXREDIRS, 30);//允许的重定向最大数量
			curl_setopt($curl,CURLOPT_HTTPPROXYTUNNEL,TRUE);
			curl_setopt($curl,CURLOPT_SSL_VERIFYPEER,FALSE);
			curl_setopt($curl,CURLOPT_SSL_VERIFYHOST,FALSE);
			curl_setopt($curl,CURLOPT_TIMEOUT,30);//超时
			//后加
			$curl_handlers[] = $curl;
		}
		//启动多线程处理
		$multi_curl_handler = curl_multi_init();
	
		// 将所有的单处理器到多处理器
		foreach($curl_handlers as $key => $curl)
		{
			curl_multi_add_handle($multi_curl_handler,$curl);
		}
		
		// 执行多处理器
		do 
		{
			$multi_curl = curl_multi_exec($multi_curl_handler, $active);
		} 
		while ($multi_curl == CURLM_CALL_MULTI_PERFORM  || $active);
		
		foreach($curl_handlers as $curl)
		{
			//检查错误
			(int)$http_code = curl_getinfo($curl,CURLINFO_HTTP_CODE);//返回状态码
			$loction_url = curl_getinfo($curl,CURLINFO_EFFECTIVE_URL);//返回重定向后的url
			if(curl_errno($curl) == CURLE_OK && $http_code < (int)'400')
			{
				//如果没有得到错误的内容
				$content = curl_multi_getcontent($curl);
				//解析内容
				$this->parse_content($content);
				$this->analysis_html($content,$loction_url);//解析html入库
				
				//输出提示信息
				if(isset($_SESSION['spider_id'])){
					$spider_id=$_SESSION['spider_id'];
					$this->CI->session->set_userdata('spider_id', $_SESSION['spider_id'] + '1');
				}else{
					$spider_id='1';
					$this->CI->session->set_userdata('spider_id', '2');
				}
				echo iconv("GB2312", "UTF-8",$spider_id.'、 抓取：'.$loction_url.'<br/>内存：<span style="color: red">' . round(memory_get_usage()/1024/1024,2).'M</span>&nbsp;HTTP状态码'.$http_code.'<br/><br/>');
			
				//$this->spider_url[$_SESSION['spider_id']]['url']=$loction_url;//spider_url表数组
				//$this->spider_url[$_SESSION['spider_id']]['http_code'] = $http_code; //我知道HTTPSTAT码哦～
			}
		}
		curl_multi_close($multi_curl_handler);
		return true;
	}

	//函数调用
	public function get_links($domain){
		//获取域名URL地址
		$this->base = str_replace("http://", "", $domain);
		$this->base = str_replace("https://", "", $domain);
		$host = explode("/", $this->base);
		$this->base = $host[0];
		//$this->CI->session->set_userdata('spider_base_url', $this->base);
		//得到适当的域名和协议
		$this->domain = trim($domain);
		if(strpos($this->domain, "http") !== 0)
		{
			$this->protocol = "http://";
			$this->domain = $this->protocol.$this->domain;
		}
		elseif(strpos($this->domain, "https") !== 0)
		{
			$this->protocol = "https://";
			$this->domain = $this->protocol.$this->domain;
		}
		else
		{
			$protocol = explode("//", $domain);
			$this->protocol = $protocol[0]."//";
		}
		
		if(!in_array($this->domain, $this->sitemap_urls))
		{
			$this->sitemap_urls[] = $this->domain;
		}
		//要求使用curl链接内容
		$curl = curl_init();
		curl_setopt($curl, CURLOPT_URL, $this->domain);
		if (isset($this->proxy) && !$this->proxy == '') 
		{
			curl_setopt($curl, CURLOPT_PROXY, $this->proxy);
		}
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
		//后加
		curl_setopt($curl, CURLOPT_FOLLOWLOCATION, TRUE);//重定向
		curl_setopt($curl, CURLOPT_MAXREDIRS, 30);//允许的重定向最大数量
		curl_setopt($curl,CURLOPT_HTTPPROXYTUNNEL,TRUE);
		curl_setopt($curl,CURLOPT_SSL_VERIFYPEER,FALSE);
		curl_setopt($curl,CURLOPT_SSL_VERIFYHOST,FALSE);
		curl_setopt($curl,CURLOPT_TIMEOUT,30);//超时
		//后加
		$page = curl_exec($curl);
		curl_close($curl);
		$this->parse_content($page);
		$this->unset_sitemap_urls();
	}
	
	//分析的内容，并检查网址
	private function parse_content($page){
		
		//从获得的href属性的所有链接
		preg_match_all("/<a[^>]*href\s*=\s*'([^']*)'|".
					'<a[^>]*href\s*=\s*"([^"]*)"'."/is", $page, $match);
		//存储新链接
		$new_links = array();
		for($i = 1; $i < sizeof($match); $i++)
		{
			//通过链接爬取
			foreach($match[$i] as $url)
			{
				//如果不以http开头并且不为空
				if(strpos($url, "http") === false  && trim($url) !== "" && strpos($url, "#") === false)
				{
					//如果绝对路径检查
					if($url[0] == "/") $url = substr($url, 1);
					//如果相对路径检查
					else if($url[0] == ".")
					{
						while($url[0] != "/")
						{
							$url = substr($url, 1);
						}
						$url = substr($url, 1);
					}
					//转化为绝对URL
					$url = $this->protocol.$this->base."/".$url;
				}
				//如果是新的链接，且不为空
				if(!in_array($url, $this->sitemap_urls) && trim($url) !== "" && strpos($url, "#") === false)
				{
					//如果是有效网址
					if($this->validate($url))
					{
						//检查是否是URL并且在给定域名下
						if(strpos($url, "http://".$this->base) === 0 || strpos($url, "https://".$this->base) === 0)
						{
							//添加URL到数组
							$this->sitemap_urls[] = $url;
							//添加URL到新数组
							$new_links[] = $url;
						}
					}
				}
			}
		}
		//调多线程处理
		$this->multi_curl($new_links);
		
		return true;
	}

	//返回网站地图的URL数组
	public function get_array(){
		
		return $this->sitemap_urls;
	}
	
	//重置$this->sitemap_urls
	private function unset_sitemap_urls(){
		if(count($this->sitemap_urls) > '500'){
			//$this->sitemap_urls = array();
			echo '重置';
			unset($this->sitemap_urls);
		}
	}
	
	//返回spider_url
	public function get_spider_url(){
		
		return $this->spider_url;
	}

	//通知服务，如谷歌，必应，雅虎，问而且你的网站地图更新
	public function ping($sitemap_url, $title ="", $siteurl = ""){
		// 开启多线程处理
		$curl_handlers = array();
		
		$sitemap_url = trim($sitemap_url);
		if(strpos($sitemap_url, "http") !== 0)
		{
			$sitemap_url = "http://".$sitemap_url;
		}
		$site = explode("//", $sitemap_url);
		$start = $site[0];
		$site = explode("/", $site[1]);
		$middle = $site[0];
		if(trim($title) == "")
		{
			$title = $middle;
		}
		if(trim($siteurl) == "")
		{
			$siteurl = $start."//".$middle;
		}
		//提交url的地址
		$urls[0] = "http://data.zz.baidu.com/urls?site=www.lvxingto.com&token=0FHSDjSQgZYfKdly&type=original";//百度链接提交
		//$urls[0] = "http://www.google.com/webmasters/tools/ping?sitemap=".urlencode($sitemap_url);
		//$urls[1] = "http://www.bing.com/webmaster/ping.aspx?siteMap=".urlencode($sitemap_url);
		//$urls[2] = "http://search.yahooapis.com/SiteExplorerService/V1/updateNotification". "?appid=YahooDemo&url=".urlencode($sitemap_url);
		//$urls[3] = "http://submissions.ask.com/ping?sitemap=".urlencode($sitemap_url);
		//$urls[4] = "http://rpc.weblogs.com/pingSiteForm?name=".urlencode($title). "&url=".urlencode($siteurl)."&changesURL=".urlencode($sitemap_url);
	
		//设置多线程
		foreach ($urls as $url) 
		{
			$curl = curl_init();
			curl_setopt($curl, CURLOPT_URL, $url);
			curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
			curl_setopt($curl, CURL_HTTP_VERSION_1_1, 1);
			$curl_handlers[] = $curl;
		}
		//启动多线程
		$multi_curl_handler = curl_multi_init();
	
		// 将所有的单处理器到多处理器
		foreach($curl_handlers as $key => $curl)
		{
			curl_multi_add_handle($multi_curl_handler,$curl);
		}
		
		// 在执行多处理器
		do 
		{
			$multi_curl = curl_multi_exec($multi_curl_handler, $active);
		} 
		while ($multi_curl == CURLM_CALL_MULTI_PERFORM  || $active);
		
		// 检查是否有任何错误
		$submitted = true;
		foreach($curl_handlers as $key => $curl)
		{
			//您可以使用curl_multi_getcontent（$curl）;获取内容
			//and curl_error($curl); 获取错误
			if(curl_errno($curl) != CURLE_OK)
			{
				$submitted = false;
			}
		}
		curl_multi_close($multi_curl_handler);
		return $submitted;
	}
	
	//生成网站地图
	public function generate_sitemap(){
		$sitemap = new SimpleXMLElement('<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9"></urlset>');
        foreach($this->sitemap_urls as $url) 
		{
            $url_tag = $sitemap->addChild("url");
            $url_tag->addChild("loc", htmlspecialchars($url));
		}
		return $sitemap->asXML();
	}
	
	//提取html关键词
	private function analysis_html ($page,$loction_url){
		//echo iconv("GB2312", "UTF-8",'正在抓取内容');
		//echo md5($page);
		phpQuery::newDocument($page);
		phpQuery::$documents = array();//清空数组，释放内存
	}
}
?>