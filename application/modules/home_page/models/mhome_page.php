<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Mhome_page extends CI_Model{
	public function __construct(){
		parent::__construct();
		$this->load->database();
	}

	public function get_prefecture($area){
		$query = $this->db->select('prefecture_name as name, prefecture_id as id')->where('area_name',$area)->get('prefecture');
		if($query->row_array()>0)
			return $query->result_array();
		else return false;
	}

	public function get_area(){
		$query = $this->db->query('SELECT `area_name` ,`area_name_furi`,`id`  FROM `area`');
		if($query->row_array()>0)
			return $query->result_array();
		else return false;
	}

	public function get_count_work(){
		$query = $this->db->query('SELECT count(DISTINCT `work_id`) as work FROM `system_work`');
		if($query->row_array()>0)
			return $query->row_array();
		else return false;
	}

	public function get_gwork(){
		$query = $this->db->query('SELECT DISTINCT system_work_name as name,count(work_id) as count_work FROM system_work GROUP BY name LIMIT 12');
		if($query->row_array()>0)
			return $query->result_array();
		else return false;
	}
		public function count_work_feature($feature_name){
		$query = $this->db->query("SELECT COUNT(work_id) FROM feature WHERE feature_list like '%{$feature_name}%'");
		if($query ->row_array()>0)
			return $query->row_array();
		else return false;
	}

	public function getninki_station(){
		$query = $this->db->query('SELECT DISTINCT `station_name` as name, `station_id` as id FROM `station` LIMIT 12');
		if($query->row_array()>0)
			return $query->result_array();
		else return false;
	}

	public function count_work_ninkiarea($station_id){
		$query = $this ->db->query("SELECT COUNT(work_id) FROM station_work WHERE station_id = {$station_id}");
		if ($query->row_array()>0) 
			return $query->row_array();
		else return false;
	}

	public function get_feature_name(){
		$query = $this->db->query("SELECT DISTINCT feature_name FROM fwork GROUP BY feature_name ASC LIMIT 12");
		if ($query->row_array()>0)
			return $query->result_array();	
		else return false;
	}

	public function get_shop_name(){
		$query = $this->db->query("SELECT DISTINCT feature_name FROM fwork GROUP BY feature_name DESC LIMIT 12");
		if($query->row_array()>0)
			return $query->result_array();
		else return false;
	}

}
