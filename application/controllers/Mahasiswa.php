<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Mahasiswa extends CI_Controller {

	public function __construct(){
        parent::__construct();
        $this->load->model('mahasiswa_model');
    }

	public function index()
	{
		$data['title'] = "Data Mahasiswa";
		$data['mahasiswa'] = $this->mahasiswa_model->getAll();
		$this->load->view('template/header', $data);
		$this->load->view('mahasiswa/index', $data);
		$this->load->view('template/footer');
	}

	public function add(){
		$data['title'] = "Form menambah mahasiswa";
		$this->load->view('template/header', $data);
		$this->load->view('mahasiswa/tambah', $data);
		$this->load->view('template/footer');
	}
}

/* End of file Mahasiswa.php */

?>
