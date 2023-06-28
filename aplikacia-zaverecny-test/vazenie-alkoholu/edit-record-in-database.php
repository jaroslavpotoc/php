<?php
include "header.php";
require "control-logins.php";
require "db.php";
echo "<h1>UPRAV ZÁZNAM | važenia alkoholu </h1>";

$id = $_POST['id'];

$sql = "SELECT id, ean_kod, nazov, merna_jednotka, cela_flasa, prazdna_flasa, delene_1, datum FROM udaje_tovar WHERE id=$id";

$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    if ($row = mysqli_fetch_assoc($result)) {
        $id = $row["id"];
        $ean_kod = $row["ean_kod"];
        $nazov = $row["nazov"];
        $merna_jednotka = $row["merna_jednotka"];
        $cela_flasa = $row["cela_flasa"];
        $prazdna_flasa = $row["prazdna_flasa"];
        $delene_1 = $row["delene_1"];
        $datum = $row["datum"];
    }
}
?>
<form class="form-table" action="save-modified-record-to-database.php" method="POST">
    <table>
        <tr>
            <th>EAN:</th>
            <td><input type="number" name="ean_kod" id="ean_kod" placeholder="EAN kód (zvyčajne 13 číslic)" value="<?php echo $ean_kod; ?>"></td>
        </tr>
        <tr>
            <th>NÁZOV:</th>
            <td><input type="text" name="nazov" id="nazov" required placeholder="Názov tovaru + jeho litráž alebo gramaž" value="<?php echo $nazov; ?>"></td>
        </tr>
        <tr>
            <th>MERNA JEDNOTKA:</th>
            <td>
                <select name="merna_jednotka" required>
                    <option value="">Zvoľ mernu jednotku</option>
                    <option value="ks" <?php echo $merna_jednotka == "ks" ? "selected": ""; ?> >ks</option>
                    <option value="kg" <?php echo $merna_jednotka == "kg" ? "selected": ""; ?> >kg</option>
                    <option value="l"  <?php echo $merna_jednotka == "l" ? "selected": ""; ?> >l</option>
                </select>
            </td>
        </tr>
        <tr>
            <th>CELA FLASA:</th>
            <td><input type="number" name="cela_flasa" id="cela_flasa" placeholder="Celá fľaša v gramoch" value="<?php echo $cela_flasa; ?>"></td>
        </tr>
        <tr>
            <th>PRAZDNA FLASA:</th>
            <td><input type="number" name="prazdna_flasa" id="prazdna_flasa" placeholder="Prázdna fľaša v gramoch" value="<?php echo $prazdna_flasa; ?>"></td>
        </tr>
        <tr>
            <th>POCĚT DÁVOK:</th>
            <td>
                <select name="delene_1" id="delene_1">
                    <option value="" <?php echo $delene_1 == "" ? "selected": ""; ?> >Zvoľ počet dávok</option>
                    <option value="4" <?php echo $delene_1 == "4" ? "selected": ""; ?> >4</option>
                    <option value="7.5" <?php echo $delene_1 == "7.5" ? "selected": ""; ?> >7.5</option>
                    <option value="12.5" <?php echo $delene_1 == "12.5" ? "selected": ""; ?> >12.5</option>
                    <option value="17.5" <?php echo $delene_1 == "17.5" ? "selected": ""; ?>>17.5</option>
                    <option value="25" <?php echo $delene_1 == "25" ? "selected": ""; ?>>25</option>
                </select>
            </td>
        </tr>
    </table>
    <input type="hidden" name="id" value="<?php echo $id; ?>">
    <div class="form-row" style="display: flex; flex-direction: row; justify-content: center;padding-top: 10px;">
    <button type="submit">Uložiť upravený</button>
    </div>
</form>
<?php
include "back.php";
include "footer.php";
mysqli_close($conn);
?>
