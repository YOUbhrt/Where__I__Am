-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le :  Dim 07 avr. 2019 à 16:17
-- Version du serveur :  10.1.36-MariaDB
-- Version de PHP :  7.2.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `where_i_am`
--

-- --------------------------------------------------------

--
-- Structure de la table `admin`
--

CREATE TABLE `admin` (
  `id` int(4) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `pswrd` varchar(34) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `admin`
--

INSERT INTO `admin` (`id`, `username`, `email`, `pswrd`) VALUES
(4, 'youness', 'bouhribatyounes@gmail.com', '74b87337454200d4d33f80c4663dc5e5');

-- --------------------------------------------------------

--
-- Structure de la table `chemin`
--

CREATE TABLE `chemin` (
  `id_chemin` int(4) NOT NULL,
  `id_segment` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `emplacement`
--

CREATE TABLE `emplacement` (
  `id_emp` int(64) NOT NULL,
  `lat` double(10,6) NOT NULL,
  `lng` double(10,6) NOT NULL,
  `name` varchar(500) NOT NULL,
  `description` text NOT NULL,
  `type` varchar(1000) NOT NULL,
  `image` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `emplacement`
--

INSERT INTO `emplacement` (`id_emp`, `lat`, `lng`, `name`, `description`, `type`, `image`) VALUES
(4, 34.050026, -6.811700, 'Centre de recherche', 'Centre de recherche Acoustique et thermique des matériaux et du bâtiment', 'Salles d\'études', 'Centre de recherche.jpg'),
(5, 34.049511, -6.812294, 'Maison d\'entreprise', 'Specifier pour les étudiants du licence, il se compose de 2 salle d\'étude, 2 salles informatiques , 6 bureaux des professeurs.', 'Salles d\'études', 'Maison d\'entreprise.jpg'),
(6, 34.049449, -6.811751, 'Bloc pédagogique 2', 'Se compose de 2 amphi, une salle EMC4 pour les activités parascolaires des étudiants, 4 salles d étude, une salle de dessin et 2 bureaux des professeurs.', 'Salles Etudes', 'Bloc pedagogique 2.jpg'),
(7, 34.049605, -6.812476, 'Toilettes des filles', 'Toilettes des filles à coté du terrain et de la maison d\'entreprise', 'installations sanitaires', 'Toilette pour Femme 2.jpg'),
(8, 34.049907, -6.813290, 'Parking', 'Parking à l\'entré de l\'école', 'Autres', 'Parking.jpg'),
(9, 34.050747, -6.812269, 'Administration', 'Administration générale de l\'école.', 'Administration', 'Administration.jpg'),
(10, 34.050831, -6.812445, 'Direction', 'La ou on trouve le bureau du directeur et le bureau de la secrétariat du direction', 'Administration', 'Direction.jpg'),
(11, 34.050431, -6.812604, 'Administration des département', 'Se compose de 2 salles de reunion et des bureaux de chef des départements', 'Administration', 'Administration des departement.jpg'),
(12, 34.049498, -6.812830, 'Terrain', '1 terrain de foot peux être deviser en deux terrains de Basketball.', 'Instalations Sportives', 'Terrain 1.jpg'),
(13, 34.050055, -6.812545, 'Bloc pédagogique 1', 'Se compose de 3 centres informatique d\'un total de 8 salles informatique bien équipés, 2 centres de photocopieuses, une buvette des professeurs, 18 salles d\'études', 'Salles d\'études', 'Bloc pedagogique 1.jpg'),
(14, 34.049595, -6.812130, 'Buvette', 'Buvette des étudiants.', 'Autres', 'Buvette.jpg'),
(15, 34.049696, -6.812081, 'Scolarité ', 'Scolarité des étudiants.', 'Administration', 'Scolarité.jpg'),
(16, 34.049839, -6.811872, 'Laboratoire', 'Laboratoire des études biologiques', 'Salles d\'études', 'Laboratoire.jpg'),
(17, 34.049737, -6.811641, 'Laboratoire GC', 'Laboratoire des études Génie Civil', 'Salles d\'études', 'Laboratoire GC.jpg'),
(18, 34.050193, -6.811709, 'Toilettes des garçons ', 'Toilettes des garçons à coté des laboratoires des recherches ', 'installations sanitaires', 'Toilette pour Homme.jpg'),
(19, 34.050252, -6.811957, 'Bibliothèque ', 'Bibliothèque des étudiants', 'Salles d\'études', 'Bibliotheque.jpg'),
(20, 34.050169, -6.813208, 'Laboratoire hydraulique', 'Laboratoire des recherches hydrauliques ', 'Salles d\'études', 'Laboratoire hydrolique.jpg'),
(21, 34.049779, -6.811430, 'Hall technologique', 'hall technologique ', 'Salles d\'études', 'Bloc recherche scientifique.jpg');

-- --------------------------------------------------------

--
-- Structure de la table `pred_segment`
--

CREATE TABLE `pred_segment` (
  `id_pred` int(11) NOT NULL,
  `id_segment` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `segment`
--

CREATE TABLE `segment` (
  `id_segment` int(11) NOT NULL,
  `id_point1` int(4) NOT NULL,
  `id_point2` int(4) NOT NULL,
  `longueur` int(34) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `succ_segement`
--

CREATE TABLE `succ_segement` (
  `id_succ` int(11) NOT NULL,
  `id_segment` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `tbpoint`
--

CREATE TABLE `tbpoint` (
  `id_point` int(34) NOT NULL,
  `lat` float(10,5) NOT NULL,
  `lng` float(10,5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `tbpoint`
--

INSERT INTO `tbpoint` (`id_point`, `lat`, `lng`) VALUES
(2, 3.00000, 4.00000),
(4, 9.00000, 9.00000),
(7, 34.04963, -6.81296),
(8, 34.04983, -6.81289),
(9, 34.04965, -6.81253);

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

CREATE TABLE `user` (
  `id_user` int(4) NOT NULL,
  `mail` varchar(100) NOT NULL,
  `mdp` varchar(20) NOT NULL,
  `date_inscrit` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `chemin`
--
ALTER TABLE `chemin`
  ADD PRIMARY KEY (`id_chemin`),
  ADD KEY `id_segment` (`id_segment`);

--
-- Index pour la table `emplacement`
--
ALTER TABLE `emplacement`
  ADD PRIMARY KEY (`id_emp`);

--
-- Index pour la table `pred_segment`
--
ALTER TABLE `pred_segment`
  ADD PRIMARY KEY (`id_pred`),
  ADD KEY `id_segment` (`id_segment`);

--
-- Index pour la table `segment`
--
ALTER TABLE `segment`
  ADD PRIMARY KEY (`id_segment`),
  ADD KEY `id_point2` (`id_point2`),
  ADD KEY `id_point1` (`id_point1`);

--
-- Index pour la table `succ_segement`
--
ALTER TABLE `succ_segement`
  ADD PRIMARY KEY (`id_succ`),
  ADD KEY `id_segment` (`id_segment`);

--
-- Index pour la table `tbpoint`
--
ALTER TABLE `tbpoint`
  ADD PRIMARY KEY (`id_point`);

--
-- Index pour la table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `chemin`
--
ALTER TABLE `chemin`
  MODIFY `id_chemin` int(4) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `emplacement`
--
ALTER TABLE `emplacement`
  MODIFY `id_emp` int(64) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT pour la table `pred_segment`
--
ALTER TABLE `pred_segment`
  MODIFY `id_pred` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `segment`
--
ALTER TABLE `segment`
  MODIFY `id_segment` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `succ_segement`
--
ALTER TABLE `succ_segement`
  MODIFY `id_succ` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `tbpoint`
--
ALTER TABLE `tbpoint`
  MODIFY `id_point` int(34) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT pour la table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(4) NOT NULL AUTO_INCREMENT;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `chemin`
--
ALTER TABLE `chemin`
  ADD CONSTRAINT `chemin_ibfk_1` FOREIGN KEY (`id_segment`) REFERENCES `segment` (`id_segment`);

--
-- Contraintes pour la table `pred_segment`
--
ALTER TABLE `pred_segment`
  ADD CONSTRAINT `pred_segment_ibfk_1` FOREIGN KEY (`id_segment`) REFERENCES `segment` (`id_segment`);

--
-- Contraintes pour la table `segment`
--
ALTER TABLE `segment`
  ADD CONSTRAINT `segment_ibfk_1` FOREIGN KEY (`id_point1`) REFERENCES `tbpoint` (`id_point`),
  ADD CONSTRAINT `segment_ibfk_2` FOREIGN KEY (`id_point2`) REFERENCES `tbpoint` (`id_point`);

--
-- Contraintes pour la table `succ_segement`
--
ALTER TABLE `succ_segement`
  ADD CONSTRAINT `succ_segement_ibfk_1` FOREIGN KEY (`id_segment`) REFERENCES `segment` (`id_segment`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
