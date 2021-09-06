<!-- general form elements -->
<div class="card card-success">
    <div class="card-header">
        <h3 class="card-title">Edit Data User</h3>
    </div>
    <!-- /.card-header -->
    <!-- form start -->
    <?php echo form_open_multipart('user/ubah'); ?>
    <form action="" method="post">
        <div class="card-body">
            <input type="hidden" name="kode" value="<?= $ubah_user['id_user']; ?>">
            <div class="form-group">
                <label for="exampleInputEmail1">Nama User</label>
                <input type="text" name="nu" value="<?= $ubah_user['nama_user']; ?>" class="form-control" id="exampleInputEmail1" placeholder="Masukan user">
                <small class="form-text text-danger"> <?= form_error('nu'); ?> </small>
            </div>

            <div class="form-group">
                <label for="exampleInputEmail1">Username</label>
                <input type="text" name="un" value="<?= $ubah_user['username']; ?>" class="form-control" id="exampleInputEmail1" placeholder="Masukan username">
                <small class="form-text text-danger"> <?= form_error('un'); ?> </small>
            </div>

            <div class="form-group">
                <label for="exampleInputEmail1">No Telpon</label>
                <input type="text" name="nt" value="<?= $ubah_user['no_telp']; ?>" class="form-control" id="exampleInputEmail1" placeholder="Masukan user">
                <small class="form-text text-danger"> <?= form_error('nt'); ?> </small>
            </div>

            <div class="form-group">
                <label for="exampleInputEmail1">Email</label>
                <input type="text" name="em" value="<?= $ubah_user['email']; ?>" class="form-control" id="exampleInputEmail1" placeholder="Masukan user">
                <small class="form-text text-danger"> <?= form_error('em'); ?> </small>
            </div>

            <div class="form-group">
                <label for="email">Hak Akses</label>
                <select name="level" class="form-control <?= form_error('level') ? 'is-invalid' : null ?>">
                    <?php if ($ubah_user['level'] == 1) { ?>
                        <option value="">--PILIH--</option>
                        <option value="1" selected>Admin</option>
                        <option value="2">Bendahara</option>
                        <option value="3">Direktur</option>
                    <?php } else { ?>
                        <option value="">--PILIH--</option>
                        <option value="1">Admin</option>
                        <option value="2" selected>Bendahara</option>
                        <option value="3">Direktur</option>
                    <?php } ?>
                </select>
                <small class="form-text text-danger"> <?= form_error('level'); ?> </small>
            </div>

            <div class="from-group">
                <label>Upload Foto</label>
                <div class="row">
                    <div calass="col-sm-3">
                        <img src="<?php echo base_url('assets/dist/foto/' . $ubah_user['foto']) ?>" class="img-thumnail">
                    </div>
                    <div class="col-sm-9">
                        <div class="custom-file">
                            <input type="hidden" name="image" value="<?= $ubah_user['foto']; ?>">
                            <input type="file" name="foto" class="custom-file-input">
                            <label class="custom-file-label">Choose file</label>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <!-- /.card-body -->
        <div class="card-footer">
            <button type="submit" name="ubah" class="btn btn-success">Update</button>
        </div>
    </form>
    <?php echo form_close(); ?>
</div>