<?php
$host = "localhost";
$user = "root";
$pass = "passwordbaru";
$db   = "penjualan";

$koneksi = mysqli_connect($host, $user, $pass, $db);

if (!$koneksi) {
    die("Koneksi database gagal: " . mysqli_connect_error());
}
?>
