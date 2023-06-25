<!DOCTYPE html>
<html>
<head>
    <title>Order Form</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="<?= base_url('assets/bootstrap/css/bootstrap.min.css') ?>">
    <link rel="stylesheet" href="<?= base_url('css/style.css') ?>">
    <style>
        
    </style>
</head>
<body>
    <form class="form-container">
        <div class="container-fluid">
            <div class="row">
                <!-- Sidebar -->
                <div class="container">
                    <h1>Order Form</h1>
                    <?php
                    // Cek apakah ada data POST yang dikirimkan
                    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                        // Ambil data jumlah item dan nama item dari form
                        $quantity = $_POST['quantity'];
                        $productName = $_POST['product_name'];

                        // Tampilkan informasi item yang ditambahkan ke keranjang
                        echo "<p>Item ditambahkan ke keranjang:</p>";
                        echo "<p>Nama: " . $productName . "</p>";
                        echo "<p>Jumlah: " . $quantity . "</p>";
                    }
                    ?>
                </div>
            </div>
        </div>

        <!-- Bootstrap JS -->
        <script src="<?= base_url('assets/bootstrap/js/bootstrap.min.js') ?>"></script>
        <script src="https://kit.fontawesome.com/53b3156941.js" crossorigin="anonymous"></script>
    </form>
</body>
</html>
