<?php
echo "<h2>Tugas 1 - Array Terindeks</h2>";

$Lfruits = array("Avocado", "Blueberry", "Cherry");
echo "Data awal: ";
print_r($Lfruits);
echo "<br>";

array_push($Lfruits, "Durian", "Mango", "Apple", "Banana", "Watermelon");
echo "Setelah tambah 5 data: ";
print_r($Lfruits);
echo "<br>";

$indeksTertinggi = array_key_last($Lfruits);
echo "Indeks tertinggi saat ini: $indeksTertinggi<br>";

unset($Lfruits[1]);
echo "Setelah hapus indeks 1 (Blueberry): ";
print_r($Lfruits);
echo "<br>";
$indeksTertinggi = array_key_last($Lfruits);
echo "Indeks tertinggi setelah hapus: $indeksTertinggi<br>";

$Lvegies = array("Bayam", "Wortel", "Sawi");
echo "Array Lvegies: ";
print_r($Lvegies);
?>