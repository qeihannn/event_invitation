<?php
//menghubungkan file konfigurasi database
include 'config.php';

//mulai sesi
session_start();

//mendapatkan id pengguna
$tamuId = $_SESSION["tamu_id"];


if (isset($_POST['simpan'])) {
    //mendapatkan data dari form
    $postTitle = $_POST["post_title"];
    $content = $_POST["content"];
    $acaraId = $_POST["acara_id"];
    $status_kehadiran = $_POST["status_kehadiran"];

    //mengatur direktori
    $imageDir = "assets/img/uploads/";
    $imageName = $_FILES["image"]["name"];
    $imagePath = $imageDir . basename($imageName);

    //memindahkan file gambar yang di unggah ke direktori
    if (move_uploaded_file($_FILES["image"]["tmp_name"], $imagePath)) {
        // jika unggahan berhasil masukkan
        // data postingan ke dalam database
        $query = "INSERT INTO undangan (post_title, content, created_at, acara_id, tamu_id, image_path, status_kehadiran) 
VALUES ('$postTitle', '$content', NOW(), $acaraId, $tamuId, '$imagePath', '$status_kehadiran')";


        
    if ($conn->query($query) === TRUE) {
            // notifikasi berhasil jika postingan berhasil ditambahkan
            $_SESSION['notification'] = [
                'type' => 'primary',
                'message' => 'Post successfully added.'
            ];
        } else {
            
            $_SESSION['notification'] = [
                'type' => 'danger',
                'message' => 'Error adding post: ' . $conn->error
            ];
        }
    } else {
        
        $_SESSION['notification'] = [
            'type' => 'danger',
            'message' => 'Failed to upload image.'
        ];
    }

    // arahkan ke halaman dashboard setelah selesai
    header('Location: dashboard.php');
    exit();
}

//proses penghapusan postingan
if (isset($_POST['delete'])) {
    //mengambil id post
    $postID = $_POST['postID'];

    //query untuk menghapus post 
    $exec = mysqli_query($conn, "DELETE FROM undangan WHERE undangan_id='$postID'");

    //menyimpan notifikasi keberhasilan atau kegagalan
    if ($exec) {
        $_SESSION['notification'] = [
            'type' => 'primary',
            'message' => 'Post successfully deleted.'
        ];
    } else {
        $_SESSION['notification'] = [
            'type' => 'danger',
            'message' => 'Error deleting post: '. mysqli_error($conn)
        ];
    }

    // kembali ke halaman dashboard
    header('Location: dashboard.php');
    exit();
}

// menangani pembaruan data
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['update'])) {
    //mendapatkan data dari form
    $postId = $_POST['post_id'];
    $postTitle = $_POST["post_title"];
    $content = $_POST["content"];
    $acaraId = $_POST["acara_id"];
    $imageDir = "assets/img/uploads/";

    //memeriksa file gambar
    if (!empty($_FILES["image_path"]["name"])) {
        $imageName = $_FILES["image_path"]["name"];
        $imagePath = $imageDir . $imageName;

        //pindahkan file baru ke direktori
        move_uploaded_file($_FILES["image_path"]["tmp_name"], $imagePath);

        //hapus gambar lama
        $queryOldImage = "SELECT image_path FROM undangan WHERE undangan_id = $postId";
        $resultOldImage = $conn->query($queryOldImage);
        if ($resultOldImage->num_rows > 0) {
            $oldImage = $resultOldImage->fetch_assoc()['image_path'];
            if (file_exists($oldImage)) {
                unlink($oldImage);
            }
        }
    } else {
        // jika tidak ada file baru gunakan file lama
        $imagePathQuery = "SELECT image_path FROM undangan WHERE undangan_id = $postId";
        $result = $conn->query($imagePathQuery);
        $imagePath = ($result->num_rows > 0) ? $result->fetch_assoc()['image_path'] : null;
    }

    //update data postingan di database
    $queryUpdate = "UPDATE undangan SET post_title = '$postTitle',
    content = '$content', acara_id = $acaraId,
    image_path = '$imagePath' WHERE undangan_id = $postId";

    if ($conn->query($queryUpdate) === TRUE) {
        //notifikasi berhasil
        $_SESSION['notification'] = [
            'type' => 'primary',
            'message'=>  'Postingan berhasil diperbarui.'
        ];
    } else {
        //notifikasi gagal
        $_SESSION['notification'] = [
            'type' => 'danger',
            'message'=>  'Gagal memperbarui postingan.'
        ];
    }

    //arahkan ke dashboard
    header('Location: dashboard.php');
    exit();
}