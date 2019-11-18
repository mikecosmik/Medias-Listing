-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  lun. 18 nov. 2019 à 01:50
-- Version du serveur :  5.7.21
-- Version de PHP :  5.6.35

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `medias`
--
CREATE DATABASE IF NOT EXISTS `medias` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `medias`;

-- --------------------------------------------------------

--
-- Structure de la table `format`
--

DROP TABLE IF EXISTS `format`;
CREATE TABLE IF NOT EXISTS `format` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `format`
--

INSERT INTO `format` (`id`, `nom`) VALUES
(1, 'CD'),
(2, 'DVD'),
(6, 'Carte'),
(5, 'Blu-Ray'),
(7, '.iso'),
(8, '.cso'),
(9, '.mp4'),
(10, '.mkv'),
(11, 'Autre');

-- --------------------------------------------------------

--
-- Structure de la table `media_element`
--

DROP TABLE IF EXISTS `media_element`;
CREATE TABLE IF NOT EXISTS `media_element` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `titre` varchar(255) DEFAULT NULL,
  `description` text,
  `note` float DEFAULT NULL,
  `fk_format` int(2) DEFAULT NULL,
  `fk_type` int(2) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=66 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `media_element`
--

INSERT INTO `media_element` (`id`, `titre`, `description`, `note`, `fk_format`, `fk_type`) VALUES
(1, 'NHL \'16', 'Meilleur franchise de hockey ever!  À acheter bientôt NHL \'20', 5, 5, 2),
(2, 'Mario Kart 7 3DS', 'Un classique de course Nintendo', 5, 6, 3),
(6, 'Star Wars Battlefront Ultimate Edition', 'Combat en ligne / solo', 4, 5, 2),
(7, 'The Amazing Spiderman 2', 'Semblable à Watchdogs', 3.5, 5, 2),
(8, 'Resident Evil 6', 'Zombies...', 5, 5, 2),
(9, 'Injustice 2', 'Combat 1 contre 1 ou plus', 4, 5, 2),
(10, 'Need For Speed Rivals', 'Course', 4, 5, 2),
(11, 'Titanfall 2', 'Guerre robots', 5, 5, 2),
(65, 'Suicide Squad', 'DC Comics', 4, 9, 7);

-- --------------------------------------------------------

--
-- Structure de la table `type`
--

DROP TABLE IF EXISTS `type`;
CREATE TABLE IF NOT EXISTS `type` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `type`
--

INSERT INTO `type` (`id`, `nom`) VALUES
(1, 'PS3'),
(2, 'PS4'),
(3, '3DS'),
(4, 'PSP'),
(5, 'PS Vita'),
(6, 'Wii'),
(7, 'Film'),
(8, 'Autre');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
