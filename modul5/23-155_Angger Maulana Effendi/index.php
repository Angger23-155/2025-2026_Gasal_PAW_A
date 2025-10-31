<?php
include 'koneksi.php';
$query = mysqli_query($koneksi, "SELECT * FROM supplier ORDER BY id ASC");
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Data Master Supplier</title>
    <link rel="stylesheet" href="assets/style.css">
</head>
<body>
    <div class="container">
        <h2>Data Master Supplier</h2>
        <a href="tambah_supplier.php" class="btn btn-green">Tambah Data</a>

        <table>
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Telp</th>
                <th>Alamat</th>
                <th>Tindakan</th>
            </tr>
            <?php
            $no = 1;
            while ($row = mysqli_fetch_assoc($query)) {
            ?>
            <tr>
                <td><?= $no++; ?></td>
                <td><?= htmlspecialchars($row['nama']); ?></td>
                <td><?= htmlspecialchars($row['telp']); ?></td>
                <td><?= htmlspecialchars($row['alamat']); ?></td>
                <td>
                    <a href="edit_supplier.php?id=<?= $row['id']; ?>" class="btn btn-orange">Edit</a>
                    <a href="hapus_supplier.php?id=<?= $row['id']; ?>" class="btn btn-red" onclick="return confirm('Anda yakin akan menghapus supplier ini?')">Hapus</a>
                </td>
            </tr>
            <?php } ?>
        </table>
    </div>
</body>
</html>
