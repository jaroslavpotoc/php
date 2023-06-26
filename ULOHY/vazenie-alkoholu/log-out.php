<?php
session_start();
unset($_SESSION['users_id']); // Odstranili $_SESSION pouzivatel_id
header('Location: index.php'); // Automaticke presmerovanie na uvodnu stranku
?>