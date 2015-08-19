<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Guide_feature extends MX_Controller{
	public function __construct(){
		parent::__construct();
		$this->load->model('mguide_feature');
	}
	
	public function index(){
		$area = $this->mguide_feature->get_area();
		if(isset($area))
			foreach ($area as $key => $value) {
				$prefecture[$value['area_name']] = $this->mguide_feature->get_prefecture($value['area_name']);
			}
		$data['area'] = $area;
		$data['prefecture'] = $prefecture;						
		$data['tempplate'] = 'guide_feature';		
		$this->load->view('home_page/frontend/layouts/home_page',isset($data)?$data:NULL);
	}
	public function feature($pre_id = 0){
		//$pre_id<1?1:$pre_id;
		$feature_name = $this->mguide_feature->get_feature_name();
		foreach ($feature_name as $key => $value) {
			$bf1 = $this->mguide_feature->count_work_feature($value['feature_name'], $pre_id);
			$count_work_feature[$value['feature_name']] = $bf1['COUNT(work_id)'];
		}
		$data = array(
			'tempplate' => 'feature',	
			'meta_title' => 'Feature',
			'feature_name'=>$feature_name,
			'count_work_feature' => $count_work_feature,
				);
		$this->load->view('home_page/frontend/layouts/home_page',isset($data)?$data:NULL);
	}
	public function list_work($feature_name = ''){
		$list_work = $this->mguide_feature->list_work($feature_name);
		if(isset($list_work) && !empty($list_work)){
			$data = array(
						'list_work' => $list_work,
						'work_position' => $this->mguide_feature->work_position($feature_name) 
						);
		} else{
			$data['message'] = 'Data not found.';
		}
		$data['tempplate'] = 'kanto/home/list_work';
		$this->load->view('home_page/frontend/layouts/home_page',isset($data)?$data:NULL);
	}
	
}