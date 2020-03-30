<div class="container mt-5">
	<h3>Absen</h3>
	<div class="row">
		<div class="col-md-12">
			<?= var_dump($this->session->userdata('user'));?>
			<?= form_open('absensi/absent'); ?>
			<form action="" method="post">
				<div class="form-group">
				  <label for="matkul">Mata Kuliah</label>
				  <select class="form-control" name="matkul" id="matkul">
					<?php foreach($matkul as $mtkl):?>
						<option value="<?= $mtkl['id'] ?>"><?= $mtkl['id']." - ".$mtkl['nama']; ?></option>
					<?php endforeach; ?>
				  </select>

				</div>
				<div class="form-group">
				  <label for="dosen">Dosen</label>
				  <select class="form-control" name="dosen" id="dosen">
					<?php foreach($dosen as $ds):?>
						<option value="<?= $ds['nip']; ?>"><?= $ds['nip']." - ".$ds['nama_dosen']; ?></option>
					<?php endforeach; ?>
				  </select>
				</div>
				<div class="form-group">
				  <label for="kelas">Kelas</label>
				  <select class="form-control" name="kelas" id="kelas">
				  <?php foreach($mahasiswa as $mhs):?>
						<option value="<?= $mhs['kelas']; ?>"><?= $mhs['kelas']; ?></option>
					<?php endforeach; ?>
				  </select>
				</div>
				<div class="form-group">
					<label for="tanggal">Tanggal</label>
					<input type="date" name="tanggal" id="tanggal" value="<?= $Sekarang; ?>" class="form-control">
				</div>
				<button type="submit" class="btn btn-primary">Absent</button>
			</form>
			<?= form_close(); ?>
		</div>
	</div>
</div>
