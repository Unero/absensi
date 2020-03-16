<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Matkul extends CI_Controller {

	public function __construct(){
        parent::__construct();
        $this->load->model('matkul_model');
    }

	public function index()
	{
		$data['title'] = "Data Mata Kuliah";
		$data['matkul'] = $this->matkul_model->getAll();
		$this->load->view('template/header', $data);
		$this->load->view('matkul/index');
		$this->load->view('template/footer');
	}

	public function add(){
		$data['title'] = "Form menambah Mata Kuliah";
		$data['dosen'] = $this->matkul_model->getDosenName();

        $this->form_validation->set_rules('nama', 'nama', 'required');
		$this->form_validation->set_rules('dosen', 'dosen', 'required');

        if ($this->form_validation->run() == FALSE)
        {
			$this->load->view('template/header_admin', $data);
			$this->load->view('matkul/tambah', $data);
			$this->load->view('template/footer');
        }
        else
        {
            $this->matkul_model->add();
			redirect('admin/matkul','refresh');
        }
	}

	public function edit($id){
		$data['title'] = "Form mengedit Mata Kuliah";
		$data['dosen'] = $this->matkul_model->getDosenName();
		$data['matkul'] = $this->matkul_model->ambil($id);

		$this->load->view('template/header_admin', $data);
		$this->load->view('matkul/edit', $data);
		$this->load->view('template/footer');
	}

	public function edit_proses(){
		$id = htmlspecialchars($this->input->post('id'));
		$nama = htmlspecialchars($this->input->post('nama'));
		$dosen = htmlspecialchars($this->input->post('dosen'));
		$sks = htmlspecialchars($this->input->post('sks'));
		$jam = htmlspecialchars($this->input->post('jam'));

		$update = $this->matkul_model->edit($id, $nama, $dosen, $sks, $jam);
		if ($update) {
			redirect('admin/matkul','refresh');
		}
	}

	public function delete($id){
		$this->matkul_model->delete($id);
		redirect('admin/matkul','refresh');
	}

}

/* End of file Matkul.php */

?>
