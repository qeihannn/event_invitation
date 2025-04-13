<?php
session_start();
require_once("../config.php");

if($_SERVER["REQUEST_METHOD"] == "POST") {
    $namaTamu = $_POST["namaTamu"];
    $email = $_POST["email"];

    $sql = "SELECT * FROM tamu WHERE namaTamu='$namaTamu'";
    $result = $conn->query($sql);

    if ($result->num_rows> 0){
        $row = $result->fetch_assoc();

        if ($email === $row["email"]) {
            $_SESSION["namaTamu"] = $namaTamu;
            $_SESSION["status_kehadiran"] = $row["status_kehadiran"];
            $_SESSION["tamu_id"] = $row["tamu_id"];

            $_SESSION['notification'] = [
                'type' => 'primary',
                'message' => 'selamat datang'
            ];
            header('Location: ../dashboard.php');
            exit();
        }else {
            $_SESSION['notification'] = [
                'type' => 'danger',
                'message' => 'namaTamu atau email salah'
            ];
        }
    } else {
        $_SESSION['notification'] = [
            'type' =>'danger',
            'message' => 'namaTamu atau email salah',

        ];
    }
    header('Location: login.php');
    exit();
}
$conn->close();
?>