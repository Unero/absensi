<?=
	form_open('register/process');
?>
<div class="container mt-5">
	<div class="card">
		<div class="card-header">
			<h3>Registrasi User</h3>
		</div>
		<div class="card-body">
			<form action="" method="post">
				<div class="form-group">
				  <label for="username">Username</label>
				  <input type="username" name="username" id="username" class="form-control" placeholder="Enter your Username">
				</div>
				<div class="form-group">
				  <label for="password">Password</label>
				  <input type="password" name="password" id="password" class="form-control" placeholder="Enter your password">
				</div>
				<div class="form-group">
				  <label for="alamat">Alamat</label>
				  <textarea class="form-control" name="alamat" id="alamat" rows="3"></textarea>
				</div>
				<button type="submit" class="btn btn-primary mr-2">Register</button>
			</form>
			<a href="<?= base_url();?>login" class="btn btn-secondary">Sudah punya akun ?</a>
		</div>
		<?php
		if (isset($pesan)) { ?>
			<div class="card-footer text-muted">
				<div class="alert alert-info" role="alert">
					<p><?= $pesan;?></p>
				</div>
			</div>
			<?php
		} ?>
	</div>
</div>
