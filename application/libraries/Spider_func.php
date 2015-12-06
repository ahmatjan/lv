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
	private $spider_url=array();//spider_url�������
	
	public function __construct() {
		$this->CI =& get_instance();//$this->CI���ÿ�ܷ���
		$this->CI->load->library(array('user_agent','session'));
		$this->CI->session->unset_userdata('spider_id');
		//$this->CI->session->unset_userdata('spider_base_url');
		$this->CI->load->helper('html');
		echo doctype('html4-trans').meta('Content-type', 'text/html;charset=utf-8', 'equiv');
	}
	
	//����URL�еĺ�������
	public function set_ignore($ignore_list){
		$this->check = $ignore_list;
	}
	//���ô��������Ͷ˿ڣ���someproxy��8080��10.1.1.1:8080
	public function set_proxy($host_port){
		$this->proxy = $host_port;
	}
	//����headerͷ
	public function set_header($g_header=''){
		if(empty($g_header)){
			$this->header = $header;
		}else{
			foreach($g_header as $g_k=>$g_v){
				$this->header[$k] = $g_header[$k];
			}
		}
		
	}
	
	//��֤ʹ��վ���ͼ����ַ�б�
	private function validate($url){
		$valid = true;
		//���URL���ų�set_ignore��������
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
	
	//���߳�����
	private function multi_curl($urls){
		// Ϊ���̴߳���
		$curl_handlers = array();
		
		//����curl ���߳�
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
			//���
			curl_setopt($curl, CURLOPT_FOLLOWLOCATION, TRUE);//�ض���
			curl_setopt($curl, CURLOPT_MAXREDIRS, 30);//������ض����������
			curl_setopt($curl,CURLOPT_HTTPPROXYTUNNEL,TRUE);
			curl_setopt($curl,CURLOPT_SSL_VERIFYPEER,FALSE);
			curl_setopt($curl,CURLOPT_SSL_VERIFYHOST,FALSE);
			curl_setopt($curl,CURLOPT_TIMEOUT,30);//��ʱ
			//���
			$curl_handlers[] = $curl;
		}
		//�������̴߳���
		$multi_curl_handler = curl_multi_init();
	
		// �����еĵ����������ദ����
		foreach($curl_handlers as $key => $curl)
		{
			curl_multi_add_handle($multi_curl_handler,$curl);
		}
		
		// ִ�жദ����
		do 
		{
			$multi_curl = curl_multi_exec($multi_curl_handler, $active);
		} 
		while ($multi_curl == CURLM_CALL_MULTI_PERFORM  || $active);
		
		foreach($curl_handlers as $curl)
		{
			//������
			(int)$http_code = curl_getinfo($curl,CURLINFO_HTTP_CODE);//����״̬��
			$loction_url = curl_getinfo($curl,CURLINFO_EFFECTIVE_URL);//�����ض�����url
			if(curl_errno($curl) == CURLE_OK && $http_code < (int)'400')
			{
				//���û�еõ����������
				$content = curl_multi_getcontent($curl);
				//��������
				$this->parse_content($content);
				$this->analysis_html($content,$loction_url);//����html���
				
				//�����ʾ��Ϣ
				if(isset($_SESSION['spider_id'])){
					$spider_id=$_SESSION['spider_id'];
					$this->CI->session->set_userdata('spider_id', $_SESSION['spider_id'] + '1');
				}else{
					$spider_id='1';
					$this->CI->session->set_userdata('spider_id', '2');
				}
				echo iconv("GB2312", "UTF-8",$spider_id.'�� ץȡ��'.$loction_url.'<br/>�ڴ棺<span style="color: red">' . round(memory_get_usage()/1024/1024,2).'M</span>&nbsp;HTTP״̬��'.$http_code.'<br/><br/>');
			
				//$this->spider_url[$_SESSION['spider_id']]['url']=$loction_url;//spider_url������
				//$this->spider_url[$_SESSION['spider_id']]['http_code'] = $http_code; //��֪��HTTPSTAT��Ŷ��
			}
		}
		curl_multi_close($multi_curl_handler);
		return true;
	}

	//��������
	public function get_links($domain){
		//��ȡ����URL��ַ
		$this->base = str_replace("http://", "", $domain);
		$this->base = str_replace("https://", "", $domain);
		$host = explode("/", $this->base);
		$this->base = $host[0];
		//$this->CI->session->set_userdata('spider_base_url', $this->base);
		//�õ��ʵ���������Э��
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
		//Ҫ��ʹ��curl��������
		$curl = curl_init();
		curl_setopt($curl, CURLOPT_URL, $this->domain);
		if (isset($this->proxy) && !$this->proxy == '') 
		{
			curl_setopt($curl, CURLOPT_PROXY, $this->proxy);
		}
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
		//���
		curl_setopt($curl, CURLOPT_FOLLOWLOCATION, TRUE);//�ض���
		curl_setopt($curl, CURLOPT_MAXREDIRS, 30);//������ض����������
		curl_setopt($curl,CURLOPT_HTTPPROXYTUNNEL,TRUE);
		curl_setopt($curl,CURLOPT_SSL_VERIFYPEER,FALSE);
		curl_setopt($curl,CURLOPT_SSL_VERIFYHOST,FALSE);
		curl_setopt($curl,CURLOPT_TIMEOUT,30);//��ʱ
		//���
		$page = curl_exec($curl);
		curl_close($curl);
		$this->parse_content($page);
		$this->unset_sitemap_urls();
	}
	
	//���������ݣ��������ַ
	private function parse_content($page){
		
		//�ӻ�õ�href���Ե���������
		preg_match_all("/<a[^>]*href\s*=\s*'([^']*)'|".
					'<a[^>]*href\s*=\s*"([^"]*)"'."/is", $page, $match);
		//�洢������
		$new_links = array();
		for($i = 1; $i < sizeof($match); $i++)
		{
			//ͨ��������ȡ
			foreach($match[$i] as $url)
			{
				//�������http��ͷ���Ҳ�Ϊ��
				if(strpos($url, "http") === false  && trim($url) !== "" && strpos($url, "#") === false)
				{
					//�������·�����
					if($url[0] == "/") $url = substr($url, 1);
					//������·�����
					else if($url[0] == ".")
					{
						while($url[0] != "/")
						{
							$url = substr($url, 1);
						}
						$url = substr($url, 1);
					}
					//ת��Ϊ����URL
					$url = $this->protocol.$this->base."/".$url;
				}
				//������µ����ӣ��Ҳ�Ϊ��
				if(!in_array($url, $this->sitemap_urls) && trim($url) !== "" && strpos($url, "#") === false)
				{
					//�������Ч��ַ
					if($this->validate($url))
					{
						//����Ƿ���URL�����ڸ���������
						if(strpos($url, "http://".$this->base) === 0 || strpos($url, "https://".$this->base) === 0)
						{
							//���URL������
							$this->sitemap_urls[] = $url;
							//���URL��������
							$new_links[] = $url;
						}
					}
				}
			}
		}
		//�����̴߳���
		$this->multi_curl($new_links);
		
		return true;
	}

	//������վ��ͼ��URL����
	public function get_array(){
		
		return $this->sitemap_urls;
	}
	
	//����$this->sitemap_urls
	private function unset_sitemap_urls(){
		if(count($this->sitemap_urls) > '500'){
			//$this->sitemap_urls = array();
			echo '����';
			unset($this->sitemap_urls);
		}
	}
	
	//����spider_url
	public function get_spider_url(){
		
		return $this->spider_url;
	}

	//֪ͨ������ȸ裬��Ӧ���Ż����ʶ��������վ��ͼ����
	public function ping($sitemap_url, $title ="", $siteurl = ""){
		// �������̴߳���
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
		//�ύurl�ĵ�ַ
		$urls[0] = "http://data.zz.baidu.com/urls?site=www.lvxingto.com&token=0FHSDjSQgZYfKdly&type=original";//�ٶ������ύ
		//$urls[0] = "http://www.google.com/webmasters/tools/ping?sitemap=".urlencode($sitemap_url);
		//$urls[1] = "http://www.bing.com/webmaster/ping.aspx?siteMap=".urlencode($sitemap_url);
		//$urls[2] = "http://search.yahooapis.com/SiteExplorerService/V1/updateNotification". "?appid=YahooDemo&url=".urlencode($sitemap_url);
		//$urls[3] = "http://submissions.ask.com/ping?sitemap=".urlencode($sitemap_url);
		//$urls[4] = "http://rpc.weblogs.com/pingSiteForm?name=".urlencode($title). "&url=".urlencode($siteurl)."&changesURL=".urlencode($sitemap_url);
	
		//���ö��߳�
		foreach ($urls as $url) 
		{
			$curl = curl_init();
			curl_setopt($curl, CURLOPT_URL, $url);
			curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
			curl_setopt($curl, CURL_HTTP_VERSION_1_1, 1);
			$curl_handlers[] = $curl;
		}
		//�������߳�
		$multi_curl_handler = curl_multi_init();
	
		// �����еĵ����������ദ����
		foreach($curl_handlers as $key => $curl)
		{
			curl_multi_add_handle($multi_curl_handler,$curl);
		}
		
		// ��ִ�жദ����
		do 
		{
			$multi_curl = curl_multi_exec($multi_curl_handler, $active);
		} 
		while ($multi_curl == CURLM_CALL_MULTI_PERFORM  || $active);
		
		// ����Ƿ����κδ���
		$submitted = true;
		foreach($curl_handlers as $key => $curl)
		{
			//������ʹ��curl_multi_getcontent��$curl��;��ȡ����
			//and curl_error($curl); ��ȡ����
			if(curl_errno($curl) != CURLE_OK)
			{
				$submitted = false;
			}
		}
		curl_multi_close($multi_curl_handler);
		return $submitted;
	}
	
	//������վ��ͼ
	public function generate_sitemap(){
		$sitemap = new SimpleXMLElement('<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9"></urlset>');
        foreach($this->sitemap_urls as $url) 
		{
            $url_tag = $sitemap->addChild("url");
            $url_tag->addChild("loc", htmlspecialchars($url));
		}
		return $sitemap->asXML();
	}
	
	//��ȡhtml�ؼ���
	private function analysis_html ($page,$loction_url){
		//echo iconv("GB2312", "UTF-8",'����ץȡ����');
		//echo md5($page);
		phpQuery::newDocument($page);
		phpQuery::$documents = array();//������飬�ͷ��ڴ�
	}
}
?>