-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 18, 2024 at 06:27 PM
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
-- Table structure for table `tblartikels`
--

CREATE TABLE `tblartikels` (
  `artikelnr` int(11) NOT NULL,
  `artikelnaam` varchar(100) NOT NULL,
  `prijs` double NOT NULL,
  `korting` int(11) NOT NULL,
  `genreid` varchar(20) NOT NULL,
  `omschrijving` text NOT NULL,
  `merk` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblartikels`
--

INSERT INTO `tblartikels` (`artikelnr`, `artikelnaam`, `prijs`, `korting`, `genreid`, `omschrijving`, `merk`) VALUES
(13, 'Geforce RTX 3060', 560, 0, 'GPU', 'een gpu van Nvidia gemaakt voor laptops', 'Nvidia'),
(14, 'AMD Ryzen 5000x Series 7', 978, 0, 'CPU', 'een AMD cpu voor een AMD moederbord', 'Acer'),
(15, 'HP Gaming laptop Omen 16-XF0005NB AMD Ryzen 7 7840HS', 177.99, 0, 'Laptop', 'Een Omen gaming laptop ', 'Omen'),
(16, 'NVIDIA GeForce RTX 4090', 2145, 259, 'GPU', 'een NVIDIA GeForce GPU', 'Nvidia'),
(17, 'Redux Andromeda I149K R49', 6199, 428, 'Pc', 'een Prebuild Computer van Redux', 'Redux'),
(18, 'Corsair vengeance lpx 32gb', 74.04, 0, 'Ram Geheugen', 'Ram geheugen voor een Pc ', 'Corsair'),
(19, 'CM MSI MPG B550 Gaming', 115.23, 0, 'Moederbord', 'Gaming moederbord van MSi dat DDR4 ram gebruikt', 'MSi'),
(20, 'Crucial P3 1TB Gen3 SSD', 61.5, 0, 'SSD', 'Een ssd dat via de Pci verbonden is', 'Crucial'),
(21, 'Coolermaster | ELITE 300 V4', 34.95, 12, 'Voeding', 'Voeding voor een Pc.', 'Coolermaster'),
(22, 'Corsair CO-9050082-WW koelsysteem', 36.99, 0, 'Koeling', 'Koelsysteem voor Pc\'s.', 'Corsair'),
(24, 'Acer | Nitro 5', 849.99, 110, 'Laptop', 'Een Acer gaming laptop ', 'Acer');

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
(9, 'Acer'),
(10, 'HP');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tblartikels`
--
ALTER TABLE `tblartikels`
  ADD PRIMARY KEY (`artikelnr`);

--
-- Indexes for table `tblgenre`
--
ALTER TABLE `tblgenre`
  ADD PRIMARY KEY (`genreid`);

--
-- Indexes for table `tblmerk`
--
ALTER TABLE `tblmerk`
  ADD PRIMARY KEY (`merkid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tblartikels`
--
ALTER TABLE `tblartikels`
  MODIFY `artikelnr` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
--
-- AUTO_INCREMENT for table `tblgenre`
--
ALTER TABLE `tblgenre`
  MODIFY `genreid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `tblmerk`
--
ALTER TABLE `tblmerk`
  MODIFY `merkid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
