-- phpMyAdmin SQL Dump
-- version 4.0.4.1
-- http://www.phpmyadmin.net
--
-- Client: 127.0.0.1
-- Généré le: Dim 22 Juin 2014 à 03:24
-- Version du serveur: 5.6.11
-- Version de PHP: 5.5.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données: `bluppycube_db`
--
CREATE DATABASE IF NOT EXISTS `bluppycube_db` DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci;
USE `bluppycube_db`;

-- --------------------------------------------------------

--
-- Structure de la table `t_user`
--

CREATE TABLE IF NOT EXISTS `t_user` (
  `id_user` int(11) NOT NULL AUTO_INCREMENT,
  `name_user` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `pass_user` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `score` int(11) NOT NULL,
  PRIMARY KEY (`id_user`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=8 ;

--
-- Contenu de la table `t_user`
--

INSERT INTO `t_user` (`id_user`, `name_user`, `pass_user`, `score`) VALUES
(2, 'bretonr', 'as4aw4asf', 5),
(3, 'bretonr23', 'as4aw4asf', 5),
(4, 'bretonr45', 'as4aw4asf', 1000),
(5, 'bretonr2', 'as4aw4asf', 2),
(6, 'bretonr0', 'as4aw4asf', 0),
(7, 'bretonr1', 'as4aw4asf', 1);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
