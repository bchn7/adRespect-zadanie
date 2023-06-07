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
-- Table structure for table `exchange_rates`
--

CREATE TABLE `exchange_rates` (
  `id` int NOT NULL,
  `code` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `rate` decimal(10,2) NOT NULL,
  `updatedate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `exchange_rates`
--

INSERT INTO `exchange_rates` (`id`, `code`, `name`, `rate`, `updatedate`) VALUES
(34, 'THB', 'bat (Tajlandia)', 0.12, '2023-06-07'),
(35, 'USD', 'dolar amerykański', 4.19, '2023-06-07'),
(36, 'AUD', 'dolar australijski', 2.80, '2023-06-07'),
(37, 'HKD', 'dolar Hongkongu', 0.53, '2023-06-07'),
(38, 'CAD', 'dolar kanadyjski', 3.13, '2023-06-07'),
(39, 'NZD', 'dolar nowozelandzki', 2.55, '2023-06-07'),
(40, 'SGD', 'dolar singapurski', 3.11, '2023-06-07'),
(41, 'EUR', 'euro', 4.48, '2023-06-07'),
(42, 'HUF', 'forint (Węgry)', 0.01, '2023-06-07'),
(43, 'CHF', 'frank szwajcarski', 4.62, '2023-06-07'),
(44, 'GBP', 'funt szterling', 5.21, '2023-06-07'),
(45, 'UAH', 'hrywna (Ukraina)', 0.11, '2023-06-07'),
(46, 'JPY', 'jen (Japonia)', 0.03, '2023-06-07'),
(47, 'CZK', 'korona czeska', 0.19, '2023-06-07'),
(48, 'DKK', 'korona duńska', 0.60, '2023-06-07'),
(49, 'ISK', 'korona islandzka', 0.03, '2023-06-07'),
(50, 'NOK', 'korona norweska', 0.38, '2023-06-07'),
(51, 'SEK', 'korona szwedzka', 0.38, '2023-06-07'),
(52, 'RON', 'lej rumuński', 0.90, '2023-06-07'),
(53, 'BGN', 'lew (Bułgaria)', 2.29, '2023-06-07'),
(54, 'TRY', 'lira turecka', 0.18, '2023-06-07'),
(55, 'ILS', 'nowy izraelski szekel', 1.15, '2023-06-07'),
(56, 'CLP', 'peso chilijskie', 0.01, '2023-06-07'),
(57, 'PHP', 'peso filipińskie', 0.07, '2023-06-07'),
(58, 'MXN', 'peso meksykańskie', 0.24, '2023-06-07'),
(59, 'ZAR', 'rand (Republika Południowej Afryki)', 0.22, '2023-06-07'),
(60, 'BRL', 'real (Brazylia)', 0.85, '2023-06-07'),
(61, 'MYR', 'ringgit (Malezja)', 0.91, '2023-06-07'),
(62, 'IDR', 'rupia indonezyjska', 0.00, '2023-06-07'),
(63, 'INR', 'rupia indyjska', 0.05, '2023-06-07'),
(64, 'KRW', 'won południowokoreański', 0.00, '2023-06-07'),
(65, 'CNY', 'yuan renminbi (Chiny)', 0.59, '2023-06-07'),
(66, 'XDR', 'SDR (MFW)', 5.57, '2023-06-07');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `exchange_rates`
--
ALTER TABLE `exchange_rates`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `exchange_rates`
--
ALTER TABLE `exchange_rates`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=67;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
