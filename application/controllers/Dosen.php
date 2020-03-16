<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Dosen extends CI_Controller {

	public function __construct(){
        parent::__construct();
        $this->load->model('dosen_model');
    }

	public function index(){
		$data['title'] = "Data Dosen";
		$data['dosen'] = $this->dosen_model->getAll();
		$this->load->view('template/header', $data);
		$this->load->view('dosen/index');
		$this->load->view('template/footer');
	}

	public function add(){
		$data['title'] = "Form menambah Mata Kuliah";
        $this->form_validation->set_rules('nama', 'nama', 'required');

        if ($this->form_validation->run() == FALSE)
        {
			$this->load->view('template/header_admin', $data);
			$this->load->view('dosen/tambah', $data);
			$this->load->view('template/footer');
        } else {
            $this->dosen_model->add();
			redirect('admin/dosen','refresh');
        }
	}

	public function edit($nip){
		$data['title'] = "Form mengedit Dosen";
		$data['matkul'] = $this->dosen_model->ambil($nip);

		$this->load->view('template/header_admin', $data);
		$this->load->view('dosen/edit', $data);
		$this->load->view('template/footer');
	}

	public function edit_proses(){
		$nip = htmlspecialchars($this->input->post('nip'));
		$nama = htmlspecialchars($this->input->post('nama'));

		$update = $this->dosen_model->update($nip, $nama);
		if ($update) {
			redirect('admin/dosen','refresh');
		}
	}

	public function delete($id){
		$this->dosen_model->delete($id);
		redirect('admin/dosen','refresh');
	}
}

/* End of file Dosen.php */

?>
