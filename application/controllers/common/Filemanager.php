<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Filemanager extends CI_Controller {
	public function __construct() {
		parent::__construct();
	}
	
	public function index()
	{
		
		$data=array();
		
		$this->load->view('common/filemanager',$data);

	}
}
