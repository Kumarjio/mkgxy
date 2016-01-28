<?php
class DbTools extends Models_General {
  public function add($tableName, $tableTag, $params=array())
  {
    $arr = array();
    $data = $params['data'];
    if (!is_array($data)) {
      $data = json_decode($params['data'], 1);
    }
    $arr['details'] = json_encode($data);
    
    if (!empty($params['saveIP'])) {
      $ip = !empty($params['ip']) ? $params['ip'] : $_SERVER['REMOTE_ADDR'];
      $q = 'select * from users_info WHERE ip = ?';
      $res = $this->fetchRow($q, array($ip), TIMEBIG);
      if (empty($res)) {
        $ipDetails = iptocity($ip);
        $d = array();
        $d['ip'] = $ip;
        $d['users_info'] = json_encode($ipDetails['result']);
        $this->addDetails('users_info', $d);
        $res = $this->fetchRow($q, array($ip), TIMEBIG);
      }
      $arr['users_info_id'] = $res['users_info_id'];
    }
    
    $arr['title'] = isset($params['title']) ? $params['title'] : null;
    $arr['status'] = isset($params['status']) ? $params['status'] : 1;
    $arr['path'] = isset($params['path']) ? $params['path'] : null;
    $arr['deleted'] = isset($params['deleted']) ? $params['deleted'] : 0;
    $arr['admin_approved'] = isset($params['appr']) ? $params['appr'] : 0;
    $arr['created'] = date('Y-m-d H:i:s');
    $arr['updated'] = date('Y-m-d H:i:s');
    $arr['uid'] = UID;
    
    //searchable fields
    $arr['i1'] = isset($params['i1']) ? $params['i1'] : null;
    $arr['i2'] = isset($params['i2']) ? $params['i2'] : null;
    $arr['d1'] = isset($params['d1']) ? $params['d1'] : null;
    $arr['d2'] = isset($params['d2']) ? $params['d2'] : null;
    $arr['vc1'] = isset($params['vc1']) ? $params['vc1'] : null;
    $arr['vc2'] = isset($params['vc2']) ? $params['vc2'] : null;
    $arr['t1'] = isset($params['t1']) ? $params['t1'] : null;
    $arr['t2'] = isset($params['t2']) ? $params['t2'] : null;
    
    
    if (!empty($params['location'])) {
      $q = 'select * from  locations WHERE place_id = ?';
      $res = $this->fetchRow($q, array($params['location']['place_id']), TIMEBIG);
      if (empty($res)) {
        $id = $this->addDetails('locations', $params['location']);
        $res = $this->fetchRow($q, array($params['location']['place_id']), TIMEBIG);
      }
      $arr['location_id'] = $res['location_id'];
      $arr['lat'] = $params['location']['latitude'];
      $arr['lng'] = $params['location']['longitude'];
    }
    //insert into main db
    $id = $this->addDetails($tableName, $arr);
    if (empty($id)) {
      throw new Exception('error in inserting'); 
    }
    $arr['id'] = $id;
    $arr['location'] = !empty($params['location']) ? $params['location'] : null;
    //insert into tags db
    if (!empty($params['tags'])) {
      $d = array();
      $d['id'] = $id;
      $exp = explode(',', $params['tags']);
      $arr['tags'] = array();
      if (!empty($exp)) {
        foreach ($exp as $v) {
          $d['tag'] = trim($v);
          if (empty($d['tag'])) continue;
          $arr['tags'][] = $d['tag'];
          $this->addDetails($tableTag, $d);
        }//end foreach
      }//end if
    }//end if
      
    return $arr;   
  }//end add
  
  public function update($tableName, $tableTag, $id, $params)
  {
    $arr = array();
    $q = 'select * from '.$tableName.' WHERE id = ?';
    $res = $this->fetchRow($q, array($id), 0);
    
    if ($res['uid'] != UID) {
      throw new Exception('invalid user');
    }
    
    $data = $params['data'];
    if (!is_array($data)) {
      $data = json_decode($params['data'], 1);
    }
    $arr['details'] = json_encode($data);
    
    if (!empty($params['saveIP'])) {
      $ip = !empty($params['ip']) ? $params['ip'] : $_SERVER['REMOTE_ADDR'];
      $q = 'select * from users_info WHERE ip = ?';
      $res = $this->fetchRow($q, array($ip), TIMEBIG);
      if (empty($res)) {
        $ipDetails = iptocity($ip);
        $d = array();
        $d['ip'] = $ip;
        $d['users_info'] = json_encode($ipDetails['result']);
        $this->addDetails('users_info', $d);
        $res = $this->fetchRow($q, array($ip), TIMEBIG);
      }
      $arr['users_info_id'] = $res['users_info_id'];
    }
    
    $arr['title'] = isset($params['title']) ? $params['title'] : null;
    $arr['status'] = isset($params['status']) ? $params['status'] : 1;
    $arr['path'] = isset($params['path']) ? $params['path'] : null;
    $arr['deleted'] = isset($params['deleted']) ? $params['deleted'] : 0;
    $arr['admin_approved'] = isset($params['appr']) ? $params['appr'] : 0;
    $arr['updated'] = date('Y-m-d H:i:s');
    $arr['uid'] = UID;
    
    //searchable fields
    $arr['i1'] = isset($params['i1']) ? $params['i1'] : null;
    $arr['i2'] = isset($params['i2']) ? $params['i2'] : null;
    $arr['d1'] = isset($params['d1']) ? $params['d1'] : null;
    $arr['d2'] = isset($params['d2']) ? $params['d2'] : null;
    $arr['vc1'] = isset($params['vc1']) ? $params['vc1'] : null;
    $arr['vc2'] = isset($params['vc2']) ? $params['vc2'] : null;
    $arr['t1'] = isset($params['t1']) ? $params['t1'] : null;
    $arr['t2'] = isset($params['t2']) ? $params['t2'] : null;
    
    
    
    if (!empty($params['location'])) {
      $q = 'select * from  locations WHERE place_id = ?';
      $res = $this->fetchRow($q, array($params['location']['place_id']), TIMEBIG);
      if (empty($res)) {
        $id = $this->addDetails('locations', $params['location']);
        $res = $this->fetchRow($q, array($params['location']['place_id']), TIMEBIG);
      }
      $arr['location_id'] = $res['location_id'];
      $arr['lat'] = $params['location']['latitude'];
      $arr['lng'] = $params['location']['longitude'];
    }
    //insert into main db
    $where = sprintf('id = %s', $this->qstr($id));
    $check = $this->updateDetails($tableName, $arr, $where);
    $arr['id'] = $id;
    $arr['location'] = !empty($params['location']) ? $params['location'] : null;
    
    $q = 'delete from '.$tableTag.' WHERE id = ?';
    $this->deleteDetails($q, array($id));
    //insert into tags db
    if (!empty($params['tags'])) {
      $d = array();
      $d['id'] = $id;
      $exp = explode(',', $params['tags']);
      $arr['tags'] = array();
      if (!empty($exp)) {
        foreach ($exp as $v) {
          $d['tag'] = trim($v);
          if (empty($d['tag'])) continue;
          $arr['tags'][] = $d['tag'];
          $this->addDetails($tableTag, $d);
        }
      }
    }
    
    return $arr;
  }//end update
  
  public function delete($ids, $tableName, $tableTag) {
    $exp = explode(',', $ids);
    foreach ($exp as $id) {
      
      $q = 'select * from '.$tableName.' WHERE id = ?';
      $res = $this->fetchRow($q, array($id), 0);
      
      if ($res['uid'] != UID) {
        throw new Exception('invalid user');
      }
      $q = 'delete from '.$tableName.' WHERE id = ?';
      $this->deleteDetails($q, array($id));
      $q = 'delete from '.$tableTag.' WHERE id = ?';
      $this->deleteDetails($q, array($id));
    }
    return true;
  }//end delete
  
  public function getAll($tableName, $tableTag, $request)
  {
    $page = 0;
    if (!empty($request['page'])) {
      $page = $request['page'];  
    }
    $max = 10;
    if (!empty($request['max'])) {
      $max = $request['max'];  
    }
    $params = array();
    $params['status'] = 1;
    $params['q'] = !empty($request['q']) ? $request['q'] : null; 
    $params['path'] = !empty($request['path']) ? $request['path'] : null; 
    $params['lat'] = !empty($request['lat']) ? $request['lat'] : null; //36.797 
    $params['lon'] = !empty($request['lon']) ? $request['lon'] : null; //-121.216 
    $params['radius'] = !empty($request['r']) ? $request['r'] : 30;
    
    if (isset($request['uid'])) {
      $params['uid'] = $request['uid'];
    }
    if (isset($request['i1'])) {
      $params['i1'] = $request['i1'];
    }
    if (isset($request['i2'])) {
      $params['i2'] = $request['i2'];
    }
    if (isset($request['d1'])) {
      $params['d1'] = $request['d1'];
    }
    if (isset($request['d2'])) {
      $params['d2'] = $request['d2'];
    }
    if (isset($request['vc1'])) {
      $params['vc1'] = $request['vc1'];
    }
    if (isset($request['vc2'])) {
      $params['vc2'] = $request['vc2'];
    }
    if (isset($request['t1'])) {
      $params['t1'] = $request['t1'];
    }
    if (isset($request['t2'])) {
      $params['t2'] = $request['t2'];
    }
    $showUserInfo = !empty($request['showUserInfo']) ? $request['showUserInfo'] : null;
    $showLocation = !empty($request['showLocation']) ? $request['showLocation'] : null;
    $showTags = !empty($request['showTags']) ? $request['showTags'] : null;
    $data = getAll($tableName, $tableTag, $max, $page, $params);
    if (!empty($data['results'])) {
      foreach ($data['results'] as $k => $v) {
        if ($showLocation) {
          $q = 'select * from locations WHERE location_id = ?';
          $res2 = $this->fetchRow($q, array($v['location_id']), TIMEBIG);
          $data['results'][$k]['location'] = $res2;
        }
        if ($showUserInfo) {
          $q = 'select * from users_info WHERE users_info_id = ?';
          $res3 = $this->fetchRow($q, array($v['users_info_id']), TIMEBIG);
          $res3['users_info_full'] = json_decode($res3['users_info'], 1);
          $data['results'][$k]['user_info'] = $res3;
        }
        if ($showTags) {
          $q = 'select * from '.$tableTag.' WHERE id = ?';
          $res4 = $this->fetchAll($q, array($v['id']), TIMESMALL);
          $data['results'][$k]['tags'] = $res4;
        }
      }
    }
    return $data;  
  }//end getAll
  
  public function getOne($tableName, $tableTag, $id)
  {
    $q = 'select * from '.$tableName.' WHERE id = ?';
    $res = $this->fetchRow($q, array($id), TIMESMALL);
    $q = 'select * from locations WHERE location_id = ?';
    $res2 = $this->fetchRow($q, array($res['location_id']), TIMEBIG);
    $q = 'select * from users_info WHERE users_info_id = ?';
    $res3 = $this->fetchRow($q, array($res['users_info_id']), TIMEBIG);
    $res3['users_info_full'] = json_decode($res3['users_info'], 1);
    $q = 'select * from '.$tableTag.' WHERE id = ?';
    $res4 = $this->fetchAll($q, array($res['id']), TIMESMALL);
    $data = array();
    $data = $res;
    $data['location'] = $res2;
    $data['user_info'] = $res3;
    $data['tags'] = $res4;
    return $data; 
  }//end getOne()
}
?>