-- phpMyAdmin SQL Dump
-- version 3.4.5
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 21-10-2012 a las 01:49:06
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

--
-- Volcado de datos para la tabla `comentario`
--

INSERT INTO `comentario` (`id`, `texto`, `fecha_hora`, `nota_id`, `usuario_id`, `comentador`) VALUES
(1, 'Otra vez tenemos que cambiar de sistema operativo? Mejor me quedo con mi DOS...', '2012-10-20 00:07:00', 2, 2, 'Periodista 1'),
(2, 'Lo voy a probar... y posteriormente conseguir el crack de activación of course...', '2012-10-20 00:07:00', 2, NULL, 'Anonimus User');

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
  `usuario_creador_id` bigint(20) DEFAULT NULL,
  `fecha_hora_baja` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  KEY `usuario_id` (`usuario_id`),
  KEY `usuario_creador_id` (`usuario_creador_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Volcado de datos para la tabla `nota`
--

INSERT INTO `nota` (`id`, `titulo`, `fecha_hora`, `texto`, `usuario_id`, `usuario_creador_id`, `fecha_hora_baja`) VALUES
(1, 'Cromañón: el fiscal pidió la detención de todos los condenados', '2012-10-20 00:04:32', 'El fiscal ante la Cámara Federal de Casación Penal, Raúl Plee, reclamó hoy la "inmediata detención" de todos los condenados por el incendio en el boliche Cromañon por entender que hay mayores riesgos de fuga ante la certera posibilidad que enfrenta la mayoría de ellos de ir a prisión.\r\n\r\n\r\n"A esta altura del proceso, existe una nueva circunstancia que constituye un peligro procesal que debe ser considerado para asegurar el cumplimiento de la sentencia, y es ni más ni menos que la existencia de una condena grave de efectivo cumplimiento dictada por la sala III" de ese tribunal, argumentó Plee ante los camaristas Liliana Catucci, Mariano Borinsky y Eduardo Riggi.\r\n\r\n\r\nY por ello solicitó la "inmediata detención" del ex gerenciador de Cromañón, Omar Chabán, del ex subcomisario Carlos Díaz, de los ex integrantes de Callejeros Patricio Santos Fontanet, Eduardo Vásquez, Christian Torrejón, Juan Carbone, Maximiliano Djerfy, Elio Delgado, Daniel Cardell, y de su ex manager, Diego Argañaraz.', 2, NULL, '0000-00-00 00:00:00'),
(2, 'Microsoft presenta Windows 8, su apuesta más radical en mucho tiempo', '2012-10-20 00:04:32', 'Ya está disponible la versión de prueba y día a día se crean nuevas aplicaciones, que ya suman miles. Mientras tanto, <b>Microsoft</b> se prepara para presentar oficialmente la semana que viene la versión final del sistema operativo Windows 8, su apuesta más radical en mucho tiempo.<br/>\r\nSin dudas, el Windows 8 es visualmente el cambio más grande en el sistema operativo de Microsoft desde el pasaje del 3.11 al 95. Pero no es lo único ni lo más importante: se modifican, sobre todo, el modo de usarlo –es ideal para pantallas personales y táctiles y las distintas aplicaciones están muy integradas entre sí- y, aunque no lo promocionen, el propio modelo de negocios de la compañía de Bill Gates.\r\n<br/>En el nuevo sistema, una pantalla de inicio reemplaza al tradicional escritorio, que sigue funcionando para las aplicaciones y programas que no son "nativos" de Windows 8 y, a su vez, como aplicación.\r\n\r\n\r\n\r\nEsa pantalla está organizada por módulos de distinto tamaño que pueden agruparse según los intereses del usuario; cada módulo puede ser de acceso a una aplicación o a un conjunto de aplicaciones. El recorrido es horizontal.', 5, NULL, '0000-00-00 00:00:00'),
(3, 'Cromañón: el fiscal pidió la detención de todos los condenados', '2012-10-20 03:04:32', 'El fiscal ante la Cámara Federal de Casación Penal, Raúl Plee, reclamó hoy la "inmediata detención" de todos los condenados por el incendio en el boliche Cromañon por entender que hay mayores riesgos de fuga ante la certera posibilidad que enfrenta la mayoría de ellos de ir a prisión.\r\n\r\n\r\n"A esta altura del proceso, existe una nueva circunstancia que constituye un peligro procesal que debe ser considerado para asegurar el cumplimiento de la sentencia, y es ni más ni menos que la existencia de una condena grave de efectivo cumplimiento dictada por la sala III" de ese tribunal, argumentó Plee ante los camaristas Liliana Catucci, Mariano Borinsky y Eduardo Riggi.\r\n\r\n\r\nY por ello solicitó la "inmediata detención" del ex gerenciador de Cromañón, Omar Chabán, del ex subcomisario Carlos Díaz, de los ex integrantes de Callejeros Patricio Santos Fontanet, Eduardo Vásquez, Christian Torrejón, Juan Carbone, Maximiliano Djerfy, Elio Delgado, Daniel Cardell, y de su ex manager, Diego Argañaraz.', 2, NULL, '0000-00-00 00:00:00'),
(4, 'Microsoft presenta Windows 8, su apuesta más radical en mucho tiempo', '2012-10-20 03:04:32', 'Ya está disponible la versión de prueba y día a día se crean nuevas aplicaciones, que ya suman miles. Mientras tanto, Microsoft se prepara para presentar oficialmente la semana que viene la versión final del sistema operativo Windows 8, su apuesta más radical en mucho tiempo.\r\n\r\n\r\n\r\nSin dudas, el Windows 8 es visualmente el cambio más grande en el sistema operativo de Microsoft desde el pasaje del 3.11 al 95. Pero no es lo único ni lo más importante: se modifican, sobre todo, el modo de usarlo –es ideal para pantallas personales y táctiles y las distintas aplicaciones están muy integradas entre sí- y, aunque no lo promocionen, el propio modelo de negocios de la compañía de Bill Gates.\r\n\r\n\r\n\r\nEn el nuevo sistema, una pantalla de inicio reemplaza al tradicional escritorio, que sigue funcionando para las aplicaciones y programas que no son "nativos" de Windows 8 y, a su vez, como aplicación.\r\n\r\n\r\n\r\nEsa pantalla está organizada por módulos de distinto tamaño que pueden agruparse según los intereses del usuario; cada módulo puede ser de acceso a una aplicación o a un conjunto de aplicaciones. El recorrido es horizontal.', 5, NULL, '0000-00-00 00:00:00'),
(5, 'Cromañón: el fiscal pidió la detención de todos los condenados', '2012-01-20 03:04:32', 'El fiscal ante la Cámara Federal de Casación Penal, Raúl Plee, reclamó hoy la "inmediata detención" de todos los condenados por el incendio en el boliche Cromañon por entender que hay mayores riesgos de fuga ante la certera posibilidad que enfrenta la mayoría de ellos de ir a prisión.\r\n\r\n\r\n"A esta altura del proceso, existe una nueva circunstancia que constituye un peligro procesal que debe ser considerado para asegurar el cumplimiento de la sentencia, y es ni más ni menos que la existencia de una condena grave de efectivo cumplimiento dictada por la sala III" de ese tribunal, argumentó Plee ante los camaristas Liliana Catucci, Mariano Borinsky y Eduardo Riggi.\r\n\r\n\r\nY por ello solicitó la "inmediata detención" del ex gerenciador de Cromañón, Omar Chabán, del ex subcomisario Carlos Díaz, de los ex integrantes de Callejeros Patricio Santos Fontanet, Eduardo Vásquez, Christian Torrejón, Juan Carbone, Maximiliano Djerfy, Elio Delgado, Daniel Cardell, y de su ex manager, Diego Argañaraz.', 2, NULL, '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rol`
--

CREATE TABLE IF NOT EXISTS `rol` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Volcado de datos para la tabla `rol`
--

INSERT INTO `rol` (`id`, `descripcion`) VALUES
(1, 'PERIODISTA'),
(2, 'EDITOR');

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
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id`, `nombre_apellido`, `nombre_usu`, `pass`, `rol_id`, `fecha_hora_baja`) VALUES
(2, 'Periodista 1', 'periodista1', 'periodista1', 1, '0000-00-00 00:00:00'),
(3, 'Periodista 2', 'periodista2', 'periodista2', 1, '0000-00-00 00:00:00'),
(4, 'Editor 2', 'editor2', 'editor2', 2, '0000-00-00 00:00:00'),
(5, 'Editor 3', 'editor3', 'editor3', 2, '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Estructura Stand-in para la vista `usuario_rol`
--
CREATE TABLE IF NOT EXISTS `usuario_rol` (
`id` bigint(20)
,`Nombre` varchar(100)
,`Nombre de Usuario` varchar(30)
,`Rol` varchar(50)
);
-- --------------------------------------------------------

--
-- Estructura para la vista `usuario_rol`
--
DROP TABLE IF EXISTS `usuario_rol`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `usuario_rol` AS select `usuario`.`id` AS `id`,`usuario`.`nombre_apellido` AS `Nombre`,`usuario`.`nombre_usu` AS `Nombre de Usuario`,`rol`.`descripcion` AS `Rol` from (`usuario` join `rol` on((`usuario`.`rol_id` = `rol`.`id`))) where (`usuario`.`fecha_hora_baja` = '0000-00-00 00:00:00');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
