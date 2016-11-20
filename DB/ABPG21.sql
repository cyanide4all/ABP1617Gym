-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Nov 20, 2016 at 06:48 PM
-- Server version: 5.7.16-0ubuntu0.16.04.1
-- PHP Version: 7.0.8-0ubuntu0.16.04.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ABPG21`
--
CREATE DATABASE IF NOT EXISTS `ABPG21` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `ABPG21`;

-- --------------------------------------------------------

--
-- Table structure for table `Actividad`
--

CREATE TABLE `Actividad` (
  `idActividad` int(11) NOT NULL,
  `nomActividad` varchar(20) NOT NULL,
  `tipoAct` varchar(10) NOT NULL,
  `numPlazas` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `Actividad`
--

INSERT INTO `Actividad` (`idActividad`, `nomActividad`, `tipoAct`, `numPlazas`) VALUES
(5, 'Actividad Individual', 'Individual', 0),
(6, 'Actividad Grupal', 'Grupal', 12),
(7, 'Actividad Grupal 2', 'Grupal', 1);

-- --------------------------------------------------------

--
-- Table structure for table `Ejercicio`
--

CREATE TABLE `Ejercicio` (
  `idEjercicio` int(11) NOT NULL,
  `nomEjercicio` varchar(20) NOT NULL,
  `descripcion` varchar(150) DEFAULT NULL,
  `categoria` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `Ejercicio`
--

INSERT INTO `Ejercicio` (`idEjercicio`, `nomEjercicio`, `descripcion`, `categoria`) VALUES
(14, 'Ejercicio1', '', 'Brazo'),
(15, 'Ejercicio2', '', 'Pierna'),
(16, 'Ejercicio3', 'hue', 'Espalda');

-- --------------------------------------------------------

--
-- Table structure for table `Estadisticas`
--

CREATE TABLE `Estadisticas` (
  `TablaEjercicio_Ejercicio_idEjercicio` int(11) NOT NULL,
  `TablaEjercicio_Tabla_idTabla` int(11) NOT NULL,
  `Usuario_idUsuario` int(11) NOT NULL,
  `fecha` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `Estadisticas`
--

INSERT INTO `Estadisticas` (`TablaEjercicio_Ejercicio_idEjercicio`, `TablaEjercicio_Tabla_idTabla`, `Usuario_idUsuario`, `fecha`) VALUES
(14, 11, 8, '2016-11-20 18:02:18'),
(14, 11, 8, '2016-11-20 18:02:57'),
(15, 11, 8, '2016-11-20 18:02:18'),
(16, 11, 8, '2016-11-20 18:02:57');

-- --------------------------------------------------------

--
-- Table structure for table `Reserva`
--

CREATE TABLE `Reserva` (
  `Usuario_idUsuario` int(11) NOT NULL,
  `Sesion_idSesion` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `Sesion`
--

CREATE TABLE `Sesion` (
  `idSesion` int(11) NOT NULL,
  `numPlazasOcupadas` int(11) DEFAULT NULL,
  `fecha` datetime DEFAULT NULL,
  `Actividad_idActividad` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `Sesion`
--

INSERT INTO `Sesion` (`idSesion`, `numPlazasOcupadas`, `fecha`, `Actividad_idActividad`) VALUES
(10, NULL, '2222-12-22 22:00:00', 6),
(14, 0, '1010-10-10 00:00:00', 7);

-- --------------------------------------------------------

--
-- Table structure for table `Sigue`
--

CREATE TABLE `Sigue` (
  `Tabla_idTabla` int(11) NOT NULL,
  `Usuario_idUsuario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `Tabla`
--

CREATE TABLE `Tabla` (
  `idTabla` int(11) NOT NULL,
  `nomTabla` varchar(25) NOT NULL,
  `descripcion` varchar(150) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `Tabla`
--

INSERT INTO `Tabla` (`idTabla`, `nomTabla`, `descripcion`) VALUES
(11, 'Tabla test', '');

-- --------------------------------------------------------

--
-- Table structure for table `TablaEjercicio`
--

CREATE TABLE `TablaEjercicio` (
  `Ejercicio_idEjercicio` int(11) NOT NULL,
  `Tabla_idTabla` int(11) NOT NULL,
  `nRepeticiones` int(11) DEFAULT NULL,
  `carga` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `TablaEjercicio`
--

INSERT INTO `TablaEjercicio` (`Ejercicio_idEjercicio`, `Tabla_idTabla`, `nRepeticiones`, `carga`) VALUES
(14, 11, 2, 12),
(15, 11, 111, 2),
(16, 11, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `Usuario`
--

CREATE TABLE `Usuario` (
  `idUsuario` int(11) NOT NULL,
  `nomUsuario` varchar(20) NOT NULL,
  `direccion` varchar(30) DEFAULT NULL,
  `telefono` varchar(12) DEFAULT NULL,
  `tipoTarjeta` varchar(10) NOT NULL,
  `dni` varchar(10) NOT NULL,
  `fechaNac` date DEFAULT NULL,
  `email` varchar(30) NOT NULL,
  `pass` varchar(16) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `Usuario`
--

INSERT INTO `Usuario` (`idUsuario`, `nomUsuario`, `direccion`, `telefono`, `tipoTarjeta`, `dni`, `fechaNac`, `email`, `pass`) VALUES
(7, 'Usuario1', 'Direccion del usuario 1', '678856421', 'PEF', '44662517J', '2016-11-01', 'usuario1@test.com', '1234'),
(8, 'admin', 'admin direccion', '678856422', 'PEF', '44662517F', '2016-11-07', 'admin@admin.admin', '1234'),
(9, 'Usuario2', 'Direccion del user 2', '678856423', 'TDU', '44662517G', '1576-11-11', 'usuario2@test.com', '1234'),
(11, 'hue', 'hue', '123', 'PEF', 'hur', '2016-11-01', 'hue', 'hue');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `Actividad`
--
ALTER TABLE `Actividad`
  ADD PRIMARY KEY (`idActividad`);

--
-- Indexes for table `Ejercicio`
--
ALTER TABLE `Ejercicio`
  ADD PRIMARY KEY (`idEjercicio`);

--
-- Indexes for table `Estadisticas`
--
ALTER TABLE `Estadisticas`
  ADD PRIMARY KEY (`TablaEjercicio_Ejercicio_idEjercicio`,`TablaEjercicio_Tabla_idTabla`,`Usuario_idUsuario`,`fecha`),
  ADD KEY `fk_TablaEjercicio_has_Usuario_Usuario1_idx` (`Usuario_idUsuario`),
  ADD KEY `fk_TablaEjercicio_has_Usuario_TablaEjercicio1_idx` (`TablaEjercicio_Ejercicio_idEjercicio`,`TablaEjercicio_Tabla_idTabla`);

--
-- Indexes for table `Reserva`
--
ALTER TABLE `Reserva`
  ADD PRIMARY KEY (`Usuario_idUsuario`,`Sesion_idSesion`),
  ADD KEY `fk_Deportista_has_Sesion_Usuario1_idx` (`Usuario_idUsuario`),
  ADD KEY `fk_Reserva_Sesion1_idx` (`Sesion_idSesion`);

--
-- Indexes for table `Sesion`
--
ALTER TABLE `Sesion`
  ADD PRIMARY KEY (`idSesion`,`Actividad_idActividad`),
  ADD KEY `fk_Sesion_Actividad1_idx` (`Actividad_idActividad`);

--
-- Indexes for table `Sigue`
--
ALTER TABLE `Sigue`
  ADD PRIMARY KEY (`Tabla_idTabla`,`Usuario_idUsuario`),
  ADD KEY `fk_Deportista_has_Tabla_Tabla1_idx` (`Tabla_idTabla`),
  ADD KEY `fk_Sigue_Usuario1_idx` (`Usuario_idUsuario`);

--
-- Indexes for table `Tabla`
--
ALTER TABLE `Tabla`
  ADD PRIMARY KEY (`idTabla`);

--
-- Indexes for table `TablaEjercicio`
--
ALTER TABLE `TablaEjercicio`
  ADD PRIMARY KEY (`Ejercicio_idEjercicio`,`Tabla_idTabla`),
  ADD KEY `fk_Ejercicio_has_Tabla_Tabla1_idx` (`Tabla_idTabla`),
  ADD KEY `fk_Ejercicio_has_Tabla_Ejercicio1_idx` (`Ejercicio_idEjercicio`);

--
-- Indexes for table `Usuario`
--
ALTER TABLE `Usuario`
  ADD PRIMARY KEY (`idUsuario`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `Actividad`
--
ALTER TABLE `Actividad`
  MODIFY `idActividad` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `Ejercicio`
--
ALTER TABLE `Ejercicio`
  MODIFY `idEjercicio` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `Sesion`
--
ALTER TABLE `Sesion`
  MODIFY `idSesion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `Tabla`
--
ALTER TABLE `Tabla`
  MODIFY `idTabla` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `Usuario`
--
ALTER TABLE `Usuario`
  MODIFY `idUsuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `Estadisticas`
--
ALTER TABLE `Estadisticas`
  ADD CONSTRAINT `fk_TablaEjercicio_has_Usuario_TablaEjercicio1` FOREIGN KEY (`TablaEjercicio_Ejercicio_idEjercicio`,`TablaEjercicio_Tabla_idTabla`) REFERENCES `TablaEjercicio` (`Ejercicio_idEjercicio`, `Tabla_idTabla`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_TablaEjercicio_has_Usuario_Usuario1` FOREIGN KEY (`Usuario_idUsuario`) REFERENCES `Usuario` (`idUsuario`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `Reserva`
--
ALTER TABLE `Reserva`
  ADD CONSTRAINT `fk_Deportista_has_Sesion_Usuario1` FOREIGN KEY (`Usuario_idUsuario`) REFERENCES `Usuario` (`idUsuario`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Reserva_Sesion1` FOREIGN KEY (`Sesion_idSesion`) REFERENCES `Sesion` (`idSesion`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `Sesion`
--
ALTER TABLE `Sesion`
  ADD CONSTRAINT `fk_Sesion_Actividad1` FOREIGN KEY (`Actividad_idActividad`) REFERENCES `Actividad` (`idActividad`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `Sigue`
--
ALTER TABLE `Sigue`
  ADD CONSTRAINT `fk_Deportista_has_Tabla_Tabla1` FOREIGN KEY (`Tabla_idTabla`) REFERENCES `Tabla` (`idTabla`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Sigue_Usuario1` FOREIGN KEY (`Usuario_idUsuario`) REFERENCES `Usuario` (`idUsuario`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `TablaEjercicio`
--
ALTER TABLE `TablaEjercicio`
  ADD CONSTRAINT `fk_Ejercicio_has_Tabla_Ejercicio1` FOREIGN KEY (`Ejercicio_idEjercicio`) REFERENCES `Ejercicio` (`idEjercicio`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Ejercicio_has_Tabla_Tabla1` FOREIGN KEY (`Tabla_idTabla`) REFERENCES `Tabla` (`idTabla`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
