<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Guide_area extends MX_Controller{
	
	public function __construct(){
		parent::__construct();
		$this->load->helper(array( 'url'));
		$this->load->model('mguide_area');
	}
	
	public function index(){
		$data = array();
		$area = $this->mguide_area->get_area();
		if(isset($area))
			foreach ($area as $key => $value) {
				$prefecture[$value['area_name']] = $this->mguide_area->get_prefecture($value['area_name']);
				
			}
		$data['area'] = $area;
		$data['prefecture'] = $prefecture;						
		$data['tempplate'] = 'guide_area';		
		$this->load->view('user/frontend/layouts/home',isset($data)?$data:NULL);
	}
	
	public function city($id =0){
		//Y tuong: search tat ca city dua theo area 
		if($id >0){
			$list_city = $this->mguide_area->get_city($id);
			if(isset($list_city)){
				$data['list_city'] = $list_city;
			}
		}
		else{
			$data['message'] = 'Data not found';
		}
		$data['tempplate'] = 'city';
		$this->load->view('user/frontend/layouts/home',isset($data)?$data:NULL);
	}
}