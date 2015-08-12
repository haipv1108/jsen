<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class Tokai extends MX_Controller {
	 public function __construct(){
		parent::__construct();
		$this->load->helper(array( 'url'));
		$this->load->model('muser');
	}

	public function index(){
		$data = array(
			'id_body' => 'p-tokai',
			'prefecture'=>$this->muser->get_prefecture('東海'),
			'tempplate' => 'frontend/home/tokai',
			'meta_title' => '東海',
			'feature' => $this->muser->get_feature(),
			'count' => $this->muser->get_count_work(),
			'feature' => $this->muser->get_feature(),
			'gwork'=> $this->muser->get_gwork(),
			'ninki_area'=>$this->muser->getninki_station()
					);
		$this->load->view('frontend/layouts/home_prefecture',isset($data)?$data:NULL);
	}
}