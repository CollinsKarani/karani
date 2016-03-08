<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Attributes extends MY_Controller {

	public function index()
	{
		$data['data'] = $this->model->get('catalog_attributes');
		$data['content'] = 'attributes_content';
		$this->load->view('main',$data,FALSE);
	}

	public function detail()
	{
		$get = $this->input->get();
		$data['data'] = $this->model->join('catalog_attributes_detail','*',array(array('table'=>'catalog_attributes','parameter'=>'catalog_attributes_detail.idCAttribute=catalog_attributes.idCAttribute')),array('catalog_attributes_detail.idCAttribute'=>$get['u']));
		$data['content'] = 'attributes_detail_content';
		$this->load->view('main',$data,FALSE);
	}

}

/* End of file Attributes.php */
/* Location: ./application/modules/catalog/controllers/Attributes.php */