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
		$data['title'] = "Form menambah Data Mahasiswa";
		
        $this->form_validation->set_rules('nama', 'Nama', 'required');
		$this->form_validation->set_rules('kelas', 'kelas', 'required');

        if ($this->form_validation->run() == FALSE)
        {
            $this->load->view('template/header', $data);
            $this->load->view('mahasiswa/tambah', $data);
            $this->load->view('template/footer');    
        }
        else
        {
            $this->mahasiswa_model->add();
			$this->session->set_flashdata('flash-data', 'ditambahkan');
			redirect('mahasiswa','refresh');
        }
	}
}

/* End of file Mahasiswa.php */

?>
