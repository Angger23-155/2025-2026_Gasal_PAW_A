<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kasir Sederhana</title>
</head>
<body>
    <h2>Program Kasir Sederhana</h2>
    <form method="post" action="">
        <label>Pilih Menu:</label><br>
        <select name="menu">
            <option value="Nasi Goreng">Nasi Goreng - Rp15000</option>
            <option value="Mie Ayam">Mie Ayam - Rp12000</option>
            <option value="Soto Ayam">Soto Ayam - Rp10000</option>
            <option value="Es Teh">Es Teh - Rp5000</option>
            <option value="Kopi">Kopi - Rp7000</option>
        </select><br><br>

        <label>Jumlah Beli:</label>
        <input type="number" name="jumlah" min="1" required><br><br>

        <input type="submit" name="tambah" value="Tambahkan ke Keranjang">
        <input type="submit" name="selesai" value="Selesai & Hitung Total">
    </form>
    <hr>

<?php
session_start();

if (!isset($_SESSION['keranjang'])) {
    $_SESSION['keranjang'] = [];
}

$harga_menu = [
    "Nasi Goreng" => 15000,
    "Mie Ayam" => 12000,
    "Soto Ayam" => 10000,
    "Es Teh" => 5000,
    "Kopi" => 7000
];

// Tambah ke keranjang
if (isset($_POST['tambah'])) {
    $menu = $_POST['menu'];
    $jumlah = $_POST['jumlah'];
    $harga = $harga_menu[$menu];
    $subtotal = $harga * $jumlah;

    $_SESSION['keranjang'][] = [
        'menu' => $menu,
        'jumlah' => $jumlah,
        'subtotal' => $subtotal
    ];
}

// Tampilkan isi keranjang
if (!empty($_SESSION['keranjang'])) {
    echo "<h3>Daftar Belanja:</h3>";
    echo "<table border='1' cellpadding='5' cellspacing='0'>";
    echo "<tr><th>No</th><th>Menu</th><th>Jumlah</th><th>Subtotal</th></tr>";
    $no = 1;
    $total = 0;
    foreach ($_SESSION['keranjang'] as $item) {
        echo "<tr>";
        echo "<td>$no</td>";
        echo "<td>{$item['menu']}</td>";
        echo "<td>{$item['jumlah']}</td>";
        echo "<td>Rp " . number_format($item['subtotal'], 0, ',', '.') . "</td>";
        echo "</tr>";
        $total += $item['subtotal'];
        $no++;
    }
    echo "<tr><td colspan='3'><b>Total</b></td><td><b>Rp " . number_format($total, 0, ',', '.') . "</b></td></tr>";
    echo "</table>";
}

// Reset saat selesai
if (isset($_POST['selesai'])) {
    echo "<h3>Terima kasih telah berbelanja!</h3>";
    session_destroy();
}
?>
</body>
</html>