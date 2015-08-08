<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Muser extends CI_Model{
	private $_name = 'member_register'; //Ten bang can truy van
	public function __construct(){ 
		parent::__construct(); 
		$this->load->database();
	}
	public function a_fCheckUser($a_UserInfo){ 
		$a_User	= $this->db->select('user_id, user_name, mail_address, level')->where('user_name', $a_UserInfo['username'])->where('password', $a_UserInfo['password'])->get($this->_name); 
		if($a_User -> row_array() >0){ 
			return $a_User->row_array(); 
		} else {
			return false; 
		} 
	}
	public function register($a_Userinfo){
		$a_User = $this->db->select('email')->where('email', $a_Userinfo['email'])->get($this->_name);
		if($a_User->row_array() == 0){// cho phep them
			$this->db->insert($this->_name, array(
				'username' => $a_Userinfo['username'],
				'email' => $a_Userinfo['email'],
				'password' => $a_Userinfo['password'],
				'level' => 1
			));
			return true;
		}else{
			return false;
		}
	}
	
}