<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Data extends MY_Controller {

	public function index()
	{

		$data['data'] = $this->model->get('order');
		$data['content'] = 'order_content';
		$this->load->view('main',$data,FALSE);
	}

	public function add($id="")
	{
		$data['other_css'] = 'plugins/dependent-dropdown/css/dependent-dropdown.min.css';
		$data['other_js'] = 'plugins/dependent-dropdown/js/dependent-dropdown.min.js';
		$data['content'] = 'order_add';
		$data['getOrder'] = $this->model->get_where('order',array('idOrder'=>$id));
		$this->load->library('rajaongkir');
		$provinces = $this->rajaongkir->province();
		$json_province = json_decode($provinces,true);
		$data['getProvince'] = $json_province['rajaongkir']['results'];
		$this->load->view('main',$data,FALSE);
	}

	public function save()
	{
		$post = $this->input->post();
		$this->load->library('rajaongkir');
		$cost = $this->rajaongkir->cost($post['cityOrigin'], $post['cityDestination'], 1000,$post['courier']);
		print_r($post);
		echo $cost;
	}

	public function child($id="")
	{
		$this->load->library('rajaongkir');
		$city = $this->rajaongkir->city($id);
		$json_city = json_decode($city,true);
		$getCity = $json_city['rajaongkir']['results'];
		print_r($getCity);
	}

}

/* End of file Data.php */
/* Location: ./application/modules/order/controllers/Data.php */