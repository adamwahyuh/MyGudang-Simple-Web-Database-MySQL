-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 13, 2024 at 06:23 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tugas_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `barang`
--

CREATE TABLE `barang` (
  `No_Item` int(20) NOT NULL,
  `Tanggal` date NOT NULL,
  `Nama_barang` varchar(50) NOT NULL,
  `Harga_satuan` bigint(20) UNSIGNED NOT NULL,
  `Jenis_barang` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `barang`
--

INSERT INTO `barang` (`No_Item`, `Tanggal`, `Nama_barang`, `Harga_satuan`, `Jenis_barang`) VALUES
(10000, '2024-01-13', 'Meja ', 200000, 'Furniture'),
(10001, '2024-01-13', 'Bangku', 250000, 'Furniture'),
(10002, '2024-01-13', 'Lemari Baju', 800000, 'Furniture'),
(10003, '2024-01-13', 'Cermin', 150000, 'Furniture'),
(20000, '2024-01-13', 'Keyboard', 450000, 'Elektronik'),
(20001, '2024-01-13', 'Komputer', 15000000, 'Elektronik'),
(20002, '2024-01-13', 'Handphone', 4000000, 'Elektronik'),
(20003, '2024-01-13', 'Speaker', 400000, 'Elektronik'),
(30001, '2024-01-13', 'Microsoft 369', 2900000, 'Software');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`No_Item`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
