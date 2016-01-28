<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Events_Model extends MY_Model
{


	public function __construct()
	{
		parent::__construct();
	}//end __construct();


	public function getRecords()
	{
		try {
			$return = array();
			$sql = 'select * from '.DB_EVENTS.' order by event_id DESC';
			$rs = $this->CI->adodb->Execute($sql);
			while (!$rs->EOF) {
				$return[] = $rs->fields;
				$rs->MoveNext();
			}
	
			return $return;
		} catch (Exception $e) {
			$array = array('error' => 1, 'error_message' => $e->getMessage());
			return $array;
		}
	}//end getRecords();


	public function getRecord($id)
	{
		try {
			if (empty($id)) {
				throw new Exception('Please choose event');
			}

			$return = array();
			$sql = 'select * from '.DB_EVENTS.' WHERE event_id = ?';
			$rs = $this->CI->adodb->Execute($sql, array($id));
			return $rs->fields;
		} catch (Exception $e) {
			$array = array('error' => 1, 'error_message' => $e->getMessage());
			return $array;
		}
	}//end getRecord();

	public function create_new_event($post=array())
	{
		try {
			if (empty($post)) {
				throw new Exception('Empty Post Variables');
			}

			if (empty($post['event_name'])) {
				throw new Exception ('Empty events name');
			}

			if (empty($post['event_creator_id'])) {
				throw new Exception ('Empty events creator id.');
			}

			$this->CI->adodb->AutoExecute(DB_EVENTS, $post, 'INSERT');
			$id = $this->CI->adodb->Insert_ID(DB_EVENTS, 'event_id');
			return $id;
		} catch (Exception $e) {
			$array = array('error' => 1, 'error_message' => $e->getMessage());
			return $array;
		}
	}

	public function insert_question($arr=array())
	{
		try {
			if (empty($arr)) {
				throw new Exception('Empty Post Variables');
			}

			if (empty($arr['question'])) {
				throw new Exception ('Empty question');
			}

			if (empty($arr['qa_creator_id'])) {
				throw new Exception ('Empty question creator id.');
			}

			$this->CI->adodb->AutoExecute(DB_QA, $arr, 'INSERT');
			$id = $this->CI->adodb->Insert_ID(DB_QA, 'qa_id');
			return $id;
		} catch (Exception $e) {
			$array = array('error' => 1, 'error_message' => $e->getMessage());
			return $array;
		}
	}
}
?>