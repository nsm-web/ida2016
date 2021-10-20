-- phpMyAdmin SQL Dump
-- version 4.1.4
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Ven 12 Août 2016 à 15:16
-- Version du serveur :  5.6.15-log
-- Version de PHP :  5.4.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données :  `bd_salon_coif`
--

-- --------------------------------------------------------

--
-- Structure de la table `achete`
--

CREATE TABLE IF NOT EXISTS `achete` (
  `id_rdv` int(11) NOT NULL,
  `num_prodt` int(11) NOT NULL,
  `qte` int(11) DEFAULT NULL,
  `pu` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_rdv`,`num_prodt`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Contenu de la table `achete`
--

INSERT INTO `achete` (`id_rdv`, `num_prodt`, `qte`, `pu`) VALUES
(49, 5, 12, 5500),
(49, 9, 10, 2000),
(50, 5, 12, 5000),
(50, 1, 10, 2000),
(50, 7, 7, 7000);

-- --------------------------------------------------------

--
-- Structure de la table `avoir`
--

CREATE TABLE IF NOT EXISTS `avoir` (
  `id_rdv` int(11) NOT NULL,
  `id_service` int(11) NOT NULL,
  `prix_service` int(11) DEFAULT NULL,
  `type_payement` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id_rdv`,`id_service`),
  KEY `id_rdv` (`id_rdv`),
  KEY `id_service` (`id_service`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Contenu de la table `avoir`
--

INSERT INTO `avoir` (`id_rdv`, `id_service`, `prix_service`, `type_payement`) VALUES
(48, 3, NULL, 'Par ChÃ¨que'),
(49, 5, NULL, 'Mobile Money'),
(49, 4, NULL, 'Mobile Money'),
(50, 5, NULL, 'Mobile Money'),
(50, 2, NULL, 'Mobile Money'),
(50, 4, NULL, 'Mobile Money');

-- --------------------------------------------------------

--
-- Structure de la table `client`
--

CREATE TABLE IF NOT EXISTS `client` (
  `num_clt` int(7) NOT NULL AUTO_INCREMENT,
  `nom_clt` varchar(75) DEFAULT NULL,
  `prenom_clt` varchar(100) DEFAULT NULL,
  `tel1_clt` varchar(15) DEFAULT NULL,
  `tel2_clt` varchar(15) DEFAULT NULL,
  `adress_clt` varchar(150) DEFAULT NULL,
  `civilite_clt` text,
  `email_clt` varchar(100) DEFAULT NULL,
  `fct_clt` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`num_clt`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=23 ;

--
-- Contenu de la table `client`
--

INSERT INTO `client` (`num_clt`, `nom_clt`, `prenom_clt`, `tel1_clt`, `tel2_clt`, `adress_clt`, `civilite_clt`, `email_clt`, `fct_clt`) VALUES
(1, 'kouao', 'kouao', '12345678', '87654321', 'rue12', 'Mr', 'claudekouao10@gmail.com', 'etudiant'),
(2, 'kouakou', 'kouakou', '74185296', '36985214', 'rue14', 'Mr', 'kouakou@gmail.com', 'etudiant'),
(18, 'Fofie', 'Kalakala', '11447788', '68', '874455', 'Mlle', 'hyug', 'Commeçante'),
(17, 'Ibaka', 'Soloko', '55223366', '44778899', 'rue des jardains', 'Mr', 'soloko@gmail.com', 'etudiant'),
(16, 'Zouzou', 'Zaza', '11442589', '31918171', 'rue 43', 'Mme', 'zouzouzaza@gmail.com', 'etudiante'),
(15, 'bolo', 'dodo', '82739145', '83917564', 'avenue14', 'Mr', 'dodo@gmail.com', 'etudiant'),
(14, 'diplo', 'diallo', '11445522', '22558899', 'rue25', 'Mlle', 'diplo@gmail.com', 'etudiante'),
(20, 'fy6r76', 'gyuhkuo', '2214488', '55223369', '9y98yiy8o', 'Mme', '87yi9yuo', 'song'),
(22, 'sdrtdhfh', 'gfutilyl11225588', '11225588', '2225587', 'hk,hkyitgujyfu', 'Mme', 'iyiyihik', 'ye54rhugkig');

-- --------------------------------------------------------

--
-- Structure de la table `concerne`
--

CREATE TABLE IF NOT EXISTS `concerne` (
  `id_depense` int(7) NOT NULL,
  `num_prodt` int(7) NOT NULL,
  `qte` int(5) DEFAULT NULL,
  `date_achat` date DEFAULT NULL,
  `pu` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_depense`,`num_prodt`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Contenu de la table `concerne`
--

INSERT INTO `concerne` (`id_depense`, `num_prodt`, `qte`, `date_achat`, `pu`) VALUES
(16, 6, 11, NULL, 2000),
(16, 9, 10, NULL, 1500),
(23, 9, 12, NULL, 2000),
(23, 5, 10, NULL, 1500),
(23, 6, 8, NULL, 7000),
(23, 1, 2, NULL, 2000),
(23, 8, 1, NULL, 2000);

-- --------------------------------------------------------

--
-- Structure de la table `depense`
--

CREATE TABLE IF NOT EXISTS `depense` (
  `id_depense` int(7) NOT NULL AUTO_INCREMENT,
  `id_type_depense` varchar(7) DEFAULT NULL,
  `dates_depense` date DEFAULT NULL,
  `caissier` varchar(50) DEFAULT NULL,
  `receveur` varchar(50) DEFAULT NULL,
  `montant` int(11) DEFAULT NULL,
  `commentaire` varchar(500) DEFAULT NULL,
  `periode` varchar(50) DEFAULT NULL,
  `nature` int(11) NOT NULL,
  PRIMARY KEY (`id_depense`),
  KEY `id_type_depense` (`id_type_depense`),
  KEY `id_type_depense_2` (`id_type_depense`),
  KEY `id_type_depense_3` (`id_type_depense`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=24 ;

--
-- Contenu de la table `depense`
--

INSERT INTO `depense` (`id_depense`, `id_type_depense`, `dates_depense`, `caissier`, `receveur`, `montant`, `commentaire`, `periode`, `nature`) VALUES
(7, '6', '2016-05-25', '3', '6', 50000, 'Salaire du mois', '2016-07-12', 2),
(8, '6', '2016-05-25', '3', '4', 40000, 'Prime', '2016-08-18', 2),
(21, '6', '2016-08-11', '3', '4', 50000, 'Salaire retard', '2016-06-09', 2),
(13, '6', '2016-08-17', '3', '5', 12000, 'Salaire du mois', '2016-07-06', 2),
(14, '6', '2016-08-17', '3', '5', 250000, 'Salaire du mois', '2016-07-05', 2),
(20, '6', '2016-08-12', '3', '3', 15000, 'Salaire du mois', '2016-07-14', 2),
(22, '9', '2016-08-11', '3', NULL, 3000, 'Communication', '2016-08-12', 3),
(23, '3', '2016-08-11', '3', NULL, NULL, NULL, NULL, 1);

-- --------------------------------------------------------

--
-- Structure de la table `depense_materiel`
--

CREATE TABLE IF NOT EXISTS `depense_materiel` (
  `num_fourn` int(7) NOT NULL,
  `num_person` int(7) NOT NULL,
  `id_type_depense` int(7) NOT NULL,
  `date` date DEFAULT NULL,
  `num_prodt` int(7) DEFAULT NULL,
  `qte` int(6) DEFAULT NULL,
  `pu` int(6) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Contenu de la table `depense_materiel`
--

INSERT INTO `depense_materiel` (`num_fourn`, `num_person`, `id_type_depense`, `date`, `num_prodt`, `qte`, `pu`) VALUES
(6, 3, 7, '2016-06-14', 0, 2, 2000),
(1, 5, 4, '2016-06-30', 5, 1, 2000);

-- --------------------------------------------------------

--
-- Structure de la table `fournisseur`
--

CREATE TABLE IF NOT EXISTS `fournisseur` (
  `num_fourn` int(7) NOT NULL AUTO_INCREMENT,
  `nom_fourn` varchar(75) DEFAULT NULL,
  `prenom_fourn` varchar(75) DEFAULT NULL,
  `email_fourn` varchar(100) DEFAULT NULL,
  `tel1_fourn` varchar(15) DEFAULT NULL,
  `tel2_fourn` varchar(15) DEFAULT NULL,
  `adress_fourn` varchar(150) DEFAULT NULL,
  PRIMARY KEY (`num_fourn`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Contenu de la table `fournisseur`
--

INSERT INTO `fournisseur` (`num_fourn`, `nom_fourn`, `prenom_fourn`, `email_fourn`, `tel1_fourn`, `tel2_fourn`, `adress_fourn`) VALUES
(1, 'dibi jo', 'dodo', 'dododibi@gmail.com', '85698745', '32145632', 'rue12 avenue1'),
(3, 'koloko', 'kalakala', 'kalakala@gmail.com', '77889966', '65896654', 'rue kalakala'),
(5, 'Laloli', 'Lee', 'laloli@gmail.com', '22114455', '55225544', 'rue12'),
(6, 'Balagada', 'Blablabla', 'balagada@gmail.com', '33225566', '22114455', 'avenue21');

-- --------------------------------------------------------

--
-- Structure de la table `personnel`
--

CREATE TABLE IF NOT EXISTS `personnel` (
  `num_person` int(15) NOT NULL AUTO_INCREMENT,
  `nom_person` varchar(75) DEFAULT NULL,
  `prenom_person` varchar(100) DEFAULT NULL,
  `tel1_person` varchar(15) DEFAULT NULL,
  `tel2_person` varchar(15) DEFAULT NULL,
  `adress_person` varchar(150) DEFAULT NULL,
  `salaire_person` int(10) DEFAULT NULL,
  `civilite_person` text,
  PRIMARY KEY (`num_person`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Contenu de la table `personnel`
--

INSERT INTO `personnel` (`num_person`, `nom_person`, `prenom_person`, `tel1_person`, `tel2_person`, `adress_person`, `salaire_person`, `civilite_person`) VALUES
(3, 'koffi', 'kouakou konan', '12366654', '77887744', 'rue des jardins', 15000, 'Mr'),
(4, 'koudou', 'koko', '44556655', '65889966', 'rue 23', 40000, 'Mlle'),
(5, 'Miey', 'lala', '55447744', '22114411', 'mialala@gmail.c', 50000, 'Mlle'),
(6, 'Touré', 'Jean Mark', '66554411', '55889966', 'BP 45 Abidjan 45', 20000, 'Mr');

-- --------------------------------------------------------

--
-- Structure de la table `produit`
--

CREATE TABLE IF NOT EXISTS `produit` (
  `num_prodt` int(7) NOT NULL AUTO_INCREMENT,
  `id_type_prodt` varchar(7) CHARACTER SET latin1 COLLATE latin1_bin DEFAULT NULL,
  `num_fourn` varchar(7) DEFAULT NULL,
  `designation` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`num_prodt`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Contenu de la table `produit`
--

INSERT INTO `produit` (`num_prodt`, `id_type_prodt`, `num_fourn`, `designation`) VALUES
(1, '2', '3', 'Epingles'),
(9, '3', '7', 'Casques'),
(5, '24', '6', 'Champoing'),
(6, '5', '1', 'Demelants'),
(7, '6', '6', 'Liquide Chaud'),
(8, '6', '6', 'Liquide Gluant');

-- --------------------------------------------------------

--
-- Structure de la table `rendez_vous`
--

CREATE TABLE IF NOT EXISTS `rendez_vous` (
  `id_rdv` int(11) NOT NULL AUTO_INCREMENT,
  `date_rdv` date DEFAULT NULL,
  `num_clt` int(11) DEFAULT NULL,
  `num_person` int(11) DEFAULT NULL,
  `date_exe` date DEFAULT NULL,
  `caissiere` varchar(50) DEFAULT NULL,
  `etat_rdv` tinyint(1) NOT NULL,
  PRIMARY KEY (`id_rdv`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=51 ;

--
-- Contenu de la table `rendez_vous`
--

INSERT INTO `rendez_vous` (`id_rdv`, `date_rdv`, `num_clt`, `num_person`, `date_exe`, `caissiere`, `etat_rdv`) VALUES
(49, '2016-08-10', 20, 4, '2016-08-17', '6', 1),
(50, '2016-08-10', 20, 6, '2016-08-08', '4', 0);

-- --------------------------------------------------------

--
-- Structure de la table `service`
--

CREATE TABLE IF NOT EXISTS `service` (
  `id_service` int(7) NOT NULL AUTO_INCREMENT,
  `type_service` varchar(150) DEFAULT NULL,
  `prix_service` int(10) DEFAULT NULL,
  `prime_service` int(10) DEFAULT NULL,
  PRIMARY KEY (`id_service`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Contenu de la table `service`
--

INSERT INTO `service` (`id_service`, `type_service`, `prix_service`, `prime_service`) VALUES
(2, 'Coiffure Afro', 7500, 1000),
(3, 'Coiffure Simple', 4500, 500),
(4, 'Coiffure avec Wave', 7000, 1000),
(5, 'Coiffure Africaine', 8000, 1000),
(6, 'Coiffure Afro Americaine', 8000, 1500);

-- --------------------------------------------------------

--
-- Structure de la table `type_depense`
--

CREATE TABLE IF NOT EXISTS `type_depense` (
  `id_type_depense` int(7) NOT NULL AUTO_INCREMENT,
  `libelle` varchar(100) DEFAULT NULL,
  `achat_prodt` int(50) DEFAULT NULL,
  `loyer` varchar(50) DEFAULT NULL,
  `salaire` int(10) DEFAULT NULL,
  `facture` int(10) DEFAULT NULL,
  `id_type_prodt` varchar(7) CHARACTER SET latin1 COLLATE latin1_bin DEFAULT NULL,
  `societe` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id_type_depense`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Contenu de la table `type_depense`
--

INSERT INTO `type_depense` (`id_type_depense`, `libelle`, `achat_prodt`, `loyer`, `salaire`, `facture`, `id_type_prodt`, `societe`) VALUES
(3, 'Achat Produit', 10, '75000', 0, 50000, '2', ''),
(4, 'Achat Equipement', 2, '5', 15200, 555555, '3', ''),
(5, 'LOYER', 12, '15000', 1500, 5500, '6', ''),
(6, 'SALAIRE', 24, '55550', 55000, 25000, '3', ''),
(7, 'Facture MTN', 15, '5', 55, 555, '5', ''),
(8, 'Facture MOOV', NULL, NULL, NULL, NULL, '', ''),
(9, 'Facture ORANGE', NULL, NULL, NULL, NULL, '', NULL),
(10, 'Facture CIE', NULL, NULL, NULL, NULL, NULL, NULL),
(11, 'Facture SODECI', NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `type_produit`
--

CREATE TABLE IF NOT EXISTS `type_produit` (
  `id_type_prodt` int(7) NOT NULL AUTO_INCREMENT,
  `libelle` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id_type_prodt`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Contenu de la table `type_produit`
--

INSERT INTO `type_produit` (`id_type_prodt`, `libelle`) VALUES
(2, 'huile'),
(3, 'beurre de carite'),
(4, 'demelant'),
(5, 'gftfnjgkhk');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
