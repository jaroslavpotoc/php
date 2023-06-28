<?php
include "header.php";
require "control-logins.php";
require "db.php";

if ($_SESSION['user_role'] === 'admin') {
    $ean_kod = !empty($_POST["ean_kod"]) ? "'" . $_POST["ean_kod"] . "'" : "NULL";
    $nazov = $_POST["nazov"];
    $merna_jednotka = !empty($_POST["merna_jednotka"]) ? "'" . $_POST["merna_jednotka"] . "'" : "NULL";
    $cela_flasa = !empty($_POST["cela_flasa"]) ? $_POST["cela_flasa"] : "NULL";
    $prazdna_flasa = !empty($_POST["prazdna_flasa"]) ? $_POST["prazdna_flasa"] : "NULL";
    $delene_1 = !empty($_POST["delene_1"]) ? "'" . $_POST["delene_1"] . "'" : "NULL";
    $datum = date("Y-m-d"); // Aktuálny dátum
    $cas = date("H:i:s"); // Aktuálny čas

    $sql = "INSERT INTO udaje_tovar (ean_kod, nazov, merna_jednotka, cela_flasa, prazdna_flasa, delene_1, datum, cas) VALUES ($ean_kod, '$nazov', $merna_jednotka, $cela_flasa, $prazdna_flasa, $delene_1, '$datum', '$cas')";

    if (mysqli_query($conn, $sql)) {
        echo "Záznam bol úspešne uložený!";
        include "add-next.php";
    } else {
        echo "Chyba!: " . $sql . "<br>" . mysqli_error($conn);
    }
} else {
    echo "Nemáte oprávnenie na tento krok. Kontaktujte administrátora.";
}

include "back.php";
include "footer.php";
mysqli_close($conn);
?>
