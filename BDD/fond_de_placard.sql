-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Client :  127.0.0.1
-- Généré le :  Mer 21 Décembre 2016 à 13:32
-- Version du serveur :  5.7.14
-- Version de PHP :  5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `fond_de_placard`
--

-- --------------------------------------------------------

--
-- Structure de la table `favorites`
--

CREATE TABLE `favorites` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `recipe_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `ingredient`
--

CREATE TABLE `ingredient` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `family` varchar(50) NOT NULL,
  `unit` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `ingredient`
--

INSERT INTO `ingredient` (`id`, `name`, `family`, `unit`) VALUES
(2, 'oignon', 'legume', NULL),
(3, 'pomme de terre', 'feculent', 'g'),
(4, 'champignon de paris', 'legume', 'g'),
(5, 'tomate', 'legume', NULL),
(6, 'pomme', 'fruit', NULL),
(7, 'poire', 'fruit', NULL),
(8, 'citron', 'fruit', NULL),
(9, 'oeuf', 'epicerie', NULL),
(10, 'farine', 'epicerie', 'g'),
(11, 'oeuf', 'epicerie', NULL),
(12, 'farine', 'epicerie', 'g'),
(13, 'levure chimique', 'reserved', NULL),
(14, 'huilde d\'olive', 'epicerie', 'cl'),
(15, 'poudre d\'amande', 'epicerie', 'g'),
(16, 'amande effilée', 'epicerie', 'g'),
(17, 'chocolat', 'epicerie', 'g'),
(18, 'lait', 'laitage', 'l'),
(19, 'beurre', 'laitage', 'g'),
(20, 'crème fraiche', 'laitage', 'g'),
(21, 'parmesan', 'laitage', 'g'),
(22, 'fromage râpé', 'laitage', 'g'),
(23, 'surumi', 'poisson', 'g'),
(24, 'crevette', 'poisson', NULL),
(25, 'jambon', 'viande', 'g'),
(26, 'lardons', 'viande', 'g'),
(27, 'sel', 'reserved', NULL),
(28, 'poivre', 'reserved', NULL),
(30, 'gousse d\'ail', 'reserved', NULL),
(31, 'persil', 'reserved', NULL),
(32, 'sucre', 'reserved', 'g'),
(33, 'pâte à pizza', 'pate', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `ingredient-recipe`
--

CREATE TABLE `ingredient-recipe` (
  `id` int(11) NOT NULL,
  `recipe_id` int(11) NOT NULL,
  `ingredient_id` int(11) NOT NULL,
  `quantity` varchar(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `ingredient-recipe`
--

INSERT INTO `ingredient-recipe` (`id`, `recipe_id`, `ingredient_id`, `quantity`) VALUES
(1, 1, 9, '3'),
(2, 1, 10, '180'),
(3, 1, 13, '1'),
(4, 1, 14, '12'),
(5, 1, 18, 'QS'),
(6, 1, 22, '80'),
(7, 1, 23, '150'),
(8, 1, 24, '15'),
(9, 1, 27, 'QS'),
(10, 1, 28, 'QS');

-- --------------------------------------------------------

--
-- Structure de la table `picture`
--

CREATE TABLE `picture` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `type` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `recipe`
--

CREATE TABLE `recipe` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `time_cook` varchar(10) NOT NULL,
  `time_baking` varchar(10) DEFAULT NULL,
  `type` varchar(25) NOT NULL,
  `picture_id` int(11) DEFAULT NULL,
  `number_of_people` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `recipe`
--

INSERT INTO `recipe` (`id`, `name`, `description`, `time_cook`, `time_baking`, `type`, `picture_id`, `number_of_people`) VALUES
(1, 'cake au surimi et crevette', 'Un bien joli cake', '20 minutes', '25 minutes', 'entrée', NULL, 6),
(2, 'Croque-Monsieur', 'Une bonne tranche de pain', '10 minutes', '10 minutes', 'Plat', NULL, 6),
(3, 'Flammekuech', 'Un truc bien francais', '20 minutes', '10 minutes', 'Plat', NULL, 4),
(4, 'Gratin Dauphinois', 'Le bon gratin de ton oncle', '25 minutes', '60 minutes', 'Plat', NULL, 4),
(5, 'Oeuf cocote', 'L\'oeuf de ma cocote', '15 minutes', '8 minutes', 'Entrée', NULL, 4),
(6, 'Tomate Farcies', 'Elle bien farcies la coquine', '15 minutes', '30 minutes', 'Plat', NULL, 2),
(7, 'Cake Chocolat Poire', 'A bien demouler', '20 minutes', '40 minutes', 'Dessert', NULL, 6),
(8, 'Pomme au Four', 'Bien cuite', '10 minutes', '15 minutes', 'Dessert', NULL, 2);

-- --------------------------------------------------------

--
-- Structure de la table `stage`
--

CREATE TABLE `stage` (
  `id` int(11) NOT NULL,
  `recipe_id` int(11) NOT NULL,
  `instruction` text NOT NULL,
  `number` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `stage`
--

INSERT INTO `stage` (`id`, `recipe_id`, `instruction`, `number`) VALUES
(1, 1, 'Mélangez les oeufs avec la farine, la levure, l\'huile, le sel et le poivre.', 1),
(2, 1, 'Ajoutez le lait tiédi, le fromage râpé et le surimi. Mélangez bien.', 2),
(3, 1, 'Versez la préparation dans un moule à cake puis placer les crevettes  au centre de la preparation', 3),
(4, 1, 'Mettre au four pendant 25 minutes a 180° (th.6).', 4),
(5, 1, 'Attendez 5 minutes puis demoulez et laisser refroidir sur une grille', 5);

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `pseudo` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Index pour les tables exportées
--

--
-- Index pour la table `favorites`
--
ALTER TABLE `favorites`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `recipe_id` (`recipe_id`);

--
-- Index pour la table `ingredient`
--
ALTER TABLE `ingredient`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `ingredient-recipe`
--
ALTER TABLE `ingredient-recipe`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ingredient_id` (`recipe_id`),
  ADD KEY `recipe_id` (`ingredient_id`);

--
-- Index pour la table `picture`
--
ALTER TABLE `picture`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `recipe`
--
ALTER TABLE `recipe`
  ADD PRIMARY KEY (`id`),
  ADD KEY `picture_id` (`picture_id`);

--
-- Index pour la table `stage`
--
ALTER TABLE `stage`
  ADD PRIMARY KEY (`id`),
  ADD KEY `recipe_id` (`recipe_id`);

--
-- Index pour la table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `favorites`
--
ALTER TABLE `favorites`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `ingredient`
--
ALTER TABLE `ingredient`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;
--
-- AUTO_INCREMENT pour la table `ingredient-recipe`
--
ALTER TABLE `ingredient-recipe`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT pour la table `picture`
--
ALTER TABLE `picture`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `recipe`
--
ALTER TABLE `recipe`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT pour la table `stage`
--
ALTER TABLE `stage`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT pour la table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
