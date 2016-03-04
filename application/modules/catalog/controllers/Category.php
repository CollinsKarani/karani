<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Category extends MY_Controller {

	public function __construct()
	{
		parent::__construct();
		//Do your magic here
	}

	public function index()
	{
		$data['data'] = $this->model->get('catalog_category');
		$data['content'] = 'category_content';
		$this->load->view('main',$data,FALSE);
	}

	public function add($id="")
	{
		$data['content'] = 'category_add';
		$data['getCategory'] = $this->model->get_where('catalog_category',array('idCategory'=>$id));
		$this->load->view('main',$data,FALSE);
	}

	public function save()
	{
		$post = $this->input->post();
		if ($post['idCategory']) {
			$post['updatedBy'] = $this->session->userdata('usernameUser');
			$post['updatedTime'] = date('Y-m-d H:i:s'); 
			$this->model->update_data('catalog_category',$post,array('idCategory'=>$post['idCategory']));
		}
		else{
			$post['createdBy'] = $this->session->userdata('usernameUser');
			$post['createdTime'] = date('Y-m-d H:i:s'); 
			$this->model->insert_data('catalog_category',$post);
		}
		redirect('catalog/category');
	}

}

/* End of file Category.php */
/* Location: ./application/modules/catalog/controllers/Category.php */