-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 26, 2023 at 01:19 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.0.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `food`
--

-- --------------------------------------------------------

--
-- Table structure for table `meal`
--

CREATE TABLE `meal` (
  `name` varchar(30) DEFAULT NULL,
  `meal_ID` mediumint(10) NOT NULL,
  `image` varchar(50) DEFAULT NULL,
  `price` decimal(10,0) DEFAULT NULL,
  `time` datetime NOT NULL DEFAULT current_timestamp(),
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `meal`
--

INSERT INTO `meal` (`name`, `meal_ID`, `image`, `price`, `time`, `description`) VALUES
('TEA', 18, 'TEA.jpg', '150', '2023-04-07 02:33:35', 'TEA AND BOILED EGGS'),
('RICE KUKU', 22, 'RICE KUKU.jpg', '500', '2023-04-12 06:58:56', 'MIXTURE OF RICE, CHICKEN AND MINCED GREENS, ON OFFER'),
('INDIAN CHAPOOO', 23, 'INDIAN CHAPOOO.jpg', '150', '2023-04-12 07:00:33', 'GLUTEN-FREE CHAPATI WITH GITHERI'),
('TEA', 24, 'TEA.jpg', '700', '2023-04-12 07:01:20', 'TEA AND BOILED EGGS');

-- --------------------------------------------------------

--
-- Table structure for table `oders`
--

CREATE TABLE `oders` (
  `mealID` mediumint(10) NOT NULL,
  `amount` int(4) NOT NULL,
  `price` decimal(10,1) NOT NULL,
  `email` varchar(50) NOT NULL,
  `oderID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `oders`
--

INSERT INTO `oders` (`mealID`, `amount`, `price`, `email`, `oderID`) VALUES
(18, 1, '150.0', 'admin@cyphers.tech', 70),
(18, 1, '150.0', 'admin@cyphers.tech', 71),
(24, 1, '700.0', 'lutalidavid44@gmail.com', 72),
(22, 5, '500.0', 'lutalidavid44@gmail.com', 73),
(23, 3, '150.0', 'admin@cyphers.tech', 74),
(18, 2, '150.0', 'richard@gmail.com', 75),
(23, 1, '150.0', 'admin@rental.org', 76);

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `mpesacode` varchar(30) NOT NULL,
  `meal_ID` int(5) NOT NULL,
  `oderId` int(5) NOT NULL,
  `amount` decimal(4,2) NOT NULL,
  `used` tinyint(1) NOT NULL,
  `payedBy` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`mpesacode`, `meal_ID`, `oderId`, `amount`, `used`, `payedBy`) VALUES
('SAMPLE', 21, 21, '99.99', 1, ''),
('QWB', 23, 23, '99.99', 1, 'admin@rental.org'),
('QWI', 18, 18, '99.99', 1, 'admin@cyphers.tech'),
('QWJ', 18, 18, '99.99', 1, 'admin@cyphers.tech'),
('QWK', 18, 18, '99.99', 1, 'admin@cyphers.tech'),
('QWM', 22, 22, '99.99', 1, 'lutalidavid44@gmail.com'),
('QWN', 24, 24, '99.99', 1, 'lutalidavid44@gmail.com'),
('QWO', 23, 23, '99.99', 1, 'admin@cyphers.tech'),
('QWP', 18, 18, '99.99', 1, 'richard@gmail.com'),
('QWQ', 0, 0, '0.00', 0, ''),
('QWW', 0, 0, '0.00', 0, '');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `firstname` varchar(30) DEFAULT NULL,
  `lastname` varchar(30) DEFAULT NULL,
  `address1` varchar(30) DEFAULT NULL,
  `address2` varchar(30) DEFAULT NULL,
  `town` varchar(30) DEFAULT NULL,
  `street` varchar(30) DEFAULT NULL,
  `zip` varchar(30) DEFAULT NULL,
  `phone` mediumint(12) DEFAULT NULL,
  `image` varchar(50) DEFAULT NULL,
  `user_ID` varchar(20) NOT NULL,
  `email` varchar(30) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  `access` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`firstname`, `lastname`, `address1`, `address2`, `town`, `street`, `zip`, `phone`, `image`, `user_ID`, `email`, `password`, `access`) VALUES
('richard', 'kyalo', 'nyawita', 'green valley32', 'maseno', 'mabungo', '21', 8388607, 'admin@cyphers.tech.jpg', 'admin@cyphers.tech', 'admin@cyphers.tech', '$2y$10$stL8lhoS1Zb8Fabf.AMLJODI0B4.JW64wP2qZt0X8u/rXTjOGQtFe', 4),
(NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'admin@rental.org.jpg', 'admin@rental.org', 'admin@rental.org', '$2y$10$1qFTRbD2./T0.1YOslyKBubZV11UckkX1QscmlvdQW078zziKTide', 2),
(NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'lutalidavid44@gmail.', 'lutalidavid44@gmail.com', '$2y$10$KqPcK.QGlEM8JCWF2Us4A.fbe/mkQ2lo401bInneXyYnaVb0WbODW', 3),
('richard', 'lutali', '1234', 'green valley32', 'kisumu', '4xx4x4', '21', 1234, 'richard@gmail.com.jpg', 'richard@gmail.com', 'richard@gmail.com', '$2y$10$km923ySkGKESmsUjPDRIWuIVCRtJm3YQzD/tAePb5t2hzRrnodO0.', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `meal`
--
ALTER TABLE `meal`
  ADD PRIMARY KEY (`meal_ID`);

--
-- Indexes for table `oders`
--
ALTER TABLE `oders`
  ADD PRIMARY KEY (`oderID`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `meal`
--
ALTER TABLE `meal`
  MODIFY `meal_ID` mediumint(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `oders`
--
ALTER TABLE `oders`
  MODIFY `oderID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=77;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
