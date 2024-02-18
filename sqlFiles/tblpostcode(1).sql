-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 18, 2024 at 06:29 PM
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
-- Database: `computershopphp`
--

-- --------------------------------------------------------

--
-- Table structure for table `tblpostcode`
--

CREATE TABLE `tblpostcode` (
  `postcodeid` int(11) NOT NULL,
  `postcode` int(4) NOT NULL,
  `stadsnaam` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblpostcode`
--

INSERT INTO `tblpostcode` (`postcodeid`, `postcode`, `stadsnaam`) VALUES
(1, 9070, 'Heusden'),
(3, 9080, 'lochristi'),
(5, 9000, 'Gent');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tblpostcode`
--
ALTER TABLE `tblpostcode`
  ADD PRIMARY KEY (`postcodeid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tblpostcode`
--
ALTER TABLE `tblpostcode`
  MODIFY `postcodeid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
