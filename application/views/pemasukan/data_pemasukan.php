<div class="card">
    <div class="card-header">
        <div class="col-md-2">
            <a href="<?= base_url('pemasukan'); ?>" class="btn btn-block btn-outline-primary btn-sm">KEMBALI</a>
        </div>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
        <table id="example2" class="table table-bordered table-hover">
            <thead>
                <tr align="center">
                    <th>No</th>
                    <th>Tanggal</th>
                    <th>No Faktur</th>
                    <th>Customer</th>
                    <th>Kategori Barang</th>
                    <th>Pembayaran Via</th>
                    <th>Total</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $no = 1;
                foreach ($data_pemasukan as $dp) :
                ?>
                    <tr>
                        <td align="center"><?= $no++ ?></td>
                        <td><?= $dp['tanggal']; ?></td>
                        <td><?= $dp['nofaktur_pen']; ?></td>
                        <td><?= $dp['nama']; ?></td>
                        <td><?= $dp['kategori']; ?></td>
                        <td><?= $dp['transaksi']; ?></td>
                        <td>Rp. <?= number_format($dp['total_bayar'], 0, ',', '.'); ?>,-</td>
                        <td>
                            <a href="#modal-hapus<?= $dp['nofaktur_pen']; ?>" data-toggle="modal" class="btn btn-small text-danger">
                                <i class="fas fa-trash"></i>Hapus</a>
                            <a href="<?= base_url() ?>pemasukan/cetak/<?= $dp['nofaktur_pen']; ?>" target="_blank" class="btn btn-small text-warning"><i class="fas fa-print"></i>Cetak</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>

<?php foreach ($data_pemasukan as $dp) : ?>
    <div class="modal fade" id="modal-hapus<?= $dp['nofaktur_pen']; ?>" aria-modal="true" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content bg-blue">
                <div class="modal-header">
                    <h4 class="modal-title">Hapus Data</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <form method="post" action="<?= base_url('pemasukan/hapus'); ?>">
                    <div class="modal-body">
                        <p>Apakah yakin ingin hapus...?</p>
                    </div>
                    <div class="modal-footer justify-content-between">
                        <input type="hidden" name="kd" value="<?= $dp['nofaktur_pen']; ?>">
                        <button type="button" class="btn btn-default" data-dismiss="modal">No</button>
                        <button value="" type="submit" class="btn btn-danger">Yes</button>
                    </div>
                </form>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
<?php endforeach; ?>