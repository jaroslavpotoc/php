<?php
function dostPletiva ($stranaA, $stranaB, $dlzkaPletiva){
    $obvod = 2*($stranaA + $stranaB);
    if ($obvod < $dlzkaPletiva){
        return true;
    }else {
        return false;
    }
}

if (dostPletiva(2,3343,124254)){
    echo "Pletiva bude dost";
} else {
    echo "treba dokupit pletivo";
}