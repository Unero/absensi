<div class="container">
    <div class="row mt-3">
        <div class="col-md-12">
            <h2>Absensi</h2>
			<p>Tanggal: <?= date("d - M - Y"); ?></p>
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
				<?php if ($absensi != "Data tidak ada"){
					foreach ($absensi as $abs){?>
					<tr>
						<td scope="row" class="text-center"><?= $abs['nama'];?></td>
						<td scope="row" class="text-center"><?= $abs['nama_dosen'];?></td>
						<td scope="row" class="text-center"><?= $abs['nama_mhs'];?></td>
						<td scope="row" class="text-center"><?= $abs['status'];?></td>
						<td scope="row" class="text-center"><?= $abs['tanggal'];?></td>
					</tr>
				<?php }} else {?>
					<tr>
						<td scope="row" colspan="5" class="text-center">Hari ini belum ada Absen</td>
					</tr>
				<?php } ?>
				</tbody>
			</table>
        </div>
    </div>
</div>
