-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3306
-- Tiempo de generación: 19-03-2019 a las 13:29:53
-- Versión del servidor: 5.7.23
-- Versión de PHP: 7.2.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `cine`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cliente`
--

DROP TABLE IF EXISTS `cliente`;
CREATE TABLE IF NOT EXISTS `cliente` (
  `idCliente` int(11) NOT NULL AUTO_INCREMENT,
  `Nombre` varchar(30) DEFAULT NULL,
  `Apellidos` varchar(45) DEFAULT NULL,
  `Correo` varchar(50) DEFAULT NULL,
  `contraseña` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`idCliente`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `cliente`
--

INSERT INTO `cliente` (`idCliente`, `Nombre`, `Apellidos`, `Correo`, `contraseña`) VALUES
(1, 'Administrador', 'Admin', 'administrador@gmail.com', 'b1016b8db2dd34268a55b9800430d8d595292c1d'),
(2, 'Irvin Ricardo', 'Moreno Cano', 'matt.9405@gmail.com', 'b1016b8db2dd34268a55b9800430d8d595292c1d');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `compras`
--

DROP TABLE IF EXISTS `compras`;
CREATE TABLE IF NOT EXISTS `compras` (
  `idCompras` int(11) NOT NULL AUTO_INCREMENT,
  `idCliente` int(11) NOT NULL,
  `Total` float DEFAULT NULL,
  `NBoletos` int(11) DEFAULT NULL,
  `Fecha` date DEFAULT NULL,
  PRIMARY KEY (`idCompras`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `funcion`
--

DROP TABLE IF EXISTS `funcion`;
CREATE TABLE IF NOT EXISTS `funcion` (
  `idFuncion` int(11) NOT NULL AUTO_INCREMENT,
  `idPelicula` int(11) NOT NULL,
  `hora` time DEFAULT NULL,
  `sala` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`idFuncion`),
  KEY `idPelicula` (`idPelicula`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `imagen`
--

DROP TABLE IF EXISTS `imagen`;
CREATE TABLE IF NOT EXISTS `imagen` (
  `idImagen` int(11) NOT NULL AUTO_INCREMENT,
  `idPeliculas` int(11) NOT NULL,
  `Archivo` text,
  PRIMARY KEY (`idImagen`),
  KEY `idPeliculas` (`idPeliculas`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `imagen`
--

INSERT INTO `imagen` (`idImagen`, `idPeliculas`, `Archivo`) VALUES
(1, 4, 'https://s3.amazonaws.com/statics3.cinemex.com/movie_posters/Wd3eyvhvI37OZF7-182x272.jpg'),
(2, 3, 'https://s3.amazonaws.com/statics3.cinemex.com/movie_posters/cIIBzgplxbBRPin-182x272.jpg'),
(3, 1, 'https://s3.amazonaws.com/statics3.cinemex.com/movie_posters/coXw5Jxt2gzGIcG-182x272.jpg'),
(4, 2, 'https://s3.amazonaws.com/statics3.cinemex.com/movie_posters/xzkN7R5bZrRtwuW-182x272.jpg'),
(5, 5, 'https://s3.amazonaws.com/statics3.cinemex.com/movie_posters/G89ffkD0q8OmGfd-182x272.jpg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `peliculas`
--

DROP TABLE IF EXISTS `peliculas`;
CREATE TABLE IF NOT EXISTS `peliculas` (
  `idPeliculas` int(11) NOT NULL AUTO_INCREMENT,
  `Director` varchar(30) DEFAULT NULL,
  `Año` year(4) DEFAULT NULL,
  `Clasificacion` varchar(10) DEFAULT NULL,
  `pais` varchar(30) DEFAULT NULL,
  `Genero` varchar(50) DEFAULT NULL,
  `Sinposis` text,
  `Nombre` varchar(30) DEFAULT NULL,
  `Duracion` varchar(5) DEFAULT NULL,
  `Actores` varchar(50) DEFAULT NULL,
  `enlace` text,
  PRIMARY KEY (`idPeliculas`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `peliculas`
--

INSERT INTO `peliculas` (`idPeliculas`, `Director`, `Año`, `Clasificacion`, `pais`, `Genero`, `Sinposis`, `Nombre`, `Duracion`, `Actores`, `enlace`) VALUES
(1, 'Anna Boden,  Ryan Fleck', 2019, 'B', 'Estados Unidos', 'Ciencia Ficción', 'La historia sigue a Carol Danvers mientras ella se convierte en uno de los héroes más poderosos del universo cuando la Tierra se encuentre atrapada en medio de una guerra galáctica entre dos razas alienígenas. Situada en los años 90, Captain Marvel es una historia nueva de un período de tiempo nunca antes visto en la historia del Universo Cinematográfico de Marvel', 'Capitana Marvel', '124', NULL, 'https://www.youtube.com/embed/uNu8jLw9yF4'),
(2, 'David F. Sandberg', 2019, 'B', 'Estados Unidos', 'Ciencia Ficcion', 'Todos llevamos un superhéroe dentro, solo se necesita un poco de magia para sacarlo a la luz. Cuando Billy Batson, un niño de acogida de 14 años que ha crecido en las calles, grita la palabra \'SHAZAM!\' se convierte en el Superhéroe adulto Shazam, por cortesía de un antiguo mago. Dentro de un cuerpo musculoso y divino, Shazam esconde un corazón de niño. Pero lo mejor es que en esta versión de adulto consigue realizar todo lo que le gustaría hacer a cualquier adolescente con superpoderes: ¡Divertirse con ellos! ¿Volar? ¿Tener visión de rayos X?', 'Shazam', '137 ', NULL, 'https://www.youtube.com/embed/B_DpkUSH2Mk'),
(3, 'Gabriel Barragan Senties', 2019, 'B', 'Mexico', 'Comedia', 'Sebastián y Valeria tienen 3 años juntos y una relación aparentemente estable y feliz. Un día Valeria se entera que está embarazada y después de decírselo a Sebastián, él decide pedirle matrimonio y formalizar su relación. Durante un tiempo todo parece perfecto, pero conforme se acercan a la fecha todo se complica debido a Pamela, una joven que trabaja con él y que está empeñada en seducirlo. La sombra del compromiso y la insistencia de Pamela, pondrán a Sebastián en una situación de la cual no podrá salir fácilmente y llevarán su relación al borde del colapso. Al final, será el amor lo que lo llevará a encontrar el camino hacia la felicidad.', 'En las Buenas y En Las Malas', '86', NULL, 'https://www.youtube.com/embed/YFFvs8BgXQY'),
(4, 'Darrell James Roodt', 2019, 'C', 'Sudáfrica', 'Terror', 'Chloe una joven de 19 años está abrumada por el nacimiento de su primer hijo, el llanto incesante de su bebé, la creciente sensación de culpa y la paranoia le llevan a una oscura depresión. Angustiada, visita al psicólogo familiar, el doctor Timothy Reed, quien le diagnostica sentimientos de ansiedad y melancolía. Sin embargo, los pensamientos empeoran y son cada vez más violentos. Chloe comienza a escuchar voces y ve destellos de una entidad extraña alrededor de su hijo, convencida de que la entidad es real, Chloe hace todo lo que está en su poder para proteger a su hijo.', 'Con el Demonio Adentro', '87', 'Brandon Auret, Reine Swart, Thandi Puren', 'https://www.youtube.com/embed/DebJCf5GsgY'),
(5, 'Dean DeBlois', 2019, 'A', 'Estados Unidos', 'Animacíon', 'Lo que comenzó como la inesperada amistad entre un joven vikingo y un temible dragón Furia Nocturna se ha convertido en una épica trilogía que ha recorrido sus vidas. En esta nueva entrega, Hipo y Desdentao descubrirán finalmente su verdadero destino: para uno, gobernar Isla Mema junto a Astrid; para el otro, ser el líder de su especie. Pero, por el camino, deberán poner a prueba los lazos que los unen, plantando cara a la mayor amenaza que jamás hayan afrontado... y a la aparición de una Furia Nocturna hembra.', 'Cómo Entrenar A Tu Dragón 3', '110', NULL, 'https://www.youtube.com/embed/DebJCf5GsgY');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `precios`
--

DROP TABLE IF EXISTS `precios`;
CREATE TABLE IF NOT EXISTS `precios` (
  `idPrecios` int(11) NOT NULL AUTO_INCREMENT,
  `tradicional` float DEFAULT NULL,
  `D3` float DEFAULT NULL,
  PRIMARY KEY (`idPrecios`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
