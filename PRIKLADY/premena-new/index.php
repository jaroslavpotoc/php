<?php
// http://localhost/premena-new/index.php?x=1024

include "hlavicka.php";

echo "<h1>Premena jednotiek:</h1>";

if (isset($_GET["x"])) {
    //mam nastavene get x
	$x = $_GET["x"];
	$x = strip_tags($x);
    
	settype($x, "float");
	echo $x . " B = " . $x / 1024 . " kiB";

} else {
    //nemam get x
	echo "Hodnota nebola zadaná.";
}
include "pata.php";
?>