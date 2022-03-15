-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Mar 15, 2022 at 08:01 PM
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
-- Table structure for table `vehicleservicerecords`
--

DROP TABLE IF EXISTS `vehicleservicerecords`;
CREATE TABLE IF NOT EXISTS `vehicleservicerecords` (
  `id` int(25) NOT NULL AUTO_INCREMENT,
  `serviceNo` varchar(25) NOT NULL,
  `customerEmail` varchar(255) NOT NULL,
  `vehicleNo` varchar(10) NOT NULL,
  `dateOfService` date NOT NULL,
  `milage` int(25) NOT NULL,
  `engineOil` varchar(25) DEFAULT NULL COMMENT '- , Top Up, Re-fill',
  `gearOil` varchar(25) DEFAULT NULL COMMENT '- , Top Up, Re-fill',
  `A/Cfilter` varchar(25) DEFAULT NULL COMMENT '- , Clean, Replace',
  `oilFilter` varchar(25) DEFAULT NULL COMMENT '- , change',
  `ATFoil` varchar(25) DEFAULT NULL COMMENT '- , Top Up, Re-fill',
  `coolant` varchar(25) DEFAULT NULL COMMENT '- , Top Up, Re-fill',
  `airFilter` varchar(25) DEFAULT NULL COMMENT '- , Clean, Replace',
  `nextServiceDate` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `vehicleservicerecords`
--

INSERT INTO `vehicleservicerecords` (`id`, `serviceNo`, `customerEmail`, `vehicleNo`, `dateOfService`, `milage`, `engineOil`, `gearOil`, `A/Cfilter`, `oilFilter`, `ATFoil`, `coolant`, `airFilter`, `nextServiceDate`) VALUES
(1, 's1', 'malsha@gmail.com', 'CAO-3549', '2022-01-20', 17228, 'ReFill', '-', 'Clean', 'Change', '-', '-', 'Clean', '2022-03-15'),
(2, 's2', 'malsha@gmail.com', 'CX-3249', '2022-03-24', 22318, 'Top Up', '-', 'Clean', 'Change', '-', '-', 'Clean', '2022-06-18');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
