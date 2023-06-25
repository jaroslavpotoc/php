<?php

$mesiace = array("Januar", "Februar", "Marec", "April", "Maj");
    echo "Dni v mesiaci sú: " . $mesiace[0] .", ". $mesiace[1] .", ". $mesiace[2] .", ". $mesiace[3] .", ". $mesiace[4];
    echo "<br>";
    echo "<br>";
    var_dump($mesiace);
    echo "<br>";
    echo "<br>";
    echo "Dlžka polia mesiace je: ".count($mesiace); //Vypisuje obsha polia

    //Vypisujem obsah polia čitatelne pre uživatela
for ($i = 0; $i < count($mesiace); $i++) {
    echo "<br>";
    echo $i;
    }
$nubers = array(1.2, 5, 8, 9.3,10);
//TODO Sčitanie hodnot poľa numbers
$sum = 0;
for ($j = 0; $j < count($nubers); $j++) {
    //echo "<br><br>" . $nubers[$j];
    $sum += $nubers[$j];
    echo "<br>Celkovy sucet je: ".$sum;
}