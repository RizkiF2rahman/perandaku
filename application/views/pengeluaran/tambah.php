<!-- general form elements -->
<div class="card card-primary">
    <div class="card-header">
        <h3 class="card-title">Tambah Data Pengeluaran</h3>
    </div>
    <!-- /.card-header -->
    <!-- form start -->
    <form action="" method="post">
        <div class="card-body">
            <div class="form-group">
                <label>No Faktur</label>
                <input type="text" name="nofaktur" value="<?= $nofaktur ?>" class="form-control" readonly>
                <small class="form-text text-danger"><?= form_error('nofaktur'); ?></small>
            </div>

            <div class="form-group">
                <label>Kategori</label>
                <select name="kt" class="form-control <?= form_error('kt') ? 'is-invalid' : null ?>">
                    <option value="">--Pilih--</option>
                    <?php foreach ($kategori as $kt) : ?>
                        <option value="<?= $kt['id']; ?>"><?= $kt['kategori']; ?></option>
                    <?php endforeach; ?>
                </select>
                <small class="form-text text-danger"><?= form_error('kt'); ?></small>
            </div>

            <div class="form-group">
                <label>Deskripsi</label>
                <input type="text" name="uraian" value="<?= set_value('uraian') ?>" class="form-control <?= form_error('uraian') ? 'is-invalid' : null ?>" placeholder="Masukkan Deskripsi">
                <small class="form-text text-danger"><?= form_error('uraian'); ?></small>
            </div>

            <div class="form-group">
                <label>Tanggal</label>
                <input type="date" name="tgl" value="<?= set_value('tgl') ?>" class="form-control <?= form_error('tgl') ? 'is-invalid' : null ?>">
                <small class="form-text text-danger"><?= form_error('tgl'); ?></small>
            </div>

            <div class="form-group">
                <label>Pembayaran Via</label>
                <select name="bay" class="form-control <?= form_error('bay') ? 'is-invalid' : null ?>">
                    <option value="">--Pilih--</option>
                    <?php foreach ($pembayaran as $byr) : ?>
                        <option value="<?= $byr['id_pembayaran']; ?>"><?= $byr['transaksi']; ?></option>
                    <?php endforeach; ?>
                </select>
                <small class="form-text text-danger"><?= form_error('bay'); ?></small>
            </div>

            <div class="form-group">
                <label>Total Bayar</label>
                <input type="number" name="total" value="<?= set_value('total') ?>" class="form-control <?= form_error('total') ? 'is-invalid' : null ?>" placeholder="0">
                <small class="form-text text-danger"><?= form_error('total'); ?></small>
            </div>
        </div>
        <!-- /.card-body -->

        <div class="card-footer">
            <button type="submit" name="tambah" class="btn btn-primary">Simpan</button>
        </div>
    </form>
</div>
<!-- /.card -->