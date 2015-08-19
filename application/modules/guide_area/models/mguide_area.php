<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Mguide_area extends CI_Model{
	
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
	
	public function get_city($id){
		$query = $this->db->query("	SELECT DISTINCT prefecture_name, city.city_id, city_name
									FROM city, prefecture
									WHERE city.prefecture_id = prefecture.prefecture_id
									AND city.prefecture_id = {$id}
								");
		if($query->num_rows()>0)
			return $query->result_array();
		else return false;
	}
	public function count_work($id){
		$query = $this->db->query("
									SELECT DISTINCT city.city_id, count(work_id) as sl 
									FROM city, station_work 
									WHERE city.prefecture_id = {$id} 
									AND station_work.city_id = city.city_id 
									GROUP BY city.city_id
								");
		if($query->num_rows()>0)
			return $query->result_array();
		else return false;
	}
	public function list_work($id, $number, $offset){
		$query = $this->db->query("
									SELECT DISTINCT station_work.work_id, work_name, work_title, work_image_url, work_guild_station, work_content1,work_time
									FROM station_work, main_work
									WHERE
										station_work.city_id = {$id}
									AND station_work.work_id = main_work.work_id
									LIMIT {$offset}, {$number}
								");
		if($query->num_rows()>0)
			return $query->result_array();
		else return false;
	}
	public function work_position($id){
		$query = $this->db->query("
									SELECT DISTINCT position_name, position_salary
									FROM station_work, position
									WHERE
										station_work.city_id = {$id}
									AND station_work.work_id = position.work_id
									LIMIT 3
								");
		if($query->num_rows()>0)
			return $query->result_array();
		else return false;
	}
}