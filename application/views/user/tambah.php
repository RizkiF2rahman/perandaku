        <!-- general form elements -->
        <div class="card card-success">
            <div class="card-header">
                <h3 class="card-title">Tambah User</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
        <?php echo form_open_multipart('user/tambah');?>
                <div class="card-body">      
                    <div class="form-group">
                        <label for="exampleInputEmail1">Nama User</label>
                        <input type="text" name="nu" value="<?= set_value('nu')?>" class="form-control <?= form_error('nu') ? 'is-invalid' : null ?>" placeholder="Masukan User">
                        <small class="form-text text-danger"> <?= form_error('nu'); ?> </small>
                    </div>  

                    <div class="form-group">
                        <label for="exampleInputEmail1">Username*</label>
                        <input type="text" name="un" value="<?= set_value('un')?>" class="form-control <?= form_error('un') ? 'is-invalid' : null ?>" placeholder="Masukan Username">
                        <small class="form-text text-danger"> <?= form_error('un'); ?> </small>
                    </div>  

                    <div class="form-group">
                        <label for="exampleInputEmail1">Password*</label>
                        <input type="password" name="pass1" value="<?= set_value('pass1')?>" class="form-control <?= form_error('pass1') ? 'is-invalid' : null ?>" placeholder="Masukan Password">
                        <small class="form-text text-danger"> <?= form_error('pass1'); ?> </small>
                    </div>  

                    <div class="form-group">
                        <label for="exampleInputEmail1">Konfirmasi Password*</label>
                        <input type="password" name="pass2" value="<?= set_value('pass2')?>" class="form-control <?= form_error('pass2') ? 'is-invalid' : null ?>" placeholder="Masukan Konfirmasi Password">
                        <small class="form-text text-danger"> <?= form_error('pass2'); ?> </small>
                    </div>

                    <div class="form-group">
                        <label for="email">Hak Akses</label>
                        <select name="level" class="form-control <?= form_error('level') ? 'is-invalid' : null ?>">
                            <option value="">--PILIH--</option>
                            <option value="1">Admin</option>
                            <option value="2">Bendahara</option>    
                            <option value="3">Direktur</option>      
                        </select>
                        <small class="form-text text-danger"> <?= form_error('level'); ?> </small>
                    </div>                

                <div class="form-group">
                    <label>Upload Foto</label>
                        <div class="input-group">
                            <div class="custom-file">
                                <input type="file" name="foto" class="custom-file-input">
                                <label class="custom-file-label">Choose file</label>
                            </div>
                        </div>   
                </div>  
            </div>
                <!-- /.card-body -->
                <div align="right" class="card-footer">
                    <button  type="submit" name="tambah" id="simpan" class="btn  btn-flat btn-lg btn-success">
                    <i class="fas fa-paper-plane"></i> Simpan
                    </button>
                </div>              
        <?php echo form_close(); ?>
        </div>
        <!-- /.card -->