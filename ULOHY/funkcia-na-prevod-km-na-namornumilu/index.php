<?php

function prevodNaNMilu($vzdialenostKM)
{
    return ($vzdialenostKM * 1850);
}

$vzidialenostvMila = prevodNaNMilu(1.8 );
echo "$vzidialenostvMila";