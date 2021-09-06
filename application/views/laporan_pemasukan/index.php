<div class="col-lg-4">
    <div class="card card-widget">
        <div class="card-body">
            <form action="<?=base_url('laporan_pemasukan/lap_pemasukan');?>" method="POST">
                <div class="form-group">
                    <label for="tgl_mulai">Mulai</label>
                        <input class="form-control" type="date" name="tgl_mulai" 
                        value="<?php $bulan = mktime(0,0,0, date('m')-1,date('d'), date('Y'));
                        echo date('Y-m-d', $bulan);?>" prequired="">
                </div>
                <div class="form-group">
                    <label for="tgl_sampai">Sampai</label>
                        <input class="form-control" type="date" name="tgl_sampai" value="<?= date('Y-m-d');?>" required="">
                </div>
                <button type="submit" class=" btn btn-primary">Cetak Periode</button>
                <a href="<?= base_url('laporan_pemasukan/cetak_semua'); ?>" class="btn btn-primary">Cetak Semua</a>
            </form>
        </div>
    </div>
</div>