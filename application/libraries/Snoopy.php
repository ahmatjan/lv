<?php

/*************************************************
�÷�˵��
$snoopy->fetch($url);        //��ȡ��������

echo $snoopy->results;       //��ʾ���

$snoopy->fetchtext($url);        //��ȡ�ı����ݱ�����������fetch()��Ψһ��ͬ�ľ��Ǳ�������ȥ��HTML��ǩ���������޹����ݣ�ֻ������ҳ�е��������ݡ�

fetchform($URI)������������fetch()��Ψһ��ͬ�ľ��Ǳ�������ȥ��HTML��ǩ���������޹����ݣ�ֻ������ҳ�б�����(form)

fetchlinks($URI)������������fetch()��Ψһ��ͬ�ľ��Ǳ�������ȥ��HTML��ǩ���������޹����ݣ�ֻ������ҳ������(link)��Ĭ������£�������ӽ��Զ���ȫ��ת����������URL��

submit($URI,$formvars)��������$URLָ�������ӵ�ַ����ȷ�ϱ���$formvars��һ���洢������������

submittext($URI,$formvars)������������submit()��Ψһ��ͬ�ľ��Ǳ�������ȥ��HTML��ǩ���������޹����ݣ�ֻ���ص�½����ҳ�е���������

submitlinks($URI)������������submit()��Ψһ��ͬ�ľ��Ǳ�������ȥ��HTML��ǩ���������޹����ݣ�ֻ������ҳ������(link)��Ĭ������£�������ӽ��Զ���ȫ��ת����������URL��

������ (ȱʡֵ��������)

$host ���ӵ�����
$port ���ӵĶ˿�
$proxy_host ʹ�õĴ�������������еĻ�
$proxy_port ʹ�õĴ��������˿ڣ�����еĻ�
$agent �û�����αװ (Snoopy v0.1)
$referer ��·��Ϣ������еĻ�
$cookies cookies�� ����еĻ�
$rawheaders ������ͷ��Ϣ, ����еĻ�
$maxredirs ����ض�������� 0=������ (5)
$offsiteok whether or not to allow redirects off-site. (true)
$expandlinks �Ƿ����Ӷ���ȫΪ������ַ (true)
$user ��֤�û���, ����еĻ�
$pass ��֤�û���, ����еĻ�
$accept http �������� (image/gif, image/x-xbitmap, image/jpeg, image/pjpeg, */ /*)
$error ���ﱨ��, ����еĻ�
$response_code �ӷ��������ص���Ӧ����
$headers �ӷ��������ص�ͷ��Ϣ
$maxlength ��������ݳ���
$read_timeout ��ȡ������ʱ (requires PHP 4 Beta 4+)������Ϊ0Ϊû�г�ʱ
$timed_out ���һ�ζ�ȡ������ʱ�ˣ������Է��� true (requires PHP 4 Beta 4+)
$maxframes ����׷�ٵĿ���������
$status ץȡ��http��״̬
$temp_dir ��ҳ�������ܹ�д�����ʱ�ļ�Ŀ¼ (/tmp)
$curl_path cURL binary ��Ŀ¼, ���û��cURL binary������Ϊ false


$str=preg_replace("/\s+/", " ", $str); //���˶���س�
$str=preg_replace("/<[ ]+/si","<",$str); //����<__("<"�ź�����ո�)
$str=preg_replace("/<\!�C.*?�C>/si","",$str); //ע��
$str=preg_replace("/<(\!.*?)>/si","",$str); //����DOCTYPE
$str=preg_replace("/<(\/?html.*?)>/si","",$str); //����html��ǩ
$str=preg_replace("/<(\/?br.*?)>/si","",$str); //����br��ǩ
$str=preg_replace("/<(\/?head.*?)>/si","",$str); //����head��ǩ
$str=preg_replace("/<(\/?meta.*?)>/si","",$str); //����meta��ǩ
$str=preg_replace("/<(\/?body.*?)>/si","",$str); //����body��ǩ
$str=preg_replace("/<(\/?link.*?)>/si","",$str); //����link��ǩ
$str=preg_replace("/<(\/?form.*?)>/si","",$str); //����form��ǩ
$str=preg_replace("/cookie/si","COOKIE",$str); //����COOKIE��ǩ
$str=preg_replace("/<(applet.*?)>(.*?)<(\/applet.*?)>/si","",$str); //����applet��ǩ
$str=preg_replace("/<(\/?applet.*?)>/si","",$str); //����applet��ǩ
$str=preg_replace("/<(style.*?)>(.*?)<(\/style.*?)>/si","",$str); //����style��ǩ
$str=preg_replace("/<(\/?style.*?)>/si","",$str); //����style��ǩ
$str=preg_replace("/<(title.*?)>(.*?)<(\/title.*?)>/si","",$str); //����title��ǩ
$str=preg_replace("/<(\/?title.*?)>/si","",$str); //����title��ǩ
$str=preg_replace("/<(object.*?)>(.*?)<(\/object.*?)>/si","",$str); //����object��ǩ
$str=preg_replace("/<(\/?objec.*?)>/si","",$str); //����object��ǩ
$str=preg_replace("/<(noframes.*?)>(.*?)<(\/noframes.*?)>/si","",$str); //����noframes��ǩ
$str=preg_replace("/<(\/?noframes.*?)>/si","",$str); //����noframes��ǩ
$str=preg_replace("/<(i?frame.*?)>(.*?)<(\/i?frame.*?)>/si","",$str); //����frame��ǩ
$str=preg_replace("/<(\/?i?frame.*?)>/si","",$str); //����frame��ǩ
$str=preg_replace("/<(script.*?)>(.*?)<(\/script.*?)>/si","",$str); //����script��ǩ
$str=preg_replace("/<(\/?script.*?)>/si","",$str); //����script��ǩ
$str=preg_replace("/javascript/si","Javascript",$str); //����script��ǩ
$str=preg_replace("/vbscript/si","Vbscript",$str); //����script��ǩ
$str=preg_replace("/on([a-z]+)\s*=/si","On\\1=",$str); //����script��ǩ
$str=preg_replace("/&#/si","&��",$str); //����script��ǩ��


Demo
include "Snoopy.class.php";
$snoopy = new Snoopy;
$snoopy->proxy_host = "http://www.nowamagic.net/librarys/veda/";
$snoopy->proxy_port = "80";
$snoopy->agent = "(compatible; MSIE 4.01; MSN 2.5; AOL 4.0; Windows 98)";
$snoopy->referer = "http://www.4wei.cn";
$snoopy->cookies["SessionID"] = 238472834723489l;
$snoopy->cookies["favoriteColor"] = "RED";
$snoopy->rawheaders["Pragma"] = "no-cache";
$snoopy->maxredirs = 2;
$snoopy->offsiteok = false;
$snoopy->expandlinks = false;
$snoopy->user = "joe";
$snoopy->pass = "bloe";
if($snoopy->fetchtext("http://www.4wei.cn"))
{
echo "<PRE>".htmlspecialchars($snoopy->results)."</PRE>n";
}
else
echo "error fetching document: ".$snoopy->error."n";
��ȡָ��url���ݣ�
<?
$url = "http://www.nowamagic.net/librarys/veda/";
include("snoopy.php");
$snoopy = new Snoopy;
$snoopy->fetch($url); //��ȡ��������
echo $snoopy->results; //��ʾ���
//��ѡ����
//$snoopy->fetchtext //��ȡ�ı����ݣ�ȥ��html����
//$snoopy->fetchlinks //��ȡ����
//$snoopy->fetchform  //��ȡ��
?>
���ύ��
<?php
$formvars["username"] = "admin";
$formvars["pwd"] = "admin";
$action = "http://www.nowamagic.net/librarys/veda/";//���ύ��ַ
$snoopy->submit($action,$formvars);//$formvarsΪ�ύ������
echo $snoopy->results; //��ȡ���ύ��� ���صĽ��
//��ѡ����
$snoopy->submittext; //�ύ��ֻ���� ȥ��html�� �ı�
$snoopy->submitlinks;//�ύ��ֻ���� ����
?>
��Ȼ�Ѿ��ύ�ı����ǾͿ������ܶ����顣������������αװip��αװ�������

<?php
$formvars["username"] = "admin";
$formvars["pwd"] = "admin";
$action = "http://www.4wei.cn";
include "snoopy.php";
$snoopy = new Snoopy;
$snoopy->cookies["PHPSESSID"] = 'fc106b1918bd522cc863f36890e6fff7'; //αװsessionid
$snoopy->agent = "(compatible; MSIE 4.01; MSN 2.5; AOL 4.0; Windows 98)"; //αװ�����
$snoopy->referer = http://www.4wei.cn; //αװ��Դҳ��ַ http_referer
$snoopy->rawheaders["Pragma"] = "no-cache"; //cache ��httpͷ��Ϣ
$snoopy->rawheaders["X_FORWARDED_FOR"] = "127.0.0.101"; //αװip
$snoopy->submit($action,$formvars);
echo $snoopy->results;
?>
ԭ�����ǿ���αװsession αװ����� ��αװip�� haha �������ܶ������ˡ����� ����֤�룬��֤ip ͶƱ�� ���Բ�ͣ��Ͷ��

ps:����αװip ����ʵ��αװhttpͷ������һ���ͨ�� REMOTE_ADDR ��ȡ��ip��αװ���ˣ�������Щͨ��httpͷ����ȡip��(���Է�ֹ���������) �Ϳ����Լ�������ip��

���������֤�� ����˵�£���������ͨ��������� �鿴ҳ�� �� �ҵ���֤������Ӧ��sessionid��ͬʱ����sessionid����֤��ֵ������������snoopyȥα�� ��

ԭ��������ͬһ��sessionid ����ȡ�õ���֤��͵�һ���������һ���ġ�

��ʱ���ǿ�����Ҫα�����Ķ�����snoopy��ȫΪ�����뵽�ˣ�

<?php
$snoopy->proxy_host = "http://www.nowamagic.net/librarys/veda/";
$snoopy->proxy_port = "8080"; //ʹ�ô���
$snoopy->maxredirs = 2; //�ض������
$snoopy->expandlinks = true; //�Ƿ�ȫ���� �ڲɼ���ʱ�򾭳��õ�
// ��������Ϊ /images/taoav.gif �ɸ�Ϊ����ȫ���� <a href="http://www.4wei.cn/images/taoav.gif">http://www.4wei.cn/images/taoav.gif</a>
$snoopy->maxframes = 5 //������������
//ע��ץȡ��ܵ�ʱ�� $snoopy->results ���ص���һ������
$snoopy->error //���ر�����Ϣ
?>
�Ƚ�������ʾ����

* You need the snoopy.class.php from
* http://snoopy.sourceforge.net/
include("snoopy.class.php");
$snoopy = new Snoopy;
// need an proxy?:
//$snoopy->proxy_host = "my.proxy.host";
//$snoopy->proxy_port = "8080";
// set browser and referer:
$snoopy->agent = "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1)";
$snoopy->referer = "http://www.jonasjohn.de/";
// set some cookies:
$snoopy->cookies["SessionID"] = '238472834723489';
$snoopy->cookies["favoriteColor"] = "blue";

// set an raw-header:
$snoopy->rawheaders["Pragma"] = "no-cache";
// set some internal variables:
$snoopy->maxredirs = 2;
$snoopy->offsiteok = false;
$snoopy->expandlinks = false;
// set username and password (optional)
//$snoopy->user = "joe";
//$snoopy->pass = "bloe";
// fetch the text of the website www.google.com:
if($snoopy->fetchtext("http://www.google.com")){
// other methods: fetch, fetchform, fetchlinks, submittext and submitlinks
// response code:
    print "response code: ".$snoopy->response_code."<br/>n";
    // print the headers:
    print "<b>Headers:</b><br/>";
    while(list($key,$val) = each($snoopy->headers)){
        print $key.": ".$val."<br/>n";
    }
    print "<br/>n";
    // print the texts of the website:
    print htmlspecialchars($snoopy->results)."n";
}
else {
    print "Snoopy: error while fetching document: ".$snoopy->error."n";
}
��Snoopy�����һ���򵥵�ͼƬ�ɼ���

view sourceprint?
<meta http-equiv='content-type' content='text/html;charset=utf-8'>
<?php
include 'Snoopy.class.php';   //����Snoopy��
$snoopy = new Snoopy();       //ʵ����һ������
$sourceURL = "http://www.nowamagic.net/librarys/veda/";    //Ҫץȡ����ҳ
$snoopy->fetchlinks($sourceURL);        //�����ҳ������
$a = $snoopy->results;     //�õ���ҳ���ӵĽ��
$re = "/d+.html$/";     //ƥ�������
//���˻�ȡָ�����ļ���ַ����
foreach ($a as $tmp) {
    if (preg_match($re, $tmp)) {
        $aa=$tmp;
    }
}
getImgURL($aa);
function getImgURL($siteName)
{
    $snoopy = new Snoopy();
    $snoopy->fetch($siteName);
    $fileContent = $snoopy->results;    //��ȡ���˺��ҳ�������
    //ƥ��ͼƬ��������ʽ
    $reTag = "/<img[^s]+src="(http://[^"]+).(jpg|png|gif|jpeg)"[^/]*//*>/i";
    if (preg_match($reTag, $fileContent)) {
        //����ͼƬ
        $ret = preg_match_all($reTag, $fileContent, $matchResult);
        for ($i = 0, $len = count($matchResult[1]); $i < $len; ++$i)
        {
            saveImgURL($matchResult[1][$i], $matchResult[2][$i]);
        }
    }
}       
function saveImgURL($name, $suffix) {
    $url = $name.".".$suffix;
    echo "�����ͼƬ��ַ��".$url."<br/>";
    $imgSavePath = "E:/123/images/";  //ͼƬ�����ַ
    $imgId =mt_rand(); //����һ��������ļ���
    if ($suffix == "gif") {
        //����ͼƬ���ͣ����벻ͬ���ļ�������
        $imgSavePath .= "emotion";
    }
    else
    {
        $imgSavePath .= "topic";
    }
    $imgSavePath .= ("/".$imgId.".".$suffix);  //��װҪ������ļ���
    if (is_file($imgSavePath)) {
        //�ж��ļ����Ƿ���ڣ�������ɾ��
        unlink($imgSavePath);
        echo "<p style='color:#f00;'>�ļ�".$imgSavePath."�Ѵ��ڣ�����ɾ��</p>";
    }
    $imgFile = file_get_contents($url); //��ȡ�����ļ�
    $flag = file_put_contents($imgSavePath,$imgFile);   //д�뵽����
    if ($flag) {
        echo "<p>�ļ�".$imgSavePath."����ɹ�</p>";
    }
}
?>


*************************************************/

class Snoopy
{
	/**** Public variables ****/
	
	/* user definable vars */

	var $host			=	"www.php.net";		// host name we are connecting to
	var $port			=	80;					// port we are connecting to
	var $proxy_host		=	"";					// proxy host to use
	var $proxy_port		=	"";					// proxy port to use
	var $proxy_user		=	"";					// proxy user to use
	var $proxy_pass		=	"";					// proxy password to use
	
	var $agent			=	"Snoopy v1.2.4";	// agent we masquerade as
	var	$referer		=	"";					// referer info to pass
	var $cookies		=	array();			// array of cookies to pass
												// $cookies["username"]="joe";
	var	$rawheaders		=	array();			// array of raw headers to send
												// $rawheaders["Content-type"]="text/html";

	var $maxredirs		=	5;					// http redirection depth maximum. 0 = disallow
	var $lastredirectaddr	=	"";				// contains address of last redirected address
	var	$offsiteok		=	true;				// allows redirection off-site
	var $maxframes		=	0;					// frame content depth maximum. 0 = disallow
	var $expandlinks	=	true;				// expand links to fully qualified URLs.
												// this only applies to fetchlinks()
												// submitlinks(), and submittext()
	var $passcookies	=	true;				// pass set cookies back through redirects
												// NOTE: this currently does not respect
												// dates, domains or paths.
	
	var	$user			=	"";					// user for http authentication
	var	$pass			=	"";					// password for http authentication
	
	// http accept types
	var $accept			=	"image/gif, image/x-xbitmap, image/jpeg, image/pjpeg, */*";
	
	var $results		=	"";					// where the content is put
		
	var $error			=	"";					// error messages sent here
	var	$response_code	=	"";					// response code returned from server
	var	$headers		=	array();			// headers returned from server sent here
	var	$maxlength		=	500000;				// max return data length (body)
	var $read_timeout	=	0;					// timeout on read operations, in seconds
												// supported only since PHP 4 Beta 4
												// set to 0 to disallow timeouts
	var $timed_out		=	false;				// if a read operation timed out
	var	$status			=	0;					// http request status

	var $temp_dir		=	"/tmp";				// temporary directory that the webserver
												// has permission to write to.
												// under Windows, this should be C:\temp

	var	$curl_path		=	"/usr/local/bin/curl";
												// Snoopy will use cURL for fetching
												// SSL content if a full system path to
												// the cURL binary is supplied here.
												// set to false if you do not have
												// cURL installed. See http://curl.haxx.se
												// for details on installing cURL.
												// Snoopy does *not* use the cURL
												// library functions built into php,
												// as these functions are not stable
												// as of this Snoopy release.
	
	/**** Private variables ****/	
	
	var	$_maxlinelen	=	4096;				// max line length (headers)
	
	var $_httpmethod	=	"GET";				// default http request method
	var $_httpversion	=	"HTTP/1.0";			// default http request version
	var $_submit_method	=	"POST";				// default submit method
	var $_submit_type	=	"application/x-www-form-urlencoded";	// default submit type
	var $_mime_boundary	=   "";					// MIME boundary for multipart/form-data submit type
	var $_redirectaddr	=	false;				// will be set if page fetched is a redirect
	var $_redirectdepth	=	0;					// increments on an http redirect
	var $_frameurls		= 	array();			// frame src urls
	var $_framedepth	=	0;					// increments on frame depth
	
	var $_isproxy		=	false;				// set if using a proxy server
	var $_fp_timeout	=	30;					// timeout for socket connection

/*======================================================================*\
	Function:	fetch
	Purpose:	fetch the contents of a web page
				(and possibly other protocols in the
				future like ftp, nntp, gopher, etc.)
	Input:		$URI	the location of the page to fetch
	Output:		$this->results	the output text from the fetch
\*======================================================================*/

	public function fetch($URI)
	{
	
		//preg_match("|^([^:]+)://([^:/]+)(:[\d]+)*(.*)|",$URI,$URI_PARTS);
		$URI_PARTS = parse_url($URI);
		if (!empty($URI_PARTS["user"]))
			$this->user = $URI_PARTS["user"];
		if (!empty($URI_PARTS["pass"]))
			$this->pass = $URI_PARTS["pass"];
		if (empty($URI_PARTS["query"]))
			$URI_PARTS["query"] = '';
		if (empty($URI_PARTS["path"]))
			$URI_PARTS["path"] = '';
				
		switch(strtolower($URI_PARTS["scheme"]))
		{
			case "http":
				$this->host = $URI_PARTS["host"];
				if(!empty($URI_PARTS["port"]))
					$this->port = $URI_PARTS["port"];
				if($this->_connect($fp))
				{
					if($this->_isproxy)
					{
						// using proxy, send entire URI
						$this->_httprequest($URI,$fp,$URI,$this->_httpmethod);
					}
					else
					{
						$path = $URI_PARTS["path"].($URI_PARTS["query"] ? "?".$URI_PARTS["query"] : "");
						// no proxy, send only the path
						$this->_httprequest($path, $fp, $URI, $this->_httpmethod);
					}
					
					$this->_disconnect($fp);

					if($this->_redirectaddr)
					{
						/* url was redirected, check if we've hit the max depth */
						if($this->maxredirs > $this->_redirectdepth)
						{
							// only follow redirect if it's on this site, or offsiteok is true
							if(preg_match("|^http://".preg_quote($this->host)."|i",$this->_redirectaddr) || $this->offsiteok)
							{
								/* follow the redirect */
								$this->_redirectdepth++;
								$this->lastredirectaddr=$this->_redirectaddr;
								$this->fetch($this->_redirectaddr);
							}
						}
					}

					if($this->_framedepth < $this->maxframes && count($this->_frameurls) > 0)
					{
						$frameurls = $this->_frameurls;
						$this->_frameurls = array();
						
						while(list(,$frameurl) = each($frameurls))
						{
							if($this->_framedepth < $this->maxframes)
							{
								$this->fetch($frameurl);
								$this->_framedepth++;
							}
							else
								break;
						}
					}					
				}
				else
				{
					return false;
				}
				return true;					
				break;
			case "https":
				if(!$this->curl_path)
					return false;
				if(function_exists("is_executable"))
				    if (!is_executable($this->curl_path))
				        return false;
				$this->host = $URI_PARTS["host"];
				if(!empty($URI_PARTS["port"]))
					$this->port = $URI_PARTS["port"];
				if($this->_isproxy)
				{
					// using proxy, send entire URI
					$this->_httpsrequest($URI,$URI,$this->_httpmethod);
				}
				else
				{
					$path = $URI_PARTS["path"].($URI_PARTS["query"] ? "?".$URI_PARTS["query"] : "");
					// no proxy, send only the path
					$this->_httpsrequest($path, $URI, $this->_httpmethod);
				}

				if($this->_redirectaddr)
				{
					/* url was redirected, check if we've hit the max depth */
					if($this->maxredirs > $this->_redirectdepth)
					{
						// only follow redirect if it's on this site, or offsiteok is true
						if(preg_match("|^http://".preg_quote($this->host)."|i",$this->_redirectaddr) || $this->offsiteok)
						{
							/* follow the redirect */
							$this->_redirectdepth++;
							$this->lastredirectaddr=$this->_redirectaddr;
							$this->fetch($this->_redirectaddr);
						}
					}
				}

				if($this->_framedepth < $this->maxframes && count($this->_frameurls) > 0)
				{
					$frameurls = $this->_frameurls;
					$this->_frameurls = array();

					while(list(,$frameurl) = each($frameurls))
					{
						if($this->_framedepth < $this->maxframes)
						{
							$this->fetch($frameurl);
							$this->_framedepth++;
						}
						else
							break;
					}
				}					
				return true;					
				break;
			default:
				// not a valid protocol
				$this->error	=	'Invalid protocol "'.$URI_PARTS["scheme"].'"\n';
				return false;
				break;
		}		
		return true;
	}

/*======================================================================*\
	Function:	submit
	Purpose:	submit an http form
	Input:		$URI	the location to post the data
				$formvars	the formvars to use.
					format: $formvars["var"] = "val";
				$formfiles  an array of files to submit
					format: $formfiles["var"] = "/dir/filename.ext";
	Output:		$this->results	the text output from the post
\*======================================================================*/

	public function submit($URI, $formvars="", $formfiles="")
	{
		unset($postdata);
		
		$postdata = $this->_prepare_post_body($formvars, $formfiles);
			
		$URI_PARTS = parse_url($URI);
		if (!empty($URI_PARTS["user"]))
			$this->user = $URI_PARTS["user"];
		if (!empty($URI_PARTS["pass"]))
			$this->pass = $URI_PARTS["pass"];
		if (empty($URI_PARTS["query"]))
			$URI_PARTS["query"] = '';
		if (empty($URI_PARTS["path"]))
			$URI_PARTS["path"] = '';

		switch(strtolower($URI_PARTS["scheme"]))
		{
			case "http":
				$this->host = $URI_PARTS["host"];
				if(!empty($URI_PARTS["port"]))
					$this->port = $URI_PARTS["port"];
				if($this->_connect($fp))
				{
					if($this->_isproxy)
					{
						// using proxy, send entire URI
						$this->_httprequest($URI,$fp,$URI,$this->_submit_method,$this->_submit_type,$postdata);
					}
					else
					{
						$path = $URI_PARTS["path"].($URI_PARTS["query"] ? "?".$URI_PARTS["query"] : "");
						// no proxy, send only the path
						$this->_httprequest($path, $fp, $URI, $this->_submit_method, $this->_submit_type, $postdata);
					}
					
					$this->_disconnect($fp);

					if($this->_redirectaddr)
					{
						/* url was redirected, check if we've hit the max depth */
						if($this->maxredirs > $this->_redirectdepth)
						{						
							if(!preg_match("|^".$URI_PARTS["scheme"]."://|", $this->_redirectaddr))
								$this->_redirectaddr = $this->_expandlinks($this->_redirectaddr,$URI_PARTS["scheme"]."://".$URI_PARTS["host"]);						
							
							// only follow redirect if it's on this site, or offsiteok is true
							if(preg_match("|^http://".preg_quote($this->host)."|i",$this->_redirectaddr) || $this->offsiteok)
							{
								/* follow the redirect */
								$this->_redirectdepth++;
								$this->lastredirectaddr=$this->_redirectaddr;
								if( strpos( $this->_redirectaddr, "?" ) > 0 )
									$this->fetch($this->_redirectaddr); // the redirect has changed the request method from post to get
								else
									$this->submit($this->_redirectaddr,$formvars, $formfiles);
							}
						}
					}

					if($this->_framedepth < $this->maxframes && count($this->_frameurls) > 0)
					{
						$frameurls = $this->_frameurls;
						$this->_frameurls = array();
						
						while(list(,$frameurl) = each($frameurls))
						{														
							if($this->_framedepth < $this->maxframes)
							{
								$this->fetch($frameurl);
								$this->_framedepth++;
							}
							else
								break;
						}
					}					
					
				}
				else
				{
					return false;
				}
				return true;					
				break;
			case "https":
				if(!$this->curl_path)
					return false;
				if(function_exists("is_executable"))
				    if (!is_executable($this->curl_path))
				        return false;
				$this->host = $URI_PARTS["host"];
				if(!empty($URI_PARTS["port"]))
					$this->port = $URI_PARTS["port"];
				if($this->_isproxy)
				{
					// using proxy, send entire URI
					$this->_httpsrequest($URI, $URI, $this->_submit_method, $this->_submit_type, $postdata);
				}
				else
				{
					$path = $URI_PARTS["path"].($URI_PARTS["query"] ? "?".$URI_PARTS["query"] : "");
					// no proxy, send only the path
					$this->_httpsrequest($path, $URI, $this->_submit_method, $this->_submit_type, $postdata);
				}

				if($this->_redirectaddr)
				{
					/* url was redirected, check if we've hit the max depth */
					if($this->maxredirs > $this->_redirectdepth)
					{						
						if(!preg_match("|^".$URI_PARTS["scheme"]."://|", $this->_redirectaddr))
							$this->_redirectaddr = $this->_expandlinks($this->_redirectaddr,$URI_PARTS["scheme"]."://".$URI_PARTS["host"]);						

						// only follow redirect if it's on this site, or offsiteok is true
						if(preg_match("|^http://".preg_quote($this->host)."|i",$this->_redirectaddr) || $this->offsiteok)
						{
							/* follow the redirect */
							$this->_redirectdepth++;
							$this->lastredirectaddr=$this->_redirectaddr;
							if( strpos( $this->_redirectaddr, "?" ) > 0 )
								$this->fetch($this->_redirectaddr); // the redirect has changed the request method from post to get
							else
								$this->submit($this->_redirectaddr,$formvars, $formfiles);
						}
					}
				}

				if($this->_framedepth < $this->maxframes && count($this->_frameurls) > 0)
				{
					$frameurls = $this->_frameurls;
					$this->_frameurls = array();

					while(list(,$frameurl) = each($frameurls))
					{														
						if($this->_framedepth < $this->maxframes)
						{
							$this->fetch($frameurl);
							$this->_framedepth++;
						}
						else
							break;
					}
				}					
				return true;					
				break;
				
			default:
				// not a valid protocol
				$this->error	=	'Invalid protocol "'.$URI_PARTS["scheme"].'"\n';
				return false;
				break;
		}		
		return true;
	}

/*======================================================================*\
	Function:	fetchlinks
	Purpose:	fetch the links from a web page
	Input:		$URI	where you are fetching from
	Output:		$this->results	an array of the URLs
\*======================================================================*/

	public function fetchlinks($URI)
	{
		if ($this->fetch($URI))
		{	
			if($this->lastredirectaddr)
				$URI = $this->lastredirectaddr;
			if(is_array($this->results))
			{
				for($x=0;$x<count($this->results);$x++)
					$this->results[$x] = $this->_striplinks($this->results[$x]);
			}
			else
				$this->results = $this->_striplinks($this->results);

			if($this->expandlinks)
				$this->results = $this->_expandlinks($this->results, $URI);
			return true;
		}
		else
			return false;
	}

/*======================================================================*\
	Function:	fetchform
	Purpose:	fetch the form elements from a web page
	Input:		$URI	where you are fetching from
	Output:		$this->results	the resulting html form
\*======================================================================*/

	public function fetchform($URI)
	{
		
		if ($this->fetch($URI))
		{			

			if(is_array($this->results))
			{
				for($x=0;$x<count($this->results);$x++)
					$this->results[$x] = $this->_stripform($this->results[$x]);
			}
			else
				$this->results = $this->_stripform($this->results);
			
			return true;
		}
		else
			return false;
	}
	
	
/*======================================================================*\
	Function:	fetchtext
	Purpose:	fetch the text from a web page, stripping the links
	Input:		$URI	where you are fetching from
	Output:		$this->results	the text from the web page
\*======================================================================*/

	public function fetchtext($URI)
	{
		if($this->fetch($URI))
		{			
			if(is_array($this->results))
			{
				for($x=0;$x<count($this->results);$x++)
					$this->results[$x] = $this->_striptext($this->results[$x]);
			}
			else
				$this->results = $this->_striptext($this->results);
			return true;
		}
		else
			return false;
	}

/*======================================================================*\
	Function:	submitlinks
	Purpose:	grab links from a form submission
	Input:		$URI	where you are submitting from
	Output:		$this->results	an array of the links from the post
\*======================================================================*/

	public function submitlinks($URI, $formvars="", $formfiles="")
	{
		if($this->submit($URI,$formvars, $formfiles))
		{			
			if($this->lastredirectaddr)
				$URI = $this->lastredirectaddr;
			if(is_array($this->results))
			{
				for($x=0;$x<count($this->results);$x++)
				{
					$this->results[$x] = $this->_striplinks($this->results[$x]);
					if($this->expandlinks)
						$this->results[$x] = $this->_expandlinks($this->results[$x],$URI);
				}
			}
			else
			{
				$this->results = $this->_striplinks($this->results);
				if($this->expandlinks)
					$this->results = $this->_expandlinks($this->results,$URI);
			}
			return true;
		}
		else
			return false;
	}

/*======================================================================*\
	Function:	submittext
	Purpose:	grab text from a form submission
	Input:		$URI	where you are submitting from
	Output:		$this->results	the text from the web page
\*======================================================================*/

	public function submittext($URI, $formvars = "", $formfiles = "")
	{
		if($this->submit($URI,$formvars, $formfiles))
		{			
			if($this->lastredirectaddr)
				$URI = $this->lastredirectaddr;
			if(is_array($this->results))
			{
				for($x=0;$x<count($this->results);$x++)
				{
					$this->results[$x] = $this->_striptext($this->results[$x]);
					if($this->expandlinks)
						$this->results[$x] = $this->_expandlinks($this->results[$x],$URI);
				}
			}
			else
			{
				$this->results = $this->_striptext($this->results);
				if($this->expandlinks)
					$this->results = $this->_expandlinks($this->results,$URI);
			}
			return true;
		}
		else
			return false;
	}

	

/*======================================================================*\
	Function:	set_submit_multipart
	Purpose:	Set the form submission content type to
				multipart/form-data
\*======================================================================*/
	public function set_submit_multipart()
	{
		$this->_submit_type = "multipart/form-data";
	}

	
/*======================================================================*\
	Function:	set_submit_normal
	Purpose:	Set the form submission content type to
				application/x-www-form-urlencoded
\*======================================================================*/
	public function set_submit_normal()
	{
		$this->_submit_type = "application/x-www-form-urlencoded";
	}

	
	

/*======================================================================*\
	Private functions
\*======================================================================*/
	
	
/*======================================================================*\
	Function:	_striplinks
	Purpose:	strip the hyperlinks from an html document
	Input:		$document	document to strip.
	Output:		$match		an array of the links
\*======================================================================*/

	public function _striplinks($document)
	{	
		preg_match_all("'<\s*a\s.*?href\s*=\s*			# find <a href=
						([\"\'])?					# find single or double quote
						(?(1) (.*?)\\1 | ([^\s\>]+))		# if quote found, match up to next matching
													# quote, otherwise match up to next space
						'isx",$document,$links);
						

		// catenate the non-empty matches from the conditional subpattern
		
		$match = array();
		while(list($key,$val) = each($links[2]))
		{
			if(!empty($val))
				$match[] = $val;
		}				
		
		while(list($key,$val) = each($links[3]))
		{
			if(!empty($val))
				$match[] = $val;
		}		
		
		// return the links
		return $match;
	}

/*======================================================================*\
	Function:	_stripform
	Purpose:	strip the form elements from an html document
	Input:		$document	document to strip.
	Output:		$match		an array of the links
\*======================================================================*/

	public function _stripform($document)
	{	
		preg_match_all("'<\/?(FORM|INPUT|SELECT|TEXTAREA|(OPTION))[^<>]*>(?(2)(.*(?=<\/?(option|select)[^<>]*>[\r\n]*)|(?=[\r\n]*))|(?=[\r\n]*))'Usi",$document,$elements);
		
		// catenate the matches
		$match = implode("\r\n",$elements[0]);
				
		// return the links
		return $match;
	}

	
	
/*======================================================================*\
	Function:	_striptext
	Purpose:	strip the text from an html document
	Input:		$document	document to strip.
	Output:		$text		the resulting text
\*======================================================================*/

	public function _striptext($document)
	{
		
		// I didn't use preg eval (//e) since that is only available in PHP 4.0.
		// so, list your entities one by one here. I included some of the
		// more common ones.
								
		$search = array("'<script[^>]*?>.*?</script>'si",	// strip out javascript
						"'<[\/\!]*?[^<>]*?>'si",			// strip out html tags
						"'([\r\n])[\s]+'",					// strip out white space
						"'&(quot|#34|#034|#x22);'i",		// replace html entities
						"'&(amp|#38|#038|#x26);'i",			// added hexadecimal values
						"'&(lt|#60|#060|#x3c);'i",
						"'&(gt|#62|#062|#x3e);'i",
						"'&(nbsp|#160|#xa0);'i",
						"'&(iexcl|#161);'i",
						"'&(cent|#162);'i",
						"'&(pound|#163);'i",
						"'&(copy|#169);'i",
						"'&(reg|#174);'i",
						"'&(deg|#176);'i",
						"'&(#39|#039|#x27);'",
						"'&(euro|#8364);'i",				// europe
						"'&a(uml|UML);'",					// german
						"'&o(uml|UML);'",
						"'&u(uml|UML);'",
						"'&A(uml|UML);'",
						"'&O(uml|UML);'",
						"'&U(uml|UML);'",
						"'&szlig;'i",
						);
		$replace = array(	"",
							"",
							"\\1",
							"\"",
							"&",
							"<",
							">",
							" ",
							chr(161),
							chr(162),
							chr(163),
							chr(169),
							chr(174),
							chr(176),
							chr(39),
							chr(128),
							"?",
							"?",
							"?",
							"?",
							"?",
							"?",
							"?",
						);
					
		$text = preg_replace($search,$replace,$document);
								
		return $text;
	}

/*======================================================================*\
	Function:	_expandlinks
	Purpose:	expand each link into a fully qualified URL
	Input:		$links			the links to qualify
				$URI			the full URI to get the base from
	Output:		$expandedLinks	the expanded links
\*======================================================================*/

	public function _expandlinks($links,$URI)
	{
		
		preg_match("/^[^\?]+/",$URI,$match);

		$match = preg_replace("|/[^\/\.]+\.[^\/\.]+$|","",$match[0]);
		$match = preg_replace("|/$|","",$match);
		$match_part = parse_url($match);
		$match_root =
		$match_part["scheme"]."://".$match_part["host"];
				
		$search = array( 	"|^http://".preg_quote($this->host)."|i",
							"|^(\/)|i",
							"|^(?!http://)(?!mailto:)|i",
							"|/\./|",
							"|/[^\/]+/\.\./|"
						);
						
		$replace = array(	"",
							$match_root."/",
							$match."/",
							"/",
							"/"
						);			
				
		$expandedLinks = preg_replace($search,$replace,$links);

		return $expandedLinks;
	}

/*======================================================================*\
	Function:	_httprequest
	Purpose:	go get the http data from the server
	Input:		$url		the url to fetch
				$fp			the current open file pointer
				$URI		the full URI
				$body		body contents to send if any (POST)
	Output:		
\*======================================================================*/
	
	public function _httprequest($url,$fp,$URI,$http_method,$content_type="",$body="")
	{
		$cookie_headers = '';
		if($this->passcookies && $this->_redirectaddr)
			$this->setcookies();
			
		$URI_PARTS = parse_url($URI);
		if(empty($url))
			$url = "/";
		$headers = $http_method." ".$url." ".$this->_httpversion."\r\n";		
		if(!empty($this->agent))
			$headers .= "User-Agent: ".$this->agent."\r\n";
		if(!empty($this->host) && !isset($this->rawheaders['Host'])) {
			$headers .= "Host: ".$this->host;
			if(!empty($this->port))
				$headers .= ":".$this->port;
			$headers .= "\r\n";
		}
		if(!empty($this->accept))
			$headers .= "Accept: ".$this->accept."\r\n";
		if(!empty($this->referer))
			$headers .= "Referer: ".$this->referer."\r\n";
		if(!empty($this->cookies))
		{			
			if(!is_array($this->cookies))
				$this->cookies = (array)$this->cookies;
	
			reset($this->cookies);
			if ( count($this->cookies) > 0 ) {
				$cookie_headers .= 'Cookie: ';
				foreach ( $this->cookies as $cookieKey => $cookieVal ) {
				$cookie_headers .= $cookieKey."=".urlencode($cookieVal)."; ";
				}
				$headers .= substr($cookie_headers,0,-2) . "\r\n";
			} 
		}
		if(!empty($this->rawheaders))
		{
			if(!is_array($this->rawheaders))
				$this->rawheaders = (array)$this->rawheaders;
			while(list($headerKey,$headerVal) = each($this->rawheaders))
				$headers .= $headerKey.": ".$headerVal."\r\n";
		}
		if(!empty($content_type)) {
			$headers .= "Content-type: $content_type";
			if ($content_type == "multipart/form-data")
				$headers .= "; boundary=".$this->_mime_boundary;
			$headers .= "\r\n";
		}
		if(!empty($body))	
			$headers .= "Content-length: ".strlen($body)."\r\n";
		if(!empty($this->user) || !empty($this->pass))	
			$headers .= "Authorization: Basic ".base64_encode($this->user.":".$this->pass)."\r\n";
		
		//add proxy auth headers
		if(!empty($this->proxy_user))	
			$headers .= 'Proxy-Authorization: ' . 'Basic ' . base64_encode($this->proxy_user . ':' . $this->proxy_pass)."\r\n";


		$headers .= "\r\n";
		
		// set the read timeout if needed
		if ($this->read_timeout > 0)
			socket_set_timeout($fp, $this->read_timeout);
		$this->timed_out = false;
		
		fwrite($fp,$headers.$body,strlen($headers.$body));
		
		$this->_redirectaddr = false;
		unset($this->headers);
						
		while($currentHeader = fgets($fp,$this->_maxlinelen))
		{
			if ($this->read_timeout > 0 && $this->_check_timeout($fp))
			{
				$this->status=-100;
				return false;
			}
				
			if($currentHeader == "\r\n")
				break;
						
			// if a header begins with Location: or URI:, set the redirect
			if(preg_match("/^(Location:|URI:)/i",$currentHeader))
			{
				// get URL portion of the redirect
				preg_match("/^(Location:|URI:)[ ]+(.*)/i",chop($currentHeader),$matches);
				// look for :// in the Location header to see if hostname is included
				if(!preg_match("|\:\/\/|",$matches[2]))
				{
					// no host in the path, so prepend
					$this->_redirectaddr = $URI_PARTS["scheme"]."://".$this->host.":".$this->port;
					// eliminate double slash
					if(!preg_match("|^/|",$matches[2]))
							$this->_redirectaddr .= "/".$matches[2];
					else
							$this->_redirectaddr .= $matches[2];
				}
				else
					$this->_redirectaddr = $matches[2];
			}
		
			if(preg_match("|^HTTP/|",$currentHeader))
			{
                if(preg_match("|^HTTP/[^\s]*\s(.*?)\s|",$currentHeader, $status))
				{
					$this->status= $status[1];
                }				
				$this->response_code = $currentHeader;
			}
				
			$this->headers[] = $currentHeader;
		}

		$results = '';
		do {
    		$_data = fread($fp, $this->maxlength);
    		if (strlen($_data) == 0) {
        		break;
    		}
    		$results .= $_data;
		} while(true);

		if ($this->read_timeout > 0 && $this->_check_timeout($fp))
		{
			$this->status=-100;
			return false;
		}
		
		// check if there is a a redirect meta tag
		
		if(preg_match("'<meta[\s]*http-equiv[^>]*?content[\s]*=[\s]*[\"\']?\d+;[\s]*URL[\s]*=[\s]*([^\"\']*?)[\"\']?>'i",$results,$match))

		{
			$this->_redirectaddr = $this->_expandlinks($match[1],$URI);	
		}

		// have we hit our frame depth and is there frame src to fetch?
		if(($this->_framedepth < $this->maxframes) && preg_match_all("'<frame\s+.*src[\s]*=[\'\"]?([^\'\"\>]+)'i",$results,$match))
		{
			$this->results[] = $results;
			for($x=0; $x<count($match[1]); $x++)
				$this->_frameurls[] = $this->_expandlinks($match[1][$x],$URI_PARTS["scheme"]."://".$this->host);
		}
		// have we already fetched framed content?
		elseif(is_array($this->results))
			$this->results[] = $results;
		// no framed content
		else
			$this->results = $results;
		
		return true;
	}

/*======================================================================*\
	Function:	_httpsrequest
	Purpose:	go get the https data from the server using curl
	Input:		$url		the url to fetch
				$URI		the full URI
				$body		body contents to send if any (POST)
	Output:		
\*======================================================================*/
	
	public function _httpsrequest($url,$URI,$http_method,$content_type="",$body="")
	{  
		if($this->passcookies && $this->_redirectaddr)
			$this->setcookies();

		$headers = array();		
					
		$URI_PARTS = parse_url($URI);
		if(empty($url))
			$url = "/";
		// GET ... header not needed for curl
		//$headers[] = $http_method." ".$url." ".$this->_httpversion;		
		if(!empty($this->agent))
			$headers[] = "User-Agent: ".$this->agent;
		if(!empty($this->host))
			if(!empty($this->port))
				$headers[] = "Host: ".$this->host.":".$this->port;
			else
				$headers[] = "Host: ".$this->host;
		if(!empty($this->accept))
			$headers[] = "Accept: ".$this->accept;
		if(!empty($this->referer))
			$headers[] = "Referer: ".$this->referer;
		if(!empty($this->cookies))
		{			
			if(!is_array($this->cookies))
				$this->cookies = (array)$this->cookies;
	
			reset($this->cookies);
			if ( count($this->cookies) > 0 ) {
				$cookie_str = 'Cookie: ';
				foreach ( $this->cookies as $cookieKey => $cookieVal ) {
				$cookie_str .= $cookieKey."=".urlencode($cookieVal)."; ";
				}
				$headers[] = substr($cookie_str,0,-2);
			}
		}
		if(!empty($this->rawheaders))
		{
			if(!is_array($this->rawheaders))
				$this->rawheaders = (array)$this->rawheaders;
			while(list($headerKey,$headerVal) = each($this->rawheaders))
				$headers[] = $headerKey.": ".$headerVal;
		}
		if(!empty($content_type)) {
			if ($content_type == "multipart/form-data")
				$headers[] = "Content-type: $content_type; boundary=".$this->_mime_boundary;
			else
				$headers[] = "Content-type: $content_type";
		}
		if(!empty($body))	
			$headers[] = "Content-length: ".strlen($body);
		if(!empty($this->user) || !empty($this->pass))	
			$headers[] = "Authorization: BASIC ".base64_encode($this->user.":".$this->pass);
			
		for($curr_header = 0; $curr_header < count($headers); $curr_header++) {
			$safer_header = strtr( $headers[$curr_header], "\"", " " );
			$cmdline_params .= " -H \"".$safer_header."\"";
		}
		
		if(!empty($body))
			$cmdline_params .= " -d \"$body\"";
		
		if($this->read_timeout > 0)
			$cmdline_params .= " -m ".$this->read_timeout;
		
		$headerfile = tempnam($temp_dir, "sno");

		exec($this->curl_path." -k -D \"$headerfile\"".$cmdline_params." \"".escapeshellcmd($URI)."\"",$results,$return);
		
		if($return)
		{
			$this->error = "Error: cURL could not retrieve the document, error $return.";
			return false;
		}
			
			
		$results = implode("\r\n",$results);
		
		$result_headers = file("$headerfile");
						
		$this->_redirectaddr = false;
		unset($this->headers);
						
		for($currentHeader = 0; $currentHeader < count($result_headers); $currentHeader++)
		{
			
			// if a header begins with Location: or URI:, set the redirect
			if(preg_match("/^(Location: |URI: )/i",$result_headers[$currentHeader]))
			{
				// get URL portion of the redirect
				preg_match("/^(Location: |URI:)\s+(.*)/",chop($result_headers[$currentHeader]),$matches);
				// look for :// in the Location header to see if hostname is included
				if(!preg_match("|\:\/\/|",$matches[2]))
				{
					// no host in the path, so prepend
					$this->_redirectaddr = $URI_PARTS["scheme"]."://".$this->host.":".$this->port;
					// eliminate double slash
					if(!preg_match("|^/|",$matches[2]))
							$this->_redirectaddr .= "/".$matches[2];
					else
							$this->_redirectaddr .= $matches[2];
				}
				else
					$this->_redirectaddr = $matches[2];
			}
		
			if(preg_match("|^HTTP/|",$result_headers[$currentHeader]))
				$this->response_code = $result_headers[$currentHeader];

			$this->headers[] = $result_headers[$currentHeader];
		}

		// check if there is a a redirect meta tag
		
		if(preg_match("'<meta[\s]*http-equiv[^>]*?content[\s]*=[\s]*[\"\']?\d+;[\s]*URL[\s]*=[\s]*([^\"\']*?)[\"\']?>'i",$results,$match))
		{
			$this->_redirectaddr = $this->_expandlinks($match[1],$URI);	
		}

		// have we hit our frame depth and is there frame src to fetch?
		if(($this->_framedepth < $this->maxframes) && preg_match_all("'<frame\s+.*src[\s]*=[\'\"]?([^\'\"\>]+)'i",$results,$match))
		{
			$this->results[] = $results;
			for($x=0; $x<count($match[1]); $x++)
				$this->_frameurls[] = $this->_expandlinks($match[1][$x],$URI_PARTS["scheme"]."://".$this->host);
		}
		// have we already fetched framed content?
		elseif(is_array($this->results))
			$this->results[] = $results;
		// no framed content
		else
			$this->results = $results;

		unlink("$headerfile");
		
		return true;
	}

/*======================================================================*\
	Function:	setcookies()
	Purpose:	set cookies for a redirection
\*======================================================================*/
	
	public function setcookies()
	{
		for($x=0; $x<count($this->headers); $x++)
		{
		if(preg_match('/^set-cookie:[\s]+([^=]+)=([^;]+)/i', $this->headers[$x],$match))
			$this->cookies[$match[1]] = urldecode($match[2]);
		}
	}

	
/*======================================================================*\
	Function:	_check_timeout
	Purpose:	checks whether timeout has occurred
	Input:		$fp	file pointer
\*======================================================================*/

	public function _check_timeout($fp)
	{
		if ($this->read_timeout > 0) {
			$fp_status = socket_get_status($fp);
			if ($fp_status["timed_out"]) {
				$this->timed_out = true;
				return true;
			}
		}
		return false;
	}

/*======================================================================*\
	Function:	_connect
	Purpose:	make a socket connection
	Input:		$fp	file pointer
\*======================================================================*/
	
	public function _connect(&$fp)
	{
		if(!empty($this->proxy_host) && !empty($this->proxy_port))
			{
				$this->_isproxy = true;
				
				$host = $this->proxy_host;
				$port = $this->proxy_port;
			}
		else
		{
			$host = $this->host;
			$port = $this->port;
		}
	
		$this->status = 0;
		
		if($fp = fsockopen(
					$host,
					$port,
					$errno,
					$errstr,
					$this->_fp_timeout
					))
		{
			// socket connection succeeded

			return true;
		}
		else
		{
			// socket connection failed
			$this->status = $errno;
			switch($errno)
			{
				case -3:
					$this->error="socket creation failed (-3)";
				case -4:
					$this->error="dns lookup failure (-4)";
				case -5:
					$this->error="connection refused or timed out (-5)";
				default:
					$this->error="connection failed (".$errno.")";
			}
			return false;
		}
	}
/*======================================================================*\
	Function:	_disconnect
	Purpose:	disconnect a socket connection
	Input:		$fp	file pointer
\*======================================================================*/
	
	public function _disconnect($fp)
	{
		return(fclose($fp));
	}

	
/*======================================================================*\
	Function:	_prepare_post_body
	Purpose:	Prepare post body according to encoding type
	Input:		$formvars  - form variables
				$formfiles - form upload files
	Output:		post body
\*======================================================================*/
	
	public function _prepare_post_body($formvars, $formfiles)
	{
		settype($formvars, "array");
		settype($formfiles, "array");
		$postdata = '';

		if (count($formvars) == 0 && count($formfiles) == 0)
			return;
		
		switch ($this->_submit_type) {
			case "application/x-www-form-urlencoded":
				reset($formvars);
				while(list($key,$val) = each($formvars)) {
					if (is_array($val) || is_object($val)) {
						while (list($cur_key, $cur_val) = each($val)) {
							$postdata .= urlencode($key)."[]=".urlencode($cur_val)."&";
						}
					} else
						$postdata .= urlencode($key)."=".urlencode($val)."&";
				}
				break;

			case "multipart/form-data":
				$this->_mime_boundary = "Snoopy".md5(uniqid(microtime()));
				
				reset($formvars);
				while(list($key,$val) = each($formvars)) {
					if (is_array($val) || is_object($val)) {
						while (list($cur_key, $cur_val) = each($val)) {
							$postdata .= "--".$this->_mime_boundary."\r\n";
							$postdata .= "Content-Disposition: form-data; name=\"$key\[\]\"\r\n\r\n";
							$postdata .= "$cur_val\r\n";
						}
					} else {
						$postdata .= "--".$this->_mime_boundary."\r\n";
						$postdata .= "Content-Disposition: form-data; name=\"$key\"\r\n\r\n";
						$postdata .= "$val\r\n";
					}
				}
				
				reset($formfiles);
				while (list($field_name, $file_names) = each($formfiles)) {
					settype($file_names, "array");
					while (list(, $file_name) = each($file_names)) {
						if (!is_readable($file_name)) continue;

						$fp = fopen($file_name, "r");
						$file_content = fread($fp, filesize($file_name));
						fclose($fp);
						$base_name = basename($file_name);

						$postdata .= "--".$this->_mime_boundary."\r\n";
						$postdata .= "Content-Disposition: form-data; name=\"$field_name\"; filename=\"$base_name\"\r\n\r\n";
						$postdata .= "$file_content\r\n";
					}
				}
				$postdata .= "--".$this->_mime_boundary."--\r\n";
				break;
		}

		return $postdata;
	}
}

?>
