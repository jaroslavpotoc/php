<?php
include "header.php";
require "control-logins.php";
require "db.php";

$ean_kod = $_POST["ean_kod"];
$nazov = $_POST["nazov"];
$merna_jednotka = $_POST["merna_jednotka"];
$cela_flasa = $_POST["cela_flasa"];
$prazdna_flasa = $_POST["prazdna_flasa"];
$vaha_jednej_davky = $_POST["vaha_jednej_davky"];
$datum = date("Y-m-d"); // Aktuálny dátum
$cas = date("H:i:s"); // Aktuálny čas

$sql = "INSERT INTO udaje_tovar (ean_kod, nazov, merna_jednotka, cela_flasa, prazdna_flasa, vaha_jednej_davky, datum, cas) VALUES ($ean_kod, '$nazov', '$merna_jednotka', $cela_flasa, $prazdna_flasa, $vaha_jednej_davky, '$datum', '$cas')";

if (mysqli_query($conn, $sql)) {
    echo "Záznam bol úspešne uložený!";
} else {
    echo "Chyba!: " . $sql . "<br>" . mysqli_error($conn);
}

mysqli_close($conn);
include "back.php";
include "footer.php";
?>