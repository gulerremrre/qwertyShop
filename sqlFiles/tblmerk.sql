-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 14, 2024 at 07:00 PM
-- Server version: 5.7.17
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `leerphp`
--

-- --------------------------------------------------------

--
-- Table structure for table `tblmerk`
--

CREATE TABLE `tblmerk` (
  `merkid` int(11) NOT NULL,
  `merk` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblmerk`
--

INSERT INTO `tblmerk` (`merkid`, `merk`) VALUES
(1, 'Nvidia'),
(2, 'AMD'),
(3, 'Omen'),
(4, 'Redux'),
(5, 'Corsair'),
(6, 'MSi'),
(7, 'Crucial'),
(8, 'Coolermaster'),
(9, 'Acer');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tblmerk`
--
ALTER TABLE `tblmerk`
  ADD PRIMARY KEY (`merkid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tblmerk`
--
ALTER TABLE `tblmerk`
  MODIFY `merkid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
