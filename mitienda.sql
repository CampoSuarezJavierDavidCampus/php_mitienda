-- phpMyAdmin SQL Dump
-- version 5.1.1deb5ubuntu1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jun 06, 2023 at 06:18 PM
-- Server version: 8.0.33-0ubuntu0.22.04.2
-- PHP Version: 8.1.2-1ubuntu2.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mitienda`
--

-- --------------------------------------------------------

--
-- Table structure for table `Departamentos`
--

CREATE TABLE `Departamentos` (
  `Departamento_id` int NOT NULL,
  `nombre` varchar(30) NOT NULL,
  `region_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `Paises`
--

CREATE TABLE `Paises` (
  `pais_id` int NOT NULL,
  `nombre` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `Paises`
--

INSERT INTO `Paises` (`pais_id`, `nombre`) VALUES
(19, 'venezuela'),
(20, 'madrid'),
(21, 'brazil');

-- --------------------------------------------------------

--
-- Table structure for table `Regiones`
--

CREATE TABLE `Regiones` (
  `region_id` int NOT NULL,
  `nombre` varchar(30) NOT NULL,
  `pais_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `Departamentos`
--
ALTER TABLE `Departamentos`
  ADD PRIMARY KEY (`Departamento_id`),
  ADD KEY `fk_region_id` (`region_id`);

--
-- Indexes for table `Paises`
--
ALTER TABLE `Paises`
  ADD PRIMARY KEY (`pais_id`);

--
-- Indexes for table `Regiones`
--
ALTER TABLE `Regiones`
  ADD PRIMARY KEY (`region_id`),
  ADD KEY `fk_pais_id` (`pais_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `Departamentos`
--
ALTER TABLE `Departamentos`
  MODIFY `Departamento_id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `Paises`
--
ALTER TABLE `Paises`
  MODIFY `pais_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `Regiones`
--
ALTER TABLE `Regiones`
  MODIFY `region_id` int NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `Departamentos`
--
ALTER TABLE `Departamentos`
  ADD CONSTRAINT `fk_region_id` FOREIGN KEY (`region_id`) REFERENCES `Regiones` (`region_id`);

--
-- Constraints for table `Regiones`
--
ALTER TABLE `Regiones`
  ADD CONSTRAINT `fk_pais_id` FOREIGN KEY (`pais_id`) REFERENCES `Paises` (`pais_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
