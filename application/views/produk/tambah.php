<div class="card card-primary">
    <div class="card-header">
        <h3 class="card-title">Tambah Data Produk</h3>
    </div>
    <!-- /.card-header -->
    <!-- form start -->
    <form action="" method="post">
        <div class="card-body">
            <div class="form-group">
                <label for="exampleInputEmail1">Nama Produk </label>
                <input type="text" name="np" class="form-control <?= form_error('np') ? 'is-invalid' : null ?>" placeholder="Masukan Nama Produk">
                <smanll class="form-text text-danger"><?= form_error('np'); ?></smanll>
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Harga</label>
                <input type="text" name="hrg" class="form-control <?= form_error('hrg') ? 'is-invalid' : null ?>" id="exampleInputEmail1" placeholder="Masukan Harga">
                <small class="form-text text-danger"><?= form_error('hrg'); ?></small>
            </div>
        </div>
        <!-- /.card-body -->

        <div class="card-footer">
            <button type="submit" name="tambah" class="btn btn-primary">Simpan</button>
        </div>
    </form>
</div>