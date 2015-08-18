<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class Kanto extends MX_Controller {
	 public function __construct(){
		parent::__construct();
		$this->load->helper(array( 'url'));
		$this->load->model('mkanto');
	}

	public function index(){
		$area = $this->mkanto->get_area();
		foreach ($area as $key => $value) {
			$prefecture[$value['area_name']] = $this->mkanto->get_prefecture($value['area_name']);
		}
		$feature_name = $this->mkanto->get_feature_name();
		foreach ($feature_name as $key => $value) {
			$bf1 = $this->mkanto->count_work_feature($value['feature_name'],"関東");
			$count_work_feature[$value['feature_name']] = $bf1['COUNT(work_id)'];
		}
		$ninki_area = $this->mkanto->getninki_station("関東");
		foreach ($ninki_area as $key => $value) {
			 $bf2 = $this->mkanto->count_work_ninkiarea($value['id']);
			 $count_work_ninkiarea[$value['id']] = $bf2['COUNT(work_id)'];
		}

		$shop_name = $this->mkanto->get_shop_name();
		 foreach ($shop_name as $key => $value) {
		 	$bf3 = $this->mkanto->count_work_feature($value['feature_name'],"関東");
		 	$count_work_shop[$value['feature_name']] = $bf3['COUNT(work_id)'];
		}

		$data = array(
			'area'=>$area,
			'id_body' => 'p-kanto',
			'prefecture' => $prefecture,
			'tempplate' => 'kanto/home/index',	
			'meta_title' => '関東',
			'count' => $this->mkanto->get_count_work(),
			'gwork'=> $this->mkanto->get_gwork("関東"),
			'ninki_area'=> $ninki_area,
			'feature_name'=>$feature_name,
			'count_work_feature' => $count_work_feature,
			'count_work_ninkiarea'=>$count_work_ninkiarea,
			'shop_name' =>$shop_name,
			'count_work_shop' =>$count_work_shop
				);
		$this->load->view('home_page/frontend/layouts/home_page',isset($data)?$data:NULL); 
	}

	public function feature($feature_name = 0){
		if($feature_name == 0) $feature_name = "age";
		$list_work = $this->mkanto->list_work($feature_name,"関東");
		foreach ($list_work as $key => $value) {
			$work_position[$value['work_id']]  = $this->mkanto->work_position($value['work_id']);
		}

		 if(isset($list_work) && !empty($list_work)){
		 	$data = array(
		 					'list_work' => $list_work,
		 					'work_position'=> $work_position,
		 					'tempplate' => 'kanto/home/list_work',
		 				);
		 }else{
		 	$data['message'] = 'Data not found';
		 }
		$this->load->view('home_page/frontend/layouts/home_page',isset($data)?$data:NULL);
	}

	public function special($gwork = 0){
		if($gwork == 0) $gwork = "beauty";
		$list_work = $this->mkanto->list_work_follow_group($gwork,"関東");
		foreach ($list_work as $key => $value) {
			$work_position[$value['work_id']]  = $this->mkanto->work_position($value['work_id']);
		}

		 if(isset($list_work) && !empty($list_work)){
		 	$data = array(
		 					'list_work' => $list_work,
		 					'work_position'=> $work_position,
		 					'tempplate' => 'kanto/home/list_work',
		 				);
		 }else{
		 	$data['message'] = 'Data not found';
		 }
		$this->load->view('home_page/frontend/layouts/home_page',isset($data)?$data:NULL);
	}

	public function station($station_id = 0){
		if($station_id == 0) $station_id = "69";
		$list_work = $this->mkanto->list_work_follow_station($station_id);
		foreach ($list_work as $key => $value) {
			$work_position[$value['work_id']]  = $this->mkanto->work_position($value['work_id']);
		}

		 if(isset($list_work) && !empty($list_work)){
		 	$data = array(
		 					'list_work' => $list_work,
		 					'work_position'=> $work_position,
		 					'tempplate' => 'kanto/home/list_work',
		 				);
		 }else{
		 	$data['message'] = 'Data not found';
		 }
		$this->load->view('home_page/frontend/layouts/home_page',isset($data)?$data:NULL);
	}

}

	