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
  <h1>Detail Menu</h1>
  <dl>
    
    <dd><img src="<?php echo base_url('assets/uploads/' . $gambar); ?>" width="300" class="rounded"></dd>
    <dt>Nama Menu</dt>
    <dd><?= $nama_menu ?></dd>

    <dt>Desripsi</dt>
    <dd><?= $deskripsi ?></dd>

    <dt>Harga</dt>
    <dd><?= $harga ?></dd>
    
    <dt>Nama Kantin</dt>
    <?php
    $this->db->select('*')
      ->from('kantin')
      ->where('id', $id_kantin);
    $query = $this->db->get();

    foreach ($query->result_array() as $row) {
      $NamaKantin = $row['nama'];
    }
    ?>
    <dd><?= $NamaKantin ?></dd>

  </dl>

  <a href='#' onclick="history.back()" class="btn btn-danger">Back</a>
</body>

</html>
