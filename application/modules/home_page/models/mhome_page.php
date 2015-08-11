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


	public function get_feature(){
		$query = $this->db->query('SELECT DISTINCT `feature_name` FROM `feature`LIMIT 12');
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
		$query = $this->db->query('SELECT DISTINCT `system_work_name`as name FROM `system_work` LIMIT 12');
		if($query->row_array()>0)
			return $query->result_array();
		else return false;
	}

	public function getninki_station(){
		$query = $this->db->query('SELECT DISTINCT `station_name` as name, `station_id` as id FROM `station` LIMIT 12');
		if($query->row_array()>0)
			return $query->result_array();
		else return false;
	}

}
