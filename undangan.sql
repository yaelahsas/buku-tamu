-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 15, 2025 at 07:59 AM
-- Server version: 8.0.19
-- PHP Version: 7.4.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `undangan`
--

-- --------------------------------------------------------

--
-- Table structure for table `tamu`
--

CREATE TABLE `tamu` (
  `id` int NOT NULL,
  `nama_lengkap` varchar(255) DEFAULT NULL,
  `checkin` datetime DEFAULT NULL,
  `keterangan` varchar(250) DEFAULT NULL,
  `create_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tamu`
--

INSERT INTO `tamu` (`id`, `nama_lengkap`, `checkin`, `keterangan`, `create_at`) VALUES
(1, 'sastra', '2025-04-12 02:38:17', NULL, '2025-04-12 07:38:22'),
(2, 'DHIMAS PANJI SASTRA', '2025-04-12 02:57:25', NULL, '2025-04-12 02:57:25'),
(3, 'DHIMAS PANJI SASTRA', '2025-04-12 08:03:08', NULL, '2025-04-12 08:03:08'),
(4, 'DHIMAS PANJI SASTRA', '2025-04-12 08:17:19', NULL, '2025-04-12 08:17:19'),
(5, 'DHIMAS PANJI SASTRA', '2025-04-12 08:17:38', NULL, '2025-04-12 08:17:38'),
(6, 'sastra jos', '2025-04-12 08:35:25', NULL, '2025-04-12 08:35:25'),
(7, 'sastra jos', '2025-04-12 08:37:58', NULL, '2025-04-12 08:37:58'),
(8, 'alan', '2025-04-12 08:38:06', NULL, '2025-04-12 08:38:06'),
(9, 'sastra', '2025-04-12 08:38:44', NULL, '2025-04-12 08:38:44'),
(10, 'sastra', '2025-04-12 08:40:21', NULL, '2025-04-12 08:40:21'),
(11, 'a', '2025-04-14 10:13:17', '', '2025-04-14 10:13:17'),
(12, 'aba', '2025-04-14 10:14:40', '', '2025-04-14 10:14:40'),
(13, 'Admin', '2025-04-14 10:16:30', '', '2025-04-14 10:16:30'),
(14, 'koni', '2025-04-14 10:19:51', '', '2025-04-14 10:19:51'),
(15, 'monitoring', '2025-04-14 10:20:06', '', '2025-04-14 10:20:06'),
(16, 'lolok', '2025-04-14 10:58:33', '', '2025-04-14 10:58:33');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tamu`
--
ALTER TABLE `tamu`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tamu`
--
ALTER TABLE `tamu`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
