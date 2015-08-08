<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Auth extends CI_Session{
	
	public function __construct(){
       parent::__construct();
        $CI =& get_instance();
       $CI->load->helper('url');
       $CI->load->library('session');
       $CI->load->database();
    }
	function is_login(){
		$user = $this->session->userdata('user');
		if($user['logged_in']){
			return true;
		}else return false;
	}
}