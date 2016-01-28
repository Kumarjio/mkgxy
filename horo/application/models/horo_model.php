<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Horo_Model extends MY_Model
{

	protected $db_main;

	public function __construct()
	{
		parent::__construct();
		$this->db_main = $this->load->database('default', TRUE);
	}//end __construct();


	public function set_location($post=array())
	{
		try {
			if (empty($post)) {
				throw new Exception('Empty Post Variables');
			}

			$sql = 'select * from horo_locations WHERE user_id = ? AND location_name = ?';
			$query = $this->db_main->query($sql, array($post['user_id'], $post['location_name']));
			$rs = $query->result_array();
			if (!empty($rs)) {
				throw new Exception('Location already exists');
			}

			$this->db_main->insert('horo_locations', $post);
			$id = $this->db_main->insert_id();
			return array('error' => 0, 'error_message' => '', 'id' => $id);
		} catch (Exception $e) {
			$array = array('error' => 1, 'error_message' => $e->getMessage());
			return $array;
		}
	}//end getRecords();

	
	public function get_location($user_id='')
	{
		try {
			if (empty($user_id)) {
				throw new Exception('choose user');
			}

			$return = array();
			$sql = 'select * from horo_locations WHERE user_id = ? order by location_name';
			$query = $this->db_main->query($sql, array($user_id));
			$return = $query->result_array();
			//while (!$rs->EOF) {
				//$return[] = $rs->fields;
				//$rs->MoveNext();
			//}

			return array('error' => 0, 'error_message' => '', 'records' => $return);
		} catch (Exception $e) {
			$array = array('error' => 1, 'error_message' => $e->getMessage());
			return $array;
		}
	}//end getRecords();
	
	public function get_location_particular($location_id='')
	{
		if (empty($location_id)) {
			throw new Exception('choose location_id');
		}

		$return = array();
		$sql = 'select * from horo_locations WHERE location_id = ?';
		$query = $this->db_main->query($sql, array($location_id));
		$return = $query->row_array();

		return $return;
	}//end getRecords();

	public function delete_location($user_id, $location_id)
	{
		try {
			if (empty($user_id)) {
				throw new Exception('choose user');
			}

			if (empty($location_id)) {
				throw new Exception('choose location');
			}

			$sql = 'delete from horo_locations WHERE user_id = ? AND location_id = ?';
			$this->db_main->query($sql, array($user_id, $location_id));

			return array('error' => 0, 'error_message' => '', 'id' => $location_id);
		} catch (Exception $e) {
			$array = array('error' => 1, 'error_message' => $e->getMessage());
			return $array;
		}
		
	}

	public function insert_birth_profile($user_id, $post)
	{
		if (empty($post)) {
			throw new Exception('Empty Post Variables');
		}

		if (empty($user_id)) {
			throw new Exception('Empty user id');
		}

		$post['user_id'] = $user_id;
		$sql = 'select * from horo_birthdetails WHERE user_id = ? AND bname = ?';
		$query = $this->db_main->query($sql, array($post['user_id'], $post['bname']));
		$rs = $query->result_array();
		if (!empty($rs)) {
			throw new Exception('Birth profile already exists');
		}

		$this->db_main->insert('horo_birthdetails', $post);
		$id = $this->db_main->insert_id();
		return $id;
	}

	
	public function get_birth_profile($user_id='')
	{
		if (empty($user_id)) {
			throw new Exception('choose user');
		}

		$return = array();
		$this->CI->load->library('Kundali');
		
		$sql = 'select * from horo_birthdetails as b LEFT JOIN horo_locations as l ON b.location_id = l.location_id WHERE b.user_id = ? order by b.bname';
		$query = $this->db_main->query($sql, array($user_id));
		$return = $query->result_array();

		if (!empty($return)) {
			foreach ($return as $k => $v) {
				$returnArr = $this->CI->kundali->precalculate($v['bmonth'], $v['bday'], $v['byear'], $v['bhour'], $v['bmin'], $v['zone_h'], $v['zone_m'], $v['lon_h'], $v['lon_m'], $v['lat_h'], $v['lat_m'], $v['dst'], $v['lon_e'], $v['lat_s']);
				$return[$k]['horo'] = $returnArr;
			}
		}

		return $return;
	}//end get_birth_profile();
	
	public function get_birth_profile_particular($user_id, $bid='')
	{
		if (empty($bid)) {
			throw new Exception('choose profile');
		}

		$return = array();
		$this->CI->load->library('Kundali');
		
		$sql = 'select * from horo_birthdetails as b LEFT JOIN horo_locations as l ON b.location_id = l.location_id WHERE b.user_id = ? AND b.bid = ?';
		$query = $this->db_main->query($sql, array($user_id, $bid));
		$return = $query->row_array();

		if (!empty($return)) {
			$v = $return;
			$returnArr = $this->CI->kundali->precalculate($v['bmonth'], $v['bday'], $v['byear'], $v['bhour'], $v['bmin'], $v['zone_h'], $v['zone_m'], $v['lon_h'], $v['lon_m'], $v['lat_h'], $v['lat_m'], $v['dst'], $v['lon_e'], $v['lat_s']);
			$return['horo'] = $returnArr;
		}

		return $return;
	}//end get_birth_profile();

	public function get_history($max=10, $start=0)
	{
		$sql = "select * from
		horo_history as h
		LEFT JOIN horo_locations as hl ON h.history_location_id = hl.location_id
		LEFT JOIN horo_birthdetails as b ON h.bid = b.bid
		LEFT JOIN horo_locations as bl ON b.location_id = bl.location_id
		LIMIT $start, $max";
		$this->db_main->from('horo_history');
		$this->db_main->where('content_type', 'public');
		$this->db_main->limit($max, $start);
		$query = $this->db_main->get();
		$rs = $query->result_array();
		$return = array();
		if (!empty($rs)) {
			foreach ($rs as $k => $v) {
				$return[] = $v;
			}
		}

		return $return;
	}
	
	//updating current location
	//horo_current_location
	
	public function updateCurrentPosition($user_id, $post)
	{
		if (empty($post)) {
			throw new Exception('Empty Post Variables');
		}

		if (empty($user_id)) {
			throw new Exception('Empty user id');
		}

		$post['user_id'] = $user_id;
		$sql = 'select * from horo_current_location WHERE user_id = ?';
		$query = $this->db_main->query($sql, array($post['user_id']));
		$rs = $query->row_array();
		if (!empty($rs)) {
			//update
			$this->db_main->where('user_id', $post['user_id']);
			$this->db_main->update('horo_current_location', $post); 
		} else {
			//insert
			$this->db_main->insert('horo_current_location', $post);
		}

		
		return array('error' => 0, 'error_message' => '', 'post' => $post);
	}
}
?>