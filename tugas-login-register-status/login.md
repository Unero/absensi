# Login

Dengan pembuatan multi user, ketika user biasa login akan diarahkan ke aplikasi utama. Sedangkan untuk admin diarahkan ke halaman admin sendiri.

## Controller

```php
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

```

## Model

```php
<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class login_model extends CI_Model {

	public function login($username, $password){
		$this->db->select('username, password, level');
		$this->db->from('user');
		$this->db->where('username', $username);
		$this->db->where('password', $password);
		$this->db->where('status', 'aktif');
		$this->db->limit(1);

		$query = $this->db->get();
		if ($query->num_rows()==1) {
			return $query->result();
		} else{
			return false;
		}
	}

}

/* End of file login_models.php */

?>

```

## View

index.php yang berada di View/user\_activities/

```php
	<?=
		form_open('login/proses_login');
	?>
	<!-- body -->
	<div class="container">
		<div class="row">
			<div class="col-md-12" style="margin-top:25%">
				<div class="card">
					<div class="card-header">
						<h4>🤵 Login</h4>
					</div>
					<div class="card-body">
						<form action="" method="post">
							<div class="form-group">
							  <label for="username">Username</label>
							  <input type="text" name="username" id="username" class="form-control" placeholder="Enter your Username">
							</div>
							<div class="form-group">
							  <label for="password">Password</label>
							  <input type="password" name="password" id="password" class="form-control" placeholder="Enter your Password">
							</div>
							<button type="submit" class="btn btn-primary">Login</button>
						</form>
						<a href="<?= base_url();?>register" class="btn btn-info ml-2">Belum punya akun ?</a>
					</div>
					<div class="card-footer text-muted">
						<div class="alert alert-info" role="alert">
						<?php
						if (isset($pesan)) {
							echo $pesan;
						} else {
							echo "Masukkan username dan password anda";
						}
						?>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<?=
	form_close();
	?>

```

