<div class="container">
    <div class="row mt-3">
        <div class="col-md-12">
            <h2>Absensi</h2>
			<p>Tanggal: <?= date("Y-m-d"); ?></p>
			<!-- List -->
			<table class="table table-secondary mt-2 border">
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
				<?= var_dump($absensi);?>
				<?php if (!empty($absensi)){
					foreach ($absensi as $abs):?>
					<tr>
						<td scope="row" class="text-center"><?= $abs['nama'];?></td>
						<td scope="row" class="text-center"><?= $abs['nama_dosen'];?></td>
						<td scope="row" class="text-center"><?= $abs['nama_mhs'];?></td>
						<td scope="row" class="text-center"><?= $abs['status'];?></td>
						<td scope="row" class="text-center"><?= $abs['tanggal'];?></td>
					</tr>
				<?php endforeach;} else {?>
					<tr>
						<td colspan="5" class="text-center">Data tidak ada</td>
					</tr>
				<?php } ?>
				</tbody>
			</table>
        </div>
    </div>
</div>
