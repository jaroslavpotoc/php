<?php include "header2.php"; ?>
<?php require "../control-logins.php"; ?>
<h3 style="text-align: center">ZMENIŤ HESLO!</h3>
<?php
require "../db.php";

$message = '';

if (isset($_SESSION['users_id'])) {
    $userId = $_SESSION['users_id'];

    // Získanie používateľského mena a hesla z databázy
    $sql = "SELECT login, password FROM users WHERE id='$userId'";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $username = $row['login'];
        $storedPassword = $row['password'];

        echo "<h4 style='text-align: center; color: #dd2233; text-transform: uppercase;'>Prihlásený používateľ: " . $username . "</h4>";

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $currentPassword = $_POST['current_password'];
            $newPassword = $_POST['new_password'];
            $confirmPassword = $_POST['confirm_password'];

            // Porovnanie aktuálneho hesla so uloženým heslom
            if ($currentPassword === $storedPassword) {
                if ($newPassword === $confirmPassword) {
                    // Kontrola, či sa nové heslo líši od aktuálneho hesla
                    if ($newPassword !== $currentPassword) {
                        // Aktualizácia hesla v databáze pre používateľa
                        $updateSql = "UPDATE users SET password='$newPassword' WHERE id='$userId'";
                        if (mysqli_query($conn, $updateSql)) {
                            $message = 'Heslo bolo úspešne zmenené.';
                        } else {
                            $message = 'Nastala chyba pri zmene hesla.';
                        }
                    } else {
                        $message = 'Zadali ste podobné heslo ako predchádzajúce. Skúste zadať iné heslo.';
                    }
                } else {
                    $message = 'Zadané heslá sa nezhodujú. Skúste znova.';
                }
            } else {
                $message = 'Zadali ste nesprávne aktuálne heslo.';
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
    <form method="POST" action="" class="form-table" onsubmit="return validateForm()">
        <div class="form-row">
            <label for="current_password">Aktuálne heslo:</label>
            <div class="password-input-wrapper">
                <input type="password" name="current_password" id="current_password" placeholder="Vaše aktuálne heslo"
                       required>
                <i class="fas fa-eye" id="current-password-eye-icon"
                   onclick="togglePassword('current_password','current-password-eye-icon')"></i>
            </div>
        </div>
        <div class="form-row">
            <label for="new_password">Nové heslo:</label>
            <div class="password-input-wrapper">
                <input type="password" name="new_password" id="new_password" placeholder="Vaše nové heslo" required>
                <i class="fas fa-eye" id="new-password-eye-icon"
                   onclick="togglePassword('new_password','new-password-eye-icon')"></i>
            </div>
        </div>
        <div class="form-row">
            <label for="confirm_password">Potvrďte nové heslo:</label>
            <div class="password-input-wrapper">
                <input type="password" name="confirm_password" id="confirm_password" placeholder="Zopakujte nové heslo"
                       required>
                <i class="fas fa-eye" id="confirm-password-eye-icon"
                   onclick="togglePassword('confirm_password','confirm-password-eye-icon')"></i>
            </div>
        </div>
        <div class="form-row">
            <button type="submit" class="custom-button green">Zmeniť heslo</button>
        </div>
    </form>
    <br>
    <a href="../my-account.php" class="custom-button red" style="background-color: black; color: white;">Vrátiť sa na
        účet</a>
</div>

<?php include "footer2.php"; ?>
