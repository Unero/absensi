---
description: Langkah awal dalam membuat project ini
---

# Setting Project

## Requirement

* [ ] Menginstall webserver \(Apache\). cth: XAMPP, MAMP, AMPPS
* [ ] Code Igniter 3 [https://codeigniter.com/en/download](https://codeigniter.com/en/download)
* [ ] Teks Editor

## Konfigurasi Project

Dalam folder root / utama buat file .htaccess yang berisi

```text
RewriteEngine On
RewriteCond %{REQUEST_FILENAME} !-f
RewriteCond %{REQUEST_FILENAME} !-d
RewriteRule ^(.*)$ index.php/$1 [L]
```

Lalu arahkan Editor untuk membuka folder application &gt; config. Dalam config.php ganti dan cari beberapa baris code menjadi seperti berikut

```text
[...]
$config['base_url'] = 'http://localhost/absensi/';
$config['index_page'] = '';
[...]
```

Buka routes.php pada folder config dan ganti baris kode berikut

```text
$route['default_controller'] = 'Absensi';
```

Tetap pada folder config buka autoload.php dan ganti baris kode berikut

```text
$autoload['helper'] = array('url');
```

## Setting database

Pada folder config buka database.php, cari dan ganti baris kode berikut sesuai pengaturan webserver kalian. Sebelumnya buat database bernama absensi di mysql.

```text
  'hostname' => 'localhost',
    'username' => username kalian,
    'password' => password kalian,
    'database' => 'absensi',
```

## Membuat Template

Karena nantinya view akan banyak akan lebih mudah dan code makin ringkas, dalam pembuatan aplikasi ini dibuat template header dan footer. Yang akan dibuat di folder view, jadi pada folder view buat folder lagi bernama template.

Isi dari header.php

```php
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
            <a class="nav-item nav-link active" href="<?php echo base_url();?>">⌚Absensi <span class="sr-only">(current)</span></a>
            <a class="nav-item nav-link" href="<?php echo base_url();?>mahasiswa">👨‍🎓Data Mahasiswa</a>
            <a class="nav-item nav-link" href="<?php echo base_url();?>dosen">🤵Data Dosen</a>
            <a class="nav-item nav-link" href="<?php echo base_url();?>matkul">📚Data Mata-Kuliah</a>
            </div>
        </div>    
                </div>
        </nav>
        </div>
```

Isi dari footer.php

```php
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
  </body>
</html>
```

