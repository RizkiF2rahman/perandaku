<div class="card card-primary">
    <div class="card-header">
        <h3 class="card-title">Tambah Data Pegawai</h3>
    </div>
    <!-- /.card-header -->
    <!-- form start -->
    <form method="post" action="">
        <div class="card-body">
            <div class="form-group">
                <label>Nama Pegawai</label>
                <input type="text" name="nm_peg" value="<?= set_value('nm_peg') ?>" class="form-control <?= form_error('nm_peg') ? 'is-invalid' : null ?>" placeholder="Masukan Nama Pegawai">
                <small class="form-text text-danger"><?= form_error('nm_peg'); ?></small>
            </div>

            <div class="form-group">
                <label>Posisi</label>
                <select name="ps" class="form-control <?= form_error('ps') ? 'is-invalid' : null ?>">
                    <option value="">--PILIH--</option>
                    <?php foreach ($posisi as $ps) : ?>
                        <option value="<?= $ps['id_pos']; ?>"><?= $ps['nama_pos']; ?></option>
                    <?php endforeach; ?>
                </select>
                <small class="form-text text-danger"><?= form_error('ps'); ?></small>
            </div>

            <div class="form-group">
                <label>Jenis Kelamin</label>
                <select name="jkl" class="form-control <?= form_error('jkl') ? 'is-invalid' : null ?>">
                    <option value="">--PILIH--</option>
                    <option value="Laki-Laki">Laki-Laki</option>
                    <option value="Perempuan">Perempuan</option>
                </select>
                <small class="form-text text-danger"><?= form_error('jkl'); ?></small>
            </div>

            <div class="form-group">
                <label>Agama</label>
                <select name="agama" class="form-control <?= form_error('agama') ? 'is-invalid' : null ?>">
                    <option value="">--PILIH--</option>
                    <option value="Islam">Islam</option>
                    <option value="Protestan">Protestan</option>
                    <option value="Katolik">Katolik</option>
                    <option value="Hindu">Hindu</option>
                    <option value="Buddha">Buddha</option>
                </select>
                <small class="form-text text-danger"><?= form_error('agama'); ?></small>
            </div>

            <div class="form-group">
                <label>Alamat</label>
                <input type="text" name="alamat" value="<?= set_value('alamat') ?>" class="form-control <?= form_error('alamat') ? 'is-invalid' : null ?>" placeholder="Masukan Alamat">
                <small class="form-text text-danger"><?= form_error('alamat'); ?></small>
            </div>

            <div class="form-group">
                <label>No Telfon</label>
                <input type="number" name="nt" value="<?= set_value('nt') ?>" class="form-control <?= form_error('nt') ? 'is-invalid' : null ?>" placeholder="Masukan No Telfon">
                <small class="form-text text-danger"><?= form_error('nt'); ?></small>
            </div>
        </div>
        <!-- /.card-body -->

        <div class="card-footer">
            <button type="submit" name="tambah" class="btn btn-primary">Simpan</button>
        </div>
    </form>
</div>