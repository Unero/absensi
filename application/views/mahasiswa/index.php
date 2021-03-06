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
