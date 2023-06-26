<?php
include "header.php";
require "db.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $login = $_POST["login"];
    $password = $_POST["password"];
    $email = $_POST["email"];


    $checkQuery = "SELECT id FROM users WHERE login=?";
    $checkStatement = mysqli_prepare($conn, $checkQuery);
    mysqli_stmt_bind_param($checkStatement, "s", $login);
    mysqli_stmt_execute($checkStatement);
    mysqli_stmt_store_result($checkStatement);

    if (mysqli_stmt_num_rows($checkStatement) > 0) {
        echo "Zadaný login je už použitý. Prosím, vyberte iný login.";
        exit;
    }


    $insertQuery = "INSERT INTO users (login, password, email, user_role) VALUES (?, ?, ?, 'user')";
    $insertStatement = mysqli_prepare($conn, $insertQuery);
    mysqli_stmt_bind_param($insertStatement, "sss", $login, $password, $email);
    $insertResult = mysqli_stmt_execute($insertStatement);

    if ($insertResult) {
        echo "Registrácia prebehla úspešne!";
        echo "<br><br>";
        echo '<a href="log-in.php"><button class="edit-button">Pokračovať na prihlásenie</button></a>';
    } else {
        echo "Registrácia zlyhala. Skúste to prosím znova.";
    }
}

include "footer.php";
?>
