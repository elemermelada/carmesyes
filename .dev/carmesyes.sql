-- phpMyAdmin SQL Dump
-- version 4.9.11
-- https://www.phpmyadmin.net/
--
-- Host: db5014834824.hosting-data.io
-- Generation Time: Nov 28, 2023 at 10:32 PM
-- Server version: 8.0.32
-- PHP Version: 7.0.33-0+deb9u12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `testdb`
--
CREATE DATABASE IF NOT EXISTS `testdb` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `testdb`;

-- --------------------------------------------------------

--
-- Table structure for table `carmesyes_devices`
--

CREATE TABLE `carmesyes_devices` (
  `id` int NOT NULL,
  `name` text COLLATE utf8mb4_general_ci NOT NULL,
  `ip` text COLLATE utf8mb4_general_ci NOT NULL,
  `last_ping` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `carmesyes_devices`
--

-- --------------------------------------------------------

--
-- Table structure for table `carmesyes_pinglog`
--

CREATE TABLE `carmesyes_pinglog` (
  `date` datetime NOT NULL,
  `ip` text COLLATE utf8mb4_general_ci NOT NULL,
  `device` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `carmesyes_wakeup`
--

CREATE TABLE `carmesyes_wakeup` (
  `id` int NOT NULL,
  `name` text COLLATE utf8mb4_general_ci NOT NULL,
  `mac_address` text COLLATE utf8mb4_general_ci NOT NULL,
  `device` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `carmesyes_devices`
--
ALTER TABLE `carmesyes_devices`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`(16));

--
-- Indexes for table `carmesyes_pinglog`
--
ALTER TABLE `carmesyes_pinglog`
  ADD UNIQUE KEY `date_device` (`date`,`device`) USING BTREE,
  ADD KEY `pinglog_device` (`device`);

--
-- Indexes for table `carmesyes_wakeup`
--
ALTER TABLE `carmesyes_wakeup`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`(16)),
  ADD KEY `wakeup_device` (`device`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `carmesyes_devices`
--
ALTER TABLE `carmesyes_devices`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `carmesyes_wakeup`
--
ALTER TABLE `carmesyes_wakeup`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `carmesyes_pinglog`
--
ALTER TABLE `carmesyes_pinglog`
  ADD CONSTRAINT `pinglog_device` FOREIGN KEY (`device`) REFERENCES `carmesyes_devices` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE;

--
-- Constraints for table `carmesyes_wakeup`
--
ALTER TABLE `carmesyes_wakeup`
  ADD CONSTRAINT `wakeup_device` FOREIGN KEY (`device`) REFERENCES `carmesyes_devices` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
