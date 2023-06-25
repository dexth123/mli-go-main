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
<form class="form-container">
<div class="container-fluid">
    <div class="row">
        <!-- Sidebar -->
        <div class="container">
            <h1>Product Form</h1>
            <div class="product">
                <?php for ($i = 1; $i <= 9; $i++) { ?>
                    <div class="product-item">
                        <img src="<?= base_url('assets/images/product' . $i . '.jpg') ?>" class="product-image">
                        <div class="product-name">Sayur <?= $i ?></div>
                        <div class="product-price">$<?= ($i * 10) ?></div>
                        <a href="#" class="btn btn-primary" data-toggle="modal" data-target="#itemModal<?= $i ?>">Tambah</a>
                        
                    </div>
                    <!-- Modal -->
                    <div class="modal fade" id="itemModal<?= $i ?>" tabindex="-1" role="dialog" aria-labelledby="itemModalLabel<?= $i ?>" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="itemModalLabel<?= $i ?>">Tambah Item - Sayur <?= $i ?></h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <button class="btn btn-outline-secondary" type="button" onclick="decreaseQuantity(<?= $i ?>)"><i class="fas fa-minus"></i></button>
                                        </div>
                                        <input type="number" class="form-control" id="quantity<?= $i ?>" value="1">
                                        <div class="input-group-append">
                                            <button class="btn btn-outline-secondary" type="button" onclick="increaseQuantity(<?= $i ?>)"><i class="fas fa-plus"></i></button>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <button type="button" class="btn btn-primary" onclick="addToCart(<?= $i ?>)">Tambahkan ke Keranjang</button>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php } ?>
            </div>
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
