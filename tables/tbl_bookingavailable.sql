-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Aug 31, 2022 at 03:56 AM
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
-- Table structure for table `tbl_bookingavailable`
--

CREATE TABLE `tbl_bookingavailable` (
  `id` int(11) NOT NULL,
  `time` time NOT NULL,
  `green_fee` float DEFAULT 0,
  `type` int(11) DEFAULT 0 COMMENT '0 - regular time, 1 - prime time,2 - twilight time',
  `originid` int(11) NOT NULL,
  `gcourseid` int(11) NOT NULL,
  `is_active` int(11) NOT NULL DEFAULT 0 COMMENT '0 - active, 1 - inactive',
  `playerlimit` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_bookingavailable`
--

INSERT INTO `tbl_bookingavailable` (`id`, `time`, `green_fee`, `type`, `originid`, `gcourseid`, `is_active`, `playerlimit`) VALUES
(19, '06:15:00', 1500, 0, 13, 13, 0, 0),
(20, '06:30:00', 1500, 0, 13, 13, 0, 0),
(21, '06:45:00', 1500, 0, 13, 13, 0, 0),
(22, '07:00:00', 1500, 0, 13, 13, 0, 0),
(23, '07:15:00', 1500, 0, 13, 13, 0, 0),
(24, '07:30:00', 1500, 0, 13, 13, 0, 0),
(25, '07:45:00', 1500, 0, 13, 13, 0, 0),
(26, '08:00:00', 1500, 0, 13, 13, 0, 0),
(27, '09:00:00', 1500, 0, 13, 13, 0, 0),
(28, '10:00:00', 1500, 0, 13, 13, 0, 0),
(29, '11:00:00', 1500, 0, 13, 13, 0, 0),
(31, '12:00:00', 1500, 0, 13, 13, 0, 0),
(32, '06:00:00', 1500, 0, 1, 1, 0, 0),
(33, '06:30:00', 1500, 0, 1, 1, 0, 0),
(34, '07:00:00', 1500, 0, 1, 1, 0, 0),
(35, '07:30:00', 1500, 0, 1, 1, 0, 0),
(36, '08:00:00', 1500, 0, 1, 1, 0, 0),
(37, '08:30:00', 1500, 0, 1, 1, 0, 0),
(38, '09:00:00', 1500, 0, 1, 1, 0, 0),
(39, '08:15:00', 1500, 0, 13, 13, 0, 0),
(40, '06:00:00', 1500, 0, 13, 13, 0, 0),
(41, '09:30:00', 1500, 0, 1, 1, 0, 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_bookingavailable`
--
ALTER TABLE `tbl_bookingavailable`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_bookingavailable`
--
ALTER TABLE `tbl_bookingavailable`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
