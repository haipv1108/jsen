<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Scanner extends MX_Controller{
	public function __construct(){
		parent::__construct();
		$this->load->model('mscanner');
	}
	// Chuc nang: in ra du lieu len trinh duyet
	public function index(){
		$result = $this->mscanner->crawer();
		if(isset($result['station_id'])) print_r($result);
		/*$data = array(
						'station_id' => $result['station_id'],
						'line_id' => $result['line_id'],
						'station_name' => $result['station_name'],
						'city_id' => $result['city_id']
					);
		$check = $this->mscanner->update($data);
		if($check) echo 'Thanh cmn cong roi.';
		else echo 'co loi xay cmna roi.';*/
	}
}