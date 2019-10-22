-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 22, 2019 at 06:31 AM
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
('2019091611110001', '11110', '2019-09-16', 250000, 'Jack', 'Peminjaman peralatan sound'),
('2019100111200001', '11200', '2019-10-01', 12312, ' ', 'eqwerwqeq'),
('2019101511120001', '11120', '2019-10-15', 378000, 'Hideyoshi', 'kampang');

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
('2019090912610001', '12610', '2019-09-09', 4000000, ' ', 'Jumat minggu 1'),
('2019091012610001', '12610', '2019-09-10', 213123, ' ', 'qweqweqwe'),
('2019091012620001', '12620', '2019-09-10', 2400, '', 'jajajaja'),
('2019091212610001', '12610', '2019-09-12', 2100, '', 'apa aja'),
('2019091212700001', '12700', '2019-09-12', 25566, 'jajang', 'gasgsg'),
('2019091212700002', '12700', '2019-09-12', 244, 'sher', 'tdsatgsd'),
('2019091212700003', '12700', '2019-09-12', 344, 'ahah', 'gdsg'),
('2019091312850001', '12850', '2019-09-13', 3535532, 'jajanghaa', 'gaga'),
('2019091312850002', '12850', '2019-09-13', 211, 'jajangasoy', 'gsdag'),
('2019091312850003', '12850', '2019-09-13', 211, 'jajangasoy', 'gsdag'),
('2019091312850004', '12850', '2019-09-13', 2555, 'jajangmantap', 'sdftds'),
('2019091512630001', '12630', '2019-09-15', 212323, ' ', 'KKKAD'),
('2019091912610001', '12610', '2019-09-19', 250, ' ', 'hauuu'),
('2019092112850001', '12850', '2019-09-21', 3423, 'jajang', 'ergdsg'),
('2019100812610001', '12610', '2019-10-08', 12321312, ' ', 'sadsads'),
('2019101112700001', '12700', '2019-10-11', 213213, 'weqweqwe', 'asdasdsad'),
('2019101412700001', '12700', '2019-10-14', 2131313, 'qweqewqe', 'sdadsad'),
('2019101612640001', '12640', '2019-10-16', 670000, ' ', 'hiyahiyahiya'),
('2019103112700001', '12700', '2019-10-31', 123213, 'Kuncru', 'whgjndsc');

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
('2019101721100001', '21100', '2019-10-01', 'Mobil', 'Honda', 'Jazz 220', 1, 'Untuk kebutuhan acara studi banding', 400000000, 400000000),
('2019101721100002', '21100', '2019-10-02', 'Motor', 'Suzuki', 'Korakora', 2, 'mantap lah', 20000000, 40000000),
('2019102221100001', '21100', '2019-10-15', '1', 'sadsad', '1231321', 12312321, 'erwfdewdwsf', 21321312, 43242),
('2019102221100002', '21100', '2019-10-13', '2', 'wqewqe', '231213', 6435435, 'edasfrsere', 342342, 21312321),
('2019102221100003', '21100', '2019-10-14', '2', 'wqewqe', '3213213', 12321321, 'qwewqewq', 123213, 213213);

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
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
