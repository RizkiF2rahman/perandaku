<div class="card">
    <div class="card-header">
        <div class="col-md-2">
            <a href="<?= base_url('customer/tambah'); ?>" class="btn btn-block btn-outline-primary">Tambah Data</a>
        </div>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
        <table id="example1" class="table table-bordered table-striped">
            <thead>
                <tr align="center">
                    <td>No</td>
                    <td>Nama</td>
                    <td>No Telfon</td>
                    <td>Alamat</td>
                    <td>Aksi</td>
                </tr>
            </thead>

            <tbody>
                <?php
                $no = 1;
                foreach ($customer as $cu) :
                ?>
                    <tr>
                        <td><?= $no++; ?></td>
                        <td><?= $cu['nama']; ?></td>
                        <td><?= $cu['no_telp']; ?></td>
                        <td><?= $cu['alamat']; ?></td>
                        <td align="center">
                            <a href="<?= base_url(); ?>customer/ubah/<?= $cu['id_customer']; ?>" class="btn btn-small text-info"><i class="fas fa-edit">Edit</i></a>
                            <a href="" class="btn btn-small text-danger" data-toggle="modal" data-target="#modal-hapus<?= $cu['id_customer']; ?>"><i class="fas fa-trash">Hapus</i></a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>


<?php foreach ($customer as $cu) : ?>
    <div class="modal fade" id="modal-hapus<?= $cu['id_customer']; ?>">
        <div class="modal-dialog">
            <div class="modal-content bg-primary">
                <div class="modal-header">
                    <h4 class="modal-title">Hapus Data</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form method="post" action="<?= base_url('customer/hapus'); ?>">
                    <div class="modal-body">
                        <p>Data Yang Anda Hapus Akan Hilang, Apakah Anda Yakin Untuk Menghapus&hellip;?</p>
                    </div>
                    <div class="modal-footer justify-content-between">
                        <input type="hidden" name="ni" value="<?= $cu['id_customer']; ?>">
                        <button type="button" class="btn btn-default" data-dismiss="modal">No</button>
                        <button type="submit" class="btn btn-danger">Yes</button>
                    </div>

            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->
<?php endforeach; ?>