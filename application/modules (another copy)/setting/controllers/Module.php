<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Module extends MY_Controller {

	public function __construct()
	{
		parent::__construct();

	}

	public function index()
	{
		$data['data'] = $this->model->get('master_module','','','orderModule','asc');
		$data['content'] = 'module_content';
		$this->load->view('main',$data,FALSE);
	}

	public function add($id="")
	{
		$data['content'] = 'module_add';
		$data['getModule'] = $this->model->get_where('master_module',array('idModule'=>$id));

		$this->load->view('main',$data,FALSE);
	}

	public function save()
	{
		$post = $this->input->post();
		if ($post['idModule']) {
			$post['modifiedBy'] = $this->session->userdata('usernameUser');
			$post['modifiedDate'] = date('Y-m-d H:i:s');
			$this->model->update_data('master_module',$post,array('idModule'=>$post['idModule']));
		}
		else{
			$post['createdBy'] = $this->session->userdata('usernameUser');
			$post['createdDate'] = date('Y-m-d H:i:s');
			$this->model->insert_data('master_module',$post);
			mkdir('application/modules/'.strtolower($post['nameModule']),0777,true);
			mkdir('application/modules/'.strtolower($post['nameModule']).'/controllers',0777,true);
			$dashboardController = fopen('application/modules/'.strtolower($post['nameModule']).'/controllers/Dashboard.php', "w");
			$txt = "<?php\n";
			$txt .= "defined('BASEPATH') OR exit('No direct script access allowed');\n\n";
			$txt .= "class Dashboard extends MY_Controller {\n\n";
			$txt .= "public function index()\n";
			$txt .= "{\n";
			$txt .= "\$data['content'] = 'dashboard_content';\n";
			$txt .= "\$this->load->view('main',\$data,FALSE);\n";
			$txt .= "}\n\n";
			$txt .= "}";
			fwrite($dashboardController, $txt);
			mkdir('application/modules/'.strtolower($post['nameModule']).'/models',0777,true);
			mkdir('application/modules/'.strtolower($post['nameModule']).'/views',0777,true);
			$dashboardView = fopen('application/modules/'.strtolower($post['nameModule']).'/views/dashboard_content.php', "w");
			$txt = "<section class=\"wrapper\">\n";
			$txt .= "<div class=\"row\">\n";
			$txt .= "<div class=\"col-sm-12\">\n";
			$txt .= "<section class=\"panel\">\n";
			$txt .= "<header class=\"panel-heading\">\n";
			$txt .= "Dashboard";
			$txt .= "</header>";
			$txt .= "<div class=\"panel-body\">\n";
			$txt .= "</div>\n</section>\n</div>\n</div>\n</section>";
		}
		redirect('setting/module');
	}

	public function delete($id)
	{
		// $getModule = $this->model->get_where('master_module',array('idModule'=>$id));
		// // // $deleteModule = $this->model->delete_data('master_module',array('idModule'=>$id));
		// echo deleteDir('application/modules/'.strtolower($getModule[0]['nameModule']));
		echo $id;
	}

}

/* End of file Module.php */
/* Location: ./application/modules/user/controllers/Module.php */