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
			if ($this->session->userdata('level') == "3") {
				$this->load->view('template/header_admin', $data);
            	$this->load->view('mahasiswa/tambah', $data);
				$this->load->view('template/footer');
			} else {
				$this->load->view('template/header', $data);
				$this->load->view('mahasiswa/tambah', $data);
				$this->load->view('template/footer');    
			}
        }
        else
        {
            $this->mahasiswa_model->add();
			if ($this->session->userdata('level') == "3") {
				redirect('admin/mahasiswa','refresh');
			}
			$this->session->set_flashdata('flash-data', 'ditambahkan');
			redirect('mahasiswa','refresh');
        }
	}

	public function edit($nim){
		$data['title'] = "Form menambah Data Mahasiswa";
		$data['mahasiswa'] = $this->mahasiswa_model->get($nim);

		$this->load->view('template/header_admin', $data);
		$this->load->view('mahasiswa/edit', $data);
		$this->load->view('template/footer');
	}

	public function edit_proses(){
		$nim = htmlspecialchars($this->input->post('nim'));
		$nama = htmlspecialchars($this->input->post('nama'));
		$kelas = htmlspecialchars($this->input->post('kelas'));
		$update = $this->mahasiswa_model->update($nim, $nama, $kelas);

		if ($update) {
			redirect('admin/mahasiswa','refresh');
		}
	}

	public function delete($nim){
		$this->mahasiswa_model->delete($nim);
		redirect('admin/mahasiswa','refresh');
	}
}

/* End of file Mahasiswa.php */

?>
