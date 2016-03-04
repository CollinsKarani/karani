<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Anggota extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('model','',FALSE);
	}

	public function _getAllMember($offset = "0"){
		$filter = "statusUser = 'y'";
		if(@$_GET['q'])
			$filter.= " and user.nameUser like '%".$_GET['q']."%'";
		if(@$_GET['provinsi'])
			$filter.=" and user_info.provinsi = '".$_GET['provinsi']."'";
		if(@$_GET['kota'])
			$filter.=" and user_info.kota = '".$_GET['kota']."'";

		return $this->model->join('user','*,user.idUser as id,
			master_provinsi.namaData as nama_provinsi,
			master_kota.namaData as nama_kota',array(
				array(
					'table'=>'user_info','parameter'=>'user.idUser=user_info.idUser'
					),
				array(
					'table'=>'master_data as master_provinsi','parameter'=>'user_info.provinsi=master_provinsi.idData'
					),
				array(
					'table'=>'master_data as master_kota','parameter'=>'user_info.kota=master_kota.idData'
					)
				),
			$filter,'','','','user.idUser', $offset);

	}


	public function index($start = "0"){

		$get = '';
		$first = true;	
		foreach($_GET as $key => $val){
			if($first)
				$get.="?";
			$get.=$key."=".$val."&";
			$first = false;
		}

		$get = substr($get, 0, -1);

		$data['getAllMember'] = $this->_getAllMember();

		if(!$get){
			$tempGetMember = $data['getAllMember'];
			$this->load->library("pagination");  
			$quantity = 12;
			$data['getAllMember'] = array_slice($data["getAllMember"],$start,$quantity); 
			$config['base_url'] = base_url(getModule().'/'.getController().'/index'.$get);
			$config['uri_segment'] = 4;
			$config['total_rows'] = count($tempGetMember);
			$config['per_page'] = $quantity;
			$config['full_tag_open'] = "<ul class='pagination pull-right'>";
			$config['full_tag_close'] = '</ul>';
			$config['first_link'] = true;
			$config['last_link'] = false;
			$config['first_tag_open'] = '<li>';
			$config['first_tag_close'] = '</li>';
			$config['prev_link'] = '<i class="fa fa-angle-left"></i>';
			$config['prev_tag_open'] = '<li>';
			$config['prev_tag_close'] = '</li>';
			$config['next_link'] = '<i class="fa fa-angle-right"></i>';
			$config['next_tag_open'] = '<li>';
			$config['next_tag_close'] = '</li>';
			$config['last_tag_open'] = '<li>';
			$config['last_tag_close'] = '</li>';
			$config['cur_tag_open'] = '<li class="active"><a href="#">';
			$config['cur_tag_close'] = '</a></li>';
			$config['num_tag_open'] = '<li>';
			$config['num_tag_close'] = '</li>';
			$this->pagination->initialize($config);
			$data['pagination']  = $this->pagination->create_links();
		}else{
			$data['pagination']  = "";
		}

		$this->session->set_flashdata('q',$this->input->get('q'));

		$data['content'] = 'anggota/anggota_index';
		$this->load->view('main',$data,FALSE);

	}

	public function profile($id=""){

		$query = $this->model->join('user','*,
			user.idUser as id,
			master_provinsi.namaData as nama_provinsi,
			master_kota.namaData as nama_kota',array(
				array(
					'table'=>'user_info','parameter'=>'user.idUser=user_info.idUser'
					),
				array(
					'table'=>'master_data as master_provinsi','parameter'=>'user_info.provinsi=master_provinsi.idData'
					),
				array(
					'table'=>'master_data as master_kota','parameter'=>'user_info.kota=master_kota.idData'
					)
				),
			array('statusUser'=>'y','user.idUser'=>$id),'','','','user.idUser', '');

		if ($query) {
			$data['query'] 	= @$query[0];
			$data['content'] = 'anggota/profile';
			$this->load->view('main',$data,FALSE);
		}
		else {
			$data['content'] = '404';
			$this->load->view('main',$data,FALSE);
		}

	}

}

/* End of file Anggota.php */
/* Location: ./application/modules/membership/controllers/Anggota.php */