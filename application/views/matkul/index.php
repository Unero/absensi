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
