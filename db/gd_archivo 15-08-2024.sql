-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 16, 2024 at 12:29 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `gd_archivo`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_accesos`
--

CREATE TABLE `tbl_accesos` (
  `Idacceso` int(11) NOT NULL,
  `Cedula` varchar(15) NOT NULL,
  `Area` int(11) NOT NULL,
  `Permiso` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_accesos`
--

INSERT INTO `tbl_accesos` (`Idacceso`, `Cedula`, `Area`, `Permiso`) VALUES
(4, '1231', 1, 1),
(5, '1231', 3, 1),
(6, '1231', 5, 2),
(7, '1231', 6, 2),
(8, '1231', 7, 1),
(9, '1231', 8, 1),
(10, '1231', 9, 1),
(11, '544', 1, 1),
(12, '544', 2, 2),
(13, '544', 3, 2),
(14, '544', 4, 3),
(15, '544', 5, 2),
(16, '544', 6, 2),
(17, '544', 7, 1),
(18, '544', 8, 2),
(19, '544', 9, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_areas`
--

CREATE TABLE `tbl_areas` (
  `Idarea` int(11) NOT NULL,
  `NombreA` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_areas`
--

INSERT INTO `tbl_areas` (`Idarea`, `NombreA`) VALUES
(1, 'Costos'),
(2, 'Tics'),
(3, 'Recepcion'),
(4, 'Tesoreria'),
(5, 'GestionH'),
(6, 'Nomina'),
(7, 'Contratacion'),
(8, 'Sst'),
(9, 'Gerencia');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_det_empleados`
--

CREATE TABLE `tbl_det_empleados` (
  `Id` int(11) NOT NULL,
  `Cedula` varchar(20) NOT NULL,
  `Empresa` int(11) NOT NULL,
  `Zona` int(11) NOT NULL,
  `Fecharetiro` date NOT NULL,
  `Ubicacion` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_det_empleados`
--

INSERT INTO `tbl_det_empleados` (`Id`, `Cedula`, `Empresa`, `Zona`, `Fecharetiro`, `Ubicacion`) VALUES
(1, '1001671132', 1, 1, '2024-08-06', 'antigua: z123 y nueva: caja 776');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_estadoper`
--

CREATE TABLE `tbl_estadoper` (
  `Idestado` int(11) NOT NULL,
  `Descripcion` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_estadoper`
--

INSERT INTO `tbl_estadoper` (`Idestado`, `Descripcion`) VALUES
(1, 'Activo'),
(2, 'Inactivo');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_login`
--

CREATE TABLE `tbl_login` (
  `Cedula` varchar(15) NOT NULL,
  `Nombre` varchar(30) NOT NULL,
  `Razonsoc` int(11) NOT NULL,
  `Rol` int(11) NOT NULL,
  `Zona` int(11) NOT NULL,
  `Usuario` varchar(20) NOT NULL,
  `Password` varchar(70) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_login`
--

INSERT INTO `tbl_login` (`Cedula`, `Nombre`, `Razonsoc`, `Rol`, `Zona`, `Usuario`, `Password`) VALUES
('1001671132', 'Jeyson cartagena ', 1, 1, 1, 'jcg', '$2y$10$6gj6uNRS3jg0bryaWjHGRujm7n4BiO2OlZXU86e1m7GdBvaiC4iSq'),
('11123', 'qwe', 1, 1, 1, 'qwe', '$2y$10$f9P6IbxTTlC3XO/8taO2w.Y36gDOHmk8tMzeWs81BYFJuuykbWdlq'),
('1231', 'weq', 1, 1, 1, 'we', '$2y$10$U23kkvv1Ell74qDVHjvE.uvBJmVZcwWdU4EjKk8RxfA8FE2.z6EXC'),
('544', 'sda', 1, 1, 1, 'asd', '$2y$10$thKQwL6YF.lysPxmKa6HgejXDa7zo4pb4v4MTL8nTOj4NZThQFAwW');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_permisos`
--

CREATE TABLE `tbl_permisos` (
  `Idpermiso` int(11) NOT NULL,
  `Descripcion` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_permisos`
--

INSERT INTO `tbl_permisos` (`Idpermiso`, `Descripcion`) VALUES
(1, 'Ver'),
(2, 'Editar'),
(3, 'Ninguno');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_personas`
--

CREATE TABLE `tbl_personas` (
  `Cedula` varchar(20) NOT NULL,
  `Nombre` varchar(50) NOT NULL,
  `Empresa` int(11) NOT NULL,
  `Zona` int(11) NOT NULL,
  `Ubicacion` varchar(50) NOT NULL,
  `Fechaingreso` date NOT NULL,
  `Estado` int(11) NOT NULL,
  `Carpetas` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_personas`
--

INSERT INTO `tbl_personas` (`Cedula`, `Nombre`, `Empresa`, `Zona`, `Ubicacion`, `Fechaingreso`, `Estado`, `Carpetas`) VALUES
('1001671132', 'Jeyson Graciano', 1, 1, 'holaa', '2024-08-09', 2, '../archivos/1001671132');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_per_empresa`
--

CREATE TABLE `tbl_per_empresa` (
  `Iddetalle` int(11) NOT NULL,
  `Cedula` varchar(15) NOT NULL,
  `Empresa` int(11) NOT NULL,
  `Estado` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_per_empresa`
--

INSERT INTO `tbl_per_empresa` (`Iddetalle`, `Cedula`, `Empresa`, `Estado`) VALUES
(1, '11123', 1, 1),
(2, '11123', 2, 2),
(3, '11123', 3, 2),
(4, '11123', 4, 2),
(5, '11123', 5, 1),
(6, '11123', 6, 1),
(7, '11123', 7, 2),
(8, '11123', 8, 2),
(9, '11123', 9, 2),
(10, '11123', 10, 2),
(11, '11123', 11, 2),
(12, '1231', 1, 1),
(13, '1231', 2, 1),
(14, '1231', 3, 2),
(15, '1231', 4, 2),
(16, '1231', 5, 2),
(17, '1231', 6, 1),
(18, '1231', 7, 2),
(19, '1231', 8, 2),
(20, '1231', 9, 2),
(21, '1231', 10, 2),
(22, '1231', 11, 2),
(23, '544', 1, 1),
(24, '544', 2, 2),
(25, '544', 3, 2),
(26, '544', 4, 2),
(27, '544', 5, 1),
(28, '544', 6, 2),
(29, '544', 7, 2),
(30, '544', 8, 2),
(31, '544', 9, 1),
(32, '544', 10, 1),
(33, '544', 11, 2);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_proveedores`
--

CREATE TABLE `tbl_proveedores` (
  `Nit` varchar(11) NOT NULL,
  `Nombre` varchar(150) NOT NULL,
  `Fechaingreso` date NOT NULL,
  `Carpetas` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_razonsoc`
--

CREATE TABLE `tbl_razonsoc` (
  `Idrazon` int(11) NOT NULL,
  `Descripcion` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_razonsoc`
--

INSERT INTO `tbl_razonsoc` (`Idrazon`, `Descripcion`) VALUES
(1, 'Cargoban OLP'),
(2, 'Oceanix'),
(3, 'Solutempo'),
(4, 'Cargoban SAS'),
(5, 'Agencia de Aduanas'),
(6, 'Fundacion Cargoban'),
(7, 'Tase'),
(8, 'Opyservis'),
(9, 'Tierra Grata'),
(10, 'Bananova'),
(11, 'Gira');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_rol`
--

CREATE TABLE `tbl_rol` (
  `Idrol` int(11) NOT NULL,
  `Descripcion` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_rol`
--

INSERT INTO `tbl_rol` (`Idrol`, `Descripcion`) VALUES
(1, 'Admin'),
(2, 'Usuario');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_zona`
--

CREATE TABLE `tbl_zona` (
  `Idzona` int(11) NOT NULL,
  `Descripcion` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_zona`
--

INSERT INTO `tbl_zona` (`Idzona`, `Descripcion`) VALUES
(1, 'Uraba'),
(2, 'Santa Marta'),
(3, 'Medellin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_accesos`
--
ALTER TABLE `tbl_accesos`
  ADD PRIMARY KEY (`Idacceso`),
  ADD KEY `Cedula` (`Cedula`),
  ADD KEY `Permiso` (`Permiso`),
  ADD KEY `tbl_accesos_ibfk_3` (`Area`);

--
-- Indexes for table `tbl_areas`
--
ALTER TABLE `tbl_areas`
  ADD PRIMARY KEY (`Idarea`);

--
-- Indexes for table `tbl_det_empleados`
--
ALTER TABLE `tbl_det_empleados`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `tbl_det_empleados_ibfk_1` (`Cedula`),
  ADD KEY `tbl_det_empleados_ibfk_2` (`Empresa`),
  ADD KEY `Zona` (`Zona`);

--
-- Indexes for table `tbl_estadoper`
--
ALTER TABLE `tbl_estadoper`
  ADD PRIMARY KEY (`Idestado`);

--
-- Indexes for table `tbl_login`
--
ALTER TABLE `tbl_login`
  ADD PRIMARY KEY (`Cedula`),
  ADD KEY `Razonsoc` (`Razonsoc`),
  ADD KEY `Rol` (`Rol`),
  ADD KEY `Zona` (`Zona`);

--
-- Indexes for table `tbl_permisos`
--
ALTER TABLE `tbl_permisos`
  ADD PRIMARY KEY (`Idpermiso`);

--
-- Indexes for table `tbl_personas`
--
ALTER TABLE `tbl_personas`
  ADD PRIMARY KEY (`Cedula`),
  ADD KEY `Estado` (`Estado`),
  ADD KEY `Empresa` (`Empresa`),
  ADD KEY `Zona` (`Zona`);

--
-- Indexes for table `tbl_per_empresa`
--
ALTER TABLE `tbl_per_empresa`
  ADD PRIMARY KEY (`Iddetalle`),
  ADD KEY `Cedula` (`Cedula`),
  ADD KEY `Empresa` (`Empresa`);

--
-- Indexes for table `tbl_proveedores`
--
ALTER TABLE `tbl_proveedores`
  ADD PRIMARY KEY (`Nit`);

--
-- Indexes for table `tbl_razonsoc`
--
ALTER TABLE `tbl_razonsoc`
  ADD PRIMARY KEY (`Idrazon`);

--
-- Indexes for table `tbl_rol`
--
ALTER TABLE `tbl_rol`
  ADD PRIMARY KEY (`Idrol`);

--
-- Indexes for table `tbl_zona`
--
ALTER TABLE `tbl_zona`
  ADD PRIMARY KEY (`Idzona`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_accesos`
--
ALTER TABLE `tbl_accesos`
  MODIFY `Idacceso` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `tbl_areas`
--
ALTER TABLE `tbl_areas`
  MODIFY `Idarea` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tbl_det_empleados`
--
ALTER TABLE `tbl_det_empleados`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `tbl_estadoper`
--
ALTER TABLE `tbl_estadoper`
  MODIFY `Idestado` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_permisos`
--
ALTER TABLE `tbl_permisos`
  MODIFY `Idpermiso` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_per_empresa`
--
ALTER TABLE `tbl_per_empresa`
  MODIFY `Iddetalle` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `tbl_razonsoc`
--
ALTER TABLE `tbl_razonsoc`
  MODIFY `Idrazon` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `tbl_rol`
--
ALTER TABLE `tbl_rol`
  MODIFY `Idrol` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_zona`
--
ALTER TABLE `tbl_zona`
  MODIFY `Idzona` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tbl_accesos`
--
ALTER TABLE `tbl_accesos`
  ADD CONSTRAINT `tbl_accesos_ibfk_1` FOREIGN KEY (`Cedula`) REFERENCES `tbl_login` (`Cedula`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tbl_accesos_ibfk_2` FOREIGN KEY (`Permiso`) REFERENCES `tbl_permisos` (`Idpermiso`) ON UPDATE CASCADE,
  ADD CONSTRAINT `tbl_accesos_ibfk_3` FOREIGN KEY (`Area`) REFERENCES `tbl_areas` (`Idarea`) ON UPDATE CASCADE;

--
-- Constraints for table `tbl_det_empleados`
--
ALTER TABLE `tbl_det_empleados`
  ADD CONSTRAINT `tbl_det_empleados_ibfk_1` FOREIGN KEY (`Cedula`) REFERENCES `tbl_personas` (`Cedula`) ON UPDATE CASCADE,
  ADD CONSTRAINT `tbl_det_empleados_ibfk_2` FOREIGN KEY (`Empresa`) REFERENCES `tbl_razonsoc` (`Idrazon`) ON UPDATE CASCADE,
  ADD CONSTRAINT `tbl_det_empleados_ibfk_3` FOREIGN KEY (`Zona`) REFERENCES `tbl_zona` (`Idzona`) ON UPDATE CASCADE;

--
-- Constraints for table `tbl_login`
--
ALTER TABLE `tbl_login`
  ADD CONSTRAINT `tbl_login_ibfk_2` FOREIGN KEY (`Razonsoc`) REFERENCES `tbl_razonsoc` (`Idrazon`) ON UPDATE CASCADE,
  ADD CONSTRAINT `tbl_login_ibfk_3` FOREIGN KEY (`Rol`) REFERENCES `tbl_rol` (`Idrol`) ON UPDATE CASCADE,
  ADD CONSTRAINT `tbl_login_ibfk_4` FOREIGN KEY (`Zona`) REFERENCES `tbl_zona` (`Idzona`);

--
-- Constraints for table `tbl_personas`
--
ALTER TABLE `tbl_personas`
  ADD CONSTRAINT `tbl_personas_ibfk_1` FOREIGN KEY (`Estado`) REFERENCES `tbl_estadoper` (`Idestado`) ON UPDATE CASCADE,
  ADD CONSTRAINT `tbl_personas_ibfk_2` FOREIGN KEY (`Empresa`) REFERENCES `tbl_razonsoc` (`Idrazon`),
  ADD CONSTRAINT `tbl_personas_ibfk_3` FOREIGN KEY (`Zona`) REFERENCES `tbl_zona` (`Idzona`);

--
-- Constraints for table `tbl_per_empresa`
--
ALTER TABLE `tbl_per_empresa`
  ADD CONSTRAINT `tbl_per_empresa_ibfk_1` FOREIGN KEY (`Cedula`) REFERENCES `tbl_login` (`Cedula`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tbl_per_empresa_ibfk_2` FOREIGN KEY (`Empresa`) REFERENCES `tbl_razonsoc` (`Idrazon`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
