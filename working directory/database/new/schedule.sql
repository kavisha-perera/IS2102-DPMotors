-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Mar 22, 2022 at 02:26 PM
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
-- Table structure for table `schedule`
--

DROP TABLE IF EXISTS `schedule`;
CREATE TABLE IF NOT EXISTS `schedule` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `date` date NOT NULL,
  `timeslot` int(10) NOT NULL,
  `state` varchar(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=77 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `schedule`
--

INSERT INTO `schedule` (`id`, `date`, `timeslot`, `state`) VALUES
(75, '2022-03-27', 15, 'open'),
(74, '2022-03-27', 13, 'open'),
(50, '2022-03-23', 8, 'open'),
(47, '2022-03-22', 8, 'open'),
(48, '2022-03-22', 11, 'open'),
(49, '2022-03-22', 13, 'open'),
(65, '2022-03-25', 13, 'open'),
(56, '2022-03-23', 13, 'open'),
(52, '2022-03-23', 11, 'open'),
(73, '2022-03-22', 15, 'booked'),
(64, '2022-03-25', 11, 'open'),
(57, '2022-03-23', 15, 'open'),
(58, '2022-03-24', 8, 'open'),
(59, '2022-03-24', 11, 'open'),
(60, '2022-03-24', 13, 'open'),
(61, '2022-03-24', 15, 'open'),
(66, '2022-03-25', 15, 'open'),
(63, '2022-03-25', 8, 'open'),
(67, '2022-03-26', 8, 'open'),
(68, '2022-03-26', 11, 'open'),
(69, '2022-03-26', 15, 'open'),
(70, '2022-03-26', 13, 'open'),
(71, '2022-03-27', 8, 'open');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
