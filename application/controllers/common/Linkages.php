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
		
		if(!empty($ip_address['region_id'])){
			$region_id = $ip_address['region_id'];
		}else{
			$region_id = '530000';
		}
		
		if(!empty($ip_address['city_id'])){
			$city_id = $ip_address['city_id'];
		}else{
			$city_id = '532300';
		}

		$province=$this->linkage->get_provinces();
		$province = $this->sort_array($province,$region_id);
		//遍历省
		foreach($province as $k=>$v){//遍历省
			if($province[$k]['code'] == $region_id){
				$city = $this->linkage->get_city($province[$k]['code']);//读取城市信息
				$city=$this->sort_array($city,$city_id);
			}else{
				$city = $this->linkage->get_city($province[$k]['code']);//读取城市信息
			}
			
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
	
	//对数组进行排序，把当前所在省，市，县排在最前面
	public function sort_array($arr=array(),$val_code=''){
		
		if(is_array($arr) && !empty($arr) && isset($val_code)){
			$count=count($arr);
			for($i=1;$i<$count;$i++){
				if($arr[$i]['code'] == $val_code){
					$arr1[]=$arr[$i];
					unset($arr[$i]);
				}
			}
			$arr=array_merge($arr1,$arr);
		}
		return $arr;
	}
}
