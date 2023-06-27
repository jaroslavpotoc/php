<?php include "header2.php"; ?>
<?php require "../control-logins.php"; ?>
<h3 style="text-align: center">ODSTRÁNIŤ ÚČET!</h3>
<?php
require "../db.php";

$message = '';

if (isset($_SESSION['users_id'])) {
    $userId = $_SESSION['users_id'];

    // Získanie používateľského mena z databázy
    $sql = "SELECT login, password FROM users WHERE id='$userId'";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $username = $row['login'];
        $storedPassword = $row['password'];

        echo "<h4 style='text-align: center; color: #dd2233; text-transform: uppercase;'>Prihlásený používateľ: " . $username . "</h4>";

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $currentPassword = $_POST['current_password'];
            $confirmPassword = $_POST['confirm_password'];

            // Porovnanie aktuálneho hesla so uloženým heslom
            if ($currentPassword === $storedPassword) {
                // Porovnanie zadaného hesla s potvrdením hesla
                if ($currentPassword === $confirmPassword) {
                    // Odstránenie účtu z databázy
                    $deleteSql = "DELETE FROM users WHERE id='$userId'";
                    if (mysqli_query($conn, $deleteSql)) {
                        // Odhlásenie používateľa
                        session_unset();
                        session_destroy();
                        $message = 'Účet bol úspešne odstránený.';
                    } else {
                        $message = 'Nastala chyba pri odstraňovaní účtu.';
                    }
                } else {
                    $message = 'Heslá sa nezhodujú. Skúste to znova.';
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
    <form method="POST" action="" class="form-table">
        <div class="form-row">
            <label for="current_password">Aktuálne heslo:</label>
            <div class="password-input-wrapper">
                <input type="password" name="current_password" id="current_password" placeholder="Zadajte aktuálne heslo" required>
                <i class="fas fa-eye" id="current-password-eye-icon" onclick="togglePassword('current_password','current-password-eye-icon')"></i>
            </div>
        </div>
        <div class="form-row">
            <label for="confirm_password">Potvrďte aktuálne heslo:</label>
            <div class="password-input-wrapper">
                <input type="password" name="confirm_password" id="confirm_password" placeholder="Potvrďte aktuálne heslo" required>
                <i class="fas fa-eye" id="confirm-password-eye-icon" onclick="togglePassword('confirm_password','confirm-password-eye-icon')"></i>
            </div>
        </div>
        <h5 style="text-align: center; color: orangered">PO ODSTRÁNENÍ ÚČTU NEBUDE MOŽNÁ OBNOVA ÚDAJOV Z ÚČTU !!!</h5>
        <div class="form-row">
            <button type="submit" class="custom-button red" style="background-color: red; color: white;">Odstrániť účet!</button>
        </div>
    </form>
    <a href="../my-account.php" class="custom-button red" style="background-color: black; color: white;">Vrátiť sa na účet</a>
</div>

<script>
    function togglePassword(inputId, iconId) {
        var input = document.getElementById(inputId);
        var icon = document.getElementById(iconId);

        if (input.type === "password") {
            input.type = "text";
            icon.classList.remove("fa-eye");
            icon.classList.add("fa-eye-slash");
        } else {
            input.type = "password";
            icon.classList.remove("fa-eye-slash");
            icon.classList.add("fa-eye");
        }
    }
</script>

<?php include "footer2.php"; ?>
