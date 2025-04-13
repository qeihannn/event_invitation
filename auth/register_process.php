<?php
require_once("../config.php");
// Mulai session
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $namaTamu = $_POST["namaTamu"];
    $email = $_POST["email"];
    
    

    $sql = "INSERT INTO tamu (namaTamu, email)
            VALUES ('$namaTamu', '$email')";
    if ($conn->query($sql) === TRUE) {
        // Simpan notifikasi ke dalam session
        $_SESSION['notification'] = [
            'type' => 'primary',
            'message' => 'Registrasi Berhasil!'
        ];
    } else {
        $_SESSION['notification'] = [
            'type' => 'danger',
            'message' => 'Gagal Registrasi: ' . mysqli_error($conn)
        ];
    }

    header('Location: login.php');
    exit();
}

$conn->close();
?>
