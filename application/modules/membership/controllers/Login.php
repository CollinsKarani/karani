<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	function _remember_me(){
		if ($this->input->cookie('remember_me')) {
			$getMember = $this->model->get_where('user',array('usernameUser'=>$this->input->cookie('remember_me')));
			$newdata = array(
				'idUser'  => @$getUser[0]['idUser'],
				'usernameUser'  => @$getMember[0]['usernameUser'],
				'phone'  => @$getMember[0]['phone'],
				'roleUser' => @$getUser[0]['roleUser'],
				'logged_in' => TRUE,
				);
			$this->session->set_userdata($newdata);
		}	
	}

	public function __construct()
	{
		parent::__construct();
		$this->load->model('model','',FALSE);

		$this->_remember_me();
	}

	public function index()
	{
		$this->load->view('login','',FALSE);
	}



	public function authenticate()
	{
		$get = $this->input->get();
		$post = $this->input->post();

		$phone;
		$error;
		

		if (is_numeric($post['uphone'])) {
			$phone = true;			
		}else{
			$phone = false;			
		}

		$this->form_validation->set_rules('password', 'Password', 'trim|required');

		$filter = array();
		if($phone)
			$filter = array('phone' => $post['uphone']);
		else
			$filter = array('usernameUser' => $post['uphone']);
		$getUser = $this->model->get_where('user',$filter);


		if (((@$getUser[0]['phone'] == $post['uphone'] || @$getUser[0]['usernameUser'] == $post['uphone'])) AND @$getUser[0]['passwordUser'] == hash_password($post['password']) AND @$getUser[0]['statusUser'] == 'y') {

			$data = array();
			$data['lastLogin'] = date('Y-m-d H:i:s');					
			$this->model->update_data('user',$data,array('idUser'=>$getUser[0]['idUser']));
			$newdata = array(
				'idUser'  => @$getUser[0]['idUser'],
				'phone'  => @$getUser[0]['phone'],
				'usernameUser'  => @$getUser[0]['usernameUser'],
				'roleUser' => @$getUser[0]['roleUser'],
				'logged_in' => TRUE,
				);
			$this->session->set_userdata($newdata);
			if (@$post['remember_me']) {
				$this->input->set_cookie('remember_me',  @$getUser[0]['usernameUser'], 100000000);
			}
			redirect('dashboard');
		}elseif (((@$getUser[0]['phone'] == $post['uphone'] || @$getUser[0]['usernameUser'] == $post['uphone'])) AND @$getUser[0]['passwordUser'] != hash_password($post['password'])) {
			$error = "Maaf password anda salah";
			$this->session->set_flashdata('temp_uphone', $post['uphone']);
		}elseif (((@$getUser[0]['phone'] == $post['uphone'] || @$getUser[0]['usernameUser'] == $post['uphone'])) AND @$getUser[0]['passwordUser'] == hash_password($post['password']) AND @$getUser[0]['statusUser'] == 'p') {
			$error = "Maaf anda belum disetujui untuk bergabung";
			$this->session->set_flashdata('temp_uphone', $post['uphone']);
		}else{
			$error = "Maaf username/password anda salah";
		}

		$this->session->set_flashdata('error_msg', $error);
		redirect('membership/login');

		// if ($getUser[0]['usernameMember']==$get['username'] && $getUser[0]['passwordMember']==$get['password'] && $getUser[0]['statusMember']=='Active') {
		// 	$newdata = array(
		// 		'idMember'  => @$getUser[0]['idMember'],
		// 		'usernameMember'  => @$getUser[0]['usernameMember'],
		// 		'roleMember' => @$getUser[0]['roleMember'],
		// 		'logged_in' => TRUE,
		// 		);
		// 	$this->session->set_userdata($newdata);
		// 	redirect('pengaturan/user');
		// }	
		// else{
		// 	echo 'password salah';
		// }

	}

}

/* End of file Login.php */
/* Location: ./application/modules/membership/controllers/Login.php */