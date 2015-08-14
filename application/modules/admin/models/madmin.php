<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Madmin extends CI_Model{
	private $_name = 'member_register';
	public function __construct(){
		parent::__construct();
		$this->load->database();
	}

	// Lay du lieu rieng theo tung phan
	public function view_user($number, $offset,$sort){
		if(isset($sort)){
			switch ($sort) {
				case 'username':
					$this->db->order_by('user_name','asc');
					break;
				case 'email':
					$this->db->order_by('mail_address','asc');
					break;
				case 'level':
					$this->db->order_by('level','asc');
					break;
				case 'gender':
					$this->db->order_by('gender','asc');
					break;
				default:
					$this->db->order_by('user_name','asc');
					break;
			}
		}
		$query = $this->db->get($this->_name,$number,$offset);
		return $query->result_array();
	}


	// Dem tong so record trong database
	function count_all(){ 
        return $this->db->count_all($this->_name); 
    } 
	
	// Tim kiem user trong database
	public function search_user($id){
		$query = $this->db->where('user_id',$id)->get($this->_name);
		if($query->row_array() > 0){
			return $query->row_array();
		}
		else return false;
	}
	
	//update user
	public function update_user($a_Userinfo){
		$a_User = $this->db->where('user_id', $a_Userinfo['user_id'])->get($this->_name);
		if($a_User->num_rows() == 1){// cho phep them
			$this->db->where('user_id', $a_Userinfo['user_id'])->update($this->_name,$a_Userinfo);
			return true;
		}
		else return false;
	}
	
	//add user
	public function add_user($a_Userinfo){
		// Kiem tra da co mail chua?
		$a_User = $this->db->where('mail_address', $a_Userinfo['mail_address'])->get($this->_name);
		if($a_User -> num_rows() > 0) $error['message_mail_address'] = "this mail was used";
		//else $error['message_mail_address'] = NULL;

		$a_User = $this->db->where('user_name', $a_Userinfo['user_name'])->get($this->_name);
		if($a_User -> num_rows() > 0) $error['message_user_name'] = "this name is already exists";
		//else $error['message_user_name'] = NULL;

		$a_User = $this->db->where('user_name_furi', $a_Userinfo['user_name_furi'])->get($this->_name);
		if($a_User -> num_rows() > 0) $error['message_user_name_furi'] = "this name is already exists";
		//else $error['message_user_name_furi'] = NULL;

		$a_User = $this->db->where('phonenumber', $a_Userinfo['phonenumber'])->get($this->_name);
		if($a_User -> num_rows() > 0) $error['message_phonenumber'] = "this phone was used";
		//else $error['message_phonenumber'] = NULL;

		if(isset($error)==TRUE) return $error;
		
		$this->db->insert($this->_name, $a_Userinfo);
		return 0;
		
	}

	public function manage_page($id){
		$_name1 = 'test';
		/*$check = $this->db->select('*')
				->from($this->_name1)
				->join('user_id', '$this->_name.id = $this->_name1.user_id')
				->get();*/
		$check = $this->db->query(
							"SELECT member_register.user_name, test.title, test.id, test.content, test.date, test.active
							FROM member_register, test 
							WHERE member_register.user_id = test.user_id AND member_register.user_id = {$id}"
							);
		if($check->num_rows()>0){
			return $check->result_array();
		}else return false;
	}

	public function publish($checkbox){
		foreach ($checkbox as $key => $value) {
			$search = $this->db->where('id', $value)->get('test');
			if($search->num_rows()>0){
			$data = array("active"=>1);
			$this->db->where('id',$value)->update('test',$data);
			}
		}
	}

	public function unpublish($checkbox){
		foreach ($checkbox as $key => $value) {
			$search = $this->db->where('id', $value)->get('test');
			if($search->num_rows()>0){
			$data = array("active"=>0);
			$this->db->where('id',$value)->update('test',$data);
			}
		}
	}


	public function delete_user($id){
		$a_User = $this->db->where('user_id', $id) ->get($this->_name);
		if($a_User->num_rows() == 1){// Tim duoc user
			$this->db->where('user_id', $id)->limit(1)->delete($this->_name);
			return true;
		}else return false;
	}
}
