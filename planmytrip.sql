-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Client: localhost
-- Généré le: Mer 05 Mars 2014 à 10:13
-- Version du serveur: 5.5.24-log
-- Version de PHP: 5.4.3

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données: `planmytrip`
--

-- --------------------------------------------------------

--
-- Structure de la table `guide`
--

CREATE TABLE IF NOT EXISTS `guide` (
  `Id_Guide` int(11) NOT NULL AUTO_INCREMENT,
  `Titre` text NOT NULL,
  `Contenu` text NOT NULL,
  `Id_User` int(11) NOT NULL,
  `Pays` text NOT NULL,
  `Ville` text,
  `Datetime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`Id_Guide`),
  KEY `Id_User` (`Id_User`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Contenu de la table `guide`
--

INSERT INTO `guide` (`Id_Guide`, `Titre`, `Contenu`, `Id_User`, `Pays`, `Ville`, `Datetime`) VALUES
(2, 'Guide du swag', 'yolololoo, mega swagman', 4, 'France', 'Paris', '2014-03-05 09:48:10');

-- --------------------------------------------------------

--
-- Structure de la table `jointag`
--

CREATE TABLE IF NOT EXISTS `jointag` (
  `Id_Tag` int(11) NOT NULL,
  `Id_Guide` int(11) NOT NULL,
  KEY `Id_Tag` (`Id_Tag`,`Id_Guide`),
  KEY `Id_Guide` (`Id_Guide`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `tag`
--

CREATE TABLE IF NOT EXISTS `tag` (
  `Id_Tag` int(11) NOT NULL AUTO_INCREMENT,
  `Libelle` text NOT NULL,
  PRIMARY KEY (`Id_Tag`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Contenu de la table `tag`
--

INSERT INTO `tag` (`Id_Tag`, `Libelle`) VALUES
(1, 'metal');

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `Id_User` int(11) NOT NULL AUTO_INCREMENT,
  `FullName` text NOT NULL,
  `Pseudo` text NOT NULL,
  `Mail` text NOT NULL,
  `Password` text NOT NULL,
  `ValidateKey` text NOT NULL,
  `IsValidate` tinyint(1) NOT NULL,
  PRIMARY KEY (`Id_User`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Contenu de la table `user`
--

INSERT INTO `user` (`Id_User`, `FullName`, `Pseudo`, `Mail`, `Password`, `ValidateKey`, `IsValidate`) VALUES
(4, 'Alex F', 'Dak', 'tarat@jopl.fr', 'grqegdsg', 'sdgeqs049849', 0);

--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `guide`
--
ALTER TABLE `guide`
  ADD CONSTRAINT `guide_ibfk_1` FOREIGN KEY (`Id_User`) REFERENCES `user` (`Id_User`);

--
-- Contraintes pour la table `jointag`
--
ALTER TABLE `jointag`
  ADD CONSTRAINT `jointag_ibfk_2` FOREIGN KEY (`Id_Guide`) REFERENCES `guide` (`Id_Guide`),
  ADD CONSTRAINT `jointag_ibfk_1` FOREIGN KEY (`Id_Tag`) REFERENCES `tag` (`Id_Tag`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
