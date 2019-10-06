-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 06 Okt 2019 pada 13.25
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
-- Struktur dari tabel `tr11_penerimaan_tidak_terikat_pending`
--

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
('2019091111200001', '11200', '2019-09-11', 258000, ' ', 'jacks knighto queens knight and kings knighto'),
('2019091611110001', '11110', '2019-09-16', 250000, 'Jack', 'Peminjaman peralatan sound');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tr12_penerimaan_terikat_pending`
--

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
('2019091512630001', '12630', '2019-09-15', 212323, ' ', 'KKKAD');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tr21_pembelian_pending`
--

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
('2019091521100001', '21100', '2019-09-28', 'sadsad', 'qwewqeq', 'qwewqewqe', 12312321, 'wqewqewqewq\r\nqwewqeqweq', 213213123, 12312312),
('2019091521100002', '21100', '2019-09-16', 'qweqwe', 'wqewqewq', 'wqewqeqe', 12312412, 'sadsadsad', 12321312, 123123);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tr22_beban_pending`
--

CREATE TABLE `tr22_beban_pending` (
  `idtr` varchar(16) NOT NULL,
  `kd_akun` varchar(5) DEFAULT NULL,
  `tanggal` date DEFAULT NULL,
  `nominal` int(11) DEFAULT NULL,
  `keterangan` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tr22_beban_pending`
--

INSERT INTO `tr22_beban_pending` (`idtr`, `kd_akun`, `tanggal`, `nominal`, `keterangan`) VALUES
('2019091522111001', '22111', '2019-09-10', 12321321, 'sadsadsadsad'),
('2019091522111002', '22111', '2019-09-10', 12321321, 'sadsadsadsad'),
('2019091522115001', '22115', '2019-09-08', 2312312, 'efsdfsdf'),
('2019091722111001', '22111', '2019-09-17', 21313213, 'ewrfesfaegr'),
('2019091722111002', '22111', '2019-09-25', 213213131, 'asfdcdwsvadc'),
('2019091722111003', '22111', '2019-09-25', 2147483647, 'dsgvfsbd'),
('2019091922231001', '22231', '2019-09-16', 32423432, 'dfdsfsd');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tr23_renov_bangun_pending`
--

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

CREATE TABLE `user` (
  `NIP` varchar(25) NOT NULL,
  `nama_user` varchar(256) NOT NULL,
  `jenis_user` enum('accountant','manager') NOT NULL,
  `password` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`NIP`, `nama_user`, `jenis_user`, `password`) VALUES
('258', 'Bima', 'accountant', 'bimamantappulak');

--
-- Indexes for dumped tables
--

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
