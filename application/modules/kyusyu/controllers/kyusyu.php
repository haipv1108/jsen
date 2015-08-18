<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class Kyusyu extends MX_Controller {
	 public function __construct(){
		parent::__construct();
		$this->load->helper(array( 'url'));
		$this->load->model('mkyusyu');
	}

	public function index(){
		$area = $this->mkyusyu->get_area();
		foreach ($area as $key => $value) {
			$prefecture[$value['area_name']] = $this->mkyusyu->get_prefecture($value['area_name']);
		}
		$feature_name = $this->mkyusyu->get_feature_name();
		foreach ($feature_name as $key => $value) {
			$bf1 = $this->mkyusyu->count_work_feature($value['feature_name'],"九州・沖縄");
			$count_work_feature[$value['feature_name']] = $bf1['COUNT(work_id)'];
		}
		$ninki_area = $this->mkyusyu->getninki_station("九州・沖縄");
		foreach ($ninki_area as $key => $value) {
			 $bf2 = $this->mkyusyu->count_work_ninkiarea($value['id']);
			 $count_work_ninkiarea[$value['id']] = $bf2['COUNT(work_id)'];
		}

		$shop_name = $this->mkyusyu->get_shop_name();
		 foreach ($shop_name as $key => $value) {
		 	$bf3 = $this->mkyusyu->count_work_feature($value['feature_name'],"九州・沖縄");
		 	$count_work_shop[$value['feature_name']] = $bf3['COUNT(work_id)'];
		}

		$data = array(
			'area'=>$area,
			'id_body' => 'p-kyusyu',
			'prefecture' => $prefecture,
			'tempplate' => 'kyusyu/home/index',	
			'meta_title' => '九州・沖縄',
			'count' => $this->mkyusyu->get_count_work(),
			'gwork'=> $this->mkyusyu->get_gwork("九州・沖縄"),
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
		$list_work = $this->mkyusyu->list_work($feature_name,"九州・沖縄");
		foreach ($list_work as $key => $value) {
			$work_position[$value['work_id']]  = $this->mkyusyu->work_position($value['work_id']);
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
		$list_work = $this->mkyusyu->list_work_follow_group($gwork,"九州・沖縄");
		foreach ($list_work as $key => $value) {
			$work_position[$value['work_id']]  = $this->mkyusyu->work_position($value['work_id']);
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
		$list_work = $this->mkyusyu->list_work_follow_station($station_id);
		foreach ($list_work as $key => $value) {
			$work_position[$value['work_id']]  = $this->mkyusyu->work_position($value['work_id']);
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

	