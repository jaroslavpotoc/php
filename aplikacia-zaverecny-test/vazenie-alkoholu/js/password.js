function validateForm() {
    var password = document.getElementById("password-input").value;
    var confirmPassword = document.getElementById("confirm-password-input").value;

    // Kontrola či heslo a potvrdenie hesla sa zhodujú
    if (password !== confirmPassword) {
        alert("Heslo a potvrdenie hesla sa nezhodujú!");
        return false;
    }

    // Kontrola či heslo spĺňa kritériá
    var passwordRegex = /^(?=.*[A-Z])(?=.*\d)[A-Za-z\d]{6,}$/;
    if (!passwordRegex.test(password)) {
        alert("Heslo musí obsahovať minimálne 6 znakov, jedno veľké písmeno a minimálne jednu číslicu!");
        return false;
    }

    return true;
}

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