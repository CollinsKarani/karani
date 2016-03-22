<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Product extends MY_Controller {

	public function index()
	{
		$data['value'] = $this->input->post('value');
		$data['data'] = $this->model->get('catalog');
		$data['content'] = 'catalog_content';
		$this->load->view('main',$data,FALSE);
	}

	public function add($id="")
	{
		$data['content'] = 'catalog_add';
		$data['getProductDetail'] = $this->model->join('catalog_detail_stock','*',array(array('table'=>'catalog','parameter'=>'catalog_detail_stock.idCatalog=catalog.idCatalog')),array('catalog_detail_stock.idCatalog'=>$id));
		$data['getProductColor'] = $this->model->join('catalog_detail_stock','idWarna',array(array('table'=>'catalog','parameter'=>'catalog_detail_stock.idCatalog=catalog.idCatalog')),array('catalog_detail_stock.idCatalog'=>$id),'','');
		$data['getProduct'] = $this->model->get_where('catalog',array('idCatalog'=>$id));
		$data['getProductGallery'] = $this->model->join('catalog_galeri','*',array(array('table'=>'catalog','parameter'=>'catalog_galeri.idCatalog=catalog.idCatalog')),array('catalog_galeri.idCatalog'=>$id));

		$this->load->library('RajaOngkir');
		$provinces = $this->rajaongkir->province();
		$json_province = json_decode($provinces,true);
		$data['getProvince'] = $json_province['rajaongkir']['results'];

		$this->load->view('main',$data,FALSE);
	}

	public function combination($id="")
	{
		$data['idCatalog'] = $id;
		$data['content'] = 'catalog_add_combination';
		$data['getProductDetail'] = $this->model->get_where('catalog_detail_stock',array('idStock'=>$id));
		$this->load->view('main',$data,FALSE);
	}

	public function save()
	{
		$post = $this->input->post();
		if ($post['idCatalog']) {
			$post['updatedBy'] = $this->session->userdata('usernameUser');
			$post['updatedDate'] = date('Y-m-d H:i:s'); 
			$this->model->update_data('catalog',$post,array('idCatalog'=>$post['idCatalog']));
		}
		else{
			$post['createdBy'] = $this->session->userdata('usernameUser');
			$post['createdDate'] = date('Y-m-d H:i:s'); 
			$this->model->insert_data('catalog',$post);
		}
		redirect('catalog/product');
	}

	public function save_combination(){
		$post = $this->input->post();
		if ($post['idStock']) {
			$data['lengthStock'] = $post['lengthStock'];
			$data['widthStock'] = $post['widthStock'];
			unset($post['lengthStock'],$post['widthStock']);
			$post['updatedBy'] = $this->session->userdata('usernameUser');
			$post['updatedDate'] = date('Y-m-d H:i:s');
			$this->model->update_data('catalog_detail_stock',$post,array('idStock'=>$post['idStock']));
			$this->model->update_data('catalog_detail_stock',$data,array('idSize'=>$post['idSize']));
		}
		else{
			for ($i=0; $i < count($post['idWarna']) ; $i++) {
				$data['idCatalog'] = $post['idCatalog'];
				$data['idSize'] = $post['idSize'];
				$data['lengthStock'] = $post['lengthStock'];
				$data['widthStock'] = $post['widthStock'];
				$data['idWarna'] = $post['idWarna'][$i];
				$data['createdBy'] = $this->session->userdata('usernameUser');
				$data['createdDate'] = date('Y-m-d H:i:s'); 
				print_r($data);
				$this->model->insert_data('catalog_detail_stock',$data);
			}
		}
		
		redirect('catalog/product/add/'.$post['idCatalog']);
	}

	public function save_quantity()
	{
		$post = $this->input->post();
		for ($i=0; $i < count($post['idStock']) ; $i++) {
			$data['idStock'] = $post['idStock'][$i];
			$data['jumlahStock'] = $post['jumlahStock'][$i];
			$this->model->update_data('catalog_detail_stock',$data,array('idStock'=>$data['idStock']));
		}
		redirect('catalog/product/add/'.$post['idCatalog']);
	}

	public function uploads()
	{
		$post = $this->input->post();
		$this->load->library('uploads');
		$data = $this->uploads->upload_image('fotoUser','assets/uploads/product-'.$post['idCatalog'].'-'.$post['namaCatalog']);
		$post['fotoCGaleri'] = $data['file_name'];
		$post['createdBy'] = $this->session->userdata('usernameUser');
		$post['createdDate'] = date('Y-m-d H:i:s'); 
		unset($post['namaCatalog']);
		$this->model->insert_data('catalog_galeri',$post);
		// $this->load->library('uploads');
		// $this->uploads->upload_image();
	}

	public function test()
	{
		$this->load->library('rajaongkir');
		$provinces = $this->rajaongkir->city(1);
		$json_province = json_decode($provinces,true);
		$data['getProvince'] = $json_province['rajaongkir']['results'];
		$cost = $this->rajaongkir->cost(501, 114, 1000,'all');
		echo $cost;
	}

	public function sessions()
	{
		$post = $this->input->post();
		print_r($post);
	}

}

/* End of file Product.php */
/* Location: ./application/modules/catalog/controllers/Product.php */