<?php include(".layouts/header.php"); ?> <!-- Menyertakan file header -->

<!-- Kartu Registrasi -->
<div class="card">
  <div class="card-body">

    <!-- Logo Aplikasi -->
    <div class="app-brand justify-content-center">
      <a href="index.html" class="app-brand-link gap-2">
        <span class="app-brand-logo demo"></span>
        <span class="app-brand-text demo text-uppercase fw-bolder">EvenT Invitation</span>
      </a>
    </div>
    <!-- /Logo -->

    <!-- Form Registrasi -->
    <form action="register_process.php" class="mb-3" method="POST">
      
      <!-- Input Nama -->
      <div class="mb-3">
        <label for="namaTamu" class="form-label">NAMA</label>
        <input type="text" class="form-control" name="namaTamu" placeholder="Masukkan namaTamu" autofocus/>
      </div>

      <!-- Input Email -->
      <div class="mb-3">
        <label for="Email" class="form-label">EMAIL</label>
        <input type="text" class="form-control" name="Email" placeholder="Masukkan Email" />
      </div>

      <!-- Pilihan Role -->
      <div class="mb-3">
        <label class="form-label" for="role">LOGIN SEBAGAI</label>
        <select name="role" class="form-control" required>
          <option value="user">Tamu</option>
          <option value="admin">Admin</option>
        </select>
      </div>

      <!-- Tombol Submit -->
      <button class="btn btn-primary d-grid w-100">Daftar</button>
    </form>

    <!-- Link ke halaman login jika sudah memiliki akun -->
    <p class="text-center">
      <span>Sudah memiliki akun?</span><a href="login.php"><span> Masuk</span></a>
    </p>

  </div>
</div>


<?php include(".layouts/footer.php"); ?>