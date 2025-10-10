<?php
echo "<h2>Tugas 5 - Array Multidimensi</h2>";

$Lstudents = array(
    array("Alex","220401","0812345678"),
    array("Bianca","220402","0812345687"),
    array("Candice","220403","0812345665")
);

array_push($Lstudents,
    array("David","220404","0812345600"),
    array("Erika","220405","0812345601"),
    array("Fiona","220406","0812345602"),
    array("George","220407","0812345603"),
    array("Helen","220408","0812345604")
);

echo "<table border='1' cellpadding='5'>";
echo "<tr><th>No</th><th>Nama</th><th>NIM</th><th>Mobile</th></tr>";
for ($i = 0; $i < count($Lstudents); $i++) {
    echo "<tr>";
    echo "<td>".($i+1)."</td>";
    echo "<td>".$Lstudents[$i][0]."</td>";
    echo "<td>".$Lstudents[$i][1]."</td>";
    echo "<td>".$Lstudents[$i][2]."</td>";
    echo "</tr>";
}
echo "</table>";
?>