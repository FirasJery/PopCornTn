-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : jeu. 12 mai 2022 à 05:26
-- Version du serveur : 10.4.22-MariaDB
-- Version de PHP : 7.4.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `projet`
--

-- --------------------------------------------------------

--
-- Structure de la table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `nom` varchar(20) NOT NULL,
  `prenom` varchar(20) NOT NULL,
  `sexe` varchar(7) NOT NULL,
  `email` varchar(30) NOT NULL,
  `login` varchar(30) NOT NULL,
  `date_n` date NOT NULL,
  `password` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `admin`
--

INSERT INTO `admin` (`id`, `nom`, `prenom`, `sexe`, `email`, `login`, `date_n`, `password`) VALUES
(4, 'yahya5445', 'fhima6565', 'Homme', 'yahyafhima1@gmail.com', 'yahyafhima', '2000-04-05', 'yahya');

-- --------------------------------------------------------

--
-- Structure de la table `categories`
--

CREATE TABLE `categories` (
  `categorie` varchar(60) NOT NULL,
  `nb_films` int(11) NOT NULL,
  `nb_ventes` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `categories`
--

INSERT INTO `categories` (`categorie`, `nb_films`, `nb_ventes`) VALUES
('Action', 2, 0),
('Comédie', 0, 0),
('Drama', 0, 0),
('Horreur', 1, 0),
('Romance', 1, 0),
('Sci-Fi', 1, 0);

-- --------------------------------------------------------

--
-- Structure de la table `chatbot`
--

CREATE TABLE `chatbot` (
  `id` int(11) NOT NULL,
  `queries` varchar(300) NOT NULL,
  `replies` varchar(300) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `chatbot`
--

INSERT INTO `chatbot` (`id`, `queries`, `replies`) VALUES
(1, 'hi', 'hello'),
(2, 'how are you', 'I m fine, Thanks. How can i help you'),
(3, 'How many movies per week ?', 'U can check our Home page , in the event tab you will find our full schedule of the week'),
(4, 'quelles sont les salles dispoibles ', 'vous pouvez tous consulter dans la page Home ');

-- --------------------------------------------------------

--
-- Structure de la table `evenement`
--

CREATE TABLE `evenement` (
  `id` int(11) NOT NULL,
  `titre` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `img` varchar(255) NOT NULL,
  `auteur` varchar(255) DEFAULT NULL,
  `date_ajout` date NOT NULL DEFAULT current_timestamp(),
  `prix` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `evenement`
--

INSERT INTO `evenement` (`id`, `titre`, `description`, `img`, `auteur`, `date_ajout`, `prix`) VALUES
(22333911, 'event 1', 'culture, art aaaa', '../uploads/gon.jpg', 'firas', '2022-04-28', 50),
(22333912, 'event2', 'culture, art ', '../uploads/270527265_1270643823448062_7325784050478539448_n.jpg', 'firas', '2022-04-28', 50),
(22333914, 'event3', 'azeazeaze', '../uploads/270563681_1270646886781089_2048168065552899496_n.jpg', 'azeazeaze', '2022-05-05', 70),
(22333915, 'modiiiiiiiif', 'azeaze', '../uploads/270533468_1270645200114591_1536368254402451845_n.jpg', 'azeazeaze', '2022-05-05', 15),
(22333916, 'modiiiiiif', 'khkhkhjkjh', '../uploads/270409697_1270644633447981_560450930583620902_n.jpg', 'rdgfdghd', '2022-05-05', 15),
(22333917, 'event 6', 'azezae', '../uploads/270572397_1270643950114716_3073459198783280018_n.jpg', 'azeazeaz', '2022-05-05', 10),
(22333918, 'event_ghatas', 'azeazeze', '../uploads/271043895_1270645270114584_2357723770996348882_n.jpg', 'gahtas', '2022-05-11', 50);

-- --------------------------------------------------------

--
-- Structure de la table `film`
--

CREATE TABLE `film` (
  `id` int(11) NOT NULL,
  `titre` varchar(20) NOT NULL,
  `description` text NOT NULL,
  `img` varchar(255) NOT NULL,
  `auteur` varchar(255) NOT NULL,
  `date_ajout` date NOT NULL DEFAULT current_timestamp(),
  `prix` int(11) NOT NULL,
  `vente` int(11) NOT NULL,
  `categorie` varchar(60) NOT NULL,
  `note` float NOT NULL,
  `nb_avis` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `film`
--

INSERT INTO `film` (`id`, `titre`, `description`, `img`, `auteur`, `date_ajout`, `prix`, `vente`, `categorie`, `note`, `nb_avis`) VALUES
(14, 'Titanic', 'Quelques passages du premier voyage de la Titanic', '../uploads/titanic.png', 'jcp', '2022-04-14', 20, 7, 'Romance', 4.33, 3),
(15, 'The Batman', 'Enquete autour d\'un tueur mystérieux', '../uploads/batman.jpg', '', '2022-04-20', 60, 7, 'Action', 2, 1),
(24, 'Scream', 'Tueur masqué', '../uploads/Scream.PNG', 'jcp', '2022-05-04', 13, 3, 'Horreur', 3.5, 2);

-- --------------------------------------------------------

--
-- Structure de la table `salle`
--

CREATE TABLE `salle` (
  `id` int(10) NOT NULL,
  `Nom` varchar(20) NOT NULL,
  `Adresse` varchar(30) NOT NULL,
  `capacite` int(5) NOT NULL,
  `Gouvernorat` varchar(255) NOT NULL,
  `frais` int(11) NOT NULL,
  `img` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `salle`
--

INSERT INTO `salle` (`id`, `Nom`, `Adresse`, `capacite`, `Gouvernorat`, `frais`, `img`) VALUES
(26, 'chartage', 'bab bhar', 500, 'Arianna', 10000, '../uploads/Cinema-Le-Colisee.jpg'),
(27, 'Monalisa', 'la marsa', 500, 'Tunis', 5000, '../uploads/Cinéma-Pathé.webp'),
(29, 'Dar Cinema', 'cite olympique,Arianna', 1000, 'Arianna', 3500, '../uploads/francais_image2_38149_1463407777.jpg'),
(30, 'Cine House', 'rweyguiya', 500, 'Zaghouan', 4000, '../uploads/1333583_cinemageneric_348807.jpg'),
(31, 'Da Club', 'kantaoui', 1000, 'Sousse', 5000, '../uploads/cinema_sousse.jpg'),
(32, 'Downtown', 'kelibia', 200, 'Nabeul', 2500, '../uploads/images.jfif'),
(33, 'Rakouch', 'avenue mohamed 5, Tunis', 2000, 'Tunis', 2500, '../uploads/cinema (1).jpg'),
(35, 'Salle test', 'avenue mohamed 5, Tunis', 1000, 'Tunis', 5000, '../uploads/frigba.jpg'),
(37, 'Rakouch', 'avenue mohamed 5, Tunis', 2000, 'Tunis', 2500, '../uploads/cinema (1).jpg'),
(38, 'salle_medenine', 'Medenine', 5000, 'Medenine', 10, '../uploads/270472716_1270646336781144_5951393729749463538_n.jpg');

-- --------------------------------------------------------

--
-- Structure de la table `sponsor`
--

CREATE TABLE `sponsor` (
  `id` int(11) NOT NULL,
  `nom_sponsor` varchar(200) NOT NULL,
  `id_event` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `sponsor`
--

INSERT INTO `sponsor` (`id`, `nom_sponsor`, `id_event`) VALUES
(1, 'biat', 22333911),
(2, 'stb', 22333912),
(4, '3ezzdin', 22333914),
(5, 'stb', 22333915),
(6, 'aaa', 22333916),
(7, 'azeaze', 22333917),
(8, 'ghaatas company', 22333918);

-- --------------------------------------------------------

--
-- Structure de la table `userc`
--

CREATE TABLE `userc` (
  `id` int(11) NOT NULL,
  `nom` varchar(20) NOT NULL,
  `prenom` varchar(20) NOT NULL,
  `sexe` varchar(7) NOT NULL,
  `email` varchar(30) NOT NULL,
  `login` varchar(30) NOT NULL,
  `date_n` date NOT NULL DEFAULT current_timestamp(),
  `password` varchar(30) NOT NULL,
  `role` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `userc`
--

INSERT INTO `userc` (`id`, `nom`, `prenom`, `sexe`, `email`, `login`, `date_n`, `password`, `role`) VALUES
(5, 'azerty', 'firas', 'Homme', 'yahyafhima1@gmail.com', 'yahyafhima1@Gmail.com', '2022-05-06', 'yahya', 'admin'),
(6, 'firas', 'jery', 'homme', 'firas.jery@gmail.com', 'firas47', '2022-05-12', 'firas', ''),
(7, 'firaaas', 'fafafa', 'Homme', 'firas.eljary@esprit.tn', 'firasss47', '2022-05-12', 'firas', '');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`categorie`);

--
-- Index pour la table `chatbot`
--
ALTER TABLE `chatbot`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `evenement`
--
ALTER TABLE `evenement`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `film`
--
ALTER TABLE `film`
  ADD PRIMARY KEY (`id`),
  ADD KEY `categorie_foreign` (`categorie`);

--
-- Index pour la table `salle`
--
ALTER TABLE `salle`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `sponsor`
--
ALTER TABLE `sponsor`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk` (`id_event`);

--
-- Index pour la table `userc`
--
ALTER TABLE `userc`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `chatbot`
--
ALTER TABLE `chatbot`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `evenement`
--
ALTER TABLE `evenement`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22333919;

--
-- AUTO_INCREMENT pour la table `film`
--
ALTER TABLE `film`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT pour la table `salle`
--
ALTER TABLE `salle`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT pour la table `sponsor`
--
ALTER TABLE `sponsor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT pour la table `userc`
--
ALTER TABLE `userc`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `film`
--
ALTER TABLE `film`
  ADD CONSTRAINT `categorie_foreign` FOREIGN KEY (`categorie`) REFERENCES `categories` (`categorie`);

--
-- Contraintes pour la table `sponsor`
--
ALTER TABLE `sponsor`
  ADD CONSTRAINT `fk` FOREIGN KEY (`id_event`) REFERENCES `evenement` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
