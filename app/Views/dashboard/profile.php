<!DOCTYPE html>
<html>
<head>
    <title>Profile</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="<?= base_url('assets/bootstrap/css/bootstrap.min.css') ?>">
    <link rel="stylesheet" href="<?= base_url('css/style.css') ?>">
</head>
<body>
    <div class="container">
        <h1>Profile</h1>

        <?php if ($profile): ?>
            <form class="form-container" action="<?= base_url('profile/update') ?>" method="post">
                <div class="form-group">
                    <label for="namaLengkap">Nama Lengkap</label>
                    <input type="text" class="form-control" id="namaLengkap" name="NamaLengkap" value="<?= $profile['NamaLengkap'] ?>">
                </div>
                <div class="form-group">
                    <label for="alamat">Alamat</label>
                    <input type="text" class="form-control" id="alamat" name="Alamat" value="<?= $profile['Alamat'] ?>">
                </div>
                <button type="submit" class="btn btn-primary">Simpan</button>
            </form>
        <?php else: ?>
            <p>Data pengguna tidak ditemukan.</p>
        <?php endif; ?>
    </div>

    <!-- Bootstrap JS -->
    <script src="<?= base_url('assets/bootstrap/js/bootstrap.min.js') ?>"></script>
    <script src="https://kit.fontawesome.com/53b3156941.js" crossorigin="anonymous"></script>
</body>
</html>
