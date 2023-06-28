function validateForm() {
    var currentPassword = document.getElementById("current_password").value;
    var newPassword = document.getElementById("new_password").value;
    var confirmPassword = document.getElementById("confirm_password").value;

    // Kontrola či nové heslo a potvrdenie hesla sa zhodujú
    if (newPassword !== confirmPassword) {
        alert("Heslo a potvrdenie hesla sa nezhodujú!");
        return false;
    }

    // Kontrola či nové heslo spĺňa kritériá
    if (newPassword.length > 0) {
        var passwordRegex = /^(?=.*[A-Z])(?=.*\d)[A-Za-z\d]{6,}$/;
        if (!passwordRegex.test(newPassword)) {
            alert("Heslo musí obsahovať minimálne 6 znakov, aspoň jedno veľké písmeno a aspoň jedno číslo!");
            return false;
        }
    }

    // Kontrola či aktuálne heslo nie je rovnaké ako nové heslo
    if (currentPassword === newPassword) {
        alert("Zadali ste rovnaké heslo ako aktuálne. Skúste zadávať iné heslo.");
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