-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 27-11-2015 a las 04:45:32
-- Versión del servidor: 5.5.24-log
-- Versión de PHP: 5.4.3

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `admininmobiliario`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ciudades`
--

CREATE TABLE IF NOT EXISTS `ciudades` (
  `idciudad` int(11) NOT NULL AUTO_INCREMENT,
  `refprovincia` smallint(6) NOT NULL,
  `ciudad` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`idciudad`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `comision`
--

CREATE TABLE IF NOT EXISTS `comision` (
  `idcomision` smallint(6) NOT NULL AUTO_INCREMENT,
  `comision` varchar(1) COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`idcomision`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `costomts`
--

CREATE TABLE IF NOT EXISTS `costomts` (
  `idcostomts` int(11) NOT NULL AUTO_INCREMENT,
  `refciudad` int(11) NOT NULL,
  `refuso` smallint(6) NOT NULL,
  `valormts` decimal(18,2) NOT NULL,
  `fechamodi` date DEFAULT NULL,
  `refusuario` int(11) NOT NULL,
  PRIMARY KEY (`idcostomts`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `costonacional`
--

CREATE TABLE IF NOT EXISTS `costonacional` (
  `idcostonacional` int(11) NOT NULL AUTO_INCREMENT,
  `refpais` smallint(6) NOT NULL,
  `valormts` decimal(18,2) NOT NULL,
  `fechamodi` date DEFAULT NULL,
  `refusuario` smallint(6) NOT NULL,
  PRIMARY KEY (`idcostonacional`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `inmuebles`
--

CREATE TABLE IF NOT EXISTS `inmuebles` (
  `idinmueble` bigint(20) NOT NULL AUTO_INCREMENT,
  `refpais` smallint(6) NOT NULL,
  `refprovincia` smallint(6) NOT NULL,
  `refciudad` int(11) NOT NULL,
  `refurbanizacion` int(11) NOT NULL,
  `reftipovivienda` smallint(6) NOT NULL,
  `refuso` smallint(6) NOT NULL,
  `refsituacioninmueble` smallint(6) NOT NULL,
  `dormitorios` tinyint(4) DEFAULT NULL,
  `banios` tinyint(4) DEFAULT NULL,
  `encontruccion` smallint(6) DEFAULT NULL,
  `mts2` decimal(18,2) DEFAULT NULL,
  `anioconstruccion` tinyint(4) DEFAULT NULL,
  `precioventapropietario` decimal(18,2) DEFAULT NULL,
  `nombrepropietario` varchar(100) COLLATE utf8_spanish_ci DEFAULT NULL,
  `apellidopropietario` varchar(100) COLLATE utf8_spanish_ci DEFAULT NULL,
  `fechacarga` date DEFAULT NULL,
  `refusuario` int(11) NOT NULL,
  `refcomision` tinyint(4) NOT NULL,
  `calc_edadconstruccion` decimal(18,2) DEFAULT NULL,
  `calc_porcentajedepreciacion` decimal(10,2) DEFAULT NULL,
  `calc_avaluoconstruccion` decimal(18,2) DEFAULT NULL,
  `calc_depreciacion` decimal(18,2) DEFAULT NULL,
  `calc_avaluoterreno` decimal(18,2) DEFAULT NULL,
  `calc_preciorealmercado` decimal(18,2) DEFAULT NULL,
  `calc_restacliente` decimal(18,2) DEFAULT NULL,
  `calc_porcentaje` decimal(18,2) DEFAULT NULL,
  `refvaloracion` smallint(6) DEFAULT NULL,
  PRIMARY KEY (`idinmueble`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `paices`
--

CREATE TABLE IF NOT EXISTS `paices` (
  `idpais` smallint(6) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`idpais`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pedidos`
--

CREATE TABLE IF NOT EXISTS `pedidos` (
  `idpedido` int(11) NOT NULL AUTO_INCREMENT,
  `reftipoinformacion` smallint(6) NOT NULL,
  `refinmueble` bigint(20) NOT NULL,
  `refusuario` int(11) NOT NULL,
  `fechapedido` date DEFAULT NULL,
  `comentariousuario` varchar(300) COLLATE utf8_spanish_ci DEFAULT NULL,
  PRIMARY KEY (`idpedido`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `perfiles`
--

CREATE TABLE IF NOT EXISTS `perfiles` (
  `idperfil` smallint(6) NOT NULL AUTO_INCREMENT,
  `reftipousuario` smallint(6) NOT NULL,
  `nombreperfil` varchar(9) COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`idperfil`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `provincias`
--

CREATE TABLE IF NOT EXISTS `provincias` (
  `idprovincia` smallint(6) NOT NULL AUTO_INCREMENT,
  `refpais` smallint(6) NOT NULL,
  `provincia` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`idprovincia`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `situaciones`
--

CREATE TABLE IF NOT EXISTS `situaciones` (
  `idsituacion` smallint(6) NOT NULL AUTO_INCREMENT,
  `situacion` varchar(7) COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`idsituacion`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `situacioninmueble`
--

CREATE TABLE IF NOT EXISTS `situacioninmueble` (
  `idsituacioninmueble` smallint(6) NOT NULL AUTO_INCREMENT,
  `situacioninmueble` varchar(2) COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`idsituacioninmueble`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipodeinformacion`
--

CREATE TABLE IF NOT EXISTS `tipodeinformacion` (
  `idtipodeinformacion` smallint(6) NOT NULL AUTO_INCREMENT,
  `tipodeinformacion` varchar(3) COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`idtipodeinformacion`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipousuarios`
--

CREATE TABLE IF NOT EXISTS `tipousuarios` (
  `idtipousuario` int(11) NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(45) COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`idtipousuario`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipovivienda`
--

CREATE TABLE IF NOT EXISTS `tipovivienda` (
  `idtipovivienda` smallint(6) NOT NULL AUTO_INCREMENT,
  `tipovivienda` varchar(5) COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`idtipovivienda`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `urbanizacion`
--

CREATE TABLE IF NOT EXISTS `urbanizacion` (
  `idurbanizacion` int(11) NOT NULL AUTO_INCREMENT,
  `refciudad` int(11) NOT NULL,
  `urbanizacion` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`idurbanizacion`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usos`
--

CREATE TABLE IF NOT EXISTS `usos` (
  `iduso` smallint(6) NOT NULL AUTO_INCREMENT,
  `usos` varchar(6) COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`iduso`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuariosregistrados`
--

CREATE TABLE IF NOT EXISTS `usuariosregistrados` (
  `idusuarioregistrado` int(11) NOT NULL AUTO_INCREMENT,
  `fechadeingreso` date DEFAULT NULL,
  `reftipousuario` int(11) NOT NULL,
  `apellidoynombre` varchar(150) COLLATE utf8_spanish_ci NOT NULL,
  `nombreentidad` varchar(60) COLLATE utf8_spanish_ci DEFAULT NULL,
  `celular1` varchar(14) COLLATE utf8_spanish_ci DEFAULT NULL,
  `celular2` varchar(14) COLLATE utf8_spanish_ci DEFAULT NULL,
  `celular3` varchar(14) COLLATE utf8_spanish_ci DEFAULT NULL,
  `email1` varchar(100) COLLATE utf8_spanish_ci DEFAULT NULL,
  `email2` varchar(100) COLLATE utf8_spanish_ci DEFAULT NULL,
  `refsituacion` smallint(6) DEFAULT NULL,
  `refperfil` smallint(6) DEFAULT NULL,
  `refprovincia` smallint(6) DEFAULT NULL,
  `refciudad` int(11) DEFAULT NULL,
  `refurbanizacion` int(11) DEFAULT NULL,
  `calle` varchar(120) COLLATE utf8_spanish_ci DEFAULT NULL,
  `nro` varchar(10) COLLATE utf8_spanish_ci DEFAULT NULL,
  `codpostal` varchar(10) COLLATE utf8_spanish_ci DEFAULT NULL,
  PRIMARY KEY (`idusuarioregistrado`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `valoracion`
--

CREATE TABLE IF NOT EXISTS `valoracion` (
  `idvaloracion` smallint(6) NOT NULL AUTO_INCREMENT,
  `valoracion` varchar(10) COLLATE utf8_spanish_ci NOT NULL,
  `observacion` varchar(300) COLLATE utf8_spanish_ci DEFAULT NULL,
  PRIMARY KEY (`idvaloracion`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=1 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
