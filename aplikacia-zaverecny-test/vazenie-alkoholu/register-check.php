<?php
include "header.php";
require "db.php";
require "../PHPMailer-master/src/PHPMailer.php";
require "../PHPMailer-master/src/SMTP.php";
require "../PHPMailer-master/src/Exception.php";

use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\PHPMailer;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $login = $_POST["login"];
    $password = $_POST["password"];
    $email = $_POST["email"];

    // Kontrola, či je login už použitý
    $checkQuery = "SELECT id FROM users WHERE login=?";
    $checkStatement = mysqli_prepare($conn, $checkQuery);
    mysqli_stmt_bind_param($checkStatement, "s", $login);
    mysqli_stmt_execute($checkStatement);
    mysqli_stmt_store_result($checkStatement);

    if (mysqli_stmt_num_rows($checkStatement) > 0) {
        echo "Zadaný login je už použitý. Prosím, vyberte iný login.";
        include "back-register.php";
        exit;
    }

    // Kontrola, či je email už použitý
    $checkEmailQuery = "SELECT id FROM users WHERE email=?";
    $checkEmailStatement = mysqli_prepare($conn, $checkEmailQuery);
    mysqli_stmt_bind_param($checkEmailStatement, "s", $email);
    mysqli_stmt_execute($checkEmailStatement);
    mysqli_stmt_store_result($checkEmailStatement);

    if (mysqli_stmt_num_rows($checkEmailStatement) > 0) {
        echo "Zadaný email je už použitý. Prosím, použite iný email.";
        include "back-register.php";
        exit;
    }

    // Vloženie používateľa do databázy
    $insertQuery = "INSERT INTO users (login, password, email, user_role) VALUES (?, ?, ?, 'user')";
    $insertStatement = mysqli_prepare($conn, $insertQuery);
    mysqli_stmt_bind_param($insertStatement, "sss", $login, $password, $email);
    $insertResult = mysqli_stmt_execute($insertStatement);

    if ($insertResult) {
        echo "Registrácia prebehla úspešne!";
        echo "<br><br>";
        echo '<a href="log-in.php"><button class="edit-button">Pokračovať na prihlásenie</button></a>';

        // Odoslanie e-mailu
        $mail = new PHPMailer(true);

        try {
            // Nastavenie SMTP serveru a údajov
            $mail->isSMTP();
            $mail->Host = 'smtp.m1.websupport.sk';  // Nastavte adresu vášho SMTP servera
            $mail->SMTPAuth = true;
            $mail->Username = 'info@jpgeneration.sk';  // Nastavte svoj e-mail pre odosielanie
            $mail->Password = 'xokjig-kyBdax-4sonwe';  // Nastavte svoje heslo pre odosielanie
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
            $mail->Port = 587;  // Nastavte port vášho SMTP servera

            // Nastavenie odosielateľa a prijímateľa
            $mail->setFrom('info@jpgeneration.sk', 'info@jpgeneration.sk');  // Nastavte váš e-mail a meno
            $mail->addAddress($email, $login);  // Používateľský e-mail a meno

            // Nastavenie obsahu e-mailu
            $mail->isHTML(true);
            $mail->CharSet = 'UTF-8'; // Nastavenie kódovania na UTF-8
            $mail->Subject = 'Registrácia na Važenie alkoholu';  // Predmet e-mailu
            $mail->Body = '
                <html>
                <head>
                    <style>
                        body {
                            font-family: Arial, sans-serif;
                            background-color: #f2f2f2;
                            color: #333;
                        }
                        
                        h1 {
                            color: #dd2233;
                        }
                        
                        .container {
                            width: 600px;
                            margin: 0 auto;
                            padding: 20px;
                            background-color: #fff;
                            border-radius: 5px;
                            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
                        }
                    </style>
                </head>
                <body>
                    <div class="container">
                        <h1>Vážený zákazník,</h1>
                        <p>Boli ste úspešne zaregistrovaný v aplikácii Váženie alkoholu.</p>
                        <p>Vaše prihlasovacie údaje:</p>
                        <ul>
                            <li><strong>Login:</strong> ' . $login . '</li>
                            <li><strong>Heslo:</strong> ' . $password . '</li>
                            <li><strong>Email:</strong> ' . $email . '</li>
                        </ul>
                        <p>Ďakujeme za registráciu. V prípade otázok alebo problémov nás neváhajte kontaktovať cez kontaktný formulár v aplikácii.</p>
                    </div>
                </body>
                </html>';

            // Odoslanie e-mailu
            $mail->send();
        } catch (Exception $e) {
            echo "<br><br>";
            echo "Chyba pri odosielaní e-mailu: " . $mail->ErrorInfo;
        }
    } else {
        echo "<br><br>";
        echo "Registrácia zlyhala. Skúste to prosím znova.";
        include "back-register.php";
    }
}

include "footer.php";
mysqli_close($conn);
?>
