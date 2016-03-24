<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Attributes extends MY_Controller {

	public function index()
	{
		$data['data'] = $this->model->get('catalog_attributes');
		$data['content'] = 'attributes_content';
		$this->load->view('main',$data,FALSE);
	}

	public function detail($id="")
	{
		$get = $this->input->get();
		$data['idCAttribute'] = $id;
		$data['data'] = $this->model->join('catalog_attributes_detail','*',array(array('table'=>'catalog_attributes','parameter'=>'catalog_attributes_detail.idCAttribute=catalog_attributes.idCAttribute')),array('catalog_attributes_detail.idCAttribute'=>$id));
		$data['content'] = 'attributes_detail_content';
		$this->load->view('main',$data,FALSE);
	}

	public function add($id="")
	{
		$get = $this->input->get();
		$data['idCAttribute'] = $id;
		$data['getAttributes'] = $this->model->get_where('catalog_attributes',array('idCAttribute'=>$id));
		if (isset($get['u'])) {
			$data['getAttributesDetail'] = $this->model->get_where('catalog_attributes_detail',array('idCAttributesDetail'=>$get['u']),'orderCAttributeDetail','desc');
			$data['content'] = 'attribute_detail_add';
		} else{
			$data['content'] = 'attribute_add';
		}

		$this->load->view('main',$data,FALSE);
	}

	public function save()
	{
		$post = $this->input->post();
		if ($post['idCAttribute']) {
			$post['modifiedDate'] = date('Y-m-d H:i:s');
			$post['modifiedBy'] = $this->session->userdata('usernameUser');
			$this->model->update_data('catalog_attributes',$post,array('idCAttribute'=>$post['idCAttribute']));
		} else {
			$post['createdDate'] = date('Y-m-d H:i:s');
			$post['createdBy'] = $this->session->userdata('usernameUser');
			$this->model->insert_data('catalog_attributes',$post);
		}
		redirect('catalog/attributes');
	}

	public function save_detail()
	{
		$post = $this->input->post();
		if ($post['idCAttributesDetail']) {
			$post['modifiedDate'] = date('Y-m-d H:i:s');
			$post['modifiedBy'] = $this->session->userdata('usernameUser');
			$this->model->update_data('catalog_attributes_detail',$post,array('idCAttributesDetail'=>$post['idCAttributesDetail']));
		} else {
			$post['createdDate'] = date('Y-m-d H:i:s');
			$post['createdBy'] = $this->session->userdata('usernameUser');
			$this->model->insert_data('catalog_attributes_detail',$post);
		}
		redirect('catalog/attributes/detail/'.$post['idCAttribute']);
	}

	public function delete($id)
	{
		echo $id;
		$getAttributesDetail = $this->model->get_where('catalog_attributes_detail',array('idCAttribute'=>$id));
		$this->model->delete_data('catalog_attributes_detail',array('idCAttribute'=>$id));
		$this->model->delete_data('catalog_attributes',array('idCAttribute'=>$id));
	}

}

/* End of file Attributes.php */
/* Location: ./application/modules/catalog/controllers/Attributes.php */