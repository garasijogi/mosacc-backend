-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 26, 2019 at 11:20 AM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.3.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mosacc_tr_2019`
--

-- --------------------------------------------------------

--
-- Table structure for table `sum_kd_akun`
--

DROP TABLE IF EXISTS `sum_kd_akun`;
CREATE TABLE `sum_kd_akun` (
  `kd_sum` varchar(7) NOT NULL,
  `kd_akun` varchar(5) DEFAULT NULL,
  `bulan` varchar(2) DEFAULT NULL,
  `jumlah` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sum_kd_akun`
--

INSERT INTO `sum_kd_akun` (`kd_sum`, `kd_akun`, `bulan`, `jumlah`) VALUES
('', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `sum_table`
--

DROP TABLE IF EXISTS `sum_table`;
CREATE TABLE `sum_table` (
  `kd_sum` int(11) NOT NULL,
  `tabel` varchar(128) NOT NULL,
  `bulan` varchar(2) DEFAULT NULL,
  `jumlah` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tr11_penerimaan_tidak_terikat_pending`
--

DROP TABLE IF EXISTS `tr11_penerimaan_tidak_terikat_pending`;
CREATE TABLE `tr11_penerimaan_tidak_terikat_pending` (
  `idtr` varchar(16) NOT NULL,
  `kd_akun` varchar(5) NOT NULL,
  `tanggal` date NOT NULL,
  `nominal` double NOT NULL,
  `nama_pemberi` varchar(256) NOT NULL,
  `keterangan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tr11_penerimaan_tidak_terikat_pending`
--

INSERT INTO `tr11_penerimaan_tidak_terikat_pending` (`idtr`, `kd_akun`, `tanggal`, `nominal`, `nama_pemberi`, `keterangan`) VALUES
('2019102811110001', '11110', '2019-10-28', 100000, 'Robby', 'Penerimaan dari pemberian pinjaman alat sound system masjid sebesar Rp 100,000							');

-- --------------------------------------------------------

--
-- Table structure for table `tr12_penerimaan_terikat_pending`
--

DROP TABLE IF EXISTS `tr12_penerimaan_terikat_pending`;
CREATE TABLE `tr12_penerimaan_terikat_pending` (
  `idtr` varchar(16) NOT NULL,
  `kd_akun` varchar(5) NOT NULL,
  `tanggal` date NOT NULL,
  `nominal` double NOT NULL,
  `nama_pemberi` varchar(256) NOT NULL,
  `keterangan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tr12_penerimaan_terikat_pending`
--

INSERT INTO `tr12_penerimaan_terikat_pending` (`idtr`, `kd_akun`, `tanggal`, `nominal`, `nama_pemberi`, `keterangan`) VALUES
('2019100312840001', '12840', '2019-10-03', 900000, 'Robby', 'Penerimaan zakat sebesar Rp 900,000							'),
('2019100412610001', '12610', '2019-10-04', 735000, ' ', 'Penerimaan infaq Jumat sebesar Rp 735,000							'),
('2019100712610001', '12610', '2019-10-07', 230000, ' ', 'transfer dari bank a/n robby'),
('2019100712870001', '12870', '2019-10-07', 1800000, 'Robby', 'Penerimaan wakaf tunai sebesar Rp 1,800,000							'),
('2019101112610001', '12610', '2019-10-11', 755000, ' ', 'Penerimaan infaq Jumat sebesar Rp 755,000							'),
('2019101712630001', '12630', '2019-10-17', 700000, ' ', 'Penerimaan infaq pengajian bulanan sebesar Rp 700,000							'),
('2019101812610001', '12610', '2019-10-18', 705000, ' ', 'Penerimaan infaq Jumat sebesar Rp 705,000							'),
('2019102012620001', '12620', '2019-10-20', 2000000, ' ', 'Penerimaan infaq dari perayaan hari besar Islam sebesar Rp 2,000,000'),
('2019102512610001', '12610', '2019-10-25', 835000, ' ', 'Penerimaan infaq Jumat sebesar Rp 835,000							'),
('2019103112610001', '12820', '2019-10-31', 3103000, ' ', 'Penerimaan tromol subuh sebesar (akumulasi 1 bulan) Rp 3,103,000							'),
('2019103112610002', '12820', '2019-10-31', 930000, ' ', 'Penerimaan tromol magrib sebesar (akumulasi 1 bulan) Rp 930,000							'),
('2019103112610003', '12820', '2019-10-31', 850000, ' ', 'Penerimaan tromol kotak besar sebesar Rp 850,000							');

-- --------------------------------------------------------

--
-- Table structure for table `tr21_pembelian_pending`
--

DROP TABLE IF EXISTS `tr21_pembelian_pending`;
CREATE TABLE `tr21_pembelian_pending` (
  `idtr` varchar(16) NOT NULL,
  `kd_akun` varchar(5) NOT NULL,
  `tanggal` date NOT NULL,
  `jenis` varchar(32) NOT NULL,
  `merek` varchar(112) NOT NULL,
  `nomor_seri` varchar(112) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `keterangan` text NOT NULL,
  `harga_satuan` int(11) NOT NULL,
  `total_harga` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tr21_pembelian_pending`
--

INSERT INTO `tr21_pembelian_pending` (`idtr`, `kd_akun`, `tanggal`, `jenis`, `merek`, `nomor_seri`, `jumlah`, `keterangan`, `harga_satuan`, `total_harga`) VALUES
('2019102421100001', '21100', '2019-10-23', '1', 'Merk Pintu', '001', 1, 'Pembelian pintu kamar mandi laki-laki sebesar Rp 550,000							', 550000, 550000);

-- --------------------------------------------------------

--
-- Table structure for table `tr22_beban_pending`
--

DROP TABLE IF EXISTS `tr22_beban_pending`;
CREATE TABLE `tr22_beban_pending` (
  `idtr` varchar(16) NOT NULL,
  `kd_akun` varchar(5) DEFAULT NULL,
  `tanggal` date DEFAULT NULL,
  `nominal` int(11) DEFAULT NULL,
  `keterangan` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tr22_beban_pending`
--

INSERT INTO `tr22_beban_pending` (`idtr`, `kd_akun`, `tanggal`, `nominal`, `keterangan`) VALUES
('2019100422231001', '22231', '2019-10-04', 250000, 'Pembayaran insentif khatib Jumat sebesar Rp 250,000							'),
('2019101022232001', '22232', '2019-10-10', 250000, 'membayarkan honor pengurus (marbot sebesar Rp 250,000)							'),
('2019101122231001', '22231', '2019-10-11', 250000, 'Pembayaran insentif khatib Jumat sebesar Rp 250,000							'),
('2019101522111001', '22111', '2019-10-15', 300000, 'Membayarkan biaya listrik dan telepon Rp 300,000							'),
('2019101722231001', '22231', '2019-10-17', 300000, 'Pembayaran pembicara pengajian bulanan sebesar Rp 300,000					'),
('2019101822231001', '22231', '2019-10-18', 250000, 'Pembayaran insentif khatib Jumat sebesar Rp 250,000							'),
('2019102222115001', '22112', '2019-10-22', 250000, 'Membayarkan biaya servis mesin air sebesar Rp 250,000							'),
('2019102522231001', '22231', '2019-10-25', 250000, 'Pembayaran insentif khatib Jumat sebesar Rp 250,000							');

-- --------------------------------------------------------

--
-- Table structure for table `tr23_renov_bangun_pending`
--

DROP TABLE IF EXISTS `tr23_renov_bangun_pending`;
CREATE TABLE `tr23_renov_bangun_pending` (
  `idtr` varchar(16) DEFAULT NULL,
  `kd_akun` varchar(5) DEFAULT NULL,
  `tanggal` date DEFAULT NULL,
  `nominal` float DEFAULT NULL,
  `keterangan` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tr23_renov_bangun_pending`
--

INSERT INTO `tr23_renov_bangun_pending` (`idtr`, `kd_akun`, `tanggal`, `nominal`, `keterangan`) VALUES
('2019091523100001', '23100', '2019-09-15', 123214000, 'qwewqdsadfsa'),
('2019091523100002', '23100', '2019-09-15', 123214000, 'qwewqdsadfsa'),
('2019091523100003', '23100', '2019-09-23', 21321300000, 'wqewqdsads'),
('2019091523100004', '23100', '2019-09-27', 2132130, 'asdsacxsac'),
('2019091523100005', '23100', '2019-09-26', 21321300, 'adsadsa'),
('2019091523100006', '23100', '2019-09-17', 3424320, 'sdfgsdfsd');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `sum_kd_akun`
--
ALTER TABLE `sum_kd_akun`
  ADD PRIMARY KEY (`kd_sum`);

--
-- Indexes for table `sum_table`
--
ALTER TABLE `sum_table`
  ADD PRIMARY KEY (`kd_sum`);

--
-- Indexes for table `tr11_penerimaan_tidak_terikat_pending`
--
ALTER TABLE `tr11_penerimaan_tidak_terikat_pending`
  ADD PRIMARY KEY (`idtr`);

--
-- Indexes for table `tr12_penerimaan_terikat_pending`
--
ALTER TABLE `tr12_penerimaan_terikat_pending`
  ADD PRIMARY KEY (`idtr`);

--
-- Indexes for table `tr21_pembelian_pending`
--
ALTER TABLE `tr21_pembelian_pending`
  ADD PRIMARY KEY (`idtr`);

--
-- Indexes for table `tr22_beban_pending`
--
ALTER TABLE `tr22_beban_pending`
  ADD PRIMARY KEY (`idtr`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `sum_table`
--
ALTER TABLE `sum_table`
  MODIFY `kd_sum` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
