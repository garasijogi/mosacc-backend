-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Nov 25, 2019 at 11:33 AM
-- Server version: 10.4.8-MariaDB
-- PHP Version: 7.3.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mosacc_master`
--
CREATE DATABASE IF NOT EXISTS `mosacc_master` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `mosacc_master`;

-- --------------------------------------------------------

--
-- Table structure for table `aset-bangunan_tanah`
--

DROP TABLE IF EXISTS `aset-bangunan_tanah`;
CREATE TABLE IF NOT EXISTS `aset-bangunan_tanah` (
  `id_aset` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(256) DEFAULT NULL,
  `tanggal` date DEFAULT NULL,
  `luas` double DEFAULT NULL,
  `nilai` double DEFAULT NULL,
  PRIMARY KEY (`id_aset`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `aset-kas_bank`
--

DROP TABLE IF EXISTS `aset-kas_bank`;
CREATE TABLE IF NOT EXISTS `aset-kas_bank` (
  `norek` varchar(64) NOT NULL,
  `nama_pemilik` varchar(128) DEFAULT NULL,
  `nama_bank` varchar(128) DEFAULT NULL,
  `nominal` double DEFAULT NULL,
  `tanggal` date DEFAULT NULL,
  PRIMARY KEY (`norek`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `aset-kendaraan`
--

DROP TABLE IF EXISTS `aset-kendaraan`;
CREATE TABLE IF NOT EXISTS `aset-kendaraan` (
  `id_aset` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(128) DEFAULT NULL,
  `merek` varchar(32) DEFAULT NULL,
  `tanggal` date DEFAULT NULL,
  `tipe` varchar(32) DEFAULT NULL,
  `jumlah` double DEFAULT NULL,
  `harga` double DEFAULT NULL,
  PRIMARY KEY (`id_aset`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `aset-peralatan`
--

DROP TABLE IF EXISTS `aset-peralatan`;
CREATE TABLE IF NOT EXISTS `aset-peralatan` (
  `id_aset` int(6) NOT NULL AUTO_INCREMENT,
  `nama` varchar(128) DEFAULT NULL,
  `merek` varchar(64) DEFAULT NULL,
  `tanggal` date DEFAULT NULL,
  `kategori` varchar(64) DEFAULT NULL,
  `jumlah` varchar(3) DEFAULT NULL,
  `harga` double DEFAULT NULL,
  PRIMARY KEY (`id_aset`),
  KEY `id_aset` (`id_aset`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `aset-perlengkapan`
--

DROP TABLE IF EXISTS `aset-perlengkapan`;
CREATE TABLE IF NOT EXISTS `aset-perlengkapan` (
  `id_aset` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(128) DEFAULT NULL,
  `merek` varchar(32) DEFAULT NULL,
  `tanggal` date DEFAULT NULL,
  `kategori` varchar(32) DEFAULT NULL,
  `jumlah` double DEFAULT NULL,
  `harga` double DEFAULT NULL,
  PRIMARY KEY (`id_aset`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `bagan_akun`
--

DROP TABLE IF EXISTS `bagan_akun`;
CREATE TABLE IF NOT EXISTS `bagan_akun` (
  `kd_akun` int(11) NOT NULL,
  `nama_akun` varchar(256) NOT NULL,
  PRIMARY KEY (`kd_akun`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `bagan_akun`
--

INSERT INTO `bagan_akun` (`kd_akun`, `nama_akun`) VALUES
(100, 'ASET'),
(110, 'Aset Lancar'),
(112, 'Kas dan Bank'),
(113, 'Perlengkapan'),
(120, 'Aset Tidak Lancar'),
(121, 'Peralatan'),
(122, 'Menara'),
(123, 'Bangunan'),
(124, 'Lahan Parkir'),
(125, 'Tanah'),
(126, 'Kendaraan'),
(300, 'Aset Neto'),
(310, 'Aset Neto Tidak Terikat'),
(311, 'Saldo Awal Aset Neto Tidak Terikat'),
(312, 'Kenaikan (Penurunan) Aset Neto Tidak Terikat'),
(313, 'Saldo Akhir Aset Neto Tidak Terikat'),
(320, 'Aset Neto Terikat'),
(321, 'Saldo Awal Aset Neto Terikat'),
(322, 'Kenaikan (Penurunan) Aset Neto Terikat'),
(323, 'Saldo Akhir Aset Neto Terikat'),
(400, 'Pendapatan'),
(410, 'Pendapatan Sewa'),
(411, 'Infaq Peminjaman Peralatan'),
(412, 'Infaq Pemakaian Ruangan'),
(420, 'Pendapatan Parkir'),
(430, 'Infaq Pengurusan Jenazah'),
(440, 'Pendapatan Peribadatan'),
(441, 'Infaq Kotak Jumat'),
(442, 'Infaq Perayaan Hari Besar Islam'),
(443, 'Infaq Pengajian'),
(444, 'Infaq Ramadhan'),
(450, 'Infaq Pendidikan'),
(451, 'Infaq TPA dan Tahfidz'),
(452, 'Infaq Beasiswa'),
(460, 'ZISWAF'),
(461, 'Infaq dari Donatur'),
(462, 'Infaq Kotak Dana Operasional'),
(463, 'Infaq Kotak Dana Sosial'),
(464, 'Zakat Fitrah'),
(465, 'Fidyah'),
(466, 'Infaq untuk Baksos'),
(467, 'Waqaf'),
(499, 'Pendapatan Lainnya'),
(500, 'Beban-Beban'),
(510, 'Beban Operasional'),
(511, 'Beban Listrik, Air, dan Telepon'),
(512, 'Beban Pemeliharaan'),
(513, 'Beban Administrasi'),
(514, 'Beban Perlengkapan'),
(515, 'Beban Transportasi'),
(516, 'Insentif Pengurus Masjid'),
(520, 'Beban Renovasi dan Pembangunan'),
(521, 'Pembelian Material'),
(522, 'Upah Tukang'),
(530, 'Beban Peribadatan'),
(531, 'Insentif pembicara/Khatib'),
(532, 'Insentif Marbot'),
(533, 'Beban Perayaan Hari Besar Islam'),
(534, 'Beban Buletin Dakwah'),
(535, 'Peribadatan Lainnya'),
(540, 'Pengeluaran Ramadhan'),
(541, 'Shalat Tarawih'),
(542, 'Konsumsi Buka Puasa dan Sahur'),
(543, 'Peringatan Nuzulul Quran'),
(550, 'Penyaluran ZISWAF'),
(551, 'Penyaluran Zakat Fitrah dan Fidyah'),
(552, 'Penyaluran untuk Beasiswa'),
(553, 'Penyaluran untuk Besuk Orang Sakit'),
(554, 'Penyaluran untuk Aktivitas Kepemudaan'),
(555, 'Sumbangan untuk Anak Yatim'),
(556, 'Sumbangan Ta’ziyah'),
(557, 'Sumbangan untuk Bencana Alam'),
(560, 'Pengeluaran Pendidikan'),
(561, 'Penyaluran untuk TPA dan Tahfidz'),
(562, 'Beban Pelatihan'),
(599, 'Beban Lainnya');

-- --------------------------------------------------------

--
-- Table structure for table `files`
--

DROP TABLE IF EXISTS `files`;
CREATE TABLE IF NOT EXISTS `files` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(512) DEFAULT NULL,
  `jenis_file` varchar(24) DEFAULT NULL,
  `tipe_file` varchar(256) DEFAULT NULL,
  `ekstensi` varchar(8) DEFAULT NULL,
  `ukuran` double DEFAULT NULL,
  `tanggal` date DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `profil_dkm`
--

DROP TABLE IF EXISTS `profil_dkm`;
CREATE TABLE IF NOT EXISTS `profil_dkm` (
  `id_pengurus` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(256) DEFAULT NULL,
  `posisi` enum('bendahara','ketua','sekretaris','struktur_dkm') NOT NULL,
  `alamat` varchar(512) DEFAULT NULL,
  `telepon` varchar(15) DEFAULT NULL,
  `pendidikan` varchar(32) DEFAULT NULL,
  PRIMARY KEY (`id_pengurus`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `profil_masjid`
--

DROP TABLE IF EXISTS `profil_masjid`;
CREATE TABLE IF NOT EXISTS `profil_masjid` (
  `id_profil` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(256) DEFAULT NULL,
  `alamat` varchar(512) DEFAULT NULL,
  `tahun` varchar(4) DEFAULT NULL,
  `telepon` varchar(15) DEFAULT NULL,
  `rekening` varchar(32) DEFAULT NULL,
  `luas_tanah` varchar(16) DEFAULT NULL,
  PRIMARY KEY (`id_profil`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `rules`
--

DROP TABLE IF EXISTS `rules`;
CREATE TABLE IF NOT EXISTS `rules` (
  `kd_akun` varchar(5) NOT NULL,
  `kd_bagan` varchar(5) NOT NULL,
  `menu` varchar(256) NOT NULL,
  `nama_sub` varchar(256) NOT NULL,
  `debit` varchar(256) NOT NULL,
  `kredit` varchar(256) NOT NULL,
  PRIMARY KEY (`kd_akun`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rules`
--

INSERT INTO `rules` (`kd_akun`, `kd_bagan`, `menu`, `nama_sub`, `debit`, `kredit`) VALUES
('10000', '112', 'Kas', 'Kas', 'Kas', '-'),
('11110', '411', 'Pendapatan Sewa', 'Infaq Peminjaman Peralatan', 'Kas', 'Infaq Peminjaman Peralatan'),
('11120', '412', 'Pendapatan Sewa', 'Infaq Pemakaian Ruangan', 'Kas', 'Infaq Pemakaian Ruangan'),
('11200', '420', 'Pendapatan Parkir', 'Pendapatan Parkir', 'Kas', 'Pendapatan Parkir'),
('11300', '430', 'Infaq Pengurusan Jenazah', 'Infaq Pengurusan Jenazah', 'Kas', 'Infaq Pengurusan Jenazah'),
('11400', '', 'Pendapatan Non-Halal', 'Pendapatan Non-Halal', 'Kas', 'Pendapatan Non-Halal'),
('11500', '499', 'Pendapatan Lainnya', 'Pendapatan Lainnya', 'Kas', 'Pendapatan Lainnya'),
('12610', '441', 'Peribadatan', 'Infaq Kotak Jumat', 'Kas', 'Infaq Kotak Jumat'),
('12620', '442', 'Peribadatan', 'Infaq Perayaan Hari Besar Islam', 'Kas', 'Infaq Perayaan Hari Besar Islam'),
('12630', '443', 'Peribadatan', 'Infaq Pengajian', 'Kas', 'Infaq Pengajian'),
('12640', '444', 'Peribadatan', 'Infaq Ramadhan', 'Kas', 'Infaq Ramadhan'),
('12700', '451', 'Pendidikan', 'Infaq TPA dan Tahfidz', 'Kas', 'Pendidikan'),
('12810', '461', 'Penyaluran ZISWAF', 'Infaq dari Donatur', 'Kas', 'Infaq dari Donatur'),
('12820', '462', 'Penyaluran ZISWAF', 'Infaq Kotak Dana Operasional', 'Kas', 'Infaq Kotak Dana Operasional'),
('12830', '463', 'Penyaluran ZISWAF', 'Infaq Kotak Dana Sosial', 'Kas', 'Infaq Kotak Dana Sosial'),
('12840', '464', 'Penyaluran ZISWAF', 'Zakat Fitrah', 'Kas', 'Zakat Fitrah'),
('12850', '465', 'Penyaluran ZISWAF', 'Fidyah', 'Kas', 'Fidyah'),
('12860', '466', 'Penyaluran ZISWAF', 'Infaq untuk Baksos', 'Kas', 'Infaq untuk Baksos'),
('12870', '467', 'Penyaluran ZISWAF', 'Waqaf', 'Kas', 'Waqaf'),
('21100', '113', 'Pembelian Perlengkapan', 'Pembelian Perlengkapan', 'Perlengkapan', 'Kas'),
('21200', '121', 'Pembelian Peralatan', 'Pembelian Peralatan', 'Peralatan', 'Kas'),
('21300', '126', 'Pembelian Kendaraan', 'Pembelian Kendaraan', 'Kendaraan', 'Kas'),
('22111', '511', 'Beban Operasional', 'Beban Listrik, Air, dan Telepon', 'Beban Listrik, Air, dan Telepon', 'Kas'),
('22112', '512', 'Beban Operasional', 'Beban Pemeliharaan', 'Beban Pemeliharaan', 'Kas'),
('22113', '513', 'Beban Operasional', 'Beban Administrasi', 'Beban Administrasi', 'Kas'),
('22114', '514', 'Beban Operasional', 'Beban Perlengkapan', 'Beban Perlengkapan', 'Perlengkapan'),
('22115', '', 'Beban Operasional', 'Beban Kerusakan dan Kehilangan Aset', 'Beban Kerusakan dan Kehilangan Aset', 'Peralatan'),
('22116', '515', 'Beban Operasional', 'Beban Transportasi', 'Beban Transportasi', 'Kas'),
('22117', '516', 'Beban Operasional', 'Insentif Pengurus Masjid', 'Insentif Pengurus Masjid', 'Kas'),
('22120', '599', 'Beban Lainnya', 'Beban Lainnya', 'Beban Lainnya', 'Kas'),
('22231', '531', 'Peribadatan', 'Insentif Penceramah/Khatib', 'Insentif Penceramah/Khatib', 'Kas'),
('22232', '532', 'Peribadatan', 'Insentif Marbot', 'Insentif Marbot', 'Kas'),
('22233', '533', 'Peribadatan', 'Beban Perayaan Hari Besar Islam', 'Beban Perayaan Hari Besar Islam', 'Kas'),
('22234', '534', 'Peribadatan', 'Beban Buletin Dakwah', 'Beban Buletin Dakwah', 'Kas'),
('22235', '535', 'Peribadatan', 'Peribadatan Lainnya', 'Peribadatan Lainnya', 'Kas'),
('22241', '541', 'Ramadhan', 'Shalat Tarawih', 'Shalat Tarawih', 'Kas'),
('22242', '542', 'Ramadhan', 'Konsumsi Buka Puasa dan Sahur', 'Konsumsi Buka Puasa dan Sahur', 'Kas'),
('22243', '543', 'Ramadhan', 'Peringatan Nuzulul Quran', 'Peringatan Nuzulul Quran', 'Kas'),
('22251', '551', 'Penyaluran ZISWAF', 'Penyaluran Zakat Fitrah dan Fidyah', 'Penyaluran Zakat Fitrah dan Fidyah', 'Kas'),
('22252', '552', 'Penyaluran ZISWAF', 'Penyaluran untuk Beasiswa', 'Penyaluran untuk Beasiswa', 'Kas'),
('22253', '553', 'Penyaluran ZISWAF', 'Penyaluran untuk Besuk Orang Sakit', 'Penyaluran untuk Besuk Orang Sakit', 'Kas'),
('22254', '554', 'Penyaluran ZISWAF', 'Penyaluran untuk Aktivitas Kepemudaan', 'Penyaluran untuk Aktivitas Kepemudaan', 'Kas'),
('22255', '555', 'Penyaluran ZISWAF', 'Sumbangan untuk Anak Yatim', 'Sumbangan untuk Anak Yatim', 'Kas'),
('22256', '556', 'Penyaluran ZISWAF', 'Sumbangan Ta’ziyah', 'Sumbangan Ta’ziyah', 'Kas'),
('22257', '557', 'Penyaluran ZISWAF', 'Sumbangan untuk Bencana Alam', 'Sumbangan untuk Bencana Alam', 'Kas'),
('22261', '561', 'Pendidikan', 'Penyaluran untuk TPA dan Tahfidz', 'Penyaluran untuk TPA dan Tahfidz', 'Kas'),
('22262', '562', 'Pendidikan', 'Beban Pelatihan', 'Beban Pelatihan', 'Kas'),
('23100', '521', 'Pembelian Material', 'Pembelian Material', 'Pembelian Material', 'Kas'),
('23200', '522', 'Upah Tukang', 'Upah Tukang', 'Upah Tukang', 'Kas');

-- --------------------------------------------------------

--
-- Table structure for table `tr_database`
--

DROP TABLE IF EXISTS `tr_database`;
CREATE TABLE IF NOT EXISTS `tr_database` (
  `id_db` int(11) NOT NULL,
  `nama_db` varchar(256) NOT NULL,
  `tahun` int(11) NOT NULL,
  PRIMARY KEY (`id_db`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `NIP` int(25) NOT NULL AUTO_INCREMENT,
  `nama_user` varchar(256) NOT NULL,
  `jenis_user` enum('akuntan','manager') NOT NULL,
  `password` varchar(256) NOT NULL,
  PRIMARY KEY (`NIP`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
