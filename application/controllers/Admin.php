<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('admin_model');
	}

	public function index()
	{		
		$data['title'] = "Halaman Admin";
		$data['users'] = $this->admin_model->getUser();

		$this->load->view('template/header_admin', $data);
		$this->load->view('admin/index', $data);
		$this->load->view('template/footer');
	}

	public function activate($id){
		$this->admin_model->activateUser($id);
		redirect('admin','refresh');
	}

	public function disable($id){
		$this->admin_model->disableUser($id);
		redirect('admin','refresh');
	}

}

/* End of file Admin.php */

?>
