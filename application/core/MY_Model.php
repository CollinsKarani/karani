<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MY_Model extends CI_Model {

	var $table = "";

	public function __construct()
	{
		parent::__construct();
		date_default_timezone_set('Asia/Jakarta');
	}

	public function get($table="default",$column="",$params="",$sort="",$order="",$limit="")
	{
		$table = $table=="default" ? $this->table : $table;
		$this->db->select($column);
		$this->db->order_by($sort,$order);
		$this->db->limit($limit);
		if ($params) {
			$this->db->where($params);
		}
		$query = $this->db->get($table);
		return $query->result_array();
	}

	public function get_where($table="default",$params="",$sort="",$order="",$limit="")
	{
		$table = $table=="default" ? $this->table : $table;
		$this->db->order_by($sort,$order);
		$this->db->limit($limit);
		$this->db->where($params);
		$query = $this->db->get($table);
		return $query->result_array();
	}


	public function join($table="default",$column="",$table2="",$params="",$sort="",$order="",$limit="",$group_by="", $offset="")
	{
		$table = $table=="default" ? $this->table : $table;
		$this->db->select($column);
		$this->db->from($table);
		foreach ($table2 as $row){
			$this->db->join($row['table'], $row['parameter'],'left');
		}

		if(!empty($params))
		{
			$this->db->where($params);	
		}
		$this->db->order_by($sort,$order);
		$this->db->limit($limit, $offset);
		$this->db->group_by($group_by);
		$query = $this->db->get();
		return $query->result_array();
	}

	public function insert_data($table="default",$data="")
	{
		$table = $table=="default" ? $this->table : $table;
		$this->db->trans_start();
		$this->db->insert($table, $data);
		$insert_id = $this->db->insert_id();
		$this->db->trans_complete();
		return  $insert_id;
	}

	public function update_data($table="default",$data="",$params="")
	{
		$table = $table=="default" ? $this->table : $table;
		$this->db->update($table, $data, $params);
	}

	public function delete_data($table="default",$params="")
	{
		$table = $table=="default" ? $this->table : $table;
		$this->db->delete($table, $params);
	}

	function getOrder($table="",$field="",$params="")
	{

		empty($params) ? $where = "" : $where = $this->db->where($params);

		$table = $table=="default" ? $this->table : $table;
		$this->db->select("MAX($field) as kd_max");		
		$where;
		$query = $this->db->get($table);

		$kd = "";
		if($query->num_rows()>0){
			foreach($query->result() as $k){
				$tmp = ((int)$k->kd_max)+1;
				$kd = sprintf($tmp);
			}
		}else{
			$kd = "1";
		}
		return $kd;
	}


}

/* End of file MY_Model.php */
/* Location: ./application/core/MY_Model.php */