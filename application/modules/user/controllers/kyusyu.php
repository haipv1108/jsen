<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class Kyusyu extends MX_Controller {
	 public function __construct(){
		parent::__construct();
		$this->load->helper(array( 'url'));
		$this->load->model('muser');
	}

	
	public function index(){
		$data = array(
			'prefecture' => $this->muser->get_prefecture('九州・沖縄'),
			'tempplate' => 'frontend/home/kyusyu',
			'meta_title' => '九州・沖縄',
			'count' =>$this->muser->get_count_work(),
			'feature' => $this->muser->get_feature(),
			'gwork'=> $this->muser->get_gwork(),
			'ninki_area'=>$this->muser->getninki_station()
					);
		$this->load->view('frontend/layouts/home_prefecture',isset($data)?$data:NULL);
	}
}