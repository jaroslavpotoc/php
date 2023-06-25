<?php

function auto($cenaAutomobilu, $sumu){
    $pocetMesiacov = $cenaAutomobilu / $sumu;
    if ($pocetMesiacov <= 18) {
        echo "Auto je lacne";
    } else {
        echo "Auto je drahe";
    }
}

auto(14000,500);