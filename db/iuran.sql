-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jul 07, 2020 at 04:14 PM
-- Server version: 10.1.19-MariaDB
-- PHP Version: 5.6.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `iuran`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id_admin` varchar(6) NOT NULL,
  `nama_admin` varchar(50) NOT NULL,
  `username` varchar(10) NOT NULL,
  `password` varchar(100) NOT NULL,
  `level` varchar(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id_admin`, `nama_admin`, `username`, `password`, `level`) VALUES
('AML01', 'Putri Ayu', 'putriayu', 'd8d974f8fe85df21b034c572f58893649769ce88', 'adminartikel'),
('AML03', 'wandani siregar', 'wandani', 'df64748726f819213caf2423acf13f6f08fe1951', '');

-- --------------------------------------------------------

--
-- Table structure for table `banner`
--

CREATE TABLE `banner` (
  `id_banner` int(11) NOT NULL,
  `banner` text NOT NULL,
  `link` text NOT NULL,
  `keterangan` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `banner`
--

INSERT INTO `banner` (`id_banner`, `banner`, `link`, `keterangan`) VALUES
(1, 'img/banner/slider 1.jpg', 'http://localhost/menteng/admin/tambah_banner.php', 'rumah');

-- --------------------------------------------------------

--
-- Table structure for table `muzakki`
--

CREATE TABLE `muzakki` (
  `id_muzakki` varchar(6) NOT NULL,
  `foto_profil` varchar(30) NOT NULL,
  `nama_muzakki` varchar(50) NOT NULL,
  `email` varchar(30) NOT NULL,
  `password` varchar(100) NOT NULL,
  `alamat` text NOT NULL,
  `no_telp` varchar(20) NOT NULL,
  `tgl_daftar` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `muzakki`
--

INSERT INTO `muzakki` (`id_muzakki`, `foto_profil`, `nama_muzakki`, `email`, `password`, `alamat`, `no_telp`, `tgl_daftar`) VALUES
('MZ001', 'img/foto_profil/logo.jpg', 'Reni Sari Siregar', 'renisari@gmail.com', '4d0cea8a117bfc10c2a845f1f1e6c02b4db093ed', 'A1 No. 25', '087866761405', '2011-01-02'),
('MZ002', '', 'Suri Rahayu', 'suri@gmail.com', '2900cd5d2b24f1f09255a5c1f162e94ee9e055ec', 'B1 No.12 ', '081299140590', '2020-07-02');

-- --------------------------------------------------------

--
-- Table structure for table `pesan`
--

CREATE TABLE `pesan` (
  `id_pesan` int(11) NOT NULL,
  `id_muzakki` varchar(6) NOT NULL,
  `nama_muzakki` varchar(50) NOT NULL,
  `pesan` text NOT NULL,
  `balasan` text NOT NULL,
  `status` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pesan`
--

INSERT INTO `pesan` (`id_pesan`, `id_muzakki`, `nama_muzakki`, `pesan`, `balasan`, `status`) VALUES
(1, 'MZ001', 'Reni Sari Siregar', 'asdasdasdasd', 'asdasdasdasda', 1),
(2, 'MZ002', 'Suri Rahayu', 'Haloo admin', 'Haiii, ada yang bisa saya bantu?', 1);

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE `transaksi` (
  `id_transaksi` varchar(15) NOT NULL,
  `id_muzakki` varchar(6) NOT NULL,
  `nama_muzakki` varchar(50) NOT NULL,
  `no_transaksi` varchar(14) NOT NULL,
  `jenis_zakat` varchar(30) NOT NULL,
  `bukti_transfer` text NOT NULL,
  `jumlah_bayar` int(8) NOT NULL,
  `nama_bank` varchar(10) NOT NULL,
  `atas_nama` varchar(50) NOT NULL,
  `rekening_bank_tujuan` varchar(10) NOT NULL,
  `jumlah_bayar_konfirmasi` int(8) NOT NULL,
  `tgl_bayar` date NOT NULL,
  `keterangan` text NOT NULL,
  `status` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transaksi`
--

INSERT INTO `transaksi` (`id_transaksi`, `id_muzakki`, `nama_muzakki`, `no_transaksi`, `jenis_zakat`, `bukti_transfer`, `jumlah_bayar`, `nama_bank`, `atas_nama`, `rekening_bank_tujuan`, `jumlah_bayar_konfirmasi`, `tgl_bayar`, `keterangan`, `status`) VALUES
('MZ001110100001', 'MZ001', 'Reni Sari Siregar', '1101021219371', 'Iuran Keamanan dan Kebersihan', 'img/bukti_transfer/Desert.jpg', 100000, 'ovo', 'Wandani', '', 0, '2011-01-02', 'asas', 2),
('MZ001200700001', 'MZ001', 'Reni Sari Siregar', '2007030718161', 'Iuran Keamanan dan Kebersihan', '', 100000, '', '', '', 0, '0000-00-00', '', 0),
('MZ002200700001', 'MZ002', 'Suri Rahayu', '2007020951521', 'Iuran Keamanan dan Kebersihan', 'img/bukti_transfer/WhatsApp Image 2020-07-03 at 8.13.49 PM.jpg', 120000, 'ovo', 'Reni Sari Siregar', '', 0, '2020-07-02', 'Lunas', 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `banner`
--
ALTER TABLE `banner`
  ADD PRIMARY KEY (`id_banner`);

--
-- Indexes for table `muzakki`
--
ALTER TABLE `muzakki`
  ADD PRIMARY KEY (`id_muzakki`);

--
-- Indexes for table `pesan`
--
ALTER TABLE `pesan`
  ADD PRIMARY KEY (`id_pesan`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id_transaksi`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `banner`
--
ALTER TABLE `banner`
  MODIFY `id_banner` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `pesan`
--
ALTER TABLE `pesan`
  MODIFY `id_pesan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
