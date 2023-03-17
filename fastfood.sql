-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 17, 2023 at 04:19 PM
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
  `type` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `meal`
--

INSERT INTO `meal` (`name`, `meal_ID`, `image`, `price`, `type`) VALUES
('MealName', 1, 'jpeg.jpg', '100', 'breakfast'),
('MealName', 3, 'meal2.jpg', '100', 'breakfast'),
('MealName', 4, 'meal3.jpg', '100', 'breakfast'),
('MealName', 5, 'meal1.jpg', '100', 'breakfast');

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
  `password` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`firstname`, `lastname`, `address1`, `address2`, `town`, `street`, `zip`, `phone`, `image`, `user_ID`, `email`, `password`) VALUES
(NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'admin@cyphers.tech', 'admin@cyphers.tech', '$2y$10$stL8lhoS1Zb8Fabf.AMLJODI0B4.JW64wP2qZt0X8u/rXTjOGQtFe'),
(NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'lutalidavid45@gmail.', 'lutalidavid45@gmail.com', '$2y$10$TfVx/dlpxWM/pW7GfEHvjuP.7TqD8zk1J2vIl9s0pwT7sMtqf9oqu');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `meal`
--
ALTER TABLE `meal`
  ADD PRIMARY KEY (`meal_ID`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
