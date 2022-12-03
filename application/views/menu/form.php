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
    <h3>
        <?= validation_errors(); ?>
    </h3>
    <form method="post" action="<?= base_url('menu/save') ?>" enctype="multipart/form-data">
        <input type="hidden" name="id" value="<?= isset($id) ? $id : '' ?>" />
        <div class="mb-1">
            <label></label>
            <div>
                <h3>Tambah/Ubah Menu</h3>
            </div>
        </div>
        <div class="row mb-3">
            <label class="form-label">Nama Menu</label>
            <div class="col-sm-6">
                <input type="text" name="nama_menu" id="nama_menu" value="<?= $nama_menu ?>" class="form-control" required />
            </div>
        </div>
        <div class="row mb-3">
            <label class="form-label">Deskripsi</label>
            <div class="col-sm-6">
                <textarea class="form-control" type="text" name="deskripsi" id="deskripsi">
                    <?= $deskripsi ?>
                </textarea>
            </div>
        </div>
        <div class="row mb-3">
            <label class="form-label">Harga</label>
            <div class="col-sm-6">
                <input type="number" name="harga" id="harga" value="<?= $harga ?>" class="form-control" required />
            </div>
        </div>
        <div class="row mb-3">
            <label class="form-label">Stok</label>
            <div class="col-sm-6">
                <input type="number" name="stok" id="stok" value="<?= $stok ?>" class="form-control" required />
            </div>
        </div>
        <div class="row mb-3">
            <label class="form-label">Nama Kantin</label>
            <div class="col-sm-6">
                <select name="id_kantin" id="id_kantin" class="form-control">
                    <?php
                    $query = $this->db->get('kantin');

                    foreach ($query->result_array() as $row) {
                        echo '<option value="' . $row['id'] . '">' . $row['nama'] . '</option>';
                    }
                    ?>
                </select>
            </div>
        </div>
        <div class="row mb-3">
            <label>Gambar</label>
            <div class="col-sm-6">
                <input type="file" name="gambar" id="gambar" accept="image/*" onchange="loadFile(event)" class="form-control mb-3" />
                <img id="preview" src="<?= empty($gambar) ? BASE_ASSETS . 'uploads/noimage.jpg'  : BASE_ASSETS . 'uploads/' .$gambar ?>" width="200" />
            </div>
        </div>

        <div class="mb-5">
            <input type="button" value="Cancel" onclick="history.back()" class="btn btn-danger" />
            <input type="submit" value="Simpan" class="btn btn-success" />
        </div>
    </form>
    <script>
        var loadFile = function(event) {
            var image = document.getElementById('preview');
            image.src = URL.createObjectURL(event.target.files[0]);
        }
    </script>
</body>

</html>
