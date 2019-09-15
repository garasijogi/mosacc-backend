-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 15 Sep 2019 pada 14.40
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
-- Struktur dari tabel `books`
--

CREATE TABLE `books` (
  `ID` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `author` varchar(255) NOT NULL,
  `rating` int(11) NOT NULL,
  `publisher` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `books`
--

INSERT INTO `books` (`ID`, `name`, `price`, `author`, `rating`, `publisher`) VALUES
(1, 'Harry Potter And The Order Of The Phoenix', '10.99', 'J.K. Rowling', 9, 'Bloomsbury'),
(2, 'Harry Potter And The Goblet Of Fire', '6.99', 'J.K Rowling', 8, 'Bloomsbury'),
(3, 'Lord Of The Rings: The Fellowship Of The Ring', '8.99', 'J. R. R. Tolkien', 8, 'George Allen & Unwin'),
(4, 'Lord Of The Rings: The Two Towers', '4.55', 'J. R. R. Tolkien', 8, 'George Allen & Unwin'),
(5, 'Lord Of The Rings: The Return Of The King', '7.99', 'J. R. R. Tolkien', 9, 'George Allen & Unwin'),
(6, 'End of Watch: A Novel', '5.00', 'Stephen King', 7, 'Scribner'),
(7, 'Truly Madly Guilty', '4.55', 'Liane Moriarty', 6, 'Flatiron Books'),
(8, 'All There Was', '3.99', 'John Davidson', 3, 'Newton'),
(9, 'Mystery In The Eye', '8.44', 'E.L. Joseph', 8, 'Red Books'),
(10, 'Neo Lights', '12.99', 'George Nord', 8, 'Heltower'),
(11, 'Universe: History', '13.99', 'Albert Shoon', 4, 'Easy Books'),
(12, 'Green Earth', '7.99', 'Ashleigh Turner', 4, 'Yellowhouse'),
(13, 'Music Of The Ages', '3.83', 'James King', 3, 'Universe Co'),
(14, 'Ancient Tea', '3.99', 'Jess Red', 8, 'Yellowhouse');

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
('2019092112850001', '12850', '2019-09-21', 3423, 'jajang', 'ergdsg');

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
('2019091522115001', '22115', '2019-09-08', 2312312, 'efsdfsdf');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`ID`);

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
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `books`
--
ALTER TABLE `books`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
