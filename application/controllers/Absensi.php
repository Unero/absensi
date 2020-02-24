<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Absensi extends CI_Controller {

	public function __construct(){
        parent::__construct();
        $this->load->model('absensi_model');
    }

	public function index()
	{
		$data['title'] = "Absensi";
		$data['absensi'] = $this->absensi_model->getMasuk();
		$this->load->view('template/header', $data);
		$this->load->view('absensi/index', $data);
		$this->load->view('template/footer');
	}

	public function tambah(){
		$data['title'] = "Membuat Absensi";
		$data['dosen'] = $this->absensi_model->getDosen();
		$data['mahasiswa'] = $this->absensi_model->getMahasiswa();
		$data['matkul'] = $this->absensi_model->getMatkul();
        $data['status'] = ['Masuk', 'Alpha', 'Ijin', 'Sakit'];


		// rules
		$this->form_validation->set_rules('matkul', 'matkul', 'required');
        $this->form_validation->set_rules('dosen', 'dosen', 'required');
		$this->form_validation->set_rules('mhs', 'mhs', 'required');
		$this->form_validation->set_rules('mhs', 'mhs', 'required');

        if ($this->form_validation->run() == FALSE)
        {
            $this->load->view('template/header', $data);
            $this->load->view('absensi/tambah', $data);
            $this->load->view('template/footer');    
        } else {
			$this->absensi_model->absensi();
			$this->session->set_flashdata('flash-data', 'absen');
			redirect('absensi','refresh');
		}
	}

	// public function edit($id){
    //     $data['title'] = "Form Edit Mahasiswa";
    //     $data['mahasiswa'] = $this->mahasiswa_model->getmahasiswaById($id);
    //     $data['status'] = ['Teknik Informatika', 'Teknik Kimia', 'Teknik Industri', 'Teknik Mesin'];

    //     $this->form_validation->set_rules('nama', 'Nama', 'required');
    //     $this->form_validation->set_rules('nim', 'NIM', 'required|numeric');
    //     $this->form_validation->set_rules('email', 'Email', 'required|valid_email');

    //     if ($this->form_validation->run() == FALSE) {
    //         $this->load->view('template/header', $data);
    //         $this->load->view('mahasiswa/edit', $data);
    //         $this->load->view('template/footer');
    //     } else {
    //         $this->mahasiswa_model->ubahdatamhs();
    //         $this->session->set_flashdata('flash-data', 'diedit');
    //         redirect('mahasiswa','refresh');
    //     }
        
    // }
}
/* End of file Absensi.php */
?>
