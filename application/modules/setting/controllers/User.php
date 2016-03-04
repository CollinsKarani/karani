<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends MY_Controller {

	public function index()
	{
		$data['data'] = $this->model->get('user');
		$data['content'] = 'member_content';
		$this->load->view('main',$data,FALSE);
	}

	public function add($id="")
	{
		$data['content'] = 'member_add';
		$data['getMember'] = $this->model->get_where('user',array('idUser'=>$id));

		$this->load->view('main',$data,FALSE);
	}

	public function save($id="")
	{
		$post = $this->input->post();
		$data['getMember'] = $this->model->get_where('user',array('idUser'=>$id));
		$this->form_validation->set_rules('usernameUser', 'Username User', 'required');
		$this->form_validation->set_rules('nameUser', 'Nama User', 'required');
		$this->form_validation->set_rules('emailUser', 'Email User', 'required');
		$this->form_validation->set_rules('roleUser', 'Role User', 'required');

		if ($this->form_validation->run() == FALSE)
		{
			$data['content'] = 'member_add';
			$this->load->view('main',$data,FALSE);
		}
		else{
			if ($post['idUser']) {
				$this->model->update_data('user',$post,array('idMember'=>$post['idMember']));
			}
			else{
				$post['created_date'] = date('Y-m-d H:i:s');
				$post['created_by'] = $this->session->userdata('usernameUser');
				$this->model->insert_data('user',$post);
			}
			redirect('setting/user');
		}
	}

	public function delete($id)
	{
		$this->model->delete_data('user',array('idUser'=>$id));
	}
}

/* End of file User.php */
/* Location: ./application/modules/pengaturan/controllers/User.php */