<?php
require "../PHPMailer-master/src/PHPMailer.php";
require "../PHPMailer-master/src/SMTP.php";
require "../PHPMailer-master/src/Exception.php";

use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\PHPMailer;

$errorMessage = "";
$successMessage = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["error-name"];
    $email = $_POST["error-email"];
    $description = $_POST["error-description"];

    $to = "info@jpgeneration.sk";
    $subject = "Hlásenie chyby";

    require "db.php";

    // Kontrola pripojenia k databáze
    if ($conn->connect_error) {
        die("Chyba pri pripájaní k databáze: " . $conn->connect_error);
    }

    // Vloženie údajov do databázy
    $sql = "INSERT INTO error_reports (name, email, description) VALUES ('$name', '$email', '$description')";

    if ($conn->query($sql) === TRUE) {
        $successMessage = "Hlásenie chyby bolo úspešne odoslané. Ďakujeme!";
    } else {
        $errorMessage = "Chyba pri ukladaní údajov do databázy: " . $conn->error;
    }

    $conn->close();

    $mail = new PHPMailer(true);

    try {
        // Konfigurácia odosielania e-mailu
        $mail->isSMTP();
        $mail->Host = 'smtp.m1.websupport.sk';
        $mail->SMTPAuth = true;
        $mail->Username = 'info@jpgeneration.sk';
        $mail->Password = 'xokjig-kyBdax-4sonwe';
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port = 587;

        $mail->setFrom('info@jpgeneration.sk', 'Hlásenie chyby');
        $mail->addAddress($to);

        $mail->isHTML(true);
        $mail->CharSet = 'UTF-8';

        $mail->Subject = $subject;
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
                    <h1>Hlásenie chyby</h1>
                    <p><strong>Meno:</strong> ' . $name . '</p>
                    <p><strong>E-mail:</strong> ' . $email . '</p>
                    <p><strong>Popis chyby:</strong></p>
                    <p>' . $description . '</p>
                </div>
            </body>
            </html>';

        if (!$mail->send()) {
            $errorMessage .= " Chyba pri odosielaní e-mailu: " . $mail->ErrorInfo;
        }
    } catch (Exception $e) {
        $errorMessage .= " Chybová správa: " . $e->getMessage();
    }
}


include('header.php');

echo $successMessage;
echo $errorMessage;

include('back.php');
include('footer.php');
?>
