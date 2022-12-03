<?php
include APPPATH . 'views/fragment/header.php';
include APPPATH . 'views/fragment/menu.php';
?>
<h4>Menu</h4>
<form method="get" action="<?= base_url('welcome/index') ?>">
    <div class="row mb-3">
        <input class="form-control" placeholder="cari menu " type="text" name="search" id="search" />
    </div>
</form>
<?php
if (isset($search)) {
    echo "<h4 class='alert alert-success'>Hasil pencarian untuk : " . $search . "</h4>";
}
?>
<div class="row">
    <?php
    foreach ($records as $idx => $data) {
    ?>
        <div class="col-sm-4 mb-2">
            <div class="card">
                <img id="preview" src="<?= empty($gambar) ? BASE_ASSETS . 'uploads/' . $data['gambar'] : BASE_ASSETS . 'uploads/noimage.jpg' ?>" width="414" />
                <div class="card-body">
                    <h5 class="card-title"><?= $data['nama_menu'] ?></h5>
                    <p class="card-text"><?= word_limiter($data['deskripsi'], 5) ?> <a href="<?= base_url("menu/detail/{$data['id']}") ?>" class="btn btn-sm btn-primary">Detail</a></p>
                    <dl>
                        <dt>Harga</dt>
                        <dd><?= $data['harga'] ?></dd>
                        <dt>Stok</dt>
                        <dd><?= $data['stok'] ?></dd>
                    </dl>
                </div>
            </div>
        </div>
    <?php
    }
    ?>
</div>
<?php
if (isset($links)) {
    echo $links;
}
?>
<?php
include APPPATH . 'views/fragment/footer.php';
?>
<script>
    var loadFile = function(event) {
        var image = document.getElementById('preview');
        image.src = URL.createObjectURL(event.target.files[0]);
    }
</script>
