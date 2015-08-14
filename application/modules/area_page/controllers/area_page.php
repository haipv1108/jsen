<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class Area_page extends MX_Controller {
	 public function __construct(){
		parent::__construct();
		$this->load->helper(array( 'url'));
		$this->load->model('marea_page');
	}

	public function index(){
		redirect(base_url().'kanto'); 
	}

	public function kanto(){
		$data = array();
		$area = $this->marea_page->get_area();
		foreach ($area as $key => $value) {
			$prefecture[$value['area_name']] = $this->marea_page->get_prefecture($value['area_name']);
		}
		$data = array(
			'area' => $area,
			'id_body' => 'p-kanto',
			'prefecture' => $prefecture,
			'prefecture_area' => $this->marea_page->get_prefecture('関東'),
			'tempplate' => 'area_page/home/index',
			'meta_title' => '関東',
			'count' =>$this->marea_page->get_count_work(),
			'feature' => $this->marea_page->get_feature(),
			'gwork'=> $this->marea_page->get_gwork(),
			'ninki_area'=>$this->marea_page->getninki_station()
					);
		$this->load->view('home_page/frontend/layouts/home_page',isset($data)?$data:NULL);
	}
	public function tokai(){
		$data = array();
		$area = $this->marea_page->get_area();
		foreach ($area as $key => $value) {
			$prefecture[$value['area_name']] = $this->marea_page->get_prefecture($value['area_name']);
		}
		$data = array(
			'area' => $area,
			'id_body' => 'p-tokai',
			'prefecture' => $prefecture,
			'prefecture_area' => $this->marea_page->get_prefecture('東海'),
			'tempplate' => 'area_page/home/index',
			'meta_title' => '東海',
			'count' =>$this->marea_page->get_count_work(),
			'feature' => $this->marea_page->get_feature(),
			'gwork'=> $this->marea_page->get_gwork(),
			'ninki_area'=>$this->marea_page->getninki_station()
					);
		$this->load->view('home_page/frontend/layouts/home_page',isset($data)?$data:NULL);
	}

	public function kansai(){
		$data = array();
		$area = $this->marea_page->get_area();
		foreach ($area as $key => $value) {
			$prefecture[$value['area_name']] = $this->marea_page->get_prefecture($value['area_name']);
		}
		$data = array(
			'area' => $area,
			'id_body' => 'p-kansai',
			'prefecture' => $prefecture,
			'prefecture_area' => $this->marea_page->get_prefecture('関西'),
			'tempplate' => 'area_page/home/index',
			'meta_title' => '関西',
			'count' =>$this->marea_page->get_count_work(),
			'feature' => $this->marea_page->get_feature(),
			'gwork'=> $this->marea_page->get_gwork(),
			'ninki_area'=>$this->marea_page->getninki_station()
					);
		$this->load->view('home_page/frontend/layouts/home_page',isset($data)?$data:NULL);
	}

	public function tohoku(){
		$data = array();
		$area = $this->marea_page->get_area();
		foreach ($area as $key => $value) {
			$prefecture[$value['area_name']] = $this->marea_page->get_prefecture($value['area_name']);
		}
		$data = array(
			'area' => $area,
			'id_body' => 'p-tohoku',
			'prefecture' => $prefecture,
			'prefecture_area' => $this->marea_page->get_prefecture('北海道・東北'),
			'tempplate' => 'area_page/home/index',
			'meta_title' => '北海道・東北',
			'count' =>$this->marea_page->get_count_work(),
			'feature' => $this->marea_page->get_feature(),
			'gwork'=> $this->marea_page->get_gwork(),
			'ninki_area'=>$this->marea_page->getninki_station()
					);
		$this->load->view('home_page/frontend/layouts/home_page',isset($data)?$data:NULL);
	}

	public function chugoku(){
		$data = array();
		$area = $this->marea_page->get_area();
		foreach ($area as $key => $value) {
			$prefecture[$value['area_name']] = $this->marea_page->get_prefecture($value['area_name']);
		}
		$data = array(
			'area' => $area,
			'id_body' => 'p-chugoku',
			'prefecture' => $prefecture,
			'prefecture_area' => $this->marea_page->get_prefecture('中国・四国'),
			'tempplate' => 'area_page/home/index',
			'meta_title' => '中国・四国',
			'count' =>$this->marea_page->get_count_work(),
			'feature' => $this->marea_page->get_feature(),
			'gwork'=> $this->marea_page->get_gwork(),
			'ninki_area'=>$this->marea_page->getninki_station()
					);
		$this->load->view('home_page/frontend/layouts/home_page',isset($data)?$data:NULL);
	}

	public function hokuriku(){
		$data = array();
		$area = $this->marea_page->get_area();
		foreach ($area as $key => $value) {
			$prefecture[$value['area_name']] = $this->marea_page->get_prefecture($value['area_name']);
		}
		$data = array(
			'area' => $area,
			'id_body' => 'p-hokuriku',
			'prefecture' => $prefecture,
			'prefecture_area' => $this->marea_page->get_prefecture('甲信越・北陸'),
			'tempplate' => 'area_page/home/index',
			'meta_title' => '甲信越・北陸',
			'count' =>$this->marea_page->get_count_work(),
			'feature' => $this->marea_page->get_feature(),
			'gwork'=> $this->marea_page->get_gwork(),
			'ninki_area'=>$this->marea_page->getninki_station()
					);
		$this->load->view('home_page/frontend/layouts/home_page',isset($data)?$data:NULL);
	}
	public function kyusyu(){
		$data = array();
		$area = $this->marea_page->get_area();
		foreach ($area as $key => $value) {
			$prefecture[$value['area_name']] = $this->marea_page->get_prefecture($value['area_name']);
		}
		$data = array(
			'area' => $area,
			'id_body' => 'p-kyusyu',
			'prefecture' => $prefecture,
			'prefecture_area' => $this->marea_page->get_prefecture('九州・沖縄'),
			'tempplate' => 'area_page/home/index',
			'meta_title' => '九州・沖縄',
			'count' =>$this->marea_page->get_count_work(),
			'feature' => $this->marea_page->get_feature(),
			'gwork'=> $this->marea_page->get_gwork(),
			'ninki_area'=>$this->marea_page->getninki_station()
					);
		$this->load->view('home_page/frontend/layouts/home_page',isset($data)?$data:NULL);
	}
}