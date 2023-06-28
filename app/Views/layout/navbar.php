<nav class="navbar navbar-expand-md navbar-dark bg-dark mb-4">
  <div class="container-fluid">
    <a class="navbar-brand" href="/">MLIGO</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarCollapse">
      <?php
        $router = service('router');
        $method = $router->methodName();
      ?>
      <ul class="navbar-nav me-auto mb-2 mb-md-0">
        <li class="nav-item">
          <a class="nav-link <?php if($method=="about"){echo "active";}?>" href="<?= base_url('about') ?>">About</a>
        </li>
        <li class="nav-item">
          <a class="nav-link <?php if($method=="contact"){echo "active";}?>" href="<?= base_url('contact') ?>">Contact</a>
        </li>
        <li class="nav-item">
          <a class="nav-link <?php if($method=="faq"){echo "active";}?>" href="<?= base_url('faq') ?>">Faq</a>
        </li>
        <?php if (session()->has('user')): ?>
          <?php if ($method == "index"): ?>
            <li class="nav-item">
              <a class="nav-link <?php if($method=="toko"){echo "active";}?>" href="<?= base_url('toko') ?>">Toko</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="<?= base_url('penjualhome') ?>">Ingin Jadi penjual?</a> 
            </li>
          <?php endif; ?>
          <?php if ($method == "indexpenjual"): ?>
            <li class="nav-item">
              <a class="nav-link <?php if($method=="produk"){echo "active";}?>" href="<?= base_url('produk') ?>">Tambah Produk</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="<?= base_url('/') ?>">Ingin Jadi pembeli?</a>
            </li>
          <?php endif; ?>
          <li class="nav-item">
            <a class="nav-link" href="<?= base_url('logout') ?>">Logout</a>
          </li>
        <?php else: ?>
          <li class="nav-item">
            <a class="nav-link <?php if($method=="login"){echo "active";}?>" href="<?= base_url('login') ?>">Login</a>
          </li>
        <?php endif; ?>
      </ul>
    </div>
  </div>
</nav>
