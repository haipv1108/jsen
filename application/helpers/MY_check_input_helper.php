<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

if(!function_exists('check_int')){
	function check_int($id){
		$id = $id<1?1:$id;
		if(!filter_var($id, FILTER_VALIDATE_INT, array('min_range'=>1)))
			$id = 1;
		return $id;
	}
}
if(!function_exists('check_string')){
	function check_string($str_id){
		
	}
}