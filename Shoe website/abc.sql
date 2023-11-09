-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 06, 2023 at 05:55 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `abc`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `userID` int(20) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `phoneNumber` varchar(20) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`userID`, `name`, `email`, `phoneNumber`, `password`) VALUES
(1, 'navod', 'navod@gmail.com', '0764447198', '10ef5ca7bb27c90a6c775445dc7a63c9'),
(2, 'peheliya', 'peheliya@gmail.com', '0472223307', '7cfaf3bf4484194668712b6be4c3d986');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `productID` int(20) NOT NULL,
  `productName` varchar(50) NOT NULL,
  `quantity` int(6) NOT NULL,
  `price` varchar(15) NOT NULL,
  `image` varchar(50) NOT NULL,
  `description` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`productID`, `productName`, `quantity`, `price`, `image`, `description`) VALUES
(15, 'DSI Leather shoe', 5, '9899', 'Male Formal-1.jpg', 'DSI Leather Shoe   Colour : Black  Size : 28-40'),
(16, 'FILA sport shoe', 7, '1299', 'Female Sport-1.jpg', 'FILA Sport Shoe  Colour : Blue & White  Size : 32-40'),
(17, 'ADIDAS Male Casual', 7, '9299', 'Male Casual-3.jpg', 'ADIDAS Male Casual  Colour : Blue  Size : 30-42'),
(18, 'Female Formal Shoes', 5, '6599', 'Female Formal-3.jpg', 'Female Formal Shoes  Colour : Pink  Size :22-36'),
(19, 'Men Formal Shoe', 9, '5799', 'Male Formal-4.jpg', 'Men Formal  Colour : Black  Size : 26-36'),
(20, 'Male Sport Shoes', 12, '8999', 'Male Sport-2.jpg', 'Male Sport Shoes  colour : Red  Size : 24-42'),
(21, 'Female Casual Shoes', 9, '9299', 'Female Casual-2.jpg', 'Female Reebook Casual Shoes  Colour : Pink  Size : 32-40'),
(22, 'Men Leather Shoe', 7, '13499', 'Male Formal-3.jpg', 'Men Leather Shoe  Colour : Brown  Size  : 32-36'),
(23, 'Female Formal Shoes', 12, '9899', 'Female Formal-6.jpg', 'Female Formal Shoes  Colour : Black  Size :22-36'),
(24, 'Male Sport Shoes', 21, '12399', 'Male Sport-3.jpg', 'Male Sport Shoes  Colour : Black  Size : 26-34'),
(25, 'Male Casual Shoes', 5, '9299', 'Male Casual-4.jpg', 'Men Casual  Colour : Ash  Size : 26-36'),
(26, 'Female Sport Shoes', 7, '11299', 'Female Sport-4.jpg', 'Female Sport Shoes  Colour : Yellow Size :22-36');

-- --------------------------------------------------------

--
-- Table structure for table `superadmin`
--

CREATE TABLE `superadmin` (
  `userID` int(20) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `phoneNumber` varchar(20) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `superadmin`
--

INSERT INTO `superadmin` (`userID`, `name`, `email`, `phoneNumber`, `password`) VALUES
(1, 'navod', 'navod@gmail.com', '0764447198', '10ef5ca7bb27c90a6c775445dc7a63c9');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `userID` int(20) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `phoneNumber` varchar(20) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`userID`, `name`, `email`, `phoneNumber`, `password`) VALUES
(1, 'navod', 'navod@gmail.com', '0764447198', '10ef5ca7bb27c90a6c775445dc7a63c9'),
(3, 'peheliya', 'peheliya@gmail.com', '0472223307', '7cfaf3bf4484194668712b6be4c3d986'),
(6, 'danuka', 'danuka@gmail.com', '0764447198', 'efa849df2a2399b9d931ac6b281e3ced');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`userID`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`productID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`userID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `userID` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `productID` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `userID` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
