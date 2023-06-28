<?php include "header.php"; ?>
    <div class="container">
        <h1>PRIDAJ ZÁZNAM | važenia alkoholu</h1>
        <form action="save-form-to-database.php" method="POST" class="form-table">
            <div class="form-row">
                <label for="ean_kod">EAN KOD:</label>
                <input type="number" name="ean_kod" id="ean_kod" placeholder="EAN kód (zvyčajne 13 číslic)">
            </div>
            <div class="form-row">
                <label for="nazov">NÁZOV:</label>
                <input type="text" name="nazov" id="nazov" required placeholder="Názov tovaru + jeho litráž alebo gramaž">
            </div>
            <div class="form-row">
                <label for="merna_jednotka">MERNA JEDNOTKA:</label>
                <select name="merna_jednotka" id="merna_jednotka" required>
                    <option value="">Zvoľ mernu jednotku</option>
                    <option value="ks">ks</option>
                    <option value="kg">kg</option>
                    <option value="l">l</option>
                </select>
            </div>
            <div class="form-row">
                <label for="cela_flasa">CELA FLASA:</label>
                <input type="number" name="cela_flasa" id="cela_flasa" placeholder="Celá fľaša v gramoch">
            </div>
            <div class="form-row">
                <label for="prazdna_flasa">PRAZDNA FLASA:</label>
                <input type="number" name="prazdna_flasa" id="prazdna_flasa" placeholder="Prázdna fľaša v gramoch">
            </div>
            <div class="form-row">
                <label for="delene_1">POCĚT DÁVOK:</label>
                <select name="delene_1" id="delene_1">
                    <option value="">Zvoľ počet dávok</option>
                    <option value="4">4</option>
                    <option value="7.5">7.5</option>
                    <option value="12.5">12.5</option>
                    <option value="17.5">17.5</option>
                    <option value="25">25</option>
                </select>
            </div>

            <div class="form-row">
                <button type="submit">Uložiť</button>
            </div>
        </form>
    </div>
<?php include "back.php"; ?>
<?php include "footer.php"; ?>
<?php mysqli_close($conn); ?>