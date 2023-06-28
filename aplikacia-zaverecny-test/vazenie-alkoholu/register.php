<?php include "header.php"; ?>
    <div class="container">
        <h1 class="register-heading">REGISTRÁCIA | Važenie alkoholu</h1>
        <form action="register-check.php" method="POST" onsubmit="return validateForm()" class="register-form">
            <div class="form-row">
                <label for="login">Login:</label>
                <input type="text" name="login" id="login" placeholder="Váš login" required>
                <?php

                // Kontrola, či zadaný login už existuje v databáze
                if ($_SERVER["REQUEST_METHOD"] == "POST") {
                    $login = $_POST["login"];
                    $checkQuery = "SELECT id FROM users WHERE login=?";
                    $checkStatement = mysqli_prepare($conn, $checkQuery);
                    mysqli_stmt_bind_param($checkStatement, "s", $login);
                    mysqli_stmt_execute($checkStatement);
                    mysqli_stmt_store_result($checkStatement);

                    if (mysqli_stmt_num_rows($checkStatement) > 0) {
                        echo "<span class='error-message'>Zadaný login je už použitý. Prosím, vyberte iný login.</span>";
                    }
                }
                ?>
            </div>
            <div class="form-row">
                <label for="password">Heslo:</label>
                <div class="password-input-wrapper">
                    <input type="password" name="password" id="password-input" placeholder="Vaše heslo" required>
                    <i class="fas fa-eye password-eye-icon" id="password-eye-icon" onclick="togglePassword('password-input', 'password-eye-icon')"></i>
                </div>
            </div>
            <div class="form-row">
                <label for="confirm-password">Potvrďte heslo:</label>
                <div class="password-input-wrapper">
                    <input type="password" name="confirm_password" id="confirm-password-input" placeholder="Zopakuj heslo" required>
                    <i class="fas fa-eye password-eye-icon" id="confirm-password-eye-icon" onclick="togglePassword('confirm-password-input', 'confirm-password-eye-icon')"></i>
                </div>
            </div>
            <div class="form-row">
                <label for="email">Email:</label>
                <input type="email" name="email" pattern="[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}" placeholder="Váša e-mail adresa" required>
                <?php

                // Kontrola, či zadaný email už existuje v databáze
                if ($_SERVER["REQUEST_METHOD"] == "POST") {
                    $email = $_POST["email"];
                    $checkQuery = "SELECT id FROM users WHERE email=?";
                    $checkStatement = mysqli_prepare($conn, $checkQuery);
                    mysqli_stmt_bind_param($checkStatement, "s", $email);
                    mysqli_stmt_execute($checkStatement);
                    mysqli_stmt_store_result($checkStatement);

                    if (mysqli_stmt_num_rows($checkStatement) > 0) {
                        echo "<span class='error-message'>Zadaný email je už použitý. Prosím, vyberte iný email.</span>";
                    }
                }
                ?>
            </div>
            <div class="form-row-but">
                <button type="submit" class="custom-button green">Registrovať sa</button>
            </div>
        </form>
    </div>
<?php include "back.php"; ?>
<?php include "footer.php"; ?>
<?php mysqli_close($conn); ?>