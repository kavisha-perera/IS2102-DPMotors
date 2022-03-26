-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 25, 2022 at 08:41 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.0

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

CREATE TABLE `users` (
  `id` int(10) NOT NULL,
  `fname` varchar(255) NOT NULL,
  `lname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `nic` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `type` varchar(100) DEFAULT NULL,
  `contact` text DEFAULT NULL,
  `address` text DEFAULT NULL,
  `state` varchar(15) NOT NULL DEFAULT 'activated',
  `code` varchar(100) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `fname`, `lname`, `email`, `nic`, `password`, `type`, `contact`, `address`, `state`, `code`) VALUES
(1, 'john', 'doe', 'johndoe@gmail.com', '00000000v', '$2y$10$.9ijnO9mVoCkJbDplR2Yd.oGljZbWAGeDbN7wDCMMhfPMFapCLe9e', 'customer', NULL, NULL, 'activated', NULL),
(2, 'jane', 'harris', 'j.harris@gmail.com', '00000001v', '$2y$10$2SyKefGSo30Ih0xCnspIuOvwiV7i7rlPiQrRbet6PRtzldH.0RPGi', 'customer', NULL, NULL, 'activated', NULL),
(3, 'Harry', 'roberts', 'harry.r@gmail.com', '00000002v', '$2y$10$lZomA9e6Aq8dCoSdn0iI.eo4O/rWdqMW1CVS4ymPXc2CB6sl0uZO.', 'customer', NULL, NULL, 'activated', NULL),
(4, 'Kavisha', 'Perera', 'kavisha.g.perera@gmail.com', '997583323v', '$2y$10$aPet2R8Is481HfTPm2PhS.N7FUB9NeF81GzXEEhqfE3gvJQxVu3va', 'customer', NULL, NULL, 'activated', NULL),
(5, 'Tharindu ', 'Periris', 'tp@gmail.com', '947191028v', '$2y$10$IDenzfbXLPln9PdICEHAI.oh2C005N.WY1c7bNKedefZ35vLqZ/MK', 'customer', NULL, NULL, 'activated', NULL),
(6, 'Jane', 'Doe', 'jd@gmail.com', '817402365V', '$2y$10$S3t6qHaBY/nWITGx5/FYuuCXNMR1dRdKbAhsgaXonpF980moUWW2C', 'customer', NULL, NULL, 'activated', NULL),
(8, 'Sam', 'Doe', 'sd@gmail.com', '987402568v', '$2y$10$thw.iJW5asugmfJq9ZSe3u.Z4rjEt./wXNTqJnTL/AgPoGXzl1Zj6', 'manager', NULL, NULL, 'activated', NULL),
(9, 'senuli', 'dissanayake', 'senuli@gmail.com', '996825475v', '$2y$10$thw.iJW5asugmfJq9ZSe3u.Z4rjEt./wXNTqJnTL/AgPoGXzl1Zj6', 'customer', NULL, NULL, 'deactivated', NULL),
(10, 'monica', 'geller', 'mg@gmail.com', '8775693524v', '$2y$10$thw.iJW5asugmfJq9ZSe3u.Z4rjEt./wXNTqJnTL/AgPoGXzl1Zj6', 'admin', NULL, NULL, 'activated', NULL),
(11, 'Joey', 'Tibbiani', 'admin@gmail.com', '945687898v', '$2y$10$3JIjmZkENji1SMb4hXV1TObo8hhB3HNpMuw3WM0W7MM6mnidnrgey', 'admin', NULL, NULL, 'activated', NULL),
(12, 'john', 'jin', 'ij@gmail.com', '856479521v', '$2y$10$vExtPHV8IIwEHNQeLU.QLeXj0iHDdSzyII5tjtdbpoxRaXcBiIo7.', 'admin', NULL, NULL, 'activated', NULL),
(13, 'Samuel', 'Den', 'samuel@gmail.com', '896547823v', '$2y$10$yhyICMrdPeHkL3GpkLDRT.uC6HlwVguhEKxkK51/.fxaEnN0v7Gk2', 'manager', NULL, NULL, 'activated', NULL),
(14, 'Farah', 'Feathers', 'ft@gmail.com', '785694125v', '$2y$10$cCnoGlrdMi8z9pMI0z4.WO77g8LscuNnQFD7wnbvLxdLkqNzulp.q', 'customer', NULL, NULL, 'activated', NULL),
(24, 'Dilki', 'Malsha', 'malsha@gmail.com', '996584212v ', '$2y$10$CI.J6aDp2CQAgtnRRNv1b.llkNLjhc4w/TMLO1NGeX5fd0ns2YdQq', 'customer', '0773280420', '471/1, wijaya rd, mampe north, Piliyandala', 'activated', NULL),
(16, 'Joe', 'Jonas', 'jonas@gmail.com', '895642174v', '$2y$10$uKNOTNEzgbHXxf3AZN0Ftu8wlpF1sC0iaT5x1aqxKWvoRA0beczQe', 'cashier', NULL, NULL, 'activated', NULL),
(17, 'john', 'Doe', 'john123@gmail.com', '817465365V', '$2y$10$BmnqiLaDLLXjuanfQ/zHCOXi3Ip3Nck/KJeqwWNk55ilFGtIn.1XS', 'manager', NULL, NULL, 'activated', NULL),
(18, 'Nikky', 'Tibbiani', 'nikky@gmail.com', '926587415v', '$2y$10$cMDcXLfFd85SxTm/965Sgu3zu/2QTKH43/BdM9BxuddjCPY9Y5Ifa', 'cashier', NULL, NULL, 'activated', NULL),
(19, 'Nikky', 'Jane', 'jane@gmail.com', '986547525v', '$2y$10$ajYtg9JZgdk0le6NdVg7leuv02YTaRrCjkYuUu9pg.YtN/e0THhHa', 'customer', NULL, NULL, 'activated', NULL),
(20, 'Kavi', 'Smile', 'kavi@gmail.com', '996542185v', '$2y$10$sdCbST7G3wisxXC9cBGDIuL138koxK7MEbsuB1kkiyqXY.CtqVdfS', 'customer', '071234565', 'New town, hemswoth', 'activated', NULL),
(21, 'Yash', 'd', 'yash@gmail.com', '996854214v', '$2y$10$qftpVIDlPzoObhd7YcvP6Oz8VgRqmyrl914ghxCgz7rOUyUYpKuoS', 'customer', NULL, NULL, 'activated', NULL),
(22, 'female', 'non', 'non@gmail.com', '935684258v', '$2y$10$FISlLyGAENhmush4eoLI0esK3NpvFAXctILASTgfHIkvugOefLQaS', 'customer', NULL, NULL, 'activated', NULL),
(23, 'Gimhani', 'Perera', 'gim@gmail.com', '888881111v', '$2y$10$wO/vfkeWBg.s2E9PQuRrAeWsLk383acB9zAiIpGPWmomkcMBDd/Fi', 'customer', '0763896314', '781, Highlevel Rd, Nugegoda', 'activated', NULL),
(25, 'DiDi', 'Beth', 'didi96@gmail.com', '966883480v', '$2y$10$t7PCCusEbMx18vexjW0jruzkBkFFDhbR4w/eTEGhs3f7Uw3BN.L9e', 'customer', '0763896314', '471/1, wijaya rd, mampe north, piliyandala', 'activated', NULL),
(26, 'Test', '1', 'test.deactivate@gmai.com', '964561028v', '$2y$10$1vJ76Nnr8V7Mm6fyxnDu0.t76u.v/3RTabaQCjBviOe1C0NS1ziRO', 'customer', NULL, NULL, 'deactivated', NULL),
(27, 'Test', '2', 't2@emai.com', '01111111111v', '$2y$10$4YCJPsD5WgkZPhC0HNIG2uqZp8IgxFpQQIC2dCtsEWA2Aruc0kgPC', 'customer', NULL, NULL, 'deactivated', NULL),
(28, 'test1', '1', 'testing@gmail.com', '00001111v', '$2y$10$3/kgJIZdubk4vvHjhuOJ9eXansDuGk75CsgxSFUbnGtMc7PmNfegC', 'customer', NULL, NULL, 'activated', NULL),
(29, 'Kavi', 'Dias', 'kdias@gmail.com', '785469125v', '$2y$10$IFJifmcpAEkh.TF0BRUK2OpQgRwS/VxrdB0L2eCg2FCgSu55SgofC', 'customer', NULL, NULL, 'activated', NULL),
(30, 'Janani', 'Dissanayake', 'januacc@gmail.com', '997402898v', '$2y$10$bXxagX0IgwoLDDVcV7m5keEHRakLK4xGKiklVUf3n.Up1BPUMAShu', 'customer', NULL, NULL, 'activated', 'NfPxJIThwL');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
