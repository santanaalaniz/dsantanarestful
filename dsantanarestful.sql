-- phpMyAdmin SQL Dump
-- version 4.2.12deb2+deb8u2
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 13-11-2018 a las 10:12:08
-- Versión del servidor: 5.5.60-0+deb8u1
-- Versión de PHP: 5.6.33-0+deb8u1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `dsantanarestful`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE IF NOT EXISTS `usuarios` (
`id` int(11) NOT NULL,
  `usuario` varchar(255) NOT NULL,
  `contrasena` varchar(255) NOT NULL,
  `creado` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `usuario`, `contrasena`, `creado`) VALUES
(1, 'ejemplo', 'MTIzNDU=', '2018-11-10 15:23:37'),
(2, 'usuario1', 'dXN1YXJpbzE=', '2018-11-09 17:57:03'),
(3, 'usuario2', 'dXN1YXJpbzI=', '2018-11-09 17:57:12'),
(4, 'usuario3', 'dXN1YXJpbzM=', '2018-11-09 18:41:47'),
(5, 'as', 'YXM=', '2018-11-09 18:42:15'),
(6, 'az', 'YXo=', '2018-11-09 18:48:53'),
(7, 'qs', 'cXM=', '2018-11-09 19:18:01'),
(8, 'qsa', 'cXNh', '2018-11-09 19:21:35'),
(9, 'qsaa', 'cXNhYQ==', '2018-11-09 19:24:08'),
(10, 'qsaaq', 'cXNhYXE=', '2018-11-09 19:47:17'),
(11, 'ed', 'ZWQ=', '2018-11-09 19:49:11'),
(12, 'asa', 'YXNh', '2018-11-09 19:57:35'),
(13, 'us1', 'dXMx', '2018-11-12 16:12:12'),
(14, '1qw', 'MXEydzNl', '2018-11-12 17:27:23'),
(15, 'us11', 'dXMxMQ==', '2018-11-12 16:14:27'),
(16, 'maniaco', 'MXEydzNl', '2018-11-12 17:22:45'),
(17, 'maniaco12', 'MXEydzNlMg==', '2018-11-12 17:39:40'),
(18, 'zaz', 'emF6', '2018-11-12 20:31:53'),
(19, 'zaz12', 'emF6MTI=', '2018-11-13 15:17:03'),
(20, '1q2w', 'MXEydw==', '2018-11-13 15:34:48'),
(21, '1q2w1', 'MXEydzE=', '2018-11-13 15:40:15'),
(22, '123e', 'MTIzZQ==', '2018-11-13 15:42:15'),
(23, '3ee', 'M2Vl', '2018-11-13 16:17:17'),
(24, '', '', '2018-11-13 18:06:08');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
 ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=25;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
