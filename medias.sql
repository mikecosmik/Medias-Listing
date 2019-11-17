-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le :  Dim 17 nov. 2019 à 16:01
-- Version du serveur :  10.4.8-MariaDB
-- Version de PHP :  7.1.33

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

CREATE TABLE `format` (
  `id` int(11) NOT NULL,
  `nom` varchar(10) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

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

CREATE TABLE `media_element` (
  `id` int(11) NOT NULL,
  `titre` varchar(255) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `note` float DEFAULT NULL,
  `fk_format` int(11) DEFAULT NULL,
  `fk_type` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `media_element`
--

INSERT INTO `media_element` (`id`, `titre`, `description`, `note`, `fk_format`, `fk_type`) VALUES
(1, 'NHL 16', 'Meilleur jeu de hockey ever!  Mais désuet... note à moi-même acheter le NHL 20 au PC!!! :)', 5, 5, 2),
(2, 'Mario Kart 7 3DS', 'Un classique de course Nintendo', 5, 6, 3),
(5, 'Super Mario 3D Land', 'Un classique Nintendo', 4, 6, 3),
(6, 'Star Wars Battlefront Ultimate Edition', 'Combat en ligne / solo', 4, 5, 2),
(7, 'The Amazing Spiderman 2', 'Semblable à Watchdogs', 3, 5, 2),
(8, 'Resident Evil 6', 'Zombies...', 5, 5, 2),
(9, 'Injustice 2', 'Combat 1 contre 1', 4, 5, 2),
(10, 'Need For Speed Rivals', 'Course', 4, 5, 2),
(11, 'Titanfall 2', 'Guerre robots', 4, 5, 2);

-- --------------------------------------------------------

--
-- Structure de la table `type`
--

CREATE TABLE `type` (
  `id` int(11) NOT NULL,
  `nom` varchar(10) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

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

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `format`
--
ALTER TABLE `format`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `media_element`
--
ALTER TABLE `media_element`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `type`
--
ALTER TABLE `type`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `format`
--
ALTER TABLE `format`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT pour la table `media_element`
--
ALTER TABLE `media_element`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT pour la table `type`
--
ALTER TABLE `type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
