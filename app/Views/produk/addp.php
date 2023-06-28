<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Produk</title>
    <link rel="stylesheet" href="<?= base_url('css/bootstrap.min.css') ?>">
    <link rel="stylesheet" href="<?= base_url('css/custom.css') ?>">
  </head>
  <body>
    <div class="container">
        <div class="card mt-3">

            <div class="card-header">
                <b>Tambah Produk</b>
            </div>
            <?php if (session()->has('errors')): ?>
     <ul>
          <?php foreach(session('errors') as $error): ?>
                <li><?= $error ?></li>
          <?php endforeach; ?>
     </ul>
 <?php endif ?>
            <div class="card-body">
            
                <?= form_open('/produk/create') ?>
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Nama Produk</label>
                    <input class="form-control" type="text" value="" name="nama">                    
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Harga</label>
                    <input class="form-control" type="text" value="" name="harga">                    
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Jumlah</label>
                    <input class="form-control" type="text" value="" name="jumlah">                    
                </div>

                <button class="btn btn-primary" >Save</button>
                <a href="<?= site_url("/produk") ?>">Cancel</a>
                </form>
            </div>
        </div>
    </div>
</body>
</html>