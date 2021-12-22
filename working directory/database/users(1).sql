-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 07, 2021 at 04:33 PM
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
  `type` varchar(100) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `fname`, `lname`, `email`, `nic`, `password`, `type`) VALUES
(1, 'john', 'doe', 'johndoe@gmail.com', '00000000v', '$2y$10$.9ijnO9mVoCkJbDplR2Yd.oGljZbWAGeDbN7wDCMMhfPMFapCLe9e', NULL),
(2, 'jane', 'harris', 'j.harris@gmail.com', '00000001v', '$2y$10$2SyKefGSo30Ih0xCnspIuOvwiV7i7rlPiQrRbet6PRtzldH.0RPGi', NULL),
(3, 'harry', 'roberts', 'harry.r@gmail.com', '00000002v', '$2y$10$lZomA9e6Aq8dCoSdn0iI.eo4O/rWdqMW1CVS4ymPXc2CB6sl0uZO.', NULL),
(4, 'Kavisha', 'Perera', 'kavisha.g.perera@gmail.com', '997583323v', '$2y$10$aPet2R8Is481HfTPm2PhS.N7FUB9NeF81GzXEEhqfE3gvJQxVu3va', NULL),
(5, 'Tharindu ', 'Periris', 'tp@gmail.com', '947191028v', '$2y$10$IDenzfbXLPln9PdICEHAI.oh2C005N.WY1c7bNKedefZ35vLqZ/MK', NULL),
(6, 'Jane', 'Doe', 'jd@gmail.com', '817402365V', '$2y$10$S3t6qHaBY/nWITGx5/FYuuCXNMR1dRdKbAhsgaXonpF980moUWW2C', NULL),
(8, 'Sam', 'Doe', 'sd@gmail.com', '987402568v', '$2y$10$thw.iJW5asugmfJq9ZSe3u.Z4rjEt./wXNTqJnTL/AgPoGXzl1Zj6', 'manager'),
(9, 'senuli', 'dissanayake', 'senuli@gmail.com', '996825475v', '$2y$10$thw.iJW5asugmfJq9ZSe3u.Z4rjEt./wXNTqJnTL/AgPoGXzl1Zj6', 'customer'),
(10, 'monica', 'geller', 'mg@gmail.com', '8775693524v', '$2y$10$thw.iJW5asugmfJq9ZSe3u.Z4rjEt./wXNTqJnTL/AgPoGXzl1Zj6', 'admin'),
(11, 'Joey', 'Tibbiani', 'admin@gmail.com', '945687898v', '$2y$10$3JIjmZkENji1SMb4hXV1TObo8hhB3HNpMuw3WM0W7MM6mnidnrgey', 'admin'),
(12, 'john', 'jin', 'ij@gmail.com', '856479521v', '$2y$10$vExtPHV8IIwEHNQeLU.QLeXj0iHDdSzyII5tjtdbpoxRaXcBiIo7.', 'admin'),
(13, 'Samuel', 'Den', 'samuel@gmail.com', '896547823v', '$2y$10$yhyICMrdPeHkL3GpkLDRT.uC6HlwVguhEKxkK51/.fxaEnN0v7Gk2', 'manager'),
(14, 'Farah', 'Feathers', 'ft@gmail.com', '785694125v', '$2y$10$cCnoGlrdMi8z9pMI0z4.WO77g8LscuNnQFD7wnbvLxdLkqNzulp.q', 'customer'),
(15, 'Lucifer', ' Morningstar', 'hell@gmail.com', '875693214v', '$2y$10$7F3SWceqveiyU.aoi.7rY.52mZm/vZsHOIP0jI3ahehGsv7aGuXBm', 'manager'),
(16, 'Joe', 'Jonas', 'jonas@gmail.com', '895642174v', '$2y$10$uKNOTNEzgbHXxf3AZN0Ftu8wlpF1sC0iaT5x1aqxKWvoRA0beczQe', 'cashier');

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
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
