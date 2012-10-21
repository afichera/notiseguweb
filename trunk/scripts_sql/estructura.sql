-- phpMyAdmin SQL Dump
-- version 3.4.5
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 21-10-2012 a las 15:11:32
-- Versión del servidor: 5.5.16
-- Versión de PHP: 5.3.8

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `notiseguweb`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `comentario`
--

CREATE TABLE IF NOT EXISTS `comentario` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `texto` text NOT NULL,
  `fecha_hora` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `nota_id` bigint(20) NOT NULL,
  `usuario_id` bigint(20) DEFAULT NULL,
  `comentador` varchar(100) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `nota_id` (`nota_id`,`usuario_id`),
  KEY `usuario_id` (`usuario_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `nota`
--

CREATE TABLE IF NOT EXISTS `nota` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `titulo` varchar(150) NOT NULL,
  `fecha_hora` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `texto` text NOT NULL,
  `usuario_id` bigint(20) NOT NULL,
  `usuario_creador_id` bigint(20) NOT NULL,
  `fecha_hora_baja` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  KEY `usuario_id` (`usuario_id`),
  KEY `usuario_creador_id` (`usuario_creador_id`),
  KEY `usuario_id_2` (`usuario_id`,`usuario_creador_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rol`
--

CREATE TABLE IF NOT EXISTS `rol` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE IF NOT EXISTS `usuario` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `nombre_apellido` varchar(100) NOT NULL,
  `nombre_usu` varchar(30) NOT NULL,
  `pass` varchar(30) NOT NULL,
  `rol_id` int(20) NOT NULL,
  `fecha_hora_baja` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  UNIQUE KEY `nombre_usu` (`nombre_usu`),
  KEY `rol_id` (`rol_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=15 ;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `comentario`
--
ALTER TABLE `comentario`
  ADD CONSTRAINT `comentario_ibfk_2` FOREIGN KEY (`usuario_id`) REFERENCES `usuario` (`id`),
  ADD CONSTRAINT `comentario_ibfk_1` FOREIGN KEY (`nota_id`) REFERENCES `nota` (`id`);

--
-- Filtros para la tabla `nota`
--
ALTER TABLE `nota`
  ADD CONSTRAINT `nota_ibfk_2` FOREIGN KEY (`usuario_creador_id`) REFERENCES `usuario` (`id`),
  ADD CONSTRAINT `nota_ibfk_1` FOREIGN KEY (`usuario_id`) REFERENCES `usuario` (`id`);

--
-- Filtros para la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD CONSTRAINT `usuario_ibfk_1` FOREIGN KEY (`rol_id`) REFERENCES `rol` (`id`);

 -- Vista Usuario-Rol
 
CREATE OR REPLACE VIEW usuario_rol AS
SELECT usuario.id as id, nombre_apellido as Nombre, nombre_usu as "Nombre de Usuario", descripcion as Rol
FROM usuario
INNER JOIN rol ON usuario.rol_id = rol.id
WHERE usuario.fecha_hora_baja = '0000-00-00 00:00:00';
  
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
