<?php include "header.php"; ?>
<h1>PRIDAJ ZÁZNAM | važenia alkoholu</h1>
<form action="save-form-to-database.php" method="POST" class="form-table">
    <div class="form-row">
        <label for="ean_kod">EAN:</label>
        <input type="number" name="ean_kod" id="ean_kod">
    </div>
    <div class="form-row">
        <label for="nazov">NÁZOV:</label>
        <input type="text" name="nazov" id="nazov" required>
    </div>
    <div class="form-row">
        <label for="merna_jednotka">MERNA JEDNOTKA:</label>
        <select name="merna_jednotka" id="merna_jednotka" required>
            <option value="ks">ks</option>
            <option value="kg">kg</option>
            <option value="l">l</option>
        </select>
    </div>
    <div class="form-row">
        <label for="cela_flasa">CELA FLASA:</label>
        <input type="number" name="cela_flasa" id="cela_flasa">
    </div>
    <div class="form-row">
        <label for="prazdna_flasa">PRAZDNA FLASA:</label>
        <input type="number" name="prazdna_flasa" id="prazdna_flasa">
    </div>
    <div class="form-row">
        <label for="vaha_jednej_davky">VAHA JEDNEJ DAVKY:</label>
        <input type="number" name="vaha_jednej_davky" id="vaha_jednej_davky" step="any">
    </div>
    <div class="form-row">
        <button type="submit">Uložiť</button>
    </div>
</form>

<?php include "back.php"; ?>
<?php include "footer.php"; ?>
