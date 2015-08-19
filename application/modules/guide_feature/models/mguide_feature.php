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
		$query = $this->db->query('SELECT `area_name` ,`area_name_furi`,`id`  FROM `area`');
		if($query->row_array()>0)
			return $query->result_array();
		else return false;
	}
	public function get_feature_name(){
		$query = $this->db->query("SELECT DISTINCT feature_name FROM fwork");
		if($query->row_array()>0)
			return $query->result_array();
		else return false;
	}
	public function count_work_feature($feature_name, $pre_id){
		$query = $this->db->query("SELECT COUNT(work_id) FROM feature WHERE feature_list like '%{$feature_name}%' AND prefecture_id = {$pre_id}");
		if($query ->row_array()>0)
			return $query->row_array();
		else return false;
	}
	public function list_work($feature_name){
		$query = $this->db->query("	SELECT DISTINCT feature.work_id,work_name, work_title, work_image_url, work_guild_station, work_content1, work_time
									FROM feature, main_work
									WHERE
										feature_list like '%{$feature_name}%'
									AND feature.work_id = main_work.work_id
								");
		if($query->num_rows()>0){
			return $query->result_array();
		}else return false;
	}
	public function work_position($feature_name){
		$query = $this->db->query("	SELECT DISTINCT position_name, position_salary
									FROM feature, position
									WHERE
										feature_list like '%{$feature_name}%'
									AND feature.work_id = position.work_id
									LIMIT 3
								");
		if($query->num_rows()>0){
			return $query->result_array();
		}else return false;
	}
	
}