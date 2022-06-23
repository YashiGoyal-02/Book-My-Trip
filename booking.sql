-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 22, 2022 at 06:58 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `booking`
--

-- --------------------------------------------------------

--
-- Table structure for table `adminlogin`
--

CREATE TABLE `adminlogin` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `adminlogin`
--

INSERT INTO `adminlogin` (`id`, `username`, `password`) VALUES
(1, 'Yashi', 'Yashi02');

-- --------------------------------------------------------

--
-- Table structure for table `booking`
--

CREATE TABLE `booking` (
  `bid` int(15) NOT NULL,
  `categoryId` int(15) NOT NULL,
  `bookingDate` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `numTickets` int(15) NOT NULL,
  `finalPrice` int(50) NOT NULL,
  `CustomerName` varchar(200) NOT NULL,
  `emailId` varchar(200) NOT NULL,
  `IdProof` varchar(200) NOT NULL,
  `PaymentMode` varchar(200) NOT NULL,
  `bookingStatus` varchar(50) NOT NULL DEFAULT 'Ongoing'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `booking`
--

INSERT INTO `booking` (`bid`, `categoryId`, `bookingDate`, `numTickets`, `finalPrice`, `CustomerName`, `emailId`, `IdProof`, `PaymentMode`, `bookingStatus`) VALUES
(1, 5, '2022-06-14 09:52:03', 2, 16000, 'Yashi Goyal', 'yashigoyal02@gmail.com', 'Aadhar', 'Rupay', 'Cancel'),
(4, 2, '2022-06-08 10:02:03', 5, 3750, 'Ramesh Goel', 'advocaterameshgoyal@gmail.com', 'Aadhar', 'Maestro', 'Cancel'),
(5, 6, '2022-06-08 14:21:45', 3, 17400, 'Ritika Mittal', 'advocateritikagoyal@gmail.com', 'Aadhar', 'Master', 'Confirm'),
(6, 3, '2022-06-14 09:52:42', 2, 20000, 'Yashi Goyal', 'yashigoyal02@gmail.com', 'Aadhar', 'Credit', 'Cancel'),
(7, 1, '2022-06-17 06:56:46', 6, 39000, 'Yashi Goyal', 'yashigoyal02@gmail.com', 'Aadhar', 'Visa', 'Cancel'),
(8, 3, '2022-06-14 09:52:42', 2, 20000, 'Yashi Goyal', 'yashigoyal02@gmail.com', 'Aadhar', 'Rupay', 'Cancel'),
(9, 7, '2022-06-14 12:23:42', 5, 2000, 'Yashi Goyal', 'yashigoyal02@gmail.com', 'Aadhar', 'Maestro', 'Cancel'),
(10, 5, '2022-06-14 10:01:07', 4, 32000, 'Ramesh Goel', 'advocaterameshgoyal@gmail.com', 'Aadhar', 'Visa', 'Cancel'),
(12, 5, '2022-06-14 10:01:07', 6, 48000, 'Ramesh Goel', 'advocaterameshgoyal@gmail.com', 'Aadhar', 'Visa', 'Cancel'),
(13, 14, '2022-06-17 07:04:10', 2, 1000, 'Yashi Goyal', 'yashigoyal02@gmail.com', 'Aadhar', 'Maestro', 'Cancel'),
(17, 15, '2022-06-14 16:25:55', 3, 4500, 'Yashi Goyal', 'yashigoyal02@gmail.com', 'Aadhar', 'Visa', 'Ongoing'),
(18, 3, '2022-06-14 16:27:42', 4, 40000, 'Yashi Goyal', 'yashigoyal02@gmail.com', 'Aadhar', 'Master', 'Confirm'),
(19, 5, '2022-06-15 05:40:42', 1, 8000, 'Yashi Goyal', 'yashigoyal02@gmail.com', 'Aadhar', 'Maestro', 'Confirm'),
(20, 14, '2022-06-17 07:04:10', 2, 1000, 'Ramesh Goel', 'advocaterameshgoyal@gmail.com', 'Aadhar', 'Credit', 'Cancel'),
(21, 5, '2022-06-15 06:39:04', 2, 16000, 'Ramesh Goel', 'advocaterameshgoyal@gmail.com', 'Aadhar', 'Visa', 'Ongoing'),
(22, 5, '2022-06-15 06:40:26', 2, 16000, 'Ramesh Goel', 'advocaterameshgoyal@gmail.com', 'Aadhar', 'Visa', 'Ongoing'),
(23, 5, '2022-06-15 06:40:45', 2, 16000, 'Ramesh Goel', 'advocaterameshgoyal@gmail.com', 'Aadhar', 'Visa', 'Ongoing'),
(24, 5, '2022-06-15 06:43:42', 2, 16000, 'Ramesh Goel', 'advocaterameshgoyal@gmail.com', 'Aadhar', 'Visa', 'Confirm'),
(25, 14, '2022-06-17 07:04:10', 3, 1500, 'Ramesh Goel', 'advocaterameshgoyal@gmail.com', 'Aadhar', 'Visa', 'Cancel'),
(26, 16, '2022-06-16 12:02:51', 2, 6000, 'Yashi Goyal', 'yashigoyal02@gmail.com', 'Aadhar', 'Visa', 'Ongoing'),
(27, 16, '2022-06-16 13:33:38', 4, 12000, 'Yashi Goyal', 'yashigoyal02@gmail.com', 'Aadhar', 'Maestro', 'Ongoing'),
(28, 16, '2022-06-16 13:34:16', 4, 12000, 'Yashi Goyal', 'yashigoyal02@gmail.com', 'Aadhar', 'Maestro', 'Ongoing'),
(29, 16, '2022-06-16 14:11:41', 3, 9000, 'Yashi Goyal', 'yashigoyal02@gmail.com', 'Aadhar', 'Rupay', 'Confirm'),
(30, 5, '2022-06-17 05:40:43', 3, 24000, 'Yashi Goyal', 'yashigoyal02@gmail.com', 'Aadhar', 'Master', 'Cancel'),
(31, 14, '2022-06-17 07:04:10', 4, 2000, 'Yashi Goyal', 'yashigoyal02@gmail.com', 'Aadhar', 'Maestro', 'Cancel'),
(32, 5, '2022-06-17 05:47:00', 2, 16000, 'Yashi Goyal', 'yashigoyal02@gmail.com', 'Aadhar', 'Maestro', 'Confirm'),
(33, 3, '2022-06-16 18:44:26', 3, 30000, 'Yashi Goyal', 'yashigoyal02@gmail.com', 'Aadhar', 'Visa', 'Confirm'),
(34, 14, '2022-06-17 07:04:10', 1, 500, 'Yashi Goyal', 'yashigoyal02@gmail.com', 'Aadhar', 'Rupay', 'Cancel'),
(35, 6, '2022-06-16 18:50:21', 5, 29000, 'Yashi Goyal', 'yashigoyal02@gmail.com', 'Aadhar', 'Credit', 'Confirm'),
(36, 1, '2022-06-17 06:56:46', 2, 13000, 'Yashi Goyal', 'yashigoyal02@gmail.com', 'Aadhar', 'Visa', 'Cancel'),
(37, 14, '2022-06-17 07:04:10', 3, 1500, 'Yashi Goyal', 'yashigoyal02@gmail.com', 'Aadhar', 'Visa', 'Cancel'),
(38, 5, '2022-06-16 18:48:51', 5, 40000, 'Yashi Goyal', 'yashigoyal02@gmail.com', 'Aadhar', 'Maestro', 'Confirm'),
(39, 14, '2022-06-17 07:04:10', 3, 1500, 'Yashi Goyal', 'yashigoyal02@gmail.com', 'Aadhar', 'Credit', 'Cancel'),
(40, 14, '2022-06-17 07:04:10', 2, 1000, 'Yashi Goyal', 'yashigoyal02@gmail.com', 'Aadhar', 'Master', 'Cancel'),
(41, 3, '2022-06-16 16:48:36', 1, 10000, 'Yashi Goyal', 'yashigoyal02@gmail.com', 'Aadhar', 'Visa', 'Cancel'),
(42, 1, '2022-06-16 17:30:36', 2, 13000, 'Yashi Goyal', 'yashigoyal02@gmail.com', 'Aadhar', 'Rupay', 'Cancel'),
(43, 5, '2022-06-16 17:33:00', 2, 16000, 'Ramesh', 'advocaterameshgoyal@gmail.com', 'Aadhar', 'Visa', 'Cancel'),
(44, 3, '2022-06-16 17:33:56', 3, 30000, 'Ramesh', 'yashigoyal02@gmail.com', 'Aadhar', 'Maestro', 'Confirm'),
(45, 3, '2022-06-17 07:05:31', 4, 40000, 'Yashi Goyal', 'yashigoyal02@gmail.com', 'Aadhar', 'Visa', 'Confirm'),
(46, 10, '2022-06-21 17:19:04', 2, 1800, 'Yashi Goyal', 'yashigoyal02@gmail.com', 'Aadhar', 'Maestro', 'Ongoing'),
(47, 12, '2022-06-22 14:47:05', 4, 3600, 'Yashi Goyal', 'yashigoyal02@gmail.com', 'Aadhar', 'Visa', 'Ongoing'),
(48, 12, '2022-06-22 14:56:55', 4, 3600, 'Yashi Goyal', 'yashigoyal02@gmail.com', 'Aadhar', 'Visa', 'Ongoing'),
(49, 9, '2022-06-22 14:58:08', 4, 3600, 'Yashi Goyal', 'yashigoyal02@gmail.com', 'Aadhar', 'Rupay', 'Ongoing'),
(50, 9, '2022-06-22 14:59:50', 4, 3600, 'Yashi Goyal', 'yashigoyal02@gmail.com', 'Aadhar', 'Rupay', 'Ongoing'),
(51, 9, '2022-06-22 15:01:55', 4, 3600, 'Yashi Goyal', 'yashigoyal02@gmail.com', 'Aadhar', 'Rupay', 'Ongoing');

-- --------------------------------------------------------

--
-- Table structure for table `carddetails`
--

CREATE TABLE `carddetails` (
  `id` int(15) NOT NULL,
  `cardNum` int(255) NOT NULL,
  `name` varchar(500) NOT NULL,
  `ExpDate` date NOT NULL,
  `cvv` int(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `carddetails`
--

INSERT INTO `carddetails` (`id`, `cardNum`, `name`, `ExpDate`, `cvv`) VALUES
(1, 147852, 'Yashi Goyal', '2026-11-15', 123),
(2, 789654, 'Ramesh', '2029-10-15', 456),
(3, 987452, 'Ritika', '2030-10-17', 436),
(5, 847856, 'Ritika', '2030-11-07', 436),
(7, 874569, 'Ritika', '2030-11-07', 436);

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `type` varchar(100) DEFAULT NULL,
  `airline` varchar(50) DEFAULT NULL,
  `source` varchar(100) NOT NULL,
  `destination` varchar(100) NOT NULL,
  `price` int(10) NOT NULL,
  `startTime` timestamp NOT NULL DEFAULT current_timestamp(),
  `endTime` timestamp NOT NULL DEFAULT current_timestamp(),
  `isCancelled` int(10) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `name`, `type`, `airline`, `source`, `destination`, `price`, `startTime`, `endTime`, `isCancelled`) VALUES
(1, 'Flights', 'Economy', 'Indigo', 'Chandigarh', 'Chennai', 6500, '2022-06-18 01:40:12', '2022-06-18 05:00:52', 1),
(2, 'Trains', 'Chair Car', NULL, 'Chandigarh', 'Chennai', 750, '2022-06-08 05:01:24', '2022-06-09 10:00:28', 0),
(3, 'Flights', 'Business', 'Indigo', 'Chandigarh', 'Chennai', 10000, '2022-06-18 01:40:40', '2022-06-18 05:00:40', 0),
(4, 'Bus', NULL, NULL, 'Chandigarh', 'Amritsar', 100, '2022-06-08 09:40:34', '2022-06-08 14:30:56', 0),
(5, 'Flights', 'Business', 'Air India', 'Chandigarh ', 'Chennai', 8000, '2022-06-18 09:30:38', '2022-06-18 12:50:38', 0),
(6, 'Flights', 'Economy', 'Air India', 'Chandigarh ', 'Chennai', 5800, '2022-06-18 09:30:38', '2022-06-18 12:50:38', 0),
(7, 'Bus', NULL, NULL, 'Pinjore', 'Manimajra', 400, '2022-06-30 05:07:01', '2022-06-30 06:07:01', 0),
(9, 'Trains', 'Sleeper', NULL, 'Pinjore', 'Ludhiana', 900, '2022-06-30 03:30:00', '2022-06-30 06:30:00', 0),
(10, 'Trains', 'Chair Car', NULL, 'Pinjore', 'Ludhiana', 900, '2022-06-30 03:30:00', '2022-06-30 06:30:00', 0),
(11, 'Trains', 'Second AC', NULL, 'Pinjore', 'Ludhiana', 900, '2022-06-30 03:30:00', '2022-06-30 06:30:00', 0),
(12, 'Trains', 'First AC', NULL, 'Pinjore', 'Ludhiana', 900, '2022-06-30 03:30:00', '2022-06-30 06:30:00', 0),
(13, 'Flights', 'Economy', 'Vistara', 'Delhi', 'Dubai', 12550, '2022-06-29 06:30:00', '2022-06-29 21:45:00', 1),
(14, 'Bus', NULL, NULL, 'Kalka', 'Shimla', 500, '2022-06-30 08:30:00', '2022-06-30 13:50:00', 1),
(15, 'Trains', 'Sleeper', '', 'Chandigarh', 'Chennai', 1500, '2022-06-30 05:20:00', '2022-07-01 13:30:00', 0),
(16, 'Flights', 'Economy', 'Air India', 'Chandigarh', 'Delhi', 3000, '2022-06-30 04:00:00', '2022-06-30 05:30:00', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `adminlogin`
--
ALTER TABLE `adminlogin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `booking`
--
ALTER TABLE `booking`
  ADD PRIMARY KEY (`bid`),
  ADD KEY `categoryId` (`categoryId`);

--
-- Indexes for table `carddetails`
--
ALTER TABLE `carddetails`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `cardNum` (`cardNum`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `adminlogin`
--
ALTER TABLE `adminlogin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `booking`
--
ALTER TABLE `booking`
  MODIFY `bid` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT for table `carddetails`
--
ALTER TABLE `carddetails`
  MODIFY `id` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
