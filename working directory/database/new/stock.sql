-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Mar 28, 2022 at 09:16 PM
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
) ENGINE=MyISAM AUTO_INCREMENT=41 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `stock`
--

INSERT INTO `stock` (`stock_id`, `stock_code`, `catergory`, `p_name`, `p_brand`, `p_desc`, `p_size`, `selling_price`, `supplier_no`, `p_image`, `p_keywords`) VALUES
(1, 'P-1', 'Motor Part', 'Outer Door Handle One Piece', 'Honda', 'Model : City 95 / Brand New/ Black', '-', 3000, 'S-1', '', 'Parts'),
(2, 'SP-1', 'Motor Part', '5L Car Fuel Tank Can Spare Plastic Petrol Gas Container ', '', 'Anti-Static Fuel Carrier with Pipe for Car Travel / Capacity: 5L\r\n', '-', 6068, 'S-2', '', 'Spare'),
(3, 'P-2', 'Motor Part', 'Fz/Mt15 version 1/2/3 Motorbike Yamaha 2 piece side mirror', 'Yamaha', 'Original side mirrors from India\nSuitable for all Yamaha bikes FZ version 123 & Yamaha MT15', '-', 1025, 'S-6', '', 'Parts'),
(4, 'SP-2', 'Motor Part', 'FZ-S Air Filter', 'Yamaha', '100% Brand New\nA Grade\nHigh Quality', '-', 1569, 'S-5', '', 'Parts'),
(5, 'AC-1', 'Motor Part', '4PCS Car Fuel Injector', 'Nissan', 'Nissan March K11 1.0 1.3 Hatchback 1992-2003 ', '-', 8, 'S-4', '', 'Accessories'),
(6, 'SP-3', 'Motor Part', '4 pcs AC Vent for Toyota Corolla AE100', 'Toyota', '4 x Middle AC Vent for Toyota AE100 / Brand New/Colors: Black', '-', 10, 'S-1', '', 'Spare'),
(7, 'SP-4', 'Motor Part', 'Car Heater Blower Motor Fan Resistor 5 Pins Rheostat For Vauxhall Zafira', '', 'Made of high quality plastic material, it is safe and reliable in use.\r\n', '-', 1, 'S-2', '', 'Spare'),
(8, 'SP-5', 'Motor Part', '4Pcs/Lot 23250-16150 Fuel Injector Nozzle', 'Toyota', 'for Toyota Corolla AE110 4AFE 5AFE 23209-16150 / Colour:Black + Silver\r\n', '-', 8, 'S-6', '', 'Spare'),
(9, 'P-3', 'Motor Part', '44mm Carburetor PZ30 Carb 200cc 250cc Cable Choke For Honda ATV Taotao SunL', 'Honda', 'Shell Color: Silver\n-Material: Aluminum\n-Bolting Hole Distance: 48mm', '-', 6, 'S-3', '', 'Parts'),
(10, 'SP-6', 'Motor Part', 'Car Rear Spare Tire Lamp Tail Bumper Light Fog Lamp', 'OEM', 'For Mitsubishi Pajero/Montero/Shogun 2007-2015', '-', 5, 'S-4', '', 'Spare'),
(11, 'P-4', 'Motor Part', '10 Pieces High Power 2 Pin 3W Warm White LED Bead Emitters 100-110Lm', 'OEM', 'Product Name : 3W LED Emitter;Intensity Luminous : 100-110LM\r\n', '-', 894, 'S-1', '', 'parts'),
(12, 'P-5', 'Motor Part', '11mm Carburetor', '', 'for TU26 32F 34F 36F 2 Stroke Strimmer Trimmer Mower Brush Cutter Scooter', '-', 3, 'S-5   ', '', 'Parts'),
(13, 'SP-7', 'Motor Part', 'Jumper Cable Battery Booster - 1250AMP', '', 'Name: Booster cable\r\nSuitable For all vehicles including Large Agricultural & Commercial Vehicles\r\n', '-', 1, 'S-2', '', 'Spare'),
(14, 'P-11', 'Motor Part', 'Automatic Transmission Oil Filter', 'Nissan ', 'Manufacturer Part Number: RE0F10A,JF011E,F1CJA,CVT,31726-1XF00,317261XF00\r\n\r\n', '-', 1, 'S-3', '', 'Parts'),
(15, 'P-6', 'Motor Part', 'Car Brake Stop Light Lamp Switch', 'Mitsubishi ', 'Number of Ports: 4 pin\r\nManufacturer Part Number: 8614A183\r\nItem Type: Light Switch\r\n', '-', 1, 'S-4', '', 'Parts'),
(16, 'P-7', 'Motor Part', '5 Pairs Waterproof Male Female Electrical Automotive Wire Connectors', '', 'Product Type: Car Waterproof Wire Connector.\r\nMaterial: brass, insulated nylon.\r\n', '-', 1, 'S-4', '', 'Parts'),
(17, 'P-8', 'Motor Part', 'Conventional Type Wiper Blade - 19\" ', 'KORSA ', 'A grade graphite-treated rubber wiping edge reduces friction and noise Superior wiping performance', '-', 1075, 'S-1', '', 'Parts'),
(18, 'P-9', 'Motor Part', '2Pc ABS Wheel Speed Sensor Rear Left & Right', 'Skoda', 'Compatible Car Models:for AUDI A3 2006-2013\r\n', '-', 2112, 'S-6', '', 'Parts'),
(19, 'P-10', 'Motor Part', 'Right Inlet Manifold Engine Valve Cover', 'Land Rover Discovery', 'Placement on vehicle: Right Hand Side From The Sitting Inside', '-', 19798, 'S-1', '', 'Parts'),
(20, 'SP-8', 'Motor Part', 'Drill Brush Cleaner Scrubbing Brushes', '', 'Item type: Drill Scrubber Brush Kit\ncolour:Yellow\nMaterial:nylon', '-', 3074, 'S-3', '', 'Spare'),
(21, 'Oil-1', 'Oils and F', 'STP Oil Treatment 450Ml', 'STP', 'Outstanding corrosion resistance, protects the engine and extends its life.\r\n', '100ml', 1, 's-6', '', 'Oil'),
(22, 'Oil-2', 'Oils and F', 'STP Diesel Oil Treatment 300Ml', 'STP', 'It is specially formulated to help fight metal-to-metal friction by providing a thicker cushion between moving engine parts.\r\n', '500ML', 1, 'S-1', '', 'Oil'),
(23, 'Oil-3', 'Oils and F', 'Honda SN SAE 0W 20 Engine Oil Genuine', 'Honda', 'Oil Base : Synthetic\r\nViscosity : 0W-20\r\nVolume(L) : 4L', '200ML', 8, 'S-2', '', 'Oil'),
(24, 'Oil-4', 'Oils and F', 'Catalytic System Clean', 'Liqui Moly', 'Suitable for all gasoline engines with a catalytic converter. Particularly as a preventative measure.\r\n', '250ML', 1, 'S-6', '', 'Oil'),
(25, 'Oil-5', 'Oils and F', 'Liqui Moly Octane booster200ml', 'Liqui Moly', 'Power pack tried and tested in motor sports that boosts the octane number of the gasoline and ensures that the engine can tap its full performance potential.', '1l', 2, 'S-5', '', 'Oil'),
(26, 'Oil-6', 'Oils and F', 'MOBIL Super 1000 X2 Mineral Multigrade 15W-40', 'MOBIL', 'Good wear protection\nGood engine cleanliness', '1.5l', 8, 'S-4', '', 'Oil'),
(27, 'GL-01', 'Oils and F', 'SE M-Caw Heavy Duty yellow Grease', 'M-Caw', 'Excellent wear protection\r\n', '500ML', 2, 'S-1', '', 'Greases & Lubricants'),
(28, 'GL-02', 'Oils and F', 'Flamingo Electronic Contact Cleane', 'Flamingo', 'Manufacturer ?FLAMINGO\r\nBrand ?FLAMINGO CARCARE TECH', '250ML', 1, 'S-2', '', 'Greases & Lubricants'),
(29, 'GL-03', 'Oils and F', 'Mobilgrease XHP™ 222', 'Mobil', 'Mobilgrease XHP 220 greases are used in a wide range of equipment ', '500ML', 3, 'S-6', '', 'Greases & Lubricants'),
(30, 'GL-04', 'Oils and F', 'BG Throttle Body & Intake Cleaner 194ml', 'BG', 'BG Throttle Body & Intake Cleaner is a blend of cleaning agents combining lubricants and anticorrosion ingredients', '250ML', 910, 'S-3', '', 'Greases & Lubricants'),
(31, 'GL-05', 'Oils and F', 'SE Red grease IOC - P3 - wholesell 17KG', 'SE ', 'Red Grease supplier with wholesell price p3 standard quality.\r\n', '1.5L', 12, 'S-4', '', 'Greases & Lubricants'),
(32, 'GL-06', 'Oils and F', '3M Multi Purpose Spray Lubricant', '3M', '3M Multi Purpose Spray Lubricant\r\n', '250ML', 1, 'S-1', '', 'Greases & Lubricants'),
(33, 'AD-01', 'Oils and F', 'ABRO Diesel Injector Cleaner - 354ml', 'ABRO', 'Stops Diesel Engine Hesitation\r\n', '100ML', 1, 'S-5   ', '', 'Additives'),
(34, 'AD-02', 'Oils and F', 'LIQUI MOLY Power Steering Fluid Stop Leak - 35ml', 'LIQUI MOLY', 'Oil additives\r\n', '150ML', 1, 'S-2', '', 'Additives'),
(35, 'AD-03', 'Oils and F', 'LIQUI MOLY MoS2 Shooter Additive - 20 ml', 'Liqui Moly', 'Brand: Liqui Moly\r\n', '100ML', 890, 'S-3', '', 'Additives'),
(36, 'AD-04', 'Oils and F', 'ECO Racing Blister', 'ECO ', 'One Tablet for 4L to 8L Petrol.10 Tablets in 1 Blister', '-', 980, 'S-4', '', 'Additives'),
(37, 'AD-05', 'Oils and F', '3M Complete Fuel System Cleaner', '3M', 'Brand: 3M™\nColor: Amber\nColor Family: Yellow', '500ML', 2, 'S-4', '', 'Additives'),
(38, 'AD-06', 'Oils and F', 'ABRO Diesel Fuel Treatment - 354ml', 'ABRO', 'Conditions Fuel, Enhances Combustion\r\n\r\n', '500ML', 900, 'S-1', '', 'Additives'),
(39, 'AD-07', 'Oils and F', 'LIQUI MOLY Pro-Line Oil Loss Stop - 1L', 'LIQUI MOLY', 'Workshop PRO-LINE Additives\nMade in Germany\n100% Original Product', '300ML', 3, 'S-6', '', 'Additives'),
(40, 'AD-08', 'Oils and F', 'ECO Diesel Box', 'ECO', 'One Tablet for 60L to 80L Diesel.10 Tablets in 1 Box', '-', 4, 'S-1', '', 'Additives');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
