<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class Kanto extends MX_Controller {
	 public function __construct(){
		parent::__construct();
		$this->load->helper(array( 'url'));
		$this->load->model('muser');
	}

	public function index(){
		$data = array(
			'prefecture' => $this->muser->get_prefecture('関東'),
			'tempplate' => 'frontend/home/kanto',
			'meta_title' => '関東',
			'count' =>$this->muser->get_count_work(),
			'feature' => $this->muser->get_feature(),
			'gwork'=> $this->muser->get_gwork(),
			'ninki_area'=>$this->muser->getninki_station()
					);
		$this->load->view('frontend/layouts/home_prefecture',isset($data)?$data:NULL);
	}
}