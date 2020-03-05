	<?=
		form_open('login/proses_login');
	?>
	<!-- body -->
	<div class="container">
		<div class="row">
			<div class="col-md-12" style="margin-top:25%">
				<div class="card">
					<div class="card-header">
						<h4>🤵 Login</h4>
					</div>
					<div class="card-body">
						<form action="" method="post">
							<div class="form-group">
							  <label for="username">Username</label>
							  <input type="text" name="username" id="username" class="form-control" placeholder="Enter your Username">
							</div>
							<div class="form-group">
							  <label for="password">Password</label>
							  <input type="password" name="password" id="password" class="form-control" placeholder="Enter your Password">
							</div>
							<button type="submit" class="btn btn-primary">Login</button>
						</form>
						<a href="<?= base_url();?>register" class="btn btn-info ml-2">Belum punya akun ?</a>
					</div>
					<div class="card-footer text-muted">
						<div class="alert alert-info" role="alert">
						<?php
						if (isset($pesan)) {
							echo $pesan;
						} else {
							echo "Masukkan username dan password anda";
						}
						?>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<?=
	form_close();
	?>
