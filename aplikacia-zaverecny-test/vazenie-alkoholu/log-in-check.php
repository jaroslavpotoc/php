<?php
session_start();
include "header.php";
require "db.php";
echo "<h1>OVERENIE ÚDAJOV | Važenia alkoholu</h1>";

$login = $_POST['login'];
$password = $_POST['password'];

// SQL query na overenie pouzivatela
$sql = "SELECT id, login, email FROM users WHERE (login='$login' OR email='$login') AND password='$password'";

$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    if ($row = mysqli_fetch_assoc($result)) {
        $username = $row['login'];
        if (empty($username)) {
            $username = $row['email'];
        }
        echo "Používateľ: $username <br> je prihlásený. Vráťte sa prosím na úvodnú stránku.";
        $_SESSION['users_id'] = $row['id'];
    }
} else {
    echo "Taký používateľ s prístupovými údajmi neexistuje!";
}

include "back.php";
include "footer.php";

?>