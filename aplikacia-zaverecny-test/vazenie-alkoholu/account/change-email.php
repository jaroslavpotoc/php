<?php include "header2.php"; ?>
<?php require "../control-logins.php"; ?>

<h3 style="text-align: center">ZMENIŤ E-MAIL!</h3>

<?php
require "../db.php";

$message = '';

if (isset($_SESSION['users_id'])) {
    $userId = $_SESSION['users_id'];

    // Získanie používateľského mena z databázy
    $sql = "SELECT login FROM users WHERE id='$userId'";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $username = $row['login'];

        echo "<h4 style='text-align: center; color: #dd2233; text-transform: uppercase;'>Prihlásený používateľ: " . $username . "</h4>";

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $newEmail = $_POST['new_email'];
            $confirmEmail = $_POST['confirm_email'];

            // Kontrola, či sa zadaný e-mail už nepoužíva
            $emailCheckSql = "SELECT id FROM users WHERE email='$newEmail'";
            $emailCheckResult = mysqli_query($conn, $emailCheckSql);

            if (mysqli_num_rows($emailCheckResult) > 0) {
                $message = 'E-mailová adresa je už používaná. Skúste inú e-mailovú adresu.';
            } else {
                // Aktualizácia e-mailu v databáze pre používateľa
                $updateSql = "UPDATE users SET email='$newEmail' WHERE id='$userId'";
                if (mysqli_query($conn, $updateSql)) {
                    $message = 'E-mail bol úspešne zmenený.';
                } else {
                    $message = 'Nastala chyba pri zmenení e-mailu.';
                }
            }
        }
    } else {
        echo "<p>Žiaden používateľ nie je prihlásený!</p>";
    }
}

mysqli_close($conn);
?>
<div style="text-align: center;">
    <?php echo $message; ?>
    <br>
    <br>
    <form method="POST" action="" class="form-table">
        <div class="form-row">
            <label for="new_email">Nový e-mail:</label>
            <input type="email" name="new_email" id="new_email" pattern="[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}" placeholder="Váša nová e-mailová adresa" required>
        </div>
        <div class="form-row">
            <label for="confirm_email">Potvrďte nový <br> e-mail:</label>
            <input type="email" name="confirm_email" id="confirm_email" pattern="[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}" placeholder="Zopakuj e-mailovú adresu" required>
        </div>
        <div class="form-row">
            <button type="submit" class="custom-button green">Zmeniť e-mail</button>
        </div>
    </form>
    <br>
    <a href="../my-account.php" class="custom-button red" style="background-color: black; color: white;">Vrátiť sa na účet</a>
</div>
<?php include "footer2.php"; ?>
