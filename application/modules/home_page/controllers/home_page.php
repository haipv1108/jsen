<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class Home_page extends MX_Controller {
	 public function __construct(){
		parent::__construct();
		$this->load->helper(array( 'url'));
		$this->load->model('mhome_page');
	}

	public function index(){
		$data = array();
		$area = $this->mhome_page->get_area();
		foreach ($area as $key => $value) {
			$prefecture[$value['area_name']] = $this->mhome_page->get_prefecture($value['area_name']);
		}
		$data = array(
			'area'=>$area,
			'id_body' => 'p-home',
			'prefecture' => $prefecture,
			'tempplate' => 'frontend/home/index',	
			'meta_title' => 'Home',
			'feature' => $this->mhome_page->get_feature(),
			'count' => $this->mhome_page->get_count_work(),
			'gwork'=> $this->mhome_page->get_gwork(),
			'ninki_area'=>$this->mhome_page->getninki_station()
				);
		$this->load->view('frontend/layouts/home_page',isset($data)?$data:NULL);
	}
}