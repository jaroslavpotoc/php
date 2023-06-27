<?php include "header.php"; ?>
<h1>PRIHLÁSENIE | Važenie alkoholu</h1>
<form action="log-in-check.php" method="POST">
    Login / e-mail:
    <input type="text" name="login" placeholder="Váš login alebo e-mail">
    <br><br>
    Heslo:
    <input type="password" name="password" id="password-input" placeholder="Váše heslo">
    <i class="fas fa-eye" id="password-eye-icon" onclick="togglePassword('password-input', 'password-eye-icon')"></i>
    <br><br>
    <button type="submit">Prihlás sa</button>
</form>
<br>
<p>Ak ešte nemáte účet, môžete sa <a href="register.php">zaregistrovať tu</a>.</p>


<?php include "back.php"; ?>
<?php include "footer.php"; ?>
