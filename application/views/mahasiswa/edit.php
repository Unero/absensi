<div class="container">
	<div class="row">
		<div class="col-md-10 mt-5">
		<div class="card ml-5">
                <div class="card-header">
                    Form Tambah Data Mahasiswa
				</div>
                <div class="card-body">
                    <?php if(validation_errors()):?>
                        <div class="alert alert-danger" role="alert">
                            <strong><?= validation_errors();?></strong>
                        </div>
					<?php endif ?>
					<?= form_open('mahasiswa/edit_proses'); ?>
                    <form action="" method="post">
						<input type="text" name="nim" id="nim" class="form-control" value="<?= $mahasiswa[0]['nim'];?>" hidden>
                        <div class="form-group">
                          <label for="nama">Nama</label>
                          <input type="text" name="nama" id="nama" class="form-control" value="<?= $mahasiswa[0]['nama_mhs'];?>">
                        </div>
                        <div class="form-group">
                          <label for="kelas">Kelas</label>
                          <input type="kelas" name="kelas" id="kelas" class="form-control" value="<?= $mahasiswa[0]['kelas'];?>">
                        </div>
                        <button type="submit" name="submit" class="btn btn-primary float-right">Submit</button>
					</form>
					<?= form_close(); ?>
                </div>
            </div>
		</div>
	</div>
</div>
