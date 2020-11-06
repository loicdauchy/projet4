-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  ven. 06 nov. 2020 à 15:03
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
) ENGINE=InnoDB AUTO_INCREMENT=42 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `clients`
--

INSERT INTO `clients` (`id_client_clients`, `nom_clients`, `prenom_clients`, `adresse_clients`, `cp_clients`, `ville_clients`, `mail_clients`, `password_clients`, `ip_clients`) VALUES
(32, 'William', 'Marier', '1, quai Saint-Nicolas', 31500, 'TOULOUSE', 'WilliamMarier@jourrapide.com', 'ec66f504be396fa8d6cd62fca3facbbebfeb79d480ffc6a8642ffbe9db5e8522', '::1'),
(33, 'Grandbois', 'Arianne', '71, place Stanislas', 44000, 'NANTES', 'ArianneGrandbois@armyspy.com', '971a11c5901d0c54ebaba11365192032e102bf60b8420ab0c040f5515796bcc2', '::1'),
(34, 'Gano', ' Cotuand', '6, rue Clement Marot ', 66000, 'PERPIGNAN', 'GanoCotuand@dayrep.com', '7354cffcdef887fd4269e9815b2d9d34cac536c95c4462ce86af28d2bb8d3b9d', '::1'),
(35, 'Fortun ', 'Sabourin', '22, Rue Marie De MÃ©dicis ', 11000, 'CARCASSONNE', 'FortunSabourin@teleworm.us', '00ba6519c6a2b6f6f72c7116c53a3b10b9dfb7b76a2f5d4f6dc6af7a3a4b3887', '::1'),
(36, 'Corette', ' Gauthier', '85, avenue Jules Ferry', 2200, ' SOISSONS', 'CoretteGauthier@jourrapide.com', '6e3e5cb0229a4cdbd383c5dd2be428b83ac98bc162faf7e6d717a0f8bd412bce', '::1'),
(37, 'Amber ', 'Lalonde', '90, rue Cazade ', 93700, ' DRANCY', 'AmberLalonde@jourrapide.com', '8b8eeb2fd4574ecb8ad1e4f09228f866ac3e2849e47571fbc3ff207c166f6474', '::1'),
(38, 'Auda ', 'Petit', '25, rue Grande Fusterie', 62700, 'BRUAY-LA-BUISSIÃˆRE', 'AudaPetit@rhyta.com', '12da6255bbb82bd31f4236af67dff28d0cc0bc8f5ad6a510367b0c665bd1c1e1', '::1'),
(39, 'Creissant ', 'Monjeau', '36, rue Clement Marot ', 33600, 'PESSAC', 'CreissantMonjeau@rhyta.com', '27133b79ec7716ff37868812482d0eb3fd267832498120a4d06a82977093badb', '::1'),
(40, 'Agathe', ' Beauchamp', '62, rue de la RÃ©publique ', 69004, 'LYON', 'AgatheBeauchamp@teleworm.us', '5316b9981fb3d0ae99caeab11a440f72587096e566e1225e66c6b330163f59c9', '::1'),
(41, 'Leroy', 'Merlin', '54, rue Lenotre ', 51100, 'Reims', 'LeroyMerlin@armyspy.com', '7f2e7f9ea04fad1641372dc5ecad21994ebb7c9839bd7c9b2af6d794b1be6e0a', '::1');

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
) ENGINE=InnoDB AUTO_INCREMENT=69 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `louer`
--

INSERT INTO `louer` (`id_car_vehicules`, `id_client_clients`, `date_louer`, `date_fin`, `enLoc`) VALUES
(54, 32, '2020-10-26', '2020-11-30', 2),
(55, 32, '2020-10-26', '2033-10-06', 1),
(56, 33, '2020-10-26', '2020-11-04', 2),
(57, 34, '2025-11-06', '2026-12-06', 1),
(58, 35, '2020-10-26', '2020-11-04', 2),
(59, 36, '2020-10-26', '2020-10-30', 2),
(59, 38, '2020-10-27', '2020-12-04', 1),
(60, 37, '2020-10-26', '2020-11-04', 2),
(61, 38, '2020-10-29', '2020-11-01', 2),
(62, 39, '2020-10-27', '2020-10-31', 2),
(63, 40, '2020-10-28', '2020-11-01', 2),
(64, 41, '2020-10-27', '2020-10-30', 2),
(65, 33, '2020-10-26', '2020-10-27', 2),
(66, 33, '2020-10-28', '2020-10-30', 2),
(67, 34, '2020-10-27', '2020-10-28', 2),
(68, 32, '2020-10-27', '2020-10-28', 1);

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
) ENGINE=InnoDB AUTO_INCREMENT=69 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `vehicules`
--

INSERT INTO `vehicules` (`id_car_vehicules`, `marque_vehicules`, `modele_vehicules`, `annees_vehicules`, `kilometrage_vehicules`) VALUES
(54, 'Mercedes', 'C Class', '2020-11-11', 20000),
(55, 'Fiat', '500', '2020-11-12', 17000),
(56, 'Peugeot', '208', '2020-11-04', 58000),
(57, 'Peugeot', '308', '2020-11-10', 100000),
(58, 'Renault', 'CAPTUR', '2020-11-19', 14000),
(59, 'Peugeot', '3008', '2020-11-30', 200),
(60, 'Audi', 'A1 ', '2020-11-04', 666),
(61, 'Ford', 'focus', '2020-11-21', 741),
(62, 'VW', 'Golf', '2020-11-16', 999),
(63, 'Peugeot', '208', '2020-11-21', 111),
(64, 'Toyota', 'Yaris', '2020-11-22', 6000),
(65, 'hyundai', 'coupÃ© fx', '2020-11-22', 9874),
(66, 'VW', 'Golf', '2020-11-17', 52025),
(67, 'BMW', 'X3', '2020-11-26', 12385),
(68, 'Jaguar', 'F-type', '2020-11-11', 99999);

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
