<div class="card">
    <div class="card-header">
        <div class="col-md-2">
            <a href="<?= base_url('pegawai/tambah'); ?>" class="btn btn-block btn-outline-primary">Tambah Data</a>
        </div>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
        <table id="example1" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <td align="center">No</td>
                    <td align="center">Nama Pegawai</td>
                    <td align="center">Posisi</td>
                    <td align="center">Jenis Kelamin</td>
                    <td align="center">Agama</td>
                    <td align="center">Alamat</td>
                    <td align="center">No Telfon</td>
                    <td align="center">Aksi</td>
                </tr>
            </thead>

            <tbody>
                <?php
                $No = 1;
                foreach ($pegawai as $peg) :
                ?>
                    <tr>
                        <td align="center"><?= $No++; ?></td>
                        <td align="center"><?= $peg['nama_peg']; ?></td>
                        <td align="center"><?= $peg['nama_pos']; ?></td>
                        <td align="center"><?= $peg['jenis_kel']; ?></td>
                        <td align="center"><?= $peg['agama']; ?></td>
                        <td align="center"><?= $peg['alamat']; ?></td>
                        <td align="center"><?= $peg['notelp']; ?></td>
                        <td align="center">
                            <a href="<?= base_url(); ?>pegawai/ubah/<?= $peg['id_peg']; ?>" class="btn btn-small text-info"><i class="fas fa-edit">Edit</i></a>
                            <a href="" class="btn btn-small text-danger" data-toggle="modal" data-target="#modal-hapus<?= $peg['id_peg']; ?>"><i class="fas fa-trash">Hapus</i></a>
                            </>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>

<?php foreach ($pegawai as $peg) : ?>
    <div class="modal fade" id="modal-hapus<?= $peg['id_peg']; ?>">
        <div class="modal-dialog">
            <div class="modal-content bg-dark">
                <div class="modal-header">
                    <h4 class="modal-title">Hapus Data</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form method="post" action="<?= base_url('pegawai/hapus'); ?>">
                    <div class="modal-body">
                        <p>Apakah Yakin Hapus Data...?</p>
                    </div>
                    <div class="modal-footer justify-content-between">
                        <input type="hidden" name="kd_peg" value="<?= $peg['id_peg']; ?>">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-primary">Hapus</button>
                    </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->
<?php endforeach; ?>