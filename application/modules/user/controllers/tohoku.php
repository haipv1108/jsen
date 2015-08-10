<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class Tohoku extends MX_Controller {
	 public function __construct(){
		parent::__construct();
		$this->load->helper(array( 'url'));
		 
	}

	public function index(){
		$data = array(
			'id_body' => 'p-tohoku',
			'tempplate' => 'frontend/home/tohoku'
					);
		$this->load->view('frontend/layouts/home',isset($data)?$data:NULL);
	}
}