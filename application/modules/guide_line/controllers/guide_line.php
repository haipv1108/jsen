<?php if (!defined('BASEPATH')) eit('No direct script access allowed');

class Guide_line extends MX_Controller{
	public function __construct(){
		parent::__construct();
		$this->load->helper(array( 'url'));
		$this->load->model('mguide_line');
	}
	
	public function index(){
		$area = $this->mguide_line->get_area();
		if(isset($area))
			foreach ($area as $key => $value) {
				$prefecture[$value['area_name']] = $this->mguide_line->get_prefecture($value['area_name']);
			}
		$data['area'] = $area;
		$data['prefecture'] = $prefecture;						
		$data['tempplate'] = 'guide_line';		
		$this->load->view('home_page/frontend/layouts/home_page',isset($data)?$data:NULL);
	}
	public function line($id = 0){
		$line = $this->mguide_line->get_line($id);
		if(isset($line)){
			foreach($line as $key => $val){
				$line_name[$val['area_line_name']] = $this->mguide_line->get_line_name($val['area_line_name']);
			}
		}
		$data = array(
						'line' => $line,
						'line_name' => $line_name,
						'tempplate' =>'line'
					);
		$this->load->view('home_page/frontend/layouts/home_page',isset($data)?$data:NULL);
	}
	public function station($id = 0){
		$station = $this->mguide_line->get_station($id);
		if(isset($station)){
			$data['station'] = $station;
		}
		$data['tempplate'] = 'station';
		$this->load->view('home_page/frontend/layouts/home_page',isset($data)?$data:NULL);
	}
}