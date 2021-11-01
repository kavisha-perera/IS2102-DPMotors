-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Oct 20, 2021 at 01:39 PM
-- Server version: 5.7.31
-- PHP Version: 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `2102db`
--

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

DROP TABLE IF EXISTS `customer`;
CREATE TABLE IF NOT EXISTS `customer` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `fname` varchar(255) NOT NULL,
  `lname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `nic` varchar(255) NOT NULL,
  `contact` int(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`id`, `fname`, `lname`, `email`, `nic`, `contact`, `address`, `password`) VALUES
(1, 'John', 'Doe', 'johndoe@gmail.com', '000000000v', NULL, NULL, '$2y$10$SmEhmloTmzmwh8VaukMVieyRsbURhCLNCG4VmWxJfVLlioBvhcv0m'),
(2, 'John', 'Doe', 'johndoe@gmail.com', '000000000v', NULL, NULL, '$2y$10$j5JCAG8jBmt.ws7YxMm6OuIFH1JSfJg4MKgjWWDaxWh0p9QKtAGP2'),
(3, 'Janet', 'Wilson', 'wilson.j@gmail.com', '000000001v', NULL, NULL, '$2y$10$9fTvgFjwEbDG95NC4iFuPe5lwlruDT1810yyyWeuxnbPMCsiM.I2m'),
(4, 'Charles', 'Boyle', 'c.boyle@gmail.com', '000000002v', NULL, NULL, '$2y$10$PE1wON855EMMRT8yih09Z.fw5IJcEQhoknd12RcYSno593zXHm4PS'),
(5, 'Amy', 'Santiago', 'amy.santiago@gmail.com', '000000003v', NULL, NULL, '$2y$10$6X2R7qa5lfyx4/2f0Jm.UuDiUPAXQJBFnGC0LoJLdJpa4NpWM4q/e');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
