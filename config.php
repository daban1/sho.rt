<?php

session_start();

if(!isset($_SESSION['badlogins'])) {
    $_SESSION['badlogins'] = 0;
}

$server = "localhost";
$username = "root";
$password ="";
$db = "short_url";
$baseURL = "http://sho.rt";

$conn = new mysqli($server, $username, $password, $db);

if($conn->connect_error) {
    die("Eroare la conecxiune. " . $conn->connect_error);
}
?>