<?php
include (".includes/header.php");
$title = "Dashboard";
// Menyertakan file untuk menampilkan notifikasi (jika ada)
include '.includes/toast_notification.php';
?>

<div class="container-xxl flex-grow-1 container-p-y">
    <!-- Card untuk menampilkan tabel postingan -->
    <div class="card">
        <!-- Tabel dengan baris yang dapat di-hover -->
        <div class="card">
            <!-- Header Tabel -->
            <div class="card-header d-flex justify-content-between align-items-center">
                <h4>INVITATION</h4>
            </div>
            <div class="card-body">
                <!-- Tabel responsif -->
                <div class="table-responsive text-nowrap">
                    <table id="datatable" class="table table-hover">
            <thead >
                <tr class="text-center">
                     <th width="50px">#</th>
                     <th>Nama Tamu</th>
                     <th>Pengundang</th>
                     <th>Kategori event</th>
                     <th>foto undangan</th>
                     <th>keterangan tamu</th>
                     <th width="150px">Pilihan</th>
                </tr>
            </thead>
       <tbody class="table-border-bottom-0">
<!-- Menampilkan data dari tabel database -->
<?php
$index = 1; // Variabel untuk nomor urut
// Query untuk mengambil data dari tabel undangan, tamu, dan acara
$query = "SELECT undangan.*, tamu.namaTamu as namaTamu, acara.nama_acara FROM undangan
          INNER JOIN tamu ON undangan.tamu_id = tamu.tamu_id
          LEFT JOIN acara ON undangan.acara_id = acara.acara_id
          WHERE undangan.tamu_id = $tamuId";
// Eksekusi query
$exec = mysqli_query($conn, $query);

// Perulangan untuk menampilkan setiap baris hasil query
while ($undangan = mysqli_fetch_assoc($exec)) :
?>
<tr>
    <td><?= $index++; ?></td>
    <td><?= $undangan['post_title']; ?></td>
    <td><?= $undangan['namaTamu']; ?></td>
    <td><?= $undangan['nama_acara']; ?></td>
    <td><img src="<?= $undangan['image_path']; ?>" alt="" width="40%"></td>
    <td>
        <select name="status_kehadiran" required>           
            <option value="hadir">hadir</option>
            <option value="tidak hadir">tidak hadir</option>
            <option value="ragu-ragu">ragu-ragu</option>
        </select>
    </td>
    <td>
        <div class="dropdown">
            <!-- Tombol dropdown untuk Pilihan -->
            <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                <i class="bx bx-dots-vertical-rounded"></i>
            </button>
            <!-- Menu dropdown -->
            <div class="dropdown-menu">
                <!-- Pilihan Edit -->
                <a href="edit_post.php?post_id=<?= $undangan['undangan_id']; ?>" class="dropdown-item">
                    <i class="bx bx-edit-alt me-2"></i> Edit
                </a>

<!-- Pilihan Delete -->
<a href="#" class="dropdown-item" data-bs-toggle="modal"
    data-bs-target="#deletePost_<?= $undangan['undangan_id']; ?>">
    <i class="bx bx-trash me-2"></i> Delete
</a>
</div>
        </div>
        
    </td>
    
</tr>


<!-- Modal untuk Hapus Konten Blog -->
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
<!-- Akhir tabel dengan baris yang dapat di-hover -->
</div>
</div>

<?php
include (".includes/footer.php");
?>
