<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title></title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
</head>

<body>
  <?php
  include APPPATH . 'views/fragment/header.php';
  include APPPATH . 'views/fragment/menu.php';
  ?>
  <h1>Detail Kantin</h1>
  <dl>
    <dt>Nama Kantin</dt>
    <dd><?= $nama ?></dd>

    <dt>Telpon</dt>
    <dd><?= $telp ?></dd>
  </dl>

  <a href='#' onclick="history.back()" class="btn btn-danger">Back</a>
</body>

</html>