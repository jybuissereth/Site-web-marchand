-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost
-- Généré le : mar. 21 juin 2022 à 18:51
-- Version du serveur :  8.0.29-0ubuntu0.20.04.3
-- Version de PHP : 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
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
-- Structure de la table `articleC`
--

CREATE TABLE articleC (
  id int NOT NULL,
  price double NOT NULL,
  product_id int NOT NULL,
  commandes_id int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Déchargement des données de la table `articleC`
--

INSERT INTO `articleC` (`id`, `price`, `product_id`, `commandes_id`) VALUES
(23, 24, 15, 42),
(24, 24, 19, 42),
(25, 24, 19, 42),
(26, 24, 13, 42),
(27, 24, 15, 43),
(28, 24, 19, 43),
(29, 24, 19, 43),
(30, 24, 13, 43),
(31, 24, 15, 44),
(32, 24, 19, 44),
(33, 24, 19, 44),
(34, 24, 13, 44),
(35, 120, 15, 45),
(36, 40, 19, 45),
(37, 40, 19, 45),
(38, 10, 13, 45),
(39, 120, 15, 46),
(40, 40, 19, 46),
(41, 40, 19, 46),
(42, 10, 13, 46),
(43, 240, 36, 47),
(44, 140, 4, 47),
(45, 140, 1, 47);

-- --------------------------------------------------------

--
-- Structure de la table `categorie`
--

CREATE TABLE `categorie` (
  `id` int NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `categorie`
--

INSERT INTO `categorie` (`id`, `name`) VALUES
(1, 'Vêtements'),
(2, 'Chaussures'),
(3, 'Accessoires');

-- --------------------------------------------------------

--
-- Structure de la table `commandes`
--

CREATE TABLE `commandes` (
  `total_price` double NOT NULL,
  `id` int NOT NULL,
  `username` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `commandes`
--

INSERT INTO `commandes` (`total_price`, `id`, `username`) VALUES
(12, 1, 'altan'),
(12, 2, 'altan'),
(12, 3, 'altan'),
(12, 4, 'altan'),
(12, 5, 'altan'),
(12, 6, 'altan'),
(12, 7, 'altan'),
(12, 8, 'altan'),
(12, 9, 'altan'),
(210, 10, 'altan'),
(210, 11, 'altan'),
(210, 12, 'altan'),
(210, 13, 'altan'),
(210, 14, 'altan'),
(210, 15, 'altan'),
(12, 16, 'altan'),
(210, 17, 'altan'),
(210, 18, 'altan'),
(210, 19, 'altan'),
(210, 20, 'altan'),
(210, 21, 'altan'),
(210, 22, 'altan'),
(210, 23, 'altan'),
(210, 24, 'altan'),
(210, 25, 'altan'),
(210, 26, 'altan'),
(210, 27, 'altan'),
(210, 28, 'altan'),
(210, 29, 'altan'),
(210, 30, 'altan'),
(210, 31, 'altan'),
(210, 32, 'altan'),
(210, 33, 'altan'),
(210, 34, 'altan'),
(210, 35, 'altan'),
(210, 36, 'altan'),
(210, 37, 'altan'),
(210, 38, 'altan'),
(210, 39, 'altan'),
(210, 40, 'altan'),
(210, 41, 'altan'),
(210, 42, 'altan'),
(210, 43, 'altan'),
(210, 44, 'altan'),
(210, 45, 'altan'),
(210, 46, 'altan'),
(520, 47, 'altan');

-- --------------------------------------------------------

--
-- Structure de la table `product`
--

CREATE TABLE `product` (
  `id` int NOT NULL,
  `nom` varchar(255) NOT NULL,
  `prix` double NOT NULL,
  `marque` varchar(255) NOT NULL,
  `image` text NOT NULL,
  `taille` varchar(255) NOT NULL,
  `categorie` int NOT NULL,
  `quantite` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `product`
--

INSERT INTO `product` (`id`, `nom`, `prix`, `marque`, `image`, `taille`, `categorie`, `quantite`) VALUES
(1, 'Jordan 1', 140, 'Jordan', 'img/JORDAN_CH.webp', '43', 2, 9),
(4, 'Veste Nike', 140, 'Nike', 'img/NIKE_VESTE.webp', 'M', 1, 6),
(5, 'Hoodie Chase', 110, 'Carhartt', 'img/CARHARTT_HOODIE.webp', 'M', 1, 2),
(7, 'Veste Lacoste', 130, 'Lacoste', 'img/LACOSTE_VESTE.webp', 'S', 1, 12),
(8, 'New Balance - MS327PR', 120, 'New Balance', 'img/NB_CH.webp', '43', 2, 11),
(11, 'Hoodie Stussy', 50, 'Stussy', 'img/STUSSY_HOODIE.webp', 'M', 1, 3),
(12, 'JEFF BLACK', 130, 'Komono', 'img/KOMONO_LUNETTES.webp', 'Taille Unique', 3, 10),
(13, 'GRAPHIC BOTTLE', 10, 'ACG', 'img/BOTTLE_ACG.webp', 'Taille Unique', 3, 9),
(14, 'STRAP BAG', 40, 'Carhartt', 'img/STRAPBAG_CARHARTT.webp', 'Taille Unique', 3, 10),
(15, 'BACKPACK', 120, 'Carhartt', 'img/BACKPACK_CARHARTT.webp', 'Taille Unique', 3, 9),
(16, 'LOS ANGELES DODGERS', 25, 'New Era', 'img/CASQUETTE_NEWERA.webp', 'Taille Unique', 3, 10),
(17, 'MOUNTAIN HAT', 25, 'Columbia', 'img/HAT_COLUMBIA.webp', 'Taille Unique', 3, 10),
(18, 'PREMIUM BASKET BALL', 55, 'Jordan', 'img/BALL_JORDAN.webp', 'Taille Unique', 3, 10),
(19, 'CLASSIC SPORT CAP', 40, 'RALPH LAUREN', 'img/CASQUETTE_POLO.webp', 'Taille Unique', 3, 8),
(20, 'SPORTSWEAR TOTE BAG', 40, 'NIKE', 'img/TOTEBAG_NIKE.webp', 'Taille unique', 3, 10),
(21, 'H86 FUTURA HAT', 23, 'NIKE', 'img/CASQUETTE_NIKE.webp', 'Taille Unique', 3, 10),
(36, 'JA Limited Edition', 240, 'none', 'img/jordan_adidas.webp', 'M', 1, 15);

-- --------------------------------------------------------

--
-- Structure de la table `utilisateurs`
--

CREATE TABLE `utilisateurs` (
  `id` int NOT NULL,
  `pseudo` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `utilisateurs`
--

INSERT INTO `utilisateurs` (`id`, `pseudo`, `email`, `password`) VALUES
(1, 'gaetan', 'gaetan.carre74@gmail.com', 'cd0aa9856147b6c5b4ff2b7dfee5da20aa38253099ef1b4a64aced233c9afe29'),
(2, 'altan', 'altan@gmail.com', 'd2ceb37d4f2f193133db1bfc3d2163cb061e4ba4d4ff2fddf05a1dedb78876d7'),
(3, 'djelel', 'djelel@gmail.com', 'e10dc45fdd1e1de84913e3d23f1f7ab721b1ffacbe91002d1f9c45a4e044867d'),
(4, 'admin', 'admin@gmail.com', '8c6976e5b5410415bde908bd4dee15dfb167a9c873fc4bb8a81f6f2ab448a918');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `articleC`
--
ALTER TABLE `articleC`
  ADD PRIMARY KEY (`id`),
  ADD KEY `commandes_id` (`commandes_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Index pour la table `categorie`
--
ALTER TABLE `categorie`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `commandes`
--
ALTER TABLE `commandes`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `utilisateurs`
--
ALTER TABLE `utilisateurs`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `articleC`
--
ALTER TABLE `articleC`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT pour la table `categorie`
--
ALTER TABLE `categorie`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `product`
--
ALTER TABLE `product`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT pour la table `utilisateurs`
--
ALTER TABLE `utilisateurs`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `articleC`
--
ALTER TABLE `articleC`
  ADD CONSTRAINT `articleC_ibfk_1` FOREIGN KEY (`commandes_id`) REFERENCES `commandes` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `articleC_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
