<?php
// menyertakan header halaman
include '.includes/header.php';
?>
<div class="container-xxl flex-grow-1 container-p-y">
    <div class="row">
        <div class="col-md-10">
            <div class="card mb-4">
                <div class="card-body">
                    <form method="POST" action="proses_post.php"
                     enctype="multipart/form-data">

                     <div class="mb-3">
                        <label for="post_title" class="form-label">Judul Postingan</label>
                        <input type="text" class="form-control"name="post_title" required>

                     </div>

                     <div class="mb-3">
                        <label for="formFile" class="form-label">Unggah Gambar</label>
                        <input class="form-control" type="file" name="image" accept="image/*" />
                     </div>
                     <div class="mb-3">
                        <label for="category_id" class="form-label">Kategori</label>
                        <select class="form-select" name="category_id" required>
                            <!-- mengambil data kategori dari database -->
                            <option value="" selected disabled>Pilih salah satu</option>

                            <?php
                            $query = "SELECT * FROM categories"; //query untuk mengambil data
                            $result = $conn->query($query); //menjalankan query
                            if ($result->num_rows > 0) { //jika terdapat data kategori
                             while ($row = $result->fetch_assoc()) { // iterasi setiap kategori
                                echo "<option value='" . $row["category_id"] . "'>" . $row["category_name"] . "</option>";
                            }
                        }
                        ?>
                        </select>
                     </div>
                     <div class="mb-3">
                        <label for="content" class="form-label">Konten</label>
                        <textarea class="form-control" id="content" name="content" required></textarea>
                     </div>
                     <button type="submit" name="simpan" class="btn btn-primary">Simpan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
//menyertakan footer halaman
include '.includes/footer.php';
?>