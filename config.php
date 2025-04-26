<?php
$host = "localhost";
$username = "root";
$password = "";
$database = "event_invitation";

$conn = mysqli_connect($host, $username, $password, $database);

if ($conn->connect_error) {
    die("DATABASE GAGAL TERKONEKSI: " . $conn->connect_error);
}
?>