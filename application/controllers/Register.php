<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Register extends CI_Controller {

	public function index()
	{
		$data['title'] = "Halaman Login";
		$this->load->view('template/header_non_navbar', $data);
		$this->load->view('user_activities/register');
		$this->load->view('template/footer');
	}

	public function process(){
		$this->load->model('register_model');
		
		if ($this->input->post()) {
			$data['username'] = htmlspecialchars($this->input->post('username'));
			$data['password'] = htmlspecialchars($this->input->post('password'));
			$data['alamat'] = htmlspecialchars($this->input->post('alamat'));

			if ($this->register_model->getUsername($data['username'])) {
				$data['pesan'] = "Username sudah digunakan";
				$data['title'] = "Register";
				$this->load->view('template/header_non_navbar', $data);
				$this->load->view('user_activities/register', $data);
				$this->load->view('template/footer');
			} else {
				$createUser = $this->register_model->createUser($data);
				if ($createUser) {
					redirect('login','refresh');
				}
			}

		} else {
			redirect('register','refresh');
		}
	}

}

/* End of file Register.php */

?>
