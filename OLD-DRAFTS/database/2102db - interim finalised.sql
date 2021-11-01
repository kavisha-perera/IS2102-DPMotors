-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Oct 24, 2021 at 07:15 AM
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
  `employeeid` varchar(100) DEFAULT NULL,
  `type` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=27 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`id`, `fname`, `lname`, `email`, `nic`, `contact`, `address`, `password`, `employeeid`, `type`) VALUES
(1, 'John', 'Doe', 'johndoe@gmail.com', '000000000v', NULL, NULL, '$2y$10$SmEhmloTmzmwh8VaukMVieyRsbURhCLNCG4VmWxJfVLlioBvhcv0m', NULL, 'customer'),
(2, 'John', 'Doe', 'johndoe@gmail.com', '000000000v', NULL, NULL, '$2y$10$j5JCAG8jBmt.ws7YxMm6OuIFH1JSfJg4MKgjWWDaxWh0p9QKtAGP2', NULL, 'customer'),
(3, 'Janet', 'Wilson', 'wilson.j@gmail.com', '000000001v', NULL, NULL, '$2y$10$9fTvgFjwEbDG95NC4iFuPe5lwlruDT1810yyyWeuxnbPMCsiM.I2m', NULL, 'customer'),
(4, 'Charles', 'Boyle', 'c.boyle@gmail.com', '000000002v', NULL, NULL, '$2y$10$PE1wON855EMMRT8yih09Z.fw5IJcEQhoknd12RcYSno593zXHm4PS', NULL, 'customer'),
(5, 'Amy', 'Santiago', 'amy.santiago@gmail.com', '000000003v', NULL, NULL, '$2y$10$6X2R7qa5lfyx4/2f0Jm.UuDiUPAXQJBFnGC0LoJLdJpa4NpWM4q/e', NULL, 'customer'),
(8, 'john', 'doe', 'jd@gmail.com', '817402365V', NULL, NULL, '$2y$10$6KSwyzE5Om5twCyC3Jvf9OdWDV2i2vGo6ZOGLbPwF2vBvRtc8HE0e', NULL, NULL),
(9, 'janu', 'dissa`', 'janu@gmail.com', '817402365V', NULL, NULL, '$2y$10$7baJobyNz35iIHAoiHEO0.XwRmrrggU42YCetOTJVhxYkmrlcpgm6', NULL, 'customer'),
(11, 'Rosa', 'Diaz', 'diaz@gmail.com', '6545789521v', 715245356, 'new town, kandy', '$2y$10$QR5N7zWGb80nHDhrpHij9uH2gix0nKlw2v7kWK5NFNA7n16PA19DK', 'D456', 'cashier'),
(12, 'Jess', 'Gomez', 'jess@gmail.com', '6545789521v', 715245356, 'new town, galle', '$2y$10$QR5N7zWGb80nHDhrpHij9uH2gix0nKlw2v7kWK5NFNA7n16PA19DK', 'J456', 'admin'),
(10, 'Janani', 'Dissanayake', 'manager@gmail.com', '997402898v', 716241327, 'Mihintale,Anuradhapura', '$2y$10$QR5N7zWGb80nHDhrpHij9uH2gix0nKlw2v7kWK5NFNA7n16PA19DK', 'MJ221', 'manager'),
(13, 'Sewmini', 'Senevirathne', 'admin@gmail.com', '20007402898', 716241327, 'UCSC,UOC', '$2y$10$QR5N7zWGb80nHDhrpHij9uH2gix0nKlw2v7kWK5NFNA7n16PA19DK', 'AS221', 'admin'),
(14, 'Tharushi', 'Algama', 'cashier@gmail.com', '997401365v', 716241327, 'Kurunegala', '$2y$10$QR5N7zWGb80nHDhrpHij9uH2gix0nKlw2v7kWK5NFNA7n16PA19DK', 'CT221', 'cashier'),
(15, 'katu', 'pulu', 'dileep@wso2.com', '45646546v', NULL, NULL, '$2y$10$RY8jX58Wxk0rdHyxAsRW6evq2gr932r6scKYcipGw71maxcX8SJNu', '214412', 'manager'),
(16, 'senuli', 'yunaya', 'sy@gmail.com', '921203195v', NULL, NULL, '$2y$10$Cu/QWh/b/UKfvqDmvl.67.I5xouAZSElHMqdu7a4y0dYPihMeSjo2', 'MS8932', 'manager'),
(17, 'Jen', 'Lisa', 'jl@gmail.com', '921203195v', NULL, NULL, '$2y$10$DcISvf8AIUBYG7avUJ/8XO4FUM6Dtr/njh/Zr0fcukrOVMFhx4FIa', NULL, 'customer'),
(18, 'Patrick', 'Jane', 'pj@gmail.com', '45646546v', NULL, NULL, '$2y$10$qL7mdYbkqgH5climofmgJuqjpH1hr23JKxvptWIP3//tSnzkSiwJS', 'AP657', 'admin'),
(19, 'Kavisha', 'Perera', 'customer@gmail.com', '997402365V', NULL, NULL, '$2y$10$vhCzGfgT25UEpsvCISDQqu2hEQTLEqXJGE.JseZyFsKxwWCFTsbte', 'CK789', 'customer'),
(20, 'Len', 'Gi', 'lg@gmail.com', '817402365V', NULL, NULL, '$2y$10$zGd/FQe/A5Jucua2Ta99ROn/y.9Ls8y9RyA7I/DCqGRwtN82lSZVC', 'CL546', 'cashier'),
(21, 'john', 'yunaya', 'admin@gmail.com', '921203195v', NULL, NULL, '$2y$10$q3PTyNwDh1cCBduJz5G1VeoVZHFCauvw5460P/cmqG.D0KPEzLBd.', NULL, 'customer'),
(22, 'John', 'Boyle', 'john.b@gmail.com', '000000003v', NULL, NULL, '$2y$10$icSgPvnRI90rE1a2bMdQvONufN5WakqEvwa6ztpX5tvzwXPFOpRNC', 'A3354', 'admin'),
(23, 'John', 'Wilson', '123@gmail.com', 'efwefewfwer', NULL, NULL, '$2y$10$Tybvi.G.WYy2JyuF0ZX15O2CJ9Q9abLAXSsSvtUb4yYH/wGnXmrZO', NULL, 'customer'),
(24, 'John', 'Wilson', '1234@gmail.com', '000000234v', NULL, NULL, '$2y$10$MwZD2oXas4QEYcJKWSkJ6uAsZdLlsG59RqQ/OMjuD8NIesj9y8AI2', NULL, 'customer'),
(25, 'John', 'Wilson', '1235@gmail.com', '000000234v', NULL, NULL, '$2y$10$Xz0BfaUtRQG/.v.NXmB3fOY7ByTqBuUmZ0jhSmTNDcqBPWkubOwnC', NULL, 'customer'),
(26, 'John', 'Doe', 'johndoe@gmail.com', 'qrqre', NULL, NULL, '$2y$10$GneQyXOF.ZfBUOmIwyhQ1uZ1urDdz20H6TxxCWbmPgv1.ODOI.yPq', NULL, 'customer');

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
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`empno`, `nic`, `designation`, `address`, `contact`, `fname`, `lname`) VALUES
(1, '9886754569', 'Technician', '165,Alawwa', 745678989, 'Thushara', 'Perera'),
(2, '9785643562', 'Mechanic', '16,Colombo 07', 713456789, 'Malinda', 'Wijesinghe'),
(3, '9678905436', 'Supervisor', '15,Piliyandala', 764567890, 'Chanaka', 'Liyanage'),
(8, '000000004v', 'mechanic', 'colombo', 34242443, 'John', 'Wilson'),
(9, '000000002v', 'mechanic', 'colombo', 34242443, 'Darrel', 'Wilson');

-- --------------------------------------------------------

--
-- Table structure for table `promotions`
--

DROP TABLE IF EXISTS `promotions`;
CREATE TABLE IF NOT EXISTS `promotions` (
  `promoNo` int(10) NOT NULL AUTO_INCREMENT,
  `descrip` varchar(255) NOT NULL,
  `code` varchar(255) NOT NULL,
  `validtill` text NOT NULL,
  `promoState` varchar(255) NOT NULL,
  PRIMARY KEY (`promoNo`)
) ENGINE=MyISAM AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `promotions`
--

INSERT INTO `promotions` (`promoNo`, `descrip`, `code`, `validtill`, `promoState`) VALUES
(13, 'free car wash with every vehicle service this November', 'Nov-Deal', '01- 30th Nov 2021', 'Inactive'),
(12, 'buy one get one', 'Oct-Deal', '31st oct 2021', 'Active'),
(11, 'get labour charges off on all services this april', 'avurudhuDeal', '01- 30th April 2022', 'Inactive');

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
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;

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
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `servicerecord`
--

INSERT INTO `servicerecord` (`serviceNo`, `serviceDate`, `serviceType`, `cusNIC`, `cusEmail`, `vehicleNo`, `vehicleModel`, `mechanicName`, `description`) VALUES
(7, '2021-10-23', 'Interior Detailing', '00000000v', 'johndoe@gmail.com', 'CKF-3990', 'Nissan Leaf', 'mark', ' -'),
(6, '2021-10-21', 'full service', '000001220v', 'johndoe@gmail.com', 'CKF-3990', 'Nissan Leaf', 'mark', ' Engine check included'),
(5, '2021-10-24', 'Car wash', '00000000v', 'amy.santiago@gmail.com', 'KO-3990', 'toyota corolla', 'darry', ' Normal car wash');

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
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `supplier`
--

INSERT INTO `supplier` (`supplierno`, `saddress`, `contact`, `salespersonname`, `suppliercompany`) VALUES
(1, '12,Kottawa,Colombo', 76567897, 'Alwis Perera', 'Sun (Pvt) Ltd.'),
(2, 'Warakapola', 375689067, 'Jayasena ', 'Moon Company'),
(4, 'Bandarawela', 1234567890, 'Nalaka', 'Motor Garage');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
