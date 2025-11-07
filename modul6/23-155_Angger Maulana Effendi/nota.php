<?php
include "config.php";

if (!isset($_GET['id'])) {
    die("ID transaksi tidak ditemukan!");
}
$id = $_GET['id'];

// Select Data master transaksi
$q = mysqli_query($conn, "
    SELECT t.*, p.nama AS nama_pelanggan
    FROM transaksi t
    JOIN pelanggan p ON t.pelanggan_id = p.id
    WHERE t.id = '$id'
");
$transaksi = mysqli_fetch_assoc($q);

// Select Data detail barang
$detail = mysqli_query($conn, "
    SELECT d.*, b.nama_barang
    FROM transaksi_detail d
    JOIN barang b ON d.barang_id = b.id
    WHERE d.transaksi_id = '$id'
");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nota Transaksi #<?= $id ?></title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="container">
<h2>Toko Serba Ada</h2>
<h3>Nota Transaksi #<?= $id ?></h3>

<p><b>Tanggal:</b> <?= $transaksi['waktu_transaksi'] ?><br>
<b>Pelanggan:</b> <?= $transaksi['nama_pelanggan'] ?><br>
<b>Keterangan:</b> <?= $transaksi['keterangan'] ?></p>

<table>
    <thead>
        <tr>
            <th>No</th>
            <th>Nama Barang</th>
            <th>Harga</th>
            <th>Qty</th>
            <th>Subtotal</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $no = 1;
        while ($d = mysqli_fetch_assoc($detail)) {
            $subtotal = $d['harga'] * $d['qty'];
            echo "
            <tr>
                <td>$no</td>
                <td>{$d['nama_barang']}</td>
                <td>{$d['harga']}</td>
                <td>{$d['qty']}</td>
                <td>{$subtotal}</td>
            </tr>";
            $no++;
        }
        ?>
        <tr>
            <td colspan='4' class='total'>Total Keseluruhan</td>
            <td><b><?= $transaksi['total'] ?></b></td>
        </tr>
    </tbody>
</table>

<center>
    <button onclick="window.print()">🖨️ Cetak Nota</button>
    <a href="index.php"><button>Kembali ke Menu</button></a>
</center>
</div>

</body>
</html>
