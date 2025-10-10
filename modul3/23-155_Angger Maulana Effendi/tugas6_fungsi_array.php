<?php
echo "<h2>Tugas 6 - Fungsi Array</h2>";

$arr1 = array("A", "B", "C");
$arr2 = array("D", "E", "F");

array_push($arr1, "G", "H");
echo "array_push: ";
print_r($arr1);
echo "<br>";

$merged = array_merge($arr1, $arr2);
echo "array_merge: ";
print_r($merged);
echo "<br>";

$height = array("Andy"=>"176","Barry"=>"165","Charlie"=>"170");
$values = array_values($height);
echo "array_values: ";
print_r($values);
echo "<br>";

$keySearch = array_search("Charlie", array_keys($height));
echo "Index 'Charlie' pada array keys height: $keySearch<br>";

$filtered = array_filter($height, function($val){
    return $val > 170;
});
echo "array_filter (>170): ";
print_r($filtered);
echo "<br>";

sort($arr2);
echo "sort ascending: ";
print_r($arr2);
echo "<br>";

rsort($arr2);
echo "sort descending: ";
print_r($arr2);
?>