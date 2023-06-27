<?php
session_start();

if (!isset($_SESSION['users_id'])) {
    header('Location: log-in.php');
    exit;
}

// Pristup k databaze
require "db.php";

// Získanie user_role z databázy pre prihláseného používateľa
$userId = $_SESSION['users_id'];
$query = "SELECT user_role FROM users WHERE id = ?";
$statement = mysqli_prepare($conn, $query);
mysqli_stmt_bind_param($statement, "i", $userId);
mysqli_stmt_execute($statement);
mysqli_stmt_bind_result($statement, $userRole);
mysqli_stmt_fetch($statement);
mysqli_stmt_close($statement);

$_SESSION['user_role'] = $userRole;

$userRole = $_SESSION['user_role'];

if ($userRole !== 'admin' && $userRole !== 'user') {
    // Neplatná rola používateľa
    header('Location: error-page.php');
    exit;
}
?>
