<?php include(".layouts/header.php"); ?>
<!-- Register Card -->
<div class="card">
  <div class="card-body">
    <!-- Logo -->
    <div class="app-brand justify-content-center">
      <a href="index.html" class="app-brand-link gap-2">
        <span class="app-brand-logo demo"></span>
        <span class="app-brand-text demo text-uppercase fw-bolder">Event Invitation</span>
      </a>
    </div>
    <!-- /Logo -->
    <form action="register_process.php" class="mb-3" method="POST">
      <div class="mb-3">
        <label for="namaTamu" class="form-label">NAMA</label>
        <input type="text" class="form-control" name="namaTamu" placeholder="Masukkan namaTamu" autofocus/>
      </div>
      <div class="mb-3">
        <label for="email" class="form-label">EMAIL</label>
        <input type="text" class="form-control" name="email" placeholder="Masukkan email" />

      </div>
      <button class="btn btn-primary d-grid w-100">Daftar</button>
    </form>
    <p class="text-center">
      <span>Sudah memiliki akun?</span><a href="login.php"><span> Masuk</span></a>
    </p>
  </div>
</div>
<!-- Register Card -->
<?php include(".layouts/footer.php"); ?>