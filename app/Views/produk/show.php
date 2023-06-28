<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Detail Produk</title>
    <link rel="stylesheet" href="<?= base_url('css/bootstrap.min.css') ?>">
    <link rel="stylesheet" href="<?= base_url('css/custom.css') ?>">
  </head>
  <body>
    <div class="container">
        <div class="card mt-3">
            <div class="card-header">
                <b>Detail Produk</b>
            </div>          
            <div class="card-body">
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Id Produk</label>
                    <input class="form-control" type="text" value="<?= $show->idproduk; ?>" aria-label="readonly input example" readonly>                    
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Nama Barang</label>
                    <input class="form-control" type="text" value="<?= $show->nama; ?>" aria-label="readonly input example" readonly>                    
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Harga Barang</label>
                    <input class="form-control" type="text" value="<?= $show->harga; ?>" aria-label="readonly input example" readonly>                    
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Jumlah Stok</label>
                    <input class="form-control" type="text" value="<?= $show->jumlah; ?>" aria-label="readonly input example" readonly>                    
                </div>
            </div>
        </div>
    </div>
</body>
</html>