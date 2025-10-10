<?php
echo "<h2>Tugas 8 - Rata-rata Nilai Mahasiswa</h2>";

$nilai = array(
    array("Andi", 80, 75, 90),
    array("Budi", 70, 85, 88),
    array("Citra", 95, 80, 85)
);

foreach ($nilai as $data) {
    $nama = $data[0];
    $rata = ($data[1] + $data[2] + $data[3]) / 3;
    echo "Nama: $nama, Rata-rata: ".round($rata,2)."<br>";
}
?>