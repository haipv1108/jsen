<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class Guide_line extends MX_Controller {
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
		$data['area'] = $area;
		$data['prefecture'] = $prefecture;						
		$data['tempplate'] = 'frontend/home/guide_line';		
		$this->load->view('frontend/layouts/home',isset($data)?$data:NULL);
	}
}