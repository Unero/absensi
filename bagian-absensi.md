# Bagian: Absensi

## Controller

Terdapat fungsi add untuk menambahkan data. absen dan delete digunakan untuk mengupdate nilai table.

```php
<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Absensi extends CI_Controller {

	public function __construct(){
        parent::__construct();
        $this->load->model('absensi_model');
    }

	public function index()
	{
		$data['title'] = "Absensi";
		$data['absensi'] = $this->absensi_model->allAbsensi();

		$this->load->view('template/header', $data);
		$this->load->view('absensi/index', $data);
		$this->load->view('template/footer');
	}

	public function add(){
		$data['title'] = "Form menambah data absensi";

		$data['dosen'] = $this->absensi_model->getDosen();
		$data['mahasiswa'] = $this->absensi_model->getMahasiswa();
		$data['matkul'] = $this->absensi_model->getMatkul();

		// rules
		$this->form_validation->set_rules('matkul', 'matkul', 'required');
        $this->form_validation->set_rules('dosen', 'dosen', 'required');
		$this->form_validation->set_rules('mhs', 'mhs', 'required');

        if ($this->form_validation->run() == FALSE)
        {
            $this->load->view('template/header', $data);
            $this->load->view('absensi/tambah', $data);
            $this->load->view('template/footer');    
        } else {
			$this->absensi_model->absensi();
			$this->session->set_flashdata('flash-data', 'absen');
			redirect('absensi','refresh');
		}
	}

	public function absen($nim, $status){
		$this->absensi_model->absent($nim, $status);
		redirect('absensi','refresh');
	}

	public function delete(){
		$this->absensi_model->clear();
		redirect('absensi','refresh');
	}
}
/* End of file Absensi.php */
?>

```

## Model

Terdapat join untuk menampilkan data absensi, dan pada fungsi dibawah comment selection digunakan untuk select pada view.

```php
<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class absensi_model extends CI_Model {
	public function allAbsensi(){
		$this->db->select('mk.nama, d.nama_dosen, m.nama_mhs, m.nim, a.status, a.waktu_masuk');
		$this->db->from('absensi a');
		$this->db->join('dosen d', 'd.nip = a.dosen');
		$this->db->join('mahasiswa m', 'm.nim = a.mahasiswa');
		$this->db->join('matkul mk', 'mk.id = a.matkul');
		$query = $this->db->get();
		if ($query->num_rows() != 0) {
			return $query->result_array();
		} else {
			return "Data tidak ada";
		}
	}

	public function absensi(){
        $data = [
            "matkul" => $this->input->post('matkul',true),
            "dosen" => $this->input->post('dosen',true),
			"mahasiswa" => $this->input->post('mhs', true),
			"status" => $this->input->post('status', true)
        ];
        $this->db->insert('absensi', $data);  
	}

	public function clear(){
		$this->db->set('status', '-');
		$this->db->where('matkul', 3001);
		$this->db->update('absensi');	
	}

	public function absent($nim, $status){
		$this->db->set('status', $status);
		$this->db->where('mahasiswa', $nim);
		$this->db->update('absensi');	
	}

	public function insert_absensi(){
        $data = [
            "matkul" => $this->input->post('matkul',true),
            "dosen" => $this->input->post('dosen',true),
			"mahasiswa" => $this->input->post('mhs', true)
        ];
        $this->db->insert('absensi', $data);  
	}

	// Selection Data
	public function getDosen(){
		$this->db->select('*');
		$this->db->from('dosen');
		$query = $this->db->get();
		return $query->result_array();
	}

	public function getMatkul(){
		$this->db->select('*');
		$this->db->from('matkul');
		$query = $this->db->get();
		return $query->result_array();
	}

	public function getMahasiswa(){
		$query = $this->db->query("SELECT m.nim, m.nama_mhs FROM mahasiswa AS m LEFT JOIN absensi a ON m.nim = a.mahasiswa WHERE a.mahasiswa IS NULL");
		return $query->result_array();
	}
}

/* End of file absensi_model.php */

?>

```

## View

file index.php berisi tentang table data absensi

```php
<div class="container">
	<?php if($this->session->flashdata('flash-data')):?>
    <div class="row mt-4">
        <div class="col-md-6">
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                Mahasiswa <strong>berhasil</strong> <?= $this->session->flashdata('flash-data');?>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>        
        </div>
    </div>
    <?php endif; ?>
    <div class="row mt-3">
        <div class="col-md-12">
            <h2>Absensi</h2>
			<!-- CRUD -->
			<div class="row mt-4">
				<div class="col-md-6">
					<a href="<?= base_url();?>absensi/add" class="btn btn-info mr-2">Insert Data</a>
					<a href="<?= base_url();?>absensi/delete" class="btn btn-danger">Clear Absen</a>
				</div>
			</div>

			<!-- List -->
			<table class="table table-secondary mt-2 border">
				<thead>
					<tr>
						<th scope="col" class="text-center">Matkul</th>
						<th scope="col" class="text-center">Dosen</th>
						<th scope="col" class="text-center">Mahasiswa</th>
						<th scope="col" class="text-center">Ket</th>
						<!-- <th scope="col" class="text-center">Tanggal</th> -->
						<th scope="col" class="text-center">Aksi</th>
					</tr>
				</thead>
				<tbody>
                <?php foreach ($absensi as $abs):?>
					<tr>
						<td scope="row" class="text-center"><?= $abs['nama'];?></td>
						<td scope="row" class="text-center"><?= $abs['nama_dosen'];?></td>
						<td scope="row" class="text-center"><?= $abs['nama_mhs'];?></td>
						<td scope="row" class="text-center"><?= $abs['status'];?></td>
						<!-- <td scope="row" class="text-center"><?= $abs['waktu_masuk'];?></td> -->
						<td scope="row" class="text-center">
							<a href="<?= base_url();?>absensi/absen/<?= $abs['nim'];?>/Masuk" class="btn btn-success mr-2">🧾 Absen</a>
							<a href="<?= base_url();?>absensi/absen/<?= $abs['nim'];?>/Ijin" class="btn btn-warning mr-2">🧾 Ijin</a>
							<a href="<?= base_url();?>absensi/absen/<?= $abs['nim'];?>/Sakit" class="btn btn-info">🧾 Sakit</a>
						</td>
					</tr>
				<?php endforeach; ?>
				</tbody>
			</table>
        </div>
    </div>
</div>

```

file tambah.php &gt; berisi tampilan penambahan data.

```php
<div class="container">
    <div class="row mt-3">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <h3><?= $title; ?></h3>
                </div>
                <div class="card-body">  
						<?php if(validation_errors()):?>
                        <div class="alert alert-danger" role="alert">
                            <strong><?= validation_errors();?></strong>
                        </div>
                    <?php endif ?>

                    <form action="" method="post">
                      	<div class="form-group">
                      	  <label for="matkul">Nama Matkul</label> <br>
                      	  <select class="form-control" name="matkul" id="matkul">
								<?php foreach($matkul as $mtkl):?>
									<option value="<?= $mtkl['id'] ?>"><?= $mtkl['id']." - ".$mtkl['nama']; ?></option>
								<?php endforeach; ?>
							</select>
                      	</div>
						<div class="form-group">
                        <label for="dosen">Nama Dosen</label> <br>
							<select class="form-control" name="dosen" id="dosen">
								<?php foreach($dosen as $ds):?>
									<option value="<?= $ds['nip']; ?>"><?= $ds['nip']." - ".$ds['nama_dosen']; ?></option>
								<?php endforeach; ?>
							</select>
                      	</div>
						<div class="form-group">
						<label for="mhs">Nama Mahasiswa</label> <br>
							<select class="form-control" name="mhs" id="mhs">
								<?php foreach($mahasiswa as $mhs):?>
									<option value="<?= $mhs['nim']; ?>"><?= $mhs['nim']." - ".$mhs['nama_mhs']; ?></option>
								<?php endforeach; ?>
							</select>
						</div>
						<button type="submit" name="submit" class="btn btn-primary float-right">Absen</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

```

