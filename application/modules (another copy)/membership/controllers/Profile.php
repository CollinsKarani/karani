<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profile extends MY_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('model','',FALSE);
	}


	public function index(){
		
		$data['content'] = 'profile';
		$this->load->view('main',$data,FALSE);

	}

	public function save($params=""){

		$post = $this->input->post();
		$saved = "Data anda berhasil disimpan";

		if ($params == "info") {

			$this->form_validation->set_error_delimiters('<p class="text-danger">', '</p>');
			
			$post['emailUser'] != getMember('emailUser') ? $emailUnique = '|is_unique[user.emailUser]' : $emailUnique = '';

			$post['phone'] != getMember('phone') ? $phoneUnique = '|is_unique[user.phone]' : $phoneUnique = '';

			$this->form_validation->set_rules('emailUser', 'emailUser', 'trim|required|valid_email'.$emailUnique,array('is_unique'=>'Maaf email sudah terpakai'));
			$this->form_validation->set_rules('phone', 'phone', 'trim|required'.$phoneUnique,array('is_unique'=>'Maaf no handphone sudah terpakai'));

			if ($this->form_validation->run() == FALSE){

				$this->session->set_flashdata('actSetting',TRUE);
				$data['content'] = 'profile';
				$this->load->view('main',$data,FALSE);

			}else{

				$data = array(
					'nameUser' => $post['nameUser'],
					'emailUser' => $post['emailUser'],
					'phone' => $post['phone'],					
					);

				$data2 = array(
					'idUser' => getMember('id'),
					'aboutMe' => $post['aboutMe'],
					'pekerjaan' => $post['pekerjaan']
					);				

				if (empty(getMember('id_userInfo'))) {
					$this->model->update_data('user',$data,array('idUser'=>getMember('id')));
					$this->model->insert_data('user_info',$data2);
				}else{
					$this->model->update_data('user',$data,array('idUser'=>getMember('id')));
					$this->model->update_data('user_info',$data2,array('idUser'=>getMember('id')));	
				}

				$this->session->set_flashdata('save_info',$saved);

				redirect(getModule().'/'.getController());

			}
			

		}

	}


}

/* End of file Profile.php */
/* Location: ./application/modules/membership/controllers/Profile.php */