<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Home Page</title>
    <link rel="stylesheet" href="<?= base_url('css/bootstrap.css') ?>">
  </head>
  <body>
    

<?= $this->include('layout/navbar') ?>
<?= $this->include('layout/header') ?>  

<br>

<?= $this->renderSection('content') ?>

<?= $this->include('layout/footer') ?>

	  <script src="<?= base_url('js/bootstrap.bundle.min.js') ?>"></script>
  </body>
</html>