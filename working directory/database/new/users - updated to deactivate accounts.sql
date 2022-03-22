-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Mar 22, 2022 at 07:31 PM
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
  `state` varchar(15) NOT NULL DEFAULT 'activated',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=27 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `fname`, `lname`, `email`, `nic`, `password`, `type`, `contact`, `address`, `state`) VALUES
(1, 'john', 'doe', 'johndoe@gmail.com', '00000000v', '$2y$10$.9ijnO9mVoCkJbDplR2Yd.oGljZbWAGeDbN7wDCMMhfPMFapCLe9e', NULL, NULL, NULL, 'activated'),
(2, 'jane', 'harris', 'j.harris@gmail.com', '00000001v', '$2y$10$2SyKefGSo30Ih0xCnspIuOvwiV7i7rlPiQrRbet6PRtzldH.0RPGi', NULL, NULL, NULL, 'activated'),
(3, 'harry', 'roberts', 'harry.r@gmail.com', '00000002v', '$2y$10$lZomA9e6Aq8dCoSdn0iI.eo4O/rWdqMW1CVS4ymPXc2CB6sl0uZO.', NULL, NULL, NULL, 'activated'),
(4, 'Kavisha', 'Perera', 'kavisha.g.perera@gmail.com', '997583323v', '$2y$10$aPet2R8Is481HfTPm2PhS.N7FUB9NeF81GzXEEhqfE3gvJQxVu3va', NULL, NULL, NULL, 'activated'),
(5, 'Tharindu ', 'Periris', 'tp@gmail.com', '947191028v', '$2y$10$IDenzfbXLPln9PdICEHAI.oh2C005N.WY1c7bNKedefZ35vLqZ/MK', NULL, NULL, NULL, 'activated'),
(6, 'Jane', 'Doe', 'jd@gmail.com', '817402365V', '$2y$10$S3t6qHaBY/nWITGx5/FYuuCXNMR1dRdKbAhsgaXonpF980moUWW2C', NULL, NULL, NULL, 'activated'),
(8, 'Sam', 'Doe', 'sd@gmail.com', '987402568v', '$2y$10$thw.iJW5asugmfJq9ZSe3u.Z4rjEt./wXNTqJnTL/AgPoGXzl1Zj6', 'manager', NULL, NULL, 'activated'),
(9, 'senuli', 'dissanayake', 'senuli@gmail.com', '996825475v', '$2y$10$thw.iJW5asugmfJq9ZSe3u.Z4rjEt./wXNTqJnTL/AgPoGXzl1Zj6', 'customer', NULL, NULL, 'deactivated'),
(10, 'monica', 'geller', 'mg@gmail.com', '8775693524v', '$2y$10$thw.iJW5asugmfJq9ZSe3u.Z4rjEt./wXNTqJnTL/AgPoGXzl1Zj6', 'admin', NULL, NULL, 'activated'),
(11, 'Joey', 'Tibbiani', 'admin@gmail.com', '945687898v', '$2y$10$3JIjmZkENji1SMb4hXV1TObo8hhB3HNpMuw3WM0W7MM6mnidnrgey', 'admin', NULL, NULL, 'activated'),
(12, 'john', 'jin', 'ij@gmail.com', '856479521v', '$2y$10$vExtPHV8IIwEHNQeLU.QLeXj0iHDdSzyII5tjtdbpoxRaXcBiIo7.', 'admin', NULL, NULL, 'activated'),
(13, 'Samuel', 'Den', 'samuel@gmail.com', '896547823v', '$2y$10$yhyICMrdPeHkL3GpkLDRT.uC6HlwVguhEKxkK51/.fxaEnN0v7Gk2', 'manager', NULL, NULL, 'activated'),
(14, 'Farah', 'Feathers', 'ft@gmail.com', '785694125v', '$2y$10$cCnoGlrdMi8z9pMI0z4.WO77g8LscuNnQFD7wnbvLxdLkqNzulp.q', 'customer', NULL, NULL, 'activated'),
(24, 'Dilki', 'Malsha', 'malsha@gmail.com', '96746582v', '$2y$10$blpoaoSirMoAjYTU4tFghedVgyTjHRGiJC9mVdQcg/k91IhRdyCEe', 'customer', '0773280420', '471/1, wijaya rd, mampe north, piliyandala', 'activated'),
(16, 'Joe', 'Jonas', 'jonas@gmail.com', '895642174v', '$2y$10$uKNOTNEzgbHXxf3AZN0Ftu8wlpF1sC0iaT5x1aqxKWvoRA0beczQe', 'cashier', NULL, NULL, 'activated'),
(17, 'john', 'Doe', 'john123@gmail.com', '817465365V', '$2y$10$BmnqiLaDLLXjuanfQ/zHCOXi3Ip3Nck/KJeqwWNk55ilFGtIn.1XS', 'manager', NULL, NULL, 'activated'),
(18, 'Nikky', 'Tibbiani', 'nikky@gmail.com', '926587415v', '$2y$10$cMDcXLfFd85SxTm/965Sgu3zu/2QTKH43/BdM9BxuddjCPY9Y5Ifa', 'cashier', NULL, NULL, 'activated'),
(19, 'Nikky', 'Jane', 'jane@gmail.com', '986547525v', '$2y$10$ajYtg9JZgdk0le6NdVg7leuv02YTaRrCjkYuUu9pg.YtN/e0THhHa', 'customer', NULL, NULL, 'activated'),
(20, 'Kavi', 'Smile', 'kavi@gmail.com', '996542185v', '$2y$10$sdCbST7G3wisxXC9cBGDIuL138koxK7MEbsuB1kkiyqXY.CtqVdfS', 'customer', '071234565', 'New town, hemswoth', 'activated'),
(21, 'Yash', 'd', 'yash@gmail.com', '996854214v', '$2y$10$qftpVIDlPzoObhd7YcvP6Oz8VgRqmyrl914ghxCgz7rOUyUYpKuoS', 'customer', NULL, NULL, 'activated'),
(22, 'female', 'non', 'non@gmail.com', '935684258v', '$2y$10$FISlLyGAENhmush4eoLI0esK3NpvFAXctILASTgfHIkvugOefLQaS', 'customer', NULL, NULL, 'activated'),
(23, 'Gimhani', 'Perera', 'gim@gmail.com', '888881111v', '$2y$10$wO/vfkeWBg.s2E9PQuRrAeWsLk383acB9zAiIpGPWmomkcMBDd/Fi', 'customer', '0763896314', '781, Highlevel Rd, Nugegoda', 'activated'),
(25, 'DiDi', 'Beth', 'didi96@gmail.com', '966883480v', '$2y$10$t7PCCusEbMx18vexjW0jruzkBkFFDhbR4w/eTEGhs3f7Uw3BN.L9e', 'customer', '0763896314', '471/1, wijaya rd, mampe north, piliyandala', 'activated'),
(26, 'Test', '1', 'test.deactivate@gmai.com', '964561028v', '$2y$10$1vJ76Nnr8V7Mm6fyxnDu0.t76u.v/3RTabaQCjBviOe1C0NS1ziRO', 'customer', NULL, NULL, 'deactivated');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
