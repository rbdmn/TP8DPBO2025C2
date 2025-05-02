-- phpMyAdmin SQL Dump
-- version 5.2.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: May 02, 2025 at 12:58 PM
-- Server version: 8.4.3
-- PHP Version: 8.3.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tp_mvc`
--

-- --------------------------------------------------------

--
-- Table structure for table `akademik`
--

CREATE TABLE `akademik` (
  `id_akademik` int NOT NULL,
  `status_akademik` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `akademik`
--

INSERT INTO `akademik` (`id_akademik`, `status_akademik`) VALUES
(1, 'Aktif'),
(2, 'Cuti'),
(3, 'Lulus');

-- --------------------------------------------------------

--
-- Table structure for table `prestasi`
--

CREATE TABLE `prestasi` (
  `id_prestasi` int NOT NULL,
  `tingkat_prestasi` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `prestasi`
--

INSERT INTO `prestasi` (`id_prestasi`, `tingkat_prestasi`) VALUES
(1, 'Nasional'),
(2, 'Regional'),
(3, 'Internasional');

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `name` varchar(255) NOT NULL,
  `nim` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `join_date` date NOT NULL,
  `id` int NOT NULL,
  `id_prestasi` int NOT NULL,
  `id_akademik` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`name`, `nim`, `phone`, `join_date`, `id`, `id_prestasi`, `id_akademik`) VALUES
('Dontol', '202301001', '081234567890', '2023-08-15', 1, 1, 1),
('Adit', '202301002', '081234567891', '2023-08-16', 2, 2, 2),
('Supriyadi', '202301003', '081234567892', '2023-08-17', 3, 3, 3),
('legends never dieeeee', 'when i try to calling you', 'and theres a frickin bug right now', '2025-05-02', 8, 3, 3);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `akademik`
--
ALTER TABLE `akademik`
  ADD PRIMARY KEY (`id_akademik`);

--
-- Indexes for table `prestasi`
--
ALTER TABLE `prestasi`
  ADD PRIMARY KEY (`id_prestasi`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ibfk_prestasi` (`id_prestasi`),
  ADD KEY `ibfk_akademik` (`id_akademik`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `akademik`
--
ALTER TABLE `akademik`
  MODIFY `id_akademik` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `prestasi`
--
ALTER TABLE `prestasi`
  MODIFY `id_prestasi` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `students`
--
ALTER TABLE `students`
  ADD CONSTRAINT `ibfk_akademik` FOREIGN KEY (`id_akademik`) REFERENCES `akademik` (`id_akademik`) ON DELETE CASCADE ON UPDATE RESTRICT,
  ADD CONSTRAINT `ibfk_prestasi` FOREIGN KEY (`id_prestasi`) REFERENCES `prestasi` (`id_prestasi`) ON DELETE CASCADE ON UPDATE RESTRICT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
