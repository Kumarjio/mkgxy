<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Api_Model extends MY_Model
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

			$sql = 'select * from api_locations WHERE user_id = ? AND location_name = ?';
			$query = $this->db_main->query($sql, array($post['user_id'], $post['location_name']));
			$rs = $query->result_array();
			if (!empty($rs)) {
				throw new Exception('Location already exists');
			}

			$this->db_main->insert('api_locations', $post);
			$id = $this->db_main->insert_id();
			return array('error' => 0, 'error_message' => '', 'id' => $id);
		} catch (Exception $e) {
			$array = array('error' => 1, 'error_message' => $e->getMessage());
			return $array;
		}
	}//end getRecords();
	
	
	public function update_location($location_id='', $post=array())
	{
		try {
			if (empty($location_id)) {
				throw new Exception('Empty location id');
			}
			if (empty($post)) {
				throw new Exception('Empty Post Variables');
			}

			$sql = 'select * from api_locations WHERE location_id = ?';
			$query = $this->db_main->query($sql, array($location_id));
			$rs = $query->result_array();
			if (empty($rs)) {
				throw new Exception('Location does not exists');
			}
			unset($post['cache']);
			$this->db_main->where('location_id', $location_id);
			$this->db_main->update('api_locations', $post);
			return array('error' => 0, 'error_message' => '', 'location_id' => $location_id, 'post' => $post);
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
			$sql = 'select * from api_locations WHERE user_id = ? order by location_name';
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
		$sql = 'select * from api_locations WHERE location_id = ?';
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

			$sql = 'delete from api_locations WHERE user_id = ? AND location_id = ?';
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
		$sql = 'select * from api_birthdetails WHERE user_id = ? AND bname = ?';
		$query = $this->db_main->query($sql, array($post['user_id'], $post['bname']));
		$rs = $query->result_array();
		if (!empty($rs)) {
			throw new Exception('Birth profile already exists');
		}

		$this->db_main->insert('api_birthdetails', $post);
		$id = $this->db_main->insert_id();
		return $id;
	}
	
	
	public function update_birth_profile($user_id, $bid, $post)
	{
		if (empty($post)) {
			throw new Exception('Empty Post Variables');
		}

		if (empty($bid)) {
			throw new Exception('Empty birth profile id');
		}

		if (empty($user_id)) {
			throw new Exception('Empty user id');
		}

		$post['user_id'] = $user_id;
		$sql = 'select * from api_birthdetails WHERE bid = ?';
		$query = $this->db_main->query($sql, array($bid));
		$rs = $query->result_array();
		if (empty($rs)) {
			throw new Exception('Birth profile does not exists');
		}

		$this->db_main->where('bid', $bid);
		$this->db_main->update('api_birthdetails', $post);
		return true;
	}

	
	public function get_birth_profile($user_id='')
	{
		if (empty($user_id)) {
			throw new Exception('choose user');
		}

		$return = array();
		$this->CI->load->library('Kundali');
		
		$sql = 'select * from api_birthdetails as b LEFT JOIN api_locations as l ON b.location_id = l.location_id WHERE b.user_id = ? order by b.bname';
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
		
		$sql = 'select * from api_birthdetails as b LEFT JOIN api_locations as l ON b.location_id = l.location_id WHERE b.user_id = ? AND b.bid = ?';
		$query = $this->db_main->query($sql, array($user_id, $bid));
		$return = $query->row_array();

		if (!empty($return)) {
			$v = $return;
			$returnArr = $this->CI->kundali->precalculate($v['bmonth'], $v['bday'], $v['byear'], $v['bhour'], $v['bmin'], $v['zone_h'], $v['zone_m'], $v['lon_h'], $v['lon_m'], $v['lat_h'], $v['lat_m'], $v['dst'], $v['lon_e'], $v['lat_s']);
			$return['horo'] = $returnArr;
		}

		return $return;
	}//end get_birth_profile();
	
	
	public function get_birth_profileuser($user_id)
	{
		if (empty($user_id)) {
			throw new Exception('choose user');
		}

		$return = array();
		$this->CI->load->library('Kundali');
		
		$sql = 'select * from api_birthdetails as b LEFT JOIN api_locations as l ON b.location_id = l.location_id WHERE b.user_id = ?';
		$query = $this->db_main->query($sql, array($user_id));
		$return = $query->row_array();

		if (!empty($return)) {
			$v = $return;
			$returnArr = $this->CI->kundali->precalculate($v['bmonth'], $v['bday'], $v['byear'], $v['bhour'], $v['bmin'], $v['zone_h'], $v['zone_m'], $v['lon_h'], $v['lon_m'], $v['lat_h'], $v['lat_m'], $v['dst'], $v['lon_e'], $v['lat_s']);
			$return['horo'] = $returnArr;
		}

		return $return;
	}//end get_birth_profileuser();


	
	//updating current location
	//api_current_location
	
	public function updateCurrentPosition($user_id, $post)
	{
		if (empty($post)) {
			throw new Exception('Empty Post Variables');
		}

		if (empty($user_id)) {
			throw new Exception('Empty user id');
		}

		$post['user_id'] = $user_id;
		$sql = 'select * from api_current_location WHERE user_id = ?';
		$query = $this->db_main->query($sql, array($post['user_id']));
		$rs = $query->row_array();
		if (!empty($rs)) {
			//update
			$this->db_main->where('user_id', $post['user_id']);
			$this->db_main->update('api_current_location', $post); 
		} else {
			//insert
			$this->db_main->insert('api_current_location', $post);
		}

		
		return $post;
	}
	
	
	public function updateTmpCurrentPosition($phone, $post)
	{
		if (empty($post)) {
			throw new Exception('Empty Post Variables');
		}

		if (empty($phone)) {
			throw new Exception('Empty phone');
		}

		$post['phone'] = $phone;
		$sql = 'select * from tmplocation WHERE phone = ?';
		$query = $this->db_main->query($sql, array($post['phone']));
		$rs = $query->row_array();
		if (!empty($rs)) {
			//update
			$this->db_main->where('phone', $post['phone']);
			$this->db_main->update('tmplocation', $post); 
		} else {
			//insert
			$this->db_main->insert('tmplocation', $post);
		}

		
		return $post;
	}
	
	
	public function nearbyusers($user_id, $post)
	{
		$lat = $post['latitude'];
		$lon = $post['longitude'];
		$radius = $post['radius'];
		$limit = $post['limit'];
		$gender = $post['gender'];
		$fromage = $post['fromage'];
		$toage = $post['toage'];
		$marital_status = $post['marital_status'];
		$looking_for = $post['looking_for'];
		$pts = $post['pts'];
		$personalitytype = $post['personalitytype'];
		if (empty($user_id)) {
			throw new Exception('Empty user id');
		}
		if (empty($lat)) {
			throw new Exception('Empty lat');
		}
		if (empty($lon)) {
			throw new Exception('Empty lon');
		}
		$where = '';
		$params2 = array();
		if (!empty($gender)) {
			$where .= " AND u.gender = ".$this->db->escape($gender);
		}
		if (!empty($marital_status)) {
			$where .= " AND u.marital_status = ".$this->db->escape($marital_status);
		}
		if (!empty($looking_for)) {
			$where .= " AND u.looking_for = ".$this->db->escape($looking_for);
		}
		if (!empty($personalitytype)) {
			$where .= " AND u.personalitytype = ".$this->db->escape($personalitytype);
		}
		if (!empty($fromage)) {
			$fromyear = date('Y') - $fromage;
			$where .= " AND b.byear <= ".$fromyear;
		}
		if (!empty($toage)) {
			$toyear = date('Y') - $toage;
			$where .= " AND b.byear >= ".$toyear;
		}
		$post['user_id'] = $user_id;
		$sql = sprintf("select *, (ROUND(
	DEGREES(ACOS(SIN(RADIANS(?)) * SIN(RADIANS(c.latitude)) + COS(RADIANS(?)) * COS(RADIANS(c.latitude)) * COS(RADIANS(? -(c.longitude)))))*60*1.1515,2)) as distance from api_current_location as c LEFT JOIN users as u ON c.user_id = u.user_id LEFT JOIN api_birthdetails as b ON u.user_id = b.user_id LEFT JOIN api_locations as l ON b.location_id = l.location_id WHERE (ROUND(
	DEGREES(ACOS(SIN(RADIANS(?)) * SIN(RADIANS(c.latitude)) + COS(RADIANS(?)) * COS(RADIANS(c.latitude)) * COS(RADIANS(? -(c.longitude)))))*60*1.1515,2)) <= ? AND u.status = 1 $where ORDER BY distance LIMIT ?");
		$query = $this->db_main->query($sql, array($lat, $lat, $lon, $lat, $lat, $lon, $radius, $limit));
		/*echo sprintf("select *, (ROUND(
	DEGREES(ACOS(SIN(RADIANS($lat)) * SIN(RADIANS(c.latitude)) + COS(RADIANS($lat)) * COS(RADIANS(c.latitude)) * COS(RADIANS($lon -(c.longitude)))))*60*1.1515,2)) as distance from api_current_location as c LEFT JOIN users as u ON c.user_id = u.user_id LEFT JOIN api_birthdetails as b ON u.user_id = b.user_id LEFT JOIN api_locations as l ON b.location_id = l.location_id WHERE (ROUND(
	DEGREES(ACOS(SIN(RADIANS($lat)) * SIN(RADIANS(c.latitude)) + COS(RADIANS($lat)) * COS(RADIANS(c.latitude)) * COS(RADIANS($lon-(c.longitude)))))*60*1.1515,2)) <= $radius AND u.status = 1 $where ORDER BY distance LIMIT 10");
		exit;*/
		/*$sql = sprintf("select *, (ROUND(
	DEGREES(ACOS(SIN(RADIANS(".GetSQLValueString($lat, 'double').")) * SIN(RADIANS(c.latitude)) + COS(RADIANS(".GetSQLValueString($lat, 'double').")) * COS(RADIANS(c.latitude)) * COS(RADIANS(".GetSQLValueString($lon, 'double')." -(c.longitude)))))*60*1.1515,2)) as distance from api_current_location as c LEFT JOIN users as u ON c.user_id = u.user_id WHERE (ROUND(
	DEGREES(ACOS(SIN(RADIANS(".GetSQLValueString($lat, 'double').")) * SIN(RADIANS(c.latitude)) + COS(RADIANS(".GetSQLValueString($lat, 'double').")) * COS(RADIANS(c.latitude)) * COS(RADIANS(".GetSQLValueString($lon, 'double')." -(c.longitude)))))*60*1.1515,2)) <= ".GetSQLValueString($radius, 'int')." ORDER BY distance LIMIT ".$limit);
	echo $sql;exit;
		$query = $this->db_main->query($sql, array());*/
		$rs = $query->result_array();
		$return = array();
		$bd = $this->get_birth_profileuser($user_id);
		$profile = $bd;
		if (!empty($rs)) {
			foreach ($rs as $row) {
				$returnArr = $this->CI->kundali->precalculate($row['bmonth'], $row['bday'], $row['byear'], $row['bhour'], $row['bmin'], $row['zone_h'], $row['zone_m'], $row['lon_h'], $row['lon_m'], $row['lat_h'], $row['lat_m'], $row['dst'], $row['lon_e'], $row['lat_s']);
				$date = $row['byear'].'-'.$row['bmonth'].'-'.$row['bday'].' '.$row['bhour'].':'.$row['bmin'];
				$age = date('Y') - $row['byear'];
				$pts = $this->kundali->getpoints($profile['horo'][9], $returnArr[9]);
				$result_points = array('date' => $date, 'points' => $pts, 'naks' => $returnArr[7], 'ref' => $returnArr[9], 'result' => $this->kundali->interpret($pts), 'name' => $row['bname']);
				$return[] = array(
					'user_id' => $row['user_id'], 
					'username' => $row['username'], 
					'latitude' => $row['latitude'], 
					'longitude' => $row['longitude'], 
					'distance' => $row['distance'], 
					'gender' => $row['gender'], 
					'profession' => $row['profession'],
					'marital_status' => $row['marital_status'],
					'looking_for' => $row['looking_for'],
					'personalitytype' => $row['personalitytype'],
					'education' => $row['education'],
					'imageFile' => $row['imageFile'],
					'age' => $age, 
					'horo' => $returnArr, 
					'result_points' => $result_points);
			}
		}
		return $return;
	}
	
	
	public function insert_user($post=array())
	{
		$data = array();
		if (empty($post)) {
			throw new Exception('Empty Post Variables');
		}

		if (empty($post['username'])) {
			throw new Exception('Empty username');
		}
		$data['username'] = $post['username'];

		if (empty($post['email'])) {
			throw new Exception('Empty email');
		}
		$data['email'] = $post['email'];

		if (empty($post['password'])) {
			throw new Exception('Empty password');
		}
		$data['password'] = $post['password'];

		if (empty($post['name'])) {
			throw new Exception('Empty name');
		}
		$data['name'] = $post['name'];
		$data['gender'] = isset($post['gender']) ? $post['gender'] : null;
		$data['tel'] = isset($post['tel']) ? $post['tel']: null;
		$data['status'] = 1;
		$data['access'] = 'member';
		$data['marital_status'] = isset($post['marital_status']) ? $post['marital_status'] : null;
		$data['profession'] = isset($post['profession']) ? $post['profession'] : null;
		$data['looking_for'] = isset($post['looking_for']) ? $post['looking_for'] : null;
		$data['personalitytype'] = isset($post['personalitytype']) ? $post['personalitytype'] : null;
		$data['personalitytype'] = isset($post['personalitytype']) ? $post['personalitytype'] : null;
		$data['education'] = isset($post['education']) ? $post['education'] : null;
		$data['imageFile'] = isset($post['imageFile']) ? $post['imageFile'] : null;
		$sql = 'select * from users WHERE username = ? or email = ?';
		$query = $this->db_main->query($sql, array($post['username'], $post['email']));
		$rs = $query->row_array();
		if (!empty($rs)) {
			throw new Exception('Username Or Email already in our db');
		}

		$this->db_main->insert('users', $data);
		$id = $this->db_main->insert_id();
		$data['user_id'] = $id;
		return $data;
	}
	
	
	
	public function update_user($user_id='', $post=array())
	{
		$data = array();
		if (empty($user_id)) {
			throw new Exception('Empty User Id');
		}
		if (empty($post)) {
			throw new Exception('Empty Post Variables');
		}

		if (empty($post['email'])) {
			throw new Exception('Empty email');
		}
		$data['email'] = $post['email'];

		if (empty($post['name'])) {
			throw new Exception('Empty name');
		}

		$data['name'] = $post['name'];
		$data['gender'] = isset($post['gender']) ? $post['gender'] : null;
		$data['tel'] = isset($post['tel']) ? $post['tel']: null;
		$data['status'] = isset($post['status']) ? $post['status']: 1;
		$data['marital_status'] = isset($post['marital_status']) ? $post['marital_status'] : null;
		$data['profession'] = isset($post['profession']) ? $post['profession'] : null;
		$data['looking_for'] = isset($post['looking_for']) ? $post['looking_for'] : null;
		$data['personalitytype'] = isset($post['personalitytype']) ? $post['personalitytype'] : null;
		$data['personalitytype'] = isset($post['personalitytype']) ? $post['personalitytype'] : null;
		$data['education'] = isset($post['education']) ? $post['education'] : null;
		if (!empty($post['imageFile'])) {
			$data['imageFile'] = isset($post['imageFile']) ? $post['imageFile'] : null;
		}

		$this->db_main->where('user_id', $user_id);
		$this->db_main->update('users', $data);
		$sql = 'select * from users WHERE user_id = ?';
		$query = $this->db_main->query($sql, array($user_id));
		$rs = $query->row_array();
		if (empty($rs)) {
			throw new Exception('Invalid User');
		}
		return $rs;
	}
	
	public function find_user($email, $password)
	{
		$data = array();

		if (empty($email)) {
			throw new Exception('Empty email');
		}

		if (empty($password)) {
			throw new Exception('Empty password');
		}

		$sql = 'select * from users WHERE email = ? and password = ?';
		$query = $this->db_main->query($sql, array($email, $password));
		$rs = $query->row_array();
		if (empty($rs)) {
			throw new Exception('Email and password does not match.');
		}
		unset($rs['password']);
		return $rs;
	}
	
	
	public function find_user_by_id($user_id)
	{
		$data = array();

		if (empty($user_id)) {
			throw new Exception('Empty user_id');
		}
		
		$sql = 'select * from users WHERE user_id = ?';
		$query = $this->db_main->query($sql, array($user_id));
		$rs = $query->row_array();
		if (empty($rs)) {
			throw new Exception('No User Found.');
		}
		unset($rs['password']);
		return $rs;
	}
	
	
	//dbchain
	
	public function getCurrentUser()
	{
		$data = array();
		$sql = 'select * from db_chain WHERE status = "pending" order by chain_id limit 1';
		$query = $this->db_main->query($sql, array($email, $password));
		$rs = $query->row_array();
		if (empty($rs)) {
			throw new Exception('Email and password not match.');
		}
		pr($rs);
		exit;

		return $rs;
	}
}
?>