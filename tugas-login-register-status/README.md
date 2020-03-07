# Tugas: Login, Register, Status

## Studi Kasus

Fungsi ini akan mengatur user yang akan login / register, dengan menggunakan multi user \(Admin\). Dengan gambaran jika user sudah register maka dalam table 'user' akan diset nonaktif, ketika itu admin dapat mengkontrol bila user bisa aktif / tidak.

## Tabel User

![Tabel User](../.gitbook/assets/image.png)

## Set Up

Sebelum membuat ketiganya diperlukan tambahan view untuk jadi template Login, Register dan Admin.

header\_non\_navbar untuk login dan register.

```markup
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://bootswatch.com/4/darkly/bootstrap.min.css">
		<style>
		.badge{
			margin-left:3px;
		}
		</style>
    <title><?php echo $title; ?></title>
  </head>
  <body>

```

header\_admin untuk halaman admin

```markup
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://bootswatch.com/4/darkly/bootstrap.min.css">
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
		<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
			<div class="container">
				<a class="navbar-brand" href="#">📖</a>
				<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon"></span>
				</button>
				<div class="collapse navbar-collapse" id="navbarNavAltMarkup">
					<div class="navbar-nav">
						<a class="nav-item nav-link" href="<?= base_url();?>admin/index">Data User</a>
						<a class="nav-item nav-link" href="<?php echo base_url();?>login/logout">Logout</a>
					</div>
				</div>	
			</div>
		</nav>
	</div>

```



