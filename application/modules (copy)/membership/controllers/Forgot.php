<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Forgot extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('model','',FALSE);
	}


	public function index(){

		$this->load->view('forgot','',FALSE);

	}

	public function submit($params=""){

		$post = $this->input->post();
		

		if ($params == "hp") {

			$data['getMember'] = $this->model->get_where('user',array('phone'=>$post['phone']));

			if ($data['getMember']) {

				$member_db = $this->model->get_where('user',array('phone'=>$post['phone']));

				$password = random_password();
				$data1 = array();
				$data1['passwordUser'] = sha1(md5($password));
				$data2['confirmation_code'] = $data1['passwordUser'];
			// $this->model->update_data('user',$data1,array('idUser'=>$member_db[0]['idUser']));

				$member_conf_db = $this->model->get_where('member_confirmation',array('username'=>$member_db[0]['usernameUser']));
				if($member_conf_db){
					$this->model->update_data('member_confirmation',$data2,array('username'=>$member_db[0]['usernameUser']));
				}else{
					$data2['username'] = $member_db[0]['usernameUser'];
					$data2['confirmation_datetime'] = date("Y-m-d H:i:s");
					$this->model->insert_data('member_confirmation',$data2);
				}

				$content = $this->model->get_where('master_menu', array("idMenu" => '30'));
				$content = $content[0]['resumeMenu'];
				$content = str_replace(PHP_EOL, "\n", $content);
				$content = str_replace("kode_reset", $password, $content);
				$content = str_replace("tanggal_reset", date("d-m-Y H:i"), $content);

				echo $content;

				$this->session->set_flashdata('code_send', $post['phone']);

			}else{
				$this->session->set_flashdata('temp_phone', $post['phone']);
				$this->session->set_flashdata('error_not_found', 'Maaf no handphone tidak ditemukan');
			}

			$this->load->view('forgot','',FALSE);

		}elseif($params == "code"){

			$data['getConfirm'] = $this->model->getMemberByConfirmCode(sha1(md5($post['codeForgot'])));

			if ($data['getConfirm'][0]['confirmation_code']) {
				redirect(''.getModule().'/confirmation/set_password/'.$data['getConfirm'][0]['confirmation_code']);
			}else{
				$this->session->set_flashdata('not_code', 'Maaf kode reset password tidak ditemukan');
			}

			$this->load->view('forgot','',FALSE);

		}

	}


}

/* End of file Forgot.php */
/* Location: ./application/modules/membership/controllers/Forgot.php */