-- phpMyAdmin SQL Dump
-- version 5.1.1deb5ubuntu1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jun 08, 2023 at 03:51 PM
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
-- Table structure for table `Ciudades`
--

CREATE TABLE `Ciudades` (
  `ciudad_id` int NOT NULL,
  `ciudad_nombre` varchar(30) NOT NULL,
  `departamento_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `Departamentos`
--

CREATE TABLE `Departamentos` (
  `departamento_id` int NOT NULL,
  `departamento_nombre` varchar(30) NOT NULL,
  `pais_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `Paises`
--

CREATE TABLE `Paises` (
  `pais_id` int NOT NULL,
  `pais_nombre` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `Personas`
--

CREATE TABLE `Personas` (
  `persona_id` varchar(15) NOT NULL,
  `persona_nombre` varchar(60) NOT NULL,
  `persona_apellido` varchar(60) NOT NULL,
  `persona_fecha_nacimiento` date NOT NULL,
  `ciudad_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `Tipos_de_casa`
--

CREATE TABLE `Tipos_de_casa` (
  `tipo_de_casa_id` int NOT NULL,
  `tipo_de_casa_nombre` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `Viviendas`
--

CREATE TABLE `Viviendas` (
  `vivienda_id` int NOT NULL,
  `vivienda_habitaciones` int DEFAULT '0',
  `vivienda_duchas` int DEFAULT '0',
  `vivienda_cocinas` int DEFAULT '0',
  `vivienda_salas` int DEFAULT '0',
  `vivienda_patios` int DEFAULT '0',
  `vivienda_picinas` int DEFAULT '0',
  `vivienda_barbacoas` int DEFAULT '0',
  `vivienda_img` varchar(90) NOT NULL,
  `persona_id` varchar(30) NOT NULL,
  `ciudad_id` int NOT NULL,
  `tipo_de_casa_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `Ciudades`
--
ALTER TABLE `Ciudades`
  ADD PRIMARY KEY (`ciudad_id`),
  ADD KEY `departamento_id` (`departamento_id`);

--
-- Indexes for table `Departamentos`
--
ALTER TABLE `Departamentos`
  ADD PRIMARY KEY (`departamento_id`),
  ADD KEY `pais_id` (`pais_id`);

--
-- Indexes for table `Paises`
--
ALTER TABLE `Paises`
  ADD PRIMARY KEY (`pais_id`),
  ADD UNIQUE KEY `pais_nombre` (`pais_nombre`);

--
-- Indexes for table `Personas`
--
ALTER TABLE `Personas`
  ADD PRIMARY KEY (`persona_id`),
  ADD KEY `ciudad_id` (`ciudad_id`);

--
-- Indexes for table `Tipos_de_casa`
--
ALTER TABLE `Tipos_de_casa`
  ADD PRIMARY KEY (`tipo_de_casa_id`);

--
-- Indexes for table `Viviendas`
--
ALTER TABLE `Viviendas`
  ADD PRIMARY KEY (`vivienda_id`),
  ADD KEY `persona_id` (`persona_id`),
  ADD KEY `ciudad_id` (`ciudad_id`),
  ADD KEY `fk_tipo_casa_id` (`tipo_de_casa_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `Ciudades`
--
ALTER TABLE `Ciudades`
  MODIFY `ciudad_id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `Departamentos`
--
ALTER TABLE `Departamentos`
  MODIFY `departamento_id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `Paises`
--
ALTER TABLE `Paises`
  MODIFY `pais_id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `Tipos_de_casa`
--
ALTER TABLE `Tipos_de_casa`
  MODIFY `tipo_de_casa_id` int NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `Ciudades`
--
ALTER TABLE `Ciudades`
  ADD CONSTRAINT `Ciudades_ibfk_1` FOREIGN KEY (`departamento_id`) REFERENCES `Departamentos` (`departamento_id`);

--
-- Constraints for table `Departamentos`
--
ALTER TABLE `Departamentos`
  ADD CONSTRAINT `Departamentos_ibfk_1` FOREIGN KEY (`pais_id`) REFERENCES `Paises` (`pais_id`);

--
-- Constraints for table `Personas`
--
ALTER TABLE `Personas`
  ADD CONSTRAINT `Personas_ibfk_1` FOREIGN KEY (`ciudad_id`) REFERENCES `Ciudades` (`ciudad_id`);

--
-- Constraints for table `Viviendas`
--
ALTER TABLE `Viviendas`
  ADD CONSTRAINT `fk_tipo_casa_id` FOREIGN KEY (`tipo_de_casa_id`) REFERENCES `Tipos_de_casa` (`tipo_de_casa_id`),
  ADD CONSTRAINT `Viviendas_ibfk_1` FOREIGN KEY (`persona_id`) REFERENCES `Personas` (`persona_id`),
  ADD CONSTRAINT `Viviendas_ibfk_2` FOREIGN KEY (`ciudad_id`) REFERENCES `Ciudades` (`ciudad_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;