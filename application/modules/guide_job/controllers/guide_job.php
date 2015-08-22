<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Guide_job extends MX_Controller{
	public function __construct(){
		parent::__construct();
		$this->load->helper('url');
		$this->load->model('mguide_job');
	}
	
	public function index(){
		$area = $this->mguide_job->get_area();
		if(isset($area))
			foreach ($area as $key => $value) {
				$prefecture[$value['area_name']] = $this->mguide_job->get_prefecture($value['area_name']);
			}
		$data['area'] = $area;
		$data['prefecture'] = $prefecture;						
		$data['tempplate'] = 'guide_job';		
		$this->load->view('home_page/frontend/layouts/home_page',isset($data)?$data:NULL);
	}
	public function job($id = 0){
		$job = $this->mguide_job->get_job($id);
		if(isset($job) && !empty($job)){
			$data['job'] = $job;
			$data['prefecture_id'] = $id;
		}

		if($this->input->post('submit')){
			$checkbox_job = $this->input->post('job[]');
			foreach ($checkbox_job as $key => $value) {
				$list_work [$value] = $this->mguide_job->list_work($value, $id);
				if(isset($list_work) && !empty($list_work)){
					$work_position[$value] = $this->mguide_job->work_position($value, $id);
				}else{
					$data['message'] = 'Data not found';
				}
			}
			$data = array(
								'list_work' => $list_work,
								'work_position' => $work_position
							);
			$data['tempplate'] = 'kanto/home/list_work_choose';
			$this->load->view('home_page/frontend/layouts/home_page', isset($data)?$data:NULL);
		} else {
			$data['tempplate'] = 'job';
			$this->load->view('home_page/frontend/layouts/home_page',isset($data)?$data:NULL);
		}
	}
	public function list_work($str = '', $id = 0){
		$list_work = $this->mguide_job->list_work($str, $id);
		if(isset($list_work) && !empty($list_work)){
			$data = array(
							'list_work' => $list_work,
							'work_position' => $this->mguide_job->work_position($str, $id)
						);
		}else{
			$data['message'] = 'Data not found';
		}
		print_r($data);
		$data['tempplate'] = 'kanto/home/list_work';
		$this->load->view('home_page/frontend/layouts/home_page',isset($data)?$data:NULL);
	}
}