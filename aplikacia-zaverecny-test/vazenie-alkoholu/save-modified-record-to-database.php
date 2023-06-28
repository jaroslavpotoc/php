<?php
include "header.php";
require "control-logins.php";
require "db.php";

if ($_SESSION['user_role'] === 'admin') {
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $id = $_POST['id'];
        $ean_kod = !empty($_POST["ean_kod"]) ? "'" . $_POST["ean_kod"] . "'" : "NULL";
        $nazov = $_POST["nazov"];
        $merna_jednotka = !empty($_POST["merna_jednotka"]) ? "'" . $_POST["merna_jednotka"] . "'" : "NULL";
        $cela_flasa = !empty($_POST["cela_flasa"]) ? $_POST["cela_flasa"] : "NULL";
        $prazdna_flasa = !empty($_POST["prazdna_flasa"]) ? $_POST["prazdna_flasa"] : "NULL";
        $delene_1 = !empty($_POST["delene_1"]) ? "'" . $_POST["delene_1"] . "'" : "NULL";
        $datum = date("Y-m-d"); // Aktuálny dátum
        $cas = date("H:i:s"); // Aktuálny čas

        $sql = "UPDATE udaje_tovar SET ean_kod=$ean_kod, nazov='$nazov', merna_jednotka=$merna_jednotka, cela_flasa=$cela_flasa, prazdna_flasa=$prazdna_flasa, delene_1=$delene_1, datum='$datum', cas='$cas' WHERE id=$id";

        if (mysqli_query($conn, $sql)) {
            echo "Záznam bol úspešne aktualizovaný!";
        } else {
            echo "Chyba pri aktualizácii záznamu: " . mysqli_error($conn);
        }
    }

    include "edit-next-record.php";
} else {
    echo "Nemáte oprávnenie na tento krok. Kontaktujte administrátora.";
}

include "back.php";
include "footer.php";
mysqli_close($conn);
?>
