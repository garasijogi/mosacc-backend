-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Nov 16, 2019 at 01:25 PM
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
-- Table structure for table `aset-bangunan_tanah`
--

CREATE TABLE `aset-bangunan_tanah` (
  `id_aset` int(11) NOT NULL,
  `nama` varchar(256) DEFAULT NULL,
  `tanggal` date DEFAULT NULL,
  `luas` double DEFAULT NULL,
  `nilai` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `aset-bangunan_tanah`
--

INSERT INTO `aset-bangunan_tanah` (`id_aset`, `nama`, `tanggal`, `luas`, `nilai`) VALUES
(1, '', '0000-00-00', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `aset-kas_bank`
--

CREATE TABLE `aset-kas_bank` (
  `norek` varchar(64) NOT NULL,
  `nama_pemilik` varchar(128) DEFAULT NULL,
  `nama_bank` varchar(128) DEFAULT NULL,
  `nominal` double DEFAULT NULL,
  `tanggal` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `aset-kas_bank`
--

INSERT INTO `aset-kas_bank` (`norek`, `nama_pemilik`, `nama_bank`, `nominal`, `tanggal`) VALUES
('', '', '', 0, '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `aset-kendaraan`
--

CREATE TABLE `aset-kendaraan` (
  `id_aset` int(11) NOT NULL,
  `nama` varchar(128) DEFAULT NULL,
  `merek` varchar(32) DEFAULT NULL,
  `tanggal` date DEFAULT NULL,
  `tipe` varchar(32) DEFAULT NULL,
  `jumlah` double DEFAULT NULL,
  `harga` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `aset-kendaraan`
--

INSERT INTO `aset-kendaraan` (`id_aset`, `nama`, `merek`, `tanggal`, `tipe`, `jumlah`, `harga`) VALUES
(1, '', '', '0000-00-00', '', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `aset-peralatan`
--

CREATE TABLE `aset-peralatan` (
  `id_aset` int(6) NOT NULL,
  `nama` varchar(128) DEFAULT NULL,
  `merek` varchar(64) DEFAULT NULL,
  `tanggal` date DEFAULT NULL,
  `kategori` varchar(64) DEFAULT NULL,
  `jumlah` varchar(3) DEFAULT NULL,
  `harga` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `aset-peralatan`
--

INSERT INTO `aset-peralatan` (`id_aset`, `nama`, `merek`, `tanggal`, `kategori`, `jumlah`, `harga`) VALUES
(1, '', '', '0000-00-00', '', '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `aset-perlengkapan`
--

CREATE TABLE `aset-perlengkapan` (
  `id_aset` int(11) NOT NULL,
  `nama` varchar(128) DEFAULT NULL,
  `merek` varchar(32) DEFAULT NULL,
  `tanggal` date DEFAULT NULL,
  `kategori` varchar(32) DEFAULT NULL,
  `jumlah` double DEFAULT NULL,
  `harga` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `aset-perlengkapan`
--

INSERT INTO `aset-perlengkapan` (`id_aset`, `nama`, `merek`, `tanggal`, `kategori`, `jumlah`, `harga`) VALUES
(1, '', '', '0000-00-00', '', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `files`
--

CREATE TABLE `files` (
  `id` int(11) NOT NULL,
  `nama` varchar(512) DEFAULT NULL,
  `jenis_file` varchar(24) DEFAULT NULL,
  `tipe_file` varchar(256) DEFAULT NULL,
  `ekstensi` varchar(8) DEFAULT NULL,
  `ukuran` double DEFAULT NULL,
  `tanggal` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `files`
--

INSERT INTO `files` (`id`, `nama`, `jenis_file`, `tipe_file`, `ekstensi`, `ukuran`, `tanggal`) VALUES
(1, '', 'ad_art', '', '', 0, '0000-00-00'),
(2, '', 'badan_hukum', '', '', 0, '0000-00-00'),
(3, '', 'struktur_dkm', '', '', 0, '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `jenis_aset`
--

CREATE TABLE `jenis_aset` (
  `id_jenis_aset` varchar(3) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `profil`
--

CREATE TABLE `profil` (
  `Nama Masjid` varchar(256) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `profil_dkm`
--

CREATE TABLE `profil_dkm` (
  `id_pengurus` int(11) NOT NULL,
  `nama` varchar(256) DEFAULT NULL,
  `posisi` enum('bendahara','ketua','sekretaris','struktur_dkm') NOT NULL,
  `alamat` varchar(512) DEFAULT NULL,
  `telepon` varchar(15) DEFAULT NULL,
  `pendidikan` varchar(32) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `profil_masjid`
--

CREATE TABLE `profil_masjid` (
  `id_profil` int(11) NOT NULL,
  `nama` varchar(256) DEFAULT NULL,
  `alamat` varchar(512) DEFAULT NULL,
  `tahun` varchar(4) DEFAULT NULL,
  `telepon` varchar(15) DEFAULT NULL,
  `rekening` varchar(32) DEFAULT NULL,
  `luas_tanah` varchar(16) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `profil_masjid`
--

INSERT INTO `profil_masjid` (`id_profil`, `nama`, `alamat`, `tahun`, `telepon`, `rekening`, `luas_tanah`) VALUES
(1, 'Masjid Al-Ishlah', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `rules`
--

CREATE TABLE `rules` (
  `kd_akun` varchar(5) NOT NULL,
  `kd_bagan` varchar(5) NOT NULL,
  `menu` varchar(256) NOT NULL,
  `nama_sub` varchar(256) NOT NULL,
  `debit` varchar(256) NOT NULL,
  `kredit` varchar(256) NOT NULL
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
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `NIP` int(25) NOT NULL,
  `nama_user` varchar(256) NOT NULL,
  `jenis_user` enum('akuntan','manager') NOT NULL,
  `password` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`NIP`, `nama_user`, `jenis_user`, `password`) VALUES
(1, 'ketua_dkm', 'manager', '1234'),
(2, 'bendahara', 'akuntan', '1234');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `aset`
--
ALTER TABLE `aset`
  ADD PRIMARY KEY (`id_aset`);

--
-- Indexes for table `aset-bangunan_tanah`
--
ALTER TABLE `aset-bangunan_tanah`
  ADD PRIMARY KEY (`id_aset`);

--
-- Indexes for table `aset-kas_bank`
--
ALTER TABLE `aset-kas_bank`
  ADD PRIMARY KEY (`norek`);

--
-- Indexes for table `aset-kendaraan`
--
ALTER TABLE `aset-kendaraan`
  ADD PRIMARY KEY (`id_aset`);

--
-- Indexes for table `aset-peralatan`
--
ALTER TABLE `aset-peralatan`
  ADD PRIMARY KEY (`id_aset`),
  ADD KEY `id_aset` (`id_aset`);

--
-- Indexes for table `aset-perlengkapan`
--
ALTER TABLE `aset-perlengkapan`
  ADD PRIMARY KEY (`id_aset`);

--
-- Indexes for table `files`
--
ALTER TABLE `files`
  ADD PRIMARY KEY (`id`);

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
-- AUTO_INCREMENT for table `aset-bangunan_tanah`
--
ALTER TABLE `aset-bangunan_tanah`
  MODIFY `id_aset` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `aset-kendaraan`
--
ALTER TABLE `aset-kendaraan`
  MODIFY `id_aset` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `aset-peralatan`
--
ALTER TABLE `aset-peralatan`
  MODIFY `id_aset` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `aset-perlengkapan`
--
ALTER TABLE `aset-perlengkapan`
  MODIFY `id_aset` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `files`
--
ALTER TABLE `files`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `profil_dkm`
--
ALTER TABLE `profil_dkm`
  MODIFY `id_pengurus` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `profil_masjid`
--
ALTER TABLE `profil_masjid`
  MODIFY `id_profil` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `NIP` int(25) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
