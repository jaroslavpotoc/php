<?php
include "header.php";
require "control-logins.php";
require "db.php";

// Kontrola, či bol odoslaný formulár vyhľadávania
if (isset($_GET['search'])) {
    $search = $_GET['search'];

    // Vytvorenie podmienky WHERE pre vyhľadávanie v rámci databázového dotazu
    $searchCondition = " WHERE id LIKE '%$search%' OR nazov LIKE '%$search%'";
} else {
    $search = '';
    $searchCondition = '';
}

$sql = "SELECT id, ean_kod, nazov, merna_jednotka, cela_flasa, prazdna_flasa, vaha_jednej_davky, datum, cas FROM udaje_tovar" . $searchCondition;
$result = mysqli_query($conn, $sql);
?>

<h1>ZOBRAZ VŠETKY ZÁZNAMY | Váh a údaje o alkohole</h1>

<!-- Formulár pre vyhľadávanie -->
<form method="GET" action="">
    <input type="text" name="search" id="search" placeholder="Vyhľadávanie..." value="<?php echo $search; ?>">
</form>

<table class='data-table'>
    <tr>
        <th>ID</th>
        <th>EAN kód</th>
        <th>Názov tovaru</th>
        <th>Mj</th>
        <th>Celá fľaša</th>
        <th>Prázdna fľaša</th>
        <th>Váha jednej dávky</th>
        <th>Dátum</th>
        <th>Čas</th>
        <th>Upraviť</th>
        <th>Odstrániť</th>
    </tr>
    <tr>
        <th></th>
        <th></th>
        <th></th>
        <th>(ks / l / kg)</th>
        <th>(gram)</th>
        <th>(gram)</th>
        <th>(gram)</th>
        <th>(pridania / upravy)</th>
        <th>(pridania / upravy)</th>
        <th>(záznam)</th>
        <th>(záznam)</th>
    </tr>
    <?php
    if (mysqli_num_rows($result) > 0) {
        while($row = mysqli_fetch_assoc($result)) {
            echo "<tr>";
            echo "<td>".$row["id"]."</td>";
            echo "<td>".$row["ean_kod"]."</td>";
            echo "<td>".$row["nazov"]."</td>";
            echo "<td>".$row["merna_jednotka"]."</td>";
            if ($_SESSION['user_role'] === 'admin') {
                echo "<td>".$row["cela_flasa"]."</td>";
                echo "<td>".$row["prazdna_flasa"]."</td>";
                echo "<td>".$row["vaha_jednej_davky"]."</td>";
            } else {
                echo "<td></td>";
                echo "<td></td>";
                echo "<td></td>";
            }
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
        echo "<tr><td colspan='12'>Žiadne výsledky!</td></tr>";
    }
    ?>
</table>

<?php
mysqli_close($conn);
include "back.php";
include "footer.php";
?>
