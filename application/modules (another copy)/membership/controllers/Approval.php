<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Approval extends MY_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('model','',FALSE);
	}


	public function index(){

		$data['getApproval'] = $this->model->join('user',
			'*',
			array(
				array(
					'table'=>'user_info','parameter'=>'user.idUser=user_info.idUser'
					),
				),array('user.statusUser'=>'p'),'user.created_date','desc');

		$data['content'] = 'approval';
		$this->load->view('main',$data,FALSE);

	}

	public function submit(){
		$post = $this->input->post();
		$status = array();
		
		if (isset($post['btnSetuju'])) {		

			foreach ($post['confirmation'] as $username) {

				$password = random_password();
				$data['password'] = sha1(md5($password));

				$confirmation['username'] = $username;
				$confirmation['confirmation_code'] = $data['password'];
				$confirmation['confirmation_datetime'] = date("Y-m-d H:i:s");

				$status['statusUser'] = 'k';

				$content = $this->model->get_where('master_menu', array("idMenu" => '22'));
				$content = $content[0]['resumeMenu'];
				$content = str_replace(PHP_EOL, "\n", $content);
				$content = str_replace("nama_user", getField('user','nameUser',array('usernameUser' => $username)), $content);
				$content = str_replace("kode_aktivasi", $password, $content);
				$content = str_replace("url_aktivasi",	base_url(''.getModule().'/confirmation/'), $content);

				// echo $content."<br><br>";

				// var_dump($confirmation);
				$this->model->insert_data('member_confirmation',$confirmation);
				$this->model->update_data('user',$status,array('usernameUser'=>$username));
				redirect(getModule().'/'.getController());

			}


		}elseif(isset($post['btnTolak'])){
			

			foreach ($post['confirmation'] as $username) {

				$status['statusUser'] = 'n';

				$content = $this->model->get_where('master_menu', array("idMenu" => '23'));
				$content = $content[0]['resumeMenu'];
				$content = str_replace(PHP_EOL, "\n", $content);
				$content = str_replace("nama_user", getField('user','nameUser',array('usernameUser' => $username)), $content);

				// echo $content;
				$this->model->update_data('user',$status,array('usernameUser'=>$username));
				redirect(getModule().'/'.getController());

			}

		}

	}



}

/* End of file Approval.php */
/* Location: ./application/modules/membership/controllers/Approval.php */