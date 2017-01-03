-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jan 03, 2017 at 03:15 PM
-- Server version: 5.6.21
-- PHP Version: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `dupont`
--

-- --------------------------------------------------------

--
-- Table structure for table `barang`
--

CREATE TABLE IF NOT EXISTS `barang` (
`kd_barang` int(11) NOT NULL,
  `nm_barang` varchar(50) NOT NULL,
  `keterangan` varchar(50) NOT NULL,
  `jenis` int(11) NOT NULL COMMENT '1=Bahan Mentah,2=Barang Jadi'
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `barang`
--

INSERT INTO `barang` (`kd_barang`, `nm_barang`, `keterangan`, `jenis`) VALUES
(3, 'Bahan Baku 1', 'Tes Bahan Baku 1', 1),
(4, 'Bahan Baku 2', 'Ubah Bahan baku jadi barang jadi', 2),
(5, 'Bahan Baku 3 jadi Bahan Baku 4', 'Ubah jadi BB3 ke BB4', 2),
(6, 'Bahan Baku 4', 'Sidoarjo Telp: 031-12345678 CP Agus: 081234567890', 2);

-- --------------------------------------------------------

--
-- Table structure for table `divisi`
--

CREATE TABLE IF NOT EXISTS `divisi` (
`kd_divisi` int(11) NOT NULL,
  `nm_divisi` varchar(50) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `divisi`
--

INSERT INTO `divisi` (`kd_divisi`, `nm_divisi`) VALUES
(19, 'Produksi'),
(20, 'Gudang'),
(21, 'telah diedit');

-- --------------------------------------------------------

--
-- Table structure for table `gudang`
--

CREATE TABLE IF NOT EXISTS `gudang` (
`kd_gudang` int(11) NOT NULL,
  `nm_gudang` varchar(50) NOT NULL,
  `keterangan` varchar(200) NOT NULL,
  `jenis` int(11) NOT NULL COMMENT '1=gudang, 2=produksi'
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `gudang`
--

INSERT INTO `gudang` (`kd_gudang`, `nm_gudang`, `keterangan`, `jenis`) VALUES
(3, 'CV Cerah tambah ini', 'Alamatnya Telp: CP: Jam Operasional: Buka hari apa:', 2),
(5, 'CV Xyz', 'Sidoarjo Telp: 031-12345678 CP Agus: 081234567890', 1),
(6, 'CV Jkl', 'Sidoarjo Telp: 031-12345678 CP Agus: 081234567890', 1),
(7, 'Tambah dulu', 'Untuk percobaan tambah', 2);

-- --------------------------------------------------------

--
-- Table structure for table `penerimaan_supplier`
--

CREATE TABLE IF NOT EXISTS `penerimaan_supplier` (
  `kd_pene_sup` varchar(15) NOT NULL,
  `tgl_pene_sup` date NOT NULL,
  `kd_gudang` int(11) NOT NULL,
  `kd_supplier` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `penerimaan_supplier`
--

INSERT INTO `penerimaan_supplier` (`kd_pene_sup`, `tgl_pene_sup`, `kd_gudang`, `kd_supplier`) VALUES
('', '2017-01-03', 0, 1),
('', '2017-01-03', 3, 1),
('', '2017-01-03', 3, 1),
('<br />\r\n<b>Noti', '2017-01-03', 3, 1);

-- --------------------------------------------------------

--
-- Table structure for table `penerimaan_supplier_detail`
--

CREATE TABLE IF NOT EXISTS `penerimaan_supplier_detail` (
  `kd_pene_sup` varchar(15) NOT NULL,
  `kd_barang` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `harga` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `supplier`
--

CREATE TABLE IF NOT EXISTS `supplier` (
`kd_supplier` int(11) NOT NULL,
  `nm_supplier` varchar(50) NOT NULL,
  `alamat` varchar(200) NOT NULL,
  `telp` varchar(50) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `supplier`
--

INSERT INTO `supplier` (`kd_supplier`, `nm_supplier`, `alamat`, `telp`) VALUES
(1, 'Tambah baru', 'Alamat tambah baru, email: emailbaru@baru.com', 'aktif 031-853xxxx atau CP: Abang 0823xxxxxxx0'),
(2, 'sukses edit', 'sukses edit, tambah email', '1234567890 CP edit');

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE IF NOT EXISTS `transaksi` (
`no_pemakaian` int(11) NOT NULL,
  `kd_barang` int(11) NOT NULL,
  `kd_user` int(11) NOT NULL,
  `tgl_pemakaian` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `tgl_pengembalian` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `status` varchar(50) NOT NULL,
  `keterangan` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `kd_user` varchar(15) NOT NULL,
  `kd_divisi` int(11) NOT NULL,
  `nm_user` varchar(50) NOT NULL,
  `pass_user` varchar(20) NOT NULL,
  `akses` int(11) NOT NULL COMMENT '1=Admin Gudang, 2=Admin Produksi, 3=Pimpinan Gudang'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`kd_user`, `kd_divisi`, `nm_user`, `pass_user`, `akses`) VALUES
('1', 20, 'admin', 'admin', 1),
('123ABC', 20, 'coba', 'coba', 0),
('16410SI0118D', 19, 'edited', 'edited', 2),
('16410SI0118e', 21, 'viva', 'viva', 3),
('Update1', 21, 'update', 'update', 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `barang`
--
ALTER TABLE `barang`
 ADD PRIMARY KEY (`kd_barang`);

--
-- Indexes for table `divisi`
--
ALTER TABLE `divisi`
 ADD PRIMARY KEY (`kd_divisi`);

--
-- Indexes for table `gudang`
--
ALTER TABLE `gudang`
 ADD PRIMARY KEY (`kd_gudang`);

--
-- Indexes for table `supplier`
--
ALTER TABLE `supplier`
 ADD PRIMARY KEY (`kd_supplier`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
 ADD PRIMARY KEY (`no_pemakaian`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
 ADD PRIMARY KEY (`kd_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `barang`
--
ALTER TABLE `barang`
MODIFY `kd_barang` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `divisi`
--
ALTER TABLE `divisi`
MODIFY `kd_divisi` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=22;
--
-- AUTO_INCREMENT for table `gudang`
--
ALTER TABLE `gudang`
MODIFY `kd_gudang` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `supplier`
--
ALTER TABLE `supplier`
MODIFY `kd_supplier` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `transaksi`
--
ALTER TABLE `transaksi`
MODIFY `no_pemakaian` int(11) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
