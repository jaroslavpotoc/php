<?php
include "header.php";
require "control-logins.php";
require "db.php";
echo "<h1>ZOBRAZ VŠETKY ZÁZNAMY | Váh a údaje o alkohole</h1>";

$sql = "SELECT id, ean_kod, nazov, merna_jednotka, cela_flasa, prazdna_flasa, vaha_jednej_davky, datum, cas FROM udaje_tovar";
$result = mysqli_query($conn, $sql);

echo "<table class='data-table'>";
echo "<tr>";
echo "<th>ID</th><th>EAN kód</th><th>Názov tovaru</th><th>Merná jednotka</th><th>Celá fľaša</th><th>Prázdna fľaša</th><th>Váha jednej dávky</th><th>Dátum</th><th>Čas</th><th>Upraviť</th><th>Odstrániť</th>";
echo "</tr>";
echo "<tr>";
echo "<th></th><th></th><th></th><th>(ks / l / kg)</th><th>(gram)</th><th>(gram)</th><th>(gram)</th><th>(pridania / upravy)</th><th>(pridania / upravy)</th><th>(záznam)</th><th>(záznam)</th>";
echo "</tr>";
if (mysqli_num_rows($result) > 0) {
    while($row = mysqli_fetch_assoc($result)) {
        echo "<tr>";
        echo "<td>".$row["id"]."</td>";
        echo "<td>".$row["ean_kod"]."</td>";
        echo "<td>".$row["nazov"]."</td>";
        echo "<td>".$row["merna_jednotka"]."</td>";
        echo "<td>".$row["cela_flasa"]."</td>";
        echo "<td>".$row["prazdna_flasa"]."</td>";
        echo "<td>".$row["vaha_jednej_davky"]."</td>";
        echo "<td>".$row["datum"]."</td>";
        echo "<td>".$row["cas"]."</td>";
        echo "<td>";
        echo "<form action='edit-record-in-database.php' method='POST'>";
        echo "<input type='hidden' name='id' value='".$row["id"]."'>";
        echo "<button class='edit-button' type='submit'>Upraviť</button>";
        echo "</form>";
        echo "</td>";
        echo "<td>";
        echo "<form action='delete-record-from-database.php' method='POST'>";
        echo "<input type='hidden' name='id' value='".$row["id"]."'>";
        echo "<button class='delete-button' type='submit'>Odstrániť</button>";
        echo "</form>";
        echo "</td>";
        echo "</tr>";
    }
} else {
    echo "<tr><td colspan='11'>Žiadne výsledky!</td></tr>";
}

echo "</table>";

mysqli_close($conn);
include "back.php";
include "footer.php";
?>
