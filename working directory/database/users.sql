-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Dec 07, 2021 at 10:43 AM
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
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `fname`, `lname`, `email`, `nic`, `password`) VALUES
(1, 'john', 'doe', 'johndoe@gmail.com', '00000000v', '$2y$10$.9ijnO9mVoCkJbDplR2Yd.oGljZbWAGeDbN7wDCMMhfPMFapCLe9e'),
(2, 'jane', 'harris', 'j.harris@gmail.com', '00000001v', '$2y$10$2SyKefGSo30Ih0xCnspIuOvwiV7i7rlPiQrRbet6PRtzldH.0RPGi'),
(3, 'harry', 'roberts', 'harry.r@gmail.com', '00000002v', '$2y$10$lZomA9e6Aq8dCoSdn0iI.eo4O/rWdqMW1CVS4ymPXc2CB6sl0uZO.'),
(4, 'Kavisha', 'Perera', 'kavisha.g.perera@gmail.com', '997583323v', '$2y$10$aPet2R8Is481HfTPm2PhS.N7FUB9NeF81GzXEEhqfE3gvJQxVu3va'),
(5, 'Tharindu ', 'Periris', 'tp@gmail.com', '947191028v', '$2y$10$IDenzfbXLPln9PdICEHAI.oh2C005N.WY1c7bNKedefZ35vLqZ/MK');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
