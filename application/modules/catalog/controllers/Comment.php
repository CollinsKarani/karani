<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Comment extends MY_Controller {

	public function index()
	{
		$data['data'] = $this->model->get('catalog_attributes');
		$data['content'] = 'comment_content';
		$this->load->view('main',$data,FALSE);
	}

}

/* End of file Comment.php */
/* Location: ./application/modules/catalog/controllers/Comment.php */