# Bagian: Mahasiswa

## Controller

Menunjukkan jika controller mengatur 2 halaman yakni index dan add

```php
<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Mahasiswa extends CI_Controller {

	public function __construct(){
        parent::__construct();
        $this->load->model('mahasiswa_model');
    }

	public function index()
	{
		$data['title'] = "Data Mahasiswa";
		$data['mahasiswa'] = $this->mahasiswa_model->getAll();
		$this->load->view('template/header', $data);
		$this->load->view('mahasiswa/index', $data);
		$this->load->view('template/footer');
	}

	public function add(){
		$data['title'] = "Form menambah Data Mahasiswa";
		
		$this->form_validation->set_rules('nama', 'Nama', 'required');
		$this->form_validation->set_rules('kelas', 'kelas', 'required');

        if ($this->form_validation->run() == FALSE)
        {
          $this->load->view('template/header', $data);
          $this->load->view('mahasiswa/tambah', $data);
          $this->load->view('template/footer');    
        }
        else
        {
          $this->mahasiswa_model->add();
					$this->session->set_flashdata('flash-data', 'ditambahkan');
					redirect('mahasiswa','refresh');
        }
	}
}
?>
```

## Model

Mempunyai 2 fungsi yaitu getAll dan add

```php
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class mahasiswa_model extends CI_Model {
	public function getAll(){
        return $this->db->get('mahasiswa')->result_array();
	}
	
	public function add(){
	$data = [
            "nama_mhs" => $this->input->post('nama',true),
            "kelas" => $this->input->post('kelas', true)
        ];
  $this->db->insert('mahasiswa', $data);
	}
}
?>
```

## View

View Index

```php
<div class="container">
    <div class="row mt-3">
        <div class="col-md-6">
            <h2>Daftar Mahasiswa</h2>
			<a href="<?= base_url() ?>mahasiswa/add" class="btn btn-success">Insert Mahasiswa</a>
			<table class="table mt-2">
				<thead>
					<tr>
						<th scope="col" class="text-center">NIM</th>
						<th scope="col" class="text-center">Nama</th>
						<th scope="col" class="text-center">Kelas</th>
						<th scope="col" class="text-center">Jurusan</th>
					</tr>
				</thead>
				<tbody>
                <?php foreach ($mahasiswa as $mhs):?>
					<tr>
						<td scope="row" class="text-center"><?= $mhs['nim'];?></td>
						<td scope="row" class="text-center"><?= $mhs['nama_mhs'];?></td>
						<td scope="row" class="text-center"><?= $mhs['kelas'];?></td>
						<td scope="row" class="text-center"><?= $mhs['jurusan'];?></td>
					</tr>
				<?php endforeach; ?>
				</tbody>
			</table>
        </div>
    </div>
</div>

```

View Tambah

```php
<div class="container">
	<div class="row">
		<div class="col-md-10 mt-5">
		<div class="card ml-5">
        <div class="card-header">
            Form Tambah Data Mahasiswa
				</div>
        <div class="card-body">
            <?php if(validation_errors()):?>
            <div class="alert alert-danger" role="alert">
                <strong><?= validation_errors();?></strong>
            </div>
            <?php endif ?>
                    <form action="" method="post">
                        <div class="form-group">
                          <label for="nama">Nama</label>
                          <input type="text" name="nama" id="nama" class="form-control" placeholder="Asep Sudirman">
                        </div>
                        <div class="form-group">
                          <label for="kelas">Kelas</label>
                          <input type="kelas" name="kelas" id="kelas" class="form-control" placeholder="TI 2B">
                        </div>
                        <button type="submit" name="submit" class="btn btn-primary float-right">Submit</button>
                    </form>
        </div>
    </div>
		</div>
	</div>
</div>
```

