-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 18-08-2016 a las 05:57:19
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
-- Estructura de tabla para la tabla `audit`
--

CREATE TABLE IF NOT EXISTS `audit` (
  `idaudit` int(11) NOT NULL AUTO_INCREMENT,
  `tabla` varchar(110) COLLATE utf8_spanish_ci NOT NULL,
  `idtabla` int(11) DEFAULT NULL,
  `campo` varchar(120) COLLATE utf8_spanish_ci DEFAULT NULL,
  `previousvalue` varchar(500) COLLATE utf8_spanish_ci DEFAULT NULL,
  `newvalue` varchar(500) COLLATE utf8_spanish_ci DEFAULT NULL,
  `dateupdate` datetime NOT NULL,
  `user` varchar(120) COLLATE utf8_spanish_ci NOT NULL,
  `action` varchar(45) COLLATE utf8_spanish_ci DEFAULT NULL,
  PRIMARY KEY (`idaudit`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=4 ;

--
-- Volcado de datos para la tabla `audit`
--

INSERT INTO `audit` (`idaudit`, `tabla`, `idtabla`, `campo`, `previousvalue`, `newvalue`, `dateupdate`, `user`, `action`) VALUES
(1, 'proyects', 4, '4', '(prueba,5000.00,1,1,1356,20.00,,)', '(prueba 2,5000.00,1,1,1356,20.00,,)', '2016-04-19 05:22:44', 'root@localhost', 'update'),
(2, 'proyects', 4, '4', '(prueba 2,5000.00,1,1,1356,20.00,,)', '(prueba 2,5000.00,1,1,1356,20.00,,\0)', '2016-04-19 05:23:08', 'root@localhost', 'update'),
(3, 'proyects', 4, 'title', '5000.00', '6000.00', '2016-04-20 20:04:57', 'Saupurein Marcos', 'update');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `checklist`
--

CREATE TABLE IF NOT EXISTS `checklist` (
  `idchecklist` int(11) NOT NULL AUTO_INCREMENT,
  `refproject` int(11) NOT NULL,
  `refuser` int(11) NOT NULL,
  `enddate` datetime NOT NULL,
  `alarm` datetime DEFAULT NULL,
  `reftypetask` int(11) DEFAULT NULL,
  `refstatechecklist` smallint(6) NOT NULL,
  `executed` bit(1) NOT NULL,
  `timelimitfinished` bit(1) NOT NULL,
  `executedincomplete` bit(1) NOT NULL,
  PRIMARY KEY (`idchecklist`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=5 ;

--
-- Volcado de datos para la tabla `checklist`
--

INSERT INTO `checklist` (`idchecklist`, `refproject`, `refuser`, `enddate`, `alarm`, `reftypetask`, `refstatechecklist`, `executed`, `timelimitfinished`, `executedincomplete`) VALUES
(4, 5, 4, '2016-06-04 13:20:00', '2016-06-04 10:10:00', 3, 1, b'1', b'1', b'1');

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
-- Estructura de tabla para la tabla `images`
--

CREATE TABLE IF NOT EXISTS `images` (
  `idfoto` int(11) NOT NULL AUTO_INCREMENT,
  `refproyecto` int(11) NOT NULL,
  `refuser` int(11) NOT NULL,
  `imagen` varchar(500) DEFAULT NULL,
  `type` varchar(45) DEFAULT NULL,
  `principal` bit(1) DEFAULT NULL,
  PRIMARY KEY (`idfoto`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=11 ;

--
-- Volcado de datos para la tabla `images`
--

INSERT INTO `images` (`idfoto`, `refproyecto`, `refuser`, `imagen`, `type`, `principal`) VALUES
(4, 4, 0, 'imagen000.jpg', 'image/jpeg', NULL),
(5, 4, 0, 'imagen003.jpg', 'image/jpeg', NULL),
(6, 4, 0, 'imagen001.jpg', 'image/jpeg', NULL),
(7, 1, 0, '20151220_204055.jpg', 'image/jpeg', NULL),
(8, 4, 0, '20151220_204531.jpg', 'image/jpeg', NULL),
(10, 4, 0, '20151220_205231.jpg', 'image/jpeg', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `imagestask`
--

CREATE TABLE IF NOT EXISTS `imagestask` (
  `idfoto` int(11) NOT NULL AUTO_INCREMENT,
  `refproyecto` int(11) NOT NULL,
  `refuser` int(11) NOT NULL,
  `imagen` varchar(500) DEFAULT NULL,
  `type` varchar(45) DEFAULT NULL,
  `principal` bit(1) DEFAULT NULL,
  PRIMARY KEY (`idfoto`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `jobs`
--

CREATE TABLE IF NOT EXISTS `jobs` (
  `idjob` int(11) NOT NULL AUTO_INCREMENT,
  `job` varchar(120) COLLATE utf8_spanish_ci NOT NULL,
  `description` varchar(400) COLLATE utf8_spanish_ci DEFAULT NULL,
  `active` varchar(45) COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`idjob`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=4 ;

--
-- Volcado de datos para la tabla `jobs`
--

INSERT INTO `jobs` (`idjob`, `job`, `description`, `active`) VALUES
(1, 'Executed?', NULL, '1'),
(2, 'Time limit Finished?', NULL, '1'),
(3, 'Executed incomplete?', NULL, '1');

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=22 ;

--
-- Volcado de datos para la tabla `menu`
--

INSERT INTO `menu` (`idmenu`, `url`, `icono`, `nombre`, `Orden`, `hover`, `permiso`) VALUES
(12, '../logout.php', 'icosalir', 'Logout', 30, NULL, 'Administrator, User'),
(13, '../index.php', 'icodashboard', 'Dashboard', 0, NULL, 'Administrator, User'),
(15, '../states/', 'icousos', 'States', 2, NULL, 'Administrator'),
(16, '../proyects/', 'icotorneos', 'Proyects', 3, NULL, 'Administrator'),
(17, '../user/', 'icoamonestados', 'User', 4, NULL, 'Administrator'),
(18, '../responsibles/', 'icoperfiles', 'Responsibles', 5, NULL, 'Administrator'),
(19, '../task/', 'icotask', 'Task', 6, NULL, 'Administrator'),
(20, '../checklist/', 'icotorneos', 'Check-List', 7, NULL, 'Administrator'),
(21, '../typetask/', 'icotask', 'Type of Task', 8, NULL, 'Administrator');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proyectemployees`
--

CREATE TABLE IF NOT EXISTS `proyectemployees` (
  `idproyectemployee` int(11) NOT NULL AUTO_INCREMENT,
  `refproyect` int(11) NOT NULL,
  `refemployee` int(11) NOT NULL,
  PRIMARY KEY (`idproyectemployee`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=16 ;

--
-- Volcado de datos para la tabla `proyectemployees`
--

INSERT INTO `proyectemployees` (`idproyectemployee`, `refproyect`, `refemployee`) VALUES
(15, 1, 4),
(14, 5, 4);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proyects`
--

CREATE TABLE IF NOT EXISTS `proyects` (
  `idproyect` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(120) COLLATE utf8_spanish_ci NOT NULL,
  `price` decimal(18,2) NOT NULL,
  `refresponsible` int(11) NOT NULL,
  `refstate` smallint(6) NOT NULL,
  `order` smallint(6) DEFAULT NULL,
  `commission` decimal(5,2) DEFAULT NULL,
  `observations` varchar(500) COLLATE utf8_spanish_ci DEFAULT NULL,
  `sendemail` bit(1) DEFAULT NULL,
  PRIMARY KEY (`idproyect`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=6 ;

--
-- Volcado de datos para la tabla `proyects`
--

INSERT INTO `proyects` (`idproyect`, `title`, `price`, `refresponsible`, `refstate`, `order`, `commission`, `observations`, `sendemail`) VALUES
(1, 'Pagina Web', '5000.00', 1, 1, 1589, '20.00', '', b'1'),
(4, 'prueba 2', '6000.00', 1, 1, 1356, '20.00', '', b'1'),
(5, 'Visita San Pablo', '0.00', 1, 1, 6, '0.00', 'bkgkg', b'1');

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
-- Estructura de tabla para la tabla `statechecklist`
--

CREATE TABLE IF NOT EXISTS `statechecklist` (
  `idstatechecklist` int(11) NOT NULL AUTO_INCREMENT,
  `status` varchar(80) COLLATE utf8_spanish_ci NOT NULL,
  `active` bit(1) NOT NULL,
  PRIMARY KEY (`idstatechecklist`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=7 ;

--
-- Volcado de datos para la tabla `statechecklist`
--

INSERT INTO `statechecklist` (`idstatechecklist`, `status`, `active`) VALUES
(1, 'Open', b'1'),
(2, 'Close', b'1'),
(3, 'Pending', b'1'),
(4, 'In progress', b'1'),
(5, 'Finalized', b'1'),
(6, 'Cancel', b'1');

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
-- Estructura de tabla para la tabla `tasks`
--

CREATE TABLE IF NOT EXISTS `tasks` (
  `idtask` int(11) NOT NULL AUTO_INCREMENT,
  `task` varchar(300) COLLATE utf8_spanish_ci NOT NULL,
  `order` smallint(6) NOT NULL,
  `value` smallint(6) DEFAULT NULL,
  `active` bit(1) DEFAULT NULL,
  `reftypetask` int(11) DEFAULT NULL,
  `refuser` int(11) NOT NULL,
  PRIMARY KEY (`idtask`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=8 ;

--
-- Volcado de datos para la tabla `tasks`
--

INSERT INTO `tasks` (`idtask`, `task`, `order`, `value`, `active`, `reftypetask`, `refuser`) VALUES
(1, 'Repair PC', 2, 10, b'1', 1, 1),
(2, 'Clean Disk', 1, 5, b'1', 1, 1),
(4, 'Aurevoir', 3, 6, b'1', 1, 1),
(5, 'limpiar comandos', 4, 50, b'1', 1, 1),
(6, 'Verificar conectividad', 1, 0, b'1', 2, 1),
(7, 'install antenna', 1, 0, b'1', 3, 4);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `taskschecklist`
--

CREATE TABLE IF NOT EXISTS `taskschecklist` (
  `idtaskschecklist` int(11) NOT NULL AUTO_INCREMENT,
  `refchecklist` int(11) NOT NULL,
  `reftask` int(11) NOT NULL,
  `yes` bit(1) DEFAULT NULL,
  `no` bit(1) DEFAULT NULL,
  `other` bit(1) DEFAULT NULL,
  `observation` varchar(400) COLLATE utf8_spanish_ci DEFAULT NULL,
  PRIMARY KEY (`idtaskschecklist`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=10 ;

--
-- Volcado de datos para la tabla `taskschecklist`
--

INSERT INTO `taskschecklist` (`idtaskschecklist`, `refchecklist`, `reftask`, `yes`, `no`, `other`, `observation`) VALUES
(1, 1, 1, b'0', b'1', b'0', ''),
(2, 1, 2, b'1', b'0', b'0', ''),
(3, 1, 4, b'0', b'0', b'1', 'tron                                    \r\n                                                                                                                                                                            '),
(4, 2, 1, b'0', b'0', b'0', ''),
(5, 2, 2, b'0', b'0', b'0', ''),
(6, 2, 4, b'0', b'0', b'0', ''),
(9, 4, 7, b'0', b'0', b'0', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `typetask`
--

CREATE TABLE IF NOT EXISTS `typetask` (
  `idtypetask` int(11) NOT NULL AUTO_INCREMENT,
  `typetask` varchar(200) COLLATE utf8_spanish_ci NOT NULL,
  `active` bit(1) NOT NULL,
  `refuser` int(11) NOT NULL,
  PRIMARY KEY (`idtypetask`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=4 ;

--
-- Volcado de datos para la tabla `typetask`
--

INSERT INTO `typetask` (`idtypetask`, `typetask`, `active`, `refuser`) VALUES
(1, 'Repair Modem', b'1', 1),
(2, 'Instaling', b'1', 1),
(3, 'Instaling', b'1', 4);

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Volcado de datos para la tabla `user`
--

INSERT INTO `user` (`iduser`, `user`, `password`, `refroll`, `email`, `fullname`) VALUES
(1, 'msred', 'mar', 1, 'msredhotero@msn.com', 'Saupurein Marcos'),
(2, 'Juan', 'juan', 2, 'juan@msn.com', 'Juancito'),
(3, 'Pedro', 'pe', 2, 'pe@msn.com', 'pepe'),
(4, 'Osvaldo.gu', '123456', 1, 'osvaldo.guevara@gmail.com', 'Osvaldo Guevara');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
