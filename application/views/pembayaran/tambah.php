<div class="card card-primary">
    <div class="card-header">
        <h3 class="card-title">Tambah Metode Pembayaran</h3>
    </div>
    <!-- /.card-header -->
    <!-- form start -->
    <form method="post" action="">
        <div class="card-body">
            <div class="form-group">
                <label for="exampleInputEmail1">Metode Pembayaran</label>
                <input type="text" name="tr" class="form-control" id="exampleInputEmail1" placeholder="Masukan Metode Pembayaran">
                <small class="form-text text-danger"><?= form_error('tr'); ?></small>
            </div>
        </div>
        <!-- /.card-body -->
        <div class="card-footer">
            <button type="submit" name="tambah" class="btn btn-primary">Simpan</button>
        </div>
    </form>
</div>