<?php
include 'config.php';

session_start();

$tamuId = $_SESSION["tamu_id"];


if (isset($_POST['simpan'])) {

    $postTitle = $_POST["post_title"];
    $content = $_POST["content"];
    $acaraId = $_POST["acara_id"];
    $status_kehadiran = $_POST["status_kehadiran"];


    $imageDir = "assets/img/uploads/";
    $imageName = $_FILES["image"]["name"];
    $imagePath = $imageDir . basename($imageName);

    if (move_uploaded_file($_FILES["image"]["tmp_name"], $imagePath)) {
        $query = "INSERT INTO undangan (post_title, content, created_at, acara_id, tamu_id, image_path, status_kehadiran) 
VALUES ('$postTitle', '$content', NOW(), $acaraId, $tamuId, '$imagePath', '$status_kehadiran')";


        
    if ($conn->query($query) === TRUE) {

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

    header('Location: dashboard.php');
    exit();
}


if (isset($_POST['delete'])) {

    $postID = $_POST['postID'];
    $exec = mysqli_query($conn, "DELETE FROM undangan WHERE undangan_id='$postID'");
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

    header('Location: dashboard.php');
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['update'])) {
    $postId = $_POST['post_id'];
    $postTitle = $_POST["post_title"];
    $content = $_POST["content"];
    $acaraId = $_POST["acara_id"];
    $imageDir = "assets/img/uploads/";

    if (!empty($_FILES["image_path"]["name"])) {
        $imageName = $_FILES["image_path"]["name"];
        $imagePath = $imageDir . $imageName;

        move_uploaded_file($_FILES["image_path"]["tmp_name"], $imagePath);

        $queryOldImage = "SELECT image_path FROM undangan WHERE undangan_id = $postId";
        $resultOldImage = $conn->query($queryOldImage);
        if ($resultOldImage->num_rows > 0) {
            $oldImage = $resultOldImage->fetch_assoc()['image_path'];
            if (file_exists($oldImage)) {
                unlink($oldImage);
            }
        }
    } else {
        $imagePathQuery = "SELECT image_path FROM undangan WHERE undangan_id = $postId";
        $result = $conn->query($imagePathQuery);
        $imagePath = ($result->num_rows > 0) ? $result->fetch_assoc()['image_path'] : null;
    }

    $queryUpdate = "UPDATE undangan SET post_title = '$postTitle',
    content = '$content', acara_id = $acaraId,
    image_path = '$imagePath' WHERE undangan_id = $postId";

    if ($conn->query($queryUpdate) === TRUE) {

        $_SESSION['notification'] = [
            'type' => 'primary',
            'message'=>  'Postingan berhasil diperbarui.'
        ];
    } else {

        $_SESSION['notification'] = [
            'type' => 'danger',
            'message'=>  'Gagal memperbarui postingan.'
        ];
    }
    header('Location: dashboard.php');
    exit();
}