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
		$data['count'] = count_work_helper();		
		$data['tempplate'] = 'guide_line';		
		$this->load->view('home_page/frontend/layouts/home_page',isset($data)?$data:NULL);
	}
	public function line($id = 0){
		$id = check_int($id);
		$line = $this->mguide_line->get_line($id);
		if(isset($line) && !empty($line)){
			foreach($line as $key => $val){
				$line_name[$val['area_line_name']] = $this->mguide_line->get_line_name($val['area_line_name']);
			}
			$data = array(
						'line' => $line,
						'line_name' => $line_name,
						'tempplate' =>'line'
					);
		}else{
			$data['message'] = 'Data not found';
		}
		$data['count'] = count_work_helper();
		$this->load->view('home_page/frontend/layouts/home_page',isset($data)?$data:NULL);
	}
	public function station($id = 0){
		$id = check_int($id);
		if($this->input->post('submit')){
			$checkbox_station = $this->input->post('station[]');
			foreach ($checkbox_station as $key => $value) {
				// Danh sach cac cong viec tong hop
				$list_work [$value] = $this->mguide_line->list_work($value);	
			}
			$list_work2 = $this->mguide_line->arrayCopy($list_work);
			$data = array(
							'list_work' => $list_work2
							);
			$data['tempplate'] = 'kanto/home/list_work_choose2';
			$this->load->view('home_page/frontend/layouts/home_page', isset($data)?$data:NULL);
		} else {
			$station = $this->mguide_line->get_station($id);
			if(isset($station) && !empty($station)){
				$data = array(
								'station' => $station,
								'count_work' => $this->mguide_line->count_work($id)
							);
			}
			$data['tempplate'] = 'station';
			$this->load->view('home_page/frontend/layouts/home_page',isset($data)?$data:NULL);
		}
	}
	public function list_work($id = 0){
		check_int($id);
		$list_work = $this->mguide_line->list_work($id);
		$list_work2 = $this->mguide_line->arrayCopy2($list_work);
		if(isset($list_work2) && !empty($list_work2)){
			$data = array(
							'list_feature'=> feature_helper(),
							'area_name_helper'=>area_name_helper()
							'area_name'=>area_name_helper(),
							'list_work' => $list_work2
						);
		}else{
			$data['message'] = 'Data not found';
		}
		$data['count'] = count_work_helper();
		$data['tempplate'] = 'kanto/home/list_work_choose';
		$this->load->view('home_page/frontend/layouts/home_page',isset($data)?$data:NULL);
	}
}