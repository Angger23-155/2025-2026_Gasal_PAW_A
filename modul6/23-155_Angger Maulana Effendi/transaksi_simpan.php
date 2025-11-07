<?php
include "config.php";

if (isset($_POST['simpan'])) {
    $pelanggan_id = $_POST['pelanggan_id'];
    $keterangan = $_POST['keterangan'];
    $barang_id = $_POST['barang_id'];
    $harga = $_POST['harga'];
    $qty = $_POST['qty'];
    $total = $_POST['total'];

    // Menghitung total keseluruhan
    $grand_total = array_sum($total);

    // Menyimpan data transaksi (master)
    $sql_master = "INSERT INTO transaksi (waktu_transaksi, keterangan, total, pelanggan_id)
                   VALUES (NOW(), '$keterangan', '$grand_total', '$pelanggan_id')";
    mysqli_query($conn, $sql_master);

    // Mengambil ID transaksi terakhir
    $transaksi_id = mysqli_insert_id($conn);

    // Menyimpan detail transaksi
    for ($i = 0; $i < count($barang_id); $i++) {
        $id_barang = $barang_id[$i];
        $h = $harga[$i];
        $q = $qty[$i];

        $sql_detail = "INSERT INTO transaksi_detail (transaksi_id, barang_id, harga, qty)
                       VALUES ('$transaksi_id', '$id_barang', '$h', '$q')";
        mysqli_query($conn, $sql_detail);
    }

    // Redirect ke nota
    header("Location: nota.php?id=$transaksi_id");
    exit;
}
?>
