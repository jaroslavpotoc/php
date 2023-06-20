<?php

setlocale(LC_ALL, "sk_SK"); // Zmeni desatinne cisla akceptovatelne pre slovenskeho pouzivatela

$datum_narodenia = "03.03.2000";
$znamka = 1.5;
$znamka = str_replace(".", ",", $znamka);
$od_kedy = "septembra 2022" ;

echo "Študent Jozef Mrkvička sa narodil ".$datum_narodenia;
echo ", z maturitnej skúšky ma známku ".$znamka;
echo " a od .$od_kedy";
echo " nastúpi do noveho zamestnania ako PHP programatór";
echo "<br>";
echo "<br> V Bratislave dňa " .date("d.m.Y");
