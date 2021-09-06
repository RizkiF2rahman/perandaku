<div class="card card-primary">
    <div class="card-header">
        <h3 class="card-title">Update Data Posisi</h3>
    </div>
    <!-- /.card-header -->
    <!-- form start -->
    <form method="post" action="">
        <div class="card-body">
            <div class="form-group">
                <input type="hidden" name="kode" value="<?= $ubah_posisi['id_pos']; ?>">
                <label for="exampleInputEmail1">Nama Posisi</label>
                <input type="text" name="np" value="<?= $ubah_posisi['nama_pos']; ?>" class="form-control" id="exampleInputEmail1" placeholder="Masukan Posisi">
                <small class="form-text text-danger"><?= form_error('np'); ?></small>
            </div>
        </div>
        <!-- /.card-body -->

        <div class="card-footer">
            <button type="submit" name="update" class="btn btn-primary">Update</button>
        </div>
    </form>
</div>