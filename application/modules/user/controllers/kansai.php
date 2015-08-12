<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class Kansai extends MX_Controller {
	 public function __construct(){
		parent::__construct();
		$this->load->helper(array( 'url'));
		$this->load->model('muser'); 
	}

	public function index(){
		$data = array(
			'id_body' => 'p-kansai',
			'tempplate' => 'frontend/home/kansai',
			'prefecture'=>$this->muser->get_prefecture('関西'),
			'meta_title' => '関西',
			'feature' => $this->muser->get_feature(),
			'count' => $this->muser->get_count_work(),
			'feature' => $this->muser->get_feature(),
			'gwork'=> $this->muser->get_gwork(),
			'ninki_area'=>$this->muser->getninki_station()
					);
		
		$this->load->view('frontend/layouts/home_prefecture',isset($data)?$data:NULL);
	}
}