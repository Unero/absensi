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

	public function absensi()
	{		
		$data['title'] = "Halaman Admin";
		$data['absensi'] = $this->admin_model->getAbsensi();

		$this->load->view('template/header_admin', $data);
		$this->load->view('admin/absensi', $data);
		$this->load->view('template/footer');
	}

	public function dosen()
	{		
		$data['title'] = "Halaman Admin";
		$data['dosen'] = $this->admin_model->getDosen();

		$this->load->view('template/header_admin', $data);
		$this->load->view('admin/dosen', $data);
		$this->load->view('template/footer');
	}

	public function mahasiswa()
	{		
		$data['title'] = "Halaman Admin";
		$data['mahasiswa'] = $this->admin_model->getMahasiswa();

		$this->load->view('template/header_admin', $data);
		$this->load->view('admin/mahasiswa', $data);
		$this->load->view('template/footer');
	}

	public function matkul()
	{		
		$data['title'] = "Halaman Admin";
		$data['matkul'] = $this->admin_model->getMatkul();

		$this->load->view('template/header_admin', $data);
		$this->load->view('admin/matkul', $data);
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
