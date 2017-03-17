-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Client :  127.0.0.1
-- Généré le :  Ven 17 Mars 2017 à 23:13
-- Version du serveur :  5.7.14
-- Version de PHP :  5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `facture`
--

-- --------------------------------------------------------

--
-- Structure de la table `client`
--

CREATE TABLE `client` (
  `N_Client` int(11) NOT NULL,
  `NomClient` varchar(255) NOT NULL,
  `PrenomClient` varchar(255) NOT NULL,
  `AdresseClient` varchar(255) NOT NULL,
  `Cp` varchar(255) NOT NULL,
  `VilleClient` varchar(255) NOT NULL,
  `PaysClient` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `client`
--

INSERT INTO `client` (`N_Client`, `NomClient`, `PrenomClient`, `AdresseClient`, `Cp`, `VilleClient`, `PaysClient`) VALUES
(2, 'megaman', 'zoro', 'bala', 'zds', '', 'France'),
(127, 'sutterlin', 'sebastien', 'otter', '45211', 'issou', 'France'),
(128, 'lqrknezlkn', 'jkbkhvj', 'kjbkjb', 'jkbhh', 'kjbjkb', 'kjbjkbk'),
(131, '', '', '', '', 'Beta', 'iuk'),
(132, 'ojizj', 'yguj', 'ygfft', 'ugyyuj', 'jgyfyyf', 'jyfjyg'),
(133, 'ojizj', 'yguj', 'ygfft', 'ugyyuj', 'jgyfyyf', 'jyfjyg');

-- --------------------------------------------------------

--
-- Structure de la table `detail`
--

CREATE TABLE `detail` (
  `Quantité` int(11) NOT NULL,
  `N_facture` int(11) NOT NULL,
  `N_produit` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `detail`
--

INSERT INTO `detail` (`Quantité`, `N_facture`, `N_produit`) VALUES
(10, 150, 227);

-- --------------------------------------------------------

--
-- Structure de la table `facture`
--

CREATE TABLE `facture` (
  `N_facture` int(11) NOT NULL,
  `date` date NOT NULL,
  `N_Client` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `facture`
--

INSERT INTO `facture` (`N_facture`, `date`, `N_Client`) VALUES
(150, '2017-01-12', 127);

-- --------------------------------------------------------

--
-- Structure de la table `produit`
--

CREATE TABLE `produit` (
  `N_produit` int(11) NOT NULL,
  `libellé` varchar(255) NOT NULL,
  `PU` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `produit`
--

INSERT INTO `produit` (`N_produit`, `libellé`, `PU`) VALUES
(227, 'issou', 50);

-- --------------------------------------------------------

--
-- Structure de la table `utilisateurs`
--

CREATE TABLE `utilisateurs` (
  `Pseudo` varchar(30) NOT NULL,
  `MDP` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `utilisateurs`
--

INSERT INTO `utilisateurs` (`Pseudo`, `MDP`) VALUES
('Blubo', '$2y$10$MDvIDjrgEKBZjUVB3tsRseOafSB0zBf1Xq4xKbneY64tvIZFGcUti'),
('Dibz', '$2y$10$j0CXve/FkJLYGjEherU6Kekio/ZJw2hQibHZsu94lDM8UBe2L22M2'),
('Fire', 'Charizard'),
('Hedgeon', 'Sonic'),
('lolz', '$2y$10$.Fff3.rzGJEcgJswsp7l4u/zC8AqshaRCIX31Ha/QKXhhbDmv8O1O'),
('ludus', 'ludus'),
('Mashallah', '$2y$10$BIvKLPKsIBtkNaRStH7MfeXfGwDc9.psjuJJCoev1jEDZcK4WUtDu'),
('Yosheroce', 'Yoshi');

--
-- Index pour les tables exportées
--

--
-- Index pour la table `client`
--
ALTER TABLE `client`
  ADD PRIMARY KEY (`N_Client`);

--
-- Index pour la table `detail`
--
ALTER TABLE `detail`
  ADD PRIMARY KEY (`N_facture`,`N_produit`),
  ADD KEY `N_facture` (`N_facture`),
  ADD KEY `N_produit` (`N_produit`);

--
-- Index pour la table `facture`
--
ALTER TABLE `facture`
  ADD PRIMARY KEY (`N_facture`),
  ADD KEY `N_Client` (`N_Client`);

--
-- Index pour la table `produit`
--
ALTER TABLE `produit`
  ADD PRIMARY KEY (`N_produit`);

--
-- Index pour la table `utilisateurs`
--
ALTER TABLE `utilisateurs`
  ADD PRIMARY KEY (`Pseudo`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `client`
--
ALTER TABLE `client`
  MODIFY `N_Client` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=134;
--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `detail`
--
ALTER TABLE `detail`
  ADD CONSTRAINT `detail_ibfk_1` FOREIGN KEY (`N_produit`) REFERENCES `produit` (`N_produit`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `detail_ibfk_2` FOREIGN KEY (`N_facture`) REFERENCES `facture` (`N_facture`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `facture`
--
ALTER TABLE `facture`
  ADD CONSTRAINT `facture_ibfk_1` FOREIGN KEY (`N_Client`) REFERENCES `client` (`N_Client`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
