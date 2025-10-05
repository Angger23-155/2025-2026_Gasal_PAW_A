<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Grade Nilai Mahasiswa</title>
</head>
<body>
        <h2>Menentukan Grade Nilai Mahasiswa</h2>
    <form method="post" action="">
        Masukkan Nilai (0-100): <input type="number" name="nilai" min="0" max="100" required>
        <input type="submit" name="cek" value="Cek Grade">
    </form>
    <br>

<?php
if (isset($_POST['cek'])) {
    $nilai = $_POST['nilai'];

    if ($nilai >= 85) {
        $grade = "A";
        $keterangan = "Sangat Baik";
    } elseif ($nilai >= 70) {
        $grade = "B";
        $keterangan = "Baik";
    } elseif ($nilai >= 55) {
        $grade = "C";
        $keterangan = "Cukup";
    } elseif ($nilai >= 40) {
        $grade = "D";
        $keterangan = "Kurang";
    } else {
        $grade = "E";
        $keterangan = "Gagal";
    }

    echo "<h3>Hasil Penilaian</h3>";
    echo "Nilai Anda: <b>$nilai</b><br>";
    echo "Grade: <b>$grade</b><br>";
    echo "Keterangan: <b>$keterangan</b>";
}
?>
</body>
</html>