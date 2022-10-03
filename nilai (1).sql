-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 03, 2022 at 07:56 AM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 7.3.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sisteminformasi`
--

-- --------------------------------------------------------

--
-- Table structure for table `nilai`
--

CREATE TABLE `nilai` (
  `id` int(255) NOT NULL,
  `si` float NOT NULL,
  `pk2` float NOT NULL,
  `jarkomdat` float NOT NULL,
  `mekatronika` float NOT NULL,
  `praktelkom` float NOT NULL,
  `nim` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `nilai`
--

INSERT INTO `nilai` (`id`, `si`, `pk2`, `jarkomdat`, `mekatronika`, `praktelkom`, `nim`) VALUES
(2, 3.2, 3.5, 3.5, 3.5, 3.5, 'I0720065'),
(4, 3.4, 3.2, 3.6, 3.2, 4, 'I0720037'),
(5, 4, 4, 4, 4, 4, 'I0720006'),
(6, 4, 3.7, 3.7, 3, 4, 'I070013'),
(7, 4, 3.5, 3.9, 3.8, 4, 'I0720020'),
(8, 3.9, 3.8, 3.4, 3, 4, 'I0720064'),
(9, 3.9, 4, 3, 4, 4, 'I0723077'),
(10, 4, 4, 4, 4, 4, 'I0719090'),
(11, 4, 3.5, 4, 4, 4, 'I0720034');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `nilai`
--
ALTER TABLE `nilai`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `nilai`
--
ALTER TABLE `nilai`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
