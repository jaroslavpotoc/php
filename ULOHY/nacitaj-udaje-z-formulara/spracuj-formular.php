<?php

$meno_studenta = $_POST["meno"];
echo "Meno študenta: " .$meno_studenta;

$datum_narodenia = $_POST["datum"];
$timestamp = strtotime($datum_narodenia);
$formattedDate = date("d.m.Y", $timestamp)
;echo "<br>Preformátovaný dátum narodenia je: ".$formattedDate;

$nastup_do_zamestania = $_POST["nastup"];
echo "<br>Nastup do zamestnania: " .$nastup_do_zamestania;

$znamko_zo_skusky = $_POST["znamka"];
echo "<br>Nastup do zamestnania: " .$znamko_zo_skusky;




