<div class="card">
    <div class="card-header">
        <div class="col-md-2">
            <a href="<?= base_url('user/tambah') ?>" class="btn btn-block btn-primary   ">
                Tambah</a>
        </div>
    </div>
    <!-- /.card-header -->

    <div class="card-body">
        <table id="example1" class="table table-bordered table-striped">
            <thead>
                <tr align="center" class="btn-success">
                    <th>No</th>
                    <th>Foto</th>
                    <th>Nama User</th>
                    <th>Username</th>
                    <th>Hak Akses</th>
                    <th>Aksi</th>
                </tr>
            </thead>

            <tbody>
                <?php
                $no = 1;
                foreach ($user as $us) :
                ?>
                    <tr align="center">
                        <td><?= $no++; ?></td>
                        <td><img src="<?= base_url('assets/dist/foto/' . $us['foto']); ?>" width="50"></td>
                        <td><?= $us['nama_user']; ?></td>
                        <td><?= $us['username']; ?></td>
                        <td><?= $us['level'] == 1 ? 'Admin' : 'Bendahara'; 'Direktur'; ?></td>
                        <td>
                            <a href="<?= base_url() ?>user/ubah/<?= $us['id_user']; ?>" class="btn btn-small text-info"><i class="fas fa-edit">Edit</i></a>
                            <a href="" class="btn btn-small text-danger" data-toggle="modal" data-target="#modal-hapus<?= $us['id_user']; ?>"><i class="fas fa-trash">Hapus</i></a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>

<?php foreach ($user as $us) : ?>
    <div class="modal fade" id="modal-hapus<?= $us['id_user']; ?>">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header bg-success">
                    <h4 class="modal-title">Hapus Data</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form method="post" action="<?= base_url('user/hapus'); ?>">
                    <div class="modal-body">
                        <h4>
                            <p>Apakah Anda Ingin Menghapus Data&hellip;?</p>
                        </h4>
                    </div>
                    <div class="modal-footer justify-content-between">
                        <input type="hidden" name='us' value="<?= $us['id_user']; ?>">
                        <button type="button" class="btn btn-default" data-dismiss="modal">No</button>
                        <button type="submit" class="btn btn-primary">Yes</button>
                    </div>
                </form>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->
<?php endforeach; ?>