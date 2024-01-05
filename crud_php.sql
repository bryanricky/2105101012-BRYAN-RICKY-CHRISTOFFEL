-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 01, 2024 at 11:58 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `crud_php`
--

-- --------------------------------------------------------

--
-- Table structure for table `table_pemesanan`
--

CREATE TABLE `table_pemesanan` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `no_hp` varchar(100) NOT NULL,
  `tanggal` timestamp NOT NULL DEFAULT current_timestamp(),
  `pesanan` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `table_pemesanan`
--

INSERT INTO `table_pemesanan` (`id`, `nama`, `alamat`, `no_hp`, `tanggal`, `pesanan`) VALUES
(30, 'Akbar', 'Ngawi', '08', '2023-12-26 17:11:09', '1 Latte'),
(34, 'Ibra', 'NGAWI', '08', '2023-12-27 03:45:24', '1 latte dan 1 americcano'),
(36, 'Yasmin', 'Ngawi', '0812345', '2023-12-27 04:12:36', '1 espresso, 1 cappucino');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `table_pemesanan`
--
ALTER TABLE `table_pemesanan`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `table_pemesanan`
--
ALTER TABLE `table_pemesanan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
