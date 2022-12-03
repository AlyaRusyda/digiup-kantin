<?php
include APPPATH . 'views/fragment/header.php';
include APPPATH . 'views/fragment/menu.php';
?>
<div class="card col-sm-8 container d-flex align-items-center justify-content-center">
  <dd><img id="preview" src="<?= empty($gambar) ? BASE_ASSETS . 'uploads/noimage.jpg'  : BASE_ASSETS . 'uploads/' . $gambar ?>" width="120" /></dd>
  <div class="card-body">
    <h5 class="card-title"><?= $nama_menu ?></h5>
    <p class="card-text"><?= $deskripsi ?>
    <dl>
      <dt>Harga</dt>
      <dd><?= $harga ?></dd>
      <dt>Stok</dt>
      <dd><?= $stok ?></dd>
    </dl>
  </div>
</div>
<a href='#' onclick="history.back()">Back</a>
<?php
include APPPATH . 'views/fragment/footer.php';
?>
<script>
  var loadFile = function(event) {
    var image = document.getElementById('preview');
    image.src = URL.createObjectURL(event.target.files[0]);
  }
</script>