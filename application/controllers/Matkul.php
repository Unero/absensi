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

}

/* End of file Matkul.php */

?>
