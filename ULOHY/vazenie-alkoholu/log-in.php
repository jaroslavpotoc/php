<?php include "header.php"; ?>
<h1>PRIHLÁSENIE | Važenie alkoholu</h1>
<form action="log-in-check.php" method="POST">
    Login:
    <input type="text" name="login">
    <br><br>
    Heslo:
    <input type="password" name="password" id="password-input">
    <i class="fas fa-eye" id="eye-icon" onclick="togglePassword()"></i>
    <br><br>
    <button type="submit">Prihlás sa</button>
</form>
<br>
<p>Ak ešte nemáte účet, môžete sa <a href="register.php">zaregistrovať tu</a>.</p>

<script>

    function togglePassword() {
        var passwordInput = document.getElementById("password-input");
        var eyeIcon = document.getElementById("eye-icon");

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
</script>

<?php include "back.php"; ?>
<?php include "footer.php"; ?>
