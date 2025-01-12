<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Data Produk</title>
    <style>
        .text-left {
            text-align: left;
        }
    </style>
</head>

<body>
    <div class="container-fluid">
        <h1 class="text-center">DATA PRODUK</h1>
        <a href="<?php echo site_url('produk/create'); ?>" class="btn btn-primary mb-3">Tambah Data</a>
        <table class="table table-hover table-bordered">
            <thead class="table-dark text-center">
                <tr>
                    <th>No</th>
                    <th width="50%">Nama Produk</th>
                    <th>Harga</th>
                    <th>Kategori</th>
                    <th>Status</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody class="text-center">
                <?php $no = 1; ?>
                <?php foreach ($produk as $item): ?>
                    <tr>
                        <td><?php echo $no++; ?></td>
                        <td class="text-left"><?php echo $item->nama_produk; ?></td>
                        <td><?php echo $item->harga; ?></td>
                        <td><?php echo $item->nama_kategori; ?></td>
                        <td><?php echo $item->nama_status; ?></td>
                        <td>
                            <!-- Tombol Edit -->
                            <a href="<?php echo site_url('produk/edit/' . $item->id_produk); ?>" class="btn btn-warning btn-sm">Edit</a>

                            <!-- Tombol Hapus -->
                            <a href="#" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#deleteModal<?php echo $item->id_produk; ?>">Hapus</a>

                            <!-- Modal Konfirmasi Hapus -->
                            <div class="modal fade" id="deleteModal<?php echo $item->id_produk; ?>" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="deleteModalLabel">Konfirmasi Hapus</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            Apakah Anda yakin ingin menghapus produk <strong><?php echo $item->nama_produk; ?></strong>?
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                            <a href="<?php echo site_url('produk/delete/' . $item->id_produk); ?>" class="btn btn-danger">Hapus</a>
                                        </div>
                                    </div>
                                </div>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>

</html>