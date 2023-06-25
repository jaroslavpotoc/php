<?php

function pocetPartnerov ($chlapci, $dievcata){
    if ($chlapci >= $dievcata){
        echo "Vsetky dievcata budu mat partnera";
    } else {
        echo "Niektore dievcata nebudu mat partnera";
    }
}

pocetPartnerov(10,10);