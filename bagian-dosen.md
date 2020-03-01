# Bagian: Dosen

Dalam bagian dosen, fiturnya hanya bisa untuk melihat list dosen saja.

## Controller

Berikut isi dari controller Dosen.php

Lokasi file: controller &gt; Dosen.php

```php
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
?>
```

## View

Untuk dosen hanya memilik 1 file view yakni index

Lokasi file : views &gt; dosen &gt; index.php

```php
<div class="container">
    <div class="row mt-3">
        <div class="col-md-6">
            <h2>Daftar Dosen</h2>
			<table class="table">
				<thead>
					<tr>
						<th scope="col" class="text-center">NIP</th>
						<th scope="col" class="text-center">Nama</th>
					</tr>
				</thead>
				<tbody>
                <?php foreach ($dosen as $dsn):?>
					<tr>
						<td scope="row" class="text-center"><?= $dsn['nip'];?></td>
						<td scope="row" class="text-center"><?= $dsn['nama_dosen'];?></td>
					</tr>
				<?php endforeach; ?>
				</tbody>
			</table>
        </div>
    </div>
</div>
```

## Model

Membuat model yang berisi fungsi untuk mendapatkan semua isi dalam database

Lokasi: models &gt; dosen\_model.php

```php
<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class dosen_model extends CI_Model {
	public function getAll(){
        return $this->db->get('dosen')->result_array();
    }
}
?>
```

