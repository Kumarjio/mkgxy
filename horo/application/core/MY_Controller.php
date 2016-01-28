<?php
class MY_Controller extends CI_Controller
{

	protected $_custom = array();

	public function __construct()
	{
		parent::__construct();
		$this->_custom['controller'] = $this->router->class;
		$this->_custom['action'] = $this->router->method;
	}


	protected function json_($data=array())
	{
		header('Content-type: application/json');
		echo json_encode($data);
	}


	protected function _login()
	{
		$this->session->set_userdata('redirect_url', uri_string());
		if (empty($_COOKIE['user_id'])) {
			echo $this->load->view('sn/login', array(), true);
			exit;
		}
	}

	protected function _login2()
	{
		if ($_SERVER['REQUEST_URI'] === '/horo2' || $_SERVER['REQUEST_URI'] === '/horo2/' || $_SERVER['REQUEST_URI'] === '/horo2/home') {
			
		} else {
			$this->session->set_userdata('redirect_url', uri_string());
			if (empty($_COOKIE['user_id'])) {
				echo $this->layout->view('kundali2/login', array(), true);
				exit;
			}
		}
	}

	/*
		This function outputs in json or displays it in view
	*/
	protected function _custom_output($view='', $data=array(), $isLayout=true, $output='')
	{
		if ($this->input->get('output') === 'json' || $output === 'json') {
			 header('Content-type: application/json');
			 $result = json_encode($data);
			 echo $result;
		} else {
			if ($this->input->get('nolayout')) {
				$isLayout = false;
			}

			if ($isLayout) {
				$this->layout->view($view, $data);
			} else {
				$this->load->view($view, $data);
			}
		}
	}
}
?>