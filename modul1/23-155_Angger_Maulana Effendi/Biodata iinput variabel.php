<!DOCTYPE html>
<html>
<head>
<title>Biodata Fleksibel</title>
</head>
<body>
<?php
$nama    = $_GET['nama'] ?? 'Tidak ada';
$nim     = $_GET['nim'] ?? 'Tidak ada';
$jurusan = $_GET['jurusan'] ?? 'Tidak ada';
$univ    = $_GET['univ'] ?? 'Tidak ada';
?>
<h2>Biodata Mahasiswa</h2>
<table border="1" cellpadding="5">
  <tr><td>Nama</td><td><?php echo $nama; ?></td></tr>
  <tr><td>NIM</td><td><?php echo $nim; ?></td></tr>
  <tr><td>Jurusan</td><td><?php echo $jurusan; ?></td></tr>
  <tr><td>Universitas</td><td><?php echo $univ; ?></td></tr>
</table>
</body>
</html>
