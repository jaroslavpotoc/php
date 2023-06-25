<?php

$days = array("Pondelok", "Utorok", "Streda", "Štvrtok", "Piatok", "Sobota", "Nedeľa");
echo "Najradšej mám deň v týždni: " . $days[4];
echo "<br>";
echo "<br>";
echo "Všetky dni v týždni ktoré poznáme:";
echo "<br>";

$pocetVPoli = count($days);
for ($i = 0; $i < $pocetVPoli; $i++) {
    echo $days[$i];
    echo "<br>";
}