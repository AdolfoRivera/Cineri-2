-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3306
-- Tiempo de generación: 18-03-2019 a las 23:09:15
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
CREATE DATABASE IF NOT EXISTS `cine` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `cine`;

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
--
-- Base de datos: `foro`
--
CREATE DATABASE IF NOT EXISTS `foro` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `foro`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `comentario_foro`
--

DROP TABLE IF EXISTS `comentario_foro`;
CREATE TABLE IF NOT EXISTS `comentario_foro` (
  `id_comentario` int(11) NOT NULL AUTO_INCREMENT,
  `id_tema` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `comentario` text NOT NULL,
  `fecha` date NOT NULL,
  `activo` int(1) NOT NULL,
  PRIMARY KEY (`id_comentario`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `comentario_foro`
--

INSERT INTO `comentario_foro` (`id_comentario`, `id_tema`, `id_usuario`, `comentario`, `fecha`, `activo`) VALUES
(1, 1, 3, '<p>que Macizo</p>', '2018-10-10', 0),
(2, 1, 1, '<h1>Mira lo que pasa es que leyendo la biblia me di cuenta de que esto no se puede hacer a si v:</h1>', '2018-10-14', 0),
(3, 1, 2, '<p>es un tema muy interesante</p>', '2018-10-15', 0),
(4, 1, 2, '<p>$%/&amp;375769+</p>', '2018-10-15', 0),
(5, 1, 2, '<p>Hola Es un tema my interesante</p>', '2018-10-15', 0),
(6, 8, 1, '<p>Que con esto biscocho:3?</p>', '2018-10-15', 0),
(7, 10, 3, '<p>Para llegar al otro lado c:</p>', '2018-10-26', 0),
(8, 9, 4, '<p>Que macizo papu y se ve feo o: pero hay que solucionarlo v:</p>\r\n<p>te dejo un video</p>\r\n<p>https://www.youtube.com/watch?v=XxnHNDikA58</p>', '2018-10-28', 0),
(9, 11, 3, '<p>Me parece perfecto maestro solo tenga cuidado de no cagarla v:</p>', '2018-10-28', 0),
(14, 11, 3, '<p><strong>Aqui dejo un ejemplo de enlace a documentos </strong></p>\r\n<p><a title=\"El doc\" href=\"https://drive.google.com/open?id=1ybGJqjixfugIiitDN746xmS-EjH5yhsEXqZTmopQ6No\" target=\"_blank\">Documento super bello</a></p>', '2018-10-28', 0),
(15, 9, 3, '<p><iframe src=\"//www.youtube.com/embed/ZEjhiVvucec\" width=\"425\" height=\"350\" allowfullscreen=\"allowfullscreen\"></iframe></p>\r\n<p>Aqui les dejo este video bien rico:3 amigos:3</p>', '2018-10-28', 0),
(16, 11, 14, '<h1>Hola Mundo</h1>', '2018-10-29', 0),
(17, 12, 3, '<p>si es cierto o: yo lo guache v:</p>\r\n<p> </p>', '2018-11-01', 0),
(19, 13, 3, '<p>select * from usuarios</p>', '2018-11-01', 0),
(20, 13, 3, '<p><code>select * from ventas;</code></p>', '2018-11-01', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estadisticas`
--

DROP TABLE IF EXISTS `estadisticas`;
CREATE TABLE IF NOT EXISTS `estadisticas` (
  `id_estadistica` int(11) NOT NULL AUTO_INCREMENT,
  `id_tema` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `fecha` date NOT NULL,
  PRIMARY KEY (`id_estadistica`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `foro_categoria`
--

DROP TABLE IF EXISTS `foro_categoria`;
CREATE TABLE IF NOT EXISTS `foro_categoria` (
  `id_forocategoria` int(11) NOT NULL AUTO_INCREMENT,
  `categoria` varchar(250) NOT NULL,
  PRIMARY KEY (`id_forocategoria`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `foro_categoria`
--

INSERT INTO `foro_categoria` (`id_forocategoria`, `categoria`) VALUES
(1, 'Bugs'),
(2, 'Fixes');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `foro_foro`
--

DROP TABLE IF EXISTS `foro_foro`;
CREATE TABLE IF NOT EXISTS `foro_foro` (
  `id_foro` int(11) NOT NULL AUTO_INCREMENT,
  `id_forocategoria` int(11) NOT NULL,
  `foro` varchar(250) NOT NULL,
  `descripcion` text NOT NULL,
  PRIMARY KEY (`id_foro`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `foro_foro`
--

INSERT INTO `foro_foro` (`id_foro`, `id_forocategoria`, `foro`, `descripcion`) VALUES
(1, 1, 'Errores', 'Errores relacionados con el sistema'),
(2, 2, 'Solucionados', 'Errores solucionados'),
(3, 3, 'Dolor lumbar', 'Dolor lumbar');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `foro_subforos`
--

DROP TABLE IF EXISTS `foro_subforos`;
CREATE TABLE IF NOT EXISTS `foro_subforos` (
  `id_subforo` int(11) NOT NULL AUTO_INCREMENT,
  `id_foro` int(11) NOT NULL,
  `subforo` varchar(250) NOT NULL,
  `descripcion` text NOT NULL,
  PRIMARY KEY (`id_subforo`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `foro_subforos`
--

INSERT INTO `foro_subforos` (`id_subforo`, `id_foro`, `subforo`, `descripcion`) VALUES
(1, 1, 'criticos', 'Errores criticos que pueden afectar al sistema'),
(2, 1, 'Faciles', 'Errores faciles de corregir'),
(3, 2, 'Correctos', 'Problemas resueltos');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `foro_temas`
--

DROP TABLE IF EXISTS `foro_temas`;
CREATE TABLE IF NOT EXISTS `foro_temas` (
  `id_tema` int(11) NOT NULL AUTO_INCREMENT,
  `id_foro` int(11) NOT NULL,
  `id_subforo` int(11) NOT NULL,
  `titulo` varchar(250) NOT NULL,
  `contenido` text NOT NULL,
  `fecha` date NOT NULL,
  `id_usuario` int(5) NOT NULL,
  `activo` int(1) NOT NULL,
  `hits` int(11) NOT NULL,
  PRIMARY KEY (`id_tema`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `foro_temas`
--

INSERT INTO `foro_temas` (`id_tema`, `id_foro`, `id_subforo`, `titulo`, `contenido`, `fecha`, `id_usuario`, `activo`, `hits`) VALUES
(1, 1, 1, 'Falla modulo', '<p>Actualmente no es posible acceder a la zona neri v:</p>', '2018-10-14', 1, 1, 15),
(8, 1, 0, 'El calentamiento global', '<p>&amp;%#\"/()=</p>', '2018-10-15', 2, 1, 3),
(10, 3, 0, 'Calle', '<p>Porque la gallina cruzo la calle?</p>', '2018-10-26', 4, 1, 10),
(11, 1, 0, 'Prueba documentos', '<p>Comenzare a llevar acabo la parte de programacion de las prubas</p>', '2018-10-28', 4, 1, 11),
(12, 1, 0, 'El VIH tiene cura?', '<p>Hace dias recientemente en las redes sociales estuvo circulando una notica sobre la cura del VHI por medio de celulas madre  este hallazgo se llevo acabo por cientificos españoles.</p>', '2018-10-29', 14, 1, 4),
(13, 1, 1, 'Falla modulo', '<p>hcycuv</p>', '2018-10-29', 3, 1, 13),
(14, 1, 1, 'Prueba ', '<p>eola </p>', '2018-11-06', 3, 1, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

DROP TABLE IF EXISTS `usuarios`;
CREATE TABLE IF NOT EXISTS `usuarios` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nick` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `nombre` varchar(150) NOT NULL,
  `apellidoP` varchar(100) NOT NULL,
  `apellidoM` varchar(100) NOT NULL,
  `correo` varchar(100) NOT NULL,
  `tipo` int(2) NOT NULL,
  `facebook` varchar(250) NOT NULL,
  `twitter` varchar(250) NOT NULL,
  `fechaderegistro` date NOT NULL,
  `ultimoacceso` date NOT NULL,
  `activo` int(2) NOT NULL,
  `avatar` varchar(200) NOT NULL,
  `firma` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `nick`, `password`, `nombre`, `apellidoP`, `apellidoM`, `correo`, `tipo`, `facebook`, `twitter`, `fechaderegistro`, `ultimoacceso`, `activo`, `avatar`, `firma`) VALUES
(3, 'Irvin', 'ba324ca7b1c77fc20bb970d5aff6eea9377918a5', 'Irvin', 'Moreno', 'Cano', 'matt.9405@gmail.com', 2, '', '', '2018-10-26', '2018-10-26', 1, '3_drosera-rotundifolia-sundew.jpg', 'El Irvano'),
(4, 'Administrador', '01b307acba4f54f55aafc33bb06bbbf6ca803e9a', 'admin', 'otro', 'nombre', 'ejemplo@hotmail.com', 2, '', '', '2018-10-26', '2018-10-26', 1, 'default.jpg', ''),
(14, 'Fruda', '20eabe5d64b0e216796e834f52d61fd0b70332fc', 'Frida', 'Lopez', 'Juarez', 'lopez.juarez.15109@itsmante.edu.mx', 2, 'Frida LPJ', 'Frida-LPJ', '2018-10-29', '2018-10-29', 1, '14_aee612fe726b17c1641452923e6e65fd.jpg', 'friiii'),
(15, 'aeGARG', '01b307acba4f54f55aafc33bb06bbbf6ca803e9a', 'pasdasf', 'safarher', 'asfasf', 'q@q.q@q.q.q', 2, '', '', '2018-10-29', '2018-10-29', 1, 'default.svg', '');
--
-- Base de datos: `leija`
--
CREATE DATABASE IF NOT EXISTS `leija` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `leija`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `articulos`
--

DROP TABLE IF EXISTS `articulos`;
CREATE TABLE IF NOT EXISTS `articulos` (
  `codigo` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(45) NOT NULL,
  `costo` double DEFAULT NULL,
  `precio` double DEFAULT NULL,
  PRIMARY KEY (`codigo`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalleticker`
--

DROP TABLE IF EXISTS `detalleticker`;
CREATE TABLE IF NOT EXISTS `detalleticker` (
  `num` int(11) NOT NULL AUTO_INCREMENT,
  `folio` int(11) NOT NULL,
  `codigo` int(11) NOT NULL,
  PRIMARY KEY (`num`),
  KEY `folio` (`folio`),
  KEY `codigo` (`codigo`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tickets`
--

DROP TABLE IF EXISTS `tickets`;
CREATE TABLE IF NOT EXISTS `tickets` (
  `folio` int(11) NOT NULL AUTO_INCREMENT,
  `fecha` date NOT NULL,
  `cajero` varchar(45) DEFAULT NULL,
  `total` double DEFAULT NULL,
  `iva` double DEFAULT NULL,
  `subtotal` double DEFAULT NULL,
  PRIMARY KEY (`folio`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
