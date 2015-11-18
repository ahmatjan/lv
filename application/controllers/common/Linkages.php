<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Linkages extends CI_Controller {
	
	public function __construct() {
		parent::__construct();
		$this->load->model(array('tool/linkage','tool/report'));
	}
	
	//省
	public function areas()
	{
		$ip_address=$this->report->get_ipaddress($_SESSION['token']);
		
		if(isset($ip_address['region'])){
			$provinces['shen']=$ip_address['region'];
		}else{
			$provinces['shen']='云南省';
		}

		$province=$this->linkage->get_provinces();
		//遍历省
		foreach($province as $k=>$v){//遍历省
			$city = $this->linkage->get_city($province[$k]['code']);//读取城市信息
			
			$data[$k]['p']['name']=$province[$k]['name'];//组装第一层省的名称
			$data[$k]['p']['code']=$province[$k]['code'];//组装第一层省的代码
			foreach($city as $b=>$u){//遍历城市信息
				
				$data[$k]['c'][$b]['ct']['name']=$city[$b]['name'];//组装第二层城市名称
				$data[$k]['c'][$b]['ct']['code']=$city[$b]['code'];//组装第二层城市代码
				
				$area = $this->linkage->get_area($city[$b]['code']);//通过城市代码读县份信息
				foreach($area as $m=>$n){//遍历县份信息
					$data[$k]['c'][$b]['d'][$m]['dt']['name']=$area[$m]['name'];//组装第三层县名称
					$data[$k]['c'][$b]['d'][$m]['dt']['code']=$area[$m]['code'];//组装第三层县代码
				}
			}
		}
		//var_dump($data);
		echo json_encode($data);
	}
}
