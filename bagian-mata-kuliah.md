# Bagian: Mata Kuliah

Sama seperti Dosen, mata kuliah hanya bisa menampilkan isi mata kuliah saja.

## Controller

Isi fungsi index untuk menampilkan daftar 

```php
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
?>
```

## View

isi index.php

```php
<div class="container">
    <div class="row mt-3">
        <div class="col-md-auto">
            <h2>Daftar Mata Kuliah</h2>
			<table class="table">
				<thead>
					<tr>
						<th scope="col" class="text-center">Kode Matkul</th>
						<th scope="col" class="text-center">Nama Matkul</th>
						<th scope="col" class="text-center">Nama Dosen</th>
						<th scope="col" class="text-center">SKS</th>
						<th scope="col" class="text-center">Jam</th>
					</tr>
				</thead>
				<tbody>
        <?php foreach ($matkul as $mtkl):?>
					<tr>
						<td scope="row" class="text-center"><?= $mtkl['id'];?></td>
						<td scope="row" class="text-center"><?= $mtkl['nama'];?></td>
						<td scope="row" class="text-center"><?= $mtkl['nama_dosen'];?></td>
						<td scope="row" class="text-center"><?= $mtkl['sks'];?></td>
						<td scope="row" class="text-center"><?= $mtkl['jam'];?></td>
					</tr>
				<?php endforeach; ?>
				</tbody>
			</table>
        </div>
    </div>
</div>
```

## Model

fungsi model untuk mendapatkan data dari database

```php
<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class matkul_model extends CI_Model {
	public function getAll(){
        return $this->db->get('matkul')->result_array();
    }
}
?>
```

