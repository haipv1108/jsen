<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Mguide_feature extends CI_Model{
	public function __construct(){
		parent::__construct();
		$this->load->helper('url');
		$this->load->database();
	}
	public function get_prefecture($area){
		$query = $this->db->select('prefecture_name as name, prefecture_id as id')->where('area_name',$area)->get('prefecture');
		if($query->row_array()>0)
			return $query->result_array();
		else return false;
	}
	
	public function get_area(){
		$query = $this->db->query('SELECT DISTINCT `area_name` FROM `prefecture`');
		if($query->row_array()>0)
			return $query->result_array();
		else return false;
	}
	public function get_feature($id){
		$query = $this->db->query('SELECT DISTINCT `feature_name` FROM `feature`');
		if($query->row_array()>0)
			return $query->result_array();
		else return false;
	}
}