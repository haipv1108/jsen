<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class Tokai extends MX_Controller {
	 public function __construct(){
		parent::__construct();
		$this->load->helper(array( 'url'));
		 
	}

	public function index(){
		$data = array(
			'id_body' => 'p-tokai',
			'tempplate' => 'frontend/home/tokai'
					);
		$this->load->view('frontend/layouts/home',isset($data)?$data:NULL);
	}
}