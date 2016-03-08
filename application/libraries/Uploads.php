<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Uploads {
	public function __construct()
	{
		$this->ci =& get_instance();
	}

	public function upload_image($name="",$path="")
	{
		empty($path) ? $path = "assets/uploads" : $path = $path;
		
		if (!is_dir($path)) {
			mkdir($path, 0777, TRUE);
		}
		$config['upload_path'] = $path;
		$config['allowed_types'] = 'gif|jpg|png|jpeg';
		$config['max_size'] = '1024';
		$config['encrypt_name'] = TRUE;
		// $config['file_name'] = 'as'.time();

		$this->ci->load->library('upload', $config);

		if (!$this->ci->upload->do_upload($name))
		{
			$data = array('error' => $this->ci->upload->display_errors());
		}
		else
		{
			$data = $this->ci->upload->data();
		}

		return $data;
	}


	public function upload_file($name="",$path="")
	{
		empty($path) ? $path = "assets/uploads" : $path = $path;
		
		if (!is_dir($path)) {
			mkdir($path, 0777, TRUE);
		}

		$config['upload_path'] = $path;
		$config['allowed_types'] = 'gif|jpg|png|jpeg|pdf|doc|xml|docx|GIF|JPG|PNG|JPEG|PDF|DOC|XML|DOCX|xls|xlsx';
		$config['max_size'] = '1024';
		$config['encrypt_name'] = TRUE;
		// $config['file_name'] = $penamaan.time();

		$this->ci->load->library('upload', $config);

		if (!$this->ci->upload->do_upload($name))
		{
			$data = array('error' => $this->ci->upload->display_errors());
		}
		else
		{
			$data = $this->ci->upload->data();
		}

		return $data;
	}
}
