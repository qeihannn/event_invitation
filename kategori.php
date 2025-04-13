<?php
// Memasukkan header halaman
include '.includes/header.php';
// Menyertakan file untuk menampilkan notifikasi (jika ada)
include '.includes/toast_notification.php';
?>

<div class="container-xxl flex-grow-1 container-p-y">
    <!-- Tabel data kategori -->
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h4>Kategori Event </h4>
            <!-- Tombol untuk menambah kategori baru -->
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addacara">
                Tambah Kategori Event
            </button>
        </div>
        <div class="card-body">
            <div class="table-responsive text-nowrap">
                <table id="datatable" class="table table-hover">
                    <thead>
                        <tr class="text-center">
                            <th width="50px">#</th>
                            <th>EVENT</th>
                            <th width="150px">Pilihan</th>
                        </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
<!-- Mengambil data kategori dari database -->
<?php
$index = 1;
$query = "SELECT * FROM acara";
$exec = mysqli_query($conn, $query);
while ($acara = mysqli_fetch_assoc($exec)) :
?>
<tr>
    <!-- Menampilkan nomor, nama kategori, dan opsi -->
    <td><?= $index++; ?></td>
    <td><?= $acara['nama_acara']; ?></td>
    <td>
        <!-- Dropdown untuk opsi Edit dan Delete -->
        <div class="dropdown">
            <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                <i class="bx bx-dots-vertical-rounded"></i>
            </button>
            <div class="dropdown-menu">
                <a href="#" class="dropdown-item" data-bs-toggle="modal" data-bs-target="#editCategory_<?= $acara['acara_id']; ?>">
                    <i class="bx bx-edit-alt me-2"></i> Edit
                </a>
                <a href="#" class="dropdown-item" data-bs-toggle="modal" data-bs-target="#deleteCategory_<?= $acara['acara_id']; ?>">
                    <i class="bx bx-trash me-2"></i> Delete
                </a>
            </div>
        </div>
    </td>
</tr>

<!-- Modal untuk Hapus Data Kategori -->
<div class="modal fade" id="deleteCategory_<?= $acara['acara_id']; ?>" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Hapus Kategori?</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>
      <div class="modal-body">
        <form action="proses_kategori.php" method="POST">
          <div>
            <p>Tindakan ini tidak bisa dibatalkan.</p>
            <input type="hidden" name="catID" value="<?= $acara['acara_id']; ?>">
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


<!-- Modal untuk Update Data Kategori -->
<div id="editCategory_<?= $acara['acara_id']; ?>" class="modal fade" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Update Data Kategori</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>
      <div class="modal-body">
        <form action="proses_kategori.php" method="POST">
          <!-- Input tersembunyi untuk menyimpan ID kategori -->
          <input type="hidden" name="catID" value="<?= $acara['acara_id']; ?>">
          <div class="form-group">
            <label for="nama_acara">Nama Kategori</label>
            <!-- Input untuk nama kategori -->
            <input 
              type="text" 
              value="<?= $acara['nama_acara']; ?>" 
              name="nama_acara" 
              class="form-control" 
            >
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
            <button type="submit" name="update" class="btn btn-warning">Update</button>
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
<?php include '.includes/footer.php'; ?>

<!-- Modal untuk Tambah Data Kategori -->
<div class="modal fade" id="addacara" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Tambah Data</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <form action="proses_kategori.php" method="POST">
                    <div>
                      
                        <label for="namaKategori" class="form-label">Nama Kategori</label>
                        <!-- Input untuk nama kategori baru -->
                        <input type="text" class="form-control" name="nama_acara" required/>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Batal</button>
                        <button type="submit" name="simpan" class="btn btn-primary">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>