<?php
require_once("../config.php"); // Menghubungkan ke file konfigurasi database
session_start(); // Memulai sesi PHP untuk menyimpan notifikasi atau data pengguna

// Mengecek apakah request dilakukan melalui metode POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Mengambil data dari form registrasi
    $namaTamu = $_POST["namaTamu"];
    $email = $_POST["email"];
    $roleInput = $_POST["role"];
    
    // Query untuk menyimpan data tamu baru ke dalam database
    $sql = "INSERT INTO tamu (namaTamu, email, role)
            VALUES ('$namaTamu', '$email', '$roleInput')";

    // Mengeksekusi query dan mengecek apakah berhasil
    if ($conn->query($sql) === TRUE) {
        // Jika berhasil, simpan notifikasi sukses ke session
        $_SESSION['notification'] = [
            'type' => 'primary',
            'message' => 'Registrasi Berhasil!'
        ];
    } else {
        // Jika gagal, simpan notifikasi error ke session
        $_SESSION['notification'] = [
            'type' => 'danger',
            'message' => 'Gagal Registrasi: ' . mysqli_error($conn)
        ];
    }

    // Arahkan kembali ke halaman login
    header('Location: login.php');
    exit();
}

$conn->close(); // Menutup koneksi database
?>