<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class Hokuriku extends MX_Controller {
	 public function __construct(){
		parent::__construct();
		$this->load->helper(array( 'url'));
		$this->load->model('muser');
	}

	public function index(){
		$data = array(
			'tempplate' => 'frontend/home/hokuriku',
			'prefecture' => $this->muser->get_prefecture('北海道・東北')
					);
		$this->load->view('frontend/layouts/home',isset($data)?$data:NULL);
	}
}
