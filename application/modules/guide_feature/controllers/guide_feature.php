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
		$this->load->view('user/frontend/layouts/home',isset($data)?$data:NULL);
	}
	public function feature($id = 0){
		$data = array(
					'feature'=>$this->mguide_feature->get_feature($id),
					'tempplate'=>'feature'
					);
		$this->load->view('user/frontend/layouts/home',isset($data)?$data:NULL);
	}
	
}