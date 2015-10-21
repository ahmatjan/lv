<?php  if (!defined('BASEPATH')) exit('No direct script access allowed');

class MY_Input extends CI_Input
{
//转utf8
	function utf8($data){

		if( !empty($data) ){

		$fileType = mb_detect_encoding($data , array('UTF-8','GBK','LATIN1','BIG5'));

		if( $fileType != 'UTF-8'){

		  $data = mb_convert_encoding($data ,'utf-8' , $fileType);

		}

		}

		return $data;

	}

}