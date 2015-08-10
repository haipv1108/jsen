<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class Chugoku extends MX_Controller {
	 public function __construct(){
		parent::__construct();
		$this->load->helper(array( 'url'));
		$this->load->model('muser');
	}


	public function index(){
		$data = array(
			'prefecture' => $this->muser->get_prefecture('中国・四国'),
			'tempplate' => 'frontend/home/chugoku',
			'meta_title' => '中国・四国',
			'count' =>$this->muser->get_count_work(),
			'feature' => $this->muser->get_feature(),
			'gwork'=> $this->muser->get_gwork(),
			'ninki_area'=>$this->muser->getninki_station()
					);
		$this->load->view('frontend/layouts/home_prefecture',isset($data)?$data:NULL);
	}
}