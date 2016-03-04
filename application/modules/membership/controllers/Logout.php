<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Logout extends MY_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('model','',FALSE);
	}


	public function index(){
		$this->session->sess_destroy();
		delete_cookie('remember_me');
		redirect('membership/login');
	}



}

/* End of file Logout.php */
/* Location: ./application/modules/membership/controllers/Logout.php */