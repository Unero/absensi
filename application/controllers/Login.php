<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('login_model');
	}

	public function index()
	{
		$data['title'] = "Halaman Login";
		$this->load->view('template/header_non_navbar', $data);
		$this->load->view('user_activities/index');
		$this->load->view('template/footer');
	}

	public function proses_login(){
		$username = htmlspecialchars($this->input->post('username'));
		$password = htmlspecialchars($this->input->post('password'));
		$ceklogin = $this->login_model->login($username, $password);

		if ($ceklogin) {
			foreach ($ceklogin as $row);
			$this->session->set_userdata('user', $row->username);
			$this->session->set_userdata('level', $row->level);

			if ($this->session->userdata('level')=="1") {
				redirect('Absensi');
			} elseif ($this->session->userdata('level')=="2") {
				redirect('Admin');
			}
		} else {
			$data['pesan'] = "Username dan Password anda salah";
			$data['title'] = "Login";
			$this->load->view('template/header_non_navbar', $data);
			$this->load->view('user_activities/index', $data);
			$this->load->view('template/footer');	
		}
	}

	public function logout(){
		$this->session->sess_destroy();
		redirect('login','refresh');
	}
}
/* End of file Login.php */
?>
