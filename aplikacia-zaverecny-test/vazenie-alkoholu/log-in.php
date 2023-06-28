<?php include "header.php"; ?>
<div class="container">
    <h1 class="login-heading">PRIHLÁSENIE | Važenie alkoholu</h1>
    <form action="log-in-check.php" method="POST" class="login-form">
        <div class="form-row">
            <label for="login">Login / e-mail:</label>
            <input type="text" name="login" id="login" placeholder="Váš login alebo e-mail">
        </div>
        <div class="form-row">
            <label for="password">Heslo:</label>
            <div class="password-input-wrapper">
                <input type="password" name="password" id="password-input" placeholder="Váše heslo">
                <i class="fas fa-eye password-eye-icon" id="password-eye-icon" onclick="togglePassword('password-input', 'password-eye-icon')"></i>
            </div>
        </div>
        <div class="form-row">
            <button type="submit" class="custom-button">Prihlás sa</button>
        </div>
    </form>
    <br>
    <p class="register-link">Ak ešte nemáte účet, môžete sa <a href="register.php">zaregistrovať tu</a>!</p>
</div>
<?php include "footer.php"; ?>
<?php
mysqli_close($conn);
?>
