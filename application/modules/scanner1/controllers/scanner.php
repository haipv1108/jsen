<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Scanner extends MX_Controller{
	public function __construct(){
		parent::__construct();
		$this->load->model('mscanner');
	}
	// Chuc nang: in ra du lieu len trinh duyet
	public function index(){
		$data['result'] = $this->mscanner->crawer();
		$data['title'] = 'Can quet du lieu';
		$this->load->view('view',isset($data)?$data:NULL);
	}
}