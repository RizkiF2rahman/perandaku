<div class="card">
    <div class="card-header">
        <div class="col-md-2">
            <a href="<?= base_url('produk/tambah'); ?>" class="btn btn-block btn-outline-primary">Tambah Data</a>
        </div>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
        <table id="example1" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <td align="center">No</td>
                    <td align="center">Nama Produk</td>
                    <td align="center">Harga</td>
                    <td align="center">Aksi</td>
                </tr>
            </thead>

            <tbody?>
                <?php
                $No = 1;
                foreach ($produk as $pr) :
                ?>
                    <tr>
                        <td align="center"><?= $No++; ?></td>
                        <td align="center"><?= $pr['nama_pro']; ?></td>
                        <td align="center">Rp. <?= number_format($pr['harga'], 0, ',', '.'); ?>,-</td>
                        <td align="center">
                            <a href="<?= base_url(); ?>produk/ubah/<?= $pr['id_pro']; ?>" class="btn btn-small text-info"><i class="fas fa-edit">Edit</i></a>
                            <a href="" class="btn btn-small text-danger" data-toggle="modal" data-target="#modal-hapus<?= $pr['id_pro']; ?>"><i class="fas fa-trash">Hapus</i></a>
                        </td>
                    </tr>
                <?php endforeach; ?>
                </tbody>
        </table>
    </div>
</div>

<?php foreach ($produk as $pr) : ?>
    <div class="modal fade" id="modal-hapus<?= $pr['id_pro']; ?>">
        <div class="modal-dialog">
            <div class="modal-content bg-dark">
                <div class="modal-header">
                    <h4 class="modal-title">Hapus Data</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form method="post" action="<?= base_url('produk/hapus'); ?>">
                    <div class="modal-body">
                        <p>Apakah Yakin Hapus Data...?</p>
                    </div>
                    <div class="modal-footer justify-content-between">
                        <input type="hidden" name="kode" value="<?= $pr['id_pro']; ?>">
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