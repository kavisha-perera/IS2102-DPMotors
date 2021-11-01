-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 24, 2021 at 08:26 AM
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
-- Database: `2102db`
--

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `id` int(10) NOT NULL,
  `fname` varchar(255) NOT NULL,
  `lname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `nic` varchar(255) NOT NULL,
  `contact` int(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `employeeid` varchar(100) DEFAULT NULL,
  `type` varchar(100) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`id`, `fname`, `lname`, `email`, `nic`, `contact`, `address`, `password`, `employeeid`, `type`) VALUES
(1, 'John', 'Doe', 'johndoe@gmail.com', '000000000v', NULL, NULL, '$2y$10$SmEhmloTmzmwh8VaukMVieyRsbURhCLNCG4VmWxJfVLlioBvhcv0m', NULL, 'customer'),
(2, 'John', 'Doe', 'johndoe@gmail.com', '000000000v', NULL, NULL, '$2y$10$j5JCAG8jBmt.ws7YxMm6OuIFH1JSfJg4MKgjWWDaxWh0p9QKtAGP2', NULL, 'customer'),
(3, 'Janet', 'Wilson', 'wilson.j@gmail.com', '000000001v', NULL, NULL, '$2y$10$9fTvgFjwEbDG95NC4iFuPe5lwlruDT1810yyyWeuxnbPMCsiM.I2m', NULL, 'customer'),
(4, 'Charles', 'Boyle', 'c.boyle@gmail.com', '000000002v', NULL, NULL, '$2y$10$PE1wON855EMMRT8yih09Z.fw5IJcEQhoknd12RcYSno593zXHm4PS', NULL, 'customer'),
(5, 'Amy', 'Santiago', 'amy.santiago@gmail.com', '000000003v', NULL, NULL, '$2y$10$6X2R7qa5lfyx4/2f0Jm.UuDiUPAXQJBFnGC0LoJLdJpa4NpWM4q/e', NULL, 'customer'),
(8, 'john', 'doe', 'jd@gmail.com', '817402365V', NULL, NULL, '$2y$10$6KSwyzE5Om5twCyC3Jvf9OdWDV2i2vGo6ZOGLbPwF2vBvRtc8HE0e', NULL, NULL),
(9, 'janu', 'dissa`', 'janu@gmail.com', '817402365V', NULL, NULL, '$2y$10$7baJobyNz35iIHAoiHEO0.XwRmrrggU42YCetOTJVhxYkmrlcpgm6', NULL, 'customer'),
(11, 'Rosa', 'Diaz', 'diaz@gmail.com', '6545789521v', 715245356, 'new town, kandy', '$2y$10$QR5N7zWGb80nHDhrpHij9uH2gix0nKlw2v7kWK5NFNA7n16PA19DK', 'D456', 'cashier'),
(12, 'Jess', 'Gomez', 'jess@gmail.com', '6545789521v', 715245356, 'new town, galle', '$2y$10$QR5N7zWGb80nHDhrpHij9uH2gix0nKlw2v7kWK5NFNA7n16PA19DK', 'J456', 'admin'),
(10, 'Janani', 'Dissanayake', 'manager@gmail.com', '997402898v', 716241327, 'Mihintale,Anuradhapura', '$2y$10$QR5N7zWGb80nHDhrpHij9uH2gix0nKlw2v7kWK5NFNA7n16PA19DK', 'MJ221', 'manager'),
(13, 'Sewmini', 'Senevirathne', 'admin@gmail.com', '20007402898', 716241327, 'UCSC,UOC', '$2y$10$QR5N7zWGb80nHDhrpHij9uH2gix0nKlw2v7kWK5NFNA7n16PA19DK', 'AS221', 'admin'),
(14, 'Tharushi', 'Algama', 'cashier@gmail.com', '997401365v', 716241327, 'Kurunegala', '$2y$10$QR5N7zWGb80nHDhrpHij9uH2gix0nKlw2v7kWK5NFNA7n16PA19DK', 'CT221', 'cashier'),
(15, 'katu', 'pulu', 'dileep@wso2.com', '45646546v', NULL, NULL, '$2y$10$RY8jX58Wxk0rdHyxAsRW6evq2gr932r6scKYcipGw71maxcX8SJNu', '214412', 'manager'),
(16, 'senuli', 'yunaya', 'sy@gmail.com', '921203195v', NULL, NULL, '$2y$10$Cu/QWh/b/UKfvqDmvl.67.I5xouAZSElHMqdu7a4y0dYPihMeSjo2', 'MS8932', 'manager'),
(17, 'Jen', 'Lisa', 'jl@gmail.com', '921203195v', NULL, NULL, '$2y$10$DcISvf8AIUBYG7avUJ/8XO4FUM6Dtr/njh/Zr0fcukrOVMFhx4FIa', NULL, 'customer'),
(18, 'Patrick', 'Jane', 'pj@gmail.com', '45646546v', NULL, NULL, '$2y$10$qL7mdYbkqgH5climofmgJuqjpH1hr23JKxvptWIP3//tSnzkSiwJS', 'AP657', 'admin'),
(19, 'Kavisha', 'Perera', 'customer@gmail.com', '997402365V', NULL, NULL, '$2y$10$vhCzGfgT25UEpsvCISDQqu2hEQTLEqXJGE.JseZyFsKxwWCFTsbte', 'CK789', 'customer'),
(20, 'Len', 'Gi', 'lg@gmail.com', '817402365V', NULL, NULL, '$2y$10$zGd/FQe/A5Jucua2Ta99ROn/y.9Ls8y9RyA7I/DCqGRwtN82lSZVC', 'CL546', 'cashier'),
(21, 'john', 'yunaya', 'admin@gmail.com', '921203195v', NULL, NULL, '$2y$10$q3PTyNwDh1cCBduJz5G1VeoVZHFCauvw5460P/cmqG.D0KPEzLBd.', NULL, 'customer');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
