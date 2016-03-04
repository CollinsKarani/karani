<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends MY_Controller {

	public function index()
	{
		$data['data'] = $this->model->get('member');
		$data['content'] = 'member_content';
		$this->load->view('main',$data,FALSE);
	}

	public function add($id="")
	{
		$data['content'] = 'member_add';
		$data['getMember'] = $this->model->get_where('member',array('idMember'=>$id));

		$this->load->view('main',$data,FALSE);
	}

	public function save()
	{
		$post = $this->input->post();
		if ($post['idMember']) {
			$this->model->update_data('member',$post,array('idMember'=>$post['idMember']));
		}
		else{
			$post['createdDate'] = date('Y-m-d H:i:s');
			$this->model->insert_data('member',$post);
		}
		redirect('pengaturan/user');
	}
}

/* End of file User.php */
/* Location: ./application/modules/pengaturan/controllers/User.php */