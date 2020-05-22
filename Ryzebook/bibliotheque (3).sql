-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Ven 22 Mai 2020 à 23:20
-- Version du serveur :  5.6.17
-- Version de PHP :  5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données :  `bibliotheque`
--

-- --------------------------------------------------------

--
-- Structure de la table `auteur`
--

CREATE TABLE IF NOT EXISTS `auteur` (
  `idPersonne` int(11) NOT NULL,
  `idLivre` varchar(15) COLLATE utf8_bin NOT NULL,
  `idRole` int(11) NOT NULL,
  KEY `fk_auteuridPers` (`idPersonne`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Contenu de la table `auteur`
--

INSERT INTO `auteur` (`idPersonne`, `idLivre`, `idRole`) VALUES
(1, '2264069112', 1),
(3, '2264069112', 2),
(4, '2264069112', 3),
(1, '2264056002', 1),
(1, '2264056169', 1),
(6, '203585573X', 1),
(5, '208127857X', 1),
(5, '2253163503', 1),
(6, '2253041475', 1),
(8, '2253160466', 1),
(8, '2253038741', 1),
(8, '2253037923', 1),
(2, '2035867916', 1),
(9, '2070373096', 1),
(10, '2081219972', 1),
(11, '2266152182', 1),
(12, '2266152182', 3),
(13, '2809710562', 1),
(14, '2809710562', 3),
(15, '2809710562', 3),
(16, '2266203533', 4),
(17, '096573840X', 1);

-- --------------------------------------------------------

--
-- Structure de la table `editeur`
--

CREATE TABLE IF NOT EXISTS `editeur` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `libelle` varchar(150) COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=10 ;

--
-- Contenu de la table `editeur`
--

INSERT INTO `editeur` (`id`, `libelle`) VALUES
(1, 'Belfond'),
(2, 'Flammarion'),
(3, 'Librio'),
(4, 'Pocket'),
(5, 'Larousse'),
(6, 'Le livre de poche'),
(7, 'Folio Théâtre'),
(8, 'Philippe Picquier'),
(9, 'Guardian');

-- --------------------------------------------------------

--
-- Structure de la table `genre`
--

CREATE TABLE IF NOT EXISTS `genre` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `libelle` varchar(150) COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `libelle` (`libelle`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=9 ;

--
-- Contenu de la table `genre`
--

INSERT INTO `genre` (`id`, `libelle`) VALUES
(8, ''),
(7, '4'),
(4, 'Essai'),
(3, 'Nouvelle'),
(5, 'Poésie'),
(2, 'Roman'),
(1, 'Théâtre');

-- --------------------------------------------------------

--
-- Structure de la table `langue`
--

CREATE TABLE IF NOT EXISTS `langue` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `libelle` varchar(150) COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=8 ;

--
-- Contenu de la table `langue`
--

INSERT INTO `langue` (`id`, `libelle`) VALUES
(1, 'Anglais'),
(2, 'Français'),
(3, 'Japonais'),
(4, 'Espagnol'),
(5, 'Italien'),
(6, 'Chinois'),
(7, 'Chinois');

-- --------------------------------------------------------

--
-- Structure de la table `livre`
--

CREATE TABLE IF NOT EXISTS `livre` (
  `isbn` varchar(15) COLLATE utf8_bin NOT NULL,
  `titre` varchar(500) COLLATE utf8_bin NOT NULL,
  `editeur` int(11) NOT NULL,
  `annee` int(11) DEFAULT NULL,
  `genre` int(11) DEFAULT NULL,
  `langue` int(11) DEFAULT NULL,
  `nbpages` int(11) DEFAULT NULL,
  PRIMARY KEY (`isbn`),
  KEY `fk_auteuridEdi` (`editeur`),
  KEY `fk_auteuridGen` (`genre`),
  KEY `fk_auteuridLan` (`langue`),
  KEY `isbn` (`isbn`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Contenu de la table `livre`
--

INSERT INTO `livre` (`isbn`, `titre`, `editeur`, `annee`, `genre`, `langue`, `nbpages`) VALUES
('096573840X', 'A short history of Nearly Everything', 9, 2003, 4, 1, NULL),
('203585573X', 'Ruy Blas', 2, 1838, 1, 2, 270),
('2035867916', 'L''illusion comique', 6, 1639, 1, 2, NULL),
('2070373096', 'Les Paravents', 7, 1961, 1, 2, NULL),
('2081219972', 'Le Comédien désincarné', 2, 2009, 2, 2, 390),
('208127857X', 'Un fil à la patte', 7, 1894, 1, 2, 208),
('2253037923', 'Le misanthrope', 6, 1666, 1, 2, NULL),
('2253038741', 'Les femmes savantes', 6, 1672, 1, 2, NULL),
('2253040156', 'Poètes français des XIXe et XXe sciècles', 6, 2009, 5, 2, NULL),
('2253041475', 'Hernani', 6, 1830, 1, 2, NULL),
('2253160466', 'Les précieuses ridicules', 6, 1660, 1, 2, NULL),
('2253163503', 'Le Dindon', 6, 1989, 1, 2, 107),
('2264056002', 'La ballade de l''impossible', 1, 2002, 2, 2, 456),
('2264056169', 'Kafka sur le rivage', 1, 2002, 2, 2, 648),
('2264069112', 'L''étrange bibliothèque', 1, 2015, 3, 2, 80),
('2266152181', 'Le cid', 2, 1637, 1, 2, 208),
('2266152182', 'L''art de la guerre', 2, 1963, 4, 2, NULL),
('2266203533', 'Les Contemplations', 4, 1856, 5, 2, 672),
('2809710562', 'La tombe des lucioles', 8, 1967, 2, 2, 143);

-- --------------------------------------------------------

--
-- Structure de la table `membre`
--

CREATE TABLE IF NOT EXISTS `membre` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `name` text COLLATE utf8_bin NOT NULL,
  `mdp` text COLLATE utf8_bin NOT NULL,
  `mail` text COLLATE utf8_bin NOT NULL,
  `date_creation` date NOT NULL,
  `type` text COLLATE utf8_bin NOT NULL,
  `secret` text COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=13 ;

--
-- Contenu de la table `membre`
--

INSERT INTO `membre` (`id`, `name`, `mdp`, `mail`, `date_creation`, `type`, `secret`) VALUES
(5, 'Akame Stks', 'aq15b41d918cd454814cddf800a46dc2141085478c125', 'akamechannnn@gmail.com', '0000-00-00', 'admin', 'a138e4b01ac3dc7346d7223296a03e4877981a6015900669371590066937'),
(6, 'Corentin', 'aq1de6c99e1b3e99c86cbe795f8f435d8e71d4542dd25', 'hello@coco.fr', '0000-00-00', 'user', '3c9b361eebecf5e7f2032ffb7c8e5565ca2e6ed815900766381590076638'),
(7, 'Dorian ', 'aq1993ca17adf0f783ef646c9a8553e36189146d91025', 'hello@dodo.fr', '0000-00-00', 'admin', 'cabf63a93aa91aa6e4f5b731427fc74116602fc015900790071590079007'),
(8, 'oui', 'aq1de6c99e1b3e99c86cbe795f8f435d8e71d4542dd25', 'hello@oui.fr', '0000-00-00', 'admin', 'f1f2c1609b8ea4301760c9cc74ce0b714359150215900839481590083948'),
(9, 'Kevin ', 'aq1d1aa977849add566b00194cc2941776d9195d78f25', 'hello@kevin.fr', '0000-00-00', 'user', '766e2789d09079e320b004ba9deeae32f236bdb215900852221590085222'),
(10, 'Adrien', 'aq124f4db0fcba088db15d04c376fcdd994de59237a25', 'hello@adrien.fr', '0000-00-00', 'user', '904193465ec23a622aaccdea6d409a0e0fd2a2e115900932501590093250'),
(11, 'JavaScript', 'aq15700a133c2148a66e907ea57d75ced3d5c89b6e625', 'hello@js.fr', '0000-00-00', 'user', '410c36169e748f5e6880848bd81c192b17d99a6315901439551590143955'),
(12, 'Corentinn', 'aq1708900663fc255917b3d0a48ce091685c8add7a525', 'hello@clash.fr', '0000-00-00', 'admin', '6bdc160d9086920f21afd66d9014836f5fb5195415901802631590180263');

-- --------------------------------------------------------

--
-- Structure de la table `panier`
--

CREATE TABLE IF NOT EXISTS `panier` (
  `idmembre` int(11) DEFAULT NULL,
  `isbnlivre` varchar(15) COLLATE utf8_bin DEFAULT NULL,
  KEY `id_membre` (`idmembre`),
  KEY `isbnlivre` (`isbnlivre`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Contenu de la table `panier`
--

INSERT INTO `panier` (`idmembre`, `isbnlivre`) VALUES
(9, '2264069112'),
(9, '2264069112'),
(9, '2264069112'),
(9, '2264069112'),
(11, '2264069112');

-- --------------------------------------------------------

--
-- Structure de la table `personne`
--

CREATE TABLE IF NOT EXISTS `personne` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(150) COLLATE utf8_bin NOT NULL,
  `prenom` varchar(150) COLLATE utf8_bin DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=21 ;

--
-- Contenu de la table `personne`
--

INSERT INTO `personne` (`id`, `nom`, `prenom`) VALUES
(1, 'Murakami', 'Haruki'),
(2, 'Corneille', 'Pierre'),
(3, 'Menschik', 'Kat'),
(4, 'Morita', 'Helene'),
(5, 'Feydeau', 'Georges'),
(6, 'Hugo', 'Victor'),
(7, 'Chedeville', 'Elise'),
(8, 'Molière', NULL),
(9, 'Genet', 'Jean'),
(10, 'Jouvet', 'Louis'),
(11, 'Tzu', 'Sun'),
(12, 'Amiot', 'Joseph-Marie'),
(13, 'Nosaka', 'Akiyuki'),
(14, 'De Vos', 'Patrick'),
(15, 'Gossot', 'Anne'),
(16, 'Chamarat-Malandain', 'Gabrielle'),
(17, 'Bryson', 'Bill'),
(20, '', '');

-- --------------------------------------------------------

--
-- Structure de la table `role`
--

CREATE TABLE IF NOT EXISTS `role` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `libelle` varchar(150) COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=5 ;

--
-- Contenu de la table `role`
--

INSERT INTO `role` (`id`, `libelle`) VALUES
(1, 'Ecrivain'),
(2, 'Illustrateur'),
(3, 'Traducteur'),
(4, 'Préface');

-- --------------------------------------------------------

--
-- Structure de la table `réservation`
--

CREATE TABLE IF NOT EXISTS `réservation` (
  `idRéservation` int(11) NOT NULL AUTO_INCREMENT,
  `id_membre` int(11) NOT NULL,
  PRIMARY KEY (`idRéservation`),
  KEY `id_membre` (`id_membre`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=1 ;

--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `auteur`
--
ALTER TABLE `auteur`
  ADD CONSTRAINT `fk_auteuridPers` FOREIGN KEY (`idPersonne`) REFERENCES `personne` (`id`);

--
-- Contraintes pour la table `livre`
--
ALTER TABLE `livre`
  ADD CONSTRAINT `fk_auteuridEdi` FOREIGN KEY (`editeur`) REFERENCES `editeur` (`id`),
  ADD CONSTRAINT `fk_auteuridGen` FOREIGN KEY (`genre`) REFERENCES `genre` (`id`),
  ADD CONSTRAINT `fk_auteuridLan` FOREIGN KEY (`langue`) REFERENCES `langue` (`id`);

--
-- Contraintes pour la table `panier`
--
ALTER TABLE `panier`
  ADD CONSTRAINT `livre_isbn` FOREIGN KEY (`isbnlivre`) REFERENCES `livre` (`isbn`),
  ADD CONSTRAINT `id_membre` FOREIGN KEY (`idmembre`) REFERENCES `membre` (`id`);

--
-- Contraintes pour la table `réservation`
--
ALTER TABLE `réservation`
  ADD CONSTRAINT `membre_idd` FOREIGN KEY (`id_membre`) REFERENCES `membre` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
