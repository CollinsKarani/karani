<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends MY_Controller {

public function index()
{
$data['content'] = 'dashboard_content';
$this->load->view('main',$data,FALSE);
}

}