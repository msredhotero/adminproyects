-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 05-02-2016 a las 17:15:25
-- Versión del servidor: 5.1.36-community-log
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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=2 ;

--
-- Volcado de datos para la tabla `ciudades`
--

INSERT INTO `ciudades` (`idciudad`, `refprovincia`, `ciudad`) VALUES
(1, 1, 'La Plata');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `comision`
--

CREATE TABLE IF NOT EXISTS `comision` (
  `idcomision` smallint(6) NOT NULL AUTO_INCREMENT,
  `comision` varchar(1) COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`idcomision`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=8 ;

--
-- Volcado de datos para la tabla `comision`
--

INSERT INTO `comision` (`idcomision`, `comision`) VALUES
(1, '1'),
(2, '2'),
(3, '3'),
(4, '4'),
(5, '5'),
(6, '6'),
(7, 'm');

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
-- Estructura de tabla para la tabla `menu`
--

CREATE TABLE IF NOT EXISTS `menu` (
  `idmenu` int(11) NOT NULL AUTO_INCREMENT,
  `url` varchar(45) COLLATE utf8_spanish_ci NOT NULL,
  `icono` varchar(45) COLLATE utf8_spanish_ci DEFAULT NULL,
  `nombre` varchar(45) COLLATE utf8_spanish_ci NOT NULL,
  `Orden` smallint(6) DEFAULT NULL,
  `hover` varchar(45) COLLATE utf8_spanish_ci DEFAULT NULL,
  `permiso` varchar(50) COLLATE utf8_spanish_ci DEFAULT NULL,
  PRIMARY KEY (`idmenu`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=36 ;

--
-- Volcado de datos para la tabla `menu`
--

INSERT INTO `menu` (`idmenu`, `url`, `icono`, `nombre`, `Orden`, `hover`, `permiso`) VALUES
(12, '../logout.php', 'icosalir', 'Salir', 30, NULL, 'Administrador'),
(13, '../index.php', 'icodashboard', 'Dashboard', 0, NULL, 'Administrador'),
(16, '../paises/', 'icoclientes', 'Paises', 15, NULL, 'Administrador'),
(17, '../provincias/', 'icoinmubles', 'Provincias', 16, NULL, 'Administrador'),
(18, '../ciudades/', 'icoalquileres', 'Ciudades', 17, NULL, 'Administrador'),
(19, '../urbanizacion/', 'icopagos', 'Urbanización', 18, NULL, 'Administrador'),
(20, '../usuarios/', 'icousuarios', 'Usuarios', 28, NULL, 'Administrador'),
(21, '../reportes/', 'icoreportes', 'Reportes', 29, NULL, 'Administrador'),
(22, '../comision/', 'icosalir', 'Comisión', 14, NULL, 'Administrador'),
(23, '../costomts/', 'icodashboard', 'Costo Mtrs', 1, NULL, 'Administrador'),
(24, '../costonacional/', 'icoclientes', 'Costo Nacional', 2, NULL, 'Administrador'),
(25, '../imnuebles/', 'icoinmubles', 'Imnuebles', 9, NULL, 'Administrador'),
(26, '../pedidos/', 'icoalquileres', 'Pedidos', 10, NULL, 'Administrador'),
(27, '../perfiles/', 'icopagos', 'Perfiles', 11, NULL, 'Administrador'),
(28, '../situaciones/', 'icousuarios', 'Situaciones', 7, NULL, 'Administrador'),
(29, '../situacioninmueble/', 'icoreportes', 'Situación Inmueble', 8, NULL, 'Administrador'),
(30, '../tipoinformacion/', 'icopagos', 'Tipo Información', 3, NULL, 'Administrador'),
(31, '../tipousuarios/', 'icopagos', 'Tipo Usuarios', 12, NULL, 'Administrador'),
(32, '../tipovivienda/', 'icopagos', 'Tipo Vivienda', 4, NULL, 'Administrador'),
(33, '../usos/', 'icopagos', 'Usos', 5, NULL, 'Administrador'),
(34, '../usuariosregistrados/', 'icousuarios', 'Usuarios Registrados', 13, NULL, 'Administrador'),
(35, '../valoracion/', 'icopagos', 'Valoración', 6, NULL, 'Administrador');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `paises`
--

CREATE TABLE IF NOT EXISTS `paises` (
  `idpais` smallint(6) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`idpais`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=2 ;

--
-- Volcado de datos para la tabla `paises`
--

INSERT INTO `paises` (`idpais`, `nombre`) VALUES
(1, 'Argentina');

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
  `nombreperfil` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`idperfil`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=2 ;

--
-- Volcado de datos para la tabla `perfiles`
--

INSERT INTO `perfiles` (`idperfil`, `reftipousuario`, `nombreperfil`) VALUES
(1, 1, 'Administrador');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `provincias`
--

CREATE TABLE IF NOT EXISTS `provincias` (
  `idprovincia` smallint(6) NOT NULL AUTO_INCREMENT,
  `refpais` smallint(6) NOT NULL,
  `provincia` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`idprovincia`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=2 ;

--
-- Volcado de datos para la tabla `provincias`
--

INSERT INTO `provincias` (`idprovincia`, `refpais`, `provincia`) VALUES
(1, 1, 'Buenos Aires');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `situaciones`
--

CREATE TABLE IF NOT EXISTS `situaciones` (
  `idsituacion` smallint(6) NOT NULL AUTO_INCREMENT,
  `situacion` varchar(15) COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`idsituacion`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=5 ;

--
-- Volcado de datos para la tabla `situaciones`
--

INSERT INTO `situaciones` (`idsituacion`, `situacion`) VALUES
(1, 'activo'),
(2, 'inactivo'),
(3, 'pendiente'),
(4, 'dar de baja');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `situacioninmueble`
--

CREATE TABLE IF NOT EXISTS `situacioninmueble` (
  `idsituacioninmueble` smallint(6) NOT NULL AUTO_INCREMENT,
  `situacioninmueble` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`idsituacioninmueble`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=4 ;

--
-- Volcado de datos para la tabla `situacioninmueble`
--

INSERT INTO `situacioninmueble` (`idsituacioninmueble`, `situacioninmueble`) VALUES
(1, 'renta'),
(2, 'venta'),
(3, 'trueque');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipodeinformacion`
--

CREATE TABLE IF NOT EXISTS `tipodeinformacion` (
  `idtipodeinformacion` smallint(6) NOT NULL AUTO_INCREMENT,
  `tipodeinformacion` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`idtipodeinformacion`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=4 ;

--
-- Volcado de datos para la tabla `tipodeinformacion`
--

INSERT INTO `tipodeinformacion` (`idtipodeinformacion`, `tipodeinformacion`) VALUES
(1, 'propiedad'),
(2, 'proyecto inmoviliario'),
(3, 'requerimiento');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipousuarios`
--

CREATE TABLE IF NOT EXISTS `tipousuarios` (
  `idtipousuario` int(11) NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(45) COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`idtipousuario`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=9 ;

--
-- Volcado de datos para la tabla `tipousuarios`
--

INSERT INTO `tipousuarios` (`idtipousuario`, `descripcion`) VALUES
(1, 'Administrador'),
(2, 'Propietario'),
(3, 'Corredor Inmoviliario'),
(4, 'Agencia'),
(5, 'Constructora'),
(6, 'Outsorcing de Ventas'),
(7, 'Avaluador'),
(8, 'Referidor');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipovivienda`
--

CREATE TABLE IF NOT EXISTS `tipovivienda` (
  `idtipovivienda` smallint(6) NOT NULL AUTO_INCREMENT,
  `tipovivienda` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`idtipovivienda`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=10 ;

--
-- Volcado de datos para la tabla `tipovivienda`
--

INSERT INTO `tipovivienda` (`idtipovivienda`, `tipovivienda`) VALUES
(1, 'casa'),
(2, 'departamento'),
(3, 'suite'),
(4, 'oficina'),
(5, 'bodega'),
(6, 'terreno'),
(7, 'edificio'),
(8, 'finca '),
(9, 'local comercial');

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
  `usos` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`iduso`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=5 ;

--
-- Volcado de datos para la tabla `usos`
--

INSERT INTO `usos` (`iduso`, `usos`) VALUES
(1, 'residencial'),
(2, 'comercial'),
(3, 'agricola'),
(4, 'industrial');

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
  `refurbanizacion` int(11) DEFAULT NULL,
  `calle` varchar(120) COLLATE utf8_spanish_ci DEFAULT NULL,
  `nro` varchar(10) COLLATE utf8_spanish_ci DEFAULT NULL,
  `codpostal` varchar(10) COLLATE utf8_spanish_ci DEFAULT NULL,
  `documento` varchar(11) COLLATE utf8_spanish_ci DEFAULT NULL,
  `password` varchar(45) COLLATE utf8_spanish_ci DEFAULT NULL,
  PRIMARY KEY (`idusuarioregistrado`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=2 ;

--
-- Volcado de datos para la tabla `usuariosregistrados`
--

INSERT INTO `usuariosregistrados` (`idusuarioregistrado`, `fechadeingreso`, `reftipousuario`, `apellidoynombre`, `nombreentidad`, `celular1`, `celular2`, `celular3`, `email1`, `email2`, `refsituacion`, `refurbanizacion`, `calle`, `nro`, `codpostal`, `documento`, `password`) VALUES
(1, '2016-01-01', 1, 'Saupurein Marcos', 'Caracol', NULL, NULL, NULL, 'msredhotero@msn.com', NULL, 1, 1, '76', '123', '1900', '31552466', 'm');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `valoracion`
--

CREATE TABLE IF NOT EXISTS `valoracion` (
  `idvaloracion` smallint(6) NOT NULL AUTO_INCREMENT,
  `valoracion` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `observacion` varchar(30) COLLATE utf8_spanish_ci DEFAULT NULL,
  PRIMARY KEY (`idvaloracion`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=5 ;

--
-- Volcado de datos para la tabla `valoracion`
--

INSERT INTO `valoracion` (`idvaloracion`, `valoracion`, `observacion`) VALUES
(1, '< -20%', 'OPORTUNIDAD'),
(2, '> -20% Y < 20%', 'NORMAL'),
(3, '> 21% Y <30%', 'CARO'),
(4, '>31%', 'FUERA DEL MERCADO');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
