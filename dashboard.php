<?php
include (".includes/header.php"); 
$title = "Dashboard";

include '.includes/toast_notification.php';
?>

<div class="container-xxl flex-grow-1 container-p-y">
    <div class="card">
        <div class="card">

            <div class="card-header d-flex justify-content-between align-items-center">
                <h4>INVITATION</h4>
            </div>

            <div class="card-body">
                <div class="table-responsive text-nowrap">
                    <table id="datatable" class="table table-hover">
                        <thead>
                            <tr class="text-center">
                                <th width="50px">#</th>
                                <th>Nama Tamu</th>
                                <th>Pengundang</th>
                                <th>Kategori event</th>
                                <th>Foto Undangan</th>
                                <th>Keterangan Tamu</th>
                                <th width="150px">Pilihan</th>
                            </tr>
                        </thead>
                        <tbody class="table-border-bottom-0">

<?php
$index = 1;

$query = "SELECT undangan.*, tamu.namaTamu as namaTamu, acara.nama_acara FROM undangan
          INNER JOIN tamu ON undangan.tamu_id = tamu.tamu_id
          LEFT JOIN acara ON undangan.acara_id = acara.acara_id
          WHERE undangan.tamu_id = $tamuId";


$exec = mysqli_query($conn, $query);

while ($undangan = mysqli_fetch_assoc($exec)) :
?>
<tr>
    <td><?= $index++; ?></td>
    <td><?= $undangan['post_title']; ?></td>
    <td><?= $undangan['namaTamu']; ?></td>
    <td><?= $undangan['nama_acara']; ?></td>
    <td><img src="<?= $undangan['image_path']; ?>" alt="" width="40%"></td>
    <td><?= $undangan['status_kehadiran']; ?></td>

    <td>
        <div class="dropdown">
            <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                <i class="bx bx-dots-vertical-rounded"></i>
            </button>
    
            <div class="dropdown-menu">
                <a href="edit_post.php?post_id=<?= $undangan['undangan_id']; ?>" class="dropdown-item">
                    <i class="bx bx-edit-alt me-2"></i> Edit
                </a>
                <a href="#" class="dropdown-item" data-bs-toggle="modal"
                    data-bs-target="#deletePost_<?= $undangan['undangan_id']; ?>">
                    <i class="bx bx-trash me-2"></i> Delete
                </a>
            </div>
        </div>
    </td>
</tr>

<!-- Modal Konfirmasi Hapus -->
<div class="modal fade" id="deletePost_<?= $undangan['undangan_id']; ?>" tabindex="-1" aria-hidden="true">
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
                        <!-- Input tersembunyi untuk mengirim ID post -->
                        <input type="hidden" name="postID" value="<?= $undangan['undangan_id']; ?>">
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

<?php include(".includes/footer.php"); ?>