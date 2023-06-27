<?php
include "header.php";
require "control-logins.php";
require "db.php";
echo "<h1>ODSTRÁNENÝ ZÁZNAM | važenia alkoholu </h1>";

$id = $_POST['id'];

$sql = "DELETE FROM udaje_tovar WHERE id = $id";

if (mysqli_query($conn, $sql)) {
    echo "Záznam s id=$id bol úspešne odstránený!";
} else {
    echo "Chyba pri odstraňovaní záznamu: " . mysqli_error($conn);
}

mysqli_close($conn);
include "back.php";
include "footer.php";
?>
