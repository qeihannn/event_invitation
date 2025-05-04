<?php
session_start(); // Memulai sesi PHP
require_once("../config.php"); // Mengimpor konfigurasi database

// Mengecek apakah request menggunakan metode POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Mengambil input dari form
    $namaTamu = $_POST["namaTamu"];
    $email = $_POST["email"];
    $roleInput = $_POST["role"];

    // Query untuk mencari tamu berdasarkan nama
    $sql = "SELECT * FROM tamu WHERE namaTamu='$namaTamu'";
    $result = $conn->query($sql);

    // Mengecek apakah data tamu ditemukan
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc(); // Mengambil data tamu sebagai array asosiatif

        // Memvalidasi email dan role yang dimasukkan
        if ($email === $row["email"] && $roleInput === $row["role"]) {
            // Menyimpan data tamu ke dalam session
            $_SESSION["namaTamu"] = $namaTamu;
            $_SESSION["tamu_id"] = $row["tamu_id"];
            $_SESSION["role"] = $row["role"];

            // Menyimpan notifikasi berhasil login
            $_SESSION['notification'] = [
                'type' => 'primary',
                'message' => 'selamat datang'
            ];

            // Mengarahkan pengguna ke halaman sesuai role
            if ($row["role"] == "user") {
                header('Location: ../posts.php'); // Halaman untuk user biasa
            } else {
                header('Location: ../dashboard_admin.php'); // Halaman untuk admin
            }
            exit();
        } else {
            // Email atau role salah
            $_SESSION['notification'] = [
                'type' => 'danger',
                'message' => 'nama Tamu atau email salah'
            ];
        }
    } else {
        // Nama tamu tidak ditemukan
        $_SESSION['notification'] = [
            'type' => 'danger',
            'message' => 'nama Tamu atau email salah'
        ];
    }

    // Redirect kembali ke halaman login jika gagal
    header('Location: login.php');
    exit();
}

$conn->close(); // Menutup koneksi ke database
?>