<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ajax_content extends CI_Controller {

	public function index()
	{
		
	}

	public function getCityOrigin($id="")
	{
		$this->load->library('rajaongkir');
		$city = $this->rajaongkir->city($id);
		$json_city = json_decode($city,true);
		$data['getCity'] = $json_city['rajaongkir']['results'];
		$this->load->view('ajax_get_city',$data);
	}

	public function getCityDestination($id="")
	{
		$this->load->library('rajaongkir');
		$city = $this->rajaongkir->city($id);
		$json_city = json_decode($city,true);
		$data['getCity'] = $json_city['rajaongkir']['results'];
		$this->load->view('ajax_city_destination',$data);
	}

}

/* End of file Ajax_content.php */
/* Location: ./application/modules/order/controllers/Ajax_content.php */