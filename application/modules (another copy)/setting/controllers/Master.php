<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Master extends MY_Controller {

	public function index($params=""){

		if(empty($params)){
			$data['orderCategory'] = $this->model->getOrder('master_category','orderCategory',array('idModule'=>getMenu('idModule')));

			$data['category'] = $this->model->get('master_category','','','orderCategory','asc');		

			$data['content'] = 'master_index';
			$this->load->view('main',$data,FALSE);
		}elseif (!empty($params)) {

			$data['orderData'] = $this->model->getOrder('master_data','orderData',array('kodeCategory'=>$params));
			$data['kodeInduk'] = getField('master_category','kodeInduk',array('kodeCategory' => $params));			

			$data['getData'] = $this->model->get_where('master_data',array('kodeCategory' => $params));

			$data['content'] = 'master_content';
			$this->load->view('main',$data,FALSE);

		}


	}


	// public function form($params="",$id=""){

	// 	$getData = $this->model->get_where('master_data',array('idData'=>$id));
	// 	$data['orderData'] = $this->model->getOrder('master_data','orderData',array('kodeCategory'=>$params));
	// 	$data['kodeInduk'] = getField('master_category','kodeInduk',array('kodeCategory' => $params));			

	// 	if ($getData) {
	// 		$data['getData'] = $getData[0];
	// 	}
	// 	else{
	// 		$data['getData'] = "";
	// 	}

	// 	$this->load->view('modal/master_edit',$data,FALSE);

	// }

	public function save($params="",$id=""){

		$post = $this->input->post();

		if ($params == "category" AND empty($id)) {

			$data1 = array(
				'idMenu' => $this->model->getOrder('master_menu','idMenu'),
				'idModule' => getMenu('idModule','index'),
				'kodeInduk' => getMenu('idMenu','index'),
				'namaMenu' => $post['namaCategory'],
				'iconMenu' => $post['iconMenu'],
				'targetMenu' => getMenu('targetMenu','index')."/".$post['kodeCategory'],
				'orderMenu' => $post['orderCategory'],
				'statusMenu' => $post['statusCategory'],
				'createdBy' => getMember('usernameUser'),
				'createdTime' => date('Y-m-d H:i:s')
				);

			$data2 = array(
				'kodeCategory' => $post['kodeCategory'],
				'idModule' => getMenu('idModule','index'),
				'idMenu' => $this->model->getOrder('master_menu','idMenu'),
				'namaCategory' => $post['namaCategory'],
				'kodeInduk' => $post['kodeInduk'],
				'ketCategory' => $post['ketCategory'],
				'orderCategory' => $post['orderCategory'],
				'statusCategory' => $post['statusCategory'],
				'createdBy' => getMember('usernameUser'),
				'createdTime' => date('Y-m-d H:i:s')
				);

			$this->model->insert_data('master_menu',$data1);
			$this->model->insert_data('master_category',$data2);

			redirect(getModule().'/'.getController().'/index');

		}elseif ($params == "category" AND !empty($id)) {
			
			$data1 = array(
				'namaMenu' => $post['namaCategory'],
				'iconMenu' => $post['iconMenu'],
				'targetMenu' => getMenu('targetMenu','index')."/".$post['kodeCategory'],
				'orderMenu' => $post['orderCategory'],
				'statusMenu' => 'n',
				'updatedBy' => getMember('usernameUser'),
				'updatedTime' => date('Y-m-d H:i:s')
				);

			$data2 = array(
				'kodeCategory' => $post['kodeCategory'],
				'namaCategory' => $post['namaCategory'],
				'kodeInduk' => $post['kodeInduk'],
				'ketCategory' => $post['ketCategory'],
				'orderCategory' => $post['orderCategory'],
				'statusCategory' => $post['statusCategory'],
				'updatedBy' => getMember('usernameUser'),
				'updatedTime' => date('Y-m-d H:i:s')
				);

			$data3 = array(
				'kodeCategory' => $post['kodeCategory'],
				);

			$this->model->update_data('master_menu',$data1,array('idMenu' => $id));
			$this->model->update_data('master_data',$data3,array('kodeCategory' => getCategory('kodeCategory',$id)));
			$this->model->update_data('master_category',$data2,array('idMenu' => $id));			

			redirect(getModule().'/'.getController().'/index?mode=list');

		}elseif ($params == "data") {
			empty($post['kodeInduk']) ? $kodeInduk = '0' : $kodeInduk = $post['kodeInduk'];
			
			$data = array(				
				'kodeInduk' => $kodeInduk,				
				'namaData' => $post['namaData'],
				'keteranganData' => $post['keteranganData'],
				'orderData' => $post['orderData'],
				'statusData' => $post['statusData'],
				'updatedBy' => getMember('usernameUser'),
				'updatedTime' => date('Y-m-d H:i:s')
				);

			$this->model->update_data('master_data',$data,array('idData' => $post['idData']));
			redirect(getModule().'/'.getController().'/index/'.$id);

		}


	}

	public function add($params="",$id=""){

		$post = $this->input->post();

		if ($params == "data") {

			empty($post['kodeInduk']) ? $kodeInduk = '0' : $kodeInduk = $post['kodeInduk'];
			
			$data = array(
				'idData' => $this->model->getOrder('master_data','idData'),
				'kodeInduk' => $kodeInduk,
				'kodeCategory' => $id,
				'namaData' => $post['namaData'],
				'keteranganData' => $post['keteranganData'],
				'orderData' => $post['orderData'],
				'statusData' => $post['statusData'],
				'createdBy' => getMember('usernameUser'),
				'createdTime' => date('Y-m-d H:i:s')
				);

			$this->model->insert_data('master_data',$data);
			redirect(getModule().'/'.getController().'/index/'.$id);

		}


	}

	public function delete($params="",$id=""){

		$post = $this->input->post();

		if ($params == "category") {
			$this->model->delete_data('master_menu',array('idMenu' => $id));
			$this->model->delete_data('master_category',array('idMenu' => $id));
			redirect(getModule().'/'.getController().'/index');
		}elseif ($params == "data") {
			$this->model->delete_data('master_data',array('idData' => $post['idData']));
			redirect(getModule().'/'.getController().'/index/'.$id);
		}

	}

	public function getOrder($params="",$id=""){

		if($params == 'category'){

			$id = end($this->uri->segments);
			$query = $this->model->getOrder('master_data','orderData',array('kodeInduk' => $id));
			echo $query;
		}

	}

	public function kelas(){
		$data['content'] = 'master_content';

		$this->load->view('main',$data,FALSE);

	}


}

/* End of file Data.php */
/* Location: ./application/modules/membership/controllers/Master.php */