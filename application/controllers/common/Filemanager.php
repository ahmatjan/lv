<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Filemanager extends CI_Controller {
	public function index() {
		$this->load->language('common/filemanager');

		$this->load->view('common/filemanager');
	}
}