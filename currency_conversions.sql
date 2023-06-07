-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: database:3306
-- Generation Time: Cze 07, 2023 at 10:56 AM
-- Wersja serwera: 10.6.13-MariaDB-1:10.6.13+maria~ubu2004
-- Wersja PHP: 8.1.19

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
-- Struktura tabeli dla tabeli `currency_conversions`
--

CREATE TABLE `currency_conversions` (
  `id` int(11) NOT NULL,
  `amount` decimal(10,2) NOT NULL,
  `source_currency` varchar(255) NOT NULL,
  `target_currency` varchar(255) NOT NULL,
  `converted_amount` decimal(10,2) NOT NULL,
  `cunversion_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `currency_conversions`
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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
