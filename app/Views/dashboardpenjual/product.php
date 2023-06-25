<!DOCTYPE html>
<html>
<head>
    <title>Produk Dijual</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="<?= base_url('assets/bootstrap/css/bootstrap.min.css') ?>">
    <link rel="stylesheet" href="<?= base_url('css/style.css') ?>">
    <style>
        .product {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            align-items: center;
            margin-top: 30px;
        }
        .product-item {
            width: 200px;
            margin: 10px;
            padding: 10px;
            text-align: center;
            background-color: #f9f9f9;
            border: 1px solid #ddd;
        }
        .product-image {
            width: 150px;
            height: 150px;
            margin-bottom: 10px;
        }
        .product-name {
            font-weight: bold;
            margin-bottom: 5px;
        }
        .product-price {
            margin-bottom: 5px;
        } 
    </style>
</head>
<body>
<div class="container-fluid">
    <div class="row">
        <!-- Sidebar -->
        <div class="container">
            <h1>Product Form</h1>
            <div class="product">
                <?php
                // Ambil data produk dari database
                $produk = [
                    ['idproduk' => 1, 'nama' => 'Sayur 1', 'harga' => 10, 'jumlah' => 100],
                    ['idproduk' => 2, 'nama' => 'Sayur 2', 'harga' => 20, 'jumlah' => 200],
                    ['idproduk' => 3, 'nama' => 'Sayur 3', 'harga' => 30, 'jumlah' => 300]
                ];
                foreach ($produk as $product): ?>
                    <div class="product-item">
                        <img src="<?= base_url('assets/images/product' . $product['idproduk'] . '.jpg') ?>" class="product-image">
                        <div class="product-name"><?= $product['nama'] ?></div>
                        <div class="product-price">$<?= $product['harga'] ?></div>
                        <a href="#" class="btn btn-primary" data-toggle="modal" data-target="#itemModal<?= $product['idproduk'] ?>">Tambah</a>
                    </div>
                    <!-- Modal -->
                    <div class="modal fade" id="itemModal<?= $product['idproduk'] ?>" tabindex="-1" role="dialog" aria-labelledby="itemModalLabel<?= $product['idproduk'] ?>" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="itemModalLabel<?= $product['idproduk'] ?>">Tambah Item - <?= $product['nama'] ?></h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <button class="btn btn-outline-secondary" type="button" onclick="decreaseQuantity(<?= $product['idproduk'] ?>)"><i class="fas fa-minus"></i></button>
                                        </div>
                                        <input type="number" class="form-control" id="quantity<?= $product['idproduk'] ?>" value="1">
                                        <div class="input-group-append">
                                            <button class="btn btn-outline-secondary" type="button" onclick="increaseQuantity(<?= $product['idproduk'] ?>)"><i class="fas fa-plus"></i></button>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <button type="button" class="btn btn-primary" onclick="addToCart(<?= $product['idproduk'] ?>)">Tambahkan ke Keranjang</button>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>

        <!-- Form Tambah Produk -->
        <div class="container">
            <h1>Tambah Produk</h1>
            <form method="POST" action="process.php">
                <div class="form-group">
                    <label for="idproduk">ID Produk</label>
                    <input type="text" class="form-control" id="idproduk" name="idproduk" required>
                </div>
                <div class="form-group">
                    <label for="nama">Nama</label>
                    <input type="text" class="form-control" id="nama" name="nama" required>
                </div>
                <div class="form-group">
                    <label for="harga">Harga</label>
                    <input type="text" class="form-control" id="harga" name="harga" required>
                </div>
                <div class="form-group">
                    <label for="jumlah">Jumlah</label>
                    <input type="text" class="form-control" id="jumlah" name="jumlah" required>
                </div>
                <button type="submit" class="btn btn-primary">Tambah Produk</button>
            </form>
        </div>
    </div>
</div>

<!-- Bootstrap JS -->
<script src="<?= base_url('assets/bootstrap/js/bootstrap.min.js') ?>"></script>
<script src="https://kit.fontawesome.com/53b3156941.js" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    function increaseQuantity(productId) {
        var input = document.getElementById('quantity' + productId);
        var value = parseInt(input.value);
        input.value = value + 1;
    }

    function decreaseQuantity(productId) {
        var input = document.getElementById('quantity' + productId);
        var value = parseInt(input.value);
        if (value > 1) {
            input.value = value - 1;
        }
    }

    function addToCart(productId) {
        var quantityInput = document.getElementById('quantity' + productId);
        var quantity = parseInt(quantityInput.value);

        // Kirim data ke halaman order.php menggunakan AJAX
        $.ajax({
            url: '/dashboard/order.php',
            type: 'POST',
            data: {
                product_id: productId,
                quantity: quantity
            },
            success: function(response) {
                // Tangani respons dari server jika diperlukan
                console.log(response);
                // Tampilkan jumlah item yang dipilih
                updateCartItemCount(response);
            },
            error: function(xhr, status, error) {
                // Tangani kesalahan jika terjadi
                console.log(error);
            }
        });

        // Setelah menambahkan ke keranjang, Anda dapat menutup modal di sini jika diperlukan
        $('#itemModal' + productId).modal('hide');
    }

    function updateCartItemCount(count) {
        // Update tampilan jumlah item di keranjang
        var itemCountElement = document.getElementById('cartItemCount');
        if (itemCountElement) {
            itemCountElement.innerText = count;
        }
    }
</script>
</body>
</html>
