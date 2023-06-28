<?php include "header.php"; ?>

<div class="error-container">
    <h1>Váženie alkoholu | Hlásenie chyby</h1>
    <?php if (!empty($errorMessage)) { ?>
        <p class="error-message"><?php echo $errorMessage; ?></p>
    <?php } ?>
    <?php if (!empty($successMessage)) { ?>
        <p class="success-message"><?php echo $successMessage; ?></p>
    <?php } ?>

    <form action="handle-error.php" method="POST">
        <label for="error-name" class="error-label">Meno:</label>
        <input type="text" id="error-name" name="error-name" class="error-input" placeholder="Vaše meno" required>

        <label for="error-email" class="error-label">E-mail:</label>
        <input type="email" id="error-email" name="error-email" class="error-input" pattern="[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}" placeholder="Vaša e-mail adresa" required>

        <label for="error-description" class="error-label">Popis chyby:</label>
        <textarea id="error-description" name="error-description" class="error-textarea" placeholder="Popis chyby" minlength="10" maxlength="1000" required></textarea>

        <button type="submit" class="error-button">Odoslať</button>
    </form>
</div>

<?php include "back.php";?>
<?php include "footer.php"; ?>
<?php mysqli_close($conn); ?>
