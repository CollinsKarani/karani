<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Attributes extends MY_Controller {

	public function __construct()
	{
		parent::__construct();
		//Do your magic here
	}

	public function index()
	{
		$data['data'] = $this->model->get('pengaturan_attribute');
		$data['content'] = 'attributes_content';
		$this->load->view('main',$data,FALSE);
	}

	public function detail()
	{
		$get = $this->input->get();
		$data['data'] = $this->model->join('pengaturan_attribute_detail','*',array(array('table'=>'pengaturan_attribute','parameter'=>'pengaturan_attribute_detail.idPAttribute=pengaturan_attribute.idPAttribute')),array('pengaturan_attribute_detail.idPAttribute'=>$get['u']));
		$data['content'] = 'attributes_detail_content';
		$this->load->view('main',$data,FALSE);
	}

	public function add($id="")
	{
		$data['idAttribute'] = $id;
		$data['getAttributes'] = $this->model->get_where('pengaturan_attribute',array('idPAttribute'=>$id));
		$data['getAttributesDetail'] = $this->model->get_where('pengaturan_attribute_detail',array('idPAttribute'=>$id));
		$data['content'] = 'attribute_add';

		$this->load->view('main',$data,FALSE);
	}


}

/* End of file Attributes.php */
/* Location: ./application/modules/setting/controllers/Attributes.php */