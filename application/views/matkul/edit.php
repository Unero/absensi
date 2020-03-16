<div class="container">
	<div class="row">
		<div class="col-md-10 mt-5">
		<div class="card ml-5">
                <div class="card-header">
                    Form Tambah Data Mahasiswa
				</div>
                <div class="card-body">
					<?=
					form_open('matkul/edit_proses');
					?>
                    <form action="" method="post">
						<input type="text" name="id" id="id" class="form-control" value="<?= $matkul[0]['id'];?>" hidden>
                        <div class="form-group">
                          <label for="nama">Nama</label>
                          <input type="text" name="nama" id="nama" class="form-control" value="<?= $matkul[0]['nama'];?>">
						</div>
						<div class="form-group">
						  <label for="dosen">Dosen</label>
						  <select class="form-control" name="dosen" id="dosen">
							<?php foreach ($dosen as $dsn) {?>
								<option value="<?=$dsn['nama_dosen'];?>"><?=$dsn['nama_dosen'];?></option>
								<?php
							}?>
						  </select>
						</div>
						<div class="form-group">
						  <label for="sks">SKS</label>
						  <input type="number" name="sks" id="sks" class="form-control" value="<?= $matkul[0]['sks'];?>">
						</div>
						<div class="form-group">
						  <label for="jam">Jam</label>
						  <input type="number" name="jam" id="jam" class="form-control" value="<?= $matkul[0]['jam'];?>">
						</div>
                        <button type="submit" name="submit" class="btn btn-primary float-right">Submit</button>
					</form>
					<?=
						form_close();
					?>
                </div>
            </div>
		</div>
	</div>
</div>
