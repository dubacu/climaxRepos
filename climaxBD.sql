-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost
-- Généré le : lun. 16 août 2021 à 18:00
-- Version du serveur :  5.7.34-0ubuntu0.18.04.1
-- Version de PHP : 7.4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `climaxBD`
--

-- --------------------------------------------------------

--
-- Structure de la table `customer_data`
--

CREATE TABLE `customer_data` (
  `id_customer` int(11) NOT NULL,
  `customer_firstname` varchar(100) NOT NULL,
  `customer_lastname` varchar(200) NOT NULL,
  `customer_age` int(11) NOT NULL,
  `customer_profession` varchar(100) NOT NULL,
  `customer_salary` int(11) NOT NULL,
  `date_creation` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `customer_data`
--

INSERT INTO `customer_data` (`id_customer`, `customer_firstname`, `customer_lastname`, `customer_age`, `customer_profession`, `customer_salary`, `date_creation`) VALUES
(16, 'Zous', 'Adrien', 25, 'informaticien', 35, '2021-08-09 04:20:40'),
(18, 'Ducroc', 'Mathilde', 32, 'informaticien', 38, '2021-08-09 04:55:36'),
(19, 'Joy', 'Bruno', 29, 'comptable', 33, '2021-08-09 04:56:39'),
(20, 'Basr', 'Julien', 43, 'policier', 24, '2021-08-09 04:57:50'),
(21, 'Bouaz', 'Teff', 52, 'boulanger', 45, '2021-08-09 04:58:43'),
(22, 'Leroy', 'Ben', 48, 'comptable', 26, '2021-08-09 04:59:25'),
(23, 'Beroy', 'Celine', 28, 'comptable', 37, '2021-08-09 05:00:08');

-- --------------------------------------------------------

--
-- Structure de la table `user_data`
--

CREATE TABLE `user_data` (
  `id_user` int(11) NOT NULL,
  `user_token` varchar(200) NOT NULL,
  `user_firstname` varchar(100) CHARACTER SET utf8 NOT NULL,
  `user_lastname` varchar(100) CHARACTER SET utf8 NOT NULL,
  `user_email` varchar(150) NOT NULL,
  `user_passwd` varchar(255) NOT NULL,
  `user_profile` varchar(10) NOT NULL,
  `activated` int(11) NOT NULL,
  `date_creation` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `user_data`
--

INSERT INTO `user_data` (`id_user`, `user_token`, `user_firstname`, `user_lastname`, `user_email`, `user_passwd`, `user_profile`, `activated`, `date_creation`) VALUES
(11, '60ff784749f5a', 'Zoura', 'majead', 'zoure@gmail.com', '$2y$10$2NHYtAkGwzvihf8cJk2wruMmnmm6iZD4Y97qDZvMLxqsRpFrrveZ6', 'USER', 1, '2021-07-27 05:06:47'),
(16, '61194ae41a279', 'Cabore', 'kevin', 'kevinkabor@gmail.com', '$2y$10$LAG0/ilTWmKSb8sezBLhz.c6CZvzgP/nl3UjotqZJnmFAIQfOdzIu', 'ADMIN', 1, '2021-08-15 19:12:04');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `customer_data`
--
ALTER TABLE `customer_data`
  ADD PRIMARY KEY (`id_customer`);

--
-- Index pour la table `user_data`
--
ALTER TABLE `user_data`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `customer_data`
--
ALTER TABLE `customer_data`
  MODIFY `id_customer` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT pour la table `user_data`
--
ALTER TABLE `user_data`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
