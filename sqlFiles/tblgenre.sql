-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 14, 2024 at 06:59 PM
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
-- Table structure for table `tblgenre`
--

CREATE TABLE `tblgenre` (
  `genreid` int(11) NOT NULL,
  `genre` varchar(20) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblgenre`
--

INSERT INTO `tblgenre` (`genreid`, `genre`) VALUES
(1, 'Hardware'),
(2, 'CPU'),
(3, 'Laptop'),
(4, 'GPU'),
(5, 'Pc'),
(6, 'Ram geheugen'),
(7, 'Moederbord'),
(8, 'SSD'),
(9, 'Voeding'),
(10, 'Koeling');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tblgenre`
--
ALTER TABLE `tblgenre`
  ADD PRIMARY KEY (`genreid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tblgenre`
--
ALTER TABLE `tblgenre`
  MODIFY `genreid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
