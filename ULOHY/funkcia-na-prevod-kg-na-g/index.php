<?php

function prevodNaG($hmotnostVKG){
    return ($hmotnostVKG*1000);
}
$hmotnostvG = prevodNaG(15);
echo "$hmotnostvG";