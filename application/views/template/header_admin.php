<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://bootswatch.com/4/journal/bootstrap.min.css">
		<style>
		.badge{
			margin-left:3px;
		}
		</style>

<script
  src="https://code.jquery.com/jquery-3.4.1.min.js"
  integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
  crossorigin="anonymous"></script>
	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">
	<script type="text/javascript" src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>

    <title><?php echo $title; ?></title>
  </head>
  <body>

	<!-- navbar -->
	<div class="container-fluid">
		<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
			<div class="container">
				<a class="navbar-brand" href="#">📖</a>
				<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon"></span>
				</button>
				<div class="collapse navbar-collapse" id="navbarNavAltMarkup">
					<ul class="navbar-nav mr-auto">
						<li><a class="nav-item nav-link" href="<?= base_url();?>admin/index">Data User</a></li>
						<li><a class="nav-item nav-link" href="<?= base_url();?>admin/absensi">Data Absensi</a></li>
						<li><a class="nav-item nav-link" href="<?= base_url();?>admin/dosen">Data Dosen</a></li>
						<li><a class="nav-item nav-link" href="<?= base_url();?>admin/matkul">Data Matkul</a></li>
						<li><a class="nav-item nav-link" href="<?= base_url();?>admin/mahasiswa">Data Mahasiswa</a></li>
					</ul>
					<ul class="navbar-nav ml-auto">
						<li><a class="nav-item nav-link ml-auto" href="<?php echo base_url();?>login/logout">Logout</a></li>
					</ul>
				</div>	
			</div>
		</nav>
	</div>
