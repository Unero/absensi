<div class="container">
    <div class="row mt-3">
        <div class="col-md-auto">
            <h2>Daftar Mahasiswa</h2>
			<table class="table">
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
						<td scope="row" class="text-center"><?= $mhs['nama'];?></td>
						<td scope="row" class="text-center"><?= $mhs['kelas'];?></td>
						<td scope="row" class="text-center"><?= $mhs['jurusan'];?></td>
					</tr>
				<?php endforeach; ?>
				</tbody>
			</table>
        </div>
    </div>
</div>
