-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- Client: localhost
-- Généré le: Sam 12 Avril 2014 à 23:26
-- Version du serveur: 5.6.12-log
-- Version de PHP: 5.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données: `planmytrip`
--
CREATE DATABASE IF NOT EXISTS `planmytrip` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `planmytrip`;

-- --------------------------------------------------------

--
-- Structure de la table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `Id_Admin` int(11) NOT NULL,
  `Pseudo` text NOT NULL,
  `Password` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
  `duration` int(1) NOT NULL,
  `isValide` tinyint(1) NOT NULL,
  PRIMARY KEY (`Id_Guide`),
  KEY `Id_User` (`Id_User`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=20 ;

--
-- Contenu de la table `guide`
--

INSERT INTO `guide` (`Id_Guide`, `Titre`, `Contenu`, `Id_User`, `Pays`, `Ville`, `Datetime`, `duration`, `isValide`) VALUES
(15, 'Paris en 4 Jours', '<h2 class="pane-title" style="width:400px;margin-top: 0px; margin-bottom: 0px; padding: 0px; color: rgb(0, 0, 0); font-family: Arial, Helvetica, sans-serif;"><span style="line-height: normal; font-weight: normal;"><font size="3">Avec 4 jours, vous aurez le temps d''aller admirer les ors du palais de Versailles, le jardin planté et peint par Monet à Giverny ou le domaine de Chantilly. Mais les gratte-ciel de la Défense valent aussi le détour, tout comme les deux grands bois de la ville&nbsp;: le bois de Boulogne et le bois de Vincennes. Pour finir la journée en beauté, offrez-vous une sortie à l''opéra, au théâtre ou au cinéma, ou, si vous ne l''avez pas encore fait, grimpez les étages de la tour Eiffel le soir pour avoir une vue scintillante sur la Ville Lumière.</font></span></h2><div><span style="line-height: normal; font-weight: normal;"><font size="3"><br></font></span></div><font color="#000000" face="Arial, Helvetica, sans-serif" size="3">\r\n</font>\r\n\r\n<iframe src="https://mapsengine.google.com/map/embed?mid=z802mJ1f5rP0.kiq-XMTUYj9c" width="500" height="480"></iframe>', 10, 'France', 'Paris', '2014-03-07 16:01:52', 4, 1),
(18, 'Un long week-end &agrave; Rome', '<h3 style="line-height: 1.282em; margin-top: 0px; margin-bottom: 0px; padding: 0px; color: rgb(0, 0, 0); font-family: Arial, Helvetica, sans-serif;"><span style="line-height: normal; font-size: 1em;">Il est assez simple de visiter Rome en 3 jours avec un peu d''organisation et de bonnes jambes.</span></h3><div class="pane-content" style="color: rgb(0, 0, 0); font-family: Arial, Helvetica, sans-serif; line-height: normal;"><h3 style="line-height: 1.282em; margin-top: 0px; margin-bottom: 0px; padding: 0px;">Premier jour</h3><p style="margin-top: 1.5em; margin-bottom: 1.5em;"><i>Buongiorno</i>, Rome&nbsp;! Montez en haut de la<strong>&nbsp;basilique Saint-Pierre</strong>, ou visitez la&nbsp;<strong>chapelle Sixtine</strong>&nbsp;aux musées du Vatican. Mangez chez&nbsp;<a href="http://daginorestaurant.com/about/" style="color: rgb(0, 51, 153) !important;"><strong>Da Gino</strong></a>, puis élancez-vous dans le dédale du centre historique, où vous déboucherez sur la&nbsp;<strong>piazza Navona</strong>&nbsp;et le&nbsp;<strong>Panthéon.</strong>&nbsp;S''il vous reste de l''énergie, arpentez le<strong>&nbsp;Colisée&nbsp;</strong>ou le&nbsp;<strong>Palatin</strong>, avant de prendre l''apéritif chez&nbsp;<strong>Freni e Frizioni</strong>, de savourer la nouvelle cuisine du&nbsp;<strong>Glass Hostaria</strong>&nbsp;et d''écouter du jazz au&nbsp;<a href="http://www.bigmama.it/" style="color: rgb(0, 51, 153) !important;"><strong>Big Mama</strong></a>.</p><h3 style="line-height: 1.282em; margin-top: 0px; margin-bottom: 0px; padding: 0px;">Deuxième Jour</h3><p style="margin-top: 1.5em; margin-bottom: 1.5em;">Après la découverte des chefs-d''œuvre de la<strong>&nbsp;galerie Borghèse</strong>&nbsp;et une balade dans la&nbsp;<strong>villa Borghèse</strong>, cap sur le&nbsp;<strong>Museo Carlo Bilotti&nbsp;</strong>pour rencontrer Warhol et Giorgio de Chirico, ou rendez-vous au&nbsp;<a href="http://www.ilpalazzettoroma.com/" style="color: rgb(0, 51, 153) !important;"><strong>Palazzetto</strong></a>&nbsp;pour déjeuner. Puis, dévalez l''escalier de la&nbsp;<strong>Trinité-des-Monts&nbsp;</strong>pour rejoindre les grands créateurs&nbsp;<strong>via dei Condotti</strong>, ou optez pour les lignes plus audacieuses des boutiques du quartiers des Monti. Ensuite, sus aux cocktails de<strong>&nbsp;Salotto 42</strong>&nbsp;et aux pizzas fumantes de&nbsp;<strong>Da Baffetto</strong>, avant de terminer la soirée au&nbsp;<a href="http://www.fluideventi.com/home.html" style="color: rgb(0, 51, 153) !important;"><strong>Fluid</strong></a>.</p><p style="margin-top: 1.5em; margin-bottom: 1.5em;">&nbsp;</p><h3 style="line-height: 1.282em; margin-top: 0px; margin-bottom: 0px; padding: 0px;">Troisième Jour</h3><p style="margin-top: 1.5em; margin-bottom: 1.5em;">Reprenez vos esprits devant un expresso au&nbsp;<strong>Caffè Sant''Eustachio</strong>, avant d''affronter la Louve aux&nbsp;<strong>musées du Capitole</strong>. N''oubliez pas d''admirer la vue depuis le café du musée avant une pause bien méritée à l''<a href="http://www.acquamadre.it/Acquamadre-Hammam-Roma/" style="color: rgb(0, 51, 153) !important;"><strong>Acqua Madre Hammam</strong></a>. Puis, vin, dîner et musique trois-étoiles à l''auditorium&nbsp;<strong>Parco della Musica</strong>.</p></div>', 10, 'Italie', 'Rome', '2014-04-11 01:29:08', 3, 1),
(19, 'New York Master', '<p style="margin-top: 0px; margin-bottom: 15px; padding: 0px; color: rgb(0, 0, 0); font-family: ''LT Oksana Medium Regular'', Arial, Helvetica, sans-serif; font-size: 12px; line-height: 18px; background-color: rgb(255, 255, 255); text-align: justify;">Pour moi, tous les planning sur 3 jours et bien sûr une semaine ou plus doivent rassembler au moins ces visites pour mieux capter et comprendre cette magnifique ville de New York City :</p><p style="margin-top: 0px; margin-bottom: 15px; padding: 0px; color: rgb(0, 0, 0); font-family: ''LT Oksana Medium Regular'', Arial, Helvetica, sans-serif; font-size: 12px; line-height: 18px; background-color: rgb(255, 255, 255); text-align: justify;">- Une montée à l’<strong>Empire State Building&nbsp;</strong>ou au&nbsp;<strong>Top of the Rock</strong>&nbsp;: pour découvrir New York et Manhattan de tout en haut.</p><p style="margin-top: 0px; margin-bottom: 15px; padding: 0px; color: rgb(0, 0, 0); font-family: ''LT Oksana Medium Regular'', Arial, Helvetica, sans-serif; font-size: 12px; line-height: 18px; background-color: rgb(255, 255, 255); text-align: justify;">- Une balade à<strong>&nbsp;Central Park :<br></strong></p><p style="margin-top: 0px; margin-bottom: 15px; padding: 0px; color: rgb(0, 0, 0); font-family: ''LT Oksana Medium Regular'', Arial, Helvetica, sans-serif; font-size: 12px; line-height: 18px; background-color: rgb(255, 255, 255); text-align: justify;">- Un arrêt sur Broadway à Soho pour du&nbsp;<strong>Shopping&nbsp;</strong>: car pour moi, c’est le lieu où il y a tous les magasins les plus sympas, à la mode, que ce soit pour les chaussures avec les magasins de sneakers, les Converse, mais aussi les magasins type Hollister, American Eagle, Levi’s, …<strong><br></strong></p><p style="margin-top: 0px; margin-bottom: 15px; padding: 0px; color: rgb(0, 0, 0); font-family: ''LT Oksana Medium Regular'', Arial, Helvetica, sans-serif; font-size: 12px; line-height: 18px; background-color: rgb(255, 255, 255); text-align: justify;">- Balade à&nbsp;<strong>Times Square</strong>&nbsp;: le lieu où la folie de New York est la plus flagrante. Lumières de partout, magasins, monde, touristes, … il faut le voir pour le croire.</p><p style="margin-top: 0px; margin-bottom: 15px; padding: 0px; color: rgb(0, 0, 0); font-family: ''LT Oksana Medium Regular'', Arial, Helvetica, sans-serif; font-size: 12px; line-height: 18px; background-color: rgb(255, 255, 255); text-align: justify;">-&nbsp;<strong>Union Square</strong>&nbsp;: la place pour rencontrer les locaux!!!</p><p style="margin-top: 0px; margin-bottom: 15px; padding: 0px; color: rgb(0, 0, 0); font-family: ''LT Oksana Medium Regular'', Arial, Helvetica, sans-serif; font-size: 12px; line-height: 18px; background-color: rgb(255, 255, 255); text-align: justify;">- Un&nbsp;<strong>match de NBA</strong>&nbsp;des Knicks de New York ou alors un&nbsp;<strong>spectacle à Broadway</strong>&nbsp;: suivant vos préférences.</p>', 10, 'USA', 'New York', '2014-04-11 02:58:40', 3, 1);

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Contenu de la table `user`
--

INSERT INTO `user` (`Id_User`, `FullName`, `Pseudo`, `Mail`, `Password`, `ValidateKey`, `IsValidate`) VALUES
(5, 'yolo', 'qsrg', 'qzgts@gesr.fr', '7768577dc159498e72a698815bd9bbfa524a16d5', 'd0c66db796a62b7d3ac06c19aa8950c6', 1),
(7, 'YOLOSWAG', 'Alex', 'alex@zob.fr', '7a480b14a6c9edbc9af65de21b98f699fc6aa63f', 'b5db3d89dd70136d98224b3b3d1780e7', 1),
(8, 'Péquin Mathieu', 'M3te0r', 'mat.pequin@gmail.com', '1045e6911dd53cb6857ad348d76626f272228664', '4136ed9f2029bf4d70bedb1178e7f899', 1),
(9, 'aaaa', 'aaaa', 'aaaa@gmail.com', '1045e6911dd53cb6857ad348d76626f272228664', '92a0117b41b1a036a1eeb29b3b630f5c', 1),
(10, 'Kevin Maarek', 'Que20', 'Kevin@me.lol', '8cc9c03239e12d8ec987ae1085ea09fe1be801b1', 'd0eddfbefcd8ba6e849680f3f043c66e', 1),
(11, 'Kevin Maarek', 'Kevin', 'maarekkevin@gmail.com', '8cc9c03239e12d8ec987ae1085ea09fe1be801b1', 'bae91c78eb78b06614920ebd09b1a385', 1),
(12, 'Kevin Maarek', 'Que20', 'maarekkevin@gmail.com', '1045e6911dd53cb6857ad348d76626f272228664', 'cafedda3d4443ffc91d1d665e3bfffb0', 1);

-- --------------------------------------------------------

--
-- Structure de la table `votes`
--

CREATE TABLE IF NOT EXISTS `votes` (
  `idGuide` int(11) NOT NULL,
  `nbDown` int(11) NOT NULL,
  `nbUp` int(11) NOT NULL,
  PRIMARY KEY (`idGuide`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `votes`
--

INSERT INTO `votes` (`idGuide`, `nbDown`, `nbUp`) VALUES
(15, 0, 1),
(18, 0, 0),
(19, 1, 0);

-- --------------------------------------------------------

--
-- Structure de la table `votesbyuser`
--

CREATE TABLE IF NOT EXISTS `votesbyuser` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idUser` int(11) NOT NULL,
  `idGuide` int(11) NOT NULL,
  `hasVoted` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `idUser` (`idUser`,`idGuide`),
  KEY `idGuide` (`idGuide`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Contenu de la table `votesbyuser`
--

INSERT INTO `votesbyuser` (`id`, `idUser`, `idGuide`, `hasVoted`) VALUES
(1, 10, 15, 1),
(2, 10, 19, 1);

--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `guide`
--
ALTER TABLE `guide`
  ADD CONSTRAINT `guide_ibfk_1` FOREIGN KEY (`Id_User`) REFERENCES `user` (`Id_User`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `jointag`
--
ALTER TABLE `jointag`
  ADD CONSTRAINT `jointag_ibfk_3` FOREIGN KEY (`Id_Tag`) REFERENCES `tag` (`Id_Tag`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `jointag_ibfk_4` FOREIGN KEY (`Id_Guide`) REFERENCES `guide` (`Id_Guide`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `votes`
--
ALTER TABLE `votes`
  ADD CONSTRAINT `votes_ibfk_1` FOREIGN KEY (`idGuide`) REFERENCES `guide` (`Id_Guide`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `votesbyuser`
--
ALTER TABLE `votesbyuser`
  ADD CONSTRAINT `votesbyuser_ibfk_1` FOREIGN KEY (`idUser`) REFERENCES `user` (`Id_User`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `votesbyuser_ibfk_2` FOREIGN KEY (`idGuide`) REFERENCES `votes` (`idGuide`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
