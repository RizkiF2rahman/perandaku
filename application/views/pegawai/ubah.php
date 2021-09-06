<div class="card card-primary">
    <div class="card-header">
        <h3 class="card-title">Update Data Pegawai</h3>
    </div>
    <!-- /.card-header -->
    <!-- form start -->
    <form method="post" action="">
        <div class="card-body">
            <div class="form-group">
                <input type="hidden" name="kd_pg" value="<?= $ubah_peg['id_peg']; ?>">
                <label>Nama Pegawai</label>
                <input type="text" name="nm_peg" value="<?= $ubah_peg['nama_peg'] ?>" class="form-control" placeholder="Masukan Nama Pegawai">
                <small class="form-text text-danger"><?= form_error('nm_peg'); ?></small>
            </div>

            <div class="form-group">
                <label>Posisi</label>
                <select name="ps" class="form-control">
                    <option value="<?= $ubah_peg['id_pos']; ?>"><?= $ubah_peg['nama_pos']; ?></option>

                    <?php foreach ($posisi as $ps) : ?>
                        <option value="<?= $ps['id_pos']; ?>"><?= $ps['nama_pos']; ?></option>
                    <?php endforeach; ?>
                </select>
                <small class="form-text text-danger"><?= form_error('ps'); ?></small>
            </div>

            <div class="form-group">
                <label>Jenis Kelamin</label>
                <select name="jkl" class="form-control <?= form_error('jkl') ? 'is-invalid' : null ?>">
                    <option value="<?= $ubah_peg['jenis_kel']; ?>"><?= $ubah_peg['jenis_kel']; ?></option>
                    <option value="Laki-Laki">Laki-Laki</option>
                    <option value="Perempuan">Perempuan</option>
                </select>
                <small class="form-text text-danger"><?= form_error('jkl'); ?></small>
            </div>

            <div class="form-group">
                <label>Agama</label>
                <select name="agama" class="form-control <?= form_error('agama') ? 'is-invalid' : null ?>">
                    <option value="<?= $ubah_peg['agama']; ?>"><?= $ubah_peg['agama']; ?></option>
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
                <input type="text" name="alamat" value="<?= $ubah_peg['alamat'] ?>" class="form-control" placeholder="Masukan Alamat">
                <small class="form-text text-danger"><?= form_error('alamat'); ?></small>
            </div>

            <div class="form-group">
                <label>No Telfon</label>
                <input type="number" name="nt" value="<?= $ubah_peg['notelp'] ?>" class="form-control" placeholder="Masukan No Telfon">
                <small class="form-text text-danger"><?= form_error('nt'); ?></small>
            </div>
        </div>
        <!-- /.card-body -->
        <div class="card-footer">
            <button type="submit" name="ubah" class="btn btn-primary">Update</button>
        </div>
    </form>
</div>