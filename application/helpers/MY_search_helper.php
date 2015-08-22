<?php
defined('BASEPATH') OR exit('No direct script access allowed');

if (!function_exists('sort_work')){
/**
	* Search on header and footer
*/
	function feature_helper(){
		$ci = & get_instance();
		$ci->load->database();
		$query = $ci->db->query("SELECT DISTINCT system_work_name, count(work_id) as sl
									FROM system_work
									GROUP BY system_work_name"
							);
		if($query->num_rows()>0)
			return $query->result_array();
		else return false;
	}
	function area_name_helper(){
		$ci = & get_instance();
		$ci->load->database();
		$query = $ci->db->query("SELECT DISTINCT area_name
								FROM prefecture
								");
		if($query->num_rows()>0)
			return $query->result_array();
		else return false;
	}
}