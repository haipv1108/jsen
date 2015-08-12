<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class User extends MX_Controller {
	 public function __construct(){
		parent::__construct();
		$this->load->helper(array( 'url'));
		$this->load->model('muser');
	}

	public function index(){
		$data = array();
		$area = $this->muser->get_area();
		foreach ($area as $key => $value) {
			$prefecture[$value['area_name']] = $this->muser->get_prefecture($value['area_name']);
		}
		//$data['id_body'] = $area;
		$data['area'] = $area;
		$data['prefecture'] = $prefecture;						
		$data['tempplate'] = 'frontend/home/index';		
		$data = array(
			'area' => $area,
			'prefecture' => $prefecture,
			'tempplate' => 'frontend/home/index',	
			'meta_title' => 'Home',
			'feature' => $this->muser->get_feature(),
			'count' => $this->muser->get_count_work(),
			'feature' => $this->muser->get_feature(),
			'gwork'=> $this->muser->get_gwork(),
			'ninki_area'=>$this->muser->getninki_station()
				);
				
		$this->load->view('frontend/layouts/home',isset($data)?$data:NULL);
	}
}