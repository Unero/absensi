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

			<!-- Tambah -->
			<div class="row mt-4">
				<div class="col-md-6">
					<a href="<?= base_url();?>absensi/tambah" class="btn btn-primary">Tambah Data</a>
				</div>
			</div>

			<!-- List -->
			<table class="table mt-2 border">
				<thead>
					<tr>
						<th scope="col" class="text-center">Matkul</th>
						<th scope="col" class="text-center">Dosen</th>
						<th scope="col" class="text-center">Mahasiswa</th>
						<th scope="col" class="text-center">Ket</th>
						<th scope="col" class="text-center">Tanggal</th>
					</tr>
				</thead>
				<tbody>
                <?php foreach ($absensi as $abs):?>
					<tr>
						<td scope="row" class="text-center"><?= $abs['matkul'];?></td>
						<td scope="row" class="text-center"><?= $abs['dosen'];?></td>
						<td scope="row" class="text-center"><?= $abs['mahasiswa'];?></td>
						<td scope="row" class="text-center"><?= $abs['status'];?></td>
						<td scope="row" class="text-center"><?= $abs['waktu_masuk'];?></td>
					</tr>
				<?php endforeach; ?>
				</tbody>
			</table>
        </div>
    </div>
</div>
