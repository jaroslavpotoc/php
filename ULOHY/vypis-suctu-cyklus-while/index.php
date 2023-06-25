<?php

$n = 345;
$sucet = 0;
while ($n % 10 != 0){
    $sucet += $n % 10;
    $n = $n/10;
}

echo $sucet;