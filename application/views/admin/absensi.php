<div class="container mt-5">
	<table class="table table-bordered" id="list">
		<thead class="thead-inverse">
			<tr>
				<th scope="col" class="text-center">Id</th>
				<th scope="col" class="text-center">Mata Kuliah</th>
				<th scope="col" class="text-center">Kode Dosen</th>
				<th scope="col" class="text-center">Kode Mahasiswa</th>
				<th scope="col" class="text-center">Status</th>
				<th scope="col" class="text-center">Tanggal</th>
			</tr>
			</thead>
			<tbody>
				<?php foreach ($absensi as $abs):?>
				<tr>
					<td scope="row" class="text-center"><?= $abs['id'];?></td>
					<td scope="row" class="text-center"><?= $abs['matkul'];?></td>
					<td scope="row" class="text-center"><?= $abs['dosen'];?></td>
					<td scope="row" class="text-center"><?= $abs['mahasiswa'];?></td>
					<td scope="row" class="text-center"><?= $abs['status'];?></td>
					<td scope="row" class="text-center"><?= $abs['tanggal'];?></td>
				</tr>
				<?php endforeach; ?>
			</tbody>
	</table>
</div>

<script type="text/javascript">
	$(document).ready( function () {
		$('#list').DataTable();
	});
</script>
