<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Mscanner extends CI_Model{
	public function __construct(){
		parent::__construct();
		$this->load->database();
	}
	public function crawer(){
		$query = $this->db->query("
								SELECT DISTINCT st2.station_id, st2.line_id,  st2.city_id, st1.station_name
								
								FROM 
									(SELECT DISTINCT station_id, station_name FROM  station1) as st1,
									(SELECT DISTINCT station1.station_id, city_id, line_id 
									FROM station1, station2
									WHERE station1.station_id = station2.station_id) as st2
								WHERE st2.station_id = st1.station_id
								");
		return $query->result_array();
	}
	public function crawer1(){
		$query = $this->db->query("
								SELECT DISTINCT station2.station_id,station2.station_name
								FROM station1, station2
								WHERE station1.station_id = station2.station_id
								");
	}
}