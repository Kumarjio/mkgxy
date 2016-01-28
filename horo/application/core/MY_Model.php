<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class MY_Model extends CI_Model
{
	protected $CI;

	public function __construct()
	{
		parent::__construct();
		$this->CI =& get_instance();
	}
}
?>