-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 06, 2024 at 09:02 PM
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
-- Table structure for table `tblklanten`
--

CREATE TABLE `tblklanten` (
  `klantnr` int(11) NOT NULL,
  `klantvoornaam` varchar(25) NOT NULL,
  `klantachternaam` varchar(25) NOT NULL,
  `telefoon` varchar(30) NOT NULL,
  `postcodeID` varchar(5) NOT NULL,
  `email` varchar(40) NOT NULL,
  `wachtwoord` varchar(20) NOT NULL,
  `adres` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblklanten`
--

INSERT INTO `tblklanten` (`klantnr`, `klantvoornaam`, `klantachternaam`, `telefoon`, `postcodeID`, `email`, `wachtwoord`, `adres`) VALUES
(4, 'tesrdfsqfsdf', 'qsqfqsdqqdq', '444', '55', 'sayahsayah13@gmail.com', 'zdq', 'kleempendorp 78'),
(5, 'zeqze', 'qzeqzeq', '3333', '3333', 'test', 'test', 'qzdqzdqzdqzdzq');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tblklanten`
--
ALTER TABLE `tblklanten`
  ADD PRIMARY KEY (`klantnr`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tblklanten`
--
ALTER TABLE `tblklanten`
  MODIFY `klantnr` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
