<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="utf-8">
   <title><?= $title ?></title>
   <link rel="icon" href="<?= base_url(); ?>assets/dist/foto/logo.png">

   <meta name="viewport" content="width=device-width, initial-scale=1">
   <!-- Google Font: Source Sans Pro -->
   <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
   <!-- Font Awesome -->
   <link rel="stylesheet" href="<?= base_url(); ?>assets/plugins/fontawesome-free/css/all.min.css">
   <!-- Ionicons -->
   <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
   <!-- Tempusdominus Bootstrap 4 -->
   <link rel="stylesheet" href="<?= base_url(); ?>assets/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
   <!-- iCheck -->
   <link rel="stylesheet" href="<?= base_url(); ?>assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
   <!-- JQVMap -->
   <link rel="stylesheet" href="<?= base_url(); ?>assets/plugins/jqvmap/jqvmap.min.css">
   <!-- Theme style -->
   <link rel="stylesheet" href="<?= base_url(); ?>assets/dist/css/adminlte.min.css">
   <!-- overlayScrollbars -->
   <link rel="stylesheet" href="<?= base_url(); ?>assets/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
   <!-- Daterange picker -->
   <link rel="stylesheet" href="<?= base_url(); ?>assets/plugins/daterangepicker/daterangepicker.css">
   <!-- summernote -->
   <link rel="stylesheet" href="<?= base_url(); ?>assets/plugins/summernote/summernote-bs4.min.css">
   <!-- DataTables -->
   <link rel="stylesheet" href="<?= base_url(); ?>assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
   <link rel="stylesheet" href="<?= base_url(); ?>assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
   <link rel="stylesheet" href="<?= base_url(); ?>assets/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
   <!--selcect2 -->
   <link rel="stylesheet" href="<?= base_url(); ?>assets/plugins/select2/css/select2.min.css">
   <link rel="stylesheet" href="<?= base_url(); ?>assets/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
   <!-- fullCalendar -->
   <link rel="stylesheet" href="<?= base_url(); ?>assets/plugins/fullcalendar/main.css">
</head>

<body class="hold-transition sidebar-mini layout-fixed">
   <div class="wrapper">

      <!-- Navbar -->
      <nav class="main-header navbar navbar-expand navbar-warning navbar-black">
         <!-- Left navbar links -->
         <ul class="navbar-nav">
            <li class="nav-item">
               <a class="nav-link" data-widget="pushmenu" href="#">
                  <i class="fas fa-bars"></i>
               </a>
            </li>
            <li class="nav-item d-none d-sm-inline-block">
               <a href="<?= base_url('home/index'); ?>" class="nav-link">
                  <h5>HOME</h5>
               </a>
            </li>
         </ul>

         <!-- SEARCH FORM -->
         <form class="form-inline ml-3">
            <div class="input-group input-group-sm">
               <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
               <div class="input-group-append">
                  <button class="btn btn-navbar" type="submit">
                     <i class="fas fa-search"></i>
                  </button>
               </div>
            </div>
         </form>
      </nav>
      <!-- /.navbar -->

      <!-- Main Sidebar Container -->
      <aside class="main-sidebar sidebar-dark-primary elevation-4">
         <!-- Brand Logo -->
         <a href="<?= base_url('home/index'); ?>" class="brand-link">
            <img src="<?= base_url(); ?>assets/dist/foto/logo.png" alt="User Image" class="brand-image elevation-3" style="opacity: 1">
            <span class="brand-text font-weight-light">
               <h3><strong> CV. DERWATI </strong></h3>
            </span>
         </a>

         <!-- Sidebar -->
         <div class="sidebar">
            <!-- Sidebar user panel (optional) -->
            <div class="user-panel mt-3 pb-3 mb-3 d-flex">
               <div class="image">
                  <img src="<?= base_url(); ?>assets/dist/foto/<?= $this->fungsi->user_login()->foto ?>" class="img-circle elevation-2" alt="User Image">
               </div>
               <div class="info">
                  <a href="<?= base_url('home/index'); ?>" class="d-block"><?= $this->fungsi->user_login()->nama_user ?></a>
               </div>
            </div>

            <nav class="mt-2">
               <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

                  <div class="modal-content bg-info">
                     <li class="nav-item">
                        <a href="#" class="nav-link ">
                           <i class="nav-icon fas fa-folder-open"></i>
                           <p>
                              Data Master
                              <i class="right fas fa-angle-left"></i>
                           </p>
                        </a>
                        <ul class="nav nav-treeview">
                           <li class="nav-item">
                              <a href="<?= base_url('posisi/index'); ?>" class="nav-link">
                                 <i class="far fa-circle nav-icon"></i>
                                 <p>Posisi</p>
                              </a>
                           </li>
                           <li class="nav-item">
                              <a href="<?= base_url('pegawai/index'); ?>" class="nav-link">
                                 <i class="far fa-circle nav-icon"></i>
                                 <p>Pegawai</p>
                              </a>
                           </li>
                           <li class="nav-item">
                              <a href="<?= base_url('kategori/index'); ?>" class="nav-link">
                                 <i class="far fa-circle nav-icon"></i>
                                 <p>Kategori Pembayaran</p>
                              </a>
                           </li>
                           <li class="nav-item">
                              <a href="<?= base_url('pembayaran/index'); ?>" class="nav-link">
                                 <i class="far fa-circle nav-icon"></i>
                                 <p>Metode Pembayaran</p>
                              </a>
                           </li>
                           <li class="nav-item">
                              <a href="<?= base_url('produk/index'); ?>" class="nav-link">
                                 <i class="far fa-circle nav-icon"></i>
                                 <p>Produk</p>
                              </a>
                           </li>
                           <li class="nav-item">
                              <a href="<?= base_url('customer/index'); ?>" class="nav-link">
                                 <i class="far fa-circle nav-icon"></i>
                                 <p>Customer</p>
                              </a>
                           </li>
                        </ul>
                     </li>
                  </div>

                  <?php if ($this->fungsi->user_login()->level == 1 or $this->fungsi->user_login()->level == 2) { ?>
                     <div class="modal-content bg-green">
                        <li class="nav-item ">
                           <a href="#" class="nav-link">
                              <i class="nav-icon fas fa-file-alt"></i>
                              <p>
                                 Data Transaksi
                                 <i class="right fas fa-angle-left"></i>
                              </p>
                           </a>
                           <ul class="nav nav-treeview">
                              <li class="nav-item">
                                 <a href="<?= base_url('pemasukan/index'); ?>" class="nav-link ">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Pemasukan</p>
                                 </a>
                              </li>
                              <li class="nav-item">
                                 <a href="<?= base_url('pengeluaran/index'); ?>" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Pengeluaran</p>
                                 </a>
                              </li>
                           </ul>
                        </li>
                     </div>
                  <?php } ?>

                  <div class="modal-content bg-gradient-navy">
                     <li class="nav-item ">
                        <a href="#" class="nav-link ">
                           <i class="nav-icon fas fa-table"></i>
                           <p>
                              Data Laporan
                              <i class="right fas fa-angle-left"></i>
                           </p>
                        </a>
                        <ul class="nav nav-treeview">
                           <li class="nav-item">
                              <a href="<?= base_url('laporan_pemasukan/index'); ?>" class="nav-link ">
                                 <i class="far fa-circle nav-icon"></i>
                                 <p>Laporan Pemasukan</p>
                              </a>
                           </li>

                           <li class="nav-item">
                              <a href="<?= base_url('laporan_pengeluaran/index'); ?>" class="nav-link">
                                 <i class="far fa-circle nav-icon"></i>
                                 <p>Laporan Pengeluaran</p>
                              </a>
                           </li>
                           <li class="nav-item">
                              <a href="<?= base_url('laporan_aruskas'); ?>" class="nav-link ">
                                 <i class="far fa-circle nav-icon"></i>
                                 <p>Laporan Laba Rugi</p>
                              </a>
                           </li>
                        </ul>
                     </li>
                  </div>

                  <?php if ($this->fungsi->user_login()->level == 1) { ?>
                     <div class="modal-content bg-purple">
                        <li class="nav-item ">
                           <a href="#" class="nav-link ">
                              <i class="nav-icon fas fa-user-alt"></i>
                              <p>
                                 Manajemen User
                                 <i class="right fas fa-angle-left"></i>
                              </p>
                           </a>
                           <ul class="nav nav-treeview">
                              <li class="nav-item">
                                 <a href="<?= base_url('user/index'); ?>" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>User</p>
                                 </a>
                              </li>

                              <li class="nav-item">
                                 <a href="<?= base_url('user/ubah_password'); ?>" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Ubah Password</p>
                                 </a>
                              </li>
                           </ul>
                        </li>
                     </div>
                  <?php } ?>

                  <li class="nav-item ">
                     <a href="<?= base_url('auth/logout'); ?>" class="nav-link ">
                        <i class="nav-icon fas fa-sign-out-alt"></i>
                        <p>
                           Logout
                        </p>
                     </a>
                  </li>
               </ul>
            </nav>
            <!-- /.sidebar-menu -->
         </div>
         <!-- /.sidebar -->
      </aside>

      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
         <!-- Content Header (Page header) -->
         <div class="content-header">
            <div class="container-fluid">
               <div class="row mb-2">
                  <div class="col-sm-6">
                     <h1 class="m-0"><?= $judul ?></h1>
                  </div><!-- /.col -->
                  <div class="col-sm-6">
                     <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?= base_url('home/index'); ?>">Home</a></li>
                        <li class="breadcrumb-item active"><?= $judul ?></li>
                     </ol>
                  </div><!-- /.col -->
               </div><!-- /.row -->
            </div><!-- /.container-fluid -->
         </div>
         <!-- /.content-header -->

         <!-- Main content -->
         <section class="content">
            <div class="container-fluid">