-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 21, 2022 at 09:36 AM
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
-- Table structure for table `productbill`
--

CREATE TABLE `productbill` (
  `id` int(10) NOT NULL,
  `product_id` int(10) NOT NULL,
  `pbill_no` varchar(25) NOT NULL,
  `cus_name` varchar(255) NOT NULL,
  `cus_address` int(11) NOT NULL,
  `cus_contact` int(11) NOT NULL,
  `cashier_name` varchar(255) NOT NULL,
  `datetime` datetime NOT NULL,
  `p_name` varchar(255) NOT NULL,
  `quantity` int(100) NOT NULL,
  `unit_price` decimal(10,2) NOT NULL,
  `total` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `productbill`
--
ALTER TABLE `productbill`
  ADD PRIMARY KEY (`id`),
  ADD KEY `test` (`product_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `productbill`
--
ALTER TABLE `productbill`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `productbill`
--
ALTER TABLE `productbill`
  ADD CONSTRAINT `test` FOREIGN KEY (`product_id`) REFERENCES `productbill` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
