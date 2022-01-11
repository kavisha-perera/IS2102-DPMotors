-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jan 11, 2022 at 03:42 AM
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
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `stock_code`) VALUES
(10, 'EOer'),
(9, 'EOer'),
(3, 'EOU-42'),
(4, 'EOU-42'),
(5, 'EOU-42'),
(6, 'EOU-42'),
(7, 'EOU-42'),
(8, 'EOU-42');

-- --------------------------------------------------------

--
-- Table structure for table `reservedforsale`
--

DROP TABLE IF EXISTS `reservedforsale`;
CREATE TABLE IF NOT EXISTS `reservedforsale` (
  `res_sale_id` int(10) NOT NULL AUTO_INCREMENT,
  `reservation_no` varchar(10) NOT NULL,
  `delivery_method` varchar(255) NOT NULL,
  `cus_name` varchar(255) NOT NULL,
  `cus_contact` varchar(255) NOT NULL,
  `cus_email` varchar(255) NOT NULL,
  `cus_address` varchar(255) NOT NULL,
  `due_date` date NOT NULL,
  `remarks` varchar(255) NOT NULL,
  PRIMARY KEY (`res_sale_id`),
  UNIQUE KEY `reservation_no` (`reservation_no`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `reservedforsale`
--

INSERT INTO `reservedforsale` (`res_sale_id`, `reservation_no`, `delivery_method`, `cus_name`, `cus_contact`, `cus_email`, `cus_address`, `due_date`, `remarks`) VALUES
(1, 'w234s', 'pick up', 'gimhani perera', '0763896314', 'gim@gmail.com', '-', '2022-01-08', 'none'),
(2, 'rrt246', 'delivery', 'gimhani perera', '0763896314', 'gim@gmail.com', '-', '2022-01-24', 'cash on delivery');

-- --------------------------------------------------------

--
-- Table structure for table `reserved_products`
--

DROP TABLE IF EXISTS `reserved_products`;
CREATE TABLE IF NOT EXISTS `reserved_products` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `reservation_no` varchar(10) NOT NULL,
  `p_code` varchar(10) NOT NULL,
  `quantity` int(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `reserved_products`
--

INSERT INTO `reserved_products` (`id`, `reservation_no`, `p_code`, `quantity`) VALUES
(1, 'w234s', 'EOer', 2),
(2, 'w234s', 'EOU-42', 5),
(4, 'w2335s', 'EOer', 5),
(5, 'w2335s', 'EOer', 5);

-- --------------------------------------------------------

--
-- Table structure for table `stock`
--

DROP TABLE IF EXISTS `stock`;
CREATE TABLE IF NOT EXISTS `stock` (
  `stock_id` int(10) NOT NULL AUTO_INCREMENT,
  `stock_code` varchar(10) NOT NULL,
  `catergory` varchar(10) NOT NULL,
  `p_name` varchar(255) NOT NULL,
  `p_brand` varchar(255) NOT NULL,
  `p_desc` varchar(255) NOT NULL,
  `p_size` varchar(255) NOT NULL,
  `selling_price` float NOT NULL,
  `supplier_no` varchar(10) NOT NULL,
  `p_image` varchar(255) NOT NULL,
  `p_keywords` text NOT NULL,
  PRIMARY KEY (`stock_id`),
  UNIQUE KEY `stock_code` (`stock_code`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `stock`
--

INSERT INTO `stock` (`stock_id`, `stock_code`, `catergory`, `p_name`, `p_brand`, `p_desc`, `p_size`, `selling_price`, `supplier_no`, `p_image`, `p_keywords`) VALUES
(2, 'EOU-42', 'EO', 'LUBRICANT', 'KSX BRAND', 'KSX CRAZY LUBRICANTS', '500 ML', 500.5, 'S-9', '1Mp_8HCIifZ-Mjfo07TtmqZknIWNZVnPO', 'oil\r\nengine oil\r\nlubricant'),
(3, 'DX-42', 'DX', 'eafdsfd', 'efadfda', 'afafdfqdfqdfq', '100ml', 0, 'S-9', '', ''),
(4, 'EO-07', 'EO', 'efedeerer', 'erqerqerqer', 'erqerqer', 'qerqerqer', 980, '', '', ''),
(5, 'EOer', 'EO', 'efedeerer', 'erqerqerqer', 'erqerqer', 'qerqerqer', 980, '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `fname` varchar(255) NOT NULL,
  `lname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `nic` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `type` varchar(100) DEFAULT NULL,
  `contact` text,
  `address` text,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=24 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `fname`, `lname`, `email`, `nic`, `password`, `type`, `contact`, `address`) VALUES
(1, 'john', 'doe', 'johndoe@gmail.com', '00000000v', '$2y$10$.9ijnO9mVoCkJbDplR2Yd.oGljZbWAGeDbN7wDCMMhfPMFapCLe9e', NULL, NULL, NULL),
(2, 'jane', 'harris', 'j.harris@gmail.com', '00000001v', '$2y$10$2SyKefGSo30Ih0xCnspIuOvwiV7i7rlPiQrRbet6PRtzldH.0RPGi', NULL, NULL, NULL),
(3, 'harry', 'roberts', 'harry.r@gmail.com', '00000002v', '$2y$10$lZomA9e6Aq8dCoSdn0iI.eo4O/rWdqMW1CVS4ymPXc2CB6sl0uZO.', NULL, NULL, NULL),
(4, 'Kavisha', 'Perera', 'kavisha.g.perera@gmail.com', '997583323v', '$2y$10$aPet2R8Is481HfTPm2PhS.N7FUB9NeF81GzXEEhqfE3gvJQxVu3va', NULL, NULL, NULL),
(5, 'Tharindu ', 'Periris', 'tp@gmail.com', '947191028v', '$2y$10$IDenzfbXLPln9PdICEHAI.oh2C005N.WY1c7bNKedefZ35vLqZ/MK', NULL, NULL, NULL),
(6, 'Jane', 'Doe', 'jd@gmail.com', '817402365V', '$2y$10$S3t6qHaBY/nWITGx5/FYuuCXNMR1dRdKbAhsgaXonpF980moUWW2C', NULL, NULL, NULL),
(8, 'Sam', 'Doe', 'sd@gmail.com', '987402568v', '$2y$10$thw.iJW5asugmfJq9ZSe3u.Z4rjEt./wXNTqJnTL/AgPoGXzl1Zj6', 'manager', NULL, NULL),
(9, 'senuli', 'dissanayake', 'senuli@gmail.com', '996825475v', '$2y$10$thw.iJW5asugmfJq9ZSe3u.Z4rjEt./wXNTqJnTL/AgPoGXzl1Zj6', 'customer', NULL, NULL),
(10, 'monica', 'geller', 'mg@gmail.com', '8775693524v', '$2y$10$thw.iJW5asugmfJq9ZSe3u.Z4rjEt./wXNTqJnTL/AgPoGXzl1Zj6', 'admin', NULL, NULL),
(11, 'Joey', 'Tibbiani', 'admin@gmail.com', '945687898v', '$2y$10$3JIjmZkENji1SMb4hXV1TObo8hhB3HNpMuw3WM0W7MM6mnidnrgey', 'admin', NULL, NULL),
(12, 'john', 'jin', 'ij@gmail.com', '856479521v', '$2y$10$vExtPHV8IIwEHNQeLU.QLeXj0iHDdSzyII5tjtdbpoxRaXcBiIo7.', 'admin', NULL, NULL),
(13, 'Samuel', 'Den', 'samuel@gmail.com', '896547823v', '$2y$10$yhyICMrdPeHkL3GpkLDRT.uC6HlwVguhEKxkK51/.fxaEnN0v7Gk2', 'manager', NULL, NULL),
(14, 'Farah', 'Feathers', 'ft@gmail.com', '785694125v', '$2y$10$cCnoGlrdMi8z9pMI0z4.WO77g8LscuNnQFD7wnbvLxdLkqNzulp.q', 'customer', NULL, NULL),
(16, 'Joe', 'Jonas', 'jonas@gmail.com', '895642174v', '$2y$10$uKNOTNEzgbHXxf3AZN0Ftu8wlpF1sC0iaT5x1aqxKWvoRA0beczQe', 'cashier', NULL, NULL),
(17, 'john', 'Doe', 'john123@gmail.com', '817465365V', '$2y$10$BmnqiLaDLLXjuanfQ/zHCOXi3Ip3Nck/KJeqwWNk55ilFGtIn.1XS', 'manager', NULL, NULL),
(18, 'Nikky', 'Tibbiani', 'nikky@gmail.com', '926587415v', '$2y$10$cMDcXLfFd85SxTm/965Sgu3zu/2QTKH43/BdM9BxuddjCPY9Y5Ifa', 'cashier', NULL, NULL),
(19, 'Nikky', 'Jane', 'jane@gmail.com', '986547525v', '$2y$10$ajYtg9JZgdk0le6NdVg7leuv02YTaRrCjkYuUu9pg.YtN/e0THhHa', 'customer', NULL, NULL),
(20, 'Kavi', 'Smile', 'kavi@gmail.com', '996542185v', '$2y$10$sdCbST7G3wisxXC9cBGDIuL138koxK7MEbsuB1kkiyqXY.CtqVdfS', 'customer', '071234565', 'New town, hemswoth'),
(21, 'Yash', 'd', 'yash@gmail.com', '996854214v', '$2y$10$qftpVIDlPzoObhd7YcvP6Oz8VgRqmyrl914ghxCgz7rOUyUYpKuoS', 'customer', NULL, NULL),
(22, 'female', 'non', 'non@gmail.com', '935684258v', '$2y$10$FISlLyGAENhmush4eoLI0esK3NpvFAXctILASTgfHIkvugOefLQaS', 'customer', NULL, NULL),
(23, 'Gimhani', 'Perera', 'gim@gmail.com', '888881111v', '$2y$10$wO/vfkeWBg.s2E9PQuRrAeWsLk383acB9zAiIpGPWmomkcMBDd/Fi', 'customer', '0763896314', '781, Highlevel Rd, Nugegoda');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
