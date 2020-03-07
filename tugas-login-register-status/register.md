# Register

Halaman dimana user akan mengirimkan data nya

## Controller

```php
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

```

## Model

```php
<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class register_model extends CI_Model {

	public function createUser($data){
		$this->db->insert('user', $data);
		return $this->db->insert_id();
	}

	public function getUsername($username){
		$this->db->select('username');
		$this->db->from('user');
		$this->db->where('username', $username);
		return $this->db->get();
	}

}

/* End of file register_model.php */

?>

```

## View

```php
<?=
	form_open('register/process');
?>
<div class="container mt-5">
	<div class="card">
		<div class="card-header">
			<h3>Registrasi User</h3>
		</div>
		<div class="card-body">
			<form action="" method="post">
				<div class="form-group">
				  <label for="username">Username</label>
				  <input type="username" name="username" id="username" class="form-control" placeholder="Enter your Username">
				</div>
				<div class="form-group">
				  <label for="password">Password</label>
				  <input type="password" name="password" id="password" class="form-control" placeholder="Enter your password">
				</div>
				<div class="form-group">
				  <label for="alamat">Alamat</label>
				  <textarea class="form-control" name="alamat" id="alamat" rows="3"></textarea>
				</div>
				<button type="submit" class="btn btn-primary mr-2">Register</button>
			</form>
			<a href="<?= base_url();?>login" class="btn btn-secondary">Sudah punya akun ?</a>
		</div>
		<?php
		if (isset($pesan)) { ?>
			<div class="card-footer text-muted">
				<div class="alert alert-info" role="alert">
					<p><?= $pesan;?></p>
				</div>
			</div>
			<?php
		} ?>
	</div>
</div>

```

