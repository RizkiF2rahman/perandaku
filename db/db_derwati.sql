-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 06, 2021 at 10:11 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 7.4.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_derwati`
--

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `id_customer` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `no_telp` varchar(13) NOT NULL,
  `alamat` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`id_customer`, `nama`, `no_telp`, `alamat`) VALUES
(2, 'SMP N 3 TERANTANG', '0812656533435', 'TERANTANG, KALIMANTAN BARAT'),
(3, 'SMP N 3 PONTIANAK', '0816493301999', 'TERANTANG, KALIMANTAN BARAT');

-- --------------------------------------------------------

--
-- Table structure for table `detail_pemasukan`
--

CREATE TABLE `detail_pemasukan` (
  `id_dp` int(11) NOT NULL,
  `nofaktur_pem` varchar(30) NOT NULL,
  `kd_produk` varchar(30) NOT NULL,
  `harga` double NOT NULL,
  `jumlah` int(5) NOT NULL,
  `subtotal` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `detail_pemasukan`
--

INSERT INTO `detail_pemasukan` (`id_dp`, `nofaktur_pem`, `kd_produk`, `harga`, `jumlah`, `subtotal`) VALUES
(16, '01082021000001', '1', 16500, 16, 264000),
(17, '01082021000001', '3', 14500, 25, 362500),
(18, '02082021000002', '1', 16500, 5, 82500),
(19, '02082021000002', '3', 14500, 5, 72500),
(20, '02082021000002', '4', 14500, 6, 87000),
(21, '23082021000003', '1', 16500, 20, 330000),
(22, '23082021000003', '3', 14500, 20, 290000),
(23, '23082021000003', '4', 14500, 50, 725000);

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `id` int(11) NOT NULL,
  `kategori` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`id`, `kategori`) VALUES
(1, 'Buku Pelajaran'),
(2, 'Alat Peraga'),
(3, 'Gaji Karyawan'),
(4, 'Beli ATK');

-- --------------------------------------------------------

--
-- Table structure for table `keranjang_pem`
--

CREATE TABLE `keranjang_pem` (
  `id` int(11) NOT NULL,
  `id_pd` int(11) NOT NULL,
  `nama_pd` varchar(200) NOT NULL,
  `harga` double NOT NULL,
  `jumlah` int(5) NOT NULL,
  `subtotal` double NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `keranjang_pem`
--

INSERT INTO `keranjang_pem` (`id`, `id_pd`, `nama_pd`, `harga`, `jumlah`, `subtotal`, `user_id`) VALUES
(2, 1, '', 250000, 12, 0, 0),
(20, 1, 'PKN IX', 16500, 15, 247500, 7),
(21, 3, 'Bahasa Indonesia', 14500, 15, 217500, 7),
(22, 4, 'Ilmu Pengetahuan Alam', 14500, 20, 290000, 7),
(23, 1, 'PKN IX', 16500, 5, 82500, 7);

-- --------------------------------------------------------

--
-- Table structure for table `pegawai`
--

CREATE TABLE `pegawai` (
  `id_peg` int(11) NOT NULL,
  `nama_peg` varchar(50) NOT NULL,
  `jenis_kel` varchar(20) NOT NULL,
  `agama` varchar(20) NOT NULL,
  `alamat` text NOT NULL,
  `notelp` varchar(13) NOT NULL,
  `id_ps` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pegawai`
--

INSERT INTO `pegawai` (`id_peg`, `nama_peg`, `jenis_kel`, `agama`, `alamat`, `notelp`, `id_ps`) VALUES
(11, 'Noprizal, SH', 'Laki-Laki', 'Islam', 'Jl. Parit Haji Muksin 2, Ayani 2', '0816493301999', 2),
(12, 'Andi Pranata', 'Laki-Laki', 'Islam', 'Jl. Parit H Muksin 2, Ayani 2', '081649330181', 9),
(13, 'Muhammad Jajuli, S.T', 'Laki-Laki', 'Islam', 'Jl. Prof M Yamin', '081215454565', 6);

-- --------------------------------------------------------

--
-- Table structure for table `pemasukan`
--

CREATE TABLE `pemasukan` (
  `nofaktur_pen` varchar(30) NOT NULL,
  `id_cs` int(11) NOT NULL,
  `id_kategori` int(11) NOT NULL,
  `uraian` text NOT NULL,
  `tanggal` date NOT NULL,
  `total_bayar` varchar(20) NOT NULL,
  `id_bayar` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pemasukan`
--

INSERT INTO `pemasukan` (`nofaktur_pen`, `id_cs`, `id_kategori`, `uraian`, `tanggal`, `total_bayar`, `id_bayar`) VALUES
('01082021000001', 2, 1, 'Pembayaran Buku HET', '2021-08-01', '626500', 2),
('02082021000002', 2, 1, 'Pembayaran Buku HET', '2021-08-02', '242000', 2),
('23082021000003', 2, 1, 'Pembayaran Buku HET', '2021-08-23', '1345000', 1);

-- --------------------------------------------------------

--
-- Table structure for table `pembayaran`
--

CREATE TABLE `pembayaran` (
  `id_pembayaran` int(11) NOT NULL,
  `transaksi` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pembayaran`
--

INSERT INTO `pembayaran` (`id_pembayaran`, `transaksi`) VALUES
(1, 'Kas'),
(2, 'Bank BCA'),
(4, 'Bank  BNI'),
(5, 'Bank  BRI'),
(6, 'Bank Mandiri'),
(7, 'Bank BPD');

-- --------------------------------------------------------

--
-- Table structure for table `pengeluaran`
--

CREATE TABLE `pengeluaran` (
  `nofaktur_pg` varchar(30) NOT NULL,
  `id_kategori` int(11) NOT NULL,
  `uraian` text NOT NULL,
  `tanggal` date NOT NULL,
  `total_bayar` varchar(30) NOT NULL,
  `id_bayar` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pengeluaran`
--

INSERT INTO `pengeluaran` (`nofaktur_pg`, `id_kategori`, `uraian`, `tanggal`, `total_bayar`, `id_bayar`) VALUES
('03082021000001', 3, 'Gaji Admin', '2021-08-01', '2500000', 5);

-- --------------------------------------------------------

--
-- Table structure for table `posisi`
--

CREATE TABLE `posisi` (
  `id_pos` int(11) NOT NULL,
  `nama_pos` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `posisi`
--

INSERT INTO `posisi` (`id_pos`, `nama_pos`) VALUES
(2, 'Direktur'),
(6, 'Bendahara'),
(9, 'Admin');

-- --------------------------------------------------------

--
-- Table structure for table `produk`
--

CREATE TABLE `produk` (
  `id_pro` int(11) NOT NULL,
  `nama_pro` varchar(200) NOT NULL,
  `harga` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `produk`
--

INSERT INTO `produk` (`id_pro`, `nama_pro`, `harga`) VALUES
(1, 'PKN IX', 16500),
(3, 'Bahasa Indonesia', 14500),
(4, 'Ilmu Pengetahuan Alam', 14500);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `nama_user` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `level` int(1) NOT NULL,
  `foto` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `nama_user`, `username`, `password`, `level`, `foto`) VALUES
(7, 'Rizki Faturahman', 'fatur', '6c7ca345f63f835cb353ff15bd6c5e052ec08e7a', 1, 'gambar.jpg'),
(8, 'Bendahara', 'bendahara', '8cf55b8ae912bbfec560427ce8a2f296bf3ac972', 2, 'default.png'),
(11, 'Rizki Fatur', 'direktur', 'ef55c764d670377f3b24cf6d065252f06ee031c5', 3, 'default.png');

-- --------------------------------------------------------

--
-- Stand-in structure for view `v_detail_pemasukan`
-- (See below for the actual view)
--
CREATE TABLE `v_detail_pemasukan` (
`id_dp` int(11)
,`nofaktur_pem` varchar(30)
,`kd_produk` varchar(30)
,`harga` double
,`jumlah` int(5)
,`subtotal` double
,`id_pro` int(11)
,`nama_pro` varchar(200)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `v_keluar`
-- (See below for the actual view)
--
CREATE TABLE `v_keluar` (
`nofaktur_pg` varchar(30)
,`uraian` text
,`tanggal` date
,`total_bayar` varchar(30)
,`id_bayar` int(11)
,`id_kategori` int(11)
,`id_pembayaran` int(11)
,`transaksi` varchar(30)
,`id` int(11)
,`kategori` varchar(30)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `v_lapmas`
-- (See below for the actual view)
--
CREATE TABLE `v_lapmas` (
`nofaktur_pen` varchar(30)
,`id_cs` int(11)
,`id_kategori` int(11)
,`tanggal` date
,`total_bayar` varchar(20)
,`uraian` text
,`id_bayar` int(11)
,`nama_pro` varchar(200)
,`nama` varchar(100)
,`kategori` varchar(30)
,`transaksi` varchar(30)
,`kd_produk` varchar(30)
,`harga` double
,`jumlah` int(5)
,`subtotal` double
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `v_masuk`
-- (See below for the actual view)
--
CREATE TABLE `v_masuk` (
`nofaktur_pen` varchar(30)
,`id_cs` int(11)
,`id_kategori` int(11)
,`tanggal` date
,`total_bayar` varchar(20)
,`uraian` text
,`id_bayar` int(11)
,`id_customer` int(11)
,`nama` varchar(100)
,`id` int(11)
,`kategori` varchar(30)
,`id_pembayaran` int(11)
,`transaksi` varchar(30)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `v_pegawai`
-- (See below for the actual view)
--
CREATE TABLE `v_pegawai` (
`id_peg` int(11)
,`nama_peg` varchar(50)
,`jenis_kel` varchar(20)
,`agama` varchar(20)
,`notelp` varchar(13)
,`alamat` text
,`id_ps` int(11)
,`id_pos` int(11)
,`nama_pos` varchar(30)
);

-- --------------------------------------------------------

--
-- Structure for view `v_detail_pemasukan`
--
DROP TABLE IF EXISTS `v_detail_pemasukan`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_detail_pemasukan`  AS  (select `detail_pemasukan`.`id_dp` AS `id_dp`,`detail_pemasukan`.`nofaktur_pem` AS `nofaktur_pem`,`detail_pemasukan`.`kd_produk` AS `kd_produk`,`detail_pemasukan`.`harga` AS `harga`,`detail_pemasukan`.`jumlah` AS `jumlah`,`detail_pemasukan`.`subtotal` AS `subtotal`,`produk`.`id_pro` AS `id_pro`,`produk`.`nama_pro` AS `nama_pro` from (`detail_pemasukan` join `produk`) where `detail_pemasukan`.`kd_produk` = `produk`.`id_pro`) ;

-- --------------------------------------------------------

--
-- Structure for view `v_keluar`
--
DROP TABLE IF EXISTS `v_keluar`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_keluar`  AS  (select `pengeluaran`.`nofaktur_pg` AS `nofaktur_pg`,`pengeluaran`.`uraian` AS `uraian`,`pengeluaran`.`tanggal` AS `tanggal`,`pengeluaran`.`total_bayar` AS `total_bayar`,`pengeluaran`.`id_bayar` AS `id_bayar`,`pengeluaran`.`id_kategori` AS `id_kategori`,`pembayaran`.`id_pembayaran` AS `id_pembayaran`,`pembayaran`.`transaksi` AS `transaksi`,`kategori`.`id` AS `id`,`kategori`.`kategori` AS `kategori` from ((`pengeluaran` join `kategori`) join `pembayaran`) where `pengeluaran`.`id_bayar` = `pembayaran`.`id_pembayaran` and `pengeluaran`.`id_kategori` = `kategori`.`id`) ;

-- --------------------------------------------------------

--
-- Structure for view `v_lapmas`
--
DROP TABLE IF EXISTS `v_lapmas`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_lapmas`  AS  (select `pemasukan`.`nofaktur_pen` AS `nofaktur_pen`,`pemasukan`.`id_cs` AS `id_cs`,`pemasukan`.`id_kategori` AS `id_kategori`,`pemasukan`.`tanggal` AS `tanggal`,`pemasukan`.`total_bayar` AS `total_bayar`,`pemasukan`.`uraian` AS `uraian`,`pemasukan`.`id_bayar` AS `id_bayar`,`produk`.`nama_pro` AS `nama_pro`,`customer`.`nama` AS `nama`,`kategori`.`kategori` AS `kategori`,`pembayaran`.`transaksi` AS `transaksi`,`detail_pemasukan`.`kd_produk` AS `kd_produk`,`detail_pemasukan`.`harga` AS `harga`,`detail_pemasukan`.`jumlah` AS `jumlah`,`detail_pemasukan`.`subtotal` AS `subtotal` from (((((`pemasukan` join `produk`) join `pembayaran`) join `kategori`) join `customer`) join `detail_pemasukan`) where `pemasukan`.`nofaktur_pen` = `detail_pemasukan`.`nofaktur_pem` and `pemasukan`.`id_cs` = `customer`.`id_customer` and `pemasukan`.`id_kategori` = `kategori`.`id` and `pemasukan`.`id_bayar` = `pembayaran`.`id_pembayaran` and `detail_pemasukan`.`kd_produk` = `produk`.`id_pro`) ;

-- --------------------------------------------------------

--
-- Structure for view `v_masuk`
--
DROP TABLE IF EXISTS `v_masuk`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_masuk`  AS  (select `pemasukan`.`nofaktur_pen` AS `nofaktur_pen`,`pemasukan`.`id_cs` AS `id_cs`,`pemasukan`.`id_kategori` AS `id_kategori`,`pemasukan`.`tanggal` AS `tanggal`,`pemasukan`.`total_bayar` AS `total_bayar`,`pemasukan`.`uraian` AS `uraian`,`pemasukan`.`id_bayar` AS `id_bayar`,`customer`.`id_customer` AS `id_customer`,`customer`.`nama` AS `nama`,`kategori`.`id` AS `id`,`kategori`.`kategori` AS `kategori`,`pembayaran`.`id_pembayaran` AS `id_pembayaran`,`pembayaran`.`transaksi` AS `transaksi` from (((`pemasukan` join `pembayaran`) join `kategori`) join `customer`) where `pemasukan`.`id_cs` = `customer`.`id_customer` and `pemasukan`.`id_kategori` = `kategori`.`id` and `pemasukan`.`id_bayar` = `pembayaran`.`id_pembayaran`) ;

-- --------------------------------------------------------

--
-- Structure for view `v_pegawai`
--
DROP TABLE IF EXISTS `v_pegawai`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_pegawai`  AS  (select `pegawai`.`id_peg` AS `id_peg`,`pegawai`.`nama_peg` AS `nama_peg`,`pegawai`.`jenis_kel` AS `jenis_kel`,`pegawai`.`agama` AS `agama`,`pegawai`.`notelp` AS `notelp`,`pegawai`.`alamat` AS `alamat`,`pegawai`.`id_ps` AS `id_ps`,`posisi`.`id_pos` AS `id_pos`,`posisi`.`nama_pos` AS `nama_pos` from (`pegawai` join `posisi`) where `pegawai`.`id_ps` = `posisi`.`id_pos`) ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`id_customer`);

--
-- Indexes for table `detail_pemasukan`
--
ALTER TABLE `detail_pemasukan`
  ADD PRIMARY KEY (`id_dp`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `keranjang_pem`
--
ALTER TABLE `keranjang_pem`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pegawai`
--
ALTER TABLE `pegawai`
  ADD PRIMARY KEY (`id_peg`);

--
-- Indexes for table `pemasukan`
--
ALTER TABLE `pemasukan`
  ADD PRIMARY KEY (`nofaktur_pen`);

--
-- Indexes for table `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD PRIMARY KEY (`id_pembayaran`);

--
-- Indexes for table `pengeluaran`
--
ALTER TABLE `pengeluaran`
  ADD PRIMARY KEY (`nofaktur_pg`);

--
-- Indexes for table `posisi`
--
ALTER TABLE `posisi`
  ADD PRIMARY KEY (`id_pos`);

--
-- Indexes for table `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`id_pro`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `id_customer` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `detail_pemasukan`
--
ALTER TABLE `detail_pemasukan`
  MODIFY `id_dp` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `keranjang_pem`
--
ALTER TABLE `keranjang_pem`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `pegawai`
--
ALTER TABLE `pegawai`
  MODIFY `id_peg` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `pembayaran`
--
ALTER TABLE `pembayaran`
  MODIFY `id_pembayaran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `posisi`
--
ALTER TABLE `posisi`
  MODIFY `id_pos` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `produk`
--
ALTER TABLE `produk`
  MODIFY `id_pro` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
