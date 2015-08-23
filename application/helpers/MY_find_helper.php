<?php
defined('BASEPATH') OR exit('No direct script access allowed');

if ( ! function_exists('search_home'))
/**
	* Search on header and footer
*/
	function search_home(){
		$ci = $ get_instance();
		$this->ci->load->database();
		$query = $this->ci->query("SELECT * FROM prefecture");
		if($query->num_rows()>0)
			return $query->resutl_array();
		else return false;
	}