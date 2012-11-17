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
  `visitorUsername` varchar(128) COLLATE utf8_spanish_ci DEFAULT NULL,
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
  `userUsername` varchar(128) COLLATE utf8_spanish_ci NOT NULL,
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
(2, 'ddf3624547e7b62b131d431e0c3a88b4', 'tit', 'contenido', '2012-10-20 01:45:48', '0'),
(3, '498d3c6bfa033f6dc1be4fcc3c370aa7', 'test 2', 'prueba 2 con select desde bdd\r\nson', '2012-10-20 04:19:35', '0'),
(5, '498d3c6bfa033f6dc1be4fcc3c370aa7', 'desde', 'periodista SON', '2012-10-20 06:38:38', '0'),
(6, 'ef88f3f374aa10d1493757bb6a4046a6', 'test', 'noticia\ncreada\ndesde\nel editor\na nombre\nde RENU', '2012-10-20 07:09:18', '0'),
(15, 'ddf3624547e7b62b131d431e0c3a88b4', '11111111112222', 'sadas', '2012-10-20 14:46:31', '0'),
(16, 'ddf3624547e7b62b131d431e0c3a88b4', 'El jefe de la AuditorÃ­a le apunta a De Vido por la tragedia de Once', 'asfafa', '2012-10-20 14:49:21', '0'),
(18, 'ddf3624547e7b62b131d431e0c3a88b4', 'asfd', 'asfaaaaaa', '2012-10-20 15:18:21', '1'),
(20, 'ef88f3f374aa10d1493757bb6a4046a6', 'asd', 'PresentarÃ¡n la iniciativa en los prÃ³ximos dÃ­as. La reforma apunta a que la modificaciÃ³n bonaerense estÃ© en lÃ­nea con el proyecto que el Frente Para la Victoria presentÃ³ en el Congreso de la NaciÃ³n. ', '2012-10-20 18:48:58', '0'),
(28, 'ef88f3f374aa10d1493757bb6a4046a6', 'intento 3', 'Debo leer datos de una columna de tipo de datos image, almacenado como hexadecimal,\r\ny convertirlo a varchar, eso lo he logrado ya. El problema es que los datos que estan almacenados sobrepasan los 8000 caracteres, que es lo maximo que almacena un valor de \r\ntipo varchar en sql server 2000 a diferencia del sql server 2005, que almacena hasta 2GB de data usando el max , el problema es que en la empresa donde laboro tienen el sql server 2000, y cuando realizo la conversion solo convierte hasta 8000 y el resto no.\r\n \r\nPor eso queria saber si existe algun tipo de dato de texto que almacene mas de 8000 caracteres o si es que se pueda instalar un parche al sql 2000 para que el varchar logre almacenar mas data, o quizas poder pasar esa imformacion a un archivo de texto y luego\r\nleerlo desde alli, he visto que es utilizando el comando bcp, pero todavia estoy aprendiendo a utilizarlo.', '2012-10-20 19:10:10', '0'),
(29, 'ef88f3f374aa10d1493757bb6a4046a6', 'sin comillas', 'Leandro Despouy dijo que el Ministerio de PlanificaciÃ³n tenÃ­a la responsabilidad primaria en la prestaciÃ³n del servicio. Y que ademÃ¡s, contaba con pruebas sobre el mal desempeÃ±o de Ricardo Jaime en Transporte.', '2012-10-20 19:12:28', '0'),
(33, 'ef88f3f374aa10d1493757bb6a4046a6', 'Noticia de Periodista', 'momomomodmoamdoas', '2012-10-20 23:06:44', '0'),
(35, 'ef88f3f374aa10d1493757bb6a4046a6', 'nueva nota test', 'algun texto', '2012-10-21 17:30:57', '0');

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
-- A CONTINUACION EL NUEVO SCRIPT DE LA TABLA MODIFICADA DE USERS.
CREATE TABLE IF NOT EXISTS `users` (
  `username` varchar(128) COLLATE utf8_spanish_ci NOT NULL,
  `roleId` int(11) NOT NULL,
  `dni` bigint(15) NOT NULL,
  `name` varchar(45) COLLATE utf8_spanish_ci NOT NULL,
  `surname` varchar(45) COLLATE utf8_spanish_ci NOT NULL,
  `password` varchar(128) COLLATE utf8_spanish_ci NOT NULL,
  `creationDate` datetime NOT NULL,
  `isDeleted` enum('0','1') COLLATE utf8_spanish_ci DEFAULT '0',
  PRIMARY KEY (`username`),
  KEY `roleId` (`roleId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;


--
-- Volcado de datos para la tabla `users`
--

-- A CONTINUACION EL MISMO SCRIPT INICIAL CON LOS PASSWORDS ENCRIPTADOS
INSERT INTO `users` (`username`, `roleId`, `dni`, `name`, `surname`, `password`, `creationDate`, `isDeleted`) VALUES
('ddf3624547e7b62b131d431e0c3a88b4', 1, 2345, 'defi', 'nitivo', '7625a98fa76ae1fdeedf46a7f5b3a58810a69d93', '2012-10-20 01:15:04', '1'),
('170c9c6701ea5fbce9da60d0cad4b0cd', 1, 4565, 'asd', 'fffg', '56c5aa12df50651fbbcc280bbe3840c1bd0d9131', '2012-10-20 03:49:30', '0'),
('1e9c89a31fd7d98547da4022e200bdfc', 1, 28473674, 'Leandro', 'Quipildor', '79f893df78cbc22b26e17d7ca6820be97914c190', '2012-10-21 17:34:43', '1'),
('6050cb77ad130996b02ddecdb822b6cd', 1, 258, 'pru3', 'pru3', 'e7bf0445625ef16b79463aaa23c9e95aea554b90', '2012-10-20 01:00:39', '0'),
('ce827a5f1df5b82656d6ecebf1cd20ab', 2, 234, 'dasd', 'afas', '90b0287495b81ae17e6605922c5245cfc5e8115c', '2012-10-20 03:49:15', '1'),
('ef88f3f374aa10d1493757bb6a4046a6', 2, 8989, 'Lomb', 'Bausch', '87e1e9efd6047c7f41f1ac707b29de50a0ab1ea9', '2012-10-20 07:08:02', '0'),
('498d3c6bfa033f6dc1be4fcc3c370aa7', 2, 99900, 'kil', 'kill', '77b39aa2a1104b1ecc01d79d06f59ae6d7064586', '2012-10-20 01:13:36', '1'),
('385d04e7683a033fcc6c6654529eb7e9', 1, 258, 'pru3', 'pru3', 'e7bf0445625ef16b79463aaa23c9e95aea554b90', '2012-10-20 01:09:00', '1');





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
