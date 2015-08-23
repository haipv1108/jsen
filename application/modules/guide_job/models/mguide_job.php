<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Mguide_job extends CI_Model{
	public function __construct(){
		parent::__construct();
		$this->load->database();
	}
	public function get_prefecture($area){
		$query = $this->db->select('prefecture_name as name, prefecture_id as id')->where('area_name',$area)->get('prefecture');
		if($query->row_array()>0)
			return $query->result_array();
		else return false;
	}
	
	public function get_area(){
		$query = $this->db->query('SELECT `area_name` ,`area_name_furi`,`id`  FROM `area`');
		if($query->row_array()>0)
			return $query->result_array();
		else return false;
	}
	public function get_job($id){
		$query = $this->db->query(" SELECT sw.system_work_name, table1.sl
									FROM (system_work as sw) LEFT JOIN (SELECT system_work_name, count(work_id) as sl
														FROM (system_work as sw) LEFT JOIN (prefecture as p) ON sw.prefecture_id = 										p.prefecture_id
														WHERE sw.prefecture_id = {$id}
														GROUP BY system_work_name,area_name) as table1 ON sw.system_work_name = table1.system_work_name
									GROUP BY sw.system_work_name
									");
		if($query->row_array() >0)
			return $query->result_array();
		else return false;
	}
	public function list_work($str, $id, $number = 20, $offset = 0){
		$query = $this->db->query(" SELECT DISTINCT table1.swork_id as work_id, work_name, work_title, work_title, work_image_url, work_guild_station, work_content1,work_time, position_name, position_salary
									FROM (	SELECT DISTINCT station_work.work_id as swork_id, work_name, work_title, work_image_url, work_guild_station, work_content1,work_time
											FROM station_work, main_work, system_work
											WHERE
												prefecture_id = {$id} AND system_work_name = '{$str}'
											AND station_work.work_id = main_work.work_id
											AND system_work.work_id = station_work.work_id 
										) AS table1,
									 	(	SELECT DISTINCT position.work_id as swork_id,position_name, position_salary
											FROM system_work, position
											WHERE
												prefecture_id = {$id}  AND system_work_name = '{$str}'
											AND system_work.work_id = position.work_id
										) AS table2
									WHERE table1.swork_id = table2.swork_id
									LIMIT 7		
								");
		if($query->num_rows()>0)
			return $query->result_array();
		else return false;
	}
	public function arrayCopy( $array ) {
        $result = array();
        $check =""; // kiem tra swork_id


        foreach ($array as $k => $v) {
        	$key_array = 0; // luu lai gia tri cua work bi trung
        	foreach( $v as $key => $val ) {
	        	if(strcmp($check, $val['work_id']) == 0){
	        		$key_array--; // giảm đi 1 vì nó đã bị tăng ở trong else
	        		$result[$k][$key_array]['position_name'][] = $val['position_name'];

	        		$result[$k][$key_array]['position_salary'][] = $val['position_salary'];
	        		$key_array++; // tăng lên để tiếp tục vong lặp
	        		
	        	} else{
	        		foreach ($val as $k1 => $v1) {
	        			if(strcmp($k1, 'position_name') == 0){
	        				$result[$k][$key_array][$k1] = array($v1);
	        			} elseif (strcmp($k1, 'position_salary') == 0) {
	        				$result[$k][$key_array][$k1] = array($v1);
	        			} else{
	        				$result[$k][$key_array][$k1] = $v1;
	        			}
	        		}
		        	$check = $val['work_id'];
		        	$key_array++;
		        }
	        }
        }
        return $result;
	}
	public function arrayCopy2( $array ) {
        $result = array();
        $check =""; // kiem tra swork_id
        $key_array = 0;

    	foreach( $array as $key => $val ) {
        	if(strcmp($check, $val['work_id']) == 0){
        		$key_array--;
        		$result[$key_array]['position_name'][] = $val['position_name'];

        		$result[$key_array]['position_salary'][] = $val['position_salary'];
        		$key_array++;
        		
        	} else{
        		foreach ($val as $k1 => $v1) {
        			if(strcmp($k1, 'position_name') == 0){
        				$result[$key_array][$k1] = array($v1);
        			} elseif (strcmp($k1, 'position_salary') == 0) {
        				$result[$key_array][$k1] = array($v1);
        			} else{
        				$result[$key_array][$k1] = $v1;
        			}
        		}
	        	$check = $val['work_id'];
	        	$key_array++;
	        }
        }
        return $result;
	}
}

