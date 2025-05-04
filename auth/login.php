<?php include(".layouts/header.php"); ?> <!-- Menyertakan file header -->

<!-- Form Login -->
<div class="card">
  <div class="card-body">
    
    <!-- Logo atau Judul Aplikasi -->
    <div class="app-brand justify-content-center">
      <a href="index.html" class="app-brand-link gap-2">
        <span class="app-brand-text demo text-uppercase fw-bolder">Event Invitation</span>
      </a>
    </div>
    <!-- /Logo -->

    <h4 class="mb-2"></h4> <!-- Heading kosong, bisa diisi dengan pesan selamat datang atau instruksi -->

    <!-- Form untuk login tamu/admin -->
    <form class="mb-3" action="login_auth.php" method="POST">
      
      <!-- Input Nama -->
      <div class="mb-3">
        <label class="form-label">NAMA</label>
        <input type="text" class="form-control" name="namaTamu"
          placeholder="Enter your nama" autofocus required />
      </div>

      <!-- Input Email -->
      <div class="mb-3 form-email-toggle">
        <div class="d-flex justify-content-between">
          <label class="form-label" for="email">EMAIL</label>
        </div>       

        <div class="input-group input-group-merge">
          <input type="email" class="form-control" name="email"
            placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;" 
            aria-describedby="email" required />
          <!-- Placeholder berupa titik-titik untuk menyederhanakan tampilan -->
          <span class="input-group-text cursor-pointer"></span> <!-- Placeholder span, bisa diisi ikon -->
        </div>

        <!-- Dropdown Role Login -->
        <div class="mb-3">
          <label class="form-label" for="role">LOGIN SEBAGAI</label>
          <select name="role" class="form-control" required>
            <option value="user">Tamu</option>
            <option value="admin">Admin</option>
          </select>
        </div>
      </div>

      <!-- Tombol Submit -->
      <div class="mb-3">
        <button class="btn btn-primary d-grid w-100" type="submit">MASUK</button>
      </div>

    </form>

    <!-- Link ke halaman registrasi -->
    <p class="text-center">
      <span>AKUN</span><a href="register.php"><span> DAFTAR</span></a>
    </p>

  </div>
</div>


<?php include(".layouts/footer.php"); ?>