-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 17, 2020 at 06:24 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `laundry`
--

-- --------------------------------------------------------

--
-- Table structure for table `jenis_cuci`
--

CREATE TABLE `jenis_cuci` (
  `id_jenis` varchar(3) NOT NULL,
  `pilihan_cuci` varchar(30) NOT NULL,
  `harga_cuci` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `jenis_cuci`
--

INSERT INTO `jenis_cuci` (`id_jenis`, `pilihan_cuci`, `harga_cuci`) VALUES
('jp1', 'Cuci Kering', 3000),
('jp2', 'Cuci Setrika', 5000),
('jp3', 'Setrika Saja', 2000);

-- --------------------------------------------------------

--
-- Table structure for table `paket`
--

CREATE TABLE `paket` (
  `id_paket` varchar(3) NOT NULL,
  `nama_paket` varchar(15) NOT NULL,
  `kelipatan_harga` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `paket`
--

INSERT INTO `paket` (`id_paket`, `nama_paket`, `kelipatan_harga`) VALUES
('p01', 'Biasa', 1),
('p02', 'Express', 1.5);

-- --------------------------------------------------------

--
-- Table structure for table `pelanggan`
--

CREATE TABLE `pelanggan` (
  `nama_pelanggan` varchar(50) NOT NULL,
  `alamat_pelanggan` varchar(100) NOT NULL,
  `nomor_hp` varchar(13) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pelanggan`
--

INSERT INTO `pelanggan` (`nama_pelanggan`, `alamat_pelanggan`, `nomor_hp`) VALUES
('Dana', 'Tanggul', '081330374369'),
('Dini', 'jelbuk', '081330379292'),
('toriq', 'hoho', '081081081081');

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE `transaksi` (
  `id_transaksi` int(11) NOT NULL,
  `tanggal` date NOT NULL DEFAULT current_timestamp(),
  `nama_pelanggan` varchar(50) NOT NULL,
  `berat` double NOT NULL,
  `id_jenis` varchar(3) NOT NULL,
  `id_paket` varchar(3) NOT NULL,
  `harga_total` double NOT NULL,
  `status_bayar` varchar(15) NOT NULL DEFAULT 'Belum bayar',
  `status_laundry` varchar(15) NOT NULL DEFAULT 'Baru'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `transaksi`
--

INSERT INTO `transaksi` (`id_transaksi`, `tanggal`, `nama_pelanggan`, `berat`, `id_jenis`, `id_paket`, `harga_total`, `status_bayar`, `status_laundry`) VALUES
(41, '2020-12-17', 'Dana', 3, 'jp1', 'p01', 9000, 'Belum bayar', 'Baru'),
(42, '2020-12-17', 'Dini', 4, 'jp1', 'p01', 12000, 'Belum bayar', 'Baru'),
(43, '2020-12-17', 'Dana', 7, 'jp1', 'p01', 21000, 'Belum bayar', 'Baru'),
(51, '2020-12-17', 'toriq', 3, 'jp1', 'p01', 9000, 'Belum bayar', 'Baru'),
(52, '2020-12-17', 'toriq', 4, 'jp1', 'p01', 12000, 'Belum bayar', 'Baru');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `jenis_cuci`
--
ALTER TABLE `jenis_cuci`
  ADD PRIMARY KEY (`id_jenis`);

--
-- Indexes for table `paket`
--
ALTER TABLE `paket`
  ADD PRIMARY KEY (`id_paket`);

--
-- Indexes for table `pelanggan`
--
ALTER TABLE `pelanggan`
  ADD PRIMARY KEY (`nama_pelanggan`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id_transaksi`),
  ADD KEY `id_paket` (`id_paket`),
  ADD KEY `nomor_hp` (`nama_pelanggan`),
  ADD KEY `id_jenis` (`id_jenis`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id_transaksi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD CONSTRAINT `transaksi_ibfk_1` FOREIGN KEY (`id_paket`) REFERENCES `paket` (`id_paket`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `transaksi_ibfk_2` FOREIGN KEY (`id_jenis`) REFERENCES `jenis_cuci` (`id_jenis`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `transaksi_ibfk_3` FOREIGN KEY (`nama_pelanggan`) REFERENCES `pelanggan` (`nama_pelanggan`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
