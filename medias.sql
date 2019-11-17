-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  Dim 17 nov. 2019 à 03:34
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
  `note` int(11) DEFAULT NULL,
  `fk_format` int(11) DEFAULT NULL,
  `fk_type` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `media_element`
--

INSERT INTO `media_element` (`id`, `titre`, `description`, `note`, `fk_format`, `fk_type`) VALUES
(1, 'NHL 16', 'Meilleur jeu de hockey ever!  Mais désuet... note à moi-même acheter le NHL 20 au PC!!! :)', 5, 5, 2),
(2, 'Mario Kart 7 3DS', 'Un classique de course Nintendo', 5, 6, 3),
(3, 'Titre', 'description', 3, 2, 6),
(4, 'Titre 2', 'Desc 2', 1, 1, 1),
(5, 'Super Mario 3D Land', 'Un classique Nintendo', 4, 6, 3),
(6, 'Star Wars Battlefront Ultimate Edition', 'Combat en ligne / solo', 4, 5, 2),
(7, 'The Amazing Spiderman 2', '-', 3, 5, 2),
(8, 'Resident Evil 6', '-', 5, 5, 2),
(9, 'Injustice 2', 'Combat 1vs1', 34, 5, 2),
(10, 'Need For Speed Rivals', 'Course', 4, 5, 2),
(11, 'Titanfall 2', 'Guerre robots', 4, 5, 2);

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
