<div class="container mt-5">
	<h3 class="text-center">Data Mata Kuliah</h3>
	<a href="<?= base_url();?>matkul/add" class="btn btn-primary">Create</a>
	<table class="table table-bordered" id="list">
		<thead class="thead-inverse">
			<tr>
				<th scope="col" class="text-center">ID</th>
				<th scope="col" class="text-center">Nama</th>
				<th scope="col" class="text-center">Nama Dosen</th>
				<th scope="col" class="text-center">SKS</th>
				<th scope="col" class="text-center">Jam</th>
				<th scope="col" class="text-center">Aksi</th>
			</tr>
			</thead>
			<tbody>
				<?php foreach ($matkul as $mtk):?>
				<tr>
					<td scope="row" class="text-center"><?= $mtk['id'];?></td>
					<td scope="row" class="text-center"><?= $mtk['nama'];?></td>
					<td scope="row" class="text-center"><?= $mtk['nama_dosen'];?></td>
					<td scope="row" class="text-center"><?= $mtk['sks'];?></td>
					<td scope="row" class="text-center"><?= $mtk['jam'];?></td>
					<td scope="row" class="text-center">
						<a href="<?= base_url();?>matkul/edit/<?= $mtk['id'];?>" class="btn btn-danger">Edit</a>
						<a href="<?= base_url();?>matkul/delete/<?= $mtk['id'];?>" class="btn btn-danger">Hapus</a>
					</td>
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
