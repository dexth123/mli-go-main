<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>List Produk</title>
    <link rel="stylesheet" href="<?= base_url('css/bootstrap.css') ?>">
    <link rel="stylesheet" href="<?= base_url('css/style.css') ?>">
  </head>
  <body>
    <div class="container">
        <div class="card mt-3">
            <div class="card-header">
                <b>List Produk</b>
            </div>
            <div class="card-body">
                <table class="table table-bordered">
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Harga</th>
                        <th>Jumlah</th>
                        <th>Action</th>
                    </tr>
                    <?php
                    foreach ($produk as $row) : ?>
                        <tr>
                            
                            <td><?php echo $row->idproduk; ?></td>
                            <td><?php echo $row->nama; ?></td>
                            <td><?php echo $row->harga; ?></td>
                            <td><?php echo $row->jumlah; ?></td>
                            <td>
                                <a class="btn btn-primary" href="/toko/show/">Lihat Detail</a>
                                <?php echo anchor('toko/addp'.$row->idproduk,'<div class="btn btn-sm btn-primary">Tambah Ke Keranjang</div>')?>
                            </td>
                            
                        </tr>
                        
                        </tr>
                    <?php endforeach; ?>
                </table>
                <?= $pager->links() ?>
            </div>
        </div>
        <a href="<?= site_url("/")?> " class="btn btn-primary">Home</a>
      
    </div>
    
</body>
</html>