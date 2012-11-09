-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 22-10-2012 a las 22:29:10
-- Versión del servidor: 5.5.27
-- Versión de PHP: 5.4.7

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `web_news`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `comments`
--

CREATE TABLE IF NOT EXISTS `comments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `newsId` int(11) NOT NULL,
  `visitorUsername` varchar(45) COLLATE utf8_spanish_ci DEFAULT NULL,
  `description` varchar(150) COLLATE utf8_spanish_ci NOT NULL,
  `creationDate` datetime NOT NULL,
  PRIMARY KEY (`id`,`newsId`),
  KEY `newsId` (`newsId`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=17 ;

--
-- Volcado de datos para la tabla `comments`
--

INSERT INTO `comments` (`id`, `newsId`, `visitorUsername`, `description`, `creationDate`) VALUES
(2, 29, NULL, 'bahh para q comentar sin comillas', '2012-10-20 22:06:40'),
(3, 29, NULL, 'mas de sin comillas', '2012-10-20 22:23:03'),
(4, 16, NULL, 'tragedia de once', '2012-10-20 22:29:00'),
(16, 35, NULL, 'que se yo.', '2012-10-21 17:31:12');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `news`
--

CREATE TABLE IF NOT EXISTS `news` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `userUsername` varchar(45) COLLATE utf8_spanish_ci NOT NULL,
  `title` varchar(150) COLLATE utf8_spanish_ci NOT NULL,
  `description` varchar(1000) COLLATE utf8_spanish_ci NOT NULL,
  `creationDate` datetime NOT NULL,
  `isDeleted` enum('0','1') COLLATE utf8_spanish_ci DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `userUserName` (`userUsername`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=36 ;

--
-- Volcado de datos para la tabla `news`
--

INSERT INTO `news` (`id`, `userUsername`, `title`, `description`, `creationDate`, `isDeleted`) VALUES
(2, 'definitivo', 'tit', 'contenido', '2012-10-20 01:45:48', '0'),
(3, 'son', 'test 2', 'prueba 2 con select desde bdd\r\nson', '2012-10-20 04:19:35', '0'),
(5, 'son', 'desde', 'periodista SON', '2012-10-20 06:38:38', '0'),
(6, 'renu', 'test', 'noticia\ncreada\ndesde\nel editor\na nombre\nde RENU', '2012-10-20 07:09:18', '0'),
(15, 'definitivo', '11111111112222', 'sadas', '2012-10-20 14:46:31', '0'),
(16, 'definitivo', 'El jefe de la AuditorÃ­a le apunta a De Vido por la tragedia de Once', 'asfafa', '2012-10-20 14:49:21', '0'),
(18, 'definitivo', 'asfd', 'asfaaaaaa', '2012-10-20 15:18:21', '1'),
(20, 'renu', 'asd', 'PresentarÃ¡n la iniciativa en los prÃ³ximos dÃ­as. La reforma apunta a que la modificaciÃ³n bonaerense estÃ© en lÃ­nea con el proyecto que el Frente Para la Victoria presentÃ³ en el Congreso de la NaciÃ³n. ', '2012-10-20 18:48:58', '0'),
(28, 'renu', 'intento 3', 'Debo leer datos de una columna de tipo de datos image, almacenado como hexadecimal,\r\ny convertirlo a varchar, eso lo he logrado ya. El problema es que los datos que estan almacenados sobrepasan los 8000 caracteres, que es lo maximo que almacena un valor de \r\ntipo varchar en sql server 2000 a diferencia del sql server 2005, que almacena hasta 2GB de data usando el max , el problema es que en la empresa donde laboro tienen el sql server 2000, y cuando realizo la conversion solo convierte hasta 8000 y el resto no.\r\n \r\nPor eso queria saber si existe algun tipo de dato de texto que almacene mas de 8000 caracteres o si es que se pueda instalar un parche al sql 2000 para que el varchar logre almacenar mas data, o quizas poder pasar esa imformacion a un archivo de texto y luego\r\nleerlo desde alli, he visto que es utilizando el comando bcp, pero todavia estoy aprendiendo a utilizarlo.', '2012-10-20 19:10:10', '0'),
(29, 'renu', 'sin comillas', 'Leandro Despouy dijo que el Ministerio de PlanificaciÃ³n tenÃ­a la responsabilidad primaria en la prestaciÃ³n del servicio. Y que ademÃ¡s, contaba con pruebas sobre el mal desempeÃ±o de Ricardo Jaime en Transporte.', '2012-10-20 19:12:28', '0'),
(33, 'renu', 'Noticia de Periodista', 'momomomodmoamdoas', '2012-10-20 23:06:44', '0'),
(35, 'renu', 'nueva nota test', 'algun texto', '2012-10-21 17:30:57', '0');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `roles`
--

CREATE TABLE IF NOT EXISTS `roles` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `description` varchar(45) COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=3 ;

--
-- Volcado de datos para la tabla `roles`
--

INSERT INTO `roles` (`id`, `description`) VALUES
(1, 'Editor'),
(2, 'Periodista');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `username` varchar(45) COLLATE utf8_spanish_ci NOT NULL,
  `roleId` int(11) NOT NULL,
  `dni` bigint(15) NOT NULL,
  `name` varchar(45) COLLATE utf8_spanish_ci NOT NULL,
  `surname` varchar(45) COLLATE utf8_spanish_ci NOT NULL,
  `password` varchar(45) COLLATE utf8_spanish_ci NOT NULL,
  `creationDate` datetime NOT NULL,
  `isDeleted` enum('0','1') COLLATE utf8_spanish_ci DEFAULT '0',
  PRIMARY KEY (`username`),
  KEY `roleId` (`roleId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`username`, `roleId`, `dni`, `name`, `surname`, `password`, `creationDate`, `isDeleted`) VALUES
('definitivo', 1, 2345, 'defi', 'nitivo', 'yui', '2012-10-20 01:15:04', '1'),
('erdf', 1, 4565, 'asd', 'fffg', 'ee', '2012-10-20 03:49:30', '0'),
('kipildor', 1, 28473674, 'Leandro', 'Quipildor', 'kipi', '2012-10-21 17:34:43', '1'),
('Lean', 1, 258, 'pru3', 'pru3', 'eee', '2012-10-20 01:00:39', '0'),
('qwas', 2, 234, 'dasd', 'afas', 'aaa', '2012-10-20 03:49:15', '1'),
('renu', 2, 8989, 'Lomb', 'Bausch', '111', '2012-10-20 07:08:02', '0'),
('son', 2, 99900, 'kil', 'kill', 'son', '2012-10-20 01:13:36', '1'),
('yu', 1, 258, 'pru3', 'pru3', 'eee', '2012-10-20 01:09:00', '1');

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `newsId` FOREIGN KEY (`newsId`) REFERENCES `news` (`id`) ON DELETE NO ACTION;

--
-- Filtros para la tabla `news`
--
ALTER TABLE `news`
  ADD CONSTRAINT `userUserName` FOREIGN KEY (`userUserName`) REFERENCES `users` (`username`) ON DELETE NO ACTION;

--
-- Filtros para la tabla `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `roleId` FOREIGN KEY (`roleId`) REFERENCES `roles` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
