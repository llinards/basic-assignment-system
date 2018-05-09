-- phpMyAdmin SQL Dump
-- version 4.7.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: May 09, 2018 at 01:24 PM
-- Server version: 5.6.35
-- PHP Version: 7.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `printful`
--
CREATE DATABASE IF NOT EXISTS `printful` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `printful`;

-- --------------------------------------------------------

--
-- Table structure for table `atbildes`
--

CREATE TABLE `atbildes` (
  `atbildes_id` int(3) NOT NULL,
  `atbilde` varchar(255) NOT NULL,
  `jautajuma_id` int(3) DEFAULT NULL,
  `testa_id` int(3) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `atbildes`
--

INSERT INTO `atbildes` (`atbildes_id`, `atbilde`, `jautajuma_id`, `testa_id`) VALUES
(1, '100 gadi', 1, 1),
(2, '150 gadi', 1, 1),
(3, '88 gadi', 1, 1),
(4, '25 gadi', 1, 1),
(5, 'EUR', 2, 1),
(6, 'USD', 2, 1),
(7, 'CAD', 2, 1),
(8, 'GBP', 2, 1),
(9, 'Raimonds Bergmanis', 3, 1),
(10, 'Raimonds Vējonis', 3, 1),
(11, 'Andris Bērziņš', 3, 1),
(12, 'Valdis Zalters', 3, 1),
(13, '2000.gadā', 4, 1),
(14, '2004.gadā', 4, 1),
(15, '2012.gadā', 4, 1),
(16, '1991.gadā', 4, 1),
(17, 'Donalds Trumps', 5, 2),
(18, 'Baraks Obama', 5, 2),
(19, 'Džordžs Bušs', 5, 2),
(20, 'Hilarija Klintone', 5, 2),
(21, '51 štats', 6, 2),
(22, '51 štats un 1 federālais apgabals', 6, 2),
(23, '50 štati un 2 federālie apgabali', 6, 2),
(24, '52 štati', 6, 2),
(25, 'Ņujorka', 7, 2),
(26, 'Losandželosa', 7, 2),
(27, 'Vašingtona', 7, 2),
(28, 'Filadelfija', 7, 2),
(29, 'Kalifornija', 8, 2),
(30, 'Teksasa', 8, 2),
(31, 'Aļaska', 8, 2),
(32, 'Ņujorka', 8, 2),
(33, '12 provinces', 9, 3),
(34, '11 provinces un 2 teritorijas', 9, 3),
(35, '10 provinces un 3 teritorijas', 9, 3),
(36, '9 provinces un 4 teritorijas', 9, 3),
(37, 'Kvebeka', 10, 3),
(38, 'Toronto', 10, 3),
(39, 'Vankūvera', 10, 3),
(40, 'Otava', 10, 3),
(41, 'Angļu', 11, 3),
(42, 'Franču', 11, 3),
(43, 'Angļu, franču', 11, 3),
(44, 'Angļu, spāņu', 11, 3),
(45, 'Džastins Bībers', 12, 3),
(46, 'Džastins Trudo', 12, 3),
(47, 'Elizabete II ', 12, 3),
(48, 'Žilija Pajeta', 12, 3);

-- --------------------------------------------------------

--
-- Table structure for table `atbildes_uz_jautajumiem`
--

CREATE TABLE `atbildes_uz_jautajumiem` (
  `id` int(3) NOT NULL,
  `lietotaja_vards` varchar(255) NOT NULL,
  `testa_id` int(3) DEFAULT NULL,
  `jautajuma_id` int(3) DEFAULT NULL,
  `atbildes_id` int(3) DEFAULT NULL,
  `datums` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `jautajumi`
--

CREATE TABLE `jautajumi` (
  `jautajuma_id` int(3) NOT NULL,
  `jautajums` varchar(255) NOT NULL,
  `pareizas_atbildes_id` int(3) NOT NULL,
  `testa_id` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `jautajumi`
--

INSERT INTO `jautajumi` (`jautajuma_id`, `jautajums`, `pareizas_atbildes_id`, `testa_id`) VALUES
(1, 'Cik Latvijai paliek gadu 2018.gada 18.novembrī?', 1, 1),
(2, 'Kāda valūta ir Latvijā?', 5, 1),
(3, 'Kas ir šī brīžā Valsts prezidents?', 10, 1),
(4, 'Kurā gadā Latvija pievienojās Eiropas Savienībai?', 14, 1),
(5, 'Kas ir šī brīža ASV prezidents?', 17, 2),
(6, 'Cik štatu ir ASV?', 22, 2),
(7, 'Kas ir ASV galvaspilsēta?', 27, 2),
(8, 'Lielākais ASV štats pēc teritorijas', 31, 2),
(9, 'Cik provinces ir Kanādā?', 35, 3),
(10, 'Kas ir Kanādas galvaspilsēta?', 40, 3),
(11, 'Kāda vai kādas ir oficiālās valodas Kanādā?', 43, 3),
(12, 'Kā sauc Kanādas premjerministru?', 46, 3);

-- --------------------------------------------------------

--
-- Table structure for table `rezultati`
--

CREATE TABLE `rezultati` (
  `id` int(3) NOT NULL,
  `vards` varchar(255) NOT NULL,
  `testa_id` int(3) DEFAULT NULL,
  `pareizas_atbildes` int(3) DEFAULT NULL,
  `kopa_jautajumi` int(3) DEFAULT NULL,
  `datums` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `testi`
--

CREATE TABLE `testi` (
  `testa_id` int(3) NOT NULL,
  `testa_nosaukums` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `testi`
--

INSERT INTO `testi` (`testa_id`, `testa_nosaukums`) VALUES
(1, 'Par Latviju!'),
(2, 'Par ASV!'),
(3, 'Par Kanādu!');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `atbildes`
--
ALTER TABLE `atbildes`
  ADD PRIMARY KEY (`atbildes_id`),
  ADD KEY `jautajuma_id` (`jautajuma_id`),
  ADD KEY `testa_id` (`testa_id`),
  ADD KEY `atbilde` (`atbilde`(20));

--
-- Indexes for table `atbildes_uz_jautajumiem`
--
ALTER TABLE `atbildes_uz_jautajumiem`
  ADD PRIMARY KEY (`id`),
  ADD KEY `atb_testa_id` (`testa_id`),
  ADD KEY `atb_jautajuma_id` (`jautajuma_id`),
  ADD KEY `atb_atbildes_id` (`atbildes_id`),
  ADD KEY `lietotaja_vards` (`lietotaja_vards`(10));

--
-- Indexes for table `jautajumi`
--
ALTER TABLE `jautajumi`
  ADD PRIMARY KEY (`jautajuma_id`),
  ADD KEY `jaut_testa_id` (`testa_id`),
  ADD KEY `jaut_pareizas_atbildes_id` (`pareizas_atbildes_id`),
  ADD KEY `jautajums` (`jautajums`(20));

--
-- Indexes for table `rezultati`
--
ALTER TABLE `rezultati`
  ADD PRIMARY KEY (`id`),
  ADD KEY `rez_testa_id` (`testa_id`);

--
-- Indexes for table `testi`
--
ALTER TABLE `testi`
  ADD PRIMARY KEY (`testa_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `atbildes`
--
ALTER TABLE `atbildes`
  MODIFY `atbildes_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;
--
-- AUTO_INCREMENT for table `atbildes_uz_jautajumiem`
--
ALTER TABLE `atbildes_uz_jautajumiem`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;
--
-- AUTO_INCREMENT for table `jautajumi`
--
ALTER TABLE `jautajumi`
  MODIFY `jautajuma_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `rezultati`
--
ALTER TABLE `rezultati`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `testi`
--
ALTER TABLE `testi`
  MODIFY `testa_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `atbildes`
--
ALTER TABLE `atbildes`
  ADD CONSTRAINT `jautajuma_id` FOREIGN KEY (`jautajuma_id`) REFERENCES `jautajumi` (`jautajuma_id`),
  ADD CONSTRAINT `testa_id` FOREIGN KEY (`testa_id`) REFERENCES `testi` (`testa_id`);

--
-- Constraints for table `atbildes_uz_jautajumiem`
--
ALTER TABLE `atbildes_uz_jautajumiem`
  ADD CONSTRAINT `atb_atbildes_id` FOREIGN KEY (`atbildes_id`) REFERENCES `atbildes` (`atbildes_id`),
  ADD CONSTRAINT `atb_jautajuma_id` FOREIGN KEY (`jautajuma_id`) REFERENCES `jautajumi` (`jautajuma_id`),
  ADD CONSTRAINT `atb_testa_id` FOREIGN KEY (`testa_id`) REFERENCES `testi` (`testa_id`);

--
-- Constraints for table `jautajumi`
--
ALTER TABLE `jautajumi`
  ADD CONSTRAINT `jaut_pareizas_atbildes_id` FOREIGN KEY (`pareizas_atbildes_id`) REFERENCES `atbildes` (`atbildes_id`),
  ADD CONSTRAINT `jaut_testa_id` FOREIGN KEY (`testa_id`) REFERENCES `testi` (`testa_id`);

--
-- Constraints for table `rezultati`
--
ALTER TABLE `rezultati`
  ADD CONSTRAINT `rez_testa_id` FOREIGN KEY (`testa_id`) REFERENCES `testi` (`testa_id`);
