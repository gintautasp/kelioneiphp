-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 07, 2019 at 08:25 AM
-- Server version: 10.1.40-MariaDB
-- PHP Version: 7.3.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `keliones`
--

-- --------------------------------------------------------

--
-- Table structure for table `akcijos`
--

CREATE TABLE `akcijos` (
  `id` int(10) UNSIGNED NOT NULL,
  `nuolaida` varchar(255) COLLATE utf8_lithuanian_ci DEFAULT NULL,
  `pav` varchar(255) COLLATE utf8_lithuanian_ci DEFAULT NULL,
  `procentai` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_lithuanian_ci;

-- --------------------------------------------------------

--
-- Table structure for table `keliones`
--

CREATE TABLE `keliones` (
  `id` int(10) UNSIGNED NOT NULL,
  `pav` varchar(255) COLLATE utf8_lithuanian_ci NOT NULL,
  `apras` text COLLATE utf8_lithuanian_ci,
  `flag_poilsines` tinyint(3) UNSIGNED DEFAULT NULL,
  `flag_pazintines` tinyint(3) UNSIGNED DEFAULT NULL,
  `flag_viskas_isk` tinyint(3) UNSIGNED DEFAULT NULL,
  `flag_laisv_pasir` tinyint(3) UNSIGNED DEFAULT NULL,
  `akcijos_id` int(10) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_lithuanian_ci;

--
-- Dumping data for table `keliones`
--

INSERT INTO `keliones` (`id`, `pav`, `apras`, `flag_poilsines`, `flag_pazintines`, `flag_viskas_isk`, `flag_laisv_pasir`, `akcijos_id`) VALUES
(1, 'po LDK pilis', 'visos LDK pilys Baltarusijoje', 1, 1, 1, 1, NULL),
(2, 'Ventės ragas', 'pažintis su Ventės ragu ir jos aplinką, su paukščių žiedavimu', 1, 1, NULL, 1, NULL),
(3, 'po Žemaitiją', 'ratuku po Žemaitijos miestukus ir kaimukus', NULL, 1, 1, NULL, NULL),
(5, 'po Aukštaitiją', 'kelione ratuku po Aukštaitijos miestukus', 1, NULL, 1, NULL, NULL),
(6, 'po Suvalkiją', 'kelionė ratais kvadratais', 1, 1, NULL, 1, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `klientai`
--

CREATE TABLE `klientai` (
  `id` int(10) UNSIGNED NOT NULL,
  `pav` varchar(255) COLLATE utf8_lithuanian_ci NOT NULL,
  `flag_poilsines` tinyint(3) UNSIGNED DEFAULT NULL,
  `flag_pazintines` tinyint(3) UNSIGNED DEFAULT NULL,
  `flag_viskas_isk` tinyint(3) UNSIGNED DEFAULT NULL,
  `flag_laisv_pasir` tinyint(3) UNSIGNED DEFAULT NULL,
  `apras` varchar(255) COLLATE utf8_lithuanian_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_lithuanian_ci;

--
-- Dumping data for table `klientai`
--

INSERT INTO `klientai` (`id`, `pav`, `flag_poilsines`, `flag_pazintines`, `flag_viskas_isk`, `flag_laisv_pasir`, `apras`) VALUES
(1, 'Alius Big Bosas', NULL, 1, NULL, 1, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `klientai_keliones`
--

CREATE TABLE `klientai_keliones` (
  `id` int(10) UNSIGNED NOT NULL,
  `klientai_id` int(10) UNSIGNED NOT NULL,
  `keliones_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_lithuanian_ci;

--
-- Dumping data for table `klientai_keliones`
--

INSERT INTO `klientai_keliones` (`id`, `klientai_id`, `keliones_id`) VALUES
(1, 1, 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `akcijos`
--
ALTER TABLE `akcijos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `keliones`
--
ALTER TABLE `keliones`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FKlfvdrked3fwrv3ljol2dprs9s` (`akcijos_id`);

--
-- Indexes for table `klientai`
--
ALTER TABLE `klientai`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `klientai_keliones`
--
ALTER TABLE `klientai_keliones`
  ADD PRIMARY KEY (`id`),
  ADD KEY `klientai_id` (`klientai_id`),
  ADD KEY `keliones_id` (`keliones_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `akcijos`
--
ALTER TABLE `akcijos`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `keliones`
--
ALTER TABLE `keliones`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `klientai`
--
ALTER TABLE `klientai`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `klientai_keliones`
--
ALTER TABLE `klientai_keliones`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `keliones`
--
ALTER TABLE `keliones`
  ADD CONSTRAINT `FKlfvdrked3fwrv3ljol2dprs9s` FOREIGN KEY (`akcijos_id`) REFERENCES `akcijos` (`id`);

--
-- Constraints for table `klientai_keliones`
--
ALTER TABLE `klientai_keliones`
  ADD CONSTRAINT `FK96vtfqnmorln9hquniggsrh4k` FOREIGN KEY (`klientai_id`) REFERENCES `klientai` (`id`),
  ADD CONSTRAINT `FKfoe7hjv8un93hlejhpkulu6gb` FOREIGN KEY (`keliones_id`) REFERENCES `keliones` (`id`),
  ADD CONSTRAINT `klientai_keliones_ibfk_2` FOREIGN KEY (`klientai_id`) REFERENCES `klientai` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `klientai_keliones_ibfk_3` FOREIGN KEY (`keliones_id`) REFERENCES `keliones` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
