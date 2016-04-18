-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Erstellungszeit: 18. Apr 2016 um 22:23
-- Server Version: 5.5.24-log
-- PHP-Version: 5.4.3

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Datenbank: `proyects`
--

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `checklist`
--

CREATE TABLE IF NOT EXISTS `checklist` (
  `idchecklist` int(11) NOT NULL AUTO_INCREMENT,
  `refproject` int(11) NOT NULL,
  `refuser` int(11) NOT NULL,
  `enddate` datetime NOT NULL,
  `refstatechecklist` smallint(6) NOT NULL,
  `executed` bit(1) NOT NULL,
  `timelimitfinished` bit(1) NOT NULL,
  `executedincomplete` bit(1) NOT NULL,
  PRIMARY KEY (`idchecklist`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `employees`
--

CREATE TABLE IF NOT EXISTS `employees` (
  `idemployee` int(11) NOT NULL AUTO_INCREMENT,
  `lastname` varchar(80) COLLATE utf8_spanish_ci DEFAULT NULL,
  `firstname` varchar(80) COLLATE utf8_spanish_ci DEFAULT NULL,
  `id` int(11) DEFAULT NULL,
  PRIMARY KEY (`idemployee`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=3 ;

--
-- Daten für Tabelle `employees`
--

INSERT INTO `employees` (`idemployee`, `lastname`, `firstname`, `id`) VALUES
(1, 'Safar', 'Lucas', 31552466),
(2, 'Tecnipisa', '', 123123);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `images`
--

CREATE TABLE IF NOT EXISTS `images` (
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
-- Tabellenstruktur für Tabelle `jobs`
--

CREATE TABLE IF NOT EXISTS `jobs` (
  `idjob` int(11) NOT NULL AUTO_INCREMENT,
  `job` varchar(120) COLLATE utf8_spanish_ci NOT NULL,
  `description` varchar(400) COLLATE utf8_spanish_ci DEFAULT NULL,
  `active` varchar(45) COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`idjob`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=4 ;

--
-- Daten für Tabelle `jobs`
--

INSERT INTO `jobs` (`idjob`, `job`, `description`, `active`) VALUES
(1, 'Executed?', NULL, '1'),
(2, 'Time limit Finished?', NULL, '1'),
(3, 'Executed incomplete?', NULL, '1');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `menu`
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
-- Daten für Tabelle `menu`
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
-- Tabellenstruktur für Tabelle `proyectemployees`
--

CREATE TABLE IF NOT EXISTS `proyectemployees` (
  `idproyectemployee` int(11) NOT NULL AUTO_INCREMENT,
  `refproyect` int(11) NOT NULL,
  `refemployee` int(11) NOT NULL,
  PRIMARY KEY (`idproyectemployee`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=8 ;

--
-- Daten für Tabelle `proyectemployees`
--

INSERT INTO `proyectemployees` (`idproyectemployee`, `refproyect`, `refemployee`) VALUES
(7, 1, 3),
(6, 1, 1);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `proyects`
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
  PRIMARY KEY (`idproyect`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=2 ;

--
-- Daten für Tabelle `proyects`
--

INSERT INTO `proyects` (`idproyect`, `title`, `price`, `refresponsible`, `refstate`, `order`, `commission`, `observations`) VALUES
(1, 'Pagina Web', '5000.00', 1, 1, 1589, '20.00', '');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `responsibles`
--

CREATE TABLE IF NOT EXISTS `responsibles` (
  `idresponsible` int(11) NOT NULL AUTO_INCREMENT,
  `responsible` varchar(200) NOT NULL,
  PRIMARY KEY (`idresponsible`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Daten für Tabelle `responsibles`
--

INSERT INTO `responsibles` (`idresponsible`, `responsible`) VALUES
(1, 'CEO'),
(2, 'Client');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `roles`
--

CREATE TABLE IF NOT EXISTS `roles` (
  `idrol` int(11) NOT NULL AUTO_INCREMENT,
  `rol` varchar(45) NOT NULL,
  `active` bit(1) NOT NULL,
  PRIMARY KEY (`idrol`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Daten für Tabelle `roles`
--

INSERT INTO `roles` (`idrol`, `rol`, `active`) VALUES
(1, 'Administrator', b'1'),
(2, 'User', b'1');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `statechecklist`
--

CREATE TABLE IF NOT EXISTS `statechecklist` (
  `idstatechecklist` int(11) NOT NULL AUTO_INCREMENT,
  `status` varchar(80) COLLATE utf8_spanish_ci NOT NULL,
  `active` bit(1) NOT NULL,
  PRIMARY KEY (`idstatechecklist`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=7 ;

--
-- Daten für Tabelle `statechecklist`
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
-- Tabellenstruktur für Tabelle `states`
--

CREATE TABLE IF NOT EXISTS `states` (
  `idstate` int(11) NOT NULL AUTO_INCREMENT,
  `state` varchar(120) COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`idstate`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=2 ;

--
-- Daten für Tabelle `states`
--

INSERT INTO `states` (`idstate`, `state`) VALUES
(1, 'Proposal pending reply');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `tasks`
--

CREATE TABLE IF NOT EXISTS `tasks` (
  `idtask` int(11) NOT NULL AUTO_INCREMENT,
  `task` varchar(300) COLLATE utf8_spanish_ci NOT NULL,
  `order` smallint(6) NOT NULL,
  `value` smallint(6) DEFAULT NULL,
  `active` bit(1) DEFAULT NULL,
  `refproject` int(11) NOT NULL,
  PRIMARY KEY (`idtask`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `taskschecklist`
--

CREATE TABLE IF NOT EXISTS `taskschecklist` (
  `idtaskschecklist` int(11) NOT NULL AUTO_INCREMENT,
  `refchecklist` int(11) NOT NULL,
  `reftask` int(11) NOT NULL,
  PRIMARY KEY (`idtaskschecklist`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `user`
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
-- Daten für Tabelle `user`
--

INSERT INTO `user` (`iduser`, `user`, `password`, `refroll`, `email`, `fullname`) VALUES
(1, 'msred', 'mar', 1, 'msredhotero@msn.com', 'Saupurein Marcos'),
(2, 'Juan', 'juan', 2, 'juan@msn.com', 'Juancito'),
(3, 'Pedro', 'pe', 2, 'pe@msn.com', 'pepe');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
