<div class="container">
	<div class="row">
		<div class="col-md-10 mt-5">
		<div class="card ml-5">
                <div class="card-header">
                    Form Tambah Data Dosen
				</div>
                <div class="card-body">
					<?= form_open('dosen/edit_proses'); ?>
                    <form action="" method="post">
						<input type="text" name="nip" id="nip" class="form-control" value="<?= $matkul[0]['nip'];?>" hidden>
                        <div class="form-group">
                          <label for="nama">Nama</label>
                          <input type="text" name="nama" id="nama" class="form-control" value="<?= $matkul[0]['nama_dosen'];?>">
                        </div>
                        <button type="submit" name="submit" class="btn btn-primary float-right">Submit</button>
					</form>
					<?= form_close(); ?>
                </div>
            </div>
		</div>
	</div>
</div>
