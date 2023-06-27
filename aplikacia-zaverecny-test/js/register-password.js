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
function validateForm() {
    var password = document.getElementById("password-input").value;
    var confirmPassword = document.getElementById("confirm-password-input").value;

    // Kontrola, či heslo a potvrdenie hesla sa zhodujú
    if (password !== confirmPassword) {
        alert("Heslo a potvrdenie hesla sa nezhodujú!");
        return false;
    }

    // Kontrola, či heslo spĺňa požadované kritériá
    var passwordRegex = /^(?=.*[A-Z])(?=.*\d)[A-Za-z\d]{6,}$/;
    if (!passwordRegex.test(password)) {
        alert("Heslo musí obsahovať minimálne 6 znakov, jedno veľké písmeno a minimálne jednu číslicu!");
        return false;
    }

    return true;
}