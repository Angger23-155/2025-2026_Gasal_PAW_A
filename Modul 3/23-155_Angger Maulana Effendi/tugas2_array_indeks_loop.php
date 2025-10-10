<?php
echo "<h2>Tugas 2 - Looping Array Terindeks</h2>";

$Lfruits = array("Avocado", "Blueberry", "Cherry");

for ($i = 0; $i < 5; $i++) {
    $Lfruits[] = "Buah" . ($i + 1);
}

$panjang = count($Lfruits);
echo "Panjang array Lfruits: $panjang<br>";

for ($i = 0; $i < $panjang; $i++) {
    echo "Lfruits[$i] = ".$Lfruits[$i]."<br>";
}

$Lvegies = array("Bayam", "Wortel", "Sawi");
echo "<br>Array Lvegies:<br>";
for ($i = 0; $i < count($Lvegies); $i++) {
    echo "Lvegies[$i] = ".$Lvegies[$i]."<br>";
}
?>