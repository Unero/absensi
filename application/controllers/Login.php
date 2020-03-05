<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	public function index()
	{
		$data['title'] = "Halaman Login";
		$this->load->view('template/header', $data);
		$this->load->view('login/index');
		$this->load->view('template/footer');
	}
}
/* End of file Login.php */
?>
