<?php
echo "<h2>Tugas 4 - Looping Array Asosiatif</h2>";

$Lheight = array(
    "Andy"=>"176", "Barry"=>"165", "Charlie"=>"170",
    "David"=>"180","Erika"=>"168","Fiona"=>"160",
    "George"=>"175","Helen"=>"178"
);

echo "Data Lheight:<br>";
foreach ($Lheight as $key => $val) {
    echo "Key=$key, Value=$val<br>";
}

$Lweight = array("Andy"=>65, "Barry"=>60, "Charlie"=>70);
echo "<br>Data Lweight:<br>";
foreach ($Lweight as $key => $val) {
    echo "Key=$key, Value=$val kg<br>";
}
?>