<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Register extends CI_Controller {	

	public function __construct()
	{
		parent::__construct();
		$this->load->model('model','',FALSE);
	}

	public function index()
	{
		$this->load->view('register','',FALSE);
	}

	public function getOption($id="")
	{
		empty($id) ? $sql = "" : $sql = $this->model->get_where('master_data',array('kodeInduk'=>$id));
		$query = $sql;
		// $select = "<select name='kelas' id='kelas2' class='search-select form-control' data-validation='required'>";		
		if(!empty($id)){
			foreach ($query as $row) {
				$select .= "<option value='".$row['idData']."'>".$row['namaData']."";
			}
		}
		// $select .= "</select>";
		echo $select;
	}

	public function submit()
	{

		$post = $this->input->post();

		$user = array();
		$user_info = array();

		$this->form_validation->set_error_delimiters('<p class="text-danger">', '</p>');		
		$this->form_validation->set_rules('emailUser', 'emailUser', 'trim|required|valid_email|is_unique[user.emailUser]',array('is_unique'=>'Maaf email sudah terpakai'));
		$this->form_validation->set_rules('usernameUser', 'usernameUser', 'trim|required|is_unique[user.usernameUser]',array('is_unique'=>'Maaf username sudah terpakai'));
		$this->form_validation->set_rules('phone', 'phone', 'trim|required|is_unique[user.phone]',array('is_unique'=>'Maaf no handphone sudah terpakai'));

		if ($this->form_validation->run() == FALSE)
		{			
			// $data['content'] = "frontend/join";
			$this->load->view('register','',FALSE);

		}else{


			$user['usernameUser'] = $post['usernameUser'];
			$user['nameUser'] = $post['nameUser'];		
			$user['emailUser'] = $post['emailUser'];
			$user['phone'] = $post['phone'];
		// $user['passwordUser'] = hash_password($post['passwordUser']);
			$user['roleUser'] = '4';
			$user['statusUser'] = 'p';
			$user['created_date'] = date('Y-m-d H:i:s');		

			$this->model->insert_data('user',$user);

			$getUser = $this->model->get_where('user',array('usernameUser'=>$post['usernameUser']));

			$user_info['idUser'] = $getUser[0]['idUser'];
			$user_info['angkatanUser'] = $post['angkatanUser'];
			$user_info['jurusan'] = $post['jurusan'];
			$user_info['kelas'] = $post['kelas'];
			$user_info['tempatLahir'] = $post['tempatLahir'];
			$user_info['tglLahir'] = setTanggal($post['tglLahir']);

			$this->model->insert_data('user_info',$user_info);

			$this->session->set_flashdata('success_register', $post['phone']);

			$this->load->view('register','',FALSE);
			redirect('membership/register');

		}

	}


}

/* End of file Register.php */
/* Location: ./application/modules/membership/controllers/Register.php */