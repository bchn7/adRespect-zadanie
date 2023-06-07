-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: database:3306
-- Generation Time: Jun 07, 2023 at 08:49 PM
-- Server version: 8.0.33
-- PHP Version: 8.1.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `adrespect`
--

-- --------------------------------------------------------

--
-- Table structure for table `currency_conversions`
--

CREATE TABLE `currency_conversions` (
  `id` int NOT NULL,
  `amount` decimal(10,2) NOT NULL,
  `source_currency` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `target_currency` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `converted_amount` decimal(10,2) NOT NULL,
  `conversion_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `currency_conversions`
--

INSERT INTO `currency_conversions` (`id`, `amount`, `source_currency`, `target_currency`, `converted_amount`, `conversion_date`) VALUES
(43, 132.00, 'HKD', 'EUR', 1115.77, '2023-06-07 00:00:00'),
(44, 423.00, 'CLP', 'IDR', 0.00, '2023-06-07 00:00:00'),
(45, 2233.00, 'HUF', 'NZD', 569415.00, '2023-06-07 08:15:09'),
(46, 123.00, 'USD', 'AUD', 82.20, '2023-06-07 08:15:17');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `currency_conversions`
--
ALTER TABLE `currency_conversions`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `currency_conversions`
--
ALTER TABLE `currency_conversions`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
