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
    <h1 class="mt-2 mb-2">List Menu</h1>
    <div class="d-flex justify-content-end">
        <a class="btn btn-success btn-sm" href="<?= base_url("menu/form") ?>">Tambah</a>
    </div>
    <table class="table table-striped mt-3 mb-5">
        <tr class="text-center">
            <th>Gambar</th>
            <th>Nama Menu</th>
            <th>Nama Kantin</th>
            <th>Harga</th>
            <th>Stok</th>
            <th>Aksi</th>
        </tr>
        <?php
        foreach ($records as $idx => $data) {
            $this->db->select('*')
                ->from('kantin')
                ->where('id', $data['id_kantin']);
            $query = $this->db->get();

            foreach ($query->result_array() as $row) {
                $namaKantin = $row['nama'];
            }
        ?>
            <tr class="text-center">
                <td><img src="assets/uploads/<?= $data['gambar'] ?>" width="200" alt=""></td>
                <td><?= $data['nama_menu'] ?></td>
                <td><?= $namaKantin ?></td>
                <td><?= $data['harga'] ?></td>
                <td><?= $data['stok'] ?></td>
                <td>
                    <div class="btn-group">
                        <a href="<?= base_url("menu/detail/{$data['id']}") ?>" class="btn btn-primary">Detail</a>
                        <a href="<?= base_url("menu/form/{$data['id']}") ?>" class="btn btn-warning">Edit</a>
                        <a onclick="return confirm('menghapus data?')" href="<?= base_url("menu/hapus/{$data['id']}") ?>" class="btn btn-danger">Hapus</a>
                    </div>
                </td>
            </tr>
        <?php
        }
        ?>
    </table>
    <?php
    include APPPATH . 'views/fragment/footer.php';
    ?>
</body>

</html>