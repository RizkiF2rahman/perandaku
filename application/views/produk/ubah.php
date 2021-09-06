<div class="card card-primary">
    <div class="card-header">
        <h3 class="card-title">Ubah Data Produk</h3>
    </div>
    <!-- /.card-header -->
    <!-- form start -->
    <form action="" method="post">
        <div class="card-body">
            <input type="hidden" name="kode" value="<?= $ubah_produk['id_pro']; ?>">
            <div class="form-group">
                <label for="exampleInputEmail1">Nama Produk </label>
                <input type="text" name="np" value="<?= $ubah_produk['nama_pro']; ?>" class="form-control" id="exampleInputEmail1" placeholder="Masukan Nama Produk">
                <small class="form-text text-danger"><?= form_error('np'); ?></small>
            </div>

            <div class="form-group">
                <label for="exampleInputEmail1">Harga</label>
                <input type="text" name="hrg" value="<?= $ubah_produk['harga']; ?>" class="form-control" id="exampleInputEmail1" placeholder="Masukan Harga">
                <small class="form-text text-danger"><?= form_error('hrg'); ?></small>
            </div>
        </div>
        <!-- /.card-body -->

        <div class="card-footer">
            <button type="submit" name="ubah" class="btn btn-primary">Update</button>
        </div>
    </form>
</div>