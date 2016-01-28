<?php
/*
URLS
city data
http://mkgalaxy.com/horo/api?action=findcitybyid&city_id=100002

nearby cities
http://mkgalaxy.com/horo/api.php?action=nearby&lat=37.3393857&lng=-121.8949555

cityMatch using lat and lng
http://mkgalaxy.com/horo/api.php?action=cityMatch&lat=37.3393857&lng=-121.8949555

find city
http://mkgalaxy.com/horo/api.php?action=findCity&q=san+jose

match
http://mkgalaxy.com/horo/api.php?action=match&from[dob]=1974-06-05+12:30:00&from[zone_h]=5&from[zone_m]=30&from[lon_h]=72&from[lon_m]=49&from[lat_h]=18&from[lat_m]=57&from[dst]=0&from[lon_e]=1&from[lat_s]=0&to[dob]=2016-01-08+17:30:00&to[zone_h]=8&to[zone_m]=0&to[lon_h]=121&to[lon_m]=13&to[lat_h]=37&to[lat_m]=48&to[dst]=1&to[lon_e]=0&to[lat_s]=0

matchMultiple
http://mkgalaxy.com/horo/api.php?action=matchMultiple&data[0][from][dob]=1974-06-05+12:30:00&data[0][from][zone_h]=5&data[0][from][zone_m]=30&data[0][from][lon_h]=72&data[0][from][lon_m]=49&data[0][from][lat_h]=18&data[0][from][lat_m]=57&data[0][from][dst]=0&data[0][from][lon_e]=1&data[0][from][lat_s]=0&data[0][to][dob]=2016-01-08+17:30:00&data[0][to][zone_h]=8&data[0][to][zone_m]=0&data[0][to][lon_h]=121&data[0][to][lon_m]=13&data[0][to][lat_h]=37&data[0][to][lat_m]=48&data[0][to][dst]=1&data[0][to][lon_e]=0&data[0][to][lat_s]=0


http://mkgalaxy.com/horo/api.php?action=matchMultiple&data[0][from][dob]=1974-06-05+12:30:00&data[0][from][zone_h]=5&data[0][from][zone_m]=30&data[0][from][lon_h]=72&data[0][from][lon_m]=49&data[0][from][lat_h]=18&data[0][from][lat_m]=57&data[0][from][dst]=0&data[0][from][lon_e]=1&data[0][from][lat_s]=0&data[0][to][dob]=2016-01-08+17:30:00&data[0][to][zone_h]=8&data[0][to][zone_m]=0&data[0][to][lon_h]=121&data[0][to][lon_m]=13&data[0][to][lat_h]=37&data[0][to][lat_m]=48&data[0][to][dst]=1&data[0][to][lon_e]=0&data[0][to][lat_s]=0&data[1][from][dob]=1974-06-05+12:30:00&data[1][from][zone_h]=5&data[1][from][zone_m]=30&data[1][from][lon_h]=72&data[1][from][lon_m]=49&data[1][from][lat_h]=18&data[1][from][lat_m]=57&data[1][from][dst]=0&data[1][from][lon_e]=1&data[1][from][lat_s]=0&data[1][to][dob]=2015-01-08+17:30:00&data[1][to][zone_h]=8&data[1][to][zone_m]=0&data[1][to][lon_h]=121&data[1][to][lon_m]=13&data[1][to][lat_h]=37&data[1][to][lat_m]=48&data[1][to][dst]=1&data[1][to][lon_e]=0&data[1][to][lat_s]=0

*/
$hideLayout = true;
$return = array();
$return['success'] = 1;
try {

include('Kundali.class.php');
# FileName="Connection_php_mysql.htm"
# Type="MYSQL"
# HTTP="true"
$hostname_connMain = "localhost";
$database_connMain = "consultl_mkgxymain";
$username_connMain = "consultl_user";
$password_connMain = "passwords123";
$connMain = mysql_connect($hostname_connMain, $username_connMain, $password_connMain) or trigger_error(mysql_error(),E_USER_ERROR);
mysql_select_db($database_connMain, $connMain) or die('could not select db');
$dsn_connMain = 'mysql:dbname='.$database_connMain.';host='.$hostname_connMain;

//adodb try
define('BASE_DIR', dirname(__FILE__));
include(BASE_DIR.'/adodb/adodb.inc.php');

$ADODB_CACHE_DIR = BASE_DIR.'/cache/ADODB_cache';
$connMainAdodb = ADONewConnection('mysql');
$connMainAdodb->Connect($hostname_connMain, $username_connMain, $password_connMain, $database_connMain);
//$connAdodb->LogSQL();consultl_user, passwords123


class App_base
{
    protected $_connMain;

    public $return = array();
    
    public function __construct()
    {
        global $connMainAdodb;
        $this->_connMain = $connMainAdodb;
        $this->_connMain->SetFetchMode(ADODB_FETCH_ASSOC);
        if (!empty($_GET['debug']) && $_GET['debug'] == 1) {
          $this->_connMain->debug = true;
        }
        //$this->_connMain->debug = true;
    }

    public function qstr($value)
    {
        return $this->_connMain->qstr($value);
    }

}

class Models_General extends App_base
{
    public $sql;

    public function addDetails($tableName, $data=array())
    {
      $insertSQL = $this->_connMain->AutoExecute($tableName, $data, 'INSERT');
      $id = $this->_connMain->Insert_ID();
      return $id;
    }

    public function updateDetails($tableName, $data=array(), $where='')
    {
      if (empty($where)) {
          throw new Exception('could not update');
      }
      $updateSQL = $this->_connMain->AutoExecute($tableName, $data, 'UPDATE', $where);
      return true;
    }

    public function deleteDetails($query, $params=array())
    {
      $delete = $this->_connMain->Execute($query, $params);
      return true;
    }

  public function getDetails($tableName, $cache=1, $params=array(), $cacheTime=300)
  {
    if (empty($cacheTime)) {
        $cacheTime = !empty($params['cacheTime']) ? $params['cacheTime'] : '300';
    }
    if (!empty($params['query']) && isset($params['parameters'])) {
      $this->sql = $params['query'];

      if ($cache) {
        $result = $this->_connMain->CacheExecute($cacheTime, $params['query'], $params['parameters']);
      } else {
        $result = $this->_connMain->Execute($params['query'], $params['parameters']);
      }
    } else {
      $where = !empty($params['where']) ? $params['where'] : '';
      $group = !empty($params['group']) ? $params['group'] : '';
      $order = !empty($params['order']) ? $params['order'] : '';
      $fields = !empty($params['fields']) ? $params['fields'] : '*';
      $limit = !empty($params['limit']) ? $params['limit'] : '';
      $sql = "SELECT $fields FROM $tableName WHERE 1 $where $group $order $limit";
      $this->sql = $sql;
      if ($cache) {
        $result = $this->_connMain->CacheExecute($cacheTime, $sql);
      } else {
        $result = $this->_connMain->Execute($sql);
      }
    }
    $return = array();
    while (!$result->EOF) {
        $return[] = $result->fields;
        $result->MoveNext();
     }
    return $return;
  }

  public function clearCache($sql, $inputArr=array())
  {
      $this->_connMain->CacheFlush($sql, $inputArr);
      return true;
  }
  
  public function fetchRow($query, $params, $cacheTime=300)
  {
    $data = array();
    $data['query'] = $query;
    $data['parameters'] = $params;
    $row = $this->getDetails('', ($cacheTime > 0), $data, $cacheTime);
    if (!empty($row)) {
      $row = $row[0];
    }
    return $row;
  }
  
  public function fetchAll($query, $params, $cacheTime=300)
  {
    $data = array();
    $data['query'] = $query;
    $data['parameters'] = $params;
    $result = $this->getDetails('', ($cacheTime > 0), $data, $cacheTime);
    return $result;
  }
  
}

//Model Geo
class Models_Geo extends App_base
{
  
  public function __construct()
  {
    parent::__construct();
    $this->_connMain->Execute("SET NAMES utf8");
  }
  
  
  public function getCountryDetails($id, $cache=1)
  {
    $sql = sprintf("SELECT * FROM geo_countries WHERE con_id=%s", $this->qstr($id));
    if ($cache) {
      $result = $this->_connMain->CacheExecute(300, $sql);
    } else {
      $result = $this->_connMain->Execute($sql);
    }
    return $result->fields;
  }


  public function getStateDetails($id, $cache=1)
  {
    $sql = sprintf("SELECT geo_states.sta_id as id, geo_states.con_id as country_id, geo_states.name as name, geo_countries.name as country FROM geo_states LEFT JOIN  geo_countries ON geo_states.con_id = geo_countries.con_id WHERE geo_states.sta_id=%s", $this->qstr($id));
    if ($cache) {
      $result = $this->_connMain->CacheExecute(300, $sql);
    } else {
      $result = $this->_connMain->Execute($sql);
    }
    return $result->fields;
  }


  public function getCityDetails($id, $cache=1)
  {
    $sql = sprintf("SELECT geo_cities.cty_id as id, geo_cities.name as name, geo_cities.con_id as country_id, geo_cities.sta_id as state_id, geo_states.name as state, geo_countries.name as country FROM geo_cities LEFT JOIN geo_states ON geo_cities.sta_id = geo_states.sta_id LEFT JOIN  geo_countries ON geo_states.con_id = geo_countries.con_id WHERE geo_cities.cty_id=%s", $this->qstr($id));
    if ($cache) {
      $result = $this->_connMain->CacheExecute(300, $sql);
    } else {
      $result = $this->_connMain->Execute($sql);
    }
    return $result->fields;
  }


  public function findCityDetails($searchTerm, $cache=1)
  {
   $sql = sprintf("SELECT geo_cities.cty_id as id, geo_cities.name as name, geo_cities.con_id as country_id, geo_cities.sta_id as state_id, geo_states.name as state, geo_countries.name as country FROM geo_cities LEFT JOIN geo_states ON geo_cities.sta_id = geo_states.sta_id LEFT JOIN  geo_countries ON geo_states.con_id = geo_countries.con_id WHERE geo_cities.name LIKE %s", $this->qstr('%'.$searchTerm.'%'));
    if ($cache) {
      $result = $this->_connMain->CacheExecute(300, $sql);
    } else {
      $result = $this->_connMain->Execute($sql);
    }
    $return = array();
    while (!$result->EOF) {
        $return[] = $result->fields;
        $result->MoveNext();
     }
    return $return;
  }


  public function myOwnedCities($user_id, $cache=1)
  {
    $sql = sprintf("SELECT geo_city_owners.owner_id, geo_city_owners.status, geo_city_owners.expiry_date, geo_city_owners.subs_expiry_date, geo_city_owners.status, geo_cities.cty_id as id, geo_cities.name as name, geo_cities.con_id as country_id, geo_cities.sta_id as state_id, geo_states.name as state, geo_countries.name as country FROM geo_city_owners LEFT JOIN geo_cities ON geo_city_owners.cty_id = geo_cities.cty_id LEFT JOIN geo_states ON geo_cities.sta_id = geo_states.sta_id LEFT JOIN  geo_countries ON geo_states.con_id = geo_countries.con_id WHERE geo_city_owners.owner_id=%s ORDER BY geo_city_owners.created DESC", $this->qstr($user_id));
    if ($cache) {
      $result = $this->_connMain->CacheExecute(30, $sql);
    } else {
      $result = $this->_connMain->Execute($sql);
    }
    $return = array();
    while (!$result->EOF) {
        $return[] = $result->fields;
        $result->MoveNext();
     }
    return $return;
  }


  public function getOwnerDetails($cty_id, $cache=1)
  {
    $sql = sprintf("SELECT geo_city_owners.owner_id, geo_city_owners.status, geo_city_owners.expiry_date, geo_city_owners.subs_expiry_date, geo_city_owners.status, geo_cities.cty_id as id, geo_cities.name as name, geo_cities.con_id as country_id, geo_cities.sta_id as state_id, geo_states.name as state, geo_countries.name as country FROM geo_city_owners LEFT JOIN geo_cities ON geo_city_owners.cty_id = geo_cities.cty_id LEFT JOIN geo_states ON geo_cities.sta_id = geo_states.sta_id LEFT JOIN  geo_countries ON geo_states.con_id = geo_countries.con_id WHERE geo_city_owners.cty_id=%s AND expiry_date > NOW() AND subs_expiry_date > NOW()", $this->qstr($cty_id));
    if ($cache) {
      $result = $this->_connMain->CacheExecute(1000, $sql);
    } else {
      $result = $this->_connMain->Execute($sql);
    }
    return $result->fields;
  }

  public function isValidOwner($cty_id, $cache=1)
  {
    $sql = sprintf("SELECT geo_cities.cty_id as id FROM geo_city_owners LEFT JOIN geo_cities ON geo_city_owners.cty_id = geo_cities.cty_id LEFT JOIN geo_states ON geo_cities.sta_id = geo_states.sta_id LEFT JOIN  geo_countries ON geo_states.con_id = geo_countries.con_id WHERE geo_city_owners.cty_id=%s AND geo_city_owners.status = 1 AND expiry_date > NOW() AND subs_expiry_date > NOW()", $this->qstr($cty_id));
    if ($cache) {
      $result = $this->_connMain->CacheExecute(1000, $sql);
    } else {
      $result = $this->_connMain->Execute($sql);
    }
    return !empty($result->fields);
  }
  
  
	public function countryList()
	{
		$sql = "select * from geo_countries order by name";
		$recordSet = $this->_connMain->CacheExecute(_FUNC_TIME_DAY, $sql);
		$return = array();
		while (!$recordSet->EOF) {
			$return[] = array('id' => $recordSet->fields['con_id'], 'country' => $recordSet->fields['name']);
			$recordSet->MoveNext();
		}
		return $return;
	}

	public function stateList($country_id)
	{
		$sql = "select * from geo_states WHERE con_id = ".$this->_connMain->qstr($country_id)." order by name";
		$recordSet = $this->_connMain->CacheExecute(_FUNC_TIME_DAY, $sql);
		$return = array();
		while (!$recordSet->EOF) {
			$return[] = array('id' => $recordSet->fields['sta_id'], 'con_id' => $recordSet->fields['con_id'], 'state' => $recordSet->fields['name']);
			$recordSet->MoveNext();
		}
		return $return;
	}

	public function cityList($state_id)
	{
		$sql = "select * from geo_cities WHERE sta_id = ".$this->_connMain->qstr($state_id)." order by name";
		$recordSet = $this->_connMain->CacheExecute(_FUNC_TIME_DAY, $sql);
		$return = array();
		while (!$recordSet->EOF) {
			$return[] = array('id' => $recordSet->fields['cty_id'], 'sta_id' => $recordSet->fields['sta_id'], 'con_id' => $recordSet->fields['con_id'], 'city' => $recordSet->fields['name'], 'latitude' => $recordSet->fields['latitude'], 'longitude' => $recordSet->fields['longitude']);
			$recordSet->MoveNext();
		}
		return $return;
	}

	public function cityDetail($city_id)
	{
		$sql = "select geo_cities.*, geo_states.name as statename, geo_countries.name as countryname from geo_cities left join geo_states on geo_cities.sta_id = geo_states.sta_id  left join geo_countries on geo_cities.con_id = geo_countries.con_id WHERE geo_cities.cty_id = ".$this->_connMain->qstr($city_id)." order by geo_cities.name, geo_states.name, geo_countries.name";
    $this->sql = $sql;
		$recordSet = $this->_connMain->CacheExecute(10000, $sql);
		$return = array('id' => $recordSet->fields['cty_id'], 'sta_id' => $recordSet->fields['sta_id'], 'con_id' => $recordSet->fields['con_id'], 'city' => $recordSet->fields['name'], 'latitude' => $recordSet->fields['latitude'], 'longitude' => $recordSet->fields['longitude'], 'statename' => $recordSet->fields['statename'], 'countryname' => $recordSet->fields['countryname']);
    $return = array_merge($return, $recordSet->fields);
		return $return;
	}
	

	public function findcity($keyword='')
	{
    $city = '%'.$keyword.'%';
		$sql = "select geo_cities.*, geo_states.name as statename, geo_countries.name as countryname from geo_cities left join geo_states on geo_cities.sta_id = geo_states.sta_id  left join geo_countries on geo_cities.con_id = geo_countries.con_id WHERE geo_cities.name like ".$this->_connMain->qstr($city)." order by geo_cities.name, geo_states.name, geo_countries.name";
		$recordSet = $this->_connMain->CacheExecute(_FUNC_TIME_DAY, $sql);
		$return = array();
		while (!$recordSet->EOF) {
			$return[] = array('id' => $recordSet->fields['cty_id'], 'sta_id' => $recordSet->fields['sta_id'], 'con_id' => $recordSet->fields['con_id'], 'city' => $recordSet->fields['name'], 'latitude' => $recordSet->fields['latitude'], 'longitude' => $recordSet->fields['longitude'], 'statename' => $recordSet->fields['statename'], 'countryname' => $recordSet->fields['countryname']);
			$recordSet->MoveNext();
		}
		return $return;
	}
	
	public function get_nearby_cities($lat, $lon, $radius=30, $order='distance', $limit=30)
	{
		$sql = sprintf("select *, (ROUND(
	DEGREES(ACOS(SIN(RADIANS(".GetSQLValueString($lat, 'double').")) * SIN(RADIANS(c.latitude)) + COS(RADIANS(".GetSQLValueString($lat, 'double').")) * COS(RADIANS(c.latitude)) * COS(RADIANS(".GetSQLValueString($lon, 'double')." -(c.longitude)))))*60*1.1515,2)) as distance from geo_cities as c WHERE (ROUND(
	DEGREES(ACOS(SIN(RADIANS(".GetSQLValueString($lat, 'double').")) * SIN(RADIANS(c.latitude)) + COS(RADIANS(".GetSQLValueString($lat, 'double').")) * COS(RADIANS(c.latitude)) * COS(RADIANS(".GetSQLValueString($lon, 'double')." -(c.longitude)))))*60*1.1515,2)) <= ".GetSQLValueString($radius, 'int')." ORDER BY ".$order." LIMIT ".$limit);
		$recordSet = $this->_connMain->CacheExecute(10000, $sql);
		$return = array();
		while (!$recordSet->EOF) {
			$return['city_'.$recordSet->fields['cty_id']] = $recordSet->fields;
      $return['city_'.$recordSet->fields['cty_id']]['url'] = $this->makecityurl($recordSet->fields['cty_id'], $recordSet->fields['name']);
			$recordSet->MoveNext();
		}
		return $return;
	}

  
    function iptocity($ip)
    {
        define('IPSNIFF_URL', 'http://api.ipinfodb.com/v3/ip-city/?');
        define('IPSNIFF_KEY', '0b3b2f8bd9f606ba8032ef0b9fbe054041788fb0f9d7c21214cd050a9b561845');
    
        $url = IPSNIFF_URL.'key='.IPSNIFF_KEY.'&ip='.$ip;
        $string = curlget($url);
        //$string = 'OK;;63.150.3.118;US;UNITED STATES;CALIFORNIA;SAN JOSE;95101;37.3169;-121.874;-08:00';
        $tmp = explode(';', $string);
        $arr['status'] = !empty($tmp[0]) ? trim($tmp[0]) : '';
        $arr['text1'] = !empty($tmp[1]) ? trim($tmp[1]) : '';
        $arr['ip'] = !empty($tmp[2]) ? trim($tmp[2]) : '';
        $arr['countrycode'] = !empty($tmp[3]) ? trim($tmp[3]) : '';
        $arr['country'] = !empty($tmp[4]) ? trim($tmp[4]) : '';
        $arr['state'] = !empty($tmp[5]) ? trim($tmp[5]) : '';
        $arr['city'] = !empty($tmp[6]) ? trim($tmp[6]) : '';
        $arr['zip'] = !empty($tmp[7]) ? trim($tmp[7]) : '';
        $arr['lat'] = !empty($tmp[8]) ? trim($tmp[8]) : '';
        $arr['lon'] = !empty($tmp[9]) ? trim($tmp[9]) : '';
        $arr['timezone'] = !empty($tmp[10]) ? trim($tmp[10]) : '';
        $arr['url'] = 'http://'.$_SERVER['HTTP_HOST'].$_SERVER['PHP_SELF'].'?'.$_SERVER['QUERY_STRING'];
        $arr['user_agent'] = $_SERVER['HTTP_USER_AGENT'];
        $arr['referrer'] = !empty($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : '';
    
        //$email[] = 'auto@wc5.org';
        //$from = 'From: system<system@'._base_domain.'>';
        //$msg = var_export($arr, 1);
        //foreach ($email as $to) {
          //mail2($to, 'IP Check', $msg, $from);
        //}
        
        return $arr;
    }
    
    
    function url_name_v2($name='')
      {
      if (empty($name)) {
        return $name;
      }
      
      $patterns = array();
      $patterns[0] = "/\s+/";
      $patterns[1] = '/[^A-Za-z0-9]+/';
      $replacements = array();
      $replacements[0] = "-";
      $replacements[1] = '-';
      ksort($patterns);
      ksort($replacements);
      $output = preg_replace($patterns, $replacements, $name);
      $output = strtolower($output);
      return $output;
      }//end list_name_url()
      
    function makecityurl($city_id, $city)
    {
      return '/city-'.$this->url_name_v2($city).'-'.$city_id;
    }

}
//end model geo


function nearbyCities($lat, $lon, $radius=100, $order='distance', $limit=30)
{
  $geo = new Models_Geo();
  $nearby = $geo->get_nearby_cities($lat, $lon, $radius, $order, $limit);
  return $nearby;
}

  
function findCity($city_id, $nearbyResults=false)
{
  $geo = new Models_Geo();
  global $modelGeneral;
  $cityDetails = $geo->cityDetail($city_id);
  if (empty($cityDetails)) {
    return false;
  }
  $cityDetails['sql'] = $geo->sql;
  $lat = !empty($cityDetails['latitude']) ? $cityDetails['latitude']: null;
  $lon = !empty($cityDetails['longitude']) ? $cityDetails['longitude']: null;
  $radius = 30;
  $order = 'distance';
  $limit = 30;
  if ($nearbyResults) {
    if (empty($lat) || empty($lon)) {
      $cityDetails['nearby'] = array();
    } else {
      $cityDetails['nearby'] = $geo->get_nearby_cities($lat, $lon, $radius, $order, $limit);
    }
  }
  if (empty($cityDetails['extraDetails'])) {
    $etc = fetchCityXtraDetails($lat, $lon);
    if (!empty($etc)) {
      $d = array();
      $d['extraDetails'] = json_encode($etc);
      $d['lat_h'] = $etc['location']['lat_h'];
      $d['lat_m'] = $etc['location']['lat_m'];
      $d['lat_s'] = $etc['location']['lat_s'];
      $d['lon_h'] = $etc['location']['lon_h'];
      $d['lon_m'] = $etc['location']['lon_m'];
      $d['lon_e'] = $etc['location']['lon_e'];
      $d['zone_h'] = $etc['location']['zone_h'];
      $d['zone_m'] = $etc['location']['zone_m'];
      $d['dst'] = $etc['location']['dst'];
      $d['rawOffset'] = $etc['timezone']['rawOffset'];
      $d['dstOffset'] = $etc['timezone']['dstOffset'];
      $cityDetails = array_merge($cityDetails, $d);
      $where = sprintf('cty_id = %s', $modelGeneral->qstr($cityDetails['id']));
      $modelGeneral->updateDetails('geo_cities', $d, $where);
      $modelGeneral->clearCache($cityDetails['sql']);
    }
  } else {
    $etc = json_decode($cityDetails['extraDetails'], 1);
  }
  $cityDetails['etc'] = $etc;
  $cityDetails['url'] = HTTPPATH.'/city-'.url_name_v2($cityDetails['city']).'-'.$cityDetails['id'];
  $cityDetails['pageTitle'] = $cityDetails['city'].', '.$cityDetails['statename'].', '.$cityDetails['countryname'];
  return $cityDetails;
}


  function fetchCityXtraDetails($lat, $lon)
  {
    $etc = array();
    try {
      if (empty($lat) || empty($lon)) {
        throw new Exception('lat, lon empty');
      }
      $etc['timezone'] = getdetailsonlatlon($lat, $lon);
      if (empty($etc['timezone'])) {
        throw new Exception('empty details');
      }
      if ($etc['timezone']['rawOffset'] != $etc['timezone']['dstOffset']) {
        $etc['location']['dst'] = 1;
      } else {
        $etc['location']['dst'] = 0;
      }
      $etc['dd2dms'] = dd2dms($lat, $lon);
      $etc['location']['lat_h'] = $etc['dd2dms'][2];
      $etc['location']['lat_m'] = $etc['dd2dms'][4];
      $etc['location']['lat_s'] = ($etc['dd2dms'][0] == 'S') ? 1 : 0;
      $etc['location']['lon_h'] = $etc['dd2dms'][3];
      $etc['location']['lon_m'] = $etc['dd2dms'][5];
      $etc['location']['lon_e'] = ($etc['dd2dms'][1] == 'E') ? 1 : 0;
      $zones = makeTime(abs($etc['timezone']['rawOffset']));
      $etc['location']['zone_h'] = $zones[0];
      $etc['location']['zone_m'] = $zones[1];
    } catch (Exception $e) {
      $etc = array();
    }
    return $etc;
  }

  function makeTime($num) {
    $returnnum = array();
    if ($num) {
      $returnnum[0] = (int) $num;
      $num -= (int) $num; 
      $num *= 60;
      $returnnum[1] = (int) $num;
      $num -= (int) $num; 
      $num *= 60;
      $returnnum[2] = (int) $num;
    }
  
    return $returnnum;
  }
  
function getdetailsonlatlon($lat, $lon)
{
  $url = "http://wc5.org/api/v1/fetch.php?timezone=1&lat=".$lat."&lng=".$lon;
  $c = @file_get_contents($url);
  $json = json_decode($c, 1);
  return $json;
}
function dd2dms($lat, $lon)
	{
		$returnArr = array();
		if (substr($lat, 0, 1) == '-') {
			$ddLatVal = substr($lat, 1, (strlen($lat) - 1));
			$ddLatType = 'S';
		} else {
			$ddLatVal = $lat;
			$ddLatType = 'N';
		}
		$returnArr[0] = $ddLatType;
		if (substr($lon, 0, 1) == '-') {
			$ddLongVal = substr($lon, 1, (strlen($lon) - 1));
			$ddLonType = 'W';
		} else {
			$ddLongVal = $lon;
			$ddLonType = 'E';
		}
		$returnArr[1] = $ddLonType;
		// degrees = degrees
		$ddLatVals = explode('.', $ddLatVal);
		$dmsLatDeg = $ddLatVals[0];
		$returnArr[2] = $dmsLatDeg;
		
		$ddLongVals = explode('.', $ddLongVal);
		$dmsLongDeg = $ddLongVals[0];
		$returnArr[3] = $dmsLongDeg;
		
		// * 60 = mins
		$ddLatRemainder  = (float) ("0." . $ddLatVals[1]) * 60;
		$dmsLatMinVals   = explode('.', $ddLatRemainder);
		$dmsLatMin = $dmsLatMinVals[0];
		$returnArr[4] = $dmsLatMin;

		$ddLongRemainder  = (float) ("0." . $ddLongVals[1]) * 60;
		$dmsLongMinVals   = explode('.', $ddLongRemainder);
		$dmsLongMin = $dmsLongMinVals[0];
		$returnArr[5] = $dmsLongMin;
		
		// * 60 again = secs
		$ddLatMinRemainder = ("0." . $dmsLatMinVals[1]) * 60;
		$dmsLatSec   = round($ddLatMinRemainder);
		$returnArr[6] = $dmsLatSec;
    if (empty($dmsLongMinVals[1])) $dmsLongMinVals[1] = 0;
		$ddLongMinRemainder = ("0." . $dmsLongMinVals[1]) * 60;
		$dmsLongSec   = round($ddLongMinRemainder);
		$returnArr[7] = $dmsLongSec;
		return $returnArr;
	}


function getDateTime($date)
{
  $return = array();
  $tmp = explode(' ', $date);
  $date = $tmp[0];
  $time = $tmp[1];
  $tmp = explode('-', $date);
  $month = $tmp[1];
  $day = $tmp[2];
  $year = $tmp[0];
  $tmp = explode(':', $time);
  $hour = $tmp[0];
  $minute = $tmp[1];
  $return['day'] = $day;
  $return['month'] = $month;
  $return['year'] = $year;
  $return['hour'] = $hour;
  $return['minute'] = $minute;
  return $return;
}


function makecityurl($city_id, $city)
{
  return HTTPPATH.'/city-'.url_name_v2($city).'-'.$city_id;
}

function calculateDistance($latitude1, $longitude1, $latitude2, $longitude2) {
    $theta = $longitude1 - $longitude2;
    $miles = (sin(deg2rad($latitude1)) * sin(deg2rad($latitude2))) + (cos(deg2rad($latitude1)) * cos(deg2rad($latitude2)) * cos(deg2rad($theta)));
    $miles = acos($miles);
    $miles = rad2deg($miles);
    $miles = $miles * 60 * 1.1515;
    return $miles; 
}


function findHoroInfo($data)
{
  if (empty($data['dob'])) {
    return false;
  }
  $Kundali = new Library_Kundali();
  $fromDate = getDateTime($data['dob']);
  $returnArrFrom = $Kundali->precalculate($fromDate['month'], $fromDate['day'], $fromDate['year'], $fromDate['hour'], $fromDate['minute'], $data['zone_h'], $data['zone_m'], $data['lon_h'], $data['lon_m'], $data['lat_h'], $data['lat_m'], $data['dst'], $data['lon_e'], $data['lat_s']);
  return $returnArrFrom;
}

function match($from, $to)
{
  $d = array();
  $d['from'] = findHoroInfo($from);
  $d['to'] = findHoroInfo($to);
  $Kundali = new Library_Kundali();
  $d['points'] = $Kundali->getpoints($d['from'][9], $d['to'][9]);
  $d['results'] = $Kundali->interpret($d['points']);
  return $d;
}

function url_name_v2($name='')
{
	if (empty($name)) {
		return $name;
	}

	$patterns = array();
	$patterns[0] = "/\s+/";
	$patterns[1] = '/[^A-Za-z0-9]+/';
	$replacements = array();
	$replacements[0] = "-";
	$replacements[1] = '-';
	ksort($patterns);
	ksort($replacements);
	$output = preg_replace($patterns, $replacements, $name);
	$output = strtolower($output);
	return $output;
}//end list_name_url()

function findCitySearch($searchTerm) {
  $geo = new Models_Geo();
  $cities = $geo->findCityDetails($searchTerm, 1);
  return $cities;
  
}


if (!function_exists("GetSQLValueString")) {
function GetSQLValueString($theValue, $theType, $theDefinedValue = "", $theNotDefinedValue = "") 
{
  if (PHP_VERSION < 6) {
    $theValue = get_magic_quotes_gpc() ? stripslashes($theValue) : $theValue;
  }

  $theValue = function_exists("mysql_real_escape_string") ? mysql_real_escape_string($theValue) : mysql_escape_string($theValue);

  switch ($theType) {
    case "text":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;    
    case "long":
    case "int":
      $theValue = ($theValue != "") ? intval($theValue) : "NULL";
      break;
    case "double":
      $theValue = ($theValue != "") ? doubleval($theValue) : "NULL";
      break;
    case "date":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;
    case "defined":
      $theValue = ($theValue != "") ? $theDefinedValue : $theNotDefinedValue;
      break;
  }
  return $theValue;
}
}
// code starts here
  
  $action = isset($_GET['action']) ? $_GET['action'] : null;
  if (empty($action)) {
    throw new Exception('missing action');
  }

  switch ($action) {
    case 'findcitybyid':
      if (empty($_GET['city_id'])) {
        throw new Exception('city_id is missing'); 
      }
      $return['data'] = findCity($_GET['city_id']);
      break;
    case 'nearby':
      if (empty($_GET['lat'])) {
        throw new Exception('lat is missing'); 
      }
      if (empty($_GET['lng'])) {
        throw new Exception('lng is missing'); 
      }
      $return['data'] = nearbyCities($_GET['lat'], $_GET['lng']);
      break;
    case 'cityMatch':
      if (empty($_GET['lat'])) {
        throw new Exception('lat is missing'); 
      }
      if (empty($_GET['lng'])) {
        throw new Exception('lng is missing'); 
      }
      $data = array_values(nearbyCities($_GET['lat'], $_GET['lng'], $radius=100, $order='distance', $limit=1));
      if (empty($data[0])) {
        throw new Exception('no city found');
      }
      $return['data'] = $return['data'] = findCity($data[0]['cty_id']);
      break;
    case 'findCity':
      if (empty($_GET['q'])) {
        throw new Exception('search Term q is missing'); 
      }
      $return['data'] = findCitySearch($_GET['q']);
      break;
    case 'match':
      if (empty($_REQUEST['from'])) {
        throw new Exception('from is missing'); 
      }
      if (empty($_REQUEST['to'])) {
        throw new Exception('to is missing'); 
      }
      $return['data'] = match($_REQUEST['from'], $_REQUEST['to']);
      break;
    case 'matchMultiple':
      if (empty($_REQUEST['data'])) {
        throw new Exception('data is missing'); 
      }
      $res = array();
      foreach ($_REQUEST['data'] as $k => $v) {
         $res[$k] = match($v['from'], $v['to']);
      }
      $return['data'] = $res;
      break;
    
  }
  
} catch (Exception $e) {
  $return['success'] = 0;
  $return['error'] = 1;
  $return['errorMessage'] = $e->getMessage();
}
$return['get'] = $_GET;
$return['actions'] = array('findcitybyid' => array('city_id'), 'nearby' => array('lat', 'lng'), 'cityMatch' => array('lat', 'lng'), 'match' => array('from', 'to'), 'findCity' => array('q'), 'matchMultiple' => array('data'));
echo json_encode($return);