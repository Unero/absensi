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
		$data['absensi'] = $this->absensi_model->allAbsensi();

		$this->load->view('template/header', $data);
		$this->load->view('absensi/index', $data);
		$this->load->view('template/footer');
	}

	public function absen($nim, $status){
		$this->absensi_model->absent($nim, $status);
		redirect('absensi','refresh');
	}

	public function delete(){
		$this->absensi_model->clear();
		redirect('absensi','refresh');
	}
}
/* End of file Absensi.php */
?>
