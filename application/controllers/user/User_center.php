<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_center extends CI_Controller {
	public function __construct() {
		parent::__construct();
			$this->output->https_jump();
	}
	
	public function index()
	{
		$this->lang->load('user/user_center');
		$header['css_page_style']=array('public/css/bootstrap-fileupload.css','public/css/chosen.css','public/css/profile.css','public/css/loading/portrait.css');
		
		$header['title']=$this->lang->line('heading_title');
		
		$this->public_section->get_header($header);
		$this->public_section->get_usertop();
		
		//开始主体程序
		//1、设置语言
		$data['text_title']=$this->lang->line('heading_title');
		$data['text_title_helper']=$this->lang->line('text_title_helper');
		
		//面包导航
		$data['breadcrumbs']=array(
			'home'			=>array(
								'name'=>$this->lang->line('text_home'),
								'url'=>site_url('home')
								),
			'setting'		=>array(
								'name'=>$this->lang->line('heading_title'),
								'this_url'=>site_url('user/User_center'),
								'url'=>''
								),
		);
		
		//从session中获取用户信息
		if(@$_SESSION['nick_name']){
			$data['nick_name']=$_SESSION['nick_name'];
		}else{
			$data['nick_name']='';
		}
		
		//调用户头像
		if(@$_SESSION['user_image']){
			//存在http
			if(strpos($_SESSION['user_image'] ,'http') !== FALSE){
				$data['user_image']=$_SESSION['user_image'];
			}else{
				$portrait_img=$this->image->rezice($_SESSION['user_image'],150,150);
				$data['user_image']=$portrait_img['new_img'];
			}
			
		}else{
			$data['user_image']='';
		}
		
		$this->load->view('user/user_center',$data);
		$this->public_section->get_footer();
	}
	
	//用户头像上传
	public function imgsave(){
        //接收上传文件的二进制编码
        $file = $this->input->post('image'); //二进制数据流
        //接收数据不为空
        if(isset($file)){
	        $file = substr(strstr($file,','),1);
	        $file=base64_decode($file);
	  
	        //保存地址
	        $imgDir = WWW_PATH.'/image/catalog/'.date("Ym");
	        //判断创建文件夹
	        if (!is_dir($imgDir)){  
				//第三个参数是“true”表示能创建多级目录，iconv防止中文目录乱码
				$res=mkdir(iconv("UTF-8", "GBK", $imgDir),0777,true); 
			}
	        
	        //要生成的图片名字
	        $filename = '/'.md5(time().mt_rand(10, 99)).".gif"; //新图片名称
	        $newFilePath = $imgDir.$filename;
	        
	        $data = $file;
	        $newFile = fopen($newFilePath,"w"); //打开文件准备写入
	        fwrite($newFile,$data); //写入二进制流到文件
	        fclose($newFile); //关闭文件
	        //echo '修改头像成功';
	        
	        //删除原头像
	        $old_img=$_SESSION['user_image'];
	        $this->image->del_img($old_img);
	        
	        //修改数据库
	        $up_img='catalog/'.date("Ym").$filename;
	        //更新session,以便显示
	        //生成缩略图
	        $this->image->rezice($up_img,150,150);
	        
	        $this->session->set_userdata('user_image', $up_img);
	        //写入数据库
	        $this->load->model('user/user_info');
	        //更新新数据
	        $this->user_info->updata_img($up_img,$_SESSION['username']);
	        
	    }else{
			echo '修改头像失败';
		}
    }
}
