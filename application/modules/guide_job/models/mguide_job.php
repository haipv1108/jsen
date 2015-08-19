<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Mguide_job extends CI_Model{
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
	public function get_job($id = 0){
		$query = $this->db->query("
									SELECT system_work_name, count(work_id) as sl
									FROM system_work
									GROUP BY system_work_name
									");
									/* Day moi la truy van ten chung loai cong viec, van chua co phan dem so luong cong viev (count) */
		if($query->row_array() >0)
			return $query->result_array();
		else return false;
	}
	public function list_work($str){
		$query = $this->db->query("
									SELECT DISTINCT station_work.work_id, work_name, work_title, work_image_url, work_guild_station, work_content1, work_time
									FROM station_work, main_work, system_work
									WHERE system_work_name = '{$str}' 
									AND system_work.work_id = station_work.work_id 
									AND station_work.work_id = main_work.work_id

								");
		if($query->num_rows()>0)
			return $query->result_array();
		else return false;
	}
	public function work_position($str){
		$query = $this->db->query("
									SELECT DISTINCT position_name, position_salary
									FROM system_work, position
									WHERE
										system_work_name = '{$str}'
									AND system_work.work_id = position.work_id
									LIMIT 3
								");
		if($query->num_rows()>0)
			return $query->result_array();
		else return false;
	}
}

