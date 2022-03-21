-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 21, 2022 at 09:33 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.12

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

CREATE TABLE `vehicleservicerecords` (
  `id` int(25) NOT NULL,
  `serviceNo` varchar(25) NOT NULL,
  `customerEmail` varchar(255) NOT NULL,
  `vehicleNo` varchar(10) NOT NULL,
  `vehicleModel` varchar(25) NOT NULL,
  `dateOfService` date NOT NULL,
  `milage` int(25) NOT NULL,
  `engineOil` varchar(25) DEFAULT NULL COMMENT '- , Top Up, Re-fill',
  `gearOil` varchar(25) DEFAULT NULL COMMENT '- , Top Up, Re-fill',
  `ACfilter` varchar(25) DEFAULT NULL COMMENT '- , Clean, Replace',
  `oilFilter` varchar(25) DEFAULT NULL COMMENT '- , change',
  `ATFoil` varchar(25) DEFAULT NULL COMMENT '- , Top Up, Re-fill',
  `coolant` varchar(25) DEFAULT NULL COMMENT '- , Top Up, Re-fill',
  `airFilter` varchar(25) DEFAULT NULL COMMENT '- , Clean, Replace',
  `nextServiceDate` date NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `vehicleservicerecords`
--

INSERT INTO `vehicleservicerecords` (`id`, `serviceNo`, `customerEmail`, `vehicleNo`, `vehicleModel`, `dateOfService`, `milage`, `engineOil`, `gearOil`, `ACfilter`, `oilFilter`, `ATFoil`, `coolant`, `airFilter`, `nextServiceDate`) VALUES
(1, 's1', 'malsha@gmail.com', 'CAO-3549', 'Toyota Axio', '2022-01-20', 17228, 'ReFill', 'Top Up', 'Clean', 'Change', '-', '-', 'Clean', '2022-03-15'),
(2, 's2', 'malsha@gmail.com', 'CAO-3549', 'Toyota Axio', '2022-03-24', 22318, 'Top Up', '-', 'Clean', 'Change', '-', '-', 'Clean', '2022-06-18'),
(3, 's3', 'amal@gmail.com', 'KB-3698', 'Suzuki Maruti', '2022-04-14', 56318, 'ReFill', 'ReFill', 'Clean', 'Change', '-', '-', 'Change', '2022-05-21'),
(4, 's4', 'Thilini@gmail.com', 'KB-3695', 'Suzuki Maruti', '2022-05-23', 56318, 'Top Up', '-', 'Change', '-', '-', '-', 'Clean', '2022-07-25'),
(44, 's5', 'abc@gmail.com', 'ABC-123', 'Toyota Axio', '2022-03-21', 3000, 'Top Up', '-', 'Clean', 'Change', '-', 'Top Up', 'Clean', '2022-03-28');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `vehicleservicerecords`
--
ALTER TABLE `vehicleservicerecords`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `vehicleservicerecords`
--
ALTER TABLE `vehicleservicerecords`
  MODIFY `id` int(25) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
