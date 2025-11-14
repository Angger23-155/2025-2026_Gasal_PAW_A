<?php include 'koneksi.php'; ?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Laporan Penjualan</title>
  <link rel="stylesheet" href="style.css">
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body>
<?php
if (isset($_GET['tgl_awal']) && isset($_GET['tgl_akhir'])) {
  $tgl_awal = $_GET['tgl_awal'];
  $tgl_akhir = $_GET['tgl_akhir'];

  // Ambil data total penerimaan per hari
  $query = mysqli_query($conn, "
    SELECT DATE(t.waktu_transaksi) AS tanggal,
           SUM(td.harga * td.qty) AS total_harian
    FROM transaksi t
    JOIN transaksi_detail td ON t.id = td.transaksi_id
    WHERE DATE(t.waktu_transaksi) BETWEEN '$tgl_awal' AND '$tgl_akhir'
    GROUP BY DATE(t.waktu_transaksi)
    ORDER BY DATE(t.waktu_transaksi)
  ");

  $tanggal = [];
  $total = [];
  $total_keseluruhan = 0;

  while ($row = mysqli_fetch_assoc($query)) {
    $tanggal[] = $row['tanggal'];
    $total[] = $row['total_harian'];
    $total_keseluruhan += $row['total_harian'];
  }

  // Hitung jumlah pelanggan unik
  $q_pelanggan = mysqli_query($conn, "
    SELECT COUNT(DISTINCT pelanggan_id) AS total_pelanggan
    FROM transaksi
    WHERE DATE(waktu_transaksi) BETWEEN '$tgl_awal' AND '$tgl_akhir'
  ");
  $pelanggan = mysqli_fetch_assoc($q_pelanggan)['total_pelanggan'];
?>
    <h3 class="judul-rekap">
    Rekap Laporan Penjualan <?= date('d F Y', strtotime($tgl_awal)); ?> sampai <?= date('d F Y', strtotime($tgl_akhir)); ?>
    </h3>
    <hr>
  <!-- Tombol Aksi -->
  <div class="top-buttons">
    <a href="index.php" class="btn-blue">< Kembali</a>
    <div class="sub-buttons">
      <button onclick="window.print()" class="btn-orange">Print</button>
      <a href="export_excel.php?tgl_awal=<?= $tgl_awal; ?>&tgl_akhir=<?= $tgl_akhir; ?>" class="btn-orange">Export Excel</a>
    </div>
  </div>

  <!-- Grafik Penjualan -->
  <section id="grafik">
    <h3>Grafik Penjualan</h3>
    <canvas id="chartPenjualan" width="400" height="150"></canvas>
    <script>
      const ctx = document.getElementById('chartPenjualan');
      new Chart(ctx, {
        type: 'bar',
        data: {
          labels: <?php echo json_encode($tanggal); ?>,
          datasets: [{
            label: 'Total Penerimaan (Rp)',
            data: <?php echo json_encode($total); ?>,
            backgroundColor: 'rgba(54, 162, 235, 0.7)', // biru
            borderColor: 'rgba(54, 162, 235, 1)', // biru tua
            borderWidth: 1
          }]
        },
        options: {
          responsive: true,
          scales: {
            y: { beginAtZero: true, title: { display: true, text: 'Rupiah' }},
            x: { title: { display: true, text: 'Tanggal Transaksi' }}
          }
        }
      });
    </script>
  </section>

  <!-- Rekap Penjualan -->
  <section id="rekap">
    <h3>Rekap Total Penerimaan</h3>
    <table>
      <tr><th>No</th><th>Tanggal</th><th>Total Penerimaan (Rp)</th></tr>
      <?php
        $no = 1;
        foreach ($tanggal as $i => $tgl) {
          echo "<tr>
                  <td>{$no}</td>
                  <td>{$tgl}</td>
                  <td>" . number_format($total[$i], 0, ',', '.') . "</td>
                </tr>";
          $no++;
        }
      ?>
    </table>
  </section>

  <!-- Total Keseluruhan -->
  <section id="total">
    <h3>Total Keseluruhan</h3>
    <table class="table-total">
      <tr>
        <th>Jumlah Pelanggan</th>
        <th>Total Pendapatan</th>
      </tr>
      <tr>
        <td><?= $pelanggan; ?></td>
        <td>Rp <?= number_format($total_keseluruhan, 0, ',', '.'); ?></td>
      </tr>
    </table>
  </section>

<?php
} else {
  echo "<p style='text-align:center;'>Silakan pilih rentang tanggal transaksi terlebih dahulu.</p>";
}
?>
</body>
</html>
