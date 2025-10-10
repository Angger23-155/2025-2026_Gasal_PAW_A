<?php
echo "<h2>Tugas 7 - Daftar Produk</h2>";

$produk = array(
    "Kopi"=>15000,
    "Teh"=>10000,
    "Susu"=>20000,
    "Roti"=>12000,
    "Air Mineral"=>5000
);

foreach($produk as $item => $harga){
    echo "$item : Rp ".number_format($harga,0,",",".")."<br>";
}
?>