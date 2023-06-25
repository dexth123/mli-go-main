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
                        $productId = $_POST['product_id'];

                        // Establish a database connection
                        $host = 'localhost';
                        $dbname = 'new';
                        $username = 'root';
                        $password = '';

                        try {
                            $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
                            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                            // Get the product name from the "Produk" table based on the product ID
                            $stmt = $pdo->prepare("SELECT nama, harga FROM Produk WHERE idproduk = ?");
                            $stmt->execute([$productId]);
                            $product = $stmt->fetch();

                            $productName = $product['nama'];

                            // Insert the order data into the "Penjualan" table
                            $stmt = $pdo->prepare("INSERT INTO Penjualan (idproduk, namapembeli, namapenjual, harga, jumlah) VALUES (?, ?, ?, ?, ?)");
                            $stmt->execute([$productId, 'John Doe', 'Jane Doe', $product['harga'], $quantity]);

                            // Display the order information
                            echo "<p>Item ditambahkan ke keranjang:</p>";
                            echo "<p>Nama Produk: " . $productName . "</p>";
                            echo "<p>Harga: " . $product['harga'] . "</p>";
                            echo "<p>Jumlah: " . $quantity . "</p>";
                        } catch (PDOException $e) {
                            echo "Error: " . $e->getMessage();
                        }

                        // Close the database connection
                        $pdo = null;
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
