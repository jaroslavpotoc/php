<?php
include "header.php";
require "control-logins.php";
require "db.php";
echo "<h1>ULOŽENÝ UPRAVENÝ ZÁZNAM | Važenia alkoholu</h1>";

$id = $_POST['id'];
$ean_kod = $_POST["ean_kod"];
$nazov = $_POST["nazov"];
$merna_jednotka = $_POST["merna_jednotka"];
$cela_flasa = $_POST["cela_flasa"];
$prazdna_flasa = $_POST["prazdna_flasa"];
$vaha_jednej_davky = $_POST["vaha_jednej_davky"];
$datum = date("Y-m-d"); // Aktuálny dátum
$cas = date("H:i:s"); // Aktuálny čas

$sql = "UPDATE udaje_tovar SET ean_kod='$ean_kod', nazov='$nazov', merna_jednotka='$merna_jednotka', cela_flasa='$cela_flasa', prazdna_flasa='$prazdna_flasa', vaha_jednej_davky='$vaha_jednej_davky', datum='$datum',  cas='$cas' WHERE id=$id";

if (mysqli_query($conn, $sql)) {
    echo "Záznam bol úspešne aktualizovaný!";
} else {
    echo "Chyba pri aktualizácii záznamu: " . mysqli_error($conn);
}

mysqli_close($conn);
include "back.php";
include "footer.php";
?>
