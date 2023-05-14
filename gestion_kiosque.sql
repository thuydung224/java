-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3308
-- Generation Time: Mar 24, 2023 at 09:55 AM
-- Server version: 8.0.31
-- PHP Version: 8.0.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `gestion_kiosque`
--

-- --------------------------------------------------------

--
-- Table structure for table `article`
--

DROP TABLE IF EXISTS `article`;
CREATE TABLE IF NOT EXISTS `article` (
  `id_article` smallint NOT NULL,
  `nom_article` varchar(30) NOT NULL,
  `parution` date NOT NULL,
  `stock` int NOT NULL,
  `prix_achat_HT` decimal(6,2) NOT NULL,
  `prix_vente_HT` decimal(6,2) NOT NULL,
  `libelle` varchar(20) NOT NULL,
  `taux_commission` decimal(5,2) NOT NULL,
  `tva` decimal(4,2) NOT NULL,
  PRIMARY KEY (`id_article`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `article`
--

INSERT INTO `article` (`id_article`, `nom_article`, `parution`, `stock`, `prix_achat_HT`, `prix_vente_HT`, `libelle`, `taux_commission`, `tva`) VALUES
(1, 'Le Figaro', '2023-03-21', 5, '3.20', '3.50', 'Journal quotidien', '20.00', '20.00'),
(1926, 'Dell T7500', '2023-03-01', 100, '90.00', '300.00', 'ecran', '20.00', '20.00'),
(3552, 'Dell 3552', '2023-03-02', 1000, '100.00', '500.00', 'laptop', '20.00', '20.00');

-- --------------------------------------------------------

--
-- Table structure for table `commande`
--

DROP TABLE IF EXISTS `commande`;
CREATE TABLE IF NOT EXISTS `commande` (
  `id_commande` smallint NOT NULL,
  `id_fournisseur` smallint NOT NULL,
  `libelle_commande` varchar(200) NOT NULL,
  `date_commande` date NOT NULL,
  PRIMARY KEY (`id_commande`),
  KEY `fk_fournisseur_commande` (`id_fournisseur`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `commande`
--

INSERT INTO `commande` (`id_commande`, `id_fournisseur`, `libelle_commande`, `date_commande`) VALUES
(1, 0, '1', '2023-03-23'),
(0, 0, '', '0000-00-00'),
(2, 0, 'commande 2', '2023-03-23'),
(20, 0, 'commande 2', '2023-03-23'),
(200, 0, 'commande 2', '2023-03-23'),
(2000, 0, 'commande 2', '2023-03-23'),
(12, 0, 'commande 2', '2023-03-23'),
(123, 0, 'commande 2', '2023-03-23'),
(1234, 0, 'commande 2', '2023-03-23');

-- --------------------------------------------------------

--
-- Table structure for table `facture_achat`
--

DROP TABLE IF EXISTS `facture_achat`;
CREATE TABLE IF NOT EXISTS `facture_achat` (
  `id_facture` smallint NOT NULL,
  `id_commande` smallint NOT NULL,
  `date_facture` date NOT NULL,
  `montant_total_achat` decimal(7,2) NOT NULL,
  `date_acompte` date NOT NULL,
  `montant_acompte` decimal(7,2) NOT NULL,
  PRIMARY KEY (`id_facture`),
  KEY `FK_facture_reglement` (`id_commande`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Table structure for table `fournisseur`
--

DROP TABLE IF EXISTS `fournisseur`;
CREATE TABLE IF NOT EXISTS `fournisseur` (
  `id_fournisseur` smallint NOT NULL,
  `nom_fournisseur` varchar(30) NOT NULL,
  `num_voie` smallint NOT NULL,
  `nom_voie` varchar(20) NOT NULL,
  `code_postal` char(5) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `ville` varchar(20) NOT NULL,
  `email` varchar(25) NOT NULL,
  `telephone` varchar(14) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `pays_fournisseur` varchar(15) NOT NULL,
  `TVA_fournisseur` decimal(4,2) NOT NULL,
  PRIMARY KEY (`id_fournisseur`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `fournisseur`
--

INSERT INTO `fournisseur` (`id_fournisseur`, `nom_fournisseur`, `num_voie`, `nom_voie`, `code_postal`, `ville`, `email`, `telephone`, `pays_fournisseur`, `TVA_fournisseur`) VALUES
(0, 'CCCP', 30, '30', '7500', 'paris', 'gjigjgiji', '5656656', 'france', '0.00'),
(1, '2', 1, '2', '1', '2', '1', '2', '1', '2.00'),
(23, '1', 1, '1', '1', '1', '1', '1', '1', '1.00');

-- --------------------------------------------------------

--
-- Table structure for table `livraison`
--

DROP TABLE IF EXISTS `livraison`;
CREATE TABLE IF NOT EXISTS `livraison` (
  `id_livraison` smallint NOT NULL,
  `id_commande` smallint NOT NULL,
  `date_livraison` date NOT NULL,
  PRIMARY KEY (`id_livraison`),
  KEY `FK_commande_livraison` (`id_commande`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Table structure for table `quantite_commande`
--

DROP TABLE IF EXISTS `quantite_commande`;
CREATE TABLE IF NOT EXISTS `quantite_commande` (
  `id_article` smallint NOT NULL,
  `id_commande` smallint NOT NULL,
  `qte_commande` int NOT NULL,
  KEY `FK_qte_article_commande` (`id_article`),
  KEY `FK_qte_commande` (`id_commande`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `quantite_commande`
--

INSERT INTO `quantite_commande` (`id_article`, `id_commande`, `qte_commande`) VALUES
(1, 1, 1),
(1, 1, 1),
(3552, 0, 30),
(3552, 0, 30),
(3552, 2, 30),
(3552, 2, 30),
(1, 20, 30),
(1, 20, 30),
(3552, 200, 4),
(3552, 200, 4),
(3552, 2000, 34),
(3552, 2000, 34),
(3552, 2000, 34),
(3552, 12, 20),
(3552, 12, 20),
(1, 123, 1),
(1926, 123, 2),
(3552, 123, 4),
(1, 1234, 120),
(1926, 1234, 130),
(3552, 1234, 250);

-- --------------------------------------------------------

--
-- Table structure for table `quantite_livraison`
--

DROP TABLE IF EXISTS `quantite_livraison`;
CREATE TABLE IF NOT EXISTS `quantite_livraison` (
  `id_article` smallint NOT NULL,
  `id_livraison` smallint NOT NULL,
  `qte_livraison` int NOT NULL,
  KEY `FK_qte_article_livaison` (`id_article`),
  KEY `FK_qte_livrasion` (`id_livraison`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Table structure for table `quantite_vente`
--

DROP TABLE IF EXISTS `quantite_vente`;
CREATE TABLE IF NOT EXISTS `quantite_vente` (
  `id_ticket` smallint NOT NULL,
  `id_article` smallint NOT NULL,
  `qte_vente` int NOT NULL,
  KEY `FK_qte_article_vente` (`id_article`),
  KEY `FK_qte_ticket` (`id_ticket`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Table structure for table `reglement_fournisseur`
--

DROP TABLE IF EXISTS `reglement_fournisseur`;
CREATE TABLE IF NOT EXISTS `reglement_fournisseur` (
  `id_reglement` smallint NOT NULL,
  `id_facture` smallint NOT NULL,
  `date_paiement` date NOT NULL,
  `mode_paiement` varchar(20) NOT NULL,
  `montant_reglement` decimal(7,2) NOT NULL,
  PRIMARY KEY (`id_reglement`),
  KEY `FK_facture_reglement` (`id_facture`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Table structure for table `ticket_vente`
--

DROP TABLE IF EXISTS `ticket_vente`;
CREATE TABLE IF NOT EXISTS `ticket_vente` (
  `id_ticket` smallint NOT NULL,
  `date_vente` date NOT NULL,
  PRIMARY KEY (`id_ticket`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
