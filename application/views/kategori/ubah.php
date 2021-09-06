<div class="card card-primary">
    <div class="card-header">
        <h3 class="card-title">Edit Data Kategori</h3>
    </div>
    <!-- /.card-header -->
    <!-- form start -->
    <form method="post" action="">
        <div class="card-body">
            <div class="form-group">
                <input type="hidden" name="kode" value="<?= $ubah_kategori['id']; ?>">
                <label for="exampleInputEmail1">Nama Kategori</label>
                <input type="text" name="kt" value="<?= $ubah_kategori['kategori']; ?>" class="form-control" id="exampleInputEmail1" placeholder="Input Kategori">
                <small class="form-text text-danger"><?= form_error('kt'); ?></small>
            </div>
        </div>
        <!-- /.card-body -->
        <div class="card-footer">
            <button type="submit" name="ubah" class="btn btn-primary">Update</button>
        </div>
    </form>
</div>