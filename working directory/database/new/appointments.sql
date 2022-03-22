-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Mar 22, 2022 at 02:25 PM
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
-- Database: `is2102`
--

-- --------------------------------------------------------

--
-- Table structure for table `appointments`
--

DROP TABLE IF EXISTS `appointments`;
CREATE TABLE IF NOT EXISTS `appointments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `scheduleId` int(25) NOT NULL,
  `date` text NOT NULL,
  `timeslot` text NOT NULL,
  `serviceType` varchar(255) NOT NULL,
  `vehicleNo` varchar(255) NOT NULL,
  `vehicleType` varchar(255) NOT NULL,
  `fname` varchar(255) NOT NULL,
  `lname` varchar(255) NOT NULL,
  `contact` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `state` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=30 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `appointments`
--

INSERT INTO `appointments` (`id`, `scheduleId`, `date`, `timeslot`, `serviceType`, `vehicleNo`, `vehicleType`, `fname`, `lname`, `contact`, `email`, `state`) VALUES
(28, 72, '2022-03-27', '11', 'Maintainace & Repair', 'WQ 3487', 'Nissan March', 'Dilki', 'Malsha', '0773280420', 'malsha@gmail.com', 'pending'),
(27, 73, '2022-03-22', '15', 'Car Wash & Full Service', 'KA 5934', 'Nissan March', 'Dilki', 'Malsha', '0773280420', 'malsha@gmail.com', 'completed');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
