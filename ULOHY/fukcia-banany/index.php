<?php

function opiciaRodina ($bananNaDen, $dovezene){
    $budeStacit = false;
    if (($dovezene/7)>=$bananNaDen){
        $budeStacit = true;
    }
    return $budeStacit;
}

$vysledok = opiciaRodina(50,40);
if($vysledok) {
    echo "Bananov bude dost";
}else{
    echo "Bananov bude malo";
}