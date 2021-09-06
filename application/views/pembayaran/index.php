<div class="card">
  <div class="card-header">
    <div class="col-md-2">
      <a href="<?= base_url('pembayaran/tambah'); ?>" class="btn btn-block btn-outline-primary">Tambah Data</a>
    </div>
  </div>
  <!-- /.card-header -->
  <div class="card-body">
    <table id="example1" class="table table-bordered table-striped">
      <thead>
        <tr>
          <td align="center">No</td>
          <td align="center">Metode Pembayaran</td>
          <td align="center">Aksi</td>
        </tr>

      </thead>
      <tbody?>
        <?php
        $no = 1;
        foreach ($pembayaran as $byr) :
        ?>
          <tr>
            <td align="center"><?= $no++; ?></>
            <td align="center"><?= $byr['transaksi']; ?></align=>
            <td align="center">
              <a href="<?= base_url() ?>pembayaran/ubah/<?= $byr['id_pembayaran']; ?>" class="btn btn-small text-info"><i class="fas fa-edit">Edit</i></a>
              <a href="" class="btn btn-small text-danger" data-toggle="modal" data-target="#modal-hapus<?= $byr['id_pembayaran']; ?>"><i class="fas fa-trash">Hapus</i></a>
            </td>
          </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
  </div>

  <?php foreach ($pembayaran as $byr) : ?>
    <div class="modal fade" id="modal-hapus<?= $byr['id_pembayaran']; ?>">
      <div class="modal-dialog">
        <div class="modal-content bg-warning">
          <div class="modal-header">
            <h4 class="modal-title">Hapus Data</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <form method="post" action="<?= base_url('pembayaran/hapus'); ?>">
            <div class="modal-body">
              <p>Apakah Yakin Hapus Data...?</p>
            </div>
            <div class="modal-footer justify-content-between">
              <input type="hidden" name="kd" value="<?= $byr['id_pembayaran']; ?>">
              <button type="button" class="btn btn-danger" data-dismiss="modal">No</button>
              <button type="submit" class="btn btn-primary">Yes</button>
            </div>
          </form>
        </div>
        <!-- /.modal-content -->
      </div>
      <!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->
</div>
<?php endforeach; ?>