<!-- general form elements -->
<div class="card card-primary">
    <div class="card-header">
        <h3 class="card-title">Edit Data Customer</h3>
    </div>
    <!-- /.card-header -->
    <!-- form start -->
    <form action="" method="post">
        <div class="card-body">

            <input type="hidden" name="kode" value="<?= $ubah_customer['id_customer']; ?>">

            <div class="form-group">
                <label for="exampleInputEmail1">Nama</label>
                <input type="text" name="na" value="<?= $ubah_customer['nama']; ?>" class="form-control" id="exampleInputEmail1" placeholder="Input Nama Customer">
                <small class="form-text text-danger"><?= form_error('na'); ?></small>
            </div>

            <div class="form-group">
                <label for="exampleInputEmail1">No Telp</label>
                <input type="text" name="nt" value="<?= $ubah_customer['no_telp']; ?>" class="form-control" id="exampleInputEmail1" placeholder="Input No Telfon">
                <small class="form-text text-danger"><?= form_error('nt'); ?></small>
            </div>

            <div class="form-group">
                <label for="exampleInputEmail1">Alamat</label>
                <input type="text" name="al" value="<?= $ubah_customer['alamat']; ?>" class="form-control" id="exampleInputEmail1" placeholder="Input Alamat Customer">
                <small class="form-text text-danger"><?= form_error('al'); ?></small>
            </div>


            <!-- /.card-body -->

            <div class="card-footer">
                <button type="submit" name="ubah" class="btn btn-primary">Update</button>
            </div>
    </form>
</div>