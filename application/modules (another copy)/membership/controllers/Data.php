<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Data extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('model','',FALSE);
	}


	public function index(){

		echo "haii";

	}

	public function test(){

		$this->load->library('sms');
		$this->sms->send('085218078785', 'bismillah');

	}



}

/* End of file Data.php */
/* Location: ./application/modules/membership/controllers/Data.php */