<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Comment extends MY_Controller {

	public function index()
	{
		$data['data'] = $this->model->get('catalog_comment');
		$data['content'] = 'comment_content';
		$this->load->view('main',$data,FALSE);
	}

	public function add($id="")
	{
		$data['content'] = 'comment_add';
		$data['getComment'] = $this->model->get_where('catalog_comment',array('idCComment'=>$id));
		$this->load->view('main',$data,FALSE);
	}

	public function save()
	{
		$post = $this->input->post();
		$post['usernameMember'] = $this->session->userdata('usernameUser');
		$post['createdDate'] = date('Y-m-d H:i:s');
		$this->model->insert_data('catalog_comment',$post);
		redirect('catalog/comment');
	}

}

/* End of file Comment.php */
/* Location: ./application/modules/catalog/controllers/Comment.php */