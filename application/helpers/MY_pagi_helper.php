<?php
defined('BASEPATH') OR exit('No direct script access allowed');

if (!function_exists('config_pagination_helper')){
	function config_pagination_helper($base, $total_row){
		$config = array(
						'base_url' => base_url().$base,
						'total_rows' => $total_row,
						'per_page' => 10,
						'prev_link'  => '&lt;',
						'next_link'  => '&gt;',
						'last_link'  => 'Last',
						'first_link' => 'First',
						'use_page_numbers' => TRUE,
						);
		return $config;
	}
}
if (!function_exists('page_process_helper')){
	function page_process_helper($config, $page){
		$total_page = ceil($config["total_rows"] / $config["per_page"]);
		$num_pages = ($page > $total_page)?$total_page:$page;
		$num_pages = ($page < 1)?1:$page;
		return $num_pages;
	}
}