<?php
session_start();

if (!isset($_SESSION['users_id'])) {
    header('Location: log-in.php');
    exit;
}
