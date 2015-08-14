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
	
	public function get_city($id =0){
		$query = $this->db->query("	SELECT DISTINCT prefecture_name, city_id, city_name 
									FROM city, prefecture 
									WHERE city.prefecture_id = prefecture.prefecture_id
									AND city.prefecture_id = {$id}");
		if($query->row_array()>0)
			return $query->result_array();
		else return false;
	}
}