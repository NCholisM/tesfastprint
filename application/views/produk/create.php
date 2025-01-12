<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Tambah Data Produk</title>
</head>

<body>
    <div class="container mt-4">
        <h1 class="text-center">TAMBAH DATA PRODUK</h1>
        <form method="post" action="<?php echo site_url('produk/store'); ?>">
            <div class="mb-3">
                <label for="nama_produk" class="form-label">Nama Produk</label>
                <input type="text" class="form-control" id="nama_produk" name="nama_produk" value="<?php echo set_value('nama_produk'); ?>">
                <?php echo form_error('nama_produk', '<div class="text-danger">', '</div>'); ?>
            </div>
            <div class="mb-3">
                <label for="harga" class="form-label">Harga</label>
                <input type="text" class="form-control" id="harga" name="harga" value="<?php echo set_value('harga'); ?>">
                <?php echo form_error('harga', '<div class="text-danger">', '</div>'); ?>
            </div>
            <div class="mb-3">
                <label for="kategori_id" class="form-label">Kategori</label>
                <select class="form-select" id="kategori_id" name="kategori_id">
                    <?php foreach ($kategori as $k): ?>
                        <option value="<?php echo $k->id_kategori; ?>"><?php echo $k->nama_kategori; ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="mb-3">
                <label for="status_id" class="form-label">Status</label>
                <select class="form-select" id="status_id" name="status_id">
                    <?php foreach ($status as $s): ?>
                        <option value="<?php echo $s->id_status; ?>"><?php echo $s->nama_status; ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Simpan</button>
            <a href="<?php echo site_url('produk'); ?>" class="btn btn-secondary">Batal</a>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>

</html>