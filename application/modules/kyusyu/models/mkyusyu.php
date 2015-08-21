<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Mkyusyu extends CI_Model{
	public function __construct(){
		parent::__construct();
		$this->load->database();
	}

	public function get_area(){
		$query = $this->db->query("SELECT area_name , area_name_furi, id FROM area");
		if($query->row_array()>0)
			return $query->result_array();
		else return false;
	}

	public function get_prefecture($area){
		$query = $this->db->select('prefecture_name as name, prefecture_id as id')->where('area_name',$area)->get('prefecture');
		if($query->row_array()>0)
			return $query->result_array();
		else return false;
	}

	public function get_feature_name(){
		$query = $this->db->query('SELECT DISTINCT feature_name FROM fwork GROUP BY feature_name ASC LIMIT 12');
		if($query->row_array()>0)
			return $query->result_array();
		else return false;
	}

	public function count_work_feature($feature_name,$area_name){
		$query = $this->db->query("SELECT COUNT(work_id) FROM feature,prefecture WHERE prefecture.prefecture_id = feature.prefecture_id AND feature_list LIKE '%{$feature_name}%' AND prefecture.area_name = '{$area_name}'");
		if($query ->row_array()>0)
			return $query->row_array();
		else return false;
	}

	public function getninki_station($area_name){ 
		$query = $this->db->query("SELECT DISTINCT station_name as name,station_id as id FROM station,city,prefecture WHERE station.city_id = city.city_id AND city.prefecture_id = prefecture.prefecture_id AND prefecture.area_name = '{$area_name}' LIMIT 12");
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

	public function get_shop_name(){
		$query = $this->db->query("SELECT DISTINCT feature_name FROM fwork GROUP BY feature_name DESC LIMIT 12");
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

	public function get_gwork($area_name){
		$query = $this->db->query(" SELECT DISTINCT system_work_name as name,count(work_id) as count_work 
									FROM system_work,prefecture
									WHERE system_work.prefecture_id = prefecture.prefecture_id
									AND prefecture.area_name = '{$area_name}'
									GROUP BY name LIMIT 12");
				if($query->row_array()>0)
			return $query->result_array();
		else return false;
	}
	public function count_gwork($gwork,$area_name){
		$query = $this->db->query(" SELECT count(work_id) as count_work 
									FROM system_work,prefecture
									WHERE system_work.prefecture_id = prefecture.prefecture_id
									AND prefecture.area_name = '{$area_name}'
									AND system_work.system_work_name = '{$gwork}'
									");
				if($query->row_array()>0)
			return $query->row_array();
		else return false;
	}

	public function list_work($feature_name,$area_name,$offset,$number){
		$query = $this->db->query("
								SELECT DISTINCT feature.work_id,work_name, work_title, work_image_url, work_guild_station, work_content1, work_time 
								FROM feature,prefecture,main_work
								WHERE feature.prefecture_id = prefecture.prefecture_id
								AND main_work.work_id = feature.work_id
								AND prefecture.area_name = '{$area_name}'
								AND feature.feature_list like '%{$feature_name}%'
								LIMIT $number,$offset
								");
		if($query->num_rows()>0)
			return $query->result_array();
		else return false;
	}
	public function work_position($work_id){
		$query = $this->db->query("
								SELECT DISTINCT position_name, position_salary
								FROM position
								WHERE position.work_id = '{$work_id}'
								");
		if($query->num_rows()>0)
			return $query->result_array();
		else return false;
	}

	public function list_work_follow_group($gwork,$area_name,$offset,$number){
		$query = $this->db->query(" SELECT DISTINCT system_work.work_id,work_name, work_title, work_image_url, work_guild_station, work_content1, work_time 
									FROM system_work,prefecture,main_work 
									WHERE system_work.prefecture_id = prefecture.prefecture_id 
									AND main_work.work_id = system_work.work_id 
									AND prefecture.area_name = '{$area_name}' 
									AND system_work.system_work_name = '{$gwork}' 
									LIMIT $number,$offset
									");
		if($query->row_array()>0)
			return $query->result_array();
		else return false;
	}

	public function list_work_follow_station($station_id,$offset,$number){
		$query = $this->db->query(" SELECT DISTINCT main_work.work_id,work_name, work_title, work_image_url, work_guild_station, work_content1, work_time 
									FROM main_work, station_work
									WHERE main_work.work_id = station_work.work_id
									AND station_work.station_id = {$station_id}
									LIMIT $number,$offset
									");
		if($query->row_array()>0)
			return $query->result_array();
		else return false;
	}


}
