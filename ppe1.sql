-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le :  mer. 14 août 2019 à 12:51
-- Version du serveur :  10.1.37-MariaDB
-- Version de PHP :  7.3.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `ppe1`
--

-- --------------------------------------------------------

--
-- Structure de la table `ligues`
--

CREATE TABLE `ligues` (
  `id_ligue` int(11) NOT NULL,
  `nom_ligue` varchar(50) NOT NULL,
  `abreviation` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `ligues`
--

INSERT INTO `ligues` (`id_ligue`, `nom_ligue`, `abreviation`) VALUES
(1, 'Administration', 'ADM'),
(2, 'Fédération Francaise de Football', 'FFF'),
(3, 'Fédération Française de Basket', 'FFB');

-- --------------------------------------------------------

--
-- Structure de la table `reservations`
--

CREATE TABLE `reservations` (
  `id_resa` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `titre` varchar(50) NOT NULL,
  `nb_personnes` int(11) NOT NULL,
  `start` datetime NOT NULL,
  `end` datetime NOT NULL,
  `id_salle` int(11) NOT NULL,
  `description` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `reservations`
--

INSERT INTO `reservations` (`id_resa`, `id_user`, `titre`, `nb_personnes`, `start`, `end`, `id_salle`, `description`) VALUES
(1, 1, 'Exemple de titre TEST', 1, '2019-07-11 17:00:00', '2019-07-11 18:00:00', 2, 'Discours royal devant mes fidèles sujets.');

-- --------------------------------------------------------

--
-- Structure de la table `salles`
--

CREATE TABLE `salles` (
  `id_salle` int(11) NOT NULL,
  `nom_salle` varchar(50) NOT NULL,
  `nb_places` int(11) NOT NULL,
  `dispo_salle` tinyint(1) NOT NULL,
  `informatisee` tinyint(1) NOT NULL,
  `bloquee` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `salles`
--

INSERT INTO `salles` (`id_salle`, `nom_salle`, `nb_places`, `dispo_salle`, `informatisee`, `bloquee`) VALUES
(1, 'Winterfell', 20, 0, 1, 0),
(2, 'Port-Real', 500, 0, 0, 0);

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id_user` int(11) NOT NULL,
  `nom_user` varchar(50) NOT NULL,
  `pnom_user` varchar(50) NOT NULL,
  `mail` varchar(50) NOT NULL,
  `tel` int(11) NOT NULL,
  `role` tinyint(1) NOT NULL,
  `login` varchar(32) NOT NULL,
  `mdp` varchar(16) NOT NULL,
  `id_ligue` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id_user`, `nom_user`, `pnom_user`, `mail`, `tel`, `role`, `login`, `mdp`, `id_ligue`) VALUES
(1, 'Baisnee', 'Virgile', 'zavickb@gmail.com', 678467196, 1, 'root', 'root', 1),
(2, 'Roulland', 'Damien', 'd.roulland@gmail.com', 611475158, 0, 'd.roulland', 'd.roulland', 1),
(3, '', '', '', 6, 0, '', '', 1),
(4, '', '', '', 646, 0, '', '', 1);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `ligues`
--
ALTER TABLE `ligues`
  ADD PRIMARY KEY (`id_ligue`);

--
-- Index pour la table `reservations`
--
ALTER TABLE `reservations`
  ADD PRIMARY KEY (`id_resa`),
  ADD KEY `res_id_salle_fk` (`id_salle`),
  ADD KEY `id_user_res_fk` (`id_user`);

--
-- Index pour la table `salles`
--
ALTER TABLE `salles`
  ADD PRIMARY KEY (`id_salle`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`),
  ADD KEY `user_ligue_lien_fk` (`id_ligue`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `ligues`
--
ALTER TABLE `ligues`
  MODIFY `id_ligue` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `reservations`
--
ALTER TABLE `reservations`
  MODIFY `id_resa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `salles`
--
ALTER TABLE `salles`
  MODIFY `id_salle` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `reservations`
--
ALTER TABLE `reservations`
  ADD CONSTRAINT `id_user_res_fk` FOREIGN KEY (`id_user`) REFERENCES `users` (`id_user`),
  ADD CONSTRAINT `res_id_salle_fk` FOREIGN KEY (`id_salle`) REFERENCES `salles` (`id_salle`);

--
-- Contraintes pour la table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `user_ligue_lien_fk` FOREIGN KEY (`id_ligue`) REFERENCES `ligues` (`id_ligue`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
