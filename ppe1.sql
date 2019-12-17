-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le :  mar. 17 déc. 2019 à 13:49
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

DELIMITER $$
--
-- Procédures
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `resSalle` (IN `debut` DATETIME, IN `fin` DATETIME, IN `info` TINYINT, IN `user` INT, IN `places` INT, IN `titre` VARCHAR(50), IN `description` TEXT)  NO SQL
begin
set @salles = (select id_salle
              from salles
              where bloquee = 0
              and informatisee = info
              and nb_places >= places
              and id_salle not in (select salles.id_salle
                                    from reservations
                                    join salles on reservations.id_salle=salles.id_salle
                                    where
                                    bloquee = 0 
                                    and informatisee = info
                                    and ( debut between start and end and fin between start and end )
                                    or  ( debut < start and fin > end )
                                    or  ( debut < start and fin between start and end )
                                    or  ( debut between start and end and fin > end))
                                    limit 1);
if((@salles is not null) and (debut<fin) and (debut > CURRENT_DATE) ) then
	insert into reservations (titre, start, end, id_user, id_salle, nb_personnes, description)
    values (titre, debut, fin, user, @salles, places, description);
    select 1 AS result;
ELSE
	select 0 AS result;
end if ;
end$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Structure de la table `ligues`
--

CREATE TABLE `ligues` (
  `id_ligue` int(11) NOT NULL,
  `nom_ligue` varchar(50) NOT NULL,
  `abreviation` varchar(10) NOT NULL,
  `bloquee` tinyint(4) NOT NULL DEFAULT '0',
  `contact` int(9) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `ligues`
--

INSERT INTO `ligues` (`id_ligue`, `nom_ligue`, `abreviation`, `bloquee`, `contact`) VALUES
(1, 'Administration', 'ADM', 0, 678467196),
(2, 'Federation FranÃ§aise de Basketball', 'FFBB', 0, 782321102),
(3, 'Federation Francaise de Football', 'FFF', 0, 610210162),
(4, 'Federation Francaise de Badminton', 'FFB', 0, 231659685),
(5, 'Federation Francaise de Cricket ', 'FFC', 0, 236541245),
(6, 'Federation Francaise de Danse Classique', 'FFDC', 0, 678467196),
(7, 'Federation des Bras CassÃ©s', 'FBC', 0, 678467196);

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
(1, 1, 'Exemple de titre TEST', 1, '2019-07-11 17:00:00', '2019-07-11 18:00:00', 2, 'Discours royal devant mes fidèles sujets.'),
(2, 1, 'Discuter avec Madicx', 14, '2019-08-14 14:00:00', '2019-08-14 19:00:00', 2, 'ETST TEST TEST '),
(3, 1, 'Anniversaire Virgile', 14, '2019-12-12 01:00:00', '2019-12-12 23:00:00', 2, 'Gros anniv de malade '),
(4, 1, 'Test 14 informatisÃ©e', 14, '2019-09-01 10:15:00', '2019-09-01 19:20:00', 1, '14 informatisÃ©e'),
(5, 1, 'TESTS', 2, '2019-10-17 17:00:00', '2019-10-17 20:00:00', 1, 'Besoin de rien de plus '),
(7, 1, 'soirÃ©e chez tom', 7, '2019-10-04 19:52:00', '2019-10-04 23:59:00', 2, 'ON BOIT'),
(8, 2, 'test', 14, '2019-10-04 20:00:00', '2019-10-04 22:00:00', 1, 'azrazr'),
(9, 2, 'test2', 14, '2019-10-04 22:00:00', '2019-10-04 23:00:00', 3, 'zegzetze'),
(14, 7, 'TEST O K ', 12, '2019-10-06 16:16:00', '2019-10-06 17:17:00', 2, ''),
(16, 7, 'TEST impossible', 30, '2019-10-06 18:18:00', '2019-10-06 18:19:00', 2, ''),
(17, 7, 'TEST impossible', 30, '2019-10-06 18:18:00', '2019-10-06 18:19:00', 10, ''),
(19, 7, 'TEST impossible', 30, '2019-10-06 18:18:00', '2019-10-06 23:59:00', 11, ''),
(24, 7, 'Anniversaire Debo', 2, '2019-10-04 19:19:00', '2019-10-04 20:20:00', 3, ''),
(25, 7, 'Anniversaire Debo', 2, '2019-10-04 19:19:00', '2019-10-04 20:20:00', 6, ''),
(26, 7, 'Anniversaire Debo', 2, '2019-10-04 19:19:00', '2019-10-04 20:20:00', 7, ''),
(27, 7, 'TEST impossible', 11, '2019-10-03 11:14:00', '2019-10-03 14:11:00', 1, ''),
(28, 7, 'TEST impossible', 11, '2019-10-03 11:14:00', '2019-10-03 14:11:00', 3, ''),
(29, 7, 'Discuter avec Madicx', 10, '2019-10-02 09:09:00', '2019-10-02 10:10:00', 2, ''),
(30, 7, 'Test 14 informatisÃ©e', 14, '2019-10-01 14:14:00', '2019-10-01 15:15:00', 1, ''),
(31, 7, 'Test 14 informatisÃ©e 2 ', 14, '2019-10-01 14:14:00', '2019-10-01 15:15:00', 2, ''),
(32, 7, 'Test 14 informatisÃ©e 2 ', 14, '2019-10-01 14:14:00', '2019-10-01 15:15:00', 3, ''),
(35, 7, 'test', 2, '2019-10-05 18:08:00', '2019-10-05 19:20:00', 1, ''),
(36, 1, 'test', 10, '2019-10-02 10:10:00', '2019-10-02 20:20:00', 1, ''),
(37, 1, 'test', 10, '2019-10-02 10:10:00', '2019-10-02 20:20:00', 3, ''),
(38, 1, 'test', 10, '2019-10-02 10:10:00', '2019-10-02 20:20:00', 4, ''),
(39, 1, 'test', 10, '2019-10-02 10:10:00', '2019-10-02 20:20:00', 5, ''),
(40, 1, 'aaz', 15, '2019-10-12 23:00:00', '2019-10-12 23:50:00', 1, ''),
(41, 1, 'aaz', 15, '2019-10-12 23:00:00', '2019-10-12 23:50:00', 3, ''),
(42, 1, 'aaz', 15, '2019-10-12 23:00:00', '2019-10-12 23:50:00', 4, ''),
(43, 1, 'test', 12, '2019-10-24 07:00:00', '2019-10-24 11:00:00', 1, ''),
(44, 1, 'testest', 12, '2019-10-24 06:00:00', '2019-10-24 13:00:00', 3, ''),
(45, 1, 'TEST 30', 30, '2019-10-10 23:23:00', '2019-10-10 23:59:00', 2, ''),
(46, 1, 'testse', 30, '2019-10-25 23:25:00', '2019-10-25 23:29:00', 2, ''),
(47, 1, 'Halloween', 15, '2019-11-11 19:58:00', '2019-11-11 23:58:00', 2, 'Super ambiance'),
(48, 7, 'ya man', 4, '2019-11-21 09:00:00', '2019-11-21 10:00:00', 1, 'Big Up'),
(49, 2, 'RDV des gazelles', 17, '2019-11-28 09:00:00', '2019-11-28 11:00:00', 2, ''),
(50, 1, 'Anniversaire Debo', 18, '2020-01-05 23:00:00', '2020-01-05 23:59:00', 2, 'bwa'),
(51, 1, 'PrÃ©sentation E6', 5, '2019-12-30 10:00:00', '2019-12-30 11:00:00', 3, 'RDV PrÃ©sentation E6'),
(52, 8, 'dev', 2, '2019-12-18 11:00:00', '2019-12-18 12:00:00', 3, '');

-- --------------------------------------------------------

--
-- Structure de la table `salles`
--

CREATE TABLE `salles` (
  `id_salle` int(11) NOT NULL,
  `nom_salle` varchar(50) NOT NULL,
  `nb_places` int(11) NOT NULL,
  `informatisee` tinyint(1) NOT NULL,
  `bloquee` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `salles`
--

INSERT INTO `salles` (`id_salle`, `nom_salle`, `nb_places`, `informatisee`, `bloquee`) VALUES
(1, 'Winterfell', 15, 0, 1),
(2, 'Port-Real', 30, 0, 0),
(3, 'Volantis', 15, 1, 0),
(4, 'Braavos', 30, 0, 0),
(5, 'Meereen', 30, 0, 0),
(6, 'AsshaÃ¯', 15, 1, 0),
(7, 'Myr', 15, 1, 0),
(8, 'Qarth', 30, 0, 1),
(9, 'Vaes Dothrak', 30, 0, 0),
(10, 'YunkaÃ¯', 30, 0, 0),
(11, 'Astapor', 30, 0, 0),
(12, 'Pentos', 15, 1, 0);

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
  `id_ligue` int(11) NOT NULL,
  `bloque` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id_user`, `nom_user`, `pnom_user`, `mail`, `tel`, `role`, `login`, `mdp`, `id_ligue`, `bloque`) VALUES
(1, 'Baisnee', 'Virgile', 'zavickb@gmail.com', 678467196, 1, 'root', 'ROOT', 1, 0),
(2, 'Roulland', 'Damien', 'd.roulland@gmail.com', 611475158, 0, 'd.roulland', 'd.roulland', 1, 0),
(5, 'Haise', 'Benjamin', 'theosauvage@laposte.fr', 628521624, 0, 'Mika4ever', '2', 5, 0),
(6, 'Morin', 'Pascal', 'p.morin@aiffc-formation.com', 678946452, 0, 'p.morin', 'test', 7, 0),
(7, 'Bissay', 'Valentin', 'test@gmail.com', 678467196, 0, 'test', 'test', 7, 0),
(8, 'Lanister', 'Jaime', 'jaime.lanister@gmail.com', 666, 0, 'LoveCersei', 'lovecersai', 5, 0);

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
  MODIFY `id_ligue` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT pour la table `reservations`
--
ALTER TABLE `reservations`
  MODIFY `id_resa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT pour la table `salles`
--
ALTER TABLE `salles`
  MODIFY `id_salle` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

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
