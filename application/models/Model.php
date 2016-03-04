<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model extends MY_Model { 

	function __construct()
	{
		parent::__construct();
	}

	function getWhereOtherTable($table="",$params="",$sort="",$order=""){
		$query = $this->db->order_by($sort,$order)->where($params)->get($table);
		return $query->result_array();
	}

	function getOtherTable($table=""){
		$query = $this->db->get($table);
		return $query->result_array();
	}

	function insertOtherTable($table="",$data="") {
		$this->db->insert($table,$data);
	}

	function updateOtherTable($table="",$data="",$params=""){
		$this->db->update($table, $data,$params);
	}

	function deleteOtherTable($table="",$params=""){
		$this->db->delete($table,$params);
	}

	public function getMemberById($memberId){
		return $this->db->select('*, member.id as id, mst_kota.namaData as nama_kota, (select count(proyek_detail_media.id) from proyek_detail_media where proyek_detail_media.user_id=member.id and tipe="Selfie") as countSelfie')->join('member_detail_informasi', 'member.id=member_detail_informasi.member_id', 'left')->join('member_detail_rekening', 'member.id=member_detail_rekening.member_id', 'left')->join('member_detail_organisasi', 'member.id=member_detail_organisasi.member_id', 'left')->join('mst_data as mst_kota', 'member_detail_informasi.kota=mst_kota.kodeData', 'left')->get_where('member', array('member.id' => $memberId))->row();
	}
	
	function getMemberByConfirmCode($confirmation_code)
	{
		$this->db->select('*');
		$this->db->from('member_confirmation');
		$this->db->where('confirmation_code',$confirmation_code);
		$this->db->join('user', 'member_confirmation.username = user.usernameUser');
		$this->db->limit(1);
		$this->db->order_by('member_confirmation.confirmation_datetime','desc');
		$getData = $this->db->get();

		if($getData->num_rows() > 0) 
		{
			$rowData = $getData->result_array();
			return $rowData;
		} else {
			return null;
		}
	}

}

/* End of file Pasien.php */
/* Location: ./application/models/Pasien.php */