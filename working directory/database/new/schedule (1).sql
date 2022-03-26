-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Mar 25, 2022 at 05:01 AM
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
) ENGINE=MyISAM AUTO_INCREMENT=131 DEFAULT CHARSET=latin1;

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
(67, '2022-03-26', 8, 'booked'),
(68, '2022-03-26', 11, 'open'),
(69, '2022-03-26', 15, 'open'),
(70, '2022-03-26', 13, 'open'),
(71, '2022-03-27', 8, 'open'),
(77, '2022-03-27', 11, 'open'),
(78, '2022-03-28', 8, 'open'),
(79, '2022-03-28', 11, 'open'),
(80, '2022-03-28', 13, 'open'),
(81, '2022-03-28', 15, 'open'),
(82, '2022-03-29', 8, 'open'),
(83, '2022-03-29', 11, 'open'),
(84, '2022-03-29', 13, 'open'),
(85, '2022-03-29', 15, 'open'),
(86, '2022-03-30', 8, 'open'),
(87, '2022-03-30', 13, 'open'),
(88, '2022-03-30', 11, 'open'),
(89, '2022-03-30', 15, 'open'),
(90, '2022-03-31', 8, 'open'),
(91, '2022-03-31', 11, 'open'),
(92, '2022-03-31', 13, 'open'),
(93, '2022-03-31', 15, 'open'),
(94, '2022-04-01', 8, 'open'),
(95, '2022-04-01', 11, 'open'),
(96, '2022-04-01', 13, 'open'),
(97, '2022-04-01', 15, 'open'),
(98, '2022-04-02', 8, 'open'),
(99, '2022-04-02', 11, 'open'),
(100, '2022-04-02', 13, 'open'),
(101, '2022-04-02', 15, 'open'),
(102, '2022-04-03', 8, 'open'),
(103, '2022-04-03', 11, 'open'),
(104, '2022-04-03', 13, 'open'),
(105, '2022-04-03', 15, 'open'),
(106, '2022-04-04', 8, 'open'),
(107, '2022-04-04', 11, 'open'),
(108, '2022-04-04', 13, 'open'),
(109, '2022-04-04', 15, 'open'),
(110, '2022-04-05', 8, 'open'),
(111, '2022-04-05', 11, 'open'),
(112, '2022-04-05', 13, 'open'),
(113, '2022-04-05', 15, 'open'),
(116, '2022-04-06', 8, 'open'),
(115, '2022-04-06', 11, 'open'),
(117, '2022-04-06', 13, 'open'),
(118, '2022-04-06', 15, 'open'),
(119, '2022-04-07', 8, 'open'),
(120, '2022-04-07', 11, 'open'),
(121, '2022-04-07', 13, 'open'),
(122, '2022-04-07', 15, 'open'),
(123, '2022-04-08', 8, 'open'),
(124, '2022-04-08', 11, 'open'),
(125, '2022-04-08', 13, 'open'),
(126, '2022-04-08', 15, 'open'),
(127, '2022-04-09', 8, 'open'),
(128, '2022-04-09', 11, 'open'),
(129, '2022-04-09', 13, 'open'),
(130, '2022-04-09', 15, 'open');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
