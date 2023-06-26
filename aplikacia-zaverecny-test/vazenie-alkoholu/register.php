<?php include "header.php"; ?>
<h1>REGISTRÁCIA | Važenie alkoholu</h1>
<form action="register-check.php" method="POST" onsubmit="return validateForm()">
    Login:
    <input type="text" name="login" required>
    <?php
    // Kontrola, či zadaný login už existuje v databáze
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $login = $_POST["login"];
        $checkQuery = "SELECT id FROM users WHERE login='$login'";
        $checkResult = mysqli_query($conn, $checkQuery);

        if (mysqli_num_rows($checkResult) > 0) {
            echo "<span style='color: red;'>Zadaný login je už použitý. Prosím, vyberte iný login.</span>";
        }
    }
    ?>
    <br><br>
    Heslo:
    <input type="password" name="password" id="password-input" required>
    <i class="fas fa-eye" id="password-eye-icon" onclick="togglePassword('password-input', 'password-eye-icon')"></i>
    <br><br>
    Potvrďte heslo:
    <input type="password" name="confirm_password" id="confirm-password-input" required>
    <i class="fas fa-eye" id="confirm-password-eye-icon" onclick="togglePassword('confirm-password-input', 'confirm-password-eye-icon')"></i>
    <br><br>
    Email:
    <input type="email" name="email" pattern="[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}" required>
    <br><br>
    <button type="submit">Registrovať sa</button>
</form>

<script>

    function togglePassword(inputId, iconId) {
        var passwordInput = document.getElementById(inputId);
        var eyeIcon = document.getElementById(iconId);

        if (passwordInput.type === "password") {
            passwordInput.type = "text";
            eyeIcon.classList.remove("fa-eye");
            eyeIcon.classList.add("fa-eye-slash");
        } else {
            passwordInput.type = "password";
            eyeIcon.classList.remove("fa-eye-slash");
            eyeIcon.classList.add("fa-eye");
        }
    }


    function validateForm() {
        var passwordInput = document.getElementById("password-input");
        var confirmPassInput = document.getElementById("confirm-password-input");

        if (passwordInput.value !== confirmPassInput.value) {
            alert("Heslá sa nezhodujú. Skúste to prosím znova.");
            return false;
        }

        return true;
    }
</script>

<?php include "back.php"; ?>
<?php include "footer.php"; ?>
