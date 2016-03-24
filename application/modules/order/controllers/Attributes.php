<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Attributes extends MY_Controller {

	public function index()
	{
		$data['data'] = $this->model->get('order_attributes');
		$data['content'] = 'attributes_content';
		$this->load->view('main',$data,FALSE);
	}

	public function detail($id="")
	{
		$get = $this->input->get();
		$data['idOAttribute'] = $id;
		$data['data'] = $this->model->join('order_attributes_detail','*',array(array('table'=>'order_attributes','parameter'=>'order_attributes_detail.idOAttribute=order_attributes.idOAttribute')),array('order_attributes_detail.idOAttribute'=>$id));
		$data['content'] = 'attributes_detail_content';
		$this->load->view('main',$data,FALSE);
	}

	public function add($id="")
	{
		$get = $this->input->get();
		$data['idOAttribute'] = $id;
		$data['getAttributes'] = $this->model->get_where('order_attributes',array('idOAttribute'=>$id));
		if (isset($get['u'])) {
			$data['getAttributesDetail'] = $this->model->get_where('order_attributes_detail',array('idOAttributesDetail'=>$get['u']),'orderOAttributeDetail','desc');
			$data['content'] = 'attribute_detail_add';
		} else{
			$data['content'] = 'attribute_add';
		}

		$this->load->view('main',$data,FALSE);
	}

	public function save()
	{
		$post = $this->input->post();
		if ($post['idOAttribute']) {
			$post['modifiedDate'] = date('Y-m-d H:i:s');
			$post['modifiedBy'] = $this->session->userdata('usernameUser');
			$this->model->update_data('order_attributes',$post,array('idOAttribute'=>$post['idOAttribute']));
		} else {
			$post['createdDate'] = date('Y-m-d H:i:s');
			$post['createdBy'] = $this->session->userdata('usernameUser');
			$this->model->insert_data('order_attributes',$post);
		}
		redirect('order/attributes');
	}

	public function save_detail()
	{
		$post = $this->input->post();
		if ($post['idOAttributesDetail']) {
			$post['modifiedDate'] = date('Y-m-d H:i:s');
			$post['modifiedBy'] = $this->session->userdata('usernameUser');
			$this->model->update_data('order_attributes_detail',$post,array('idOAttributesDetail'=>$post['idOAttributesDetail']));
		} else {
			$post['createdDate'] = date('Y-m-d H:i:s');
			$post['createdBy'] = $this->session->userdata('usernameUser');
			$this->model->insert_data('order_attributes_detail',$post);
		}
		redirect('order/attributes/detail/'.$post['idOAttribute']);
	}

}

/* End of file Attributes.php */
/* Location: ./application/modules/order/controllers/Attributes.php */