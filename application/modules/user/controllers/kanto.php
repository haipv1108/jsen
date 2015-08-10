<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class Kanto extends MX_Controller {
	 public function __construct(){
		parent::__construct();
		$this->load->helper(array( 'url'));
		$this->load->model('muser');
	}

	public function index(){
		$data = array(
			'id_body' => 'p-kanto',
			'prefecture' => $this->muser->get_prefecture('関東'),
			'tempplate' => 'frontend/home/kanto'
					);
		$this->load->view('frontend/layouts/home',isset($data)?$data:NULL);
	}
}