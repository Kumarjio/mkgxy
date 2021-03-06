<?php
/*
API URLS


*/
try {
  include('init.php');
  //pre defined variables
  
  if (empty($_GET['action'])) {
    throw new Exception('empty action'); 
  }
  
  if ($_GET['action'] === 'add' || $_GET['action'] === 'update' || $_GET['action'] === 'delete') {
    if (empty($_REQUEST['access_token'])) {
      throw new Exception('empty token');  
    }
    
    $res = validateAccessToken($_REQUEST['access_token']);
    if (empty($res)) {
      throw new Exception('invalid token');  
    }
    
    define('UID', $res['uid']);
  }
  
  switch ($_GET['action']) {
    case 'current':
      //http://bootstrap.mkgalaxy.com/svnprojects/horo/records.php?action=current
      $q = 'select * from access_tokens as t LEFT JOIN users as u ON t.uid = u.uid LEFT JOIN users_info as i ON t.users_info_id = i.users_info_id ORDER BY t.created DESC';
      $res = $Models_General->fetchAll($q, array(), 60);
      if (!empty($res)) {
        foreach ($res as $k => $v) {
          $res[$k]['ago'] = ago(strtotime($v['created'])); 
          $res[$k]['user_details'] = json_decode($v['user_details'], 1); 
          $res[$k]['users_info'] = json_decode($v['users_info'], 1); 
        }
      }
      $return['data'] = $res;
      break;
    case 'login':
      //http://bootstrap.mkgalaxy.com/svnprojects/horo/records.php?action=login&saveIP=1&id=112913147917981568678&access_token=ya29.bAJm48DiufO5cxC1kd5IE8f6lnEDIMseVzVF4D3i6GUQwf8gUWTfcpgpMF8EWmqRfyfVKQ
      if (empty($_REQUEST['id'])) {
        throw new Exception('empty id');
      }
      
      $q = 'delete from access_tokens WHERE uid = ?';
      $Models_General->deleteDetails($q, array($_REQUEST['id']));
      $arr = array();
      $arr['uid'] = $_REQUEST['id'];
      $arr['token'] = $_REQUEST['access_token'];
      $arr['created'] = date('Y-m-d H:i:s');
      if (!empty($_REQUEST['saveIP'])) {
          $ip = !empty($_REQUEST['ip']) ? $_REQUEST['ip'] : $_SERVER['REMOTE_ADDR'];
          $q = 'select * from users_info WHERE ip = ?';
          $res = $Models_General->fetchRow($q, array($ip), TIMEBIG);
          if (empty($res)) {
            $ipDetails = iptocity($ip);
            $d = array();
            $d['ip'] = $ip;
            $d['users_info'] = json_encode($ipDetails['result']);
            $Models_General->addDetails('users_info', $d);
            $res = $Models_General->fetchRow($q, array($ip), TIMEBIG);
          }
          $arr['users_info_id'] = $res['users_info_id'];
        }
      $Models_General->addDetails('access_tokens', $arr);
      $return['data'] = $arr;
      $return['data']['valid'] = validateAccessToken($_REQUEST['access_token']);
      $request_body = file_get_contents('php://input');
      $details = array();
      if (!empty($request_body)) {
        $details = json_decode($request_body, 1);
      } else if ($_REQUEST['details']) {
        $details = $_REQUEST['details'];
      }
      if (!empty($details)) {//update if we get details
        $q = 'select * from users WHERE uid = ?';
        $res = $Models_General->fetchRow($q, array($_REQUEST['id']), 0);
        $uArr = array();
        $uArr['uid'] = $_REQUEST['id'];
        $uArr['user_details'] = json_encode($details);
        if (!empty($arr['users_info_id'])) {
          $uArr['users_info_id'] = $arr['users_info_id'];
        }//adding location
        if (empty($res)) { //insert
          $uArr['user_created'] = date('Y-m-d H:i:s');
          $Models_General->addDetails('users', $uArr);
        } else {//update
          $where = sprintf('uid = %s', $Models_General->qstr($_REQUEST['id']));
          $Models_General->updateDetails('users', $uArr, $where);
        }
      }//end if
      break;
      
    case 'logout':
      //http://bootstrap.mkgalaxy.com/svnprojects/horo/records.php?action=logout&id=112913147917981568678&access_token=ya29.bAJm48DiufO5cxC1kd5IE8f6lnEDIMseVzVF4D3i6GUQwf8gUWTfcpgpMF8EWmqRfyfVKQ
      if (empty($_REQUEST['id'])) {
        throw new Exception('empty id');
      }
      
      if (!empty($_REQUEST['access_token'])) {
        $q = 'select * from access_tokens WHERE token = ?';
        $Models_General->clearCache($q, array($_REQUEST['access_token']));
      }
      
      $res = getAccessToken($_REQUEST['id']);
      if (!empty($res)) {
        $q = 'select * from access_tokens WHERE token = ?';
        $Models_General->clearCache($q, array($res['token']));
      }
      
      $q = 'delete from access_tokens WHERE uid = ?';
      $Models_General->deleteDetails($q, array($_REQUEST['id']));
      
      $return['data']['id'] = $_REQUEST['id'];
      $return['data']['access_token'] = $_REQUEST['access_token'];
      break;
    //insert
    case 'add':
//http://bootstrap.mkgalaxy.com/svnprojects/horo/records.php
//Get Params
//?action=add&saveIP=1
//Post params
//&uid=2&data={%22x%22:%22y%22}&title=This+is+title&path=/test&tid=1&location[latitude]=&location[longitude]=&location[country]=&location[state]=&location[city]=&location[zip]=&location[place_id]=&location[county]=&location[formatted_addr]=
//example: http://bootstrap.mkgalaxy.com/svnprojects/horo/records.php?action=add&saveIP=1&uid=2&data={%22x%22:%22y%22}&title=This+is+title&path=/test&tid=1&location[latitude]=37.7974273&location[longitude]=-121.21605260000001&location[country]=United+States&location[state]=CA&location[city]=Manteca&location[zip]=&location[place_id]=ChIJCUWMJENAkIARjMxOe6Wp4p0&location[county]=San+Joaquin+County&location[formatted_addr]=Manteca,+CA,+United+States&tags=a,b,c
//example 2: http://bootstrap.mkgalaxy.com/svnprojects/horo/records.php?action=add&saveIP=1&uid=2&data[x]=y&title=This+is+title&path=/test&tid=1&location[latitude]=37.7974273&location[longitude]=-121.21605260000001&location[country]=United+States&location[state]=CA&location[city]=Manteca&location[zip]=&location[place_id]=ChIJCUWMJENAkIARjMxOe6Wp4p0&location[county]=San+Joaquin+County&location[formatted_addr]=Manteca,+CA,+United+States&tags=a,b,c

//&access_token=ya29.bAJm48DiufO5cxC1kd5IE8f6lnEDIMseVzVF4D3i6GUQwf8gUWTfcpgpMF8EWmqRfyfVKQ
        $DbTools = new DbTools();
        $arr = $DbTools->add($tableName, $tableTag, $_REQUEST);
        $return['data'] = $arr;
        /*
        $arr = array();
        $data = $_REQUEST['data'];
        if (!is_array($data)) {
          $data = json_decode($_REQUEST['data'], 1);
        }
        $arr['details'] = json_encode($data);
        
        if (!empty($_REQUEST['saveIP'])) {
          $ip = !empty($_REQUEST['ip']) ? $_REQUEST['ip'] : $_SERVER['REMOTE_ADDR'];
          $q = 'select * from users_info WHERE ip = ?';
          $res = $Models_General->fetchRow($q, array($ip), TIMEBIG);
          if (empty($res)) {
            $ipDetails = iptocity($ip);
            $d = array();
            $d['ip'] = $ip;
            $d['users_info'] = json_encode($ipDetails['result']);
            $Models_General->addDetails('users_info', $d);
            $res = $Models_General->fetchRow($q, array($ip), TIMEBIG);
          }
          $arr['users_info_id'] = $res['users_info_id'];
        }
        
        $arr['title'] = isset($_REQUEST['title']) ? $_REQUEST['title'] : null;
        $arr['status'] = isset($_REQUEST['status']) ? $_REQUEST['status'] : 1;
        $arr['path'] = isset($_REQUEST['path']) ? $_REQUEST['path'] : null;
        $arr['deleted'] = isset($_REQUEST['deleted']) ? $_REQUEST['deleted'] : 0;
        $arr['admin_approved'] = isset($_REQUEST['appr']) ? $_REQUEST['appr'] : 0;
        $arr['created'] = date('Y-m-d H:i:s');
        $arr['updated'] = date('Y-m-d H:i:s');
        $arr['uid'] = UID;
        
        
        if (!empty($_REQUEST['location'])) {
          $q = 'select * from  locations WHERE place_id = ?';
          $res = $Models_General->fetchRow($q, array($_REQUEST['location']['place_id']), TIMEBIG);
          if (empty($res)) {
            $id = $Models_General->addDetails('locations', $_REQUEST['location']);
            $res = $Models_General->fetchRow($q, array($_REQUEST['location']['place_id']), TIMEBIG);
          }
          $arr['location_id'] = $res['location_id'];
          $arr['lat'] = $_REQUEST['location']['latitude'];
          $arr['lng'] = $_REQUEST['location']['longitude'];
        }
        //insert into main db
        $id = $Models_General->addDetails($tableName, $arr);
        if (empty($id)) {
          throw new Exception('error in inserting'); 
        }
        //insert into tags db
        if (!empty($_REQUEST['tags'])) {
          $d = array();
          $d['id'] = $id;
          $exp = explode(',', $_REQUEST['tags']);
          if (!empty($exp)) {
            foreach ($exp as $v) {
              $d['tag'] = trim($v);
              if (empty($d['tag'])) continue;
              $Models_General->addDetails($tableTag, $d);
            }
          }
        }*/
        
      break;
      
    //update 
    case 'update':
//http://bootstrap.mkgalaxy.com/svnprojects/horo/records.php
//Get Params
//?action=update&saveIP=1&id=1
//Post params
//&uid=2&data={%22x%22:%22y%22}&title=This+is+title&path=/test&tid=1&location[latitude]=&location[longitude]=&location[country]=&location[state]=&location[city]=&location[zip]=&location[place_id]=&location[county]=&location[formatted_addr]=
//example: http://bootstrap.mkgalaxy.com/svnprojects/horo/records.php?action=update&saveIP=1&id=1&uid=2&data={%22x%22:%22y%22}&title=This+is+title&path=/test&tid=1&location[latitude]=37.7974273&location[longitude]=-121.21605260000001&location[country]=United+States&location[state]=CA&location[city]=Manteca&location[zip]=&location[place_id]=ChIJCUWMJENAkIARjMxOe6Wp4p0&location[county]=San+Joaquin+County&location[formatted_addr]=Manteca,+CA,+United+States&tags=a,b,c
//example 2: http://bootstrap.mkgalaxy.com/svnprojects/horo/records.php?action=update&saveIP=1&id=1&uid=2&data[x]=y&title=This+is+title&path=/test&tid=1&location[latitude]=37.7974273&location[longitude]=-121.21605260000001&location[country]=United+States&location[state]=CA&location[city]=Manteca&location[zip]=&location[place_id]=ChIJCUWMJENAkIARjMxOe6Wp4p0&location[county]=San+Joaquin+County&location[formatted_addr]=Manteca,+CA,+United+States&tags=a,b,c

//&access_token=ya29.bAJm48DiufO5cxC1kd5IE8f6lnEDIMseVzVF4D3i6GUQwf8gUWTfcpgpMF8EWmqRfyfVKQ

        
        if (empty($_REQUEST['id'])) {
          throw new Exception('empty id');
        }
        $id = $_REQUEST['id'];
        $DbTools = new DbTools();
        $arr = $DbTools->update($tableName, $tableTag, $id, $_REQUEST);
        $return['data'] = $arr;
        
        /*$arr = array();
        $q = 'select * from '.$tableName.' WHERE id = ?';
        $res = $Models_General->fetchRow($q, array($id), 0);
        
        if ($res['uid'] != UID) {
          throw new Exception('invalid user');
        }
        
        $data = $_REQUEST['data'];
        if (!is_array($data)) {
          $data = json_decode($_REQUEST['data'], 1);
        }
        $arr['details'] = json_encode($data);
        
        if (!empty($_REQUEST['saveIP'])) {
          $ip = !empty($_REQUEST['ip']) ? $_REQUEST['ip'] : $_SERVER['REMOTE_ADDR'];
          $q = 'select * from users_info WHERE ip = ?';
          $res = $Models_General->fetchRow($q, array($ip), TIMEBIG);
          if (empty($res)) {
            $ipDetails = iptocity($ip);
            $d = array();
            $d['ip'] = $ip;
            $d['users_info'] = json_encode($ipDetails['result']);
            $Models_General->addDetails('users_info', $d);
            $res = $Models_General->fetchRow($q, array($ip), TIMEBIG);
          }
          $arr['users_info_id'] = $res['users_info_id'];
        }
        
        $arr['title'] = isset($_REQUEST['title']) ? $_REQUEST['title'] : null;
        $arr['status'] = isset($_REQUEST['status']) ? $_REQUEST['status'] : 1;
        $arr['path'] = isset($_REQUEST['path']) ? $_REQUEST['path'] : null;
        $arr['deleted'] = isset($_REQUEST['deleted']) ? $_REQUEST['deleted'] : 0;
        $arr['admin_approved'] = isset($_REQUEST['appr']) ? $_REQUEST['appr'] : 0;
        $arr['updated'] = date('Y-m-d H:i:s');
        $arr['uid'] = UID;
        
        
        if (!empty($_REQUEST['location'])) {
          $q = 'select * from  locations WHERE place_id = ?';
          $res = $Models_General->fetchRow($q, array($_REQUEST['location']['place_id']), TIMEBIG);
          if (empty($res)) {
            $id = $Models_General->addDetails('locations', $_REQUEST['location']);
            $res = $Models_General->fetchRow($q, array($_REQUEST['location']['place_id']), TIMEBIG);
          }
          $arr['location_id'] = $res['location_id'];
          $arr['lat'] = $_REQUEST['location']['latitude'];
          $arr['lng'] = $_REQUEST['location']['longitude'];
        }
        //insert into main db
        $where = sprintf('id = %s', $Models_General->qstr($id));
        $Models_General->updateDetails($tableName, $arr, $where);
        
        $q = 'delete from '.$tableTag.' WHERE id = ?';
        $Models_General->deleteDetails($q, array($id));
        //insert into tags db
        if (!empty($_REQUEST['tags'])) {
          $d = array();
          $d['id'] = $id;
          $exp = explode(',', $_REQUEST['tags']);
          if (!empty($exp)) {
            foreach ($exp as $v) {
              $d['tag'] = trim($v);
              if (empty($d['tag'])) continue;
              $Models_General->addDetails($tableTag, $d);
            }
          }
        }*/
      break;
    
    //delete 
    case 'delete':
//http://bootstrap.mkgalaxy.com/svnprojects/horo/records.php
//Get Params
//?action=delete&id=15
//&access_token=ya29.bAJm48DiufO5cxC1kd5IE8f6lnEDIMseVzVF4D3i6GUQwf8gUWTfcpgpMF8EWmqRfyfVKQ
      if (empty($_REQUEST['id'])) {
        throw new Exception('id not found');  
      }
      $ids = $_REQUEST['id'];
      $DbTools = new DbTools();
      $return['data']['deleted'] = $DbTools->delete($ids, $tableName, $tableTag);
      /*$exp = explode(',', $ids);
      foreach ($exp as $id) {
        
        $q = 'select * from '.$tableName.' WHERE id = ?';
        $res = $Models_General->fetchRow($q, array($id), 0);
        
        if ($res['uid'] != UID) {
          throw new Exception('invalid user');
        }
        $q = 'delete from '.$tableName.' WHERE id = ?';
        $Models_General->deleteDetails($q, array($id));
        $q = 'delete from '.$tableTag.' WHERE id = ?';
        $Models_General->deleteDetails($q, array($id));
      }*/
      break;
    
    //getAll
    case 'getAll':
//http://bootstrap.mkgalaxy.com/svnprojects/horo/records.php
//Get Params
//?action=getAll
//getAll($tableName, $tagsTable, $max=100, $page=0, $params=array(), $cacheTime = 900)

      $DbTools = new DbTools();
      $data = $DbTools->getAll($tableName, $tableTag, $_GET);
      $return['data'] = $data;
      /*$page = 0;
      if (!empty($_GET['page'])) {
        $page = $_GET['page'];  
      }
      $max = 5;
      if (!empty($_GET['max'])) {
        $max = $_GET['max'];  
      }
      $params = array();
      $params['status'] = 1;
      $params['q'] = !empty($_GET['q']) ? $_GET['q'] : null; 
      $params['path'] = !empty($_GET['path']) ? $_GET['path'] : null; 
      $params['lat'] = !empty($_GET['lat']) ? $_GET['lat'] : null; //36.797 
      $params['lon'] = !empty($_GET['lon']) ? $_GET['lon'] : null; //-121.216 
      $params['radius'] = !empty($_GET['r']) ? $_GET['r'] : 30;
      $data = getAll($tableName, $tableTag, $max, $page, $params);
      if (!empty($data['results'])) {
        foreach ($data['results'] as $k => $v) {
          $q = 'select * from locations WHERE location_id = ?';
          $res2 = $Models_General->fetchRow($q, array($v['location_id']), TIMEBIG);
          $q = 'select * from users_info WHERE users_info_id = ?';
          //$res3 = $Models_General->fetchRow($q, array($v['users_info_id']), TIMEBIG);
          $res3['users_info_full'] = json_decode($res3['users_info'], 1);
          $q = 'select * from '.$tableTag.' WHERE id = ?';
          //$res4 = $Models_General->fetchAll($q, array($v['id']), TIMESMALL);
          $data['results'][$k]['location'] = $res2;
          //$data['results'][$k]['user_info'] = $res3;
          //$data['results'][$k]['tags'] = $res4;
        }
      }*/
      break;
    //getOne
    case 'getOne';
//http://bootstrap.mkgalaxy.com/svnprojects/horo/records.php
//Get Params
//?action=getOne&id=15
      if (empty($_REQUEST['id'])) {
        throw new Exception('missing id');  
      }
      $DbTools = new DbTools();
      $data = $DbTools->getOne($tableName, $tableTag, $_REQUEST['id']);
      $return['data'] = $data;
      
      /*$q = 'select * from '.$tableName.' WHERE id = ?';
      $res = $Models_General->fetchRow($q, array($_REQUEST['id']), TIMESMALL);
      $q = 'select * from locations WHERE location_id = ?';
      $res2 = $Models_General->fetchRow($q, array($res['location_id']), TIMEBIG);
      $q = 'select * from users_info WHERE users_info_id = ?';
      $res3 = $Models_General->fetchRow($q, array($res['users_info_id']), TIMEBIG);
      $res3['users_info_full'] = json_decode($res3['users_info'], 1);
      $q = 'select * from '.$tableTag.' WHERE id = ?';
      $res4 = $Models_General->fetchAll($q, array($res['id']), TIMESMALL);
      $data = array();
      $data = $res;
      $data['location'] = $res2;
      $data['user_info'] = $res3;
      $data['tags'] = $res4;
      $return['data'] = $data;*/
      break;
  }
  
} catch (Exception $e) {
  $return['success'] = 0;
  $return['error'] = 1;
  $return['errorMessage'] = $e->getMessage();
}
$return['get'] = $_GET;
$return['post'] = $_POST;
echo json_encode($return);