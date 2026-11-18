-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 18, 2026 at 03:30 PM
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
-- Database: `catatuang_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `pengeluaran`
--

CREATE TABLE `pengeluaran` (
  `id_pengeluaran` int(10) UNSIGNED NOT NULL,
  `tanggal` date NOT NULL,
  `kategori` varchar(50) NOT NULL,
  `keterangan` text NOT NULL,
  `nominal` decimal(12,2) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pengeluaran`
--

INSERT INTO `pengeluaran` (`id_pengeluaran`, `tanggal`, `kategori`, `keterangan`, `nominal`, `created_at`, `updated_at`) VALUES
(2, '2026-11-10', 'Transportasi', 'Ojek', 5000.00, '2026-11-10 16:23:20', '2026-11-11 11:43:50'),
(3, '2026-11-10', 'Kesehatan', 'Obat', 30000.00, '2026-11-10 16:25:44', '2026-11-11 11:43:59'),
(4, '2026-11-11', 'Makanan', 'Bakso', 10000.00, '2026-11-11 11:43:31', '2026-11-12 06:40:11'),
(7, '2026-11-11', 'Makanan', 'jotoast', 17500.00, '2026-11-11 13:21:54', '2026-11-11 13:21:54'),
(8, '2026-11-11', 'Hiburan', 'tiket konser', 70000.00, '2026-11-11 13:26:45', '2026-11-18 11:01:13'),
(9, '2026-11-11', 'Pendidikan', 'Bensin', 10000.00, '2026-11-11 13:27:09', '2026-11-18 11:01:26'),
(10, '2026-11-12', 'Makanan', 'Belanja', 20000.00, '2026-11-12 06:58:12', '2026-11-18 11:00:45'),
(11, '2026-11-18', 'Makanan', 'Bihun', 9000.00, '2026-11-18 11:00:24', '2026-11-18 11:00:24'),
(12, '2025-10-11', 'Transportasi', 'Ojek', 25000.00, '2026-11-18 11:26:05', '2026-11-18 11:26:05');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `pengeluaran`
--
ALTER TABLE `pengeluaran`
  ADD PRIMARY KEY (`id_pengeluaran`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `pengeluaran`
--
ALTER TABLE `pengeluaran`
  MODIFY `id_pengeluaran` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
