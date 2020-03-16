<div class="container mt-5">
	<h3 class="text-center">Data Dosen</h3>
	<a href="<?= base_url();?>dosen/add" class="btn btn-primary">Create</a>
	<table class="table table-bordered" id="list">
		<thead class="thead-inverse">
			<tr>
				<th scope="col" class="text-center">NIP</th>
				<th scope="col" class="text-center">Nama Dosen</th>
				<th scope="col" class="text-center">Aksi</th>
			</tr>
			</thead>
			<tbody>
				<?php foreach ($dosen as $dsn):?>
				<tr>
					<td scope="row" class="text-center"><?= $dsn['nip'];?></td>
					<td scope="row" class="text-center"><?= $dsn['nama_dosen'];?></td>
					<td scope="row" class="text-center">
						<a href="<?= base_url();?>dosen/edit/<?= $dsn['nip'];?>" class="btn btn-danger">Edit</a>
						<a href="<?= base_url();?>dosen/delete/<?= $dsn['nip'];?>" class="btn btn-danger">Hapus</a>
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
