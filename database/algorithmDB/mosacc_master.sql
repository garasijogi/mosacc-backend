-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Oct 29, 2019 at 09:11 PM
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

-- --------------------------------------------------------

--
-- Table structure for table `aset`
--

DROP TABLE IF EXISTS `aset`;
CREATE TABLE `aset` (
  `id_aset` varchar(6) NOT NULL,
  `jenis_aset` varchar(64) DEFAULT NULL,
  `nama` varchar(128) DEFAULT NULL,
  `merek_luas` varchar(64) DEFAULT NULL,
  `harga` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `aset`
--

INSERT INTO `aset` (`id_aset`, `jenis_aset`, `nama`, `merek_luas`, `harga`) VALUES
('1', 'peralatan', 'Sound System', 'Simbadda', 8500000),
('2', 'bangunan/tanah', 'Gedung Masjid', '17m^2', 13000000),
('3', 'bangunan/tanah', 'Kamar Mandi', '200 m^2', 13000000),
('4', 'peralatan', 'Mic', 'Samsung', 800000);

-- --------------------------------------------------------

--
-- Table structure for table `jenis_aset`
--

DROP TABLE IF EXISTS `jenis_aset`;
CREATE TABLE `jenis_aset` (
  `id_jenis_aset` varchar(3) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `profil`
--

DROP TABLE IF EXISTS `profil`;
CREATE TABLE `profil` (
  `Nama Masjid` varchar(256) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `profil_dkm`
--

DROP TABLE IF EXISTS `profil_dkm`;
CREATE TABLE `profil_dkm` (
  `id_pengurus` int(11) NOT NULL,
  `nama` varchar(256) DEFAULT NULL,
  `posisi` enum('bendahara','ketua','sekretaris') NOT NULL,
  `ttl` date NOT NULL,
  `alamat` varchar(512) DEFAULT NULL,
  `telepon` varchar(15) DEFAULT NULL,
  `pendidikan` varchar(32) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `profil_dkm`
--

INSERT INTO `profil_dkm` (`id_pengurus`, `nama`, `posisi`, `ttl`, `alamat`, `telepon`, `pendidikan`) VALUES
(100, 'Muhidin', 'ketua', '1980-08-15', 'JL. Rambutan', '08999999999', 'S1 Pendidikan Agama Islam'),
(101, 'Didi Mulyadi', 'bendahara', '1980-09-15', 'Jl. Kecapi', '0856789000', 'S1 Akuntansi'),
(102, 'Haryadi', 'sekretaris', '1980-10-15', 'Jl. Apel', '08765433534', 'SMA');

-- --------------------------------------------------------

--
-- Table structure for table `profil_masjid`
--

DROP TABLE IF EXISTS `profil_masjid`;
CREATE TABLE `profil_masjid` (
  `id_profil` int(11) NOT NULL,
  `nama` varchar(256) DEFAULT NULL,
  `alamat` varchar(512) DEFAULT NULL,
  `tahun` varchar(4) DEFAULT NULL,
  `telepon` varchar(15) DEFAULT NULL,
  `rekening` varchar(32) DEFAULT NULL,
  `luas_tanah` varchar(16) DEFAULT NULL,
  `ad_art` varchar(256) DEFAULT NULL,
  `badan_hukum` varchar(256) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `profil_masjid`
--

INSERT INTO `profil_masjid` (`id_profil`, `nama`, `alamat`, `tahun`, `telepon`, `rekening`, `luas_tanah`, `ad_art`, `badan_hukum`) VALUES
(1, 'Masjid Jami Al-Ishlah', 'Jalan Raya Bogor KM258, Gg Masjid', '2012', '0895678891', '111788543998', '500 m3', 'Wizard.php', 'Wizard.php');

-- --------------------------------------------------------

--
-- Table structure for table `rules`
--

DROP TABLE IF EXISTS `rules`;
CREATE TABLE `rules` (
  `kd_akun` varchar(5) NOT NULL,
  `menu` varchar(256) NOT NULL,
  `nama_sub` varchar(256) NOT NULL,
  `debit` varchar(256) NOT NULL,
  `kredit` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rules`
--

INSERT INTO `rules` (`kd_akun`, `menu`, `nama_sub`, `debit`, `kredit`) VALUES
('11110', 'Pendapatan Sewa', 'Infaq Peminjaman Peralatan', 'Kas', 'Infaq Peminjaman Peralatan'),
('11120', 'Pendapatan Sewa', 'Infaq Pemakaian Ruangan', 'Kas', 'Infaq Pemakaian Ruangan'),
('11200', 'Pendapatan Parkir', 'Pendapatan Parkir', 'Kas', 'Pendapatan Parkir'),
('11300', 'Infaq Pengurusan Jenazah', 'Infaq Pengurusan Jenazah', 'Kas', 'Infaq Pengurusan Jenazah'),
('11400', 'Pendapatan Non-Halal', 'Pendapatan Non-Halal', 'Kas', 'Pendapatan Non-Halal'),
('11500', 'Pendapatan Lainnya', 'Pendapatan Lainnya', 'Kas', 'Pendapatan Lainnya'),
('12610', 'Peribadatan', 'Infaq Kotak Jumat', 'Kas', 'Infaq Kotak Jumat'),
('12620', 'Peribadatan', 'Infaq Perayaan Hari Besar Islam', 'Kas', 'Infaq Perayaan Hari Besar Islam'),
('12630', 'Peribadatan', 'Infaq Pengajian', 'Kas', 'Infaq Pengajian'),
('12640', 'Peribadatan', 'Infaq Ramadhan', 'Kas', 'Infaq Ramadhan'),
('12700', 'Pendidikan', 'Infaq TPA dan Tahfidz', 'Kas', 'Pendidikan'),
('12810', 'Penyaluran ZISWAF', 'Infaq dari Donatur', 'Kas', 'Infaq dari Donatur'),
('12820', 'Penyaluran ZISWAF', 'Infaq Kotak Dana Operasional', 'Kas', 'Infaq Kotak Dana Operasional'),
('12830', 'Penyaluran ZISWAF', 'Infaq Kotak Dana Sosial', 'Kas', 'Infaq Kotak Dana Sosial'),
('12840', 'Penyaluran ZISWAF', 'Zakat Fitrah', 'Kas', 'Zakat Fitrah'),
('12850', 'Penyaluran ZISWAF', 'Fidyah', 'Kas', 'Fidyah'),
('12860', 'Penyaluran ZISWAF', 'Infaq untuk Baksos', 'Kas', 'Infaq untuk Baksos'),
('12870', 'Penyaluran ZISWAF', 'Waqaf', 'Kas', 'Waqaf'),
('21100', 'Pembelian Perlengkapan', 'Pembelian Perlengkapan', 'Perlengkapan', 'Kas'),
('21200', 'Pembelian Peralatan', 'Pembelian Peralatan', 'Peralatan', 'Kas'),
('21300', 'Pembelian Kendaraan', 'Pembelian Kendaraan', 'Kendaraan', 'Kas'),
('22111', 'Beban Operasional', 'Beban Listrik, Air, dan Telepon', 'Beban Listrik, Air, dan Telepon', 'Kas'),
('22112', 'Beban Operasional', 'Beban Pemeliharaan', 'Beban Pemeliharaan', 'Kas'),
('22113', 'Beban Operasional', 'Beban Administrasi', 'Beban Administrasi', 'Kas'),
('22114', 'Beban Operasional', 'Beban Perlengkapan', 'Beban Perlengkapan', 'Perlengkapan'),
('22115', 'Beban Operasional', 'Beban Kerusakan dan Kehilangan Aset', 'Beban Kerusakan dan Kehilangan Aset', 'Peralatan'),
('22116', 'Beban Operasional', 'Beban Transportasi', 'Beban Transportasi', 'Kas'),
('22117', 'Beban Operasional', 'Insentif Pengurus Masjid', 'Insentif Pengurus Masjid', 'Kas'),
('22120', 'Beban Lainnya', 'Beban Lainnya', 'Beban Lainnya', 'Kas'),
('22231', 'Peribadatan', 'Insentif Penceramah/Khatib', 'Insentif Penceramah/Khatib', 'Kas'),
('22232', 'Peribadatan', 'Insentif Marbot', 'Insentif Marbot', 'Kas'),
('22233', 'Peribadatan', 'Beban Perayaan Hari Besar Islam', 'Beban Perayaan Hari Besar Islam', 'Kas'),
('22234', 'Peribadatan', 'Beban Buletin Dakwah', 'Beban Buletin Dakwah', 'Kas'),
('22235', 'Peribadatan', 'Peribadatan Lainnya', 'Peribadatan Lainnya', 'Kas'),
('22241', 'Ramadhan', 'Shalat Tarawih', 'Shalat Tarawih', 'Kas'),
('22242', 'Ramadhan', 'Konsumsi Buka Puasa dan Sahur', 'Konsumsi Buka Puasa dan Sahur', 'Kas'),
('22243', 'Ramadhan', 'Peringatan Nuzulul Quran', 'Peringatan Nuzulul Quran', 'Kas'),
('22251', 'Penyaluran ZISWAF', 'Penyaluran Zakat Fitrah dan Fidyah', 'Penyaluran Zakat Fitrah dan Fidyah', 'Kas'),
('22252', 'Penyaluran ZISWAF', 'Penyaluran untuk Beasiswa', 'Penyaluran untuk Beasiswa', 'Kas'),
('22253', 'Penyaluran ZISWAF', 'Penyaluran untuk Besuk Orang Sakit', 'Penyaluran untuk Besuk Orang Sakit', 'Kas'),
('22254', 'Penyaluran ZISWAF', 'Penyaluran untuk Aktivitas Kepemudaan', 'Penyaluran untuk Aktivitas Kepemudaan', 'Kas'),
('22255', 'Penyaluran ZISWAF', 'Sumbangan untuk Anak Yatim', 'Sumbangan untuk Anak Yatim', 'Kas'),
('22256', 'Penyaluran ZISWAF', 'Sumbangan Ta’ziyah', 'Sumbangan Ta’ziyah', 'Kas'),
('22257', 'Penyaluran ZISWAF', 'Sumbangan untuk Bencana Alam', 'Sumbangan untuk Bencana Alam', 'Kas'),
('22261', 'Pendidikan', 'Penyaluran untuk TPA dan Tahfidz', 'Penyaluran untuk TPA dan Tahfidz', 'Kas'),
('22262', 'Pendidikan', 'Beban Pelatihan', 'Beban Pelatihan', 'Kas'),
('23100', 'Pembelian Material', 'Pembelian Material', 'Pembelian Material', 'Kas'),
('23200', 'Upah Tukang', 'Upah Tukang', 'Upah Tukang', 'Kas');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE `user` (
  `NIP` varchar(25) NOT NULL,
  `nama_user` varchar(256) NOT NULL,
  `jenis_user` enum('akuntan','manager') NOT NULL,
  `password` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`NIP`, `nama_user`, `jenis_user`, `password`) VALUES
('696969', 'BIma', 'akuntan', 'bima');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `aset`
--
ALTER TABLE `aset`
  ADD PRIMARY KEY (`id_aset`);

--
-- Indexes for table `profil_dkm`
--
ALTER TABLE `profil_dkm`
  ADD PRIMARY KEY (`id_pengurus`);

--
-- Indexes for table `profil_masjid`
--
ALTER TABLE `profil_masjid`
  ADD PRIMARY KEY (`id_profil`);

--
-- Indexes for table `rules`
--
ALTER TABLE `rules`
  ADD PRIMARY KEY (`kd_akun`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`NIP`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `profil_dkm`
--
ALTER TABLE `profil_dkm`
  MODIFY `id_pengurus` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=103;

--
-- AUTO_INCREMENT for table `profil_masjid`
--
ALTER TABLE `profil_masjid`
  MODIFY `id_profil` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
