<?php
$cars = array("Volvo", "BMW", "Toyota", "Škoda");
echo "I like " . $cars[3];
echo "<br>";
echo count($cars);
echo "<br>";

$arrlength = count($cars);
for ($x = 0; $x < $arrlength; $x++){
    echo $cars[$x];
    echo "<br>";
}