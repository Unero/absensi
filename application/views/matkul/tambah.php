<div class="container">
	<div class="row">
		<div class="col-md-10 mt-5">
		<div class="card ml-5">
                <div class="card-header">
                    Form Tambah Data Mahasiswa
				</div>
                <div class="card-body">
                    <form action="" method="post">
                        <div class="form-group">
                          <label for="nama">Nama</label>
                          <input type="text" name="nama" id="nama" class="form-control" placeholder="Nama Mata Kuliah">
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
						  <input type="number" name="sks" id="sks" class="form-control" placeholder="Masukkan jumlah SKS">
						</div>
						<div class="form-group">
						  <label for="jam">Jam</label>
						  <input type="number" name="jam" id="jam" class="form-control" placeholder="Masukkan jumlah jam">
						</div>
                        <button type="submit" name="submit" class="btn btn-primary float-right">Submit</button>
                    </form>
                </div>
            </div>
		</div>
	</div>
</div>
