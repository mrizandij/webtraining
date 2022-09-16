-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 16, 2022 at 10:47 AM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 5.6.40

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_training`
--

-- --------------------------------------------------------

--
-- Table structure for table `barang_harga`
--

CREATE TABLE `barang_harga` (
  `kode_harga` varchar(8) NOT NULL,
  `kode_barang` varchar(5) NOT NULL,
  `harga` int(11) NOT NULL,
  `stok` int(6) NOT NULL,
  `kode_cabang` char(3) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `barang_harga`
--

INSERT INTO `barang_harga` (`kode_harga`, `kode_barang`, `harga`, `stok`, `kode_cabang`) VALUES
('BR001SMI', 'BR001', 300000, 20, 'SMI');

-- --------------------------------------------------------

--
-- Table structure for table `barang_master`
--

CREATE TABLE `barang_master` (
  `kode_barang` varchar(5) NOT NULL,
  `nama_barang` varchar(50) NOT NULL,
  `satuan` varchar(5) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `barang_master`
--

INSERT INTO `barang_master` (`kode_barang`, `nama_barang`, `satuan`) VALUES
('BR004', 'Laptop Asus', 'pcs'),
('BR003', 'Flashisk 128 GB', 'unit'),
('BR002', 'SSD 2 TB', 'pcs'),
('BR001', 'Mouse logitech', 'unit'),
('BR008', 'Mouse', 'pcs'),
('BR009', 'WD 1000TB', 'unit'),
('BR010', 'Mouse men', 'pcs'),
('CR000', 'Laptop Xiaomi', 'pcs'),
('CR002', 'Laptop Dell', 'unit'),
('CR001', 'Macbook', 'unit'),
('CR003', 'Laptop 3', 'pcs');

-- --------------------------------------------------------

--
-- Table structure for table `cabang`
--

CREATE TABLE `cabang` (
  `kode_cabang` char(3) NOT NULL,
  `nama_cabang` varchar(50) NOT NULL,
  `alamat_cabang` varchar(255) DEFAULT NULL,
  `telepon` varchar(13) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cabang`
--

INSERT INTO `cabang` (`kode_cabang`, `nama_cabang`, `alamat_cabang`, `telepon`) VALUES
('PST', 'Sukabumi', ' Jl. Sudirman No.36, Sriwidari, Kec. Gunungpuyuh, Kota Sukabumi, Jawa Barat 431219', '082123232399');

-- --------------------------------------------------------

--
-- Table structure for table `data_karyawan`
--

CREATE TABLE `data_karyawan` (
  `kode_karyawan` varchar(15) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `ttl` varchar(50) NOT NULL,
  `alamat` varchar(50) NOT NULL,
  `jabatan` varchar(20) NOT NULL,
  `departement` varchar(20) NOT NULL,
  `telepon` varchar(12) NOT NULL,
  `email` varchar(20) NOT NULL,
  `photo` varchar(200) NOT NULL,
  `tglreg` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `data_karyawan`
--

INSERT INTO `data_karyawan` (`kode_karyawan`, `nama`, `ttl`, `alamat`, `jabatan`, `departement`, `telepon`, `email`, `photo`, `tglreg`) VALUES
('EMP1409220001', 'Isan', '1', '1', '1', '1', '1', '1', '', '2022-09-14 06:03:27'),
('EMP1409220002', 'Bahar', '3', '3', '33', '3', '3', '3', '', '2022-09-14 06:03:39'),
('EMP1409220003', 'Leon', '4', '4', '4', '4', '4', '4', '', '2022-09-14 06:05:14'),
('EMP1409220004', 'Training', '9', '9', '9', '9', '9', '9', '', '2022-09-14 07:14:14');

-- --------------------------------------------------------

--
-- Table structure for table `historibayar`
--

CREATE TABLE `historibayar` (
  `nobukti` varchar(14) NOT NULL,
  `no_fak_penj` varchar(13) NOT NULL,
  `tglbayar` date NOT NULL,
  `jenistransaksi` varchar(6) DEFAULT NULL,
  `jenisbayar` varchar(10) NOT NULL,
  `status_bayar` varchar(10) DEFAULT NULL,
  `bayar` int(11) NOT NULL,
  `id_giro` int(11) DEFAULT NULL,
  `id_transfer` int(11) DEFAULT NULL,
  `girotocash` char(1) DEFAULT NULL,
  `id_karyawan` char(7) DEFAULT NULL,
  `id_admin` smallint(6) NOT NULL,
  `date_created` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `date_updated` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `karyawan`
--

CREATE TABLE `karyawan` (
  `nama_training` varchar(30) NOT NULL,
  `nama_trainer` varchar(30) NOT NULL,
  `tgl_training` date NOT NULL,
  `nama_karyawan` varchar(30) NOT NULL,
  `kode_karyawan` varchar(15) NOT NULL,
  `jabatan` varchar(20) NOT NULL,
  `departement` varchar(20) NOT NULL,
  `ket` varchar(15) NOT NULL,
  `email` varchar(30) NOT NULL,
  `id_user` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `karyawan_detail`
--

CREATE TABLE `karyawan_detail` (
  `nama_training` varchar(30) NOT NULL,
  `nama_trainer` varchar(30) NOT NULL,
  `tgl_training` date NOT NULL,
  `id_user` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `karyawan_detail_temp`
--

CREATE TABLE `karyawan_detail_temp` (
  `kode_karyawan` varchar(15) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `jabatan` varchar(20) NOT NULL,
  `departement` varchar(20) NOT NULL,
  `email` varchar(30) NOT NULL,
  `ket` varchar(15) NOT NULL,
  `id_user` char(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `pelanggan`
--

CREATE TABLE `pelanggan` (
  `kode_pelanggan` varchar(13) NOT NULL,
  `nama_pelanggan` varchar(100) NOT NULL,
  `alamat_pelanggan` varchar(200) NOT NULL,
  `no_hp` varchar(15) NOT NULL,
  `kode_cabang` char(3) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pelanggan`
--

INSERT INTO `pelanggan` (`kode_pelanggan`, `nama_pelanggan`, `alamat_pelanggan`, `no_hp`, `kode_cabang`) VALUES
('CS001', 'Isan', 'Nagrak', '085157079913', 'DPK'),
('CS002', 'Isan', 'Nagrak', '085157079922', 'BGR'),
('CS003', 'Isan', 'Cibubur', '085157098877', 'JKT'),
('CS004', 'Isan', 'Nagrak', '0821212121', 'TSK');

-- --------------------------------------------------------

--
-- Table structure for table `penjualan`
--

CREATE TABLE `penjualan` (
  `no_faktur` varchar(13) NOT NULL,
  `tgltransaksi` date NOT NULL,
  `kode_pelanggan` varchar(13) NOT NULL,
  `jenistransaksi` varchar(6) NOT NULL,
  `jatuhtempo` date DEFAULT NULL,
  `id_user` char(6) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `penjualan_detail`
--

CREATE TABLE `penjualan_detail` (
  `no_fak_penj` varchar(13) DEFAULT NULL,
  `kode_barang` varchar(8) DEFAULT NULL,
  `harga` int(11) DEFAULT NULL,
  `qty` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `penjualan_detail_temp`
--

CREATE TABLE `penjualan_detail_temp` (
  `no_fak_penj` varchar(13) NOT NULL,
  `kode_barang` varchar(8) NOT NULL,
  `harga` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `id_user` char(6) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id_user` char(6) NOT NULL,
  `nama_lengkap` varchar(50) NOT NULL,
  `no_hp` varchar(13) NOT NULL,
  `username` varchar(10) NOT NULL,
  `password` varchar(255) NOT NULL,
  `level` varchar(30) NOT NULL,
  `kode_cabang` char(3) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id_user`, `nama_lengkap`, `no_hp`, `username`, `password`, `level`, `kode_cabang`) VALUES
('USR001', 'Admin', '085157079913', 'admin', 'admin', 'administrator', 'PST'),
('USR002', 'training', '0921212121', 'training', 'training', 'training', 'CTR');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `barang_harga`
--
ALTER TABLE `barang_harga`
  ADD PRIMARY KEY (`kode_harga`);

--
-- Indexes for table `barang_master`
--
ALTER TABLE `barang_master`
  ADD PRIMARY KEY (`kode_barang`) USING BTREE;

--
-- Indexes for table `cabang`
--
ALTER TABLE `cabang`
  ADD PRIMARY KEY (`kode_cabang`),
  ADD KEY `kode_cab_idx` (`kode_cabang`);

--
-- Indexes for table `data_karyawan`
--
ALTER TABLE `data_karyawan`
  ADD PRIMARY KEY (`kode_karyawan`);

--
-- Indexes for table `historibayar`
--
ALTER TABLE `historibayar`
  ADD PRIMARY KEY (`nobukti`),
  ADD KEY `hb_id_giro` (`id_giro`),
  ADD KEY `hb_nofaktur` (`no_fak_penj`),
  ADD KEY `hb_idtransfer` (`id_transfer`),
  ADD KEY `hb_tglbayar_jenis` (`tglbayar`,`jenisbayar`),
  ADD KEY `hb_idkar` (`id_karyawan`);

--
-- Indexes for table `karyawan_detail_temp`
--
ALTER TABLE `karyawan_detail_temp`
  ADD PRIMARY KEY (`kode_karyawan`);

--
-- Indexes for table `pelanggan`
--
ALTER TABLE `pelanggan`
  ADD PRIMARY KEY (`kode_pelanggan`) USING BTREE,
  ADD KEY `pel_nama` (`nama_pelanggan`),
  ADD KEY `pel_kodecab` (`kode_cabang`);

--
-- Indexes for table `penjualan`
--
ALTER TABLE `penjualan`
  ADD PRIMARY KEY (`no_faktur`) USING BTREE,
  ADD KEY `kode_pelanggan` (`kode_pelanggan`),
  ADD KEY `tgltransaksi` (`tgltransaksi`);

--
-- Indexes for table `penjualan_detail`
--
ALTER TABLE `penjualan_detail`
  ADD KEY `detailpenj_nofaktur` (`no_fak_penj`),
  ADD KEY `detailpenj_kodebarang` (`kode_barang`);

--
-- Indexes for table `penjualan_detail_temp`
--
ALTER TABLE `penjualan_detail_temp`
  ADD KEY `detailpenj_nofaktur` (`no_fak_penj`),
  ADD KEY `detailpenj_kodebarang` (`kode_barang`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
