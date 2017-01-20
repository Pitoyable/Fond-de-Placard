-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Client :  127.0.0.1
-- Généré le :  Ven 20 Janvier 2017 à 15:25
-- Version du serveur :  5.7.14
-- Version de PHP :  7.0.10

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
-- Structure de la table `comment`
--

CREATE TABLE `comment` (
  `com_id` int(11) NOT NULL,
  `com_content` text,
  `com_fav` tinyint(1) DEFAULT NULL,
  `com_date` datetime DEFAULT NULL,
  `com_rec_id` int(11) NOT NULL,
  `com_use_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `group`
--

CREATE TABLE `group` (
  `gro_id` int(11) NOT NULL,
  `gro_name` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `group`
--

INSERT INTO `group` (`gro_id`, `gro_name`) VALUES
(1, 'admin'),
(2, 'utilisateur');

-- --------------------------------------------------------

--
-- Structure de la table `ingredients`
--

CREATE TABLE `ingredients` (
  `ing_id` int(11) NOT NULL,
  `ing_name` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `link_ing_rec`
--

CREATE TABLE `link_ing_rec` (
  `ingredients_ing_id` int(11) NOT NULL,
  `recipe_rec_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `link_rec_the`
--

CREATE TABLE `link_rec_the` (
  `recipe_rec_id` int(11) NOT NULL,
  `theme_the_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `link_rec_use`
--

CREATE TABLE `link_rec_use` (
  `recipe_rec_id` int(11) NOT NULL,
  `user_use_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `picture`
--

CREATE TABLE `picture` (
  `pic_id` int(11) NOT NULL,
  `pic_name` varchar(255) NOT NULL,
  `pic_alt` varchar(255) NOT NULL,
  `pic_description` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `recipe`
--

CREATE TABLE `recipe` (
  `rec_id` int(11) NOT NULL,
  `rec_name` varchar(255) NOT NULL,
  `rec_html` text NOT NULL,
  `rec_type` varchar(45) NOT NULL,
  `rec_valide` tinyint(1) NOT NULL DEFAULT '0',
  `picture_pic_id` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `theme`
--

CREATE TABLE `theme` (
  `the_id` int(11) NOT NULL,
  `the_name` varchar(45) NOT NULL,
  `the_valide` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `use_pseudo` varchar(45) NOT NULL,
  `use_email` varchar(45) NOT NULL,
  `use_password` varchar(60) NOT NULL,
  `use_valide` tinyint(1) NOT NULL DEFAULT '0',
  `group_gro_id` int(11) NOT NULL DEFAULT '2'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Index pour les tables exportées
--

--
-- Index pour la table `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`com_id`),
  ADD KEY `fk_comment_recipe_has_user1_idx` (`com_rec_id`,`com_use_id`);

--
-- Index pour la table `group`
--
ALTER TABLE `group`
  ADD PRIMARY KEY (`gro_id`),
  ADD UNIQUE KEY `gro_name_UNIQUE` (`gro_name`);

--
-- Index pour la table `ingredients`
--
ALTER TABLE `ingredients`
  ADD PRIMARY KEY (`ing_id`),
  ADD UNIQUE KEY `ing_name_UNIQUE` (`ing_name`);

--
-- Index pour la table `link_ing_rec`
--
ALTER TABLE `link_ing_rec`
  ADD PRIMARY KEY (`ingredients_ing_id`,`recipe_rec_id`),
  ADD KEY `fk_ingredients_has_recipe_recipe1_idx` (`recipe_rec_id`),
  ADD KEY `fk_ingredients_has_recipe_ingredients_idx` (`ingredients_ing_id`);

--
-- Index pour la table `link_rec_the`
--
ALTER TABLE `link_rec_the`
  ADD PRIMARY KEY (`recipe_rec_id`,`theme_the_id`),
  ADD KEY `fk_recipe_has_theme_theme1_idx` (`theme_the_id`),
  ADD KEY `fk_recipe_has_theme_recipe1_idx` (`recipe_rec_id`);

--
-- Index pour la table `link_rec_use`
--
ALTER TABLE `link_rec_use`
  ADD PRIMARY KEY (`recipe_rec_id`,`user_use_id`),
  ADD KEY `fk_recipe_has_user_user1_idx` (`user_use_id`),
  ADD KEY `fk_recipe_has_user_recipe1_idx` (`recipe_rec_id`);

--
-- Index pour la table `picture`
--
ALTER TABLE `picture`
  ADD PRIMARY KEY (`pic_id`),
  ADD UNIQUE KEY `img_name_UNIQUE` (`pic_name`);

--
-- Index pour la table `recipe`
--
ALTER TABLE `recipe`
  ADD PRIMARY KEY (`rec_id`),
  ADD UNIQUE KEY `rec_name_UNIQUE` (`rec_name`),
  ADD KEY `fk_recipe_picture1_idx` (`picture_pic_id`);

--
-- Index pour la table `theme`
--
ALTER TABLE `theme`
  ADD PRIMARY KEY (`the_id`),
  ADD UNIQUE KEY `the_name_UNIQUE` (`the_name`);

--
-- Index pour la table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `use_pseudo_UNIQUE` (`use_pseudo`),
  ADD UNIQUE KEY `use_email_UNIQUE` (`use_email`),
  ADD KEY `fk_user_group1_idx` (`group_gro_id`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `comment`
--
ALTER TABLE `comment`
  MODIFY `com_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `group`
--
ALTER TABLE `group`
  MODIFY `gro_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT pour la table `ingredients`
--
ALTER TABLE `ingredients`
  MODIFY `ing_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `picture`
--
ALTER TABLE `picture`
  MODIFY `pic_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `recipe`
--
ALTER TABLE `recipe`
  MODIFY `rec_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `theme`
--
ALTER TABLE `theme`
  MODIFY `the_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `comment`
--
ALTER TABLE `comment`
  ADD CONSTRAINT `fk_comment_recipe_has_user1` FOREIGN KEY (`com_rec_id`,`com_use_id`) REFERENCES `link_rec_use` (`recipe_rec_id`, `user_use_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `link_ing_rec`
--
ALTER TABLE `link_ing_rec`
  ADD CONSTRAINT `fk_ingredients_has_recipe_ingredients` FOREIGN KEY (`ingredients_ing_id`) REFERENCES `ingredients` (`ing_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_ingredients_has_recipe_recipe1` FOREIGN KEY (`recipe_rec_id`) REFERENCES `recipe` (`rec_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `link_rec_the`
--
ALTER TABLE `link_rec_the`
  ADD CONSTRAINT `fk_recipe_has_theme_recipe1` FOREIGN KEY (`recipe_rec_id`) REFERENCES `recipe` (`rec_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_recipe_has_theme_theme1` FOREIGN KEY (`theme_the_id`) REFERENCES `theme` (`the_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `link_rec_use`
--
ALTER TABLE `link_rec_use`
  ADD CONSTRAINT `fk_recipe_has_user_recipe1` FOREIGN KEY (`recipe_rec_id`) REFERENCES `recipe` (`rec_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_recipe_has_user_user1` FOREIGN KEY (`user_use_id`) REFERENCES `user` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `recipe`
--
ALTER TABLE `recipe`
  ADD CONSTRAINT `fk_recipe_picture1` FOREIGN KEY (`picture_pic_id`) REFERENCES `picture` (`pic_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `fk_user_group1` FOREIGN KEY (`group_gro_id`) REFERENCES `group` (`gro_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
