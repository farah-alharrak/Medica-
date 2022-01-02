-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : dim. 02 jan. 2022 à 20:35
-- Version du serveur : 10.4.20-MariaDB
-- Version de PHP : 7.3.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `medica`
--

-- --------------------------------------------------------

--
-- Structure de la table `fichepatient`
--

CREATE TABLE `fichepatient` (
  `id` int(11) NOT NULL,
  `nom` varchar(50) NOT NULL,
  `prenom` varchar(50) NOT NULL,
  `date_naissance` date NOT NULL,
  `CIN` varchar(50) NOT NULL,
  `numtelephone` varchar(50) NOT NULL,
  `assurance` varchar(50) NOT NULL,
  `sexe` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `adresse` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `fichepatient`
--

INSERT INTO `fichepatient` (`id`, `nom`, `prenom`, `date_naissance`, `CIN`, `numtelephone`, `assurance`, `sexe`, `email`, `adresse`) VALUES
(2, 'bammou', 'haytham', '2021-12-08', 'CD269158', '0636651463', 'oui', 'male', 'Haythambm86@gmail.com', 'fes narjiss'),
(5, 'al harrak', 'farah', '2000-01-08', 'LA163986', '0676645236', 'non', 'male', 'farah@gmail.com', 'larach');

-- --------------------------------------------------------

--
-- Structure de la table `rdv`
--

CREATE TABLE `rdv` (
  `id` int(11) NOT NULL,
  `nom_patient` varchar(127) NOT NULL,
  `date_debut` datetime NOT NULL,
  `date_fin` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `rdv`
--

INSERT INTO `rdv` (`id`, `nom_patient`, `date_debut`, `date_fin`) VALUES
(1, 'test', '2021-12-23 00:00:00', '2021-12-24 00:00:00'),
(7, 'haytham', '2022-01-04 00:00:00', '2022-01-05 00:00:00'),
(8, 'haytham mrid ', '2022-01-10 00:00:00', '2022-01-11 00:00:00');

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur`
--

CREATE TABLE `utilisateur` (
  `id` int(11) NOT NULL,
  `username` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `role` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `utilisateur`
--

INSERT INTO `utilisateur` (`id`, `username`, `password`, `role`) VALUES
(1, 'secretaire', '$2y$10$9Z5Np9sSERtKpBjgcEyGau5Q/72VHgZU9/OOiWuVIuySfPn2XlOlS', 'secretaire'),
(3, 'medecin', '$2y$10$idnR9tHI5jXvOMdYRgYr1O4tmMVtk7uZyIVbkg2ms.ObV8qcOBrN6', 'medecin');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `fichepatient`
--
ALTER TABLE `fichepatient`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `rdv`
--
ALTER TABLE `rdv`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `login` (`username`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `fichepatient`
--
ALTER TABLE `fichepatient`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pour la table `rdv`
--
ALTER TABLE `rdv`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
