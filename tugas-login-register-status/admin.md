# Admin

Pada halaman admin, bisa mengelola untuk pengaktifan akun user sendiri.

## Controller

```php
<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('admin_model');
	}

	public function index()
	{		
		$data['title'] = "Halaman Admin";
		$data['users'] = $this->admin_model->getUser();

		$this->load->view('template/header_admin', $data);
		$this->load->view('admin/index', $data);
		$this->load->view('template/footer');
	}

	public function activate($id){
		$this->admin_model->activateUser($id);
		redirect('admin','refresh');
	}

	public function disable($id){
		$this->admin_model->disableUser($id);
		redirect('admin','refresh');
	}

}

/* End of file Admin.php */

?>

```

## Model

```php
<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class admin_model extends CI_Model {

	public function getUser(){
		$this->db->where('level', '1');
		return $this->db->get('user')->result_array();
	}

	public function activateUser($id){
		$this->db->set('status', 'aktif');
		$this->db->where('id', $id);
		$this->db->update('user');	
	}

	public function disableUser($id){
		$this->db->set('status', 'nonaktif');
		$this->db->where('id', $id);
		$this->db->update('user');	
	}
}

/* End of file admin_model.php */

?>

```

## View

```php
<div class="container mt-5">
	<table class="table table-bordered">
		<thead class="thead-inverse">
			<tr>
				<th scope="col" class="text-center">Username</th>
				<th scope="col" class="text-center">Password</th>
				<th scope="col" class="text-center">Level</th>
				<th scope="col" class="text-center">Status</th>
				<th scope="col" class="text-center">Action</th>
			</tr>
			</thead>
			<tbody>
				<?php foreach ($users as $user):?>
				<tr>
					<td scope="row" class="text-center"><?= $user['username'];?></td>
					<td scope="row" class="text-center"><?= $user['password'];?></td>
					<td scope="row" class="text-center"><?= $user['level'];?></td>
					<td scope="row" class="text-center"><?= $user['status'];?></td>
					<td scope="row" class="text-center">
						<a href="admin/activate/<?= $user['id'];?>" class="btn btn-info mr-2">🔓 Aktifkan</a>
						<a href="admin/disable/<?= $user['id'];?>" class="btn btn-danger">🔏 Disable</a>
					</td>
				</tr>
				<?php endforeach; ?>
			</tbody>
	</table>
</div>

```



