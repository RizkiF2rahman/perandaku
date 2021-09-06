<!-- Breadcrumbs-->
<ol class="breadcrumb">
    <li class="breadcrumb-item">
        <a href="<?= base_url('laporan_aruskas/laporan_aruskas') ?>"><?php echo $judul; ?></a>
    </li>
    <li class="breadcrumb-item active">Per Tanggal : <?= date('d/m/Y', strtotime($tgl_awal)); ?> s.d <?= date('d/m/Y', strtotime($tgl_akhir)); ?></li>
</ol>

<div class="card shadow mb-4">
    <div class="card-header py-3">
        <div class="dropdown">
            <button class="btn btn-warning dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Ekspor Ke
            </button>
            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                <a class="dropdown-item" href="<?= base_url('laporan_aruskas/cetak_laporan_aruskas/' . $tgl_awal . '/' . $tgl_akhir); ?>">
                    <span class="icon text-black-200">
                        <i class="fas fa-fw fa-print"></i>
                    </span>
                    <span class="text-black-200">Print</span>
                </a>
            </div>
        </div>
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <div id="dataTable_wrapper" class="dataTables_wrapper dt-bootstrap4">
                <table class="table table-bordered" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th colspan="3">Pemasukan Dana Keuangan</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php foreach ($laporan_pemasukan as $data) { ?>
                            <tr>
                                <td width="30"><?php echo date('d/m/Y', strtotime($data['tanggal'])); ?></td>

                                <td><?php echo $data['nama']; ?> - <?php echo $data['uraian']; ?></td>

                                <td width="180">Rp. <?php echo number_format($data['total_bayar'], 2, ',', '.'); ?>,-</td>

                            </tr>
                        <?php } ?>
                    </tbody>

                    <tr>
                        <td align="right" class="text-primary" colspan="2">Total Pemasukan</td>
                        <td align="right" class="text-primary">Rp. <?= number_format($grand_total_masuk, 2, ',', '.'); ?>,-</td>
                    </tr>
                </table><br>

                <table class="table table-bordered" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th colspan="3">Pengeluaran Dana Keuangan</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php foreach ($laporan_pengeluaran as $data) { ?>
                            <tr>
                                <td width="30"><?php echo date('d/m/Y', strtotime($data['tanggal'])); ?></td>
                                <td><?php echo $data['uraian']; ?></td>
                                <td width="180">Rp. <?php echo number_format($data['total_bayar'], 2, ',', '.'); ?>,-</td>
                            </tr>
                        <?php } ?>
                    </tbody>

                    <tr>
                        <td align="right" class="text-primary" colspan="2">Total Pengeluaran</td>
                        <td align="right" class="text-primary">Rp. <?= number_format($grand_total_keluar, 2, ',', '.'); ?>,-</td>
                    </tr>
                </table>

                <?php
                error_reporting(0);
                $sisa_saldo = $grand_total_masuk - $grand_total_keluar;

                $saldoawal = $saldoawal_masuk - $saldoawal_keluar;

                $laba_rugi = $saldoawal + $sisa_saldo;
                ?>

                <table class="table table-bordered" width="100%" cellspacing="0">
                    <tr>
                        <td align="left" class="text-success" colspan="2">Total Saldo Awal</td>
                        <td align="right" class="text-success">Rp. <?= number_format($saldoawal, 2, ',', '.'); ?>,-</td>
                    </tr>
                    <tr>
                        <td align="left" class="text-danger" colspan="2">Total Saldo Akhir</td>
                        <td align="right" class="text-danger">Rp. <?= number_format($laba_rugi, 2, ',', '.'); ?>,-</td>
                    </tr>
                    <tr>
                        <td></td>
                    </tr>
                    <tr>
                        <td align="left" class="text-warning" colspan="2">Total Laba / Rugi</td>
                        <td align="right" class="text-warning">Rp. <?= number_format($sisa_saldo, 2, ',', '.'); ?>,-</td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
</div>