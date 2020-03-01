<div class="container">
    <div class="row mt-3">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <h3><?= $title; ?></h3>
                </div>
                <div class="card-body">  
						<?php if(validation_errors()):?>
                        <div class="alert alert-danger" role="alert">
                            <strong><?= validation_errors();?></strong>
                        </div>
                    <?php endif ?>

                    <form action="" method="post">
                      	<div class="form-group">
                      	  <label for="matkul">Nama Matkul</label> <br>
                      	  <select class="form-control" name="matkul" id="matkul">
								<?php foreach($matkul as $mtkl):?>
									<option value="<?= $mtkl['id'] ?>"><?= $mtkl['id']." - ".$mtkl['nama']; ?></option>
								<?php endforeach; ?>
							</select>
                      	</div>
						<div class="form-group">
                        <label for="dosen">Nama Dosen</label> <br>
							<select class="form-control" name="dosen" id="dosen">
								<?php foreach($dosen as $ds):?>
									<option value="<?= $ds['nip']; ?>"><?= $ds['nip']." - ".$ds['nama_dosen']; ?></option>
								<?php endforeach; ?>
							</select>
                      	</div>
						<div class="form-group">
						<label for="mhs">Nama Mahasiswa</label> <br>
							<select class="form-control" name="mhs" id="mhs">
								<?php foreach($mahasiswa as $mhs):?>
									<option value="<?= $mhs['nim']; ?>"><?= $mhs['nim']." - ".$mhs['nama_mhs']; ?></option>
								<?php endforeach; ?>
							</select>
						</div>
						<button type="submit" name="submit" class="btn btn-primary float-right">Absen</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
