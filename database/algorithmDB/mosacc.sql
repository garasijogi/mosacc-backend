-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 18 Okt 2019 pada 12.31
-- Versi server: 10.1.32-MariaDB
-- Versi PHP: 5.6.36

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
-- Struktur dari tabel `rules`
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
-- Dumping data untuk tabel `rules`
--

INSERT INTO `rules` (`kd_akun`, `menu`, `nama_sub`, `debit`, `kredit`) VALUES
('11110', 'Pendapatan Sewa', 'Infaq Peminjaman Peralatan', 'Kas', 'Infaq Peminjaman Peralatan'),
('11120', 'Pendapatan Sewa', 'Infaq Pemakaian Ruangan', 'Kas', 'Infaq Pemakaian Ruangan'),
('11200', 'Pendapatan Parkir', 'Pendapatan Parkir', 'Kas\r\n', 'Pendapatan Parkir\r\n'),
('11300', 'Infaq Pengurusan Jenazah', 'Infaq Pengurusan Jenazah', 'Kas\r\n', 'Infaq Pengurusan Jenazah'),
('11400', 'Pendapatan Non-Halal', 'Pendapatan Non-Halal', 'Kas\r\n', 'Pendapatan Non-Halal'),
('11500', 'Pendapatan Lainnya', 'Pendapatan Lainnya', 'Kas\r\n', 'Pendapatan Lainnya'),
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
('22231', 'Peribadatan', 'Insentif Penceramah/Khatib', 'Insentif Penceramah/Khatib\r\n', 'Kas'),
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
-- Struktur dari tabel `tr11_penerimaan_tidak_terikat_pending`
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
-- Dumping data untuk tabel `tr11_penerimaan_tidak_terikat_pending`
--

INSERT INTO `tr11_penerimaan_tidak_terikat_pending` (`idtr`, `kd_akun`, `tanggal`, `nominal`, `nama_pemberi`, `keterangan`) VALUES
('2019091611110001', '11110', '2019-09-16', 250000, 'Jack', 'Peminjaman peralatan sound'),
('2019101511120001', '11120', '2019-10-15', 378000, 'Hideyoshi', 'kampang');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tr12_penerimaan_terikat_pending`
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
-- Dumping data untuk tabel `tr12_penerimaan_terikat_pending`
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
('2019101612640001', '12640', '2019-10-16', 670000, ' ', 'hiyahiyahiya');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tr21_pembelian_pending`
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
-- Dumping data untuk tabel `tr21_pembelian_pending`
--

INSERT INTO `tr21_pembelian_pending` (`idtr`, `kd_akun`, `tanggal`, `jenis`, `merek`, `nomor_seri`, `jumlah`, `keterangan`, `harga_satuan`, `total_harga`) VALUES
('2019101721100001', '21100', '2019-10-01', 'Mobil', 'Honda', 'Jazz 220', 1, 'Untuk kebutuhan acara studi banding', 400000000, 400000000),
('2019101721100002', '21100', '2019-10-02', 'Motor', 'Suzuki', 'Korakora', 2, 'mantap lah', 20000000, 40000000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tr22_beban_pending`
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
-- Struktur dari tabel `tr23_renov_bangun_pending`
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
-- Dumping data untuk tabel `tr23_renov_bangun_pending`
--

INSERT INTO `tr23_renov_bangun_pending` (`idtr`, `kd_akun`, `tanggal`, `nominal`, `keterangan`) VALUES
('2019091523100001', '23100', '2019-09-15', 123214000, 'qwewqdsadfsa'),
('2019091523100002', '23100', '2019-09-15', 123214000, 'qwewqdsadfsa'),
('2019091523100003', '23100', '2019-09-23', 21321300000, 'wqewqdsads'),
('2019091523100004', '23100', '2019-09-27', 2132130, 'asdsacxsac'),
('2019091523100005', '23100', '2019-09-26', 21321300, 'adsadsa'),
('2019091523100006', '23100', '2019-09-17', 3424320, 'sdfgsdfsd');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE `user` (
  `NIP` varchar(25) NOT NULL,
  `nama_user` varchar(256) NOT NULL,
  `jenis_user` enum('akuntan','manager') NOT NULL,
  `password` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`NIP`, `nama_user`, `jenis_user`, `password`) VALUES
('258', 'Bima', 'akuntan', 'bima');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `rules`
--
ALTER TABLE `rules`
  ADD PRIMARY KEY (`kd_akun`);

--
-- Indeks untuk tabel `tr11_penerimaan_tidak_terikat_pending`
--
ALTER TABLE `tr11_penerimaan_tidak_terikat_pending`
  ADD PRIMARY KEY (`idtr`);

--
-- Indeks untuk tabel `tr12_penerimaan_terikat_pending`
--
ALTER TABLE `tr12_penerimaan_terikat_pending`
  ADD PRIMARY KEY (`idtr`);

--
-- Indeks untuk tabel `tr21_pembelian_pending`
--
ALTER TABLE `tr21_pembelian_pending`
  ADD PRIMARY KEY (`idtr`);

--
-- Indeks untuk tabel `tr22_beban_pending`
--
ALTER TABLE `tr22_beban_pending`
  ADD PRIMARY KEY (`idtr`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`NIP`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
