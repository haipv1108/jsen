<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Mmember extends CI_Model{
	private $_name ='test';
	public function __construct(){
		parent::__construct();
		$this->load->database();
	}
	
	/*public function get_feature(){
		//$this->db->select("feature_name");
		$this->_name = "feature";
		$query = $this->db->get($this->_name);
		return $query->result_array();
	}*/
	public function add($data){
		$this->db->insert($this->_name, $data);
	}
	
	// Lay du lieu rieng theo tung phan
	public function view_article($number, $offset, $sort){
		if(isset($sort)){
			switch ($sort) {
				case 'title':
					$this->db->order_by('title','asc');
					break;
				case 'createon':
					$this->db->order_by('date','asc');
					break;
				case 'content':
					$this->db->order_by('content','asc');
					break;
				default:
					$this->db->order_by('date','asc');
					break;
			}
			//$this->db->order_by($sort);
		}
		$query = $this->db->limit($number,$offset)->get($this->_name);
		return $query->result_array();
	}
	
	// Dem tong so record trong database
	function count_all(){ 
        return $this->db->count_all_results($this->_name); 
    }
	
	// kiem tra page_id da co chua?
	public function search_page($work_id){
		$query = $this->db->select('*')->where('id',$work_id)->get($this->_name);
		if ($query->row_array()>0) {
			return $query->row_array();
		}else{
			return false;
		}
	}
	// update page
	public function edit_page($page_info){
		$a_page = $this->db->where('id',$page_info['id'])->get($this->_name);
		if($a_page ->row_array() > 1){
			$this->db->where('id', $page_info['id'])->update($this->_name,$page_info);
			return true;
		}else return false;
	}
	public function delete_page($work_id){
		$this->db->where('id', $work_id)->limit(1)->delete($this->_name);
		return true;
	}
	public function edit_profile($a_Userinfo){
		$_name1 = 'ci_user';
		$check = $this->db->where('email', $a_Userinfo['e_mail'])->get('ci_user');
		if($check ->num_rows() ==1){
			$this->db->where('email',$a_Userinfo['e_mail'])
			->update('ci_user', array('username'=>$a_Userinfo['username'],'email'=>$a_Userinfo['email']));
			return true;
		}
		else return false;
	}
}
