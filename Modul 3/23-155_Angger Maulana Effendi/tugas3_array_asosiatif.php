<?php
echo "<h2>Tugas 3 - Array Asosiatif</h2>";

$Lheight = array("Andy"=>"176", "Barry"=>"165", "Charlie"=>"170");
echo "Andy is ".$Lheight["Andy"]." cm tall.<br>";

$Lheight += array(
    "David"=>"180",
    "Erika"=>"168",
    "Fiona"=>"160",
    "George"=>"175",
    "Helen"=>"178"
);
echo "Setelah tambah data: ";
print_r($Lheight);
echo "<br>";

unset($Lheight["Barry"]);
echo "Setelah hapus Barry: ";
print_r($Lheight);
echo "<br>";

$Lweight = array("Andy"=>65, "Barry"=>60, "Charlie"=>70);
$keys = array_keys($Lweight);
echo "Data ke-2 dari Lweight: ".$Lweight[$keys[1]]." kg<br>";
?>