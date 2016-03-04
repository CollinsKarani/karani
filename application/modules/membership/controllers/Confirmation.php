<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Confirmation extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('model','',FALSE);
	}


	public function index(){
		
		$this->load->view('confirmation','',FALSE);

	}

	public function submit(){

		$post = $this->input->post();

		$data['getMember'] = $this->model->getMemberByConfirmCode(sha1(md5($post['kodeAct'])));

		if ($data['getMember'][0]['confirmation_code']) {
			redirect(''.getModule().'/'.getController().'/set_password/'.$data['getMember'][0]['confirmation_code']);
		}else{
			$this->session->set_flashdata('error_not_found', 'Maaf kode aktivasi tidak ditemukan');
		}

		$this->session->set_flashdata('temp_kodeAct', $post['kodeAct']);
		$this->load->view('confirmation','',FALSE);

	}

	public function set_password($confirmation_code=""){

		$post = $this->input->post();
		$object = array();

		$data['getMember'] = $this->model->getMemberByConfirmCode($confirmation_code);
		$data['confirmation_code'] = $confirmation_code;

		if ($confirmation_code==$data['getMember'][0]['confirmation_code']) {

			$this->form_validation->set_error_delimiters('<p class="text-danger">', '</p>');
			$this->form_validation->set_rules('password', 'password', 'trim|required');
			$this->form_validation->set_rules('confirm_password', 'confirm password', 'trim|required|matches[password]');

			if ($this->form_validation->run() == TRUE) {			

				$object['passwordUser'] = hash_password($post['password']);
				$object['statusUser'] = 'y';				

				$this->model->update_data('user',$object,array('usernameUser'=>$data['getMember'][0]['usernameUser']));
				$this->model->delete_data('member_confirmation',array('username'=>$data['getMember'][0]['usernameUser']));

				$this->session->set_flashdata('successAct', TRUE);
				$this->load->view('reset_password',$data,FALSE);

			}else{
				
				$this->load->view('reset_password',$data,FALSE);

			}

		}else{
			redirect(base_url());
		}

	}



}

/* End of file Confirmation.php */
/* Location: ./application/modules/membership/controllers/Confirmation.php */