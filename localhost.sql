-- phpMyAdmin SQL Dump
-- version 4.5.5
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 01-06-2016 a las 17:07:28
-- Versión del servidor: 5.5.49-0ubuntu0.14.04.1
-- Versión de PHP: 5.5.9-1ubuntu4.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `tomatacos`
--
CREATE DATABASE IF NOT EXISTS `tomatacos` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `tomatacos`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `id_calificaciones`
--

CREATE TABLE `id_calificaciones` (
  `id_calificacion` int(11) NOT NULL,
  `id_restaurante` int(11) NOT NULL,
  `id_usuario` int(11) DEFAULT NULL,
  `calificacion` int(11) NOT NULL DEFAULT '0',
  `titulo` varchar(100) DEFAULT NULL,
  `texto` text,
  `nombre` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `restaurantes`
--

CREATE TABLE `restaurantes` (
  `id_restaurante` int(11) NOT NULL,
  `nombre` varchar(50) DEFAULT NULL,
  `id_usuario` varchar(50) DEFAULT NULL,
  `ciudad` varchar(50) DEFAULT NULL,
  `estado` varchar(50) DEFAULT NULL,
  `domicilio` text,
  `telefono` varchar(20) DEFAULT NULL,
  `texto` text,
  `coord_lat` varchar(50) DEFAULT NULL,
  `coord_lon` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `restaurantes`
--

INSERT INTO `restaurantes` (`id_restaurante`, `nombre`, `id_usuario`, `ciudad`, `estado`, `domicilio`, `telefono`, `texto`, `coord_lat`, `coord_lon`) VALUES
(1, 'El volcÃ¡n', NULL, 'Patzcuaro', 'MichoacÃ¡n', 'Federico Tena 50', '434343434', 'Pastor y especialidades', '19.508707833688174', '-101.61016702651978'),
(2, 'El cerillo', NULL, 'PÃ¡tzcuaro', 'MichoacÃ¡n', 'Portal Salazar S/N', '', 'Tacos de tripa', '19.51370352991352', '-101.61196947097778');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `id_calificaciones`
--
ALTER TABLE `id_calificaciones`
  ADD PRIMARY KEY (`id_calificacion`);

--
-- Indices de la tabla `restaurantes`
--
ALTER TABLE `restaurantes`
  ADD PRIMARY KEY (`id_restaurante`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `id_calificaciones`
--
ALTER TABLE `id_calificaciones`
  MODIFY `id_calificacion` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `restaurantes`
--
ALTER TABLE `restaurantes`
  MODIFY `id_restaurante` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
