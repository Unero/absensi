<div class="container mt-5">
	<h3 class="text-center">Data Mahasiswa</h3>
	<a href="<?= base_url();?>mahasiswa/add" class="btn btn-primary">Create</a>
	<table class="table table-bordered" id="list">
		<thead class="thead-inverse">
			<tr>
				<th scope="col" class="text-center">NIM</th>
				<th scope="col" class="text-center">Nama</th>
				<th scope="col" class="text-center">Kelas</th>
				<th scope="col" class="text-center">Jurusan</th>
				<th scope="col" class="text-center">Aksi</th>
			</tr>
			</thead>
			<tbody>
				<?php foreach ($mahasiswa as $mhs):?>
				<tr>
					<td scope="row" class="text-center"><?= $mhs['nim'];?></td>
					<td scope="row" class="text-center"><?= $mhs['nama_mhs'];?></td>
					<td scope="row" class="text-center"><?= $mhs['kelas'];?></td>
					<td scope="row" class="text-center"><?= $mhs['jurusan'];?></td>
					<td scope="row" class="text-center">
						<a href="<?= base_url();?>mahasiswa/edit/<?= $mhs['nim'];?>" class="btn btn-primary">Edit</a>
						<a href="<?= base_url();?>mahasiswa/delete/<?= $mhs['nim'];?>" class="btn btn-primary">Hapus</a>
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
