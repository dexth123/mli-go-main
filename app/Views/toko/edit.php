<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Product</title>
</head>
<body>
    <h1>Edit Product</h1>

    <?php echo form_open('toko/update/'.$edit->idproduk); ?>

    <label for="nama">Nama:</label>
    <input type="text" name="nama" id="nama" value="<?php echo $edit->nama; ?>">

    <label for="harga">Harga:</label>
    <input type="text" name="harga" id="harga" value="<?php echo $edit->harga; ?>">

    <label for="jumlah">Jumlah:</label>
    <input type="text" name="jumlah" id="jumlah" value="<?php echo $edit->jumlah; ?>">

    <input type="submit" value="Submit">
    <a href="<?= site_url('/toko') ?>">Cancel</a>

    <?php echo form_close(); ?>
</body>
</html>
