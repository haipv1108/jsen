<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Mwork extends CI_Model{
	public function __construct(){
		parent::__construct();
		$this->load->database();
	}
	public function work($id_str){
		$query = $this->db->query("
									SELECT DISTINCT 
											station_work.work_id, work_name, work_title, work_time, 
											work_guild_station, work_image_url, work_content1, 
											work_content2
									FROM station_work, main_work
									WHERE station_work.work_id = '{$id_str}'
									AND station_work.work_id = main_work.work_id 
									LIMIT 1
								");
		if($query->row_array() > 0){
			return $query->row_array();
		}
		else return false;
	}
	public function work_photo($id_str){
		$query = $this->db->query("
									SELECT photo_image_url, photo_title, photo_content
									FROM photo
									WHERE work_id = '{$id_str}'
									LIMIT 3
								");
		if($query->num_rows() > 0){
			return $query->result_array();
		}
		else return false;
	}
	public function work_position($id_str){
		$query = $this->db->query("
									SELECT position_name, position_content, position_salary
									FROM position 
									WHERE work_id = '{$id_str}'
									LIMIT 3
								");
		if($query->num_rows() > 0){
			return $query->result_array();
		}
		else return false;
	}
	public function work_apply($id_str){
		$query = $this->db->query("
									SELECT apply_cost, apply_shop_name, apply_time, apply_work_time, 
									apply_participants, apply_qualifications, apply_treatment
									FROM apply 
									WHERE work_id = '{$id_str}'
									LIMIT 1
								");
		if($query->row_array() > 0){
			return $query->row_array();
		}
		else return false;
	}
	public function work_feature($id_str){
		$query = $this->db->query("
									SELECT feature_list
									FROM feature
									WHERE work_id = '{$id_str}'
									LIMIT 1
								");
		if($query->row_array() > 0){
			return $query->row_array();
		}
		else return false;
	}
	
}