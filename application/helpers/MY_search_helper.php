<?php
defined('BASEPATH') OR exit('No direct script access allowed');

if (!function_exists('feature_helper')){
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
}
if (!function_exists('area_name_helper')){
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
if (!function_exists('count_work_helper')){
	function count_work_helper(){
		$ci = & get_instance();
		$ci->load->database();
		$query = $ci->db->query('SELECT count(DISTINCT `work_id`) as work FROM `system_work`');
		if($query->row_array()>0)
			return $query->row_array();
		else return false;
	}
}