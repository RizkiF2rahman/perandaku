<!-- general form elements -->
<div class="card card-primary">
    <div class="card-header">
        <h3 class="card-title">Tambah Data Customer</h3>
    </div>
    <!-- /.card-header -->
    <!-- form start -->
    <form action="" method="post">
        <div class="card-body">

            <div class="form-group">
                <label for="exampleInputEmail1">Nama</label>
                <input type="text" name="na" value="<?= set_value('na') ?>" class="form-control" id="exampleInputEmail1" placeholder="Input Nama Customer">
                <small class="form-text text-danger"><?= form_error('na'); ?></small>
            </div>

            <div class="form-group">
                <label for="exampleInputEmail1">No Telp</label>
                <input type="text" name="nt" value="<?= set_value('nt') ?>" class="form-control" id="exampleInputEmail1" placeholder="Input No Telfon">
                <small class="form-text text-danger"><?= form_error('nt'); ?></small>
            </div>

            <div class="form-group">
                <label for="exampleInputEmail1">Alamat</label>
                <input type="text" name="al" value="<?= set_value('al') ?>" class="form-control" id="exampleInputEmail1" placeholder="Input Alamat Customer">
                <small class="form-text text-danger"><?= form_error('al'); ?></small>
            </div>
        </div>
        <!-- /.card-body -->

        <div class="card-footer">
            <button type="submit" name="tambah" class="btn btn-primary">Simpan</button>
        </div>
    </form>
</div>
<!-- /.card -->