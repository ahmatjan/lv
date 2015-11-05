<?php  if (!defined('BASEPATH')) exit('No direct script access allowed');

require_once 'compactor.php';//载入html压缩类库
class MY_Output extends CI_Output
{
	//构造函数
	public function __construct()
    {
        parent::__construct();
        // Set the super object to a local variable for use later
		//$this->CI =& get_instance();
     }
	//替换缓存写入类,在视图输出前压缩html代码
	/**
	 * Display Output
	 *
	 * Processes and sends finalized output data to the browser along
	 * with any server headers and profile data. It also stops benchmark
	 * timers so the page rendering speed and memory usage can be shown.
	 *
	 * Note: All "view" data is automatically put into $this->final_output
	 *	 by controller class.
	 *
	 * @uses	CI_Output::$final_output
	 * @param	string	$output	Output data override
	 * @return	void
	 */
	public function _display($output = '')
	{
		// Note:  We use load_class() because we can't use $CI =& get_instance()
		// since this function is sometimes called by the caching mechanism,
		// which happens before the CI super object is available.
		$BM =& load_class('Benchmark', 'core');
		$CFG =& load_class('Config', 'core');

		// Grab the super object if we can.
		if (class_exists('CI_Controller', FALSE))
		{
			$CI =& get_instance();
		}

		// --------------------------------------------------------------------

		// Set the output data
		if ($output === '')
		{
			$output =& $this->final_output;
		}

		// --------------------------------------------------------------------

		// Do we need to write a cache file? Only if the controller does not have its
		// own _output() method and we are not dealing with a cache file, which we
		// can determine by the existence of the $CI object above
		if ($this->cache_expiration > 0 && isset($CI) && ! method_exists($CI, '_output'))
		{
			$this->_write_cache($output);
		}

		// --------------------------------------------------------------------

		// Parse out the elapsed time and memory usage,
		// then swap the pseudo-variables with the data

		$elapsed = $BM->elapsed_time('total_execution_time_start', 'total_execution_time_end');

		if ($this->parse_exec_vars === TRUE)
		{
			$memory	= round(memory_get_usage() / 1024 / 1024, 2).'MB';
			$output = str_replace(array('{elapsed_time}', '{memory_usage}'), array($elapsed, $memory), $output);
		}

		// --------------------------------------------------------------------

		// Is compression requested?
		if (isset($CI) // This means that we're not serving a cache file, if we were, it would already be compressed
			&& $this->_compress_output === TRUE
			&& isset($_SERVER['HTTP_ACCEPT_ENCODING']) && strpos($_SERVER['HTTP_ACCEPT_ENCODING'], 'gzip') !== FALSE)
		{
			ob_start('ob_gzhandler');
		}

		// --------------------------------------------------------------------

		// Are there any server headers to send?
		if (count($this->headers) > 0)
		{
			foreach ($this->headers as $header)
			{
				@header($header[0], $header[1]);
			}
		}

		// --------------------------------------------------------------------

		// Does the $CI object exist?
		// If not we know we are dealing with a cache file so we'll
		// simply echo out the data and exit.
		if ( ! isset($CI))
		{
			if ($this->_compress_output === TRUE)
			{
				if (isset($_SERVER['HTTP_ACCEPT_ENCODING']) && strpos($_SERVER['HTTP_ACCEPT_ENCODING'], 'gzip') !== FALSE)
				{
					header('Content-Encoding: gzip');
					header('Content-Length: '.strlen($output));
				}
				else
				{
					// User agent doesn't support gzip compression,
					// so we'll have to decompress our cache
					$output = gzinflate(substr($output, 10, -8));
				}
			}

			log_message('info', 'Final output sent to browser');
			log_message('debug', 'Total execution time: '.$elapsed);
			return;
		}

		// --------------------------------------------------------------------

		// Do we need to generate profile data?
		// If so, load the Profile class and run it.
		if ($this->enable_profiler === TRUE)
		{
			$CI->load->library('profiler');
			if ( ! empty($this->_profiler_sections))
			{
				$CI->profiler->set_sections($this->_profiler_sections);
			}

			// If the output data contains closing </body> and </html> tags
			// we will remove them and add them back after we insert the profile data
			$output = preg_replace('|</body>.*?</html>|is', '', $output, -1, $count).$CI->profiler->run();
			if ($count > 0)
			{
				$output .= '</body></html>';
			}
		}

		// Does the controller contain a function named _output()?
		// If so send the output there.  Otherwise, echo it.
		
		$compactor = new Compactor(array(
				'buffer_echo' => false
		));
		$output = $compactor->squeeze($output);
		
		if (method_exists($CI, '_output'))
		{
			$CI->_output($output);
		}
		else
		{
			echo $output; // Send it to the browser!
		}

		log_message('info', 'Final output sent to browser');
		log_message('debug', 'Total execution time: '.$elapsed);
	}
	
		// --------------------------------------------------------------------

	/**
	 * Write Cache
	 *
	 * @param	string	$output	Output data to cache
	 * @return	void
	 */
	public function _write_cache($output)
	{
		$CI =& get_instance();
		$path = $CI->config->item('cache_path');
		$cache_path = ($path === '') ? APPPATH.'cache/' : $path;

		if ( ! is_dir($cache_path) OR ! is_really_writable($cache_path))
		{
			log_message('error', 'Unable to write cache file: '.$cache_path);
			return;
		}

		$uri = $CI->config->item('base_url')
			.$CI->config->item('index_page')
			.$CI->uri->uri_string();

		if (($cache_query_string = $CI->config->item('cache_query_string')) && ! empty($_SERVER['QUERY_STRING']))
		{
			if (is_array($cache_query_string))
			{
				$uri .= '?'.http_build_query(array_intersect_key($_GET, array_flip($cache_query_string)));
			}
			else
			{
				$uri .= '?'.$_SERVER['QUERY_STRING'];
			}
		}

		$cache_path .= md5($uri);

		if ( ! $fp = @fopen($cache_path, 'w+b'))
		{
			log_message('error', 'Unable to write cache file: '.$cache_path);
			return;
		}

		if (flock($fp, LOCK_EX))
		{
			// If output compression is enabled, compress the cache
			// itself, so that we don't have to do that each time
			// we're serving it
			if ($this->_compress_output === TRUE)
			{
				$output = gzencode($output);

				if ($this->get_header('content-type') === NULL)
				{
					$this->set_content_type($this->mime_type);
				}
			}

			$expire = time() + ($this->cache_expiration * 60);

			// Put together our serialized info.
			$cache_info = serialize(array(
				'expire'	=> $expire,
				'headers'	=> $this->headers
			));

			$output = $cache_info.'ENDCI--->'.$output;

			/**
			* 
			* @var 
			* 压缩html 待写入缓存
			*/
			$compactor = new Compactor(array(
				'buffer_echo' => false
			));
			$output = $compactor->squeeze($output);

			for ($written = 0, $length = strlen($output); $written < $length; $written += $result)
			{
				if (($result = fwrite($fp, substr($output, $written))) === FALSE)
				{
					break;
				}
			}

			flock($fp, LOCK_UN);
		}
		else
		{
			log_message('error', 'Unable to secure a file lock for file at: '.$cache_path);
			return;
		}

		fclose($fp);

		if (is_int($result))
		{
			chmod($cache_path, 0640);
			log_message('debug', 'Cache file written: '.$cache_path);

			// Send HTTP cache-control headers to browser to match file cache settings.
			$this->set_cache_header($_SERVER['REQUEST_TIME'], $expire);
		}
		else
		{
			@unlink($cache_path);
			log_message('error', 'Unable to write the complete cache content at: '.$cache_path);
		}
	}
	
	//判断跳转https
	public function https_jump (){
		$this->CI =& get_instance();
		//session用来记录用户访问设备和https的设置
		
		//装载模型
		$this->CI->load->model('setting/base_setting');
		//调设置
		$https_pc=$this->CI->base_setting->get_setting('https_pc');
		//调设置
		$https_mobile=$this->CI->base_setting->get_setting('https_mobile');
		
		//当前访问链接
		//$current_url=current_url();
		
		//用户代理类用来判断设备
		$this->CI->load->library('user_agent');
		
		$url_ = $_SERVER['SERVER_NAME'];
		if(strpos($url_ ,'www.') !== FALSE){
			$url_=substr($url_,4);
		}
		
		if($this->CI->agent->is_mobile())
		{
			//如果使用的是移动端
			if($https_mobile == TRUE){
				if (@$_SERVER["HTTPS"] <> "on")
					{
					    $xredir="https://".$url_.$_SERVER["REQUEST_URI"];
					    header("Location: ".$xredir);
					}
			}else{
				if(@$_SERVER['HTTPS'] == "on") 
				{ 
				    $xredir='http://'.$url_. $_SERVER['REQUEST_URI']; 

				    header("Location: ".$xredir); 
				}  
			}
		}
		if(!$this->CI->agent->is_mobile())
		{
			//如果使用的不是移动端
			if($https_pc == TRUE){
				//使用https
				if (@$_SERVER["HTTPS"] <> "on")
				{
				    $xredir="https://".$url_.$_SERVER["REQUEST_URI"];
				    header("Location: ".$xredir);
				}else{
					//已经是https
					if(strpos($_SERVER['SERVER_NAME'] ,'www.') !== FALSE){
						
						$xredir="https://".substr($_SERVER['SERVER_NAME'],4).$_SERVER["REQUEST_URI"];
				    	header("Location: ".$xredir);
					}
				}
			}else{
				//不使用https
				if(@$_SERVER['HTTPS'] == "on") 
				{ 
				    $xredir='http://'.$url_. $_SERVER['REQUEST_URI']; 

				    header("Location: ".$xredir); 
				}  
			}
		}
	}
}