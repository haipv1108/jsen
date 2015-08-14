<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Scanner extends MX_Controller{
	public function __construct(){
		parent::__construct();
		$this->load->helper("url");
	}
	public function index(){
	$MyFile = file_get_contents(base_url()."data_work_station.sql");
	print_r(var_dump(explode(' ', $MyFile)));
	}

}