---
description: Langkah awal dalam membuat project ini
---

# Setting Project

## Requirement

* [ ] Menginstall webserver \(Apache\) bisa XAMPP dan sebagainya
* [ ] Code Igniter 3 [https://codeigniter.com/en/download](https://codeigniter.com/en/download)
* [ ] Teks Editor

## Meng-_config_ Project

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

Selanjutnya akan dibahas pembuatan View

