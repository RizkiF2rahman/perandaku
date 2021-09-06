<div class="alert alert-success alert-dismissible">
  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
  <h5>
    <i class="icon fas fa-info"></i> Total Pengeluaran
  </h5>
  <h2><b>
    <span style="font-size:33pt" id="ttl"> 
      Rp. <?= $subtotal == '' ? "0" : number_format($subtotal, 0, ',', '.'); ?>,-
    </span>
  </b></h2>
</div>

<div class="card card-info">
  <div class="card-header">
    <h3 class="card-title">
      <i class="fa fa-table"></i> 
        Pengeluaran
    </h3>
  </div>
  <!-- /.card-header -->

  <div class="card-body">
    <div class="table-responsive">
      <div>
        <a href="<?= base_url('pengeluaran/tambah') ?>" class="btn btn-blok btn-primary">
          <i class="fa fa-edit"></i> Tambah Data</a>
      </div>
      <br>
      <table id="example1" class="table table-bordered table-striped">
        <thead>
          <tr align="center">
            <td><b>No Faktur</td>
            <td><b>Kategori</td>
            <td><b>Deskripsi</td>
            <td><b>Tanggal</td>
            <td><b>Pembayaran Via</td>
            <td><b>Total Pengeluaran</td>
            <td><b>Aksi</td>
          </tr>
        </thead>

        <tbody>
          <?php
          foreach ($pengeluaran as $pg) :
          ?>
            <tr>
              <td><?= $pg['nofaktur_pg']; ?></td>
              <td><?= $pg['kategori']; ?></td>
              <td><?= $pg['uraian']; ?></td>
              <td><?= $pg['tanggal']; ?></td>
              <td><?= $pg['transaksi']; ?></td>
              <td align="right">Rp. <?= number_format($pg['total_bayar'], 0, ',', '.'); ?>,-</td>
              <td align="center">
                <a href="<?= base_url(); ?>pengeluaran/ubah/<?= $pg['nofaktur_pg']; ?>" class="btn btn-small text-info">
                  <i class="fas fa-edit">Edit</i>
                </a>
                <a href="" class="btn btn-small text-danger" data-toggle="modal" data-target="#modal-hapus<?= $pg['nofaktur_pg']; ?>">
                  <i class="fas fa-trash">Hapus</i>
                </a>
              </td>
            </tr>
          <?php endforeach; ?>
        </tbody>
      </table>
    </div>
  </div>
</div>

<?php foreach ($pengeluaran as $pg) : ?>
  <div class="modal fade" id="modal-hapus<?= $pg['nofaktur_pg']; ?>">
    <div class="modal-dialog">
      <div class="modal-content bg-primary">
        <div class="modal-header">
          <h4 class="modal-title">Hapus Data</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>

        <form method="post" action="<?= base_url('pengeluaran/hapus'); ?>">
          <div class="modal-body">
            <p>Apakah Yakin Hapus&hellip;?</p>
          </div>
          <div class="modal-footer justify-content-between">
            <input type="hidden" name="kd" value="<?= $pg['nofaktur_pg']; ?>">
            <button type="button" class="btn btn-default" data-dismiss="modal">No</button>
            <button type="submit" class="btn btn-danger">Yes</button>
          </div>

      </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
  </div>
  <!-- /.modal -->
<?php endforeach; ?>