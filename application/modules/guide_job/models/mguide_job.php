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
									SELECT system_work_name
									FROM `system_work`
									GROUP BY system_work_name
									");
									/* Day moi la truy van ten chung loai cong viec, van chua co phan dem so luong cong viev (count) */
		if($query->row_array() >0)
			return $query->result_array();
		else return false;
	}
}

