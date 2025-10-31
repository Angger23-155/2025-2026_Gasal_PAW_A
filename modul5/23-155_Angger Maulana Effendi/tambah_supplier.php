<?php
include 'koneksi.php';

if (isset($_POST['simpan'])) {
    $nama   = $_POST['nama'];
    $telp   = $_POST['telp'];
    $alamat = $_POST['alamat'];

    $query = "INSERT INTO supplier (nama, telp, alamat) VALUES ('$nama', '$telp', '$alamat')";
    $result = mysqli_query($koneksi, $query);

    if ($result) {
        header("Location: index.php");
        exit;
    } else {
        echo "Gagal menambahkan data: " . mysqli_error($koneksi);
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Tambah Data Supplier</title>
    <link rel="stylesheet" href="assets/style.css">
</head>
<body>
    <div class="container">
        <h2>Tambah Data Master Supplier Baru</h2>
        <form method="POST">
            <label>Nama</label><br>
            <input type="text" name="nama" required><br>

            <label>Telp</label><br>
            <input type="text" name="telp" required><br>

            <label>Alamat</label><br>
            <input type="text" name="alamat" required><br>

            <button type="submit" name="simpan" class="btn btn-green">Simpan</button>
            <a href="index.php" class="btn btn-red">Batal</a>
        </form>
    </div>
</body>
</html>
