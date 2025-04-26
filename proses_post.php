<?php
include 'config.php';
session_start();

// Cek apakah user sudah login
if (!isset($_SESSION["tamu_id"])) {
    header("Location: login.php");
    exit();
}

$tamuId = $_SESSION["tamu_id"];

if (isset($_POST['simpan'])) {
    // Mengambil data
    $postTitle = trim($_POST["post_title"]);
    $content = trim($_POST["content"]);
    $acaraId = intval($_POST["acara_id"]); // pastikan integer

    // Validasi sederhana
    if (empty($postTitle) || empty($content) || empty($acaraId)) {
        $_SESSION['notification'] = [
            'type' => 'danger',
            'message' => 'Semua field harus diisi.'
        ];
        header('Location: dashboard.php');
        exit();
    }

    // Setting direktori gambar
    $imageDir = "assets/img/uploads/";

    // Cek apakah ada file yang di-upload
    if (isset($_FILES["image"]) && $_FILES["image"]["error"] === UPLOAD_ERR_OK) {
        $imageTmp = $_FILES["image"]["tmp_name"];
        $imageName = uniqid() . "_" . basename($_FILES["image"]["name"]); // Buat nama unik
        $imagePath = $imageDir . $imageName;

        // Pindahkan file
        if (move_uploaded_file($imageTmp, $imagePath)) {
            // Gunakan prepared statement
            $stmt = $conn->prepare("INSERT INTO undangan (post_title, content, created_at, acara_id, tamu_id, image_path) VALUES (?, ?, NOW(), ?, ?, ?)");
            if ($stmt) {
                $stmt->bind_param("ssiis", $postTitle, $content, $acaraId, $tamuId, $imagePath);

                if ($stmt->execute()) {
                    $_SESSION['notification'] = [
                        'type' => 'primary',
                        'message' => 'Post berhasil ditambahkan!'
                    ];
                } else {
                    $_SESSION['notification'] = [
                        'type' => 'danger',
                        'message' => 'Error saat tambah post: ' . $stmt->error
                    ];
                }

                $stmt->close();
            } else {
                $_SESSION['notification'] = [
                    'type' => 'danger',
                    'message' => 'Gagal membuat statement: ' . $conn->error
                ];
            }
        } else {
            $_SESSION['notification'] = [
                'type' => 'danger',
                'message' => 'Gagal upload gambar.'
            ];
        }
    } else {
        $_SESSION['notification'] = [
            'type' => 'danger',
            'message' => 'Gambar tidak dipilih atau error saat upload.'
        ];
    }

    header('Location: dashboard.php');
    exit();
}
?>
