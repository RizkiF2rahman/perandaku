<!-- general form elements -->
<div class="card card-success">
    <div class="card-header">
        <h3 class="card-title">Ganti Password</h3>
    </div>
    <!-- /.card-header -->
    <!-- form start -->
    <form action="" method="post">
        <div class="card-body">
            <input type="hidden" name="us" id="id">
            <div class="form-group">
                <label for="exampleInputEmail1">Username*</label>
                <input type="text" readonly name="un" id="nm_user" value="<?= set_value('un') ?>" class="form-control <?= form_error('un') ? 'is-invalid' : null ?>" placeholder="Masukan Username">
                <small class="form-text text-danger"> <?= form_error('un'); ?> </small>
            </div>

            <div class="form-group">
                <label for="exampleInputEmail1">Hak Akses</label>
                <input type="text" readonly name="level" id="level" value="<?= set_value('level') ?>" class="form-control <?= form_error('level') ? 'is-invalid' : null ?>" placeholder="Masukan User">
                <small class="form-text text-danger"> <?= form_error('level'); ?> </small>
            </div>

            <div class="form-group">
                <label for="exampleInputEmail1">Password*</label>
                <input type="password" name="pass1" value="<?= set_value('pass1') ?>" class="form-control <?= form_error('pass1') ? 'is-invalid' : null ?>" placeholder="Masukan Password">
                <small class="form-text text-danger"> <?= form_error('pass1'); ?> </small>
            </div>

            <div class="form-group">
                <label for="exampleInputEmail1">Konfirmasi Password*</label>
                <input type="password" name="pass2" value="<?= set_value('pass2') ?>" class="form-control <?= form_error('pass2') ? 'is-invalid' : null ?>" placeholder="Masukan Konfirmasi Password">
                <small class="form-text text-danger"> <?= form_error('pass2'); ?> </small>
            </div>
            <!-- /.card-body -->
            <div align="right" class="card-footer">
                <button " type=" submit" name="ubah" class="btn btn-success">Update</button>
            </div>
    </form>
</div>
<!-- /.card -->
<div class="modal fade" id="user" arial-model="true" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content bg-white">
            <div class="modal-header bg-success">
                <h4 class="modal-title">Pilih Data</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Username</th>
                            <th>Hak Akses</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php
                        $no = 1;
                        foreach ($user as $us) :
                        ?>
                            <tr>
                                <td><?= $us['username']; ?></td>
                                <td><?= $us['level'] == 1 ? 'Admin' : 'Bendahara';
                                    'Direktur'; ?></td>
                                <td align="center">
                                    <button data-id="<?= $us['id_user'] ?>" data-username="<?= $us['username'] ?>" data-level="<?= $us['level'] == 1 ? 'Admin' : 'Bendahara';
                                                                                                                                'Direktur'; ?>" class="btn btn-warning" id="pilihuser">
                                        <i class="fa fa-check"></i>Pilih</button>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>

        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>