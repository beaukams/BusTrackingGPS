-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Client: localhost
-- Généré le: Mer 27 Avril 2016 à 00:15
-- Version du serveur: 5.5.49-0ubuntu0.14.04.1
-- Version de PHP: 5.5.9-1ubuntu4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données: `BusTrackingGPS`
--

-- --------------------------------------------------------

--
-- Structure de la table `arret`
--

CREATE TABLE IF NOT EXISTS `arret` (
  `id_arret` int(11) NOT NULL AUTO_INCREMENT,
  `nom_arret` varchar(50) COLLATE utf8_bin NOT NULL,
  `latitude_arret` varchar(50) COLLATE utf8_bin NOT NULL,
  `longitude_arret` varchar(50) COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`id_arret`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `arretBus`
--

CREATE TABLE IF NOT EXISTS `arretBus` (
  `idArret` int(5) NOT NULL AUTO_INCREMENT,
  `nomArret` varchar(50) DEFAULT NULL,
  `latitudeArret` mediumtext NOT NULL,
  `longitudeArret` mediumtext NOT NULL,
  `vitesse` varchar(20) NOT NULL,
  `date` date NOT NULL,
  `heure` time NOT NULL,
  PRIMARY KEY (`idArret`),
  UNIQUE KEY `idArret` (`idArret`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10181 ;

--
-- Contenu de la table `arretBus`
--

INSERT INTO `arretBus` (`idArret`, `nomArret`, `latitudeArret`, `longitudeArret`, `vitesse`, `date`, `heure`) VALUES
(10020, 'arret15', '144326.51N', '0172710.58W', '0Km/h', '2015-12-24', '12:45:00'),
(10019, 'arret14', '144336.64N', '0172709.04W', '0Km/h', '2015-12-24', '12:43:00'),
(10018, 'arret13', '144341.82N', '0172720.18W', '0Km/h', '2015-12-24', '12:40:00'),
(10071, 'arret20', '143911.21N', '0172600.85W', '0Km/h', '2015-12-24', '15:56:00'),
(10078, 'arret22', '143942.06N', '0172612.91W', '0Km/h', '2015-12-24', '16:04:00'),
(10013, 'Arret11', '144325.55N', '0172725.71W', '0Km/h', '2015-12-24', '12:31:00'),
(10016, 'arret12', '144334.87N', '0172724.42W', '0Km/h', '2015-12-24', '12:36:00'),
(10012, 'Terminus L5', '144324.79N', '0172731.71W', '0Km/h', '2015-12-24', '12:29:00'),
(10024, 'arret17', '144303.36N', '0172729.45W', '0Km/h', '2015-12-24', '12:51:00'),
(10022, 'arret16', '144311.01N', '0172712.83W', '22Km/h', '2015-12-24', '12:47:00'),
(10026, 'arret18', '144255.06N', '0172736.83W', '0Km/h', '2015-12-24', '12:53:00'),
(10028, 'arret19', '144241.11N', '0172735.84W', '25Km/h', '2015-12-24', '12:55:00'),
(10030, 'arret110', '144231.00N', '0172731.88W', '0Km/h', '2015-12-24', '12:57:00'),
(10031, 'arret111', '144221.16N', '0172740.79W', '0Km/h', '2015-12-24', '12:59:00'),
(10033, 'arret112', '144207.36N', '0172753.04W', '0Km/h', '2015-12-24', '13:01:00'),
(10034, 'arret113', '144158.87N', '0172800.59W', '0Km/h', '2015-12-24', '15:15:00'),
(10035, 'arret114', '144145.57N', '0172759.77W', '0Km/h', '2015-12-24', '15:19:00'),
(10036, 'arret115', '144133.66N', '0172819.43W', '0Km/h', '2015-12-24', '15:21:00'),
(10039, 'arret116', '144104.58N', '0172807.60W', '0Km/h', '2015-12-24', '15:24:00'),
(10041, 'arret117', '144042.07N', '0172804.58W', '0Km/h', '2015-12-24', '15:26:00'),
(10044, 'arret118', '144044.50N', '0172743.48W', '0Km/h', '2015-12-24', '15:29:00'),
(10050, 'arret120', '144019.32N', '0172650.73W', '0Km/h', '2015-12-24', '15:35:00'),
(10047, 'arret119', '144031.11N', '0172712.05W', '0Km/h', '2015-12-24', '15:32:00'),
(10053, 'arret121', '144002.55N', '0172632.22W', '0Km/h', '2015-12-24', '15:38:00'),
(10056, 'arret122', '144000.56N', '0172624.89W', '0Km/h', '2015-12-24', '15:41:00'),
(10087, 'arret24', '143956.33N', '0172614.12W', '0Km/h', '2015-12-24', '16:13:00'),
(10059, 'arret123', '143955.29N', '0172610.32W', '0Km/h', '2015-12-24', '15:44:00'),
(10062, 'arret124', '143944.80N', '0172607.05W', '0Km/h', '2015-12-24', '15:47:00'),
(10065, 'arret125', '143943.12N', '0172613.46W', '0Km/h', '2015-12-24', '15:50:00'),
(10075, 'arret21', '143928.24N', '0172607.55W', '0Km/h', '2015-12-24', '16:01:00'),
(10095, 'arret27', '144018.56N', '0172649.00W', '0Km/h', '2015-12-24', '16:21:00'),
(10082, 'arret23', '143945.73N', '0172610.37W', '0Km/h', '2015-12-24', '16:08:00'),
(10089, 'arret25', '143958.71N', '0172622.47W', '0Km/h', '2015-12-24', '16:15:00'),
(10093, 'arret26', '144002.83N', '0172633.82W', '0Km/h', '2015-12-24', '16:19:00'),
(10116, 'arret213', '144145.42N', '0172759.52W', '0Km/h', '2015-12-24', '17:31:00'),
(10098, 'arret28', '144033.08N', '0172713.25W', '0Km/h', '2015-12-24', '16:24:00'),
(10101, 'arret29', '144043.49N', '0172745.44W', '0Km/h', '2015-12-24', '16:27:00'),
(10106, 'arret210', '144039.16N', '0172756.93W', '0Km/h', '2015-12-24', '16:32:00'),
(10109, 'arret211', '144102.75N', '0172806.37W', '0Km/h', '2015-12-24', '17:24:00'),
(10113, 'arret212', '144132.84N', '0172821.29W', '0Km/h', '2015-12-24', '17:28:00'),
(10118, 'arret214', '144153.34N', '0172801.63W', '0Km/h', '2015-12-24', '17:34:00'),
(10120, 'arret215', '144201.79N', '0172757.58W', '0Km/h', '2015-12-24', '17:36:00'),
(10122, 'arret216', '144209.99N', '0172750.22W', '0Km/h', '2015-12-24', '17:38:00'),
(10129, 'arret218', '144228.72N', '0172733.54W', '0Km/h', '2015-12-24', '17:45:00'),
(10125, 'arret217', '144219.76N', '0172741.50W', '0Km/h', '2015-12-24', '17:41:00'),
(10131, 'arret219', '144238.61N', '0172733.46W', '0Km/h', '2015-12-24', '17:47:00'),
(10153, 'arret223', '144306.04N', '0172726.73W', '0Km/h', '2015-12-24', '18:09:00'),
(10142, 'arret221', '144251.51N', '0172739.72W', '0Km/h', '2015-12-24', '17:58:00'),
(10140, 'arret220', '144245.57N', '0172739.51W', '0Km/h', '2015-12-24', '17:56:00'),
(10136, 'arret19bis', '144239.29N', '0172734.39W', '0Km/h', '2015-12-24', '17:52:00'),
(10147, 'arret222', '144256.48N', '0172735.12W', '0Km/h', '2015-12-24', '18:03:00'),
(10156, 'arret224', '144307.97N', '0172716.65W', '0Km/h', '2015-12-24', '18:12:00'),
(10166, 'arret227', '144330.92N', '0172709.91W', '0Km/h', '2015-12-24', '18:22:00'),
(10163, 'arret226', '144323.24N', '0172710.85W', '1Km/h', '2015-12-24', '18:19:00'),
(10161, 'arret225', '144315.22N', '0172712.15W', '0Km/h', '2015-12-24', '18:17:00'),
(10170, 'arret228', '144341.19N', '0172711.37W', '0Km/h', '2015-12-24', '18:26:00'),
(10172, 'arret229', '144342.31N', '0172719.52W', '0Km/h', '2015-12-24', '18:28:00'),
(10178, 'arret230', '144338.32N', '0172723.90W', '0Km/h', '2015-12-24', '18:34:00'),
(10180, 'arret231', '144328.51N', '0172725.29W', '0Km/h', '2015-12-24', '18:36:00');

-- --------------------------------------------------------

--
-- Structure de la table `arretLigne`
--

CREATE TABLE IF NOT EXISTS `arretLigne` (
  `id_arretligne` int(11) NOT NULL AUTO_INCREMENT,
  `id_arret` int(11) NOT NULL,
  `id_ligne` int(11) NOT NULL,
  `sens` enum('allee','retour') COLLATE utf8_bin NOT NULL DEFAULT 'allee',
  PRIMARY KEY (`id_arretligne`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `Bus`
--

CREATE TABLE IF NOT EXISTS `Bus` (
  `id_bus` int(11) NOT NULL AUTO_INCREMENT,
  `matricule_bus` varchar(50) COLLATE utf8_bin NOT NULL,
  `nom_ligne` varchar(50) COLLATE utf8_bin NOT NULL,
  `position_courant` int(11) NOT NULL,
  `sens_bus` enum('allee','retour') COLLATE utf8_bin NOT NULL DEFAULT 'allee',
  PRIMARY KEY (`id_bus`),
  UNIQUE KEY `matricule_bus` (`matricule_bus`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `ligneBus`
--

CREATE TABLE IF NOT EXISTS `ligneBus` (
  `id_ligne` int(11) NOT NULL AUTO_INCREMENT,
  `nom_ligne` varchar(10) COLLATE utf8_bin NOT NULL,
  `terminus1` int(11) NOT NULL,
  `terminus2` int(11) NOT NULL,
  PRIMARY KEY (`id_ligne`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `position`
--

CREATE TABLE IF NOT EXISTS `position` (
  `id_position` int(11) NOT NULL AUTO_INCREMENT,
  `latitude` varchar(50) COLLATE utf8_bin NOT NULL,
  `longitude` varchar(50) COLLATE utf8_bin NOT NULL,
  `altitude` varchar(50) COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`id_position`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `positionBus`
--

CREATE TABLE IF NOT EXISTS `positionBus` (
  `id_positionBus` int(11) NOT NULL AUTO_INCREMENT,
  `id_position` int(11) NOT NULL,
  `id_bus` int(11) NOT NULL,
  `vitesse` double NOT NULL,
  `date` date NOT NULL,
  `heure` time NOT NULL,
  PRIMARY KEY (`id_positionBus`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `smsRecv`
--

CREATE TABLE IF NOT EXISTS `smsRecv` (
  `id_sms` int(11) NOT NULL AUTO_INCREMENT,
  `contenu` text COLLATE utf8_bin NOT NULL,
  `emetteur` varchar(15) COLLATE utf8_bin NOT NULL,
  `ladate` date NOT NULL,
  `heure` time NOT NULL,
  PRIMARY KEY (`id_sms`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=19 ;

--
-- Contenu de la table `smsRecv`
--

INSERT INTO `smsRecv` (`id_sms`, `contenu`, `emetteur`, `ladate`, `heure`) VALUES
(1, 'ligne 13', '773675372', '2016-04-25', '00:00:23'),
(2, 'ligne 13', '773675372', '2016-04-25', '00:00:23'),
(3, 'ligne 13', '773675372', '2016-04-25', '23:58:03'),
(4, 'ligne 13', '773675372', '2016-04-26', '00:16:06'),
(5, 'Ligne 51', '+221773675372', '2016-04-26', '00:18:57'),
(6, 'Ligne 54', '+221773675372', '2016-04-26', '00:20:12'),
(7, 'Ligne 56', '+221773675372', '2016-04-26', '00:26:12'),
(8, 'Ligne 124', '+221773675372', '2016-04-26', '03:18:47'),
(9, 'Synchronisation du bus', '+221771006614', '2016-04-26', '11:48:03'),
(10, '10111dk ligne 10 14.681335 -17.466865 16.8000 0.537080 2 11495500 260416', '+221771006614', '2016-04-26', '11:50:03'),
(11, '10111dk ligne 10 14.681321 -17.466815 15.6000 4.074400 2 11501000 260416', '+221771006614', '2016-04-26', '11:50:18'),
(12, '10111dk ligne 10 14.681316 -17.466796 17.6000 1.555680 2 11501700 260416', '+221771006614', '2016-04-26', '11:50:33'),
(13, '10111dk ligne 10 14.681330 -17.466775 16.4000 2.037200 2 11502200 260416', '+221771006614', '2016-04-26', '11:50:33'),
(14, '10111dk ligne 10 14.681335 -17.466754 18.1000 1.666800 2 11503300 260416', '+221771006614', '2016-04-26', '11:50:48'),
(15, '10111dk ligne 10 14.681347 -17.466741 17.1000 2.092760 2 11503700 260416', '+221771006614', '2016-04-26', '11:50:48'),
(16, '10111dk ligne 10 14.681370 -17.466707 17.7000 1.629760 2 11504500 260416', '+221771006614', '2016-04-26', '11:51:03'),
(17, '10111dk ligne 10 14.681384 -17.466691 16.5000 1.740880 2 11505300 260416', '+221771006614', '2016-04-26', '11:51:03'),
(18, '10111dk ligne 10 14.681390 -17.466670 17.6000 1.685320 2 11505600 260416', '+221771006614', '2016-04-26', '11:51:03');

-- --------------------------------------------------------

--
-- Structure de la table `smsToSend`
--

CREATE TABLE IF NOT EXISTS `smsToSend` (
  `id_sms` int(11) NOT NULL AUTO_INCREMENT,
  `destination` varchar(15) COLLATE utf8_bin NOT NULL,
  `contenu` text COLLATE utf8_bin NOT NULL,
  `date` date NOT NULL,
  `heure` time NOT NULL,
  `envoye` enum('yes','no') COLLATE utf8_bin NOT NULL DEFAULT 'no',
  PRIMARY KEY (`id_sms`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=1 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
