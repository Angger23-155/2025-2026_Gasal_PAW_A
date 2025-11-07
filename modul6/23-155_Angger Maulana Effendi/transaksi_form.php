<?php
include "config.php";

// Mengambil data pelanggan dan barang
$pelanggan = mysqli_query($conn, "SELECT * FROM pelanggan");
$barang = mysqli_query($conn, "SELECT * FROM barang");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Input Transaksi Penjualan</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="container">
<h2>Form Transaksi Penjualan</h2>
<hr>

<form method="POST" action="transaksi_simpan.php">
    <label>Pelanggan:</label>
    <select name="pelanggan_id" required>
        <option value="">-- Pilih Pelanggan --</option>
        <?php while($p = mysqli_fetch_assoc($pelanggan)) { ?>
            <option value="<?= $p['id'] ?>"><?= $p['nama'] ?></option>
        <?php } ?>
    </select>
    <br><br>

    <label>Keterangan:</label><br>
    <textarea name="keterangan" cols="50" rows="3"></textarea><br><br>

    <table id="detailBarang">
        <thead>
            <tr>
                <th>Barang</th>
                <th>Harga</th>
                <th>Qty</th>
                <th>Total</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>
                    <select name="barang_id[]" onchange="updateHarga(this)" required>
                        <option value="">-- Pilih Barang --</option>
                        <?php
                        mysqli_data_seek($barang, 0);
                        while($b = mysqli_fetch_assoc($barang)) {
                            echo "<option value='{$b['id']}' data-harga='{$b['harga']}'>{$b['nama_barang']}</option>";
                        }
                        ?>
                    </select>
                </td>
                <td><input type="number" name="harga[]" readonly></td>
                <td><input type="number" name="qty[]" value="1" min="1" onchange="updateTotal(this)"></td>
                <td><input type="number" name="total[]" readonly></td>
                <td><button type="button" onclick="hapusBaris(this)">Hapus</button></td>
            </tr>
        </tbody>
    </table>

    <button type="button" onclick="tambahBaris()">+ Tambah Barang</button>
    <br><br>
    <button type="submit" name="simpan">Simpan Transaksi</button>
</form>
</div>

<script>
function updateHarga(select) {
    const harga = select.options[select.selectedIndex].dataset.harga;
    const row = select.closest("tr");
    row.querySelector("input[name='harga[]']").value = harga;
    updateTotal(row.querySelector("input[name='qty[]']"));
}

function updateTotal(inputQty) {
    const row = inputQty.closest("tr");
    const harga = parseFloat(row.querySelector("input[name='harga[]']").value || 0);
    const qty = parseInt(inputQty.value || 0);
    row.querySelector("input[name='total[]']").value = harga * qty;
}

function tambahBaris() {
    const table = document.getElementById("detailBarang").querySelector("tbody");
    const row = table.rows[0].cloneNode(true);
    row.querySelectorAll("input").forEach(i => i.value = "");
    table.appendChild(row);
}

function hapusBaris(btn) {
    const table = document.getElementById("detailBarang").querySelector("tbody");
    if (table.rows.length > 1) btn.closest("tr").remove();
}
</script>
</body>
</html>