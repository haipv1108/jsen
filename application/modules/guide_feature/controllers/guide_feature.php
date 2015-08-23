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
		$data['count'] = count_work_helper();
		$this->load->view('home_page/frontend/layouts/home_page',isset($data)?$data:NULL);
	}
	public function feature($pre_id = 0){
		//$pre_id<1?1:$pre_id;
		$feature_name = $this->mguide_feature->get_feature_name();
		foreach ($feature_name as $key => $value) {
			$bf1 = $this->mguide_feature->count_work_feature($value['feature_name'], $pre_id);
			$count_work_feature[$value['feature_name']] = $bf1['COUNT(work_id)'];
		}
		
 		if($this->input->post('submit')){
 			$checkbox_feature = $this->input->post('feature[]');
			foreach ($checkbox_feature as $key => $value) {
				$list_work2[$value] = $this->mguide_feature->list_work($value, $pre_id);
			}
			$list_work = $this->mguide_feature->arrayCopy($list_work2);
			$data = array(
								'list_work' => $list_work
							);
			$data['tempplate'] = 'kanto/home/list_work_choose2';
			$this->load->view('home_page/frontend/layouts/home_page', isset($data)?$data:NULL);
 		}else {
 			$data = array(
 							'prefecture_id' => $pre_id,
 							'feature_name' => $feature_name,
 							'count_work_feature' => $count_work_feature,
							'tempplate' => 'feature',	
							'meta_title' => 'Feature',
						);
			$this->load->view('home_page/frontend/layouts/home_page',isset($data)?$data:NULL);
 		}
	}
	public function list_work($feature_name = '', $pre_id = 0){
		$list_work2 = $this->mguide_feature->list_work($feature_name, $pre_id);
		$list_work = $this->mguide_feature->arrayCopy2($list_work2);
		if(isset($list_work) && !empty($list_work)){
			$data = array(
						'list_work' => $list_work
						);
		} else{
			$data['message'] = 'Data not found.';
		}
		$data['count'] = count_work_helper();
		$data['tempplate'] = 'kanto/home/list_work_choose';
		$this->load->view('home_page/frontend/layouts/home_page',isset($data)?$data:NULL);
	}
	
}