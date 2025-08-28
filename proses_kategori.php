Oke, berikut kode kamu sudah saya hapus semua komennya tanpa mengubah logika sama sekali:

```php
<?php
include("config.php");
session_start();

if (isset($_POST['simpan'])) {
    $nama_acara = $_POST['nama_acara'];

    $query = "INSERT INTO acara (nama_acara) VALUES ('$nama_acara')";
    $exec = mysqli_query($conn, $query);

    if ($exec) {
        $_SESSION['notification'] = [
            'type' => 'primary',
            'message' => 'Kategori berhasil ditambahkan!'
        ];
    } else {
        $_SESSION['notification'] = [
            'type' => 'danger',
            'message' => 'Gagal menambahkan kategori: ' . mysqli_error($conn)
        ];
    }

    header('Location: kategori.php');
    exit();
}

if (isset($_POST['delete'])) {
    $catID = $_POST['catID'];

    $exec = mysqli_query($conn, "DELETE FROM acara WHERE acara_id='$catID'");

    if ($exec) {
        $_SESSION['notification'] = [
            'type' => 'primary',
            'message' => 'Kategori berhasil dihapus!'
        ];
    } else {
        $_SESSION['notification'] = [
            'type' => 'danger',
            'message' => 'Gagal menghapus kategori: ' . mysqli_error($conn)
        ];
    }

    header('Location: kategori.php');
    exit();
}

if (isset($_POST['update'])) {
    $catID = $_POST['catID'];
    $nama_acara = $_POST['nama_acara'];

    $query = "UPDATE acara SET nama_acara = '$nama_acara' WHERE acara_id='$catID'";
    $exec = mysqli_query($conn, $query);

    if ($exec) {
        $_SESSION['notification'] = [
            'type' => 'primary',
            'message' => 'Kategori berhasil diperbarui!'
        ];
    } else {
        $_SESSION['notification'] = [
            'type' => 'danger',
            'message' => 'Gagal memperbarui kategori: ' . mysqli_error($conn)
        ];
    }

    header('Location: kategori.php');
    exit();
}
