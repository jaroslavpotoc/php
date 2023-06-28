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

// Získanie hodnoty z formulára
if (isset($_POST['zaznamy_na_stranu'])) {
    $zaznamovNaStranu = $_POST['zaznamy_na_stranu'];
} else {
    $zaznamovNaStranu = 25; // Predvolený počet záznamov na stránku
}

// Získanie celkového počtu záznamov
$sqlCount = "SELECT COUNT(*) as count FROM udaje_tovar" . $searchCondition;
$resultCount = mysqli_query($conn, $sqlCount);
$rowCount = mysqli_fetch_assoc($resultCount);
$totalZaznamov = $rowCount['count'];

// Výpočet počtu strán
$totalStran = ceil($totalZaznamov / $zaznamovNaStranu);

// Získanie aktuálnej stránky
if (isset($_GET['stranka'])) {
    $aktualnaStranka = $_GET['stranka'];
} else {
    $aktualnaStranka = 1; // Predvolená aktuálna stránka
}

// Overenie, či aktuálna stránka je v rozsahu platných stránok
if ($aktualnaStranka < 1 || $aktualnaStranka > $totalStran) {
    $aktualnaStranka = 1; // Nastavenie na prvú stránku
}

// Výpočet offsetu pre SQL dopyt
$offset = ($aktualnaStranka - 1) * $zaznamovNaStranu;

$sql = "SELECT id, ean_kod, nazov, merna_jednotka, cela_flasa, prazdna_flasa, vaha_jednej_davky, datum, cas FROM udaje_tovar" . $searchCondition . " LIMIT " . $offset . ", " . $zaznamovNaStranu;
$result = mysqli_query($conn, $sql);
?>

<h1>ZOBRAZ VŠETKY ZÁZNAMY | Váh a údaje o alkohole</h1>

<!-- Formulár pre vyhľadávanie -->
<form method="GET" action="" class="search-form">
    <div class="search-container">
        <input type="text" name="search" id="search" placeholder="Vyhľadávanie..." value="<?php echo $search; ?>">
        <div class="search-button">
            <i class="fas fa-search"></i>
        </div>
    </div>
</form>
<br>

<!-- Formulár pre výber počtu záznamov na stránku -->
<form method="POST" action="" class="zaznamy-form">
    <label class="zaznam-text" for="zaznamy_na_stranu">Záznamy na stránku:</label>
    <select name="zaznamy_na_stranu" id="zaznamy_na_stranu" onchange="this.form.submit()">
        <option value="25" <?php if ($zaznamovNaStranu == 25) echo 'selected'; ?>>25</option>
        <option value="50" <?php if ($zaznamovNaStranu == 50) echo 'selected'; ?>>50</option>
        <option value="75" <?php if ($zaznamovNaStranu == 75) echo 'selected'; ?>>75</option>
        <option value="100" <?php if ($zaznamovNaStranu == 100) echo 'selected'; ?>>100</option>
    </select>
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

<!-- Stránkovanie -->
<div class="strankovanie">
    <?php
    if ($totalStran > 1) {
        echo "<ul class='stranky'>";
        if ($aktualnaStranka > 1) {
            echo "<li><a href='?stranka=".($aktualnaStranka - 1)."&search=".$search."&zaznamy_na_stranu=".$zaznamovNaStranu."'>Predchádzajúca</a></li>";
        }
        for ($i = 1; $i <= $totalStran; $i++) {
            if ($i == $aktualnaStranka) {
                echo "<li class='active'><a href='?stranka=".$i."&search=".$search."&zaznamy_na_stranu=".$zaznamovNaStranu."'>".$i."</a></li>";
            } else {
                echo "<li><a href='?stranka=".$i."&search=".$search."&zaznamy_na_stranu=".$zaznamovNaStranu."'>".$i."</a></li>";
            }
        }
        if ($aktualnaStranka < $totalStran) {
            echo "<li><a href='?stranka=".($aktualnaStranka + 1)."&search=".$search."&zaznamy_na_stranu=".$zaznamovNaStranu."'>Ďalšia</a></li>";
        }
        echo "</ul>";
    }
    ?>
</div>

<?php
include "back.php";
include "footer.php";
mysqli_close($conn);
?>
