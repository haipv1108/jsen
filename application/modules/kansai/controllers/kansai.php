<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class Kansai extends MX_Controller {
	 public function __construct(){
		parent::__construct();
		$this->load->helper(array( 'url'));
		$this->load->model('mkansai');
		$this->load->library(array('pagination'));
	}

	public function index(){
		$checkbox = $this->input->get('job');
		$job_search = $this->input->get('job_search');
		if(isset($job_search))
			print_r($checkbox);

		$area = $this->mkansai->get_area();
		foreach ($area as $key => $value) {
			$prefecture[$value['area_name']] = $this->mkansai->get_prefecture($value['area_name']);
		}
		$feature_name = $this->mkansai->get_feature_name();
		foreach ($feature_name as $key => $value) {
			$bf1 = $this->mkansai->count_work_feature($value['feature_name'],"関西");
			$count_work_feature[$value['feature_name']] = $bf1['COUNT(work_id)'];
		}
		$ninki_area = $this->mkansai->getninki_station("関西");
		foreach ($ninki_area as $key => $value) {
			 $bf2 = $this->mkansai->count_work_ninkiarea($value['id']);
			 $count_work_ninkiarea[$value['id']] = $bf2['COUNT(work_id)'];
		}

		$shop_name = $this->mkansai->get_shop_name();
		 foreach ($shop_name as $key => $value) {
		 	$bf3 = $this->mkansai->count_work_feature($value['feature_name'],"関西");
		 	$count_work_shop[$value['feature_name']] = $bf3['COUNT(work_id)'];
		}

		$data = array(
			'area'=>$area,
			'id_body' => 'p-kansai',
			'prefecture' => $prefecture,
			'tempplate' => 'kansai/home/index',	
			'meta_title' => '関西',
			'count' => $this->mkansai->get_count_work(),
			'gwork'=> $this->mkansai->get_gwork("関西"),
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
		$bf = $this->mkansai->count_work_feature($feature_name,'関西');
		$config = array(
						'base_url' => base_url().'kansai/feature',
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
		$list_work = $this->mkansai->list_work($feature_name,"関西",$config['per_page'],$page*$config['per_page']);
		if(isset($list_work) && !empty($list_work)){
		foreach ($list_work as $key => $value) {
			$work_position[$value['work_id']]  = $this->mkansai->work_position($value['work_id']);
		}
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

	public function special($gwork = 0,$page = 1){
	//pagination
		$bf = $this->mkansai->count_gwork($gwork,'関西');
		$config = array(
						'base_url' => base_url().'kansai/special',
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
		$list_work = $this->mkansai->list_work_follow_group($gwork,"関西",$config['per_page'],$page*$config['per_page']);
		if(isset($list_work) && !empty($list_work)){
		foreach ($list_work as $key => $value) {
			$work_position[$value['work_id']]  = $this->mkansai->work_position($value['work_id']);
		}
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

	public function station($station_id = 0, $page = 1){
		//pagination
		$bf = $this->mkansai->count_work_ninkiarea($station_id);
		$config = array(
						'base_url' => base_url().'kansai/station',
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
		$list_work = $this->mkansai->list_work_follow_station($station_id,$config['per_page'],$page*$config['per_page']);
		if(isset($list_work) && !empty($list_work)){
		foreach ($list_work as $key => $value) {
			$work_position[$value['work_id']]  = $this->mkansai->work_position($value['work_id']);
		}
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