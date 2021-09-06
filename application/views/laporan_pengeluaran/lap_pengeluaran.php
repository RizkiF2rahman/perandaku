<div class="card">
    <div class="card-header">
        <div class="row">
            <div class="col-lg-9">
                <div class="dropdown">
                    <button class="btn btn-info dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Cetak Ke
                    </button>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                        <a class="dropdown-item" target="_blank" href="<?= base_url('laporan_pengeluaran/cetak_lap_pengeluaran/' . $tgl_awal . '/' . $tgl_akhir); ?>">
                            <span class="icon text-black-200">
                                <i class="fas fa-fw fa-print"></i>
                            </span>
                            <span class="text-black-200">Print</span>
                        </a>
                        <a class="dropdown-item" href="">
                            <span class="icon text-green-200">
                                <i class="fas fa-fw fa-file-excel"></i>
                            </span>
                            <span class="text-black-200">Excel</span>
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-lg-3">
                <div align="right">
                    <li class="breadcrumb-item active">Periode dari <?= date('d/m/Y', strtotime($tgl_awal)); ?> s.d <?= date('d/m/Y', strtotime($tgl_akhir)); ?></li>
                </div>
            </div>
        </div>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
        <table id="example2" class="table table-bordered table-hover">
            <thead>
                <tr align="center">
                    <th>No Faktur</th>
                    <th>Kategori</th>
                    <th>Deskripsi</th>
                    <th>Tanggal</th>
                    <th>Pembayaran Via</th>
                    <th>Subtotal</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $no = 1;
                foreach ($lap_pengeluaran as $pg) :
                ?>
                    <tr>
                        <td align="center"><?= $pg['nofaktur_pg']; ?></td>
                        <td><?= $pg['kategori']; ?></td>
                        <td><?= $pg['uraian']; ?></td>
                        <td><?= $pg['tanggal']; ?> </td>
                        <td><?= $pg['transaksi']; ?></td>
                        <td align="right">Rp. <?= number_format($pg['total_bayar'], 0, ',', '.'); ?></td>
                    </tr>
                <?php endforeach; ?>
                <tr>
                    <td colspan='5'>
                        <div style='text-align:right'><b>Total Pengeluaran : </b></div>
                    </td>
                    <td style='text-align:right'><b>Rp. <?= number_format($total, 0, ',', '.'); ?> </b></td>
                </tr>
            </tbody>
        </table>
    </div>
</div>