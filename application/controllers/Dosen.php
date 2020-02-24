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
}

/* End of file Dosen.php */

?>
