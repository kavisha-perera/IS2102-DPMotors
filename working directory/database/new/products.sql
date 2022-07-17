-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Mar 28, 2022 at 09:17 PM
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
-- Table structure for table `products`
--

DROP TABLE IF EXISTS `products`;
CREATE TABLE IF NOT EXISTS `products` (
  `product_id` int(10) NOT NULL AUTO_INCREMENT,
  `stock_code` varchar(255) NOT NULL,
  PRIMARY KEY (`product_id`)
) ENGINE=MyISAM AUTO_INCREMENT=33 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `stock_code`) VALUES
(1, 'Oil-1'),
(2, 'Oil-1'),
(3, 'Oil-3'),
(4, 'Oil-3'),
(5, 'Oil-3'),
(6, 'GL-02'),
(7, 'GL-02'),
(8, 'GL-02'),
(9, 'GL-02'),
(10, 'GL-04'),
(11, 'GL-04'),
(12, 'AD-01'),
(13, 'AD-01'),
(14, 'AD-01'),
(15, 'AD-01'),
(16, 'AD-01'),
(17, 'P-1'),
(18, 'P-1'),
(19, 'P-1'),
(20, 'P-1'),
(21, 'P-1'),
(22, 'SP-3'),
(23, 'SP-3'),
(24, 'SP-3'),
(25, 'P-3'),
(26, 'P-3'),
(27, 'P-3'),
(28, 'P-3'),
(29, 'P-3'),
(30, 'P-3'),
(31, 'P-3'),
(32, 'P-3');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
