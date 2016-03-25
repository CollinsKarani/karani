<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Template extends MY_Controller {

	public function index()
	{
		$data['data'] = $this->model->get('master_template');
		$data['content'] = 'template_content';
		$this->load->view('main',$data,FALSE);
	}

	public function detail($id="")
	{
		$get = $this->input->get();
		$data['idMTemplate'] = $id;
		$data['data'] = $this->model->join('master_template_detail','*',array(array('table'=>'master_template','parameter'=>'master_template_detail.idMTemplate=master_template.idMTemplate')),array('master_template_detail.idMTemplate'=>$id));
		$data['content'] = 'template_detail_content';
		$this->load->view('main',$data,FALSE);
	}

	public function add($id="")
	{
		$get = $this->input->get();
		$data['idMTemplate'] = $id;
		$data['content'] = 'template_add';
		$data['getMTemplate'] = $this->model->get_where('master_template',array('idMTemplate'=>$id));
		if (isset($get['u'])) {
			$data['getMTemplateDetail'] = $this->model->get_where('master_template_detail',array('idMTemplateDetail'=>$get['u']),'orderMTemplateDetail','desc');
			$data['content'] = 'template_detail_add';
		} else{
			$data['content'] = 'template_add';
		}
		$this->load->view('main',$data,FALSE);
	}

	public function save()
	{
		$post = $this->input->post();
		if ($post['idMTemplate']) {
			$post['modifiedDate'] = date('Y-m-d H:i:s');
			$post['modifiedBy'] = $this->session->userdata('usernameUser');
			$this->model->update_data('master_template',$post,array('idMTemplate'=>$post['idMTemplate']));
		} else {
			$post['createdDate'] = date('Y-m-d H:i:s');
			$post['createdBy'] = $this->session->userdata('usernameUser');
			$this->model->insert_data('master_template',$post);
		}
		redirect('setting/template');
	}

	public function save_detail()
	{
		$post = $this->input->post();
		if ($post['idMTemplateDetail']) {
			$post['modifiedDate'] = date('Y-m-d H:i:s');
			$post['modifiedBy'] = $this->session->userdata('usernameUser');
			$this->model->update_data('master_template_detail',$post,array('idMTemplateDetail'=>$post['idMTemplateDetail']));
		} else {
			$post['createdDate'] = date('Y-m-d H:i:s');
			$post['createdBy'] = $this->session->userdata('usernameUser');
			$this->model->insert_data('master_template_detail',$post);
		}
		redirect('setting/template/detail/'.$post['idMTemplate']);
	}

}

/* End of file Template.php */
/* Location: ./application/modules/setting/controllers/Template.php */