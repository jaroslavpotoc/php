<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "vazenie_schema";

$conn = mysqli_connect($servername, $username, $password, $dbname);
if (!$conn) {
    die("Neúspešné pripojenie do databázy: " . mysqli_connect_error());
}
