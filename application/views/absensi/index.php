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
					<a href="<?= base_url();?>absensi/delete" class="btn btn-danger">Clear</a>
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
