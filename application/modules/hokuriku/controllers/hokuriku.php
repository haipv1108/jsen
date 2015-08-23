<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class Hokuriku extends MX_Controller {
	 public function __construct(){
		parent::__construct();
		$this->load->helper(array( 'url'));
		$this->load->model('mhokuriku');
		$this->load->library(array('pagination'));
	}

	public function index(){
		$checkbox = $this->input->get('job');
		$job_search = $this->input->get('job_search');
		if(isset($job_search))
			print_r($checkbox);

		$area = $this->mhokuriku->get_area();
		foreach ($area as $key => $value) {
			$prefecture[$value['area_name']] = $this->mhokuriku->get_prefecture($value['area_name']);
		}
		$feature_name = $this->mhokuriku->get_feature_name();
		foreach ($feature_name as $key => $value) {
			$bf1 = $this->mhokuriku->count_work_feature($value['feature_name'],"甲信越・北陸");
			$count_work_feature[$value['feature_name']] = $bf1['COUNT(work_id)'];
		}
		$ninki_area = $this->mhokuriku->getninki_station("甲信越・北陸");
		foreach ($ninki_area as $key => $value) {
			 $bf2 = $this->mhokuriku->count_work_ninkiarea($value['id']);
			 $count_work_ninkiarea[$value['id']] = $bf2['COUNT(work_id)'];
		}

		$shop_name = $this->mhokuriku->get_shop_name();
		 foreach ($shop_name as $key => $value) {
		 	$bf3 = $this->mhokuriku->count_work_feature($value['feature_name'],"甲信越・北陸");
		 	$count_work_shop[$value['feature_name']] = $bf3['COUNT(work_id)'];
		}

		$data = array(
			'area'=>$area,
			'id_body' => 'p-hokuriku',
			'prefecture' => $prefecture,
			'tempplate' => 'hokuriku/home/index',	
			'meta_title' => '甲信越・北陸',
			'count' => count_work_helper(),
			'gwork'=> $this->mhokuriku->get_gwork("甲信越・北陸"),
			'ninki_area'=> $ninki_area,
			'feature_name'=>$feature_name,
			'count_work_feature' => $count_work_feature,
			'count_work_ninkiarea'=>$count_work_ninkiarea,
			'shop_name' =>$shop_name,
			'count_work_shop' =>$count_work_shop
				);
		$this->load->view('home_page/frontend/layouts/home_page',isset($data)?$data:NULL); 
	}

	public function feature($feature_name = 0, $page = 1){
	// pagination
		$bf = $this->mhokuriku->count_work_feature($feature_name,'甲信越・北陸');
		$config = array(
						'base_url' => base_url().'hokuriku/feature',
						'total_rows' => $bf['COUNT(work_id)'],
						'per_page' => 10,
						'prev_link'  => '&lt;',
						'next_link'  => '&gt;',
						'last_link'  => 'Last',
						'first_link' => 'First',
						'use_page_numbers' => TRUE
						);
            $this->pagination->initialize($config); 
			$total_page = ceil($config['total_rows']/$config['per_page']);
			$page = ($page > $total_page)?$total_page:$page;
			$page = ($page < 1)?1:$page;
			//$page = $page - 1;
	//end of pagination
		$list_work = $this->mhokuriku->list_work($feature_name,"甲信越・北陸",$config['per_page'],$page*$config['per_page']);
		if(isset($list_work) && !empty($list_work)){
		foreach ($list_work as $key => $value) {
			$work_position[$value['work_id']]  = $this->mhokuriku->work_position($value['work_id']);
		}
	}
		 if(isset($list_work) && !empty($list_work)){
		 	$data = array(
		 					'list_work' => $list_work,
		 					'work_position'=> $work_position,
		 					'tempplate' => 'kanto/home/list_work',
							'count' => count_work_helper(),
							'current_page' => $page,
							'total_page' => $total_page,
							'area_name'=>'hokuriku',
							'page'=> 'feature',
							'page_name' => $feature_name
		 				);
		 }else{
		 	$data['message'] = 'Data not found';
		 }
		$this->load->view('home_page/frontend/layouts/home_page',isset($data)?$data:NULL);
	}

	public function special($gwork = 0,$page = 1){
	//pagination
		$bf = $this->mhokuriku->count_gwork($gwork,'甲信越・北陸');
		$config = array(
						'base_url' => base_url().'hokuriku/special',
						'total_rows' => $bf['count_work'],
						'per_page' => 10,
						'prev_link'  => '&lt;',
						'next_link'  => '&gt;',
						'last_link'  => 'Last',
						'first_link' => 'First',
						'use_page_numbers' => TRUE
						);
            $this->pagination->initialize($config); 
			$total_page = ceil($config['total_rows']/$config['per_page']);
			$page = ($page > $total_page)?$total_page:$page;
			$page = ($page < 1)?1:$page;
	//end of pagination
		$list_work = $this->mhokuriku->list_work_follow_group($gwork,"甲信越・北陸",$config['per_page'],$page*$config['per_page']);
		if(isset($list_work) && !empty($list_work)){
		foreach ($list_work as $key => $value) {
			$work_position[$value['work_id']]  = $this->mhokuriku->work_position($value['work_id']);
		}
	}
		 if(isset($list_work) && !empty($list_work)){
		 	$data = array(
		 					'list_work' => $list_work,
		 					'work_position'=> $work_position,
		 					'tempplate' => 'kanto/home/list_work',
							'current_page' => $page,
							'total_page' => $total_page,
							'area_name'=>'hokuriku',
							'page'=> 'special',
							'page_name' => $gwork
		 				);
		 }else{
			$data['count'] = count_work_helper();
		 	$data['message'] = 'Data not found';
		 }
		$this->load->view('home_page/frontend/layouts/home_page',isset($data)?$data:NULL);
	}

	public function station($station_id = 0, $page = 1){
		//pagination
		$bf = $this->mhokuriku->count_work_ninkiarea($station_id);
		$config = array(
						'base_url' => base_url().'hokuriku/station',
						'total_rows' => $bf['COUNT(work_id)'],
						'per_page' => 10,
						'prev_link'  => '&lt;',
						'next_link'  => '&gt;',
						'last_link'  => 'Last',
						'first_link' => 'First',
						'use_page_numbers' => TRUE
						);
            $this->pagination->initialize($config); 
			$total_page = ceil($config['total_rows']/$config['per_page']);
			$page = ($page > $total_page)?$total_page:$page;
			$page = ($page < 1)?1:$page;
	//end of pagination
		$list_work = $this->mhokuriku->list_work_follow_station($station_id,$config['per_page'],$page*$config['per_page']);
		if(isset($list_work) && !empty($list_work)){
		foreach ($list_work as $key => $value) {
			$work_position[$value['work_id']]  = $this->mhokuriku->work_position($value['work_id']);
		}
	}
		 if(isset($list_work) && !empty($list_work)){
		 	$data = array(
		 					'list_work' => $list_work,
		 					'work_position'=> $work_position,
		 					'tempplate' => 'kanto/home/list_work',
		 					'current_page' => $page,
							'total_page' => $total_page,
							'area_name'=>'hokuriku',
							'page'=> 'station',
							'page_name' => $station_id
		 				);
		 }else{
		 	$data['message'] = 'Data not found';
		 }
		$data['count'] = count_work_helper();
		$this->load->view('home_page/frontend/layouts/home_page',isset($data)?$data:NULL);
	}

}