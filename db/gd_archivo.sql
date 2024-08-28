-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 28, 2024 at 09:49 PM
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
(112, '123', 1, 1),
(113, '123', 2, 1),
(114, '123', 3, 1),
(115, '123', 4, 1),
(116, '123', 5, 1),
(117, '123', 6, 1),
(118, '123', 7, 2),
(119, '123', 8, 3),
(120, '123', 9, 3),
(121, '1234', 1, 2),
(122, '1234', 2, 2),
(123, '1234', 3, 2),
(124, '1234', 4, 2),
(125, '1234', 5, 2),
(126, '1234', 6, 2),
(127, '1234', 7, 2),
(128, '1234', 8, 2),
(129, '1234', 9, 2),
(130, '1', 1, 2),
(131, '1', 2, 2),
(132, '1', 3, 2),
(133, '1', 4, 2),
(134, '1', 5, 2),
(135, '1', 6, 2),
(136, '1', 7, 2),
(137, '1', 8, 2),
(138, '1', 9, 2),
(139, '12', 1, 2),
(140, '12', 2, 2),
(141, '12', 3, 2),
(142, '12', 4, 2),
(143, '12', 5, 2),
(144, '12', 6, 2),
(145, '12', 7, 2),
(146, '12', 8, 2),
(147, '12', 9, 2),
(148, '12345', 1, 2),
(149, '12345', 2, 2),
(150, '12345', 3, 2),
(151, '12345', 4, 2),
(152, '12345', 5, 2),
(153, '12345', 6, 2),
(154, '12345', 7, 2),
(155, '12345', 8, 2),
(156, '12345', 9, 2),
(157, '999999999999999', 1, 2),
(158, '999999999999999', 2, 2),
(159, '999999999999999', 3, 2),
(160, '999999999999999', 4, 2),
(161, '999999999999999', 5, 2),
(162, '999999999999999', 6, 2),
(163, '999999999999999', 7, 2),
(164, '999999999999999', 8, 2),
(165, '888888888888888', 1, 2),
(166, '888888888888888', 2, 2),
(173, '333333333333333', 1, 2);

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
  `Fechaingreso` date NOT NULL,
  `Fecharetiro` date NOT NULL,
  `Ubicacion` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_det_empleados`
--

INSERT INTO `tbl_det_empleados` (`Id`, `Cedula`, `Empresa`, `Zona`, `Fechaingreso`, `Fecharetiro`, `Ubicacion`) VALUES
(28, '12312', 1, 5, '2024-08-23', '2024-08-29', 'asd');

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
  `Rol` int(11) NOT NULL,
  `Zona` int(11) NOT NULL,
  `Usuario` varchar(20) NOT NULL,
  `Password` varchar(70) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_login`
--

INSERT INTO `tbl_login` (`Cedula`, `Nombre`, `Rol`, `Zona`, `Usuario`, `Password`) VALUES
('1', 'santaMarta', 1, 2, 'santaMarta', '$2y$10$IddcuK3xT3wrNOsIwvMmuuSsVcYRB6lW9x0DDbtZJzuiG9nVAdssy'),
('12', 'Medellin', 1, 3, 'Medellin', '$2y$10$dIRe.5AfjcCfBde6Tx0.UORjOcBvl0CFTrBsa1A.RT/ZFJbMfx3ly'),
('123', 'admin', 1, 1, 'admin', '$2y$10$7Ce1yxyOsJR6xpmldpO0YOKxFCRgwUpfPOsjGaorYPqhRBtUeLyu.'),
('1234', 'fincas', 1, 4, 'fincas', '$2y$10$xqWlWeUTN06j80jKL2Wje./umYj48lbPV8tj.uXb7zZMHje8YDlOu'),
('12345', 'superAdmin', 3, 1, 'superAdmin', '$2y$10$GqaU7w4WKKSRav/xgc3AVebJyvC0TH99LY8MKq9y.Gfa1TKftnadu'),
('333333333333333', '333333333333333333', 3, 5, '333333333333333333', '$2y$10$e5vEH0pVmfMuksYXIEzqVOV0f7JVrWvT1DsQZIZKGaDzIcMJvQCSC'),
('888888888888888', '888888888888888888', 3, 3, '888888888888888888', '$2y$10$9EGCuTRKK1WHAxvhdHQVO.GxKEL0swhLQ1xZTT1lDjm8c7Yasj3Pe'),
('999999999999999', '99999999999999999999', 3, 5, '99999999999999999999', '$2y$10$uRiPe4CvtEedyfG/OZE2aefbJgaLFB45X6tD.34RvEbag4IP6u9de');

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
('12312', '3asd', 1, 5, 'turbo', '2024-08-28', 1, '../archivos/12312'),
('finca bananoba', 'finca bananoba', 10, 4, 'finca bananoba', '2024-08-16', 1, '../archivos/finca bananoba'),
('finca la gira', 'finca la gira', 11, 4, 'finca la gira', '2024-08-20', 1, '../archivos/finca la gira'),
('finca tierra grata', 'finca tierra grata', 9, 4, 'finca tierra grata', '2024-08-27', 1, '../archivos/fincas'),
('medellin', 'medellin', 12, 3, 'medellin', '2024-08-27', 1, '../archivos/medellin'),
('santMarta', 'santMarta', 1, 2, 'apartadoasdas', '2024-08-30', 2, '../archivos/santMarta'),
('sda', 'sdas', 3, 1, 'apartado', '2024-08-28', 1, '../archivos/sda');

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
(194, '123', 1, 2),
(195, '123', 2, 2),
(196, '123', 3, 1),
(197, '123', 4, 1),
(198, '123', 5, 1),
(199, '123', 6, 1),
(200, '123', 7, 1),
(201, '123', 8, 1),
(202, '123', 9, 2),
(203, '123', 10, 2),
(204, '123', 11, 2),
(205, '1234', 1, 2),
(206, '1234', 2, 2),
(207, '1234', 3, 2),
(208, '1234', 4, 2),
(209, '1234', 5, 2),
(210, '1234', 6, 2),
(211, '1234', 7, 2),
(212, '1234', 8, 2),
(213, '1234', 9, 1),
(214, '1234', 10, 1),
(215, '1234', 11, 1),
(216, '1', 1, 1),
(217, '1', 2, 2),
(218, '1', 3, 2),
(219, '1', 4, 2),
(220, '1', 5, 2),
(221, '1', 6, 2),
(222, '1', 7, 2),
(223, '1', 8, 2),
(224, '12', 1, 2),
(225, '12', 2, 2),
(226, '12', 3, 2),
(227, '12', 4, 2),
(228, '12', 5, 2),
(229, '12', 6, 2),
(230, '12', 7, 2),
(231, '12', 8, 2),
(232, '12', 9, 2),
(233, '12', 10, 2),
(234, '12', 11, 2),
(235, '12', 12, 1),
(236, '12345', 1, 1),
(237, '12345', 2, 1),
(238, '12345', 3, 1),
(239, '12345', 4, 1),
(240, '12345', 5, 1),
(241, '12345', 6, 1),
(242, '12345', 7, 1),
(243, '12345', 8, 1),
(244, '12345', 9, 1),
(245, '12345', 10, 1),
(246, '12345', 11, 1),
(247, '12345', 12, 1),
(248, '999999999999999', 1, 1),
(249, '999999999999999', 2, 1),
(250, '999999999999999', 3, 1),
(251, '999999999999999', 4, 1),
(252, '999999999999999', 5, 1),
(253, '999999999999999', 6, 1),
(254, '999999999999999', 7, 1),
(255, '999999999999999', 8, 1),
(256, '999999999999999', 9, 1),
(257, '999999999999999', 10, 1),
(258, '999999999999999', 11, 1),
(259, '999999999999999', 12, 2),
(260, '888888888888888', 1, 1),
(261, '888888888888888', 2, 1),
(262, '888888888888888', 3, 2),
(263, '888888888888888', 4, 2),
(264, '888888888888888', 5, 2),
(265, '888888888888888', 6, 2),
(266, '888888888888888', 7, 2),
(267, '888888888888888', 8, 2),
(268, '888888888888888', 9, 2),
(269, '888888888888888', 10, 1),
(270, '888888888888888', 11, 2),
(271, '888888888888888', 12, 2),
(283, '333333333333333', 1, 1),
(284, '333333333333333', 2, 2),
(285, '333333333333333', 3, 2),
(286, '333333333333333', 4, 2),
(287, '333333333333333', 5, 2),
(288, '333333333333333', 6, 2),
(289, '333333333333333', 7, 2),
(290, '333333333333333', 8, 2),
(291, '333333333333333', 9, 2),
(292, '333333333333333', 10, 2),
(293, '333333333333333', 11, 2),
(294, '333333333333333', 12, 2);

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
  `Descripcion` varchar(50) NOT NULL,
  `zona` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_razonsoc`
--

INSERT INTO `tbl_razonsoc` (`Idrazon`, `Descripcion`, `zona`) VALUES
(1, 'Cargoban OLP', 1),
(2, 'Oceanix', 1),
(3, 'Solutempo', 1),
(4, 'Cargoban SAS', 1),
(5, 'Agencia de Aduanas', 1),
(6, 'Fundacion Cargoban', 1),
(7, 'Tase', 1),
(8, 'Opyservis', 1),
(9, 'Tierra Grata', 4),
(10, 'Bananova', 4),
(11, 'Gira', 4),
(12, 'Medellin', 3);

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
(2, 'Usuario'),
(3, 'superAdmin');

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
(3, 'Medellin'),
(4, 'Fincas'),
(5, 'admin');

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
  ADD KEY `Empresa` (`Empresa`),
  ADD KEY `Estado` (`Estado`);

--
-- Indexes for table `tbl_proveedores`
--
ALTER TABLE `tbl_proveedores`
  ADD PRIMARY KEY (`Nit`);

--
-- Indexes for table `tbl_razonsoc`
--
ALTER TABLE `tbl_razonsoc`
  ADD PRIMARY KEY (`Idrazon`),
  ADD KEY `zona` (`zona`);

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
  MODIFY `Idacceso` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=174;

--
-- AUTO_INCREMENT for table `tbl_areas`
--
ALTER TABLE `tbl_areas`
  MODIFY `Idarea` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tbl_det_empleados`
--
ALTER TABLE `tbl_det_empleados`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

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
  MODIFY `Iddetalle` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=295;

--
-- AUTO_INCREMENT for table `tbl_razonsoc`
--
ALTER TABLE `tbl_razonsoc`
  MODIFY `Idrazon` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `tbl_rol`
--
ALTER TABLE `tbl_rol`
  MODIFY `Idrol` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_zona`
--
ALTER TABLE `tbl_zona`
  MODIFY `Idzona` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

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
  ADD CONSTRAINT `tbl_per_empresa_ibfk_2` FOREIGN KEY (`Empresa`) REFERENCES `tbl_razonsoc` (`Idrazon`) ON UPDATE CASCADE,
  ADD CONSTRAINT `tbl_per_empresa_ibfk_3` FOREIGN KEY (`Estado`) REFERENCES `tbl_estadoper` (`Idestado`);

--
-- Constraints for table `tbl_razonsoc`
--
ALTER TABLE `tbl_razonsoc`
  ADD CONSTRAINT `tbl_razonsoc_ibfk_1` FOREIGN KEY (`zona`) REFERENCES `tbl_zona` (`Idzona`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
