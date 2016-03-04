<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Role extends MY_Controller {

	public function __construct()
	{
		parent::__construct();

	}

	public function index()
	{
		$data['data'] = $this->model->get('master_user_role');
		$data['content'] = 'role_content';
		$this->load->view('main',$data,FALSE);
	}

	public function add($id="")
	{
		$data['content'] = 'role_add';
		$data['getRole'] = $this->model->get_where('master_user_role',array('idRole'=>$id));

		$this->load->view('main',$data,FALSE);
	}

	public function save()
	{
		$post = $this->input->post();
		if ($post['idRole']) {
			$this->model->update_data('master_user_role',$post,array('idRole'=>$post['idRole']));
		}
		else{
			$this->model->insert_data('master_user_role',$post);
		}
		redirect('user/role');
	}

	public function delete($id)
	{
		$this->model->delete_data('master_user_role',array('idRole'=>$id));
		redirect('user/role');
	}

	public function privilege($id)
	{
		$data['getPrivilege'] = $this->model->join('privilege_user','*',array(
			array('table'=>'master_menu','parameter'=>'privilege_user.menuPrivilege=master_menu.idMenu')
			));
		$data['getParentMenu'] = $this->model->get('master_menu');
		
		$data['getRole'] = $this->model->get_where('master_user_role',array('idRole'=>$id));
		$getPrivilege = $this->model->join('privilege_user','*',array(
			array('table'=>'master_user_role','parameter'=>'privilege_user.idRole=master_user_role.idRole')
			));

		foreach ($getPrivilege as $key => $value) {
			$data['actionPrivilege'] = $value['actionPrivilege'];
			$data['menuPrivilege'] = $value['menuPrivilege'];
		}

		$data['content'] = 'role_privilege';

		$this->load->view('main',$data,FALSE);
	}

	public function save_privilege2()
	{
		$post = $this->input->post();
		foreach ($post['actionPrivilege'] as $key => $value) {
			foreach ($value as $sub_key => $sub_value) {
				$data = array(
					'menuPrivilege'=>$key,
					'actionPrivilege'=>$sub_value,
					'created_date'=>date('Y-m-d H:i:s'),
					);
				print_r($data);
			}
		}
	}

	public function save_privilege()
	{
		$post = $this->input->post();
		if (count($post['actionPrivilege'])>0) {
			# code...
			$getAllPrivilege = $this->model->get('privilege_user');
			foreach ($getAllPrivilege as $PrivilegeID) {
				$allPrivilegeID[] = $PrivilegeID['idPrivilege'];
			}

			foreach ($post['actionPrivilege'] as $key => $value) {
				foreach ($value as $sub_key => $sub_value) {
					$data = array(
						'idRole'=>$post['idRole'],
						'menuPrivilege'=>$key,
						'actionPrivilege'=>$sub_value,
						'created_date'=>date('Y-m-d H:i:s'),
						);
				// print_r($data);

					$getPrivilege = $this->model->get_where('privilege_user',array('menuPrivilege'=>$key,'actionPrivilege'=>$sub_value));

					foreach ($getPrivilege as $row) {
						if ($key==$row['menuPrivilege']&&$sub_value==$row['actionPrivilege']) {
							$this->model->update_data('privilege_user',$data,array('menuPrivilege'=>$key,'actionPrivilege'=>$sub_value));
						}

						$rows[] = $row['idPrivilege'];
					}
					if ($key!=@$getPrivilege[0]['menuPrivilege']&&$sub_value!=@$getPrivilege[0]['actionPrivilege']) {
						$this->model->insert_data('privilege_user',$data);
					}

					print_r($data);
				}
			}	

			$filterID = array_diff($allPrivilegeID,$rows);
			foreach ($filterID as $filterValue) {
				$this->model->delete_data('privilege_user',array('idPrivilege'=>$filterValue));
			}
		}
		else{
			$this->model->delete_data('privilege_user',array('idRole'=>$post['idRole']));
		}


		// $getAllPrivilege = $this->model->get('privilege_user');
		// foreach ($getAllPrivilege as $PrivilegeID) {
		// 	$allPrivilegeID[] = $PrivilegeID['idPrivilege'];
		// }

		// foreach ($post['actionPrivilege'] as $key => $value) {
		// 	foreach ($value as $sub_key => $sub_value) {
		// 		$data = array(
		// 			'menuPrivilege'=>$key,
		// 			'actionPrivilege'=>$sub_value,
		// 			'created_date'=>date('Y-m-d H:i:s'),
		// 			'idRole'=>$post['idRole']
		// 			);
		// 		if ($sub_value==1) {
		// 			$action = 'lihat';
		// 		}
		// 		elseif ($sub_value==2) {
		// 			$action = 'tambah';
		// 		}
		// 		elseif ($sub_value==3) {
		// 			$action = 'rubah';
		// 		}
		// 		elseif ($sub_value==4) {
		// 			$action = 'hapus';
		// 		}

		// 		$getPrivilege = $this->model->get_where('privilege_user',array('menuPrivilege'=>$key,'actionPrivilege'=>$action));

		// 		foreach ($getPrivilege as $row) {
		// 			if ($key==$row['menuPrivilege']&&$action==$row['actionPrivilege']) {
		// 				$this->model->update_data('privilege_user',$data,array('menuPrivilege'=>$key,'actionPrivilege'=>$action));
		// 			}

		// 			$rows[] = $row['idPrivilege'];
		// 		}
		// 		if ($key!=@$getPrivilege[0]['menuPrivilege']&&$action!=@$getPrivilege[0]['actionPrivilege']) {
		// 			$this->model->insert_data('privilege_user',$data);
		// 		}

		// 	}
		// }
		// $filterID = array_diff($allPrivilegeID,$rows);
		// foreach ($filterID as $filterValue) {
		// 	$this->model->delete_data('privilege_user',array('idPrivilege'=>$filterValue));
		// }
		exit();
		redirect('setting/role/privilege/'.$post['idRole']);
	}

}

/* End of file User.php */
/* Location: ./application/modules/user/controllers/User.php */