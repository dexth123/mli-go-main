<!DOCTYPE html>
<html>
<head>
    <title>Profile Form</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="<?= base_url('assets/bootstrap/css/bootstrap.min.css') ?>">
    <link rel="stylesheet" href="<?= base_url('css/style.css') ?>">
</head>
<body>
<form class="form-container" action="<?= base_url('/profile/update') ?>" method="post">
<div class="container-fluid">
    <div class="row">
        <!-- Sidebar -->
        <div class="container">
            <h1>Profile Form</h1>
            <p>Sabar bang blom buat</p>

            <!-- Form code goes here -->
            <div class="form-group">
                <label for="namaLengkap">Nama Lengkap</label>
                <input type="text" class="form-control" id="namaLengkap" name="NamaLengkap" value="<?= $user['NamaLengkap'] ?>">
            </div>
            <div class="form-group">
                <label for="alamat">Alamat</label>
                <input type="text" class="form-control" id="alamat" name="Alamat" value="<?= $user['Alamat'] ?>">
            </div>
            <div class="form-group">
                <label for="username">Username</label>
                <input type="text" class="form-control" id="username" name="Username" value="<?= $user['Username'] ?>">
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" class="form-control" id="password" name="Password" value="<?= $user['Password'] ?>">
            </div>
            <button type="submit" class="btn btn-primary">Simpan</button>
        </div>
    </div>
</div>

<!-- Bootstrap JS -->
<script src="<?= base_url('assets/bootstrap/js/bootstrap.min.js') ?>"></script>
<script src="https://kit.fontawesome.com/53b3156941.js" crossorigin="anonymous"></script>
</body>
</html>
