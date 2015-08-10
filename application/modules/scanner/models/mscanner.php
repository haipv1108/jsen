<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Mscanner extends CI_Model{
	public function __construct(){
		parent::__construct();
		$this->load->database();
	}
	public function crawer(){
		$query = $this->db->query("
								SELECT DISTINCT st2.station_id, st2.line_id, st1.station_name, st2.city_id
								FROM 
									(SELECT DISTINCT station_id, station_name FROM  station1) as st1,
									(SELECT DISTINCT station1.station_id, city_id, line_id 
									FROM station1, station2
									WHERE station1.station_id = station2.station_id) as st2
								WHERE st2.station_id = st1.station_id
								");
		return $query->result_array();
	}
	public function update($data){
		/*foreach($data as $key=>$val){
			$check = $this->db->where('station_id', $data['station_id'])->get($this->_name);
			if($check->num_rows()==0){
				$this->db->update($this->_name, array(
														'station_id'=>$data['station_id'],
														'line_id' =>$data['line_id'],
														'station_name'=>$data['station_name'],
														'city_id'=>$data['city_id']
													));
			
			}
		}Khi chay tren trinh duyet, neu co bat cu truong hop in ra thong bao loi nao. Ta vao sua code, bo dau chu thich di, no se loai cho 
		ta cac truong hop trung lap. Tat nhien la time se ton hon rat nhieu. vi moi vong for lai phai kiem tra dieu kien.*/
		$check = $this->db->where('station_id', $data['station_id'])->get('station');
			if($check->num_rows()==0){
				$this->db->insert('station', array(
															'station_id'=>$data['station_id'],
															'line_id' =>$data['line_id'],
															'station_name'=>$data['station_name'],
															'city_id'=>$data['city_id']
														));
				return true;
			}
	}

	public function line(){
		$query = $this->db->query("
			SELECT DISTINCT * FROM `line_check`");
		return $query->result_array();
	}


	public function swork(){
		$query = $this->db->query("");
	}
	
	public function add($que){
		$query = $this->db->query($que);
	}
}