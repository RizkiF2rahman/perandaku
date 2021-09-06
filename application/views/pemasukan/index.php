<div class="row">
  <div class="col-lg-6">
    <div class="card card-widget">
      <div class="card-body">
        <table class="100%">
          <tr>
            <td class="form-group">
              <div class="form-group">
                <label for="date">Tanggal</label>
              </div>
            </td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td class="form-group">
              <div class="form-group">
                <input type="date" name="date" id="date" value="<?= date('Y-m-d') ?>" class="form-control" readonly>
              </div>
            </td>
          </tr>
        </table>
      </div>
    </div>
  </div>

  <div class="col-lg-6">
    <div class="card card-widget">
      <div class="card-body">
        <div>
          <h1>No Faktur : <b><span id="faktur"><?= $nofaktur; ?></span></h1>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="row">
  <div class="col-lg-12">
    <div class="card card-widget">
      <div class="card-body">
        <table width="100%">
          <form action="<?= base_url('pemasukan/tambah_keranjang') ?>" method="post">
            <input type="hidden" name="user" value="<?= $this->fungsi->user_login()->id_user ?>">
            <tr>
              <td>
                <div class="form-group input-group">
                  <input type="text" name="pro" id="pro" class="form-control" placeholder="Pilih Pemasukan" readonly autofocus>
                  <span class="input-group-btn">
                    <button type="button" id="produk" class="btn btn-info btn-flat" data-toggel="modal" data-target="#modal-pro">
                      <i class="fa fa-search"></i>
                    </button>
                  </span>
                </div>
              </td>
              <td></td>
              <td>
                <div class="form-group">
                  <input type="text" name="nm_pro" id="nm_pro" class="form-control" placeholder="Nama Produk" readonly>
                </div>
              </td>
              <td></td>
              <td>
                <div class="form-group">
                  <input type="number" name="harga" id="harga" class="form-control" placeholder="Harga" readonly>
                </div>
              </td>
              <td></td>
              <td>
                <div class="form-group">
                  <input required type="number" name="jumlah" id="jumlah" min="1" class="form-control" placeholder="Jumlah">
                </div>
              </td>
              <td></td>
              <td>
                <div class="form-group">
                  <button type="submit" name="tambah_keranjang" id="tambah" class="btn btn-primary">
                    <i class="fa fa-cart-plus"> </i> tambah
                  </button>
                </div>
              </td>
            </tr>
          </form>
        </table>
      </div>
    </div>
  </div>
</div>

<form action="<?= base_url('pemasukan/simpan'); ?>" method="post">
  <div class="row">
    <div class="col-lg-12">
      <div class="card card-widget">
        <div class="card-body table-responsive">
          <table class="table table-bordered table-striped">

            <thead class="text-center">
              <th>No</th>
              <th>Nama Barang</th>
              <th>Harga</th>
              <th>Jumlah</th>
              <th>Subtotal</th>
              <th>Aksi</th>
            </thead>

            <tbody id="cart_table">

              <?php if ($keranjang == 0) { ?>
                <tr>
                  <td colspan="9" class="text-center">Tidak ada pemasukan</td>
                </tr>
              <?php } else { ?>
                <?php
                $no = 1;
                foreach ($keranjang as $kjg) :
                ?>

                  <tr>
                    <td align="center">
                      <?= $no++ ?> <input type="hidden" name="no_faktur[]" value="<?= $nofaktur ?>">
                    </td>
                    <td>
                      <?= $kjg['nama_pd']; ?> <input type="hidden" name="pro[]" value="<?= $kjg['id_pd']; ?>">
                    </td>
                    <td align="right">
                      Rp. <?= number_format($kjg['harga'], 0, ',', '.'); ?>,-
                      <input type="hidden" name="harga[]" value="<?= $kjg['harga']; ?>">
                    </td>
                    <td align="center">
                      <?= $kjg['jumlah']; ?> <input type="hidden" name="jumlah[]" value="<?= $kjg['jumlah']; ?>">
                    </td>
                    <td align="right">Rp. <?= number_format($kjg['subtotal'], 0, ',', '.'); ?>,-
                      <input type="hidden" name="subtotal[]" value="<?= $kjg['subtotal']; ?>">
                    </td>
                    <td align="center">
                      <a href="<?= base_url() ?>pemasukan/hapus_keranjang/<?= $kjg['id']; ?>" class="btn btn-small text-danger">
                        <i class="fas fa-trash"></i>
                      </a>
                    </td>
                  </tr>
                <?php endforeach; ?>
              <?php } ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>

  <input type="hidden" name="user_id" value="<?= $this->fungsi->user_login()->id_user ?>">
  <input type="hidden" name="tgl" id="date" value="<?= date('Y-m-d') ?>">
  <input type="hidden" name="nofaktur" value="<?= $nofaktur ?>">
  <input type="hidden" name="cus" id="id_cs">
  <input type="hidden" name="kat" id="id_kt">
  <input type="hidden" name="by" id="id_byr">
  <input type="hidden" name="total" value="<?= $total ?>">


  <div class="row">
    <div class="col-lg-4">
      <div class="card card-widget">
        <div class="card-body">
          <table class="100%">
            <tr>
              <td>
                <label for="customer">Customer</label>
              </td>
              <td>
                <div class="form-group input-group">
                  <select name="cs" onchange="customer()" id="cus" class="form-control">
                    <option value="">--PILIH--</option>
                    <?php foreach ($customer as $cu) : ?>
                      <option value="<?= $cu['id_customer']; ?>"><?= $cu['nama']; ?></option>
                    <?php endforeach; ?>
                  </select>
                </div>
              </td>
            </tr>

            <tr>
              <td>
                <label for="kategori">Kategori</label>
              </td>
              <td>
                <div class="form-group">
                  <select name="kt" onchange="kategori()" id="kat" class="form-control">
                    <option value="">--PILIH--</option>
                    <?php foreach ($kategori as $kt) : ?>
                      <option value="<?= $kt['id']; ?>"><?= $kt['kategori']; ?></option>
                    <?php endforeach; ?>
                  </select>
                  </span>
                </div>
              </td>
            </tr>

            <tr>
              <td>
                <label for="catatan">Catatan</label>
              </td>
              <td>
                <div class="form-group">
                  <input type="text" name="uraian" onkeyup="urai()" id="uraian" class="form-control">
                </div>
              </td>
            </tr>
          </table>
        </div>
      </div>
    </div>

    <div class="col-lg-4">
      <div class="card card-widget">
        <div class="card-body">
          <table width="100%" align="center">
            <tr>
              <td>
                <div align="center">
                  <h1><b>Total : </b></h1>
                  <h4><b>
                      <span style="font-size:33pt" id="ttl">
                        Rp. <?= $total == '' ? "0" : number_format($total, 0, ',', '.'); ?>,-
                      </span>
                  </h4>
                </div>
                <div align="center">
                  <a href="<?= base_url('pemasukan/data_pemasukan'); ?>" id="simpan" class="btn btn-flat btn-lg btn-primary">
                    <i class="fa fa-list"></i> Data Pemasukan
                  </a>
                </div>
              </td>
            </tr>
          </table>
        </div>
      </div>
    </div>

    <div class="col-lg-4">
      <div class="card card-widget">
        <div class="card-body">
          <table class="100%">
            <tr>
              <td style="vertical-align:top">
                <label for="bayar">Metode Pembayaran</label>
              </td>
              <td>
                <div class="form-group">
                  <select name="bay" onchange="bayar()" id="by" class="form-control">
                    <option value="">--PILIH--</option>
                    <?php foreach ($pembayaran as $byr) : ?>
                      <option value="<?= $byr['id_pembayaran']; ?>"><?= $byr['transaksi']; ?></option>
                    <?php endforeach; ?>
                  </select>
                </div>
              </td>
            </tr>
            <tr>
              <td style="vertical-align:top; width:30%">
                <label for="bayar">Bayar</label>
              </td>
              <td>
                <div class="form-group">
                  <input required type="number" name="bayar" onkeyup="byr()" id="bayar" class="form-control">
                </div>
              </td>
            </tr>
          </table>
          <div align="right">
            <button type="button" data-toggle="modal" data-target="#modal-batal" id="simpan" class="btn btn-flat btn-lg btn-warning">
              <i class="fas fa-trash"></i> Batal
            </button>
            <button type="submit" name="simpan" id="simpan" class="btn btn-flat btn-lg btn-success">
              <i class="fas fa-paper-plane"></i> simpan
            </button>
          </div>
        </div>
      </div>
    </div>
  </div>
</form>

<div class="modal fade" id="modal-produk" aria-modal="true" role="dialog">
  <div class="modal-dialog modal-lg">
    <div class="modal-content bg-success">
      <div class="modal-header">
        <h4 class="modal-title">Data Barang</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <div class="modal-body">
        <table id="example1" class="table table-bordered table-striped">
          <thead>
            <tr align="center">
              <th>No</th>
              <th>Nama Produk</th>
              <th>Harga</th>
              <th>Aksi</th>
            </tr>
          </thead>

          <tbody>
            <?php
            $no = 1;
            foreach ($produk as $pr) :
            ?>
              <tr>
                <td align="center"><?= $no++; ?></td>
                <td><?= $pr['nama_pro']; ?></td>
                <td>Rp. <?= number_format($pr['harga'], 0, ',', '.'); ?>,-</td>
                <td>
                  <button data-kd="<?= $pr['id_pro']; ?>" data-nama="<?= $pr['nama_pro']; ?>" data-harga="<?= $pr['harga']; ?>" class="btn btn-primary" id="pilihpro"><i class="fa fa-check"></i> Pilih
                  </button>
                </td>
              </tr>
            <?php endforeach; ?>
          </tbody>
        </table>
      </div>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
<!-- /.modal -->

<div class="modal fade" id="modal-batal" aria-modal="true" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title"> Transaksi Batal </h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>

      <div class="modal-body">
        <p>Apakah yakin ingin membatalkan transaksi...?</p>
      </div>
      <div class="modal-footer justify-content-between">
        <button type="button" class="btn btn-default" data-dismiss="modal">No</button>
        <a href="<?= base_url('pemasukan/index'); ?>" class="btn btn-primary">Yes</a>
      </div>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
<!-- /.modal -->