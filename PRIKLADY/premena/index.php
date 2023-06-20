<?php
// http://localhost/premena/index.php?x=1024

include "hlavicka.php";
echo "<h1>Premena jednotiek:</h1>";
$mojax = $_GET["x"];
echo $mojax . " B = " . $mojax / 1024 . " KiB";
include "pata.php";
?>