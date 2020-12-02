-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 02-12-2020 a las 18:36:07
-- Versión del servidor: 10.4.14-MariaDB
-- Versión de PHP: 7.4.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `domotica`
--
CREATE DATABASE IF NOT EXISTS `domotica` DEFAULT CHARACTER SET utf8 COLLATE utf8_spanish_ci;
USE `domotica`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `permisos`
--

CREATE TABLE `permisos` (
  `Id_Habitacion` int(11) NOT NULL,
  `Id_Usuario` int(11) DEFAULT NULL,
  `Permiso_Estado` varchar(50) CHARACTER SET utf8 COLLATE utf8_spanish_ci DEFAULT '1',
  `Permiso_Noti` varchar(50) CHARACTER SET utf8 COLLATE utf8_spanish_ci DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `temp_habitaciones`
--

CREATE TABLE `temp_habitaciones` (
  `id` int(6) NOT NULL,
  `nombre` varchar(50) DEFAULT NULL,
  `temp` varchar(10) DEFAULT '5',
  `hum` varchar(10) DEFAULT '5',
  `tvo` varchar(10) DEFAULT '5',
  `estado_temp` varchar(5) CHARACTER SET utf8 COLLATE utf8_spanish_ci DEFAULT '0',
  `estado_hum` varchar(5) CHARACTER SET utf8 COLLATE utf8_spanish_ci DEFAULT '0',
  `estado_tvo` varchar(5) CHARACTER SET utf8 COLLATE utf8_spanish_ci DEFAULT '0',
  `min_temp` varchar(8) DEFAULT NULL,
  `min_hum` varchar(8) DEFAULT NULL,
  `min_tvo` varchar(8) DEFAULT NULL,
  `max_temp` varchar(8) DEFAULT NULL,
  `max_hum` varchar(8) DEFAULT NULL,
  `max_tvo` varchar(8) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `temp_habitaciones`
--

INSERT INTO `temp_habitaciones` (`id`, `nombre`, `temp`, `hum`, `tvo`, `estado_temp`, `estado_hum`, `estado_tvo`, `min_temp`, `min_hum`, `min_tvo`, `max_temp`, `max_hum`, `max_tvo`) VALUES
(13, 'Habitacion Prueba', '5', '5', '5', '1', '1', '1', '5', '4', '3', '6', '5', '5'),
(14, 'Fabian', '5', '5', '5', '1', '1', '1', '5', '7', '1', '6', '8', '3');

--
-- Disparadores `temp_habitaciones`
--
DELIMITER $$
CREATE TRIGGER `actualiza_temp_habitaciones_BU` BEFORE UPDATE ON `temp_habitaciones` FOR EACH ROW INSERT INTO temp_historico_dia(Id_Habitacion, Fecha, Temp, Hum, Gas)

VALUES(NEW.id, NOW(), NEW.temp, NEW.hum, NEW.tvo)
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `temp_historico_dia`
--

CREATE TABLE `temp_historico_dia` (
  `Id_Habitacion` int(10) NOT NULL,
  `Fecha` datetime NOT NULL,
  `Temp` varchar(10) NOT NULL,
  `Hum` varchar(10) NOT NULL,
  `Gas` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `temp_historico_dia`
--

INSERT INTO `temp_historico_dia` (`Id_Habitacion`, `Fecha`, `Temp`, `Hum`, `Gas`) VALUES
(1, '2020-10-01 12:02:30', '5', '10', '20'),
(1, '2020-10-01 12:02:30', '5', '10', '20'),
(0, '2020-10-08 16:59:20', '10', '20', '30'),
(5, '2020-10-08 17:03:02', '15', '15', '15'),
(2, '2020-11-04 19:20:55', '80', '50', '30'),
(13, '2020-11-04 20:03:26', '5', '5', '5'),
(13, '2020-11-04 20:03:28', '5', '5', '5'),
(13, '2020-11-04 20:03:30', '5', '5', '5'),
(14, '2020-11-04 20:09:00', '5', '5', '5'),
(14, '2020-11-04 20:09:01', '5', '5', '5'),
(14, '2020-11-04 20:09:03', '5', '5', '5'),
(13, '2020-11-10 16:27:55', '5', '5', '5'),
(13, '2020-11-10 16:27:57', '5', '5', '5'),
(13, '2020-11-10 18:08:10', '5', '5', '5'),
(13, '2020-11-10 18:08:21', '5', '5', '5'),
(13, '2020-11-10 19:50:48', '5', '5', '5'),
(13, '2020-11-18 20:51:41', '5', '5', '5'),
(14, '2020-11-18 20:51:43', '5', '5', '5'),
(13, '2020-11-18 20:51:45', '5', '5', '5'),
(14, '2020-11-18 20:51:47', '5', '5', '5'),
(13, '2020-11-18 20:51:48', '5', '5', '5'),
(13, '2020-11-18 20:51:50', '5', '5', '5'),
(13, '2020-12-02 12:00:27', '5', '5', '5'),
(13, '2020-12-02 12:00:29', '5', '5', '5'),
(13, '2020-12-02 12:00:31', '5', '5', '5'),
(13, '2020-12-02 12:00:49', '5', '5', '5'),
(13, '2020-12-02 12:02:17', '5', '5', '5');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `temp_historico_mes_promedio`
--

CREATE TABLE `temp_historico_mes_promedio` (
  `id_habitacion` int(10) DEFAULT NULL,
  `fecha` datetime DEFAULT NULL,
  `temp` varchar(10) DEFAULT NULL,
  `hum` varchar(10) DEFAULT NULL,
  `gas` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(20) NOT NULL,
  `nombre` varchar(50) COLLATE utf8_spanish_ci DEFAULT NULL,
  `usuario` varchar(50) COLLATE utf8_spanish_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8_spanish_ci DEFAULT NULL,
  `perfil` varchar(50) COLLATE utf8_spanish_ci DEFAULT NULL,
  `foto` varchar(50) COLLATE utf8_spanish_ci DEFAULT NULL,
  `estado` varchar(50) COLLATE utf8_spanish_ci DEFAULT NULL,
  `ultimo_login` datetime DEFAULT NULL,
  `fecha` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `nombre`, `usuario`, `password`, `perfil`, `foto`, `estado`, `ultimo_login`, `fecha`) VALUES
(29, 'administrador', 'admin', '$2y$10$2xdGX0v0nGMA9j/pgsZnsuC64lPAvt0D7DKiuSiuQBKZz/d4fxb3S', 'Administrador', 'images/usuarios/admin/746.png', '1', '2020-12-02 11:59:51', NULL),
(61, 'juan valencia', 'juan', '$2y$10$jDbWrrPWtasESGaVDvs8X.Ct6XreSIR40JtelKSd4QmjMFoP0aaAS', 'Administrador', 'images/usuarios/juan/213.png', '1', '2020-05-14 16:45:02', NULL),
(65, 'andres gonzales', 'andres', '$2y$10$yu4EH9H19oJvVusekRhmkO7o/YXClDimJdEFFa2SGrJMrW68OoNXa', 'Invitado', 'images/usuarios/andres/302.png', '1', '2020-05-13 22:48:35', NULL),
(71, 'monica aristizabal', 'monica', '$2y$10$sm3lslO0b5gpYZgaJSfsGOofljBWkAzDZvSpePLXWEiF05yz3N2BC', 'Invitado', 'images/usuarios/monica/966.png', '0', '2020-05-11 13:50:07', NULL),
(73, 'german ramirez', 'german', '$2y$10$QH8Uky5T8uVes6S1NJ292epvzug3E1rgQxQl5OXsHe1pBt7ox/vwq', 'Invitado', 'images/usuarios/german/888.png', '1', '2020-05-14 16:45:52', NULL),
(74, 'Chile', 'Chile', '$2y$10$km1LLJ.rno91NQGGYXBb7Oy/6rcpAwbLO/VIUeASZmsHPlwFCFYGC', 'Invitado', '', '1', '2020-10-05 16:55:19', NULL);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `permisos`
--
ALTER TABLE `permisos`
  ADD PRIMARY KEY (`Id_Habitacion`),
  ADD KEY `FK_perimsos_usuarios` (`Id_Usuario`);

--
-- Indices de la tabla `temp_habitaciones`
--
ALTER TABLE `temp_habitaciones`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `temp_habitaciones`
--
ALTER TABLE `temp_habitaciones`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=75;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `permisos`
--
ALTER TABLE `permisos`
  ADD CONSTRAINT `FK_perimsos_usuarios` FOREIGN KEY (`Id_Usuario`) REFERENCES `usuarios` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_permisos_temp_habitaciones` FOREIGN KEY (`Id_Habitacion`) REFERENCES `temp_habitaciones` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
