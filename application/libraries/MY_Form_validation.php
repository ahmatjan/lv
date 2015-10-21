<?php  if (!defined('BASEPATH')) exit('No direct script access allowed');

class MY_Form_validation extends CI_Form_validation
{
	function __construct()
    {
        parent::__construct();
    }

//把表单验证的一方法通过传入参数的形式调用
	public function validata($data,$rules)
	{ 
		if(!empty($data) && !is_array($rules)){
			return $this->$rules($data);
		}
		
		if(!empty($data) && is_array($rules)){
			
			foreach($rules as $k => $v){
				
				if(is_array($v)){
					//如果参数是一个数组（如长度判断）
					//第一个是判断方法名，从第二个开始是参数
					$f=array_slice($v,1);
					//var_dump($f);
					foreach($f as $i){
						if($this->$v['0']($data,$i)==FALSE){
							return FALSE;
						}else{
							return TRUE;
						}
					}
				}
			}
		}
	}
	
	//匹配字母数字下划线中文
	public function alpha_cn($str)
	{
		return (bool) preg_match('/[\x{4e00}-\x{9fa5}\w]+$/u', $str);
	}
}