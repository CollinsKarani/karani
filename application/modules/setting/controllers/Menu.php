<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Menu extends MY_Controller {

	public function index($id="")
	{
		$getID = $this->input->get('key');
		if ($getID) {
			$data['data'] = $this->model->get_where('master_menu',array('kodeInduk'=>0,'idModule'=>$getID));
		}else{
			$data['data'] = $this->model->get_where('master_menu',array('kodeInduk'=>0),'orderMenu','asc');
		}

		$data['getModule'] = $this->model->get_where('master_module',array('statusModule'=>'Tampil'),'orderModule','asc');
		$data['getMenu'] = $this->model->get_where('master_menu',array('idMenu'=>$id));
		$data['getParentMenu'] = $this->model->get_where('master_menu',array('kodeInduk'=>0),'orderMenu','asc');
		$data['content'] = 'menu_content';
		$this->load->view('main',$data,FALSE);
	}

	public function add($id="")
	{
		$data['content'] = 'menu_add';
		$data['getMenu'] = $this->model->get_where('master_menu',array('idMenu'=>$id));
		$data['getParentMenu'] = $this->model->get_where('master_menu',array('kodeInduk'=>0,'idModule'=>$this->input->get('key')),'orderMenu','asc');
		$data['getAttributeMenu'] = $this->model->get_where('pengaturan_attribute',array('idMenu'=>$id));
		$data['getMenuPrivilege'] = $this->model->join('master_menu_privilege','*',array(array('table'=>'pengaturan_attribute_detail','parameter'=>'master_menu_privilege.actionMenuPrivilege=pengaturan_attribute_detail.idPAttributeDetail')),array('idMenu'=>$id));

		$this->load->view('main',$data,FALSE);
	}

	public function attribute($id="")
	{
		$data['getMenu'] =  $this->model->get_where('master_menu',array('targetMenu'=>getModule()."/".getController()));
		$data['idMenu'] = $id;
		$data['content'] = 'menu_add_attribute';
		$data['getMenuPrivilege'] = $this->model->join('master_menu_privilege','*',array(array('table'=>'pengaturan_attribute_detail','parameter'=>'master_menu_privilege.actionMenuPrivilege=pengaturan_attribute_detail.idPAttributeDetail')),array('idMenuPrivilege'=>$id));
		$getAll = $this->model->get('pengaturan_attribute_detail');
		foreach ($getAll as $allPrivilege) {
			$data['getMenuPrivilegeID'][] = $allPrivilege['idPAttributeDetail'];
		}

		$this->load->view('main',$data,FALSE);
	}

	public function save()
	{
		$post = $this->input->post();
		unset($post['current_url']);
		// $post['targetMenu'] = strtolower($post['nameModule']).'/'.str_replace(" ","_",strtolower($post['namaMenu']));
		if ($post['idMenu']) {
			$post['createdTime'] = date('Y-m-d H:i:s'); 
			$tmp['idMenuPrivilege'] = $post['idMenuPrivilege'];
			$tmp['actionMenuPrivilege'] = $post['actionMenuPrivilege'];
			$tmp['oldActionMenuPrivilege'] = $post['oldActionMenuPrivilege'];
			unset($post['actionMenuPrivilege'],$post['idMenuPrivilege'],$post['oldActionMenuPrivilege']);
			$this->model->update_data('master_menu',$post,array('idMenu'=>$post['idMenu']));
			for($i=0;$i<count($tmp['actionMenuPrivilege']);$i++)
			{
				$data['idMenu'] = $post['idMenu'];
				$data['idMenuPrivilege'] = @$tmp['idMenuPrivilege'][$i];
				$data['actionMenuPrivilege'] = $tmp['actionMenuPrivilege'][$i];
				$privilege['actionPrivilege'] = $tmp['actionMenuPrivilege'][$i];
				if ($data['idMenuPrivilege']) {
					$this->model->update_data('master_menu_privilege',$data,array('idMenuPrivilege'=>$tmp['idMenuPrivilege'][$i]));
					$this->model->update_data('privilege_user',$privilege,array('menuPrivilege'=>$post['idMenu'],'actionPrivilege'=>$tmp['oldActionMenuPrivilege']));
					redirect('dashboard');
				}
				else{
					$this->model->insert_data('master_menu_privilege',$data);
				}
			}
		}
		else{
			$post['updatedTime'] = date('Y-m-d H:i:s'); 
			$this->model->insert_data('master_menu',$post);

		}
		redirect('setting/menu?module='.$post['nameModule'].'&key='.$post['idModule']);
	}

	public function delete($id)
	{
		$getMenu = $this->model->get_where('master_menu',array('kodeInduk'=>$id));
		print_r($getMenu);
		$this->model->delete_data('master_menu',array('idMenu'=>$id)); //hapus menu
		$this->model->delete_data('master_menu',array('kodeInduk'=>$id)); //hapus sub menu
		$this->model->delete_data('master_menu_privilege',array('idMenu'=>$id)); //hapus akses menu
		$this->model->delete_data('privilege_user',array('menuPrivilege'=>$id)); //hapus hak akses user terhadap menu

		$getAttribute = $this->model->get_where('pengaturan_attribute',array('idMenu'=>$id)); //tampilkan atribut menu berdasarkan id
		$this->model->delete_data('pengaturan_attribute',array('idMenu'=>$id)); //hapus atribut menu
		$this->model->delete_data('pengaturan_attribute_detail',array('idPAttribute'=>$getAttribute[0]['idMenu']));
		redirect('setting/menu');
	}

	public function session($id)
	{
		echo $id;
	}


}

/* End of file Menu.php */
/* Location: ./application/modules/user/controllers/Menu.php */