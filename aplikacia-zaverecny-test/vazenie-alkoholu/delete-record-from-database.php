<?php
include "header.php";
require "control-logins.php";
require "db.php";
echo "<h1>ODSTRÁNENÝ ZÁZNAM | važenia alkoholu </h1>";

if ($_SESSION['user_role'] === 'admin') {
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $id = $_POST['id'];

        $sql = "DELETE FROM udaje_tovar WHERE id = $id";

        if (mysqli_query($conn, $sql)) {
            echo "Záznam s id: $id bol úspešne odstránený!";
        } else {
            echo "Chyba pri odstraňovaní záznamu: " . mysqli_error($conn);
        }
    }
    include "edit-next-record.php";
} else {
    echo "Nemáte oprávnenie na tento krok. Kontaktujte administrátora.";
}

include "back.php";
include "footer.php";
mysqli_close($conn);
?>
