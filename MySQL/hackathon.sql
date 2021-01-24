-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 24, 2021 at 06:22 PM
-- Server version: 10.4.10-MariaDB
-- PHP Version: 7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hackathon`
--

-- --------------------------------------------------------

--
-- Table structure for table `ccie_nbr`
--

CREATE TABLE `ccie_nbr` (
  `productName` varchar(20) DEFAULT NULL,
  `importerLicNo` varchar(30) DEFAULT NULL,
  `country` varchar(200) DEFAULT NULL,
  `totalQuantity` float DEFAULT NULL,
  `unit` varchar(20) DEFAULT NULL,
  `totalCost` float DEFAULT NULL,
  `day` int(2) DEFAULT NULL,
  `month` int(2) DEFAULT NULL,
  `year` int(4) DEFAULT NULL,
  `taxStatus` varchar(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ccie_nbr`
--

INSERT INTO `ccie_nbr` (`productName`, `importerLicNo`, `country`, `totalQuantity`, `unit`, `totalCost`, `day`, `month`, `year`, `taxStatus`) VALUES
('Onion', 'se545fg2521', 'india', 110, 'Matric Ton', 7100000, 2, 4, 2020, 'yes'),
('Onion', 'se545fg2521', 'pakistan', 90, 'Matric Ton', 4580000, 3, 4, 2020, 'yes'),
('Potato', 'hasbdjka45453143', 'pakistan', 500, 'Matric Ton', 500000, 2, 4, 2020, 'no');

-- --------------------------------------------------------

--
-- Table structure for table `localproduct`
--

CREATE TABLE `localproduct` (
  `product_name` varchar(20) DEFAULT NULL,
  `division` varchar(20) DEFAULT NULL,
  `district` varchar(20) DEFAULT NULL,
  `thana` varchar(20) DEFAULT NULL,
  `bureauProductionQuantity` float DEFAULT NULL,
  `bureauDemandQuantity` float DEFAULT NULL,
  `daeProductionQuantity` float DEFAULT NULL,
  `ccDemandQuantity` float DEFAULT NULL,
  `unit` varchar(20) DEFAULT NULL,
  `day` int(2) DEFAULT NULL,
  `month` int(2) DEFAULT NULL,
  `year` int(4) DEFAULT NULL,
  `reseacrhData` varchar(1000) DEFAULT NULL,
  `perunitCost` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `localproduct`
--

INSERT INTO `localproduct` (`product_name`, `division`, `district`, `thana`, `bureauProductionQuantity`, `bureauDemandQuantity`, `daeProductionQuantity`, `ccDemandQuantity`, `unit`, `day`, `month`, `year`, `reseacrhData`, `perunitCost`) VALUES
('Onion', 'Dhaka', 'tangail', 'tangail', 63, 41, 45, 42, 'Matric Ton', 1, 4, 2020, NULL, NULL),
('Onion', 'Chottogram', 'feni', 'feni', 0.6, 2, 1, 2.3, 'Matric Ton', 1, 4, 2020, NULL, NULL),
('Onion', 'Barishal', 'patuakhali', 'patuakhali', 0, 0.5, 0.5, NULL, 'Matric Ton', 1, 4, 2020, NULL, NULL),
('Onion', 'Rajshahi', 'rajshahi', 'shembazar', 30, 0.7, 25, NULL, 'Matric Ton', 1, 4, 2020, NULL, NULL),
('Onion', 'Shylet', 'shunamgonj', 'shunamgonj', 30, 0.46, 27, NULL, 'Matric Ton', 1, 4, 2020, NULL, NULL),
('Onion', 'Khulna', 'bagerhat', 'bagerhat', 0, 0.2, 0.7, NULL, 'Matric Ton', 1, 4, 2020, NULL, NULL),
('Onion', 'Rangpur', 'sayedpur', 'sayedpur', 0.1, 0.3, 0.9, NULL, 'Matric Ton', 1, 4, 2020, NULL, NULL),
('Onion', 'Mymensingh', 'Mymenshing', 'nalitabari', 0.2, 0.5, 0.7, NULL, 'Matric Ton', 1, 4, 2020, NULL, NULL),
('Potato', 'Dhaka', 'tangail', 'buapur', 6, 1, NULL, NULL, 'Matric Ton', 1, 4, 2020, NULL, NULL),
('Potato', 'Chottogram', 'feni', 'feni', 50, 3, 39, NULL, 'Matric Ton', 1, 4, 2020, NULL, NULL),
('Potato', 'Barishal', 'patuakhali', 'patuakhali', 60, 4, 53, NULL, 'Matric Ton', 1, 4, 2020, NULL, NULL),
('Potato', 'Rajshahi', 'rajshahi', 'shembazar', 0.1, 1, 0.4, NULL, 'Matric Ton', 1, 4, 2020, NULL, NULL),
('Potato', 'Shylet', 'shunamgonj', 'shunamgonj', 0, 2, 0.2, NULL, 'Matric Ton', 1, 4, 2020, NULL, NULL),
('Potato', 'Khulna', 'bagerhat', 'bagerhat', 0.1, 2, 0.1, NULL, 'Matric Ton', 1, 4, 2020, NULL, NULL),
('Potato', 'Rangpur', 'sayedpur', 'sayedpur', 2, 0.5, 1, NULL, 'Matric Ton', 1, 4, 2020, NULL, NULL),
('Potato', 'Mymensingh', 'Mymenshing', 'nalitabari', 5, 0.33, 6, NULL, 'Matric Ton', 1, 4, 2020, NULL, NULL),
('Ginger', 'Dhaka', 'tangail', 'tangail', 2, 0.1, 1, NULL, 'Matric Ton', 1, 4, 2020, NULL, NULL),
('Ginger', 'Chottogram', 'feni', 'feni', 3, 0.3, 5, NULL, 'Matric Ton', 1, 4, 2020, NULL, NULL),
('Ginger', 'Barishal', 'patuakhali', 'patuakhali', 0, 0.1, 1, NULL, 'Matric Ton', 1, 4, 2020, NULL, NULL),
('Ginger', 'Rajshahi', 'rajshahi', 'shembazar', 12, 0.3, 17, NULL, 'Matric Ton', 1, 4, 2020, NULL, NULL),
('Ginger', 'Shylet', 'shunamgonj', 'shunamgonj', 0.363, 0.056, 0.5, NULL, 'Matric Ton', 1, 4, 2020, NULL, NULL),
('Ginger', 'Khulna', 'bagerhat', 'bagerhat', 3, 0.42, 2, NULL, 'Matric Ton', 1, 4, 2020, NULL, NULL),
('Ginger', 'Rangpur', 'sayedpur', 'sayedpur', 45, 0.135, 39, NULL, 'Matric Ton', 1, 4, 2020, NULL, NULL),
('Ginger', 'Mymensingh', 'Mymenshing', 'nalitabari', 33, 0.21, 40, NULL, 'Matric Ton', 1, 4, 2020, NULL, NULL),
('Ginger', 'Dhaka', 'tangail', 'buapur', 23, 1, 20, NULL, 'Matric Ton', 1, 4, 2020, NULL, NULL),
('Garlic', 'Dhaka', 'tangail', 'buapur', 0.43, 0.067, NULL, NULL, 'Matric Ton', 12, 4, 20, NULL, NULL),
('Garlic', 'Chottogram', 'feni', 'feni', 0, 0.062, 0.1, NULL, 'Matric Ton', 12, 4, 2020, NULL, NULL),
('Garlic', 'Barishal', 'patuakhali', 'patuakhali', 2, 0.128, 3, NULL, 'Matric Ton', 1, 4, 2020, NULL, NULL),
('Garlic', 'Rajshahi', 'rajshahi', 'shembazar', 2, 0.5, 1.5, NULL, 'Matric Ton', 1, 4, 2020, NULL, NULL),
('Garlic', 'Shylet', 'shunamgonj', 'shunamgonj', 3, 0.2, 5, NULL, 'Matric Ton', 1, 4, 2020, NULL, NULL),
('Garlic', 'Khulna', 'bagerhat', 'bagerhat', 3, 0.23, 4, NULL, 'Matric Ton', 1, 4, 2020, NULL, NULL),
('Garlic', 'Rangpur', 'sayedpur', 'sayedpur', 11, 0.12, 11, NULL, 'Matric Ton', 1, 4, 2020, NULL, NULL),
('Garlic', 'Mymensingh', 'Mymenshing', 'nalitabari', 5, 0.41, 5, NULL, 'Matric Ton', 1, 4, 2020, NULL, NULL),
('Tomato', 'Dhaka', 'tangail', 'buapur', 9, 10, 8, NULL, 'Matric Ton', 1, 4, 2020, NULL, NULL),
('Tomato', 'Chottogram', 'feni', 'feni', 23, 19, 23, NULL, 'Matric Ton', 1, 4, 2020, NULL, NULL),
('Tomato', 'Barishal', 'patuakhali', 'patuakhali', 12, 21, 12, NULL, 'Matric Ton', 1, 4, 2020, NULL, NULL),
('Tomato', 'Rajshahi', 'rajshahi', 'shembazar', 24, 25, 5, NULL, 'Matric Ton', 1, 4, 2020, NULL, NULL),
('Tomato', 'Shylet', 'shunamgonj', 'shunamgonj', 25, 37, 2, NULL, 'Matric Ton', 1, 4, 2020, NULL, NULL),
('Tomato', 'Khulna', 'bagerhat', 'bagerhat', 42, 19, 42, NULL, 'Matric Ton', 1, 4, 2020, NULL, NULL),
('Tomato', 'Rangpur', 'sayedpur', 'sayedpur', 1, 38, 40, NULL, 'Matric Ton', 1, 4, 2020, NULL, NULL),
('Tomato', 'Mymensingh', 'Mymenshing', 'nalitabari', 0, 3, 35, NULL, 'Matric Ton', 1, 4, 2020, NULL, NULL),
('Eggplant', 'Dhaka', 'tangail', 'buapur', 1, 0.5, NULL, NULL, 'Matric Ton', 1, 4, 2020, NULL, NULL),
('Eggplant', 'Chottogram', 'feni', 'feni', 3, 0.5, 3, NULL, 'Matric Ton', 1, 4, 2020, NULL, NULL),
('Eggplant', 'Barishal', 'patuakhali', 'patuakhali', 0.98, 0.123, 5, NULL, 'Matric Ton', 1, 4, 2020, NULL, NULL),
('Eggplant', 'Rajshahi', 'rajshahi', 'shembazar', 3, 0.7, 10, NULL, 'Matric Ton', 1, 4, 2020, NULL, NULL),
('Eggplant', 'Shylet', 'shunamgonj', 'shunamgonj', 2, 1.1, 8, NULL, 'Matric Ton', 1, 4, 2020, NULL, NULL),
('Eggplant', 'Khulna', 'bagerhat', 'bagerhat', 1, 3, 22, NULL, 'Matric Ton', 1, 4, 2020, NULL, NULL),
('Eggplant', 'Rangpur', 'sayedpur', 'sayedpur', 5, 12, NULL, NULL, 'Matric Ton', 0, 0, 0, NULL, NULL),
('Eggplant', 'Mymensingh', 'Mymenshing', 'nalitabari', 1, 11, 30, NULL, 'Matric Ton', 1, 4, 2020, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `product` varchar(20) DEFAULT NULL,
  `wholesellPrice` float DEFAULT NULL,
  `retailPrice` float DEFAULT NULL,
  `area` varchar(20) DEFAULT NULL,
  `day` int(2) DEFAULT NULL,
  `month` int(2) DEFAULT NULL,
  `year` int(4) DEFAULT NULL,
  `type` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`product`, `wholesellPrice`, `retailPrice`, `area`, `day`, `month`, `year`, `type`) VALUES
('onion', 45, NULL, 'dhaka', 3, 6, 2020, 'deshi'),
('onion', 40, NULL, 'chottogram', 3, 6, 2020, 'deshi'),
('onion', 41, NULL, 'barishal', 3, 6, 2020, 'deshi'),
('onion', 44, NULL, 'rajshahi', 3, 6, 2020, 'deshi'),
('onion', 47, NULL, 'shylet', 3, 6, 2020, 'deshi'),
('onion', 42, NULL, 'khulna', 3, 6, 2020, 'deshi'),
('onion', 40, NULL, 'rangpur', 3, 6, 2020, 'deshi'),
('onion', 46, NULL, 'mymensingh', 3, 6, 2020, 'deshi'),
('Garlic', 110, NULL, 'dhaka', 29, 4, 2020, 'deshi'),
('Garlic', 111, NULL, 'chottogram', 29, 4, 2020, 'deshi'),
('Garlic', 108, NULL, 'barishal', 29, 4, 2020, 'deshi'),
('Garlic', 109, NULL, 'rajshahi', 29, 4, 2020, 'deshi'),
('Garlic', 110, NULL, 'shylet', 29, 4, 2020, 'deshi'),
('Garlic', 113, NULL, 'khulna', 29, 4, 2020, 'deshi'),
('Garlic', 105, NULL, 'rangpur', 29, 4, 2020, 'deshi'),
('Garlic', 111, NULL, 'mymensingh', 29, 4, 2020, 'deshi'),
('Tomato', 20, 22, 'dhaka', 3, 6, 2020, 'deshi'),
('Tomato', 20, 22, 'chottogram', 3, 6, 2020, 'deshi'),
('Tomato', 19, 20, 'barishal', 3, 6, 2020, 'deshi'),
('Tomato', 18, 19, 'rajshahi', 3, 6, 2020, 'deshi'),
('Tomato', 21, 23, 'shylet', 3, 6, 2020, 'deshi'),
('Tomato', 19, 21, 'khulna', 3, 6, 2020, 'deshi'),
('Tomato', 17, 19, 'rangpur', 3, 6, 2020, 'deshi'),
('Tomato', 20, 22, 'mymensingh', 3, 6, 2020, 'deshi'),
('onion', 121.23, NULL, 'dhaka', 18, 8, 2020, 'desi'),
('onion', 122, NULL, 'chottogram', 18, 8, 2020, 'desi'),
('onion', 121, NULL, 'barishal', 18, 8, 2020, 'desi'),
('onion', 121, NULL, 'rajshahi', 18, 8, 2020, 'desi'),
('onion', 220, NULL, 'shylet', 18, 8, 2020, 'desi'),
('onion', 121, NULL, 'khulna', 18, 8, 2020, 'desi'),
('onion', 123, NULL, 'rangpur', 18, 8, 2020, 'desi'),
('onion', 123, NULL, 'mymensingh', 18, 8, 2020, 'desi');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
