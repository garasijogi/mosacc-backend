-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 18, 2019 at 12:36 PM
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
-- Database: `mosacc`
--

-- --------------------------------------------------------

--
-- Table structure for table `rules`
--

DROP TABLE IF EXISTS `rules`;
CREATE TABLE `rules` (
  `kd_akun` varchar(5) NOT NULL,
  `nama_sub` varchar(256) NOT NULL,
  `debit` varchar(256) NOT NULL,
  `kredit` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rules`
--

INSERT INTO `rules` (`kd_akun`, `nama_sub`, `debit`, `kredit`) VALUES
('11110', 'Infaq peminjaman peralatan', 'Kas', 'Infaq peminjaman peralatan'),
('11120', 'Infaq Pemakaian Ruangan', 'Kas', 'Infaq Pemakaian Ruangan'),
('11200', 'Pendapatan Parkir', 'Kas\r\n', 'Pendapatan Parkir\r\n'),
('11300', 'Infaq Pengurusan Jenazah', 'Kas\r\n', 'Infaq pengurusan jenazah'),
('11400', 'Pendapatan non-halal', 'Kas\r\n', 'Pendapatan non-halal'),
('11500', 'Pendapatan Lainnya', 'Kas\r\n', 'Pendapatan lainnya'),
('12610', 'Infaq Kotak Jumat', 'Kas', 'Infaq Kotak Jumat'),
('12620', 'Infaq Perayaan Hari Besar Islam', 'Kas', 'Infaq Perayaan Hari Besar Islam'),
('12630', 'Infaq Pengajian', 'Kas', 'Infaq Pengajian'),
('12640', 'Infaq Ramadhan', 'Kas', 'Infaq Ramadhan'),
('12700', 'Infaq TPA dan Tahfidz', 'Kas', 'Pendidikan'),
('12810', 'Infaq dari Donatur', 'Kas', 'Infaq dari Donatur'),
('12820', 'Infaq Kotak Dana Operasional', 'Kas', 'Infaq Kotak Dana Operasional'),
('12830', 'Infaq Kotak Dana Sosial', 'Kas', 'Infaq Kotak Dana Sosial'),
('12840', 'Zakat Fitrah', 'Kas', 'Zakat Fitrah'),
('12850', 'Fidyah', 'Kas', 'Fidyah'),
('12860', 'Infaq untuk Baksos', 'Kas', 'Infaq untuk Baksos'),
('12870', 'Waqaf', 'Kas', 'Waqaf'),
('21100', 'Pembelian Perlengkapan', 'Perlengkapan', 'Kas'),
('21200', 'Pembelian Peralatan', 'Peralatan', 'Kas'),
('21300', 'Pembelian Kendaraan', 'Kendaraan', 'Kas'),
('22111', 'Beban Listrik, Air, dan Telepon', 'Beban Listrik, Air, dan Telepon', 'Kas'),
('22112', 'Beban Pemeliharaan', 'Beban Pemeliharaan', 'Kas'),
('22113', 'Beban Administrasi', 'Beban Administrasi', 'Kas'),
('22114', 'Beban Perlengkapan', 'Beban Perlengkapan', 'Perlengkapan'),
('22115', 'Beban Kerusakan dan Kehilangan Aset', 'Beban Kerusakan dan Kehilangan Aset', 'Peralatan'),
('22116', 'Beban Transportasi', 'Beban Transportasi', 'Kas'),
('22117', 'Insentif Pengurus Masjid', 'Insentif Pengurus Masjid', 'Kas'),
('22120', 'Beban Lainnya', 'Beban Lainnya', 'Kas'),
('22231', 'Insentif Penceramah/Khatib', 'Insentif Penceramah/Khatib\r\n', 'Kas'),
('22232', 'Insentif Marbot', 'Insentif Marbot', 'Kas'),
('22233', 'Beban Perayaan Hari Besar Islam', 'Beban Perayaan Hari Besar Islam', 'Kas'),
('22234', 'Beban Buletin Dakwah', 'Beban Buletin Dakwah', 'Kas'),
('22235', 'Peribadatan Lainnya', 'Peribadatan Lainnya', 'Kas'),
('22241', 'Shalat Tarawih', 'Shalat Tarawih', 'Kas'),
('22242', 'Konsumsi Buka Puasa dan Sahur', 'Konsumsi Buka Puasa dan Sahur', 'Kas'),
('22243', 'Peringatan Nuzulul Quran', 'Peringatan Nuzulul Quran', 'Kas'),
('22251', 'Penyaluran Zakat Fitrah dan Fidyah', 'Penyaluran Zakat Fitrah dan Fidyah', 'Kas'),
('22252', 'Penyaluran untuk Beasiswa', 'Penyaluran untuk Beasiswa', 'Kas'),
('22253', 'Penyaluran untuk Besuk Orang Sakit', 'Penyaluran untuk Besuk Orang Sakit', 'Kas'),
('22254', 'Penyaluran untuk Aktivitas Kepemudaan', 'Penyaluran untuk Aktivitas Kepemudaan', 'Kas'),
('22255', 'Sumbangan untuk Anak Yatim', 'Sumbangan untuk Anak Yatim', 'Kas'),
('22256', 'Sumbangan Ta’ziyah', 'Sumbangan Ta’ziyah', 'Kas'),
('22257', 'Sumbangan untuk Bencana Alam', 'Sumbangan untuk Bencana Alam', 'Kas'),
('22261', 'Penyaluran untuk TPA dan Tahfidz', 'Penyaluran untuk TPA dan Tahfidz', 'Kas'),
('22262', 'Beban Pelatihan', 'Beban Pelatihan', 'Kas'),
('23100', 'Pembelian Material', 'Pembelian Material', 'Kas'),
('23200', 'Upah Tukang', 'Upah Tukang', 'Kas');

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
('2019091111200001', '11200', '2019-09-11', 258000, ' ', 'jacks knighto queens knight and kings knighto'),
('2019091611110001', '11110', '2019-09-16', 250000, 'Jack', 'Peminjaman peralatan sound');

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
('2019091012620001', '12620', '2019-09-10', 2400, '', 'jajajaja'),
('2019091212610001', '12610', '2019-09-12', 2100, '', 'apa aja'),
('2019091212700001', '12700', '2019-09-12', 25566, 'jajang', 'gasgsg'),
('2019091212700002', '12700', '2019-09-12', 244, 'sher', 'tdsatgsd'),
('2019091212700003', '12700', '2019-09-12', 344, 'ahah', 'gdsg'),
('2019091312850001', '12850', '2019-09-13', 3535532, 'jajanghaa', 'gaga'),
('2019091312850002', '12850', '2019-09-13', 211, 'jajangasoy', 'gsdag'),
('2019091312850003', '12850', '2019-09-13', 211, 'jajangasoy', 'gsdag'),
('2019091312850004', '12850', '2019-09-13', 2555, 'jajangmantap', 'sdftds'),
('2019091912610001', '12610', '2019-09-19', 250, ' ', 'hauuu'),
('2019092112850001', '12850', '2019-09-21', 3423, 'jajang', 'ergdsg'),
('2019091512630001', '12630', '2019-09-15', 212323, ' ', 'KKKAD'),
('2019091012640001', '12640', '2019-09-10', 132123123, ' ', 'qqeqweqwe'),
('2019090912610001', '12610', '2019-09-09', 4000000, ' ', 'Jumat minggu 1'),
('2019091012610001', '12610', '2019-09-10', 213123, ' ', 'qweqweqwe');

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
('2019091421100001', '21100', '2019-09-18', 'sdsad', 'asdsadsa', 'sadsadsa', 123213, 'wqewqeqw', 213213, 213213),
('2019091421100002', '21100', '2019-09-18', 'sdsad', 'asdsadsa', 'sadsadsa', 123213, 'wqewqeqw', 213213, 213213),
('2019091421100003', '21100', '2019-09-18', 'sdsad', 'asdsadsa', 'sadsadsa', 123213, 'wqewqeqw', 213213, 213213),
('2019091421100004', '21100', '2019-09-18', 'sdsad', 'asdsadsa', 'sadsadsa', 123213, 'wqewqeqw', 213213, 213213),
('2019091421100005', '21100', '2019-09-18', 'sdsad', 'asdsadsa', 'sadsadsa', 123213, 'wqewqeqw', 213213, 213213),
('2019091421100006', '21100', '2019-09-02', 'aweqwewqe', 'qwewqewq', 'qwewqewqe', 213213, 'sadsad', 1232132, 213123),
('2019091421100007', '21100', '2019-09-02', 'aweqwewqe', 'qwewqewq', 'qwewqewqe', 213213, 'sadsad', 1232132, 213123),
('2019091421100008', '21100', '2019-09-11', 'qwewqe', 'qwewqee', 'wqewqewq', 123213, 'weqewq', 2131231, 1231231),
('2019091421100009', '21100', '2019-09-04', 'ewrewrew', 'werewfds', 'sdfewefdas', 234121, 'ewfrwdw', 123131, 132131),
('2019091421100010', '21100', '2019-09-04', 'ewrewrew', 'werewfds', 'sdfewefdas', 234121, 'ewfrwdw', 123131, 132131),
('2019091421100011', '21100', '2019-09-23', 'wqewqe', 'wqewqe', 'qwewqewq', 12312321, 'sdsadasd', 21321312, 12321312),
('2019091421200001', '21200', '2019-09-10', 'dsasdsa', 'sadsadas', 'sadsads', 12321, 'wsdasd', 12321312, 123213),
('2019091521100002', '21100', '2019-09-16', 'qweqwe', 'wqewqewq', 'wqewqeqe', 12312412, 'sadsadsad', 12321312, 123123),
('2019101321100001', '21100', '2019-10-08', '', 'bom', '', 888, 'gdyt', 12564312, 7564567),
('2019101321100002', '21100', '2019-10-20', '', 'Toto', '12321', 12392817, 'drsfds', 12321, 1231),
('2019101321100003', '21100', '2019-10-14', '', 'trhyers', '231321', 32432, 'safsdads', 213123, 43534);

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
('2019092222111003', '22111', '2019-09-30', 2143765465, 'wqwesadsa'),
('2019092222111004', '22111', '2019-09-30', 123213, 'qwewqdwqd'),
('2019092222111006', '22111', '2019-09-30', 21321, 'wqewqewqe'),
('2019092322111001', '22111', '2019-09-23', 123123123, '213213213'),
('2019092322111002', '22111', '2019-09-22', 123234324, 'uqiuwteqe'),
('2019092322231001', '22231', '2019-09-23', 234213213, 'sadsaxsax'),
('2019092722231001', '22231', '2019-09-27', 21321321, 'sadsaxv'),
('2019093022111001', '22111', '2019-09-30', 2132132, 'wfdeafeaw'),
('2019093022111002', '22111', '2019-09-30', 142314324, 'gjkhhkuyu'),
('2019093022111003', '22111', '2019-09-30', 2135323421, 'qwdewqfewfwe'),
('2019093022117001', '22117', '2019-09-30', 32432423, 'wefwfwe'),
('2019093022117003', '22117', '2019-09-30', 24123432, 'dwsfgewfw'),
('2019093022117004', '22117', '2019-09-30', 12421312, 'edwsesvcs'),
('2019102222231001', '22231', '2019-10-22', 213213, 'qwdcqwds'),
('2019103122231001', '22231', '2019-10-31', 12313, 'sdcsv');

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
('2019091523100006', '23100', '2019-09-17', 3424320, 'sdfgsdfsd'),
('2019101323100001', '23100', '2019-10-31', 32423400, 'sgvfsdfsdf');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `rules`
--
ALTER TABLE `rules`
  ADD PRIMARY KEY (`kd_akun`);

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
