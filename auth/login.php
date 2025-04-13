<?php include(".layouts/header.php"); ?>
<!-- Register -->
<div class="card">
  <div class="card-body">
    <!-- Logo -->
    <div class="app-brand justify-content-center">
      <a href="index.html" class="app-brand-link gap-2">
        <span class="app-brand-text demo text-uppercase fw-bolder">event invitation</span>
      </a>
    </div>
    <!-- /Logo -->
    <h4 class="mb-2"></h4>
    <form class="mb-3" action="login_auth.php" method="POST">
      <div class="mb-3">
        <label class="form-label">NAMA</label>
        <input type="text" class="form-control" name="namaTamu"
          placeholder="Enter your nama" autofocus required />
      </div>
      <div class="mb-3 form-email-toggle">
        <div class="d-flex justify-content-between">
          <label class="form-label" for="email">EMAIL</label>
        </div>
        <div class="input-group input-group-merge">
          <input type="email" class="form-control" name="email"
            placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
            aria-describedby="email" />
          <span class="input-group-text cursor-pointer"></span>
        </div>
      </div>
      <div class="mb-3">
        <button class="btn btn-primary d-grid w-100" type="submit">MASUK</button>
      </div>
    </form>
    <p class="text-center">
      <span>AKUN</span><a href="register.php"><span> DAFTAR</span></a>
    </p>
  </div>
</div>
<!-- /Register -->
<?php include(".layouts/footer.php"); ?>