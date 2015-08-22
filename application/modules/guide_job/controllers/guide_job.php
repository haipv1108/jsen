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
		//$id = check_int($id);
		$job = $this->mguide_job->get_job($id);
		if(isset($job) && !empty($job)){
			$data['job'] = $job;
		}else{
			$data['message'] = 'Data not found';
		}

		if($this->input->post('submit')){
			$checkbox_job = $this->input->post('job[]');
			
			$this->list_work1($checkbox_job);
		} else {
			$data['tempplate'] = 'job';
			$this->load->view('home_page/frontend/layouts/home_page',isset($data)?$data:NULL);
			
		}
		//sql = select uu from wger ano = 'o' or ano = 'i'

		
	}
	public function list_work($str = ''){
		$list_work = $this->mguide_job->list_work($str);
		if(isset($list_work) && !empty($list_work)){
			$data = array(
							'list_work' => $list_work,
							'work_position' => $this->mguide_job->work_position($str)
						);
		}else{
			$data['message'] = 'Data not found';
		}
		$data['tempplate'] = 'kanto/home/list_work';
		$this->load->view('home_page/frontend/layouts/home_page',isset($data)?$data:NULL);
	}
	private function list_work1($checkbox_job){
		$list_work = $this->mguide_job->list_work1($checkbox_job);
		if(isset($list_work) && !empty($list_work)){
			$data = array(
							'list_work' => $list_work,
							'work_position' => $this->mguide_job->work_position1($checkbox_job)
						);
		} else{
			$data['message'] = 'Data not found.';
		}
		$data['tempplate'] = 'kanto/home/list_work';
		$this->load->view('home_page/frontend/layouts/home_page', isset($data)?$data:NULL);
	}
}