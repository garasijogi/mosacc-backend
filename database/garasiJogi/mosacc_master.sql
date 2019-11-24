-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 24, 2019 at 06:59 AM
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
-- Database: `mosacc_master`
--
CREATE DATABASE IF NOT EXISTS `mosacc_master` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
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
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `jenis_aset`
--

DROP TABLE IF EXISTS `jenis_aset`;
CREATE TABLE IF NOT EXISTS `jenis_aset` (
  `id_jenis_aset` varchar(3) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `profil`
--

DROP TABLE IF EXISTS `profil`;
CREATE TABLE IF NOT EXISTS `profil` (
  `Nama Masjid` varchar(256) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
