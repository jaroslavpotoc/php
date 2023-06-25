<?php
$vek = array("Peter" => "35", "Ben" => "37", "Joe" => "43");
echo "<br>Joe is " . $vek["Joe"] . " years old.";
echo "<br>";
foreach ($vek as $kluc => $hodnota) {
    echo "Kľúč poľa je: " . $kluc;
    echo " a jeho hodnota je: " . $hodnota;
    echo "<br>";
}