<?php
include 'koneksi.php';

header("Content-type: application/vnd-ms-excel");
header("Content-Disposition: attachment; filename=Laporan_Penjualan.xls");

$tgl_awal = $_GET['tgl_awal'];
$tgl_akhir = $_GET['tgl_akhir'];

// Rekap
$query = mysqli_query($conn, "
  SELECT DATE(t.waktu_transaksi) AS tanggal,
         SUM(td.harga * td.qty) AS total_harian
  FROM transaksi t
  JOIN transaksi_detail td ON t.id = td.transaksi_id
  WHERE DATE(t.waktu_transaksi) BETWEEN '$tgl_awal' AND '$tgl_akhir'
  GROUP BY DATE(t.waktu_transaksi)
  ORDER BY DATE(t.waktu_transaksi)
");

// Total pelanggan
$q_pelanggan = mysqli_query($conn, "
  SELECT COUNT(DISTINCT pelanggan_id) AS total_pelanggan
  FROM transaksi
  WHERE DATE(waktu_transaksi) BETWEEN '$tgl_awal' AND '$tgl_akhir'
");
$pelanggan = mysqli_fetch_assoc($q_pelanggan)['total_pelanggan'];

$total_keseluruhan = 0;
?>
<h2>Laporan Penjualan (<?= $tgl_awal; ?> s/d <?= $tgl_akhir; ?>)</h2>
<table border="1" cellpadding="5">
  <tr><th>No</th><th>Tanggal</th><th>Total Penerimaan (Rp)</th></tr>
  <?php $no=1; while($row=mysqli_fetch_assoc($query)){ 
    $total_keseluruhan += $row['total_harian']; ?>
  <tr>
    <td><?= $no++; ?></td>
    <td><?= $row['tanggal']; ?></td>
    <td><?= number_format($row['total_harian'], 0, ',', '.'); ?></td>
  </tr>
  <?php } ?>
</table>

<br>
<table border="1" cellpadding="5">
  <tr><th>Jumlah Pelanggan</th><th>Total Pendapatan</th></tr>
  <tr>
    <td><?= $pelanggan; ?></td>
    <td>Rp <?= number_format($total_keseluruhan, 0, ',', '.'); ?></td>
  </tr>
</table>