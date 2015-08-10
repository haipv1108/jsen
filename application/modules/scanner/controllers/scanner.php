<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Scanner extends MX_Controller{
	public function __construct(){
		parent::__construct();
		$this->load->model('mscanner');
		$this->load->helper('url');
	}

	public function load_file(){
	set_time_limit(15000);
	$MyFile = file_get_contents(base_url()."data_system_work.sql");
	$data = explode(';', $MyFile);
	foreach ($data as $key => $value) {
		if($this->mscanner->add($value)==false)
			continue;
	}
	}
	
}