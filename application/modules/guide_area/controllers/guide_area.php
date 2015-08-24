<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Guide_area extends MX_Controller{
	
	public function __construct(){
		parent::__construct();
		$this->load->helper(array('form', 'url'));
		$this->load->model('mguide_area');
		$this->load->library(array('pagination'));
	}
	
	public function index(){
		$area = $this->mguide_area->get_area();
		if(isset($area))
			foreach ($area as $key => $value) {
				$prefecture[$value['area_name']] = $this->mguide_area->get_prefecture($value['area_name']);
			}
		$data['area'] = $area;
		$data['prefecture'] = $prefecture;
		$data['count'] = count_work_helper();
		$data['tempplate'] = 'guide_area';		
		$this->load->view('home_page/frontend/layouts/home_page',isset($data)?$data:NULL);
	}
	
	public function city($id =0){
		//Y tuong: search tat ca city dua theo area 
		$id = check_int($id);
		$list_city = $this->mguide_area->get_city($id);
		if(isset($list_city) && !empty($list_city)){
			$data = array(
							'list_city' => $list_city,
							'count_work' => $this->mguide_area->count_work($id)
						);
		}else{
			$data['message'] = 'Data not found';
		}
		if($this->input->post('submit')){
			$checkbox_city = $this->input->post('city[]');
			foreach ($checkbox_city as $key => $value) {
				// Danh sach cac cong viec
				$list_work [$value] = $this->mguide_area->list_work($value);	
			}
			//echo '<pre>'; print_r($list_work); echo '</pre>';
			$list_work2 = $this->mguide_area->arrayCopy($list_work);
			//echo '<pre>'; print_r($list_work2); echo '</pre>';
			$data = array(
							'list_work' => $list_work2
							);
			$data['tempplate'] = 'kanto/home/list_work_choose2';
			$this->load->view('home_page/frontend/layouts/home_page', isset($data)?$data:NULL);
			
		} else {
			$data['tempplate'] = 'city';
			$this->load->view('home_page/frontend/layouts/home_page',isset($data)?$data:NULL);
		}	
		$data['count'] = count_work_helper();
		//$data['tempplate'] = 'city';
		//$this->load->view('home_page/frontend/layouts/home_page',isset($data)?$data:NULL);
	}

	
	public function list_work1($id = 0, $page = 1){
		//pagination
		$total = $this->mguide_area->count_work($id);
		$config = config_pagination_helper('guide_area/list_work', $total);
		$this->pagination->initialize($config); 
		$page = page_process_helper($config, $page);
		//end of pagination
		$offset = $page * $config['per_page'];
		$list_work = $this->mguide_area->list_work($id, $offset, $config["per_page"]);
		if(isset($list_work) && !empty($list_work)){
			$data = array(
							'list_work' => $list_work,
							'work_position'=> $this->mguide_area->work_position($id),
							'paginator'=> $this->pagination->create_links(),
							);
		}
		if($this->input->post('submit')){
			$checkbox_city = $this->input->post('city[]');
			foreach ($checkbox_city as $key => $value) {
				// Danh sach cac cong viec
				$list_work [$value] = $this->mguide_area->list_work($value);	
			}
			//echo '<pre>'; print_r($list_work); echo '</pre>';
			$list_work2 = $this->mguide_area->arrayCopy($list_work);
			//echo '<pre>'; print_r($list_work2); echo '</pre>';
			$data = array(
							'list_work' => $list_work2
							);
			$data['tempplate'] = 'kanto/home/list_work_choose2';
			$this->load->view('home_page/frontend/layouts/home_page', isset($data)?$data:NULL);
			
		} else {
			$data['tempplate'] = 'city';
			$this->load->view('home_page/frontend/layouts/home_page',isset($data)?$data:NULL);
		}	
	}

	public function list_work($id = 0, $page = 1){
		$id = $id<1?1:$id;
		/*$config = array(
						'base_url' => base_url().'guide_area/list_work',
						'total_rows' => $this->mguide_area->count_work($id),
						'per_page' => 10,
						'prev_link'  => '&lt;',
						'next_link'  => '&gt;',
						'last_link'  => 'Last',
						'first_link' => 'First',
						'use_page_numbers' => TRUE
						);
		$this->pagination->initialize($config); 
		
		$total_page = ceil($config['total_rows']/$config['per_page']);
		$page = ($page > $total_page)?$total_page:$page;
		$page = ($page < 1)?1:$page;
		$list_work = $this->mguide_area->list_work($id, $page,$page*$config['per_page']);
		*/
		$list_work = $this->mguide_area->list_work($id);
		//echo '<pre>'; print_r($list_work); echo '</pre>';
		$list_work2 = $this->mguide_area->arrayCopy2($list_work);
			//echo '<pre>'; print_r($list_work2); echo '</pre>';
		if(isset($list_work2) && !empty($list_work2)){
			$data = array(
							'list_work' => $list_work2
							//'paginator' => $this->pagination->create_links(),
						);
		}else{
			$data['message'] = 'Data not found';
		}
		$data['count'] = count_work_helper();
		$data['tempplate'] = 'kanto/home/list_work_choose';
		$this->load->view('home_page/frontend/layouts/home_page',isset($data)?$data:NULL);
	}
}