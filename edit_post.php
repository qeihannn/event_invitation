<?php
include 'config.php';

include '.includes/header.php';


$postIdToEdit = $_GET['post_id'];

$query = "SELECT * FROM undangan WHERE undangan_id = $postIdToEdit";
$result = $conn->query($query);

if ($result->num_rows > 0) {
    $undangan = $result->fetch_assoc();
} else {
    echo "Post not found.";
    exit();
}
?>

<div class="container-xxl flex-grow-
    <div class="row">
        <div class="col-md-10">
            <div class="card mb-4">
                <div class="card-body">
                    <form method="POST" action="proses_post.php" enctype="multipart/form-data">
 
                        <input type="hidden" name="post_id" value="<?php echo $postIdToEdit; ?>">

                        <div class="mb-3">
                            <label for="post_title" class="form-label">Judul Postingan</label>
                            <input type="text" class="form-control" id="post_title" name="post_title" value="<?php echo $undangan['post_title']; ?>" required>
                        </div>

                        <div class="mb-3">
                            <label for="formFile" class="form-label">Judul Postingan</label>
                            <input class="form-control" type="file" id="post_title" name="image_path" accept="iimage/*">
                            <?php if (!empty($undangan['image_path'])): ?>

                              <div class="mt-2">
                                <img src="<?= $undangan['image_path']; ?>" alt="Current Image" class="img-thumbnail" style="max-width: 200px;">
                              </div>
                              <?php endif; ?>
                        </div>


                        <div class="mb-3">
                            <label for="acara_id" class="form-label">Kategori</label>
                            <select class="form-select" id="acara_id" name="acara_id" required>
                                <option value="" selected disabled>Select one</option>
                                <?php

                                $queryCategories = "SELECT * FROM acara";
                                $resultCategories = $conn->query($queryCategories);

                                if ($resultCategories->num_rows > 0) {
                                    while ($row = $resultCategories->fetch_assoc()) {
                                        $selected = ($row["acara_id"] == $undangan['acara_id']) ? "selected" : "";
                                        echo "<option value='" . $row["acara_id"] . "' $selected>" . $row["nama_acara"] . "</option>";
                                    }
                                }
                                ?>
                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="content" class="form-label">Konten</label>
                            <textarea class="form-control" id="content" name="content" required><?php echo $undangan['content']; ?></textarea>
                        </div>


                        <button type="submit" name="update" class="btn btn-primary">Update</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
include '.includes/footer.php';
?>