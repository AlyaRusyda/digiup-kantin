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
    <h1>List Kantin</h1>
    <div class="d-flex justify-content-end">
        <a class="btn btn-success btn-sm" href="<?= base_url("kantin/form") ?>">Tambah</a>
    </div>
    <div class="col-sm-12">
        <table class="table table-striped mt-3 mb-5">
            <tr class="text-center">
                <th>Nama Kantin</th>
                <th>Telp</th>
                <th>Aksi</th>
            </tr>
            <?php
            foreach ($records as $idx => $data) {
            ?>
                <tr class="text-center">
                    <td><?= $data['nama'] ?></td>
                    <td><?= $data['telp'] ?></td>
                    <td>
                        <div class="btn-group">
                            <a href="<?= base_url("kantin/detail/{$data['id']}") ?>" class="btn btn-primary">Detail</a>
                            <a href="<?= base_url("kantin/form/{$data['id']}") ?>" class="btn btn-warning">Edit</a>
                            <a onclick="return confirm('menghapus data?')" href="<?= base_url("kantin/hapus/{$data['id']}") ?>" class="btn btn-danger">Hapus</a>
                        </div>
                    </td>
                </tr>
            <?php
            }
            ?>
        </table>
    </div>
    <?php
    include APPPATH . 'views/fragment/footer.php';
    ?>
</body>

</html>