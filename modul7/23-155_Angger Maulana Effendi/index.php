<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Halaman Utama - Laporan Penjualan</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
  <header>
    <h2>SELAMAT DATANG DI SISTEM LAPORAN PENJUALAN</h2>
  </header>

  <div class="home-container">
    <p>Pilih rentang waktu untuk melihat laporan penjualan berdasarkan rentang waktu tertentu.</p>

  <!-- Filter tanggal -->
  <form method="GET" action="report.php">
    <label>Dari Tanggal:</label>
    <input type="date" name="tgl_awal" required>
    <label>Sampai Tanggal:</label>
    <input type="date" name="tgl_akhir" required>
    <button type="submit" class="btn-tampilkan">Tampilkan</button>
  </form>
  <hr>
  </div>
</body>
</html>