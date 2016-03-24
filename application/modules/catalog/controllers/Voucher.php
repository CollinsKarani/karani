<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Voucher extends MY_Controller {

	public function index()
	{
		$data['data'] = $this->model->get('catalog_voucher');
		$data['content'] = 'voucher_content';
		$this->load->view('main',$data,FALSE);
	}

	public function add($id="")
	{
		$data['content'] = 'voucher_add';
		$data['getVoucher'] = $this->model->get_where('catalog_voucher',array('idCVoucher'=>$id));
		$this->load->view('main',$data,FALSE);
	}

	public function save()
	{
		$post = $this->input->post();
		$post['startDate'] = date('Y-m-d',strtotime($post['startDate']));
		$post['expiredDate'] = date('Y-m-d',strtotime($post['expiredDate']));
		$post['nominalCVoucher'] = str_replace(".", "", $post['nominalCVoucher']);
		$post['minimumOrder'] = str_replace(".", "", $post['minimumOrder']);
		if ($post['idCVoucher']) {
			$post['updatedDate'] = date('Y-m-d H:i:s');
			$post['updatedBy'] = $this->session->userdata('usernameUser');
			$this->model->update_data('catalog_voucher',$post,array('idCVoucher'=>$post['idCVoucher']));
		}
		else{
			$post['createdDate'] = date('Y-m-d H:i:s');
			$post['createdBy'] = $this->session->userdata('usernameUser');
			$this->model->insert_data('catalog_voucher',$post);
		}
		redirect('catalog/voucher');
	}

	public function delete($id)
	{
		$this->model->delete_data('catalog_voucher',array('idCVoucher'=>$id));
	}

}

/* End of file Voucher.php */
/* Location: ./application/modules/catalog/controllers/Voucher.php */