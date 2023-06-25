<?php

$time = date("H");

if ($time < "10") {
    echo "Dobre ráno";
} elseif ($time < "20") {
    echo "Dobrý deň";
} else {
    echo "Dobrú noc";
}
