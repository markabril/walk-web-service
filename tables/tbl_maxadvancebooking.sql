-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Aug 31, 2022 at 03:54 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 7.3.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `snapgolf`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_maxadvancebooking`
--

CREATE TABLE `tbl_maxadvancebooking` (
  `id` int(11) NOT NULL,
  `gcourse_id` int(11) NOT NULL,
  `days` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_maxadvancebooking`
--

INSERT INTO `tbl_maxadvancebooking` (`id`, `gcourse_id`, `days`) VALUES
(2, 1, 33);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_maxadvancebooking`
--
ALTER TABLE `tbl_maxadvancebooking`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_maxadvancebooking`
--
ALTER TABLE `tbl_maxadvancebooking`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
