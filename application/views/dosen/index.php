<div class="container">
    <div class="row mt-3">
        <div class="col-md-auto">
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
						<td scope="row" class="text-center"><?= $dsn['nama'];?></td>
					</tr>
				<?php endforeach; ?>
				</tbody>
			</table>
        </div>
    </div>
</div>
