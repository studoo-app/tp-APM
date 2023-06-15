-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : db
-- Généré le : jeu. 15 juin 2023 à 12:55
-- Version du serveur : 10.5.8-MariaDB-1:10.5.8+maria~focal
-- Version de PHP : 8.1.20

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `app_db`
--
CREATE DATABASE IF NOT EXISTS `app_db` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `app_db`;

-- --------------------------------------------------------

--
-- Structure de la table `donation_promise`
--

DROP TABLE IF EXISTS `promesse_don`;
CREATE TABLE `promesse_don` (
                                    `id` int(11) NOT NULL,
                                    `campaign_id` int(11) NOT NULL,
                                    `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
                                    `firstname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
                                    `lastname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
                                    `amount` int(11) NOT NULL,
                                    `created_at` datetime NOT NULL COMMENT '(DC2Type:datetime_immutable)',
                                    `honored_at` datetime DEFAULT NULL COMMENT '(DC2Type:datetime_immutable)'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `donation_promise`
--
ALTER TABLE `promesse_don`
    ADD PRIMARY KEY (`id`),
    ADD KEY `IDX_B1A0DF20F639F774` (`campaign_id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `donation_promise`
--
ALTER TABLE `donation_promise`
    MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `donation_promise`
--
ALTER TABLE `donation_promise`
    ADD CONSTRAINT `FK_B1A0DF20F639F774` FOREIGN KEY (`campaign_id`) REFERENCES `campaign` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
