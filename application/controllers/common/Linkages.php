<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Linkages extends CI_Controller {
	
	public function __construct() {
		parent::__construct();
		$this->load->model(array('tool/linkage','tool/report'));
	}
	
	//省
	public function province()
	{
		$ip_address=$this->report->get_ipaddress($_SESSION['token']);
		
		if(isset($ip_address['region'])){
			$provinces['shen']=$ip_address['region'];
		}else{
			$provinces['shen']='云南省';
		}

		$provinces['province']=$this->linkage->get_provinces();
		echo json_encode($provinces);
	}
	
	//市
	public function city()
	{
		$ip_address=$this->report->get_ipaddress($_SESSION['token']);
		//传city_id调城市
		if($this->input->get('provincecode')==NULL){
			if(isset($ip_address['region_id'])){
				$provincecode=$ip_address['region_id'];
			}else{
				$provincecode='530000';
			}
			
		}else{
			$provincecode=$this->input->get('provincecode');
		}
		
		if(isset($ip_address['city'])){
			$citys['shi']=$ip_address['city'];
		}else{
			$citys['shi']='楚雄彝族自治州';
		}
		
		$citys['city']=$this->linkage->get_city($provincecode);
		echo json_encode($citys);
	}
}
