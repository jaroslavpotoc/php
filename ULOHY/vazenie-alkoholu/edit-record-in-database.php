<?php
include "header.php";
require "control-logins.php";
require "db.php";
echo "<h1>UPRAV ZÁZNAM |važenia alkoholu </h1>";

$id = $_POST['id'];

$sql = "SELECT id, ean_kod, nazov, merna_jednotka, cela_flasa, prazdna_flasa, vaha_jednej_davky, datum FROM udaje_tovar WHERE id=$id";

$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    if ($row = mysqli_fetch_assoc($result)) {
        $id = $row["id"];
        $ean_kod = $row["ean_kod"];
        $nazov = $row["nazov"];
        $merna_jednotka = $row["merna_jednotka"];
        $cela_flasa = $row["cela_flasa"];
        $prazdna_flasa = $row["prazdna_flasa"];
        $vaha_jednej_davky = $row["vaha_jednej_davky"];
        $datum = $row["datum"];
    }
}
?>
<form class="form-table" action="save-modified-record-to-database.php" method="POST">
    <table>
        <tr>
            <th>EAN:</th>
            <td><input type="text" name="ean_kod" value="<?php echo $ean_kod; ?>"></td>
        </tr>
        <tr>
            <th>NÁZOV:</th>
            <td><input type="text" name="nazov" value="<?php echo $nazov; ?>"></td>
        </tr>
        <tr>
            <th>MERNA JEDNOTKA:</th>
            <td>
                <select name="merna_jednotka">
                    <option value="ks" <?php echo $merna_jednotka == "ks" ? "selected": ""; ?> >ks</option>
                    <option value="kg" <?php echo $merna_jednotka == "kg" ? "selected": ""; ?> >kg</option>
                    <option value="l"  <?php echo $merna_jednotka == "l" ? "selected": ""; ?> >l</option>
                </select>
            </td>
        </tr>
        <tr>
            <th>CELA FLASA:</th>
            <td><input type="text" name="cela_flasa" value="<?php echo $cela_flasa; ?>"></td>
        </tr>
        <tr>
            <th>PRAZDNA FLASA:</th>
            <td><input type="text" name="prazdna_flasa" value="<?php echo $prazdna_flasa; ?>"></td>
        </tr>
        <tr>
            <th>VAHA JEDNEJ DAVKY:</th>
            <td><input type="text" step="any" name="vaha_jednej_davky" value="<?php echo $vaha_jednej_davky; ?>"></td>
        </tr>
    </table>
    <input type="hidden" name="id" value="<?php echo $id; ?>">
    <button type="submit">Uložiť upravený</button>
</form>
<?php
include "back.php";
include "footer.php";
?>
