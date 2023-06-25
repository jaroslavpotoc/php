<?php
$favoritColor = "Červená";

if(!empty($favoritColor)) {
    if ($favoritColor == "Červená" || $favoritColor == "Zelená" || $favoritColor == "Žltá")
        echo "Super, tvoja obľubená farba je " . $favoritColor . ".\n";
} else {
    echo "Je mi ľúto, nezdal si farbu.\n";
}

switch ($favoritColor) {
    case "Zelená":
        echo $favoritColor . "\n" . "Toto je moja obľubena faraba!";
        break;
    case "Červená":
        echo $favoritColor . "\n" . "Super aj táto je moja obľubená!";
        break;
    case "Žltá":
        echo $favoritColor . "\n" . "Sice by som si ju neobliekol ale je to tiež obľubená!";
        break;
    default:
        echo $favoritColor . "\n" . "Túto farbu nemam rád!!";
}