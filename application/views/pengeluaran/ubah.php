<!-- general form elements -->
<div class="card card-primary">
    <div class="card-header">
        <h3 class="card-title">Edit Data Pengeluaran</h3>
    </div>
    <!-- /.card-header -->
    <!-- form start -->
    <form action="" method="post">
        <div class="card-body">

            <div class="form-group">
                <label>No Faktur</label>
                <input type="text" name="kd_pg" value="<?= $ubah_keluar['nofaktur_pg'] ?>" class="form-control" readonly>
                <small class="form-text text-danger"><?= form_error('nofaktur'); ?></small>
            </div>

            <div class="form-group">
                <label>Kategori</label>
                <select name="kt" class="form-control">
                    <option value="<?= $ubah_keluar['id_kategori']; ?>"><?= $ubah_keluar['kategori']; ?></option>
                    <?php foreach ($kategori as $kt) : ?>
                        <option value="<?= $kt['id']; ?>"><?= $kt['kategori']; ?></option>
                    <?php endforeach; ?>
                </select>
                <small class="form-text text-danger"><?= form_error('kt'); ?></small>
            </div>

            <div class="form-group">
                <label>Deskripsi</label>
                <input type="text" name="uraian" value="<?= $ubah_keluar['uraian'] ?>" class="form-control" placeholder="Input Deskripsi">
                <small class="form-text text-danger"></small>
            </div>

            <div class="form-group">
                <label>Tanggal</label>
                <input type="date" name="tgl" value="<?= $ubah_keluar['tanggal'] ?>" class="form-control">
                <small class="form-text text-danger"><?= form_error('tgl'); ?></small>
            </div>

            <div class="form-group">
                <label>Pembayaran Via</label>
                <select name="bay" class="form-control <?= form_error('bay') ? 'is-invalid' : null ?>">
                    <option value="<?= $ubah_keluar['id_bayar']; ?>"><?= $ubah_keluar['transaksi']; ?></option>
                    <?php foreach ($pembayaran as $byr) : ?>
                        <option value="<?= $byr['id_pembayaran']; ?>"><?= $byr['transaksi']; ?></option>
                    <?php endforeach; ?>
                </select>
                <small class="form-text text-danger"><?= form_error('bay'); ?></small>
            </div>

            <div class="form-group">
                <label>Total Bayar</label>
                <input type="number" name="total" value="<?= $ubah_keluar['total_bayar'] ?>" class="form-control" placeholder="0">
                <small class="form-text text-danger"><?= form_error('total'); ?></small>
            </div>

            <!-- /.card-body -->
            <div class="card-footer">
                <button type="submit" name="ubah" class="btn btn-primary">Update</button>
            </div>
    </form>
</div>