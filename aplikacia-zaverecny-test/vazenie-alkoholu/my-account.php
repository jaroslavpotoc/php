
<?php
session_start();
include "header.php";
require "control-logins.php";
require "db.php";

if (isset($_SESSION['users_id'])) {
    $userId = $_SESSION['users_id'];

    // Získanie používateľského mena z databázy
    $sql = "SELECT login FROM users WHERE id='$userId'";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $username = $row['login'];
        echo '<h1>MOJ ÚČET - NASTAVENIA</h1>';
        echo "<h4 style='text-align: center; color: #dd2233; text-transform: uppercase;'>Prihláseny používateľ: " . $username . "</h4>";

        // Vytvorenie tlačidiel pre zmenu hesla, zmenu e-mailu, zmenu prihlasovacieho mena a odstránenie účtu
        echo '<div class="button-container">';
        echo '<a href="account/change-password.php" class="custom-button black">Zmeniť heslo</a>';
        echo '<a href="account/change-email.php" class="custom-button green">Zmeniť e-mail</a>';
        echo '<a href="account/delete-account.php" class="custom-button red">Odstrániť účet</a>';
        echo '</div>';
    } else {
        echo "<p>Žiaden používateľ nie je prihlásený!</p>";
    }
}

include "back.php";
include "footer.php";
mysqli_close($conn);
?>
