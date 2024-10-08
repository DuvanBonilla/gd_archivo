-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 12-09-2024 a las 00:07:13
-- Versión del servidor: 10.4.28-MariaDB
-- Versión de PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `gd_archivo`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_accesos`
--

CREATE TABLE `tbl_accesos` (
  `Idacceso` int(11) NOT NULL,
  `Cedula` varchar(15) NOT NULL,
  `Area` int(11) NOT NULL,
  `Permiso` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `tbl_accesos`
--

INSERT INTO `tbl_accesos` (`Idacceso`, `Cedula`, `Area`, `Permiso`) VALUES
(112, '123', 1, 2),
(113, '123', 2, 2),
(114, '123', 3, 2),
(115, '123', 4, 2),
(116, '123', 5, 2),
(117, '123', 6, 2),
(118, '123', 7, 2),
(119, '123', 8, 2),
(120, '123', 9, 2),
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
(147, '12', 9, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_areas`
--

CREATE TABLE `tbl_areas` (
  `Idarea` int(11) NOT NULL,
  `NombreA` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `tbl_areas`
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
-- Estructura de tabla para la tabla `tbl_det_empleados`
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

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_estadoper`
--

CREATE TABLE `tbl_estadoper` (
  `Idestado` int(11) NOT NULL,
  `Descripcion` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `tbl_estadoper`
--

INSERT INTO `tbl_estadoper` (`Idestado`, `Descripcion`) VALUES
(1, 'Activo'),
(2, 'Inactivo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_login`
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
-- Volcado de datos para la tabla `tbl_login`
--

INSERT INTO `tbl_login` (`Cedula`, `Nombre`, `Rol`, `Zona`, `Usuario`, `Password`) VALUES
('1', 'santaMarta', 1, 2, 'santaMarta', '$2y$10$IddcuK3xT3wrNOsIwvMmuuSsVcYRB6lW9x0DDbtZJzuiG9nVAdssy'),
('12', 'Medellin', 1, 3, 'Medellin', '$2y$10$dIRe.5AfjcCfBde6Tx0.UORjOcBvl0CFTrBsa1A.RT/ZFJbMfx3ly'),
('123', 'admin', 1, 1, 'admin', '$2y$10$7Ce1yxyOsJR6xpmldpO0YOKxFCRgwUpfPOsjGaorYPqhRBtUeLyu.'),
('1234', 'fincas', 1, 4, 'fincas', '$2y$10$xqWlWeUTN06j80jKL2Wje./umYj48lbPV8tj.uXb7zZMHje8YDlOu');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_permisos`
--

CREATE TABLE `tbl_permisos` (
  `Idpermiso` int(11) NOT NULL,
  `Descripcion` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `tbl_permisos`
--

INSERT INTO `tbl_permisos` (`Idpermiso`, `Descripcion`) VALUES
(1, 'Ver'),
(2, 'Editar'),
(3, 'Ninguno');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_personas`
--

CREATE TABLE `tbl_personas` (
  `Cedula` varchar(20) NOT NULL,
  `Nombre` varchar(50) NOT NULL,
  `Empresa` int(11) NOT NULL,
  `Zona` int(11) NOT NULL,
  `Ubicacion` varchar(50) NOT NULL,
  `Fechaingreso` date NOT NULL,
  `Fecharetiro` date DEFAULT NULL,
  `Estado` int(11) NOT NULL,
  `Carpetas` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_per_empresa`
--

CREATE TABLE `tbl_per_empresa` (
  `Iddetalle` int(11) NOT NULL,
  `Cedula` varchar(15) NOT NULL,
  `Empresa` int(11) NOT NULL,
  `Estado` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `tbl_per_empresa`
--

INSERT INTO `tbl_per_empresa` (`Iddetalle`, `Cedula`, `Empresa`, `Estado`) VALUES
(194, '123', 1, 1),
(195, '123', 2, 1),
(196, '123', 3, 1),
(197, '123', 4, 1),
(198, '123', 5, 1),
(199, '123', 6, 1),
(200, '123', 7, 1),
(201, '123', 8, 1),
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
(235, '12', 12, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_razonsoc`
--

CREATE TABLE `tbl_razonsoc` (
  `Idrazon` int(11) NOT NULL,
  `Descripcion` varchar(50) NOT NULL,
  `zona` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `tbl_razonsoc`
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
-- Estructura de tabla para la tabla `tbl_rol`
--

CREATE TABLE `tbl_rol` (
  `Idrol` int(11) NOT NULL,
  `Descripcion` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `tbl_rol`
--

INSERT INTO `tbl_rol` (`Idrol`, `Descripcion`) VALUES
(1, 'Admin'),
(2, 'Usuario');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_zona`
--

CREATE TABLE `tbl_zona` (
  `Idzona` int(11) NOT NULL,
  `Descripcion` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `tbl_zona`
--

INSERT INTO `tbl_zona` (`Idzona`, `Descripcion`) VALUES
(1, 'Uraba'),
(2, 'Santa Marta'),
(3, 'Medellin'),
(4, 'Fincas');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `tbl_accesos`
--
ALTER TABLE `tbl_accesos`
  ADD PRIMARY KEY (`Idacceso`),
  ADD KEY `Cedula` (`Cedula`),
  ADD KEY `Permiso` (`Permiso`),
  ADD KEY `tbl_accesos_ibfk_3` (`Area`);

--
-- Indices de la tabla `tbl_areas`
--
ALTER TABLE `tbl_areas`
  ADD PRIMARY KEY (`Idarea`);

--
-- Indices de la tabla `tbl_det_empleados`
--
ALTER TABLE `tbl_det_empleados`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `tbl_det_empleados_ibfk_1` (`Cedula`),
  ADD KEY `tbl_det_empleados_ibfk_2` (`Empresa`),
  ADD KEY `Zona` (`Zona`);

--
-- Indices de la tabla `tbl_estadoper`
--
ALTER TABLE `tbl_estadoper`
  ADD PRIMARY KEY (`Idestado`);

--
-- Indices de la tabla `tbl_login`
--
ALTER TABLE `tbl_login`
  ADD PRIMARY KEY (`Cedula`),
  ADD KEY `Rol` (`Rol`),
  ADD KEY `Zona` (`Zona`);

--
-- Indices de la tabla `tbl_permisos`
--
ALTER TABLE `tbl_permisos`
  ADD PRIMARY KEY (`Idpermiso`);

--
-- Indices de la tabla `tbl_personas`
--
ALTER TABLE `tbl_personas`
  ADD PRIMARY KEY (`Cedula`,`Empresa`),
  ADD KEY `Estado` (`Estado`),
  ADD KEY `Empresa` (`Empresa`),
  ADD KEY `Zona` (`Zona`);

--
-- Indices de la tabla `tbl_per_empresa`
--
ALTER TABLE `tbl_per_empresa`
  ADD PRIMARY KEY (`Iddetalle`),
  ADD KEY `Cedula` (`Cedula`),
  ADD KEY `Empresa` (`Empresa`);

--
-- Indices de la tabla `tbl_razonsoc`
--
ALTER TABLE `tbl_razonsoc`
  ADD PRIMARY KEY (`Idrazon`),
  ADD KEY `zona` (`zona`);

--
-- Indices de la tabla `tbl_rol`
--
ALTER TABLE `tbl_rol`
  ADD PRIMARY KEY (`Idrol`);

--
-- Indices de la tabla `tbl_zona`
--
ALTER TABLE `tbl_zona`
  ADD PRIMARY KEY (`Idzona`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `tbl_accesos`
--
ALTER TABLE `tbl_accesos`
  MODIFY `Idacceso` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=148;

--
-- AUTO_INCREMENT de la tabla `tbl_areas`
--
ALTER TABLE `tbl_areas`
  MODIFY `Idarea` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `tbl_det_empleados`
--
ALTER TABLE `tbl_det_empleados`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- AUTO_INCREMENT de la tabla `tbl_estadoper`
--
ALTER TABLE `tbl_estadoper`
  MODIFY `Idestado` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `tbl_permisos`
--
ALTER TABLE `tbl_permisos`
  MODIFY `Idpermiso` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `tbl_per_empresa`
--
ALTER TABLE `tbl_per_empresa`
  MODIFY `Iddetalle` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=236;

--
-- AUTO_INCREMENT de la tabla `tbl_razonsoc`
--
ALTER TABLE `tbl_razonsoc`
  MODIFY `Idrazon` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de la tabla `tbl_rol`
--
ALTER TABLE `tbl_rol`
  MODIFY `Idrol` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `tbl_zona`
--
ALTER TABLE `tbl_zona`
  MODIFY `Idzona` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `tbl_accesos`
--
ALTER TABLE `tbl_accesos`
  ADD CONSTRAINT `tbl_accesos_ibfk_1` FOREIGN KEY (`Cedula`) REFERENCES `tbl_login` (`Cedula`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tbl_accesos_ibfk_2` FOREIGN KEY (`Permiso`) REFERENCES `tbl_permisos` (`Idpermiso`) ON UPDATE CASCADE,
  ADD CONSTRAINT `tbl_accesos_ibfk_3` FOREIGN KEY (`Area`) REFERENCES `tbl_areas` (`Idarea`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `tbl_det_empleados`
--
ALTER TABLE `tbl_det_empleados`
  ADD CONSTRAINT `tbl_det_empleados_ibfk_1` FOREIGN KEY (`Cedula`) REFERENCES `tbl_personas` (`Cedula`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tbl_det_empleados_ibfk_2` FOREIGN KEY (`Empresa`) REFERENCES `tbl_razonsoc` (`Idrazon`) ON UPDATE CASCADE,
  ADD CONSTRAINT `tbl_det_empleados_ibfk_3` FOREIGN KEY (`Zona`) REFERENCES `tbl_zona` (`Idzona`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `tbl_login`
--
ALTER TABLE `tbl_login`
  ADD CONSTRAINT `tbl_login_ibfk_3` FOREIGN KEY (`Rol`) REFERENCES `tbl_rol` (`Idrol`) ON UPDATE CASCADE,
  ADD CONSTRAINT `tbl_login_ibfk_4` FOREIGN KEY (`Zona`) REFERENCES `tbl_zona` (`Idzona`);

--
-- Filtros para la tabla `tbl_personas`
--
ALTER TABLE `tbl_personas`
  ADD CONSTRAINT `tbl_personas_ibfk_1` FOREIGN KEY (`Estado`) REFERENCES `tbl_estadoper` (`Idestado`) ON UPDATE CASCADE,
  ADD CONSTRAINT `tbl_personas_ibfk_2` FOREIGN KEY (`Empresa`) REFERENCES `tbl_razonsoc` (`Idrazon`),
  ADD CONSTRAINT `tbl_personas_ibfk_3` FOREIGN KEY (`Zona`) REFERENCES `tbl_zona` (`Idzona`);

--
-- Filtros para la tabla `tbl_per_empresa`
--
ALTER TABLE `tbl_per_empresa`
  ADD CONSTRAINT `tbl_per_empresa_ibfk_1` FOREIGN KEY (`Cedula`) REFERENCES `tbl_login` (`Cedula`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tbl_per_empresa_ibfk_2` FOREIGN KEY (`Empresa`) REFERENCES `tbl_razonsoc` (`Idrazon`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `tbl_razonsoc`
--
ALTER TABLE `tbl_razonsoc`
  ADD CONSTRAINT `tbl_razonsoc_ibfk_1` FOREIGN KEY (`zona`) REFERENCES `tbl_zona` (`Idzona`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
