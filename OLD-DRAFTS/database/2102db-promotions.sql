-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Oct 23, 2021 at 05:59 AM
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

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

DROP TABLE IF EXISTS `employee`;
CREATE TABLE IF NOT EXISTS `employee` (
  `empno` int(10) NOT NULL AUTO_INCREMENT,
  `nic` varchar(12) NOT NULL,
  `designation` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `contact` int(10) NOT NULL,
  `fname` varchar(255) NOT NULL,
  `lname` varchar(255) NOT NULL,
  PRIMARY KEY (`empno`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`empno`, `nic`, `designation`, `address`, `contact`, `fname`, `lname`) VALUES
(1, '9886754569', 'Technician', '165,Alawwa', 745678989, 'Thushara', 'Perera'),
(2, '9785643562', 'Mechanic', '16,Colombo 07', 713456789, 'Malinda', 'Wijesinghe'),
(3, '9678905436', 'Supervisor', '15,Piliyandala', 764567890, 'Chanaka', 'Liyanage'),
(8, '000000004v', 'mechanic', 'colombo', 34242443, 'John', 'Wilson');

-- --------------------------------------------------------

--
-- Table structure for table `promotions`
--

DROP TABLE IF EXISTS `promotions`;
CREATE TABLE IF NOT EXISTS `promotions` (
  `promoNo` int(10) NOT NULL AUTO_INCREMENT,
  `description` varchar(255) NOT NULL,
  `code` varchar(255) NOT NULL,
  `validtill` text NOT NULL,
  `promoState` varchar(255) NOT NULL,
  PRIMARY KEY (`promoNo`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `promotions`
--

INSERT INTO `promotions` (`promoNo`, `description`, `code`, `validtill`, `promoState`) VALUES
(1, 'get free car wash with every full service this december!', 'carwash', '01st to 31st december 2021', 'inactive'),
(2, 'buy one get one free', 'one2one', '31st novemeber 2021', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `prreservationsale`
--

DROP TABLE IF EXISTS `prreservationsale`;
CREATE TABLE IF NOT EXISTS `prreservationsale` (
  `prno` int(10) NOT NULL AUTO_INCREMENT,
  `fname` varchar(255) NOT NULL,
  `lname` varchar(255) NOT NULL,
  `contact` varchar(10) NOT NULL,
  `address` varchar(255) NOT NULL,
  `pid` int(10) NOT NULL,
  `prname` varchar(255) NOT NULL,
  `quantity` int(100) NOT NULL,
  `deliverydatetime` date NOT NULL,
  `deliverymethod` varchar(255) NOT NULL,
  PRIMARY KEY (`prno`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `prreservationsale`
--

INSERT INTO `prreservationsale` (`prno`, `fname`, `lname`, `contact`, `address`, `pid`, `prname`, `quantity`, `deliverydatetime`, `deliverymethod`) VALUES
(1, 'Lalitha', 'Mendis', '0765647890', '56,Kiribathgoda', 1, 'Oil', 2, '2021-10-12', 'Courier'),
(2, 'Jayantha', 'Almeda', '0785678901', '20/5,Colombo 02.', 2, 'Car Tires', 2, '2021-10-15', 'By visiting store');

-- --------------------------------------------------------

--
-- Table structure for table `servicerecord`
--

DROP TABLE IF EXISTS `servicerecord`;
CREATE TABLE IF NOT EXISTS `servicerecord` (
  `serviceNo` int(10) NOT NULL AUTO_INCREMENT,
  `serviceDate` date NOT NULL,
  `serviceType` varchar(255) NOT NULL,
  `cusNIC` varchar(25) NOT NULL,
  `cusEmail` varchar(255) NOT NULL,
  `vehicleNo` varchar(255) NOT NULL,
  `vehicleModel` varchar(255) DEFAULT NULL,
  `mechanicName` varchar(255) DEFAULT NULL,
  `description` varchar(255) NOT NULL,
  PRIMARY KEY (`serviceNo`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `supplier`
--

DROP TABLE IF EXISTS `supplier`;
CREATE TABLE IF NOT EXISTS `supplier` (
  `supplierno` int(10) NOT NULL AUTO_INCREMENT,
  `saddress` varchar(255) NOT NULL,
  `contact` int(10) NOT NULL,
  `salespersonname` varchar(255) NOT NULL,
  `suppliercompany` varchar(255) NOT NULL,
  PRIMARY KEY (`supplierno`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `supplier`
--

INSERT INTO `supplier` (`supplierno`, `saddress`, `contact`, `salespersonname`, `suppliercompany`) VALUES
(1, '12,Kottawa,Colombo', 76567897, 'Alwis Perera', 'Sun (Pvt) Ltd.'),
(2, 'Warakapola', 375689067, 'Jayasena ', 'Moon Company'),
(3, 'Felt', 1234567890, 'Nona', 'ama'),
(4, 'Bandarawela', 1234567890, 'Nalaka', 'Motor Garage');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
