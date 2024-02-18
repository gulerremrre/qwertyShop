-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 18, 2024 at 06:28 PM
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
  `postcodeid` int(4) NOT NULL,
  `email` varchar(40) NOT NULL,
  `wachtwoord` varchar(255) NOT NULL,
  `adres` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblklanten`
--

INSERT INTO `tblklanten` (`klantnr`, `klantvoornaam`, `klantachternaam`, `telefoon`, `postcodeid`, `email`, `wachtwoord`, `adres`) VALUES
(4, 'Tim', 'Meesen', '+32478087758', 9070, 'tim.meesen@gmail.com', '$2y$10$UgGHF4CDsqVixlxGAdO39eamZG0iyOJWoJxI.WFG047uc7xGLSVia', 'lozevisserstraat 56'),
(5, 'Micah', 'Botha', '+32472846056', 9070, 'Micah.botha@gmail.com', '$2y$10$NmsVg.q76Amen6gaQSftFeEn3XTOWjXRu6zBTwnw0ZdX5fPAoGEZ6', 'kazierlaan 12'),
(6, 'Rayan', 'Sayah', '+32478303719', 9070, 'rayan.sayah@gmail.com', '$2y$10$bHDfB1MRr0xUawhycwb6zutv/vrbNZBC1qGBXYFQWmnXNf/nG4.Mm', 'Kleempendorp 69'),
(7, 'stef', 'de Feijter', '+32493483176', 9000, 'stef@gmail.com', '$2y$10$QjFb1WpgrgfGlPONQSwGeuibJYM2wXhRkSrEgO9iugIf/b0OjYNUW', 'Tarbotstraat 90'),
(8, 'RaÃ®f', 'Demirogullari', '+32419123664', 9000, 'Raif@lyceumgent.be', '$2y$10$juI7cZFDkWJjOAnKqG0QMeR8tmUJ52vx8kBl1O1SE0nxJUCngXwda', 'zalmstraat 23'),
(9, 'Emre', 'Guller', '+32448089258', 9000, 'emre@gmail.com', '$2y$10$2ZP4mHlBjIX8XCuTd3cJe.uCK3ivsb1cPEz7DOJQ290UHaeZSxrXO', 'kortrijksesteenweg 76'),
(10, 'Brend', 'Van Den Eynde', '+32469313419', 9000, 'brend@lyceumgent.be', '$2y$10$9fTARPcLFLdOs4mU3uQiTO279gJ0JQha1dqhhr9wlpvrJ4HaEShhu', 'Tarbotstraat 46'),
(11, 'Obi', 'Verheyen', '+32489110664', 9080, 'Obi@gmail.com', '$2y$10$UTi2LAN5o6GxdDAEXJvq6uxxPSN/X.IIRZfB1iMHuz6ncgUeaWjl6', 'Heidestraat 67'),
(12, 'ZoÃ«', 'van Merelbeke', '+32419123664', 9000, 'Zoe@gmail.com', '$2y$10$nGgq6N0zRaqna9RZQgKVSeNwzfwVFWlCfRqs0v3xjXZs/sOxZXlXu', 'lozevisserstraat 15'),
(13, 'Ian', 'verhangen', '+32489110664', 9000, 'ian@lyceumgent.be', '$2y$10$48mI9Tc2iX3PDJr24XUaguO1r7eSd/MqG5x9zkFzvmOA0zWWbppBG', 'magerstraat 34');

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
  MODIFY `klantnr` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
