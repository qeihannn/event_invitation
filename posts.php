Siap 👍
Berikut kode kamu sudah saya **hapus semua komennya** tanpa mengubah logika:

```php
<?php
include '.includes/header.php';
?>

<div class="container-xxl flex-grow-1 container-p-y">
    <div class="row">
        <div class="col-md-10">
            <div class="card mb-4">
                <div class="card-body">
                    <form method="POST" action="proses_post.php" enctype="multipart/form-data">
                        <div class="mb-3">
                            <label for="post_title" class="form-label">NAMA TAMU</label>
                            <input type="text" class="form-control" name="post_title" required>
                        </div>

                        <div class="mb-3">
                            <label for="imageUrl" class="form-label">gambar undangan</label>
                            <input class="form-control" type="file" name="image" accept="image/*" />
                        </div>

                        <div class="mb-3">
                            <label for="acara_id" class="form-label">KATEGORI EVENT</label>
                            <select class="form-select" name="acara_id" required>
                                <option value="" selected disabled>Pilih salah satu</option>
                                <?php
                                $query = "SELECT * FROM acara";
                                $result = $conn->query($query);
                                if ($result->num_rows > 0) {
                                    while ($row = $result->fetch_assoc()) {
                                        echo "<option value='" . $row["acara_id"] . "'>" . $row["nama_acara"] . "</option>";
                                    }
                                }
                                ?>
                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="status_kehadiran" class="form-label">Status Kehadiran</label>
                            <select class="form-select" name="status_kehadiran" required>
                                <option value="" selected disabled>Pilih salah satu</option>
                                <option value="hadir">hadir</option>
                                <option value="tidak hadir">tidak hadir</option>
                                <option value="ragu-ragu">ragu-ragu</option>
                            </select>
                        </div>

                        <button type="submit" name="simpan" class="btn btn-primary">Simpan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
include '.includes/footer.php';
?>
