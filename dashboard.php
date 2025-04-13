<?php
include (".includes/header.php");
$title = "Dashboard";
//menyertakan file untuk menampilkan notifikasi 
include '.includes/toast_notification.php';
?>
<div class="container-xxl flex-grow-1 container-p-y">
    <!--card untuk menampilkan table postingan -->
    <div class="card">
        <!--table dengan baris yang dapat di hover --> 
        <div class="card">
            <!--header table --> 
            <div class="card-header d-flex justify-content-between-align-items-center">
                <h4>Semua Postingan</h4>
            </div>
            <div class="card-body">
                <!--table responsif --> 
                <div class="table-responsive text-nowrap">
                    <table id="datatable" class="table table-hover">
                        <thead>
                            <tr class="text-center">
                                <th width="50px">#</th>
                                <th>Judul Post</th>
                                <th>Penulis</th>
                                <th>Kategori</th>
                                <th width="150px">Pilihan</th>
                            </tr>
                        </thead>
                        <tbody class="table-border-bottom-0">
<!-- menampilkan data dari table database -->
<?php
  $index = 1; //variabel untuk nomor urut
  /*query untuk nomor urut 
  post, users, dan categories */
  $query = "SELECT posts.*, users.name as username,
  categories.category_name FROM posts
  INNER JOIN users ON posts.user_id = users.user_id
  LEFT JOIN categories ON posts.category_id = categories.category_id
  WHERE posts.user_id = $userId";
  //eksekusi query
  $exec = mysqli_query($conn, $query);

  //perulangan untuk menampilkan seiap baris hasi query
  while ($post = mysqli_fetch_assoc($exec)) :
  ?>
  <tr>
    <td><?= $index++; ?></td>
    <td><?= $post['post_title']; ?></td>
    <td><?= $post['username']; ?></td>
    <td><?= $post['category_name']; ?></td>
    <td>
        <div class="dropdown">
            <!-- tombol dropdown untuk pilihan -->
            <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                <i class="bx bx-dots-vertical-rounded"></i>
            </button>
            <!-- menu dropdown -->
            <div class="dropdown-menu">
                <!--pilihan edit -->
                <a href="edit_post.php?post_id=<?= $post['id_post']; ?>" class="dropdown-item">
                 <i class="bx bx-edit-alt me-2"></i> Edit 
                </a>
                <!-- pilihan delete -->
                <a href="#" class="dropdown-item" data-bs-toggle="modal"
                data-bs-target="#deletePost_<?= $post['id_post']; ?>">
                <i class="bx bx-trash me-2"></i>delete
                </a>
            </div>
        </div>
    </td>
  </tr>
  <!-- modal untuk hapus konten blog -->
  <div class="modal fade" id="deletePost_<?= $post['id_post']; ?>" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Hapus Post?</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <form action="proses_post.php" method="POST">
                    <div>
                        <p>Tindakan ini tidak bisa dibatalkan.</p>
                        <input type="hidden" name="postID" value="<?= $post['id_post']; ?>">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Batal</button>
                        <button type="submit" name="delete" class="btn btn-primary">Hapus</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
  </div>
<?php endwhile; ?>
</tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
include (".includes/footer.php");
?>