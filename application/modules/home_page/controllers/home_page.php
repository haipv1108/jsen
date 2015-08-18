<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class Home_page extends MX_Controller {
	 public function __construct(){
		parent::__construct();
		$this->load->helper(array( 'url'));
		$this->load->model('mhome_page');
	}

	public function index(){
		$area = $this->mhome_page->get_area();
		foreach ($area as $key => $value) {
			$prefecture[$value['area_name']] = $this->mhome_page->get_prefecture($value['area_name']);
		}
		$feature_name = $this->mhome_page->get_feature_name();
		foreach ($feature_name as $key => $value) {
			$bf1 = $this->mhome_page->count_work_feature($value['feature_name']);
			$count_work_feature[$value['feature_name']] = $bf1['COUNT(work_id)'];
		}
		$ninki_area = $this->mhome_page->getninki_station();
		foreach ($ninki_area as $key => $value) {
			 $bf2 = $this->mhome_page->count_work_ninkiarea($value['id']);
			 $count_work_ninkiarea[$value['id']] = $bf2['COUNT(work_id)'];
		}
		$shop_name = $this->mhome_page->get_shop_name();
		foreach ($shop_name as $key => $value) {
			$bf3 = $this->mhome_page->count_work_feature($value['feature_name']);
			$count_work_shop[$value['feature_name']] = $bf3['COUNT(work_id)'];
		}

		$data = array(
			'area'=>$area,
			'id_body' => 'p-home',
			'prefecture' => $prefecture,
			'tempplate' => 'frontend/home/index',	
			'meta_title' => 'Home',
			'count' => $this->mhome_page->get_count_work(),
			'gwork'=> $this->mhome_page->get_gwork(),
			'ninki_area'=> $ninki_area,
			'feature_name'=>$feature_name,
			'count_work_feature' => $count_work_feature,
			'count_work_ninkiarea'=>$count_work_ninkiarea,
			'shop_name' =>$shop_name,
			'count_work_shop' =>$count_work_shop
				);
		$this->load->view('frontend/layouts/home_page',isset($data)?$data:NULL);
	}
}