Oke 👍, berikut kode kamu sudah saya **hapus semua komennya** tanpa mengubah logika program sama sekali:

```php
<?php
include '.includes/header.php';
include '.includes/toast_notification.php';
?>

<div class="container-xxl flex-grow-1 container-p-y">
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h4>Kategori Event </h4>
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
<?php
$index = 1;
$query = "SELECT * FROM acara";
$exec = mysqli_query($conn, $query);
while ($acara = mysqli_fetch_assoc($exec)) :
?>
<tr>
    <td><?= $index++; ?></td>
    <td><?= $acara['nama_acara']; ?></td>
    <td>
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

<div id="editCategory_<?= $acara['acara_id']; ?>" class="modal fade" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Update Data Kategori</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>
      <div class="modal-body">
        <form action="proses_kategori.php" method="POST">
          <input type="hidden" name="catID" value="<?= $acara['acara_id']; ?>">
          <div class="form-group">
            <label for="nama_acara">Nama Kategori</label>
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

<div style="display: flex; justify-content: flex-center; gap: 2rem;">
  <div class="border border-3">
    <div class="card" style="width: 14rem;">
      <img src="https://pernikahan.or.id/wp-content/uploads/2023/03/canva-putih-merah-bunga-mewah-undangan-pernikahan-Hkh1TyGPAgE-1.jpg" class="card-img-top" alt="">
      <div class="card-body">
        <p class="text-center">WEDING</p>
      </div>
    </div>
  </div>
  <div class="border border-3">
    <div class="card" style="width: 14rem;">
      <img src="https://imgv2-2-f.scribdassets.com/img/document/426520668/original/4cf3183ee3/1680082866?v=1" class="card-img-top" alt="">
      <div class="card-body">
        <p class="text-center">MEETING</p>
      </div>
    </div>
  </div>
  <div class="border border-3">
    <div class="card" style="width: 14rem;">
      <img src="http://1.bp.blogspot.com/-V1bBCupdAjg/Ula052qYfmI/AAAAAAAAF5g/xIZ0ljEToHE/s1600/Surat+Undangan+Ulang+Tahun+1.jpg" class="card-img-top" alt="">
      <div class="card-body">
        <p class="text-center">BIRTHDAY</p>
      </div>
    </div>
  </div>
</div>
</div>
</div>
<?php include '.includes/footer.php'; ?>

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
