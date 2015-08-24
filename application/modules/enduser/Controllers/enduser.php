<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class Enduser extends MX_Controller{
	public function __construct(){
		parent::__construct();
		$this->load->helper(array('url'));
		$this->load->model('menduser');
	}
	
}