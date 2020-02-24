<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
		<style>
		.badge{
			margin-left:3px;
		}
		</style>
    <title><?php echo $title; ?></title>
  </head>
  <body>

		<!-- navbar -->
		<div class="container-fluid">
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="#">📖</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="navbar-nav">
            <a class="nav-item nav-link active" href="<?php echo base_url();?>">⌚Absensi <span class="sr-only">(current)</span></a>
            <a class="nav-item nav-link" href="<?php echo base_url();?>mahasiswa">👨‍🎓Data Mahasiswa</a>
            <a class="nav-item nav-link" href="<?php echo base_url();?>dosen">🤵Data Dosen</a>
            <a class="nav-item nav-link" href="<?php echo base_url();?>matkul">📚Data Mata-Kuliah</a>
            </div>
        </div>
		</nav>
		</div>
