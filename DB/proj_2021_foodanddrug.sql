-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 15, 2021 at 07:37 AM
-- Server version: 10.1.31-MariaDB
-- PHP Version: 7.2.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `proj_2021_foodanddrug`
--

-- --------------------------------------------------------

--
-- Table structure for table `drugs`
--

CREATE TABLE `drugs` (
  `id` int(11) NOT NULL,
  `userId` int(11) NOT NULL,
  `barcode` varchar(30) NOT NULL,
  `type` tinytext NOT NULL,
  `name` tinytext NOT NULL,
  `drugs_class` tinytext NOT NULL,
  `dom` date NOT NULL,
  `doe` date NOT NULL,
  `address` tinytext NOT NULL,
  `status` int(1) NOT NULL DEFAULT '0',
  `addOn` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `drugs`
--

INSERT INTO `drugs` (`id`, `userId`, `barcode`, `type`, `name`, `drugs_class`, `dom`, `doe`, `address`, `status`, `addOn`) VALUES
(1, 2, 'SAD453', 'Cirop', 'Kunomacim', 'Human Drugs,Human Biologics', '2021-11-06', '2021-12-09', '106B HAMMARUWA WAY', 1, '2021-11-05 07:22:12');

-- --------------------------------------------------------

--
-- Table structure for table `food`
--

CREATE TABLE `food` (
  `id` int(11) NOT NULL,
  `userId` int(11) NOT NULL,
  `regNo` varchar(20) NOT NULL,
  `name` varchar(30) NOT NULL,
  `dom` date NOT NULL,
  `doe` date NOT NULL,
  `manufacturer` tinytext NOT NULL,
  `ingredient` tinytext NOT NULL,
  `status` tinyint(1) NOT NULL,
  `addOn` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `food`
--

INSERT INTO `food` (`id`, `userId`, `regNo`, `name`, `dom`, `doe`, `manufacturer`, `ingredient`, `status`, `addOn`) VALUES
(1, 2, 'ND/19/001', 'Pie Not', '2021-11-12', '2021-11-17', 'Yale food', 'Gradnut, sugar', 1, '2021-11-05 16:00:45');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `company` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  `role` enum('1','2') NOT NULL DEFAULT '1',
  `status` tinyint(1) NOT NULL DEFAULT '0',
  `addedOn` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `company`, `email`, `password`, `role`, `status`, `addedOn`) VALUES
(1, 'Admin Admin', 'Admin', 'admin@admin.com', 'd033e22ae348aeb5660fc2140aec35850c4da997', '1', 1, '2021-11-04 13:27:34'),
(2, 'Julius Haruna', 'SueÃ±os Inc.', 'users@gmail.com', 'dfe51a31e02f866a21fbd334d8d7cbb22e4ced2f', '2', 1, '2021-11-04 13:52:55'),
(3, 'Kenneth Oduh Peter', 'Amajis Fundamentals Co. Int\'l', 'amajis@gmail.com', '8cb2237d0679ca88db6464eac60da96345513964', '2', 1, '2021-11-05 21:49:49');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `drugs`
--
ALTER TABLE `drugs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `food`
--
ALTER TABLE `food`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `drugs`
--
ALTER TABLE `drugs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `food`
--
ALTER TABLE `food`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
