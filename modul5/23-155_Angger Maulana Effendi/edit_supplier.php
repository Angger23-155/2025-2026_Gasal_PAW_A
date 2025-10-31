<?php
include 'koneksi.php';
$id = $_GET['id'];

$query = mysqli_query($koneksi, "SELECT * FROM supplier WHERE id='$id'");
$data = mysqli_fetch_assoc($query);

if (isset($_POST['update'])) {
    $nama = $_POST['nama'];
    $telp = $_POST['telp'];
    $alamat = $_POST['alamat'];

    mysqli_query($koneksi, "UPDATE supplier SET nama='$nama', telp='$telp', alamat='$alamat' WHERE id='$id'");
    header("Location: index.php");
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Edit Data Supplier</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h2>Edit Data Master Supplier</h2>
        <form method="POST">
            <label>Nama</label><br>
            <input type="text" name="nama" value="<?= $data['nama']; ?>" required><br>

            <label>Telp</label><br>
            <input type="text" name="telp" value="<?= $data['telp']; ?>" required><br>

            <label>Alamat</label><br>
            <input type="text" name="alamat" value="<?= $data['alamat']; ?>" required><br>

            <button type="submit" name="update" class="btn btn-green">Update</button>
            <a href="index.php" class="btn btn-red">Batal</a>
        </form>
    </div>
</body>
</html>
