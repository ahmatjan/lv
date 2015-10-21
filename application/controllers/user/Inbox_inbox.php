<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Inbox_inbox extends CI_Controller {
	public function index()
	{
		$this->load->view('user/inbox_inbox');
	}
}
