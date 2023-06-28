<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delete Data</title>
</head>
<body>
    <h2>Delete Data</h2>
    <p>Are you sure?</p>

    <?= form_open("produk/delete/".$delete->idproduk) ?>
    <button type="submit">Yes</button>
    <a href="<?= site_url('/produk') ?>">Cancel</a>
    </form>
</body>
</html>
