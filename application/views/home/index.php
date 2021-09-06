<!-- Small boxes (Stat box) -->
<div class="row">

    <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-warning">
            <div class="inner">
                <h4><b>3</b></h4>
                <p>Data Pengguna</p>
            </div>
            <div class="icon">
                <i class="ion ion-person-add"></i>
            </div>
            <a href="<?= base_url('user/index'); ?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
        </div>
    </div>
    <!-- ./col -->

    <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-info">
            <div class="inner">
                <h4><b>Rp. <?= number_format($pemasukan, 2, ',', '.'); ?>,-</b></h4>
                <p>Jumlah Pemasukan</p>
            </div>
            <div class="icon">
                <i class="ion ion-stats-bars"></i>
            </div>
            <a href="<?= base_url('pemasukan/index'); ?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
        </div>
    </div>
    <!-- ./col -->

    <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-success">
            <div class="inner">
                <h4><b>Rp. <?= number_format($pengeluaran, 2, ',', '.'); ?>,-</b></h4>
                <p>Jumlah Pengeluaran</p>
            </div>
            <div class="icon">
                <i class="ion ion-bag"></i>
            </div>
            <a href="<?= base_url('pengeluaran/index'); ?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
        </div>
    </div>
    <!-- ./col -->
    
    <?php $laba_rugi = $pemasukan - $pengeluaran; ?>
    <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-danger">
            <div class="inner">
                <h4><b>Rp. <?= number_format($laba_rugi, 2, ',', '.'); ?>,-</b></h4>
                <p>Rekapitulasi Dana</p>
            </div>
            <div class="icon">
                <i class="ion ion-pie-graph"></i>
            </div>
            <a href="<?= base_url('laporan_aruskas/index');?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
        </div>
    </div>
    <!-- ./col -->
</div>
<!-- /.row -->

<div class="card">
    <div class="card-header">
        <!-- Left col -->
        <div class="row">
            <div class="col-6 bg-teal">
                <!-- Info Boxes Style 2 -->
                <!-- Donut chart -->
                <div class="box box-primary box-solid">
                    <div class="box-header with-border">
                        <h3 class="box-title">Petunjuk Penggunaan</h3>
                    </div><!-- /.box-header -->
                    <div class="box-body">
                        <dl>
                            <dt>Catatan Penggunaan</dt>
                            <dd>
                                Untuk menginput data jumlah dana, tidak perlu menggunakan tanda "." (titik) dan tidak menggunakan Rp. (contoh: "100000")
                            <dt>Info</dt>
                            <dd>
                                Info lebih lanjut mengenai aplikasi:
                                <li><a href="https://api.whatsapp.com/send?phone=6281649330181"><i class="ion ion-social-whatsapp"></i> : 0895611024559</a></li>
                                <li><a href="mailto:rizkifaturiz03@gmail.com"><i class="ion ion-android-mail"></i> : rizkifaturiz03@gmail.com</a></li>
                            </dd>
                        </dl>
                    </div><!-- /.box-body -->
                </div><!-- /.box -->
                <!-- /.box -->
            </div>
            <!-- /.col -->

            <div class="col-6 bg-teal">

            </div>
        </div>
    </div>
    <!-- /.row -->
</div>