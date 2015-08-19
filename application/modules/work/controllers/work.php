<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Work extends MX_Controller{
	public function __construct(){
		parent::__construct();
		$this->load->helper('url');
		$this->load->model('mwork');
	}
	public function index($id_str = ''){
		$work = $this->mwork->work($id_str);
		if(isset($work) && !empty($work)){
			$data = array(
							'work'=>$work,
							'work_position'=>$this->mwork->work_position($id_str),
							'work_apply'=>$this->mwork->work_apply($id_str),
							'work_photo'=>$this->mwork->work_photo($id_str),
							'work_feature'=>$this->mwork->work_feature($id_str)
						);
		}else{
			$data['message'] = 'Data not found';
		}
		$data['tempplate'] = 'work';
		$this->load->view('home_page/frontend/layouts/home_page', isset($data)?$data:NULL);
	}
}