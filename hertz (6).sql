-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  mer. 04 nov. 2020 à 13:31
-- Version du serveur :  10.4.10-MariaDB
-- Version de PHP :  7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `hertz`
--

-- --------------------------------------------------------

--
-- Structure de la table `clients`
--

DROP TABLE IF EXISTS `clients`;
CREATE TABLE IF NOT EXISTS `clients` (
  `id_client_clients` bigint(255) NOT NULL AUTO_INCREMENT,
  `nom_clients` varchar(255) DEFAULT NULL,
  `prenom_clients` varchar(255) DEFAULT NULL,
  `adresse_clients` varchar(255) DEFAULT NULL,
  `cp_clients` bigint(255) DEFAULT NULL,
  `ville_clients` varchar(255) DEFAULT NULL,
  `mail_clients` varchar(100) NOT NULL,
  `password_clients` varchar(100) NOT NULL,
  `ip_clients` varchar(255) NOT NULL,
  PRIMARY KEY (`id_client_clients`)
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `clients`
--

INSERT INTO `clients` (`id_client_clients`, `nom_clients`, `prenom_clients`, `adresse_clients`, `cp_clients`, `ville_clients`, `mail_clients`, `password_clients`, `ip_clients`) VALUES
(21, 'dauchy', 'loic', '10 rue des moutoux', 39300, 'cize', 'dauchyl39@gmail.com', '15e2b0d3c33891ebb0f1ef609ec419420c20e320ce94c65fbc8c3312448eb225', '::1'),
(22, 'dauchy', 'sarah', '10 boulevard du gÃ©nÃ©ral leclerc', 39000, 'Lons-le-saunier', 'dauchys@free.fr', '15e2b0d3c33891ebb0f1ef609ec419420c20e320ce94c65fbc8c3312448eb225', '::1'),
(23, 'dauchy', 'loicdzf', '10 rue rufezdze', 39050, 'lons', 'grfzefzf@fezfe.fr', '15e2b0d3c33891ebb0f1ef609ec419420c20e320ce94c65fbc8c3312448eb225', '::1'),
(27, 'dauchy', 'loic', '10 boulevard du gÃ©nÃ©ral leclerc', 39000, 'Lons-le-saunier', 'gezgzeg@grzgz.fr', '15e2b0d3c33891ebb0f1ef609ec419420c20e320ce94c65fbc8c3312448eb225', '::1'),
(28, 'oui', 'ouioui', 'ouiouiouioui', 123456, 'ouiouiouiouioui', 'ouioui@ouioui.oui', '15e2b0d3c33891ebb0f1ef609ec419420c20e320ce94c65fbc8c3312448eb225', '::1');

-- --------------------------------------------------------

--
-- Structure de la table `louer`
--

DROP TABLE IF EXISTS `louer`;
CREATE TABLE IF NOT EXISTS `louer` (
  `id_car_vehicules` bigint(255) NOT NULL AUTO_INCREMENT,
  `id_client_clients` bigint(255) NOT NULL,
  `date_louer` date NOT NULL,
  `date_fin` date NOT NULL,
  `enLoc` tinyint(1) NOT NULL,
  PRIMARY KEY (`id_car_vehicules`,`id_client_clients`),
  KEY `FK_location_id_client_clients` (`id_client_clients`)
) ENGINE=InnoDB AUTO_INCREMENT=50 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `louer`
--

INSERT INTO `louer` (`id_car_vehicules`, `id_client_clients`, `date_louer`, `date_fin`, `enLoc`) VALUES
(44, 21, '2020-11-19', '2020-12-06', 1),
(47, 27, '2020-10-26', '2020-10-31', 2);

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`id`, `email`, `password`) VALUES
(2, 'l.dauchy@codeur.online', '$2y$10$.z0YcrPd4aQ6Lxvji/G35ufeZMtWfX6w2QFNqGHbEQ7z42hjdwQzG'),
(4, 'dauchyl39@gmail.com', '$2y$10$q1e6vpYAy30HCmz7tQDWKOBI89ViJEG61AMYhjl6Tl3UfuimFtLpO'),
(5, '', '$2y$10$ERb8hrAa4INcIVrWOV/I6Oxaf7GupdFtMn4kVcrOPmf5MHrYLMCzC');

-- --------------------------------------------------------

--
-- Structure de la table `vehicules`
--

DROP TABLE IF EXISTS `vehicules`;
CREATE TABLE IF NOT EXISTS `vehicules` (
  `id_car_vehicules` bigint(255) NOT NULL AUTO_INCREMENT,
  `marque_vehicules` varchar(255) DEFAULT NULL,
  `modele_vehicules` varchar(255) DEFAULT NULL,
  `annees_vehicules` date DEFAULT NULL,
  `kilometrage_vehicules` bigint(255) DEFAULT NULL,
  PRIMARY KEY (`id_car_vehicules`)
) ENGINE=InnoDB AUTO_INCREMENT=53 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `vehicules`
--

INSERT INTO `vehicules` (`id_car_vehicules`, `marque_vehicules`, `modele_vehicules`, `annees_vehicules`, `kilometrage_vehicules`) VALUES
(39, 'peugeot', '508', '2020-10-13', 54000),
(44, 'ford', 'kangoo', '2020-11-02', 54000),
(45, 'renault', 'mustang', '2020-11-11', 54000),
(46, 'renault', 'yaris', '2020-11-11', 20000),
(47, 'toyota', '508', '2020-11-12', 20000),
(49, 'toyota', '508', '2020-11-12', 20000),
(52, 'toyota', '508', '2020-11-06', 153000);

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `louer`
--
ALTER TABLE `louer`
  ADD CONSTRAINT `FK_location_id_car_vehicules` FOREIGN KEY (`id_car_vehicules`) REFERENCES `vehicules` (`id_car_vehicules`),
  ADD CONSTRAINT `FK_location_id_client_clients` FOREIGN KEY (`id_client_clients`) REFERENCES `clients` (`id_client_clients`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
