-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 20-02-2016 a las 05:30:56
-- Versión del servidor: 5.5.24-log
-- Versión de PHP: 5.4.3

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `proyects`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `employees`
--

CREATE TABLE IF NOT EXISTS `employees` (
  `idemployee` int(11) NOT NULL AUTO_INCREMENT,
  `lastname` varchar(80) COLLATE utf8_spanish_ci DEFAULT NULL,
  `firstname` varchar(80) COLLATE utf8_spanish_ci DEFAULT NULL,
  `id` int(11) DEFAULT NULL,
  PRIMARY KEY (`idemployee`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=3 ;

--
-- Volcado de datos para la tabla `employees`
--

INSERT INTO `employees` (`idemployee`, `lastname`, `firstname`, `id`) VALUES
(1, 'Safar', 'Lucas', 31552466),
(2, 'Tecnipisa', '', 123123);

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=19 ;

--
-- Volcado de datos para la tabla `menu`
--

INSERT INTO `menu` (`idmenu`, `url`, `icono`, `nombre`, `Orden`, `hover`, `permiso`) VALUES
(12, '../logout.php', 'icosalir', 'Logout', 30, NULL, 'Administrator, User'),
(13, '../index.php', 'icodashboard', 'Dashboard', 0, NULL, 'Administrator, User'),
(15, '../states/', 'icousos', 'States', 2, NULL, 'Administrator'),
(16, '../proyects/', 'icotorneos', 'Proyects', 3, NULL, 'Administrator'),
(17, '../user/', 'icoamonestados', 'User', 4, NULL, 'Administrator'),
(18, '../responsibles/', 'icoperfiles', 'Responsibles', 5, NULL, 'Administrator');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proyects`
--

CREATE TABLE IF NOT EXISTS `proyects` (
  `idproyect` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(120) COLLATE utf8_spanish_ci NOT NULL,
  `price` decimal(18,2) NOT NULL,
  `refemployee` int(11) NOT NULL,
  `refresponsible` int(11) NOT NULL,
  `refstate` int(11) NOT NULL,
  `observations` varchar(500) COLLATE utf8_spanish_ci DEFAULT NULL,
  PRIMARY KEY (`idproyect`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=4 ;

--
-- Volcado de datos para la tabla `proyects`
--

INSERT INTO `proyects` (`idproyect`, `title`, `price`, `refemployee`, `refresponsible`, `refstate`, `observations`) VALUES
(1, 'Financiacion Fabrica', '500000.00', 1, 2, 1, ''),
(2, 'asdaoisd', '56498.00', 2, 1, 1, ''),
(3, 'sdoiasowiue', '4879963.00', 3, 2, 1, 'marcos');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `responsibles`
--

CREATE TABLE IF NOT EXISTS `responsibles` (
  `idresponsible` int(11) NOT NULL AUTO_INCREMENT,
  `responsible` varchar(200) NOT NULL,
  PRIMARY KEY (`idresponsible`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Volcado de datos para la tabla `responsibles`
--

INSERT INTO `responsibles` (`idresponsible`, `responsible`) VALUES
(1, 'CEO'),
(2, 'Client');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `roles`
--

CREATE TABLE IF NOT EXISTS `roles` (
  `idrol` int(11) NOT NULL AUTO_INCREMENT,
  `rol` varchar(45) NOT NULL,
  `active` bit(1) NOT NULL,
  PRIMARY KEY (`idrol`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Volcado de datos para la tabla `roles`
--

INSERT INTO `roles` (`idrol`, `rol`, `active`) VALUES
(1, 'Administrator', b'1'),
(2, 'User', b'1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `states`
--

CREATE TABLE IF NOT EXISTS `states` (
  `idstate` int(11) NOT NULL AUTO_INCREMENT,
  `state` varchar(120) COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`idstate`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=2 ;

--
-- Volcado de datos para la tabla `states`
--

INSERT INTO `states` (`idstate`, `state`) VALUES
(1, 'Proposal pending reply');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `iduser` int(11) NOT NULL AUTO_INCREMENT,
  `user` varchar(10) NOT NULL,
  `password` varchar(10) NOT NULL,
  `refroll` int(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `fullname` varchar(70) NOT NULL,
  PRIMARY KEY (`iduser`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Volcado de datos para la tabla `user`
--

INSERT INTO `user` (`iduser`, `user`, `password`, `refroll`, `email`, `fullname`) VALUES
(1, 'msred', 'mar', 1, 'msredhotero@msn.com', 'Saupurein Marcos'),
(2, 'Juan', 'juan', 2, 'juan@msn.com', 'Juancito'),
(3, 'Pedro', 'pe', 2, 'pe@msn.com', 'pepe');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
