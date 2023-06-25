<?php

function mojaPrvaFunkcia($meno, $rok) {
    echo "Ahoj, volám sa " . $meno . " a mám " . $rok.  " rokov";
}
function sucetCisel( $a, $b) {
    $vysledok = $a + $b;
    return $vysledok;
}
//Volanie funkcie
mojaPrvaFunkcia("Lucia", 29);
echo "<br>";
echo "<br>";
$sum = sucetCisel(2500, 2500);
echo $sum;
echo "<br>";
echo "<br>";
$sum = sucetCisel(2000, 2500);
echo $sum;
echo "<br>";
echo "<br>";
$sum = sucetCisel(1500, 2500);
echo $sum;