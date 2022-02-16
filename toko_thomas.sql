-- phpMyAdmin SQL Dump
-- version 4.9.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Feb 16, 2022 at 10:37 AM
-- Server version: 5.7.26
-- PHP Version: 7.4.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `toko_thomas`
--

-- --------------------------------------------------------

--
-- Table structure for table `barang`
--

CREATE TABLE `barang` (
  `id_barang` int(11) NOT NULL,
  `nama_barang` varchar(30) NOT NULL,
  `stok` int(4) NOT NULL,
  `harga` int(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `barang`
--

INSERT INTO `barang` (`id_barang`, `nama_barang`, `stok`, `harga`) VALUES
(1001, 'Beras Pulen', 98, 11000),
(1002, 'Beras Pera', 100, 9000),
(1003, 'Beras Pandan Wangi', 100, 13000),
(2001, 'Gulaku', 98, 12000),
(2002, 'Gula GMP', 94, 12000),
(2003, 'Gula Rose Brand', 96, 12000),
(3001, 'Minyak Bimoli 1L', 98, 17000),
(3002, 'Minyak Tropical 1L', 95, 19000),
(3003, 'Minyak Sedap 1L', 100, 16000),
(3004, 'Minyak Rose Brand 1L', 94, 20000),
(3005, 'Minyak Fortune 1L', 100, 18000),
(3006, 'Minyak Sunco 1L', 100, 18000),
(3007, 'Minyak Sania 1L', 98, 18000),
(3008, 'Minyak Jujur 1L', 100, 16000),
(3009, 'Minyak Filma 1L', 100, 17000),
(3101, 'Minyak Bimoli 2L', 100, 34000);

-- --------------------------------------------------------

--
-- Table structure for table `kasir`
--

CREATE TABLE `kasir` (
  `id_kasir` int(11) NOT NULL,
  `nama_kasir` varchar(30) NOT NULL,
  `password` varchar(255) NOT NULL,
  `alamat` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kasir`
--

INSERT INTO `kasir` (`id_kasir`, `nama_kasir`, `password`, `alamat`) VALUES
(1234567891, 'Dodit', 'd0970714757783e6cf17b26fb8e2298f', 'Perumahan Bnong Permai Blok G4/16'),
(1710114023, 'Kristiandry Dwigana Prasetyo', 'e10adc3949ba59abbe56e057f20f883e', 'Kp. Babakan No.12');

-- --------------------------------------------------------

--
-- Table structure for table `penjualan`
--

CREATE TABLE `penjualan` (
  `id_penjualan` int(11) NOT NULL,
  `tanggal_penjualan` datetime NOT NULL,
  `jumlah_barang` varchar(5) NOT NULL,
  `total_harga` varchar(20) NOT NULL,
  `total_bayar` varchar(20) NOT NULL,
  `kembalian` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `penjualan`
--

INSERT INTO `penjualan` (`id_penjualan`, `tanggal_penjualan`, `jumlah_barang`, `total_harga`, `total_bayar`, `kembalian`) VALUES
(3, '2022-02-15 06:00:40', '2', '78000', '80000', '2000'),
(4, '2022-02-15 11:33:58', '2', '60000', '90000', '30000'),
(5, '2022-02-15 11:36:20', '1', '24000', '50000', '26000'),
(6, '2022-02-15 11:37:17', '1', '38000', '39000', '1000'),
(7, '2022-02-15 11:40:49', '1', '24000', '50000', '26000'),
(8, '2022-02-15 11:41:41', '1', '24000', '40000', '16000');

-- --------------------------------------------------------

--
-- Table structure for table `penjualan_detail`
--

CREATE TABLE `penjualan_detail` (
  `id_penjualan_detail` int(10) UNSIGNED NOT NULL,
  `id_penjualan` int(11) NOT NULL,
  `id_barang` int(11) NOT NULL,
  `nama_barang` varchar(30) NOT NULL,
  `harga` varchar(12) NOT NULL,
  `quantity` varchar(5) NOT NULL,
  `jumlah` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `penjualan_detail`
--

INSERT INTO `penjualan_detail` (`id_penjualan_detail`, `id_penjualan`, `id_barang`, `nama_barang`, `harga`, `quantity`, `jumlah`) VALUES
(4, 3, 3007, 'Minyak Sania 1L', '18000', '1', '18000'),
(5, 3, 3004, 'Minyak Rose Brand 1L', '20000', '3', '60000'),
(6, 4, 2002, 'Gula GMP', '12000', '2', '24000'),
(7, 4, 2003, 'Gula Rose Brand', '12000', '3', '36000'),
(8, 5, 2001, 'Gulaku', '12000', '2', '24000'),
(9, 6, 3002, 'Minyak Tropical 1L', '19000', '2', '38000'),
(10, 7, 2002, 'Gula GMP', '12000', '2', '24000'),
(11, 8, 2002, 'Gula GMP', '12000', '2', '24000');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`id_barang`);

--
-- Indexes for table `kasir`
--
ALTER TABLE `kasir`
  ADD PRIMARY KEY (`id_kasir`);

--
-- Indexes for table `penjualan`
--
ALTER TABLE `penjualan`
  ADD PRIMARY KEY (`id_penjualan`);

--
-- Indexes for table `penjualan_detail`
--
ALTER TABLE `penjualan_detail`
  ADD PRIMARY KEY (`id_penjualan_detail`),
  ADD KEY `id_barang` (`id_barang`),
  ADD KEY `id_penjualan` (`id_penjualan`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `penjualan`
--
ALTER TABLE `penjualan`
  MODIFY `id_penjualan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `penjualan_detail`
--
ALTER TABLE `penjualan_detail`
  MODIFY `id_penjualan_detail` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `penjualan_detail`
--
ALTER TABLE `penjualan_detail`
  ADD CONSTRAINT `penjualan_detail_id_penjualan_foreign_key` FOREIGN KEY (`id_penjualan`) REFERENCES `penjualan` (`id_penjualan`) ON DELETE CASCADE ON UPDATE CASCADE;
