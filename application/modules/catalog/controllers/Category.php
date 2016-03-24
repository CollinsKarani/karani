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

	public function detail($id="")
	{
		$get = $this->input->get();
		$data['idCategory'] = $id;
		$data['data'] = $this->model->get_where('catalog_category',array('kodeInduk'=>$id));
		$data['content'] = 'category_detail_content';
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

	public function delete($id)
	{
		// $getModule = $this->model->get_where('master_module',array('idModule'=>$id));
		// $deleteModule = $this->model->delete_data('master_module',array('idModule'=>$id));
		// echo deleteDir('application/modules/'.strtolower($getModule[0]['nameModule']));
		$post['idKategori'] = 0;
		$this->model->update_data('catalog',$post,array('idKategori'=>$id));
		$this->model->delete_data('catalog_category',array('kodeInduk'=>$id));
		$this->model->delete_data('catalog_category',array('idCategory'=>$id));
		// $getProduct = $this->model->get_where('catalog',array('idKategori'=>$id));
		// foreach ($getProduct as $key => $value) {
		// 	$getComment = $this->model->get_where('catalog_comment',array('idCatalog'=>$value['idCatalog']));
		// 	print_r($getComment);
		// }
		// print_r($getCategory);
		// print_r($getProduct);
	}
}

/* End of file Category.php */
/* Location: ./application/modules/catalog/controllers/Category.php */