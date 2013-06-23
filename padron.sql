-- phpMyAdmin SQL Dump
-- version 3.5.8
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 23-06-2013 a las 18:08:02
-- Versión del servidor: 5.5.31-cll
-- Versión de PHP: 5.3.17

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `polize_padronec`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `padron`
--

CREATE TABLE IF NOT EXISTS `padron` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `distrito` int(11) NOT NULL,
  `matricula` int(11) NOT NULL,
  `clase` int(5) NOT NULL,
  `apellido` varchar(255) NOT NULL,
  `nombres` varchar(255) NOT NULL,
  `profesion` varchar(255) NOT NULL,
  `domicilio` varchar(255) NOT NULL,
  `nro` varchar(255) NOT NULL,
  `pisodpto` varchar(255) NOT NULL,
  `tipo_documento` varchar(255) NOT NULL,
  `analfabeto` varchar(255) NOT NULL,
  `seccion` int(11) NOT NULL,
  `circuito` int(11) NOT NULL,
  `sexo` varchar(11) NOT NULL,
  `fecha_afiliacion` date NOT NULL,
  `partido_politico` varchar(255) NOT NULL,
  `estado_afiliacion` varchar(255) NOT NULL,
  `nro_registro` int(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=801 ;

--
-- Volcado de datos para la tabla `padron`
--

-- Info para testear...
INSERT INTO `padron` (`id`, `distrito`, `matricula`, `clase`, `apellido`, `nombres`, `profesion`, `domicilio`, `nro`, `pisodpto`, `tipo_documento`, `analfabeto`, `seccion`, `circuito`, `sexo`, `fecha_afiliacion`, `partido_politico`, `estado_afiliacion`, `nro_registro`) VALUES
(1, 20, 00000000, 1995, 'BARABINO', 'ADRIAN', 'DESARROLLADOR WEB', 'CALLE FALSA', '123', '', 'DNI-DE-MENTIRA', '', 7, 18, 'M', '2013-06-23', '164', '', 000000),

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
