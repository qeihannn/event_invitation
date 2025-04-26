<?php
// Menyertakan header halaman
include '.includes/header.php';
?>

<div class="container-xxl flex-grow-1 container-p-y">
    <!-- Judul halaman -->
    <div class="row">
        <!-- Form untuk menambahkan postingan baru -->
        <div class="col-md-10">
            <div class="card mb-4">
                <div class="card-body">
                    <form method="POST" action="proses_post.php" enctype="multipart/form-data">
                        <!-- Input untuk judul postingan -->
                        <div class="mb-3">
                            <label for="post_title" class="form-label">NAMA PENGUNDANG</label>
                            <input type="text" class="form-control" name="post_title" required>
                        </div>

                        <!-- Input untuk mengunggah gambar -->
                        <div class="mb-3">
                            <label for="imageUrl" class="form-label">gambar undangan</label>
                            <input class="form-control" type="file" name="image" accept="image/*" />
                        </div>

                        <!-- Dropdown untuk memilih kategori -->
                        <div class="mb-3">
                            <label for="acara_id" class="form-label">KATEGORI EVENT</label>
                            <select class="form-select" name="acara_id" required>
                                <option value="" selected disabled>Pilih salah satu</option>
                                <?php
                                $query = "SELECT * FROM acara"; // Query untuk mengambil data kategori
                                $result = $conn->query($query); // Menjalankan query kategori
                                if ($result->num_rows > 0) { // Jika terdapat data kategori
                                    while ($row = $result->fetch_assoc()) { // Iterasi setiap kategori
                                        echo "<option value='" . $row["acara_id"] . "'>" . $row["nama_acara"] . "</option>";

                                    }
                
                                }
                                ?>
                            </select>
                        </div>

                        <!-- Textarea untuk konten postingan -->
                        <div class="mb-3">
                            <label for="content" class="form-label">DESKRIPSEN</label>
                            <textarea class="form-control" id="content" name="content" required></textarea>
                        </div>

                        <!-- Tombol submit -->
                        <button type="submit" name="simpan" class="btn btn-primary">Simpan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
// Menyertakan footer halaman
include '.includes/footer.php';
?>
